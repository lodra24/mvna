<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // beginTest metodu için eklendi ve showQuestions metodu için kullanılıyor
use Illuminate\View\View;    // start metodu için ve showQuestions metodunun dönüş tipi için
use Illuminate\Support\Facades\Redirect; // Yönlendirme için (veya sadece use Redirect;)
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
     * Giriş yapmış kullanıcının daha önceden test sonucu varsa dashboard'a yönlendirir.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function start(): View|RedirectResponse
    {
        // Giriş yapmış kullanıcının daha önceden bir test sonucu olup olmadığını kontrol et
        if (Auth::check()) {
            $existingTestResult = Auth::user()->testResults()->first();
            
            if ($existingTestResult) {
                return redirect()->route('dashboard')
                    ->with('info', 'You already have a completed test. You can review your results here.');
            }
        }
        
        return view('test.start');
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
        if (Auth::check() && Auth::user()->testResults()->exists()) {
            return redirect()->route('dashboard')->with('info', 'You already have a completed test.');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $name = $request->input('name');

        $request->session()->put('userName', $name);

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

        // 3. İşlenen sonucu ve ham cevapları session'a kaydet
        $mbtiTestService->savePendingResultToSession($testData, $rawAnswers);
        
        // 4. Kullanıcıyı yönlendir
        return redirect()->route('auth.showRegisterOrLogin')->with('mbti_type', $testData['mbti_type']);
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