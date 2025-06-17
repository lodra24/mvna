<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // beginTest metodu için eklendi ve showQuestions metodu için kullanılıyor
use Illuminate\View\View;    // start metodu için ve showQuestions metodunun dönüş tipi için
use Illuminate\Support\Facades\Redirect; // Yönlendirme için (veya sadece use Redirect;)
use Illuminate\Support\Facades\Cookie; // Dil tercihi kontrolü için
// Alternatif olarak, global redirect() helper'ı kullandığımız için bu satır
// zorunlu olmayabilir, ancak açıkça belirtmek iyi bir pratiktir.
// Ayrıca, metodun dönüş tipini belirtmek için RedirectResponse da eklenebilir:
use Illuminate\Http\RedirectResponse;
use App\Models\Question;
use App\Models\TestResult;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Services\MbtiTestService;
use App\Services\PaymentService;
use App\Services\ReportService;
use App\Models\MbtiTypeDetail;

class TestController extends Controller
{
    /**
     * 'test.start' view'ını gösterir.
     * Giriş yapmış kullanıcının adını view'a gönderir.
     * Dil tercihi kontrolü yapar ve gerektiğinde dil seçim modal'ını gösterir.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function start(Request $request): View
    {
        // Giriş yapmış kullanıcının adını al, yoksa boş string kullan
        $userName = Auth::check() ? Auth::user()->name : '';
        
        // Dil tercihi kontrolü
        $showLanguageModal = false;
        
        // Önce cookie'den dil tercihini kontrol et
        $languagePreference = $request->cookie('language_preference');
        
        // DEBUG: Cookie durumunu log'la
        \Log::info('Language Debug - Cookie preference: ' . ($languagePreference ?? 'null'));
        \Log::info('Language Debug - Accept-Language header: ' . $request->header('Accept-Language'));
        
        if (!$languagePreference) {
            // Cookie'de dil tercihi yoksa, tarayıcı dilini kontrol et
            $preferredLanguage = $request->getPreferredLanguage(['tr', 'en']);
            
            // DEBUG: Algılanan dili log'la
            \Log::info('Language Debug - Detected preferred language: ' . ($preferredLanguage ?? 'null'));
            
            // Türkçe tercih ediliyorsa modal göster
            if ($preferredLanguage === 'tr') {
                $showLanguageModal = true;
            }
            
            // DEBUG: Modal gösterilme durumunu log'la
            \Log::info('Language Debug - Show language modal: ' . ($showLanguageModal ? 'yes' : 'no'));
        } else {
            \Log::info('Language Debug - Cookie exists, modal not shown');
        }
        
        return view('test.start', compact('userName', 'showLanguageModal'));
    }

    /**
     * Kullanıcının adını alır, doğrular, session'a kaydeder ve sorular sayfasına yönlendirir.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function beginTest(Request $request): RedirectResponse
    {
        // Giriş yapmış kullanıcının daha önceden test sonucu olup olmadığını kontrol et
        // Yeni test süreci başladığı için önceki testten kalmış session verilerini temizle
        $request->session()->forget(['userName', 'pending_test_result', 'test_language']);
        
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $name = $request->input('name');
        
        // Dil bilgisini al - önce formdan, sonra cookie'den, son olarak varsayılan
        $language = $request->input('lang')
            ?? $request->cookie('language_preference')
            ?? 'en';

        $request->session()->put('userName', $name);
        $request->session()->put('test_language', $language);

        return redirect()->route('test.questions');
    }

    /**
     * Sorular sayfasını gösterir ve kullanıcı adını view'a gönderir.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function showQuestions(Request $request): View
    {
        $userName = $request->session()->get('userName', 'Misafir');
        $questions = Question::all();

        return view('test.questions', [
            'userName' => $userName,
            'questions' => $questions
        ]);
    }

    /**
     * Test cevaplarını alır ve işler.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitAnswers(Request $request, MbtiTestService $mbtiTestService): RedirectResponse
    {
        // 1. Ham cevapları al
        $rawAnswers = $request->input('answers', []);
        
        // 2. Test sonuçlarını işle
        $testData = $mbtiTestService->processTestResults($rawAnswers);
        
        // 3. Ham cevapları testData'ya ekle
        $testData['raw_answers'] = $rawAnswers;
        
        // 4. Kullanıcının giriş yapıp yapmadığını kontrol et
        if (Auth::check()) {
            // Giriş yapmış kullanıcı için akış
            $testResult = $mbtiTestService->saveTestForUser(Auth::user(), $testData);
            
            // Test tamamlandığı için dil session'ını temizle
            $request->session()->forget('test_language');
            
            // Kullanıcıyı ödeme sayfasına yönlendir
            return redirect()->route('test.payment', ['testResult' => $testResult->id]);
        } else {
            // Misafir kullanıcı için eski akış
            // İşlenen sonucu ve ham cevapları session'a kaydet
            $mbtiTestService->savePendingResultToSession($testData, $rawAnswers);
            
            // Test tamamlandığı için dil session'ını temizle
            $request->session()->forget('test_language');
            
            // Kullanıcıyı giriş/kayıt sayfasına yönlendir
            return redirect()->route('auth.showRegisterOrLogin')->with('mbti_type', $testData['mbti_type']);
        }
    }

    /**
     * Ödeme sayfasını gösterir.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showPaymentPage(TestResult $testResult)
    {
        // Raporun doğru kullanıcıya ait olduğunu doğrula
        if ($testResult->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You can only view your own payment pages.');
        }
        
        // Eğer rapor zaten ödenmişse, direkt sonuç sayfasına yönlendir
        if ($testResult->status === 'completed') {
            return redirect()->route('test.showResult', ['testResult' => $testResult->id]);
        }
        
        // Ödeme bekliyorsa, ödeme sayfasını göster
        return view('test.payment', compact('testResult'));
    }

    /**
     * Ödenmiş test sonucunu gösterir.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\View\View
     */
    public function showResult(TestResult $testResult)
    {
        // Raporun doğru kullanıcıya ait olduğunu ve ödemesinin yapıldığını doğrula
        if ($testResult->user_id !== Auth::id() || $testResult->status !== 'completed') {
            return redirect()->route('dashboard')->with('error', 'You can only view your own reports.');
        }
        
        // Raporu göstermek için gereken verileri topla
        $mbtiTypeDetail = MbtiTypeDetail::where('mbti_type', $testResult->mbti_type)->first();
        
        $scores = [
            'E' => $testResult->e_score, 'I' => $testResult->i_score,
            'S' => $testResult->s_score, 'N' => $testResult->n_score,
            'T' => $testResult->t_score, 'F' => $testResult->f_score,
            'J' => $testResult->j_score, 'P' => $testResult->p_score,
        ];
        
        $mbtiType = $testResult->mbti_type;
        
        return view('test.results', compact('mbtiType', 'scores', 'mbtiTypeDetail', 'testResult'));
    }

    /**
     * PDF raporu indirir.
     *
     * @param  \App\Models\TestResult  $testResult
     * @param  \App\Services\ReportService  $reportService
     * @return \Illuminate\Http\Response
     */
    public function downloadReport(TestResult $testResult, ReportService $reportService)
    {
        // Raporun doğru kullanıcıya ait olduğunu ve ödemesinin yapıldığını doğrula
        if ($testResult->user_id !== Auth::id() || $testResult->status !== 'completed') {
            return redirect()->route('dashboard')->with('error', 'You can only download your own reports.');
        }
        
        return $reportService->generatePdfReport($testResult);
    }

    /**
     * Sahte ödeme işlemini tamamlar ve test sonucunu completed durumuna getirir.
     *
     * @param  \App\Models\TestResult  $testResult
     * @param  \App\Services\PaymentService  $paymentService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleSuccessfulPayment(TestResult $testResult, PaymentService $paymentService): RedirectResponse
    {
        // Raporun doğru kullanıcıya ait olduğunu doğrula
        if ($testResult->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You can only process payments for your own reports.');
        }

        // PaymentService'i kullanarak ödeme işlemlerini gerçekleştir
        $paymentService->handleSuccessfulPayment($testResult);

        // Kullanıcıyı başarı mesajı ile sonuç sayfasına yönlendir
        return redirect()->route('test.showResult', ['testResult' => $testResult->id])
            ->with('success', 'Your payment has been completed successfully. You can now access your report.');
    }

    /**
     * Kullanıcı paneli (dashboard) sayfasını gösterir.
     * Giriş yapmış kullanıcının tüm test sonuçlarını listeler.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard(): View
    {
        // Giriş yapmış kullanıcının tüm test sonuçlarını al
        $testResults = Auth::user()->testResults()->orderBy('created_at', 'desc')->get();
        
        return view('dashboard', compact('testResults'));
    }
}