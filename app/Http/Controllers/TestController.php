<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // beginTest metodu için eklendi ve showQuestions metodu için kullanılıyor
use Illuminate\View\View;    // start metodu için ve showQuestions metodunun dönüş tipi için
use Illuminate\Support\Facades\Redirect; // Yönlendirme için (veya sadece use Redirect;)
use Illuminate\Support\Facades\Cookie; // Dil tercihi kontrolü için
use Illuminate\Support\Facades\Cache; // Performans optimizasyonu için
// Alternatif olarak, global redirect() helper'ı kullandığımız için bu satır
// zorunlu olmayabilir, ancak açıkça belirtmek iyi bir pratiktir.
// Ayrıca, metodun dönüş tipini belirtmek için RedirectResponse da eklenebilir:
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
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
use App\Services\GeoIpService;
use App\Models\UserAnswer;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    
      use AuthorizesRequests; 
    /**
     * 'test.start' view'ını gösterir.
     * Giriş yapmış kullanıcının adını view'a gönderir.
     * Dil tercihi kontrolü yapar ve gerektiğinde dil seçim modal'ını gösterir.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\GeoIpService  $geoIpService
     * @return \Illuminate\View\View
     */
    public function start(Request $request, GeoIpService $geoIpService): View|RedirectResponse
    {
        $user = Auth::user();

        // 1. Önce giriş yapmış kullanıcı için yarım kalmış bir test var mı diye DB'yi kontrol et
        if ($user) {
            $unfinishedTest = $user->testResults()
                                   ->whereIn('status', ['in_progress', 'pending_payment'])
                                   ->latest('updated_at') // En son güncellenen yarım kalmış testi al
                                   ->first();
            
            if ($unfinishedTest) {
                // Eğer ödeme bekliyorsa ödeme sayfasına, test devam ediyorsa sorulara yönlendir
                $targetRoute = $unfinishedTest->status === 'pending_payment' ? 'test.payment' : 'test.questions';
                return redirect()->route($targetRoute, ['testResult' => $unfinishedTest->id]);
            }
        }

        // 2. Giriş yapmış kullanıcı yoksa veya yarım testi yoksa, misafir session'ını kontrol et
        $activeTestId = $request->session()->get('active_test_result_id');

        if ($activeTestId) {
            $testResult = TestResult::find($activeTestId);

            if ($testResult && $testResult->status === 'in_progress') {
                // Misafir kullanıcısını yarım kalan testinin sorularına yönlendir
                return redirect()->route('test.questions', ['testResult' => $testResult->id]);
            }
        }

        // Giriş yapmış kullanıcının adını al, yoksa boş string kullan
        $userName = Auth::check() ? Auth::user()->name : '';
        
        // Değişkenleri başlat
        $showLanguageModal = false;
        $shouldSetPromptCookie = false;
        
        // İlk Kontrol: language_preference çerezi var mı?
        $languagePreference = $request->cookie('language_preference');
        
        if (!$languagePreference) {
            // İkinci Kontrol: has_been_prompted_for_lang çerezi var mı?
            $hasBeenPrompted = $request->cookie('has_been_prompted_for_lang');
            
            if (!$hasBeenPrompted) {
                // Kullanıcının gerçek ilk ziyareti
                $shouldSetPromptCookie = true;
                
                // Kullanıcının tarayıcı dilini al
                $preferredLanguage = $request->getPreferredLanguage(['tr', 'en']);
                
                if ($preferredLanguage === 'tr') {
                    $showLanguageModal = true;
                } else {
                    // Tarayıcı dili 'tr' değilse, IP kontrolü yap
                    $userIp = $request->ip();
                    if ($geoIpService->isIpFromTurkey($userIp)) {
                        $showLanguageModal = true;
                    }
                }
            } else {
                // Kullanıcı daha önce gelmiş ama seçim yapmamış
                // Sadece tarayıcı dili kontrolü yap, IP kontrolü yapma
                $preferredLanguage = $request->getPreferredLanguage(['tr', 'en']);
                
                if ($preferredLanguage === 'tr') {
                    $showLanguageModal = true;
                }
            }
        }
        
        return view('test.start', compact('userName', 'showLanguageModal', 'shouldSetPromptCookie'));
    }

    /**
     * Kullanıcının adını alır, doğrular, session'a kaydeder ve sorular sayfasına yönlendirir.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function beginTest(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $name = $request->input('name');
        
        // Dil bilgisini al - önce formdan, sonra cookie'den, son olarak varsayılan
        $language = $request->input('lang')
            ?? $request->cookie('language_preference')
            ?? 'en';

        // TestResult modelini kullanarak yeni bir kayıt oluştur
        $testResult = TestResult::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'guest_name' => Auth::guest() ? $name : null,
            'status' => 'in_progress',
            'mbti_type' => 'PEND',
        ]);
        
        // Kullanıcının hangi testi çözdüğünü takip etmek için session'a sadece testin ID'sini kaydet
        $request->session()->put('active_test_result_id', $testResult->id);
        
        // SetTestLanguage middleware'inin okuyabilmesi için dil bilgisini global session'a da koy
        $request->session()->put('test_language', $language);

        return redirect()->route('test.questions', ['testResult' => $testResult]);
    }

    /**
     * Sorular sayfasını gösterir ve kullanıcı adını view'a gönderir.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\View\View
     */
    public function showQuestions(Request $request, TestResult $testResult): View
    {
        // TestResult'tan veya session'dan kullanıcı adını al
        $userName = $testResult->guest_name ?? ($testResult->user ? $testResult->user->name : 'Misafir');
        
        // Performans optimizasyonu: Sadece gerekli sütunları çek ve cache'le
        $questions = Cache::remember('test_questions_all', now()->addHours(24), function () {
            return Question::select(['id', 'question_text', 'option_a_text', 'option_b_text'])->get();
        });

        // Bu teste ait önceden verilmiş cevapları çek
        $initialAnswers = $testResult->userAnswers()
                                      ->pluck('chosen_option', 'question_id')
                                      ->toArray();

        return view('test.questions', [
            'userName' => $userName,
            'questions' => $questions,
            'testResult' => $testResult, // Formun action URL'ini doğru oluşturabilmek için
            'initialAnswers' => $initialAnswers, // Bu satırı ekle
        ]);
    }

    /**
     * Test sırasında verilen tek bir cevabı AJAX ile kaydeder.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TestResult $testResult
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveProgress(Request $request, TestResult $testResult)
    {
        // Güvenlik: Kullanıcı bu teste sahip mi veya session'daki test mi?
        $activeTestId = $request->session()->get('active_test_result_id');
        
        // Misafir kullanıcılar için session kontrolü
        if ($testResult->id !== $activeTestId) {
            // Eğer giriş yapmış bir kullanıcıysa policy ile de kontrol edilebilir.
            if (Auth::check() && Auth::id() !== $testResult->user_id) {
                return response()->json(['error' => 'Unauthorized user for this test.'], 403);
            }
            if (!Auth::check() && $testResult->id !== $activeTestId) {
                return response()->json(['error' => 'Unauthorized session for this test.'], 403);
            }
        }

        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'chosen_option' => 'required|in:A,B',
        ]);

        UserAnswer::updateOrCreate(
            [
                'test_result_id' => $testResult->id,
                'question_id'    => $validated['question_id'],
            ],
            [
                'chosen_option' => $validated['chosen_option'],
            ]
        );

        return response()->json(['success' => true, 'message' => 'Progress saved.']);
    }

    /**
     * Test cevaplarını alır ve işler.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\MbtiTestService  $mbtiTestService
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitAnswers(Request $request, MbtiTestService $mbtiTestService, TestResult $testResult): JsonResponse|RedirectResponse
    {
        // 1. Güvenlik Kontrolü: Session'daki active_test_result_id ile rotadan gelen $testResult->id'nin aynı olup olmadığını kontrol et
        if ($request->session()->get('active_test_result_id') !== $testResult->id) {
            abort(403, 'Unauthorized submission.');
        }

        // 2. Cevapları Al ve Kaydet
        $rawAnswers = $request->input('answers', []);
        
        // Tüm cevapları tek sorguda kaydetmek için upsert kullan (N+1 sorunu çözümü)
        $answersToUpsert = [];
        foreach ($rawAnswers as $questionId => $chosenOption) {
            $answersToUpsert[] = [
                'test_result_id' => $testResult->id,
                'question_id' => $questionId,
                'chosen_option' => $chosenOption,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        if (!empty($answersToUpsert)) {
            UserAnswer::upsert(
                $answersToUpsert,
                ['test_result_id', 'question_id'], // Unique anahtar
                ['chosen_option', 'updated_at']   // Güncellenecek sütunlar
            );
        }

        // 3. Skorları Hesapla
        $processedData = $mbtiTestService->processTestResults($rawAnswers);

        // 4. TestResult Kaydını Güncelle
        $testResult->update([
            'mbti_type' => $processedData['mbti_type'],
            'e_score' => $processedData['scores']['E'],
            'i_score' => $processedData['scores']['I'],
            's_score' => $processedData['scores']['S'],
            'n_score' => $processedData['scores']['N'],
            't_score' => $processedData['scores']['T'],
            'f_score' => $processedData['scores']['F'],
            'j_score' => $processedData['scores']['J'],
            'p_score' => $processedData['scores']['P'],
            'status' => Auth::check() ? 'pending_payment' : 'pending_registration',
        ]);

        // 5. Session'ı Temizle
        $request->session()->forget('test_language');
        // active_test_result_id session'da kalmalı, çünkü giriş/kayıt sonrası bu ID'ye ihtiyacımız olacak

        // 6. AJAX Yanıtı için URL Belirleme
        $redirectUrl = '';
        if (Auth::check()) {
            // Giriş yapmış kullanıcı için ödeme sayfasının URL'sini al
            $redirectUrl = route('test.payment', ['testResult' => $testResult->id]);
        } else {
            // Misafir kullanıcı için kayıt/giriş sayfasının URL'sini al
            $redirectUrl = route('auth.showRegisterOrLogin');
            // Session'a flash mesajı ekle, çünkü bu bir AJAX isteği olmayacak gibi davranabilir
            $request->session()->flash('mbti_type', $testResult->mbti_type);
        }

        return response()->json([
            'success' => true,
            'redirect_url' => $redirectUrl,
        ]);
    }

    /**
     * Ödeme sayfasını gösterir.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showPaymentPage(TestResult $testResult)
    {
        // Policy ile yetkilendirme kontrolü
        $this->authorize('accessPayment', $testResult);
        
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
        // Policy ile yetkilendirme kontrolü (sahiplik + tamamlanma durumu)
        $this->authorize('viewResult', $testResult);
        
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
        // Policy ile yetkilendirme kontrolü (sahiplik + tamamlanma durumu)
        $this->authorize('download', $testResult);
        
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
        // Policy ile yetkilendirme kontrolü
        $this->authorize('processPayment', $testResult);

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