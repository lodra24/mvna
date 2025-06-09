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
                    ->with('info', 'Zaten tamamlanmış bir testiniz bulunmaktadır. Sonuçlarınızı buradan inceleyebilirsiniz.');
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
    public function submitAnswers(Request $request): RedirectResponse
    {
        // MBTI skorlarını tutmak için dizi başlat
        $scores = [
            'E' => 0,
            'I' => 0,
            'S' => 0,
            'N' => 0,
            'T' => 0,
            'F' => 0,
            'J' => 0,
            'P' => 0
        ];

        // Formdan gelen cevapları al
        $submittedAnswers = $request->input('answers', []);

        // Her cevap için skorlama yap
        foreach ($submittedAnswers as $questionId => $chosenOption) {
            // Veritabanından soruyu bul
            $question = Question::find($questionId);

            if ($question) {
                // Seçilen opsiyona göre MBTI harfini al
                if ($chosenOption === 'A') {
                    $mbtiLetter = $question->option_a_value;
                } elseif ($chosenOption === 'B') {
                    $mbtiLetter = $question->option_b_value;
                } else {
                    continue; // Geçersiz seçenek, atla
                }

                // MBTI harfine karşılık gelen skoru artır
                if (isset($scores[$mbtiLetter])) {
                    $scores[$mbtiLetter]++;
                }
            }
        }

        // MBTI tipini belirle
        $mbtiType = '';
        
        // E/I Boyutu
        if ($scores['E'] >= $scores['I']) {
            $mbtiType .= 'E';
        } else {
            $mbtiType .= 'I';
        }
        
        // S/N Boyutu
        if ($scores['S'] >= $scores['N']) {
            $mbtiType .= 'S';
        } else {
            $mbtiType .= 'N';
        }
        
        // T/F Boyutu
        if ($scores['T'] >= $scores['F']) {
            $mbtiType .= 'T';
        } else {
            $mbtiType .= 'F';
        }
        
        // J/P Boyutu
        if ($scores['J'] >= $scores['P']) {
            $mbtiType .= 'J';
        } else {
            $mbtiType .= 'P';
        }
        
        // Kullanıcıyı belirleme/oluşturma mantığı
        $userId = null;
        
        if (Auth::check()) {
            // Kullanıcı giriş yapmışsa, onun ID'sini kullan
            $userId = Auth::id();
        } else {
            // Kullanıcı misafirse, session'dan userName'i al ve kullanıcı oluştur/bul
            $userName = $request->session()->get('userName', 'Misafir');
            $guestEmail = Str::slug($userName) . '@guest.example.com';
            
            $user = User::firstOrCreate(
                ['email' => $guestEmail],
                [
                    'name' => $userName,
                    'password' => Hash::make(Str::random(10)),
                    'role' => 'guest'
                ]
            );
            
            $userId = $user->id;
        }
        
        // Test sonucunu veritabanına kaydet
        $newTestResult = TestResult::create([
            'user_id' => $userId,
            'mbti_type' => $mbtiType,
            'e_score' => $scores['E'],
            'i_score' => $scores['I'],
            's_score' => $scores['S'],
            'n_score' => $scores['N'],
            't_score' => $scores['T'],
            'f_score' => $scores['F'],
            'j_score' => $scores['J'],
            'p_score' => $scores['P'],
            'status' => 'pending_payment'
        ]);
        
        // Kullanıcıyı ödeme sayfasına yönlendir
        return redirect()->route('test.payment', ['testResult' => $newTestResult->id]);
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
            abort(403);
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
            abort(403, 'Bu rapora erişim yetkiniz bulunmamaktadır.');
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
}