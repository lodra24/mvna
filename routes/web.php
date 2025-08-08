<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController; // Eklendi
use App\Http\Controllers\Auth\RegisteredUserController; // Yeni eklendi
use App\Http\Controllers\Auth\SocialiteController; // Sosyal giriş için eklendi
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // FAQ verisini doğrudan burada tanımla
    $faqData = [
        [
            "question" => "What is the MBTI Vocational NexusPoint Analysis and how does it help employers?",
            "answer" => "Our MBTI Vocational NexusPoint Analysis is a scientifically-backed personality assessment that identifies 16 distinct personality types based on psychological preferences. For employers, this provides invaluable insights into how candidates approach problem-solving, their communication styles, and leadership potential."
        ],
            [
        "question" => "How long does the assessment take to complete?",
        "answer" => "The assessment is designed to be both comprehensive and time-efficient, typically taking between 15-20 minutes to complete. The report is generated instantly upon completion."
    ],
    [
        "question" => "What's included in the employer report?",
        "answer" => "Our comprehensive employer report provides actionable insights across multiple dimensions, including: Personality Overview, Management Tips, Team Dynamics, Communication Style, Stress Indicators, and Development Areas."
    ],
    [
        "question" => "Is the assessment suitable for all job roles?",
        "answer" => "Yes! Our MBTI assessment is valuable across all industries and job levels, particularly for leadership, team-based, customer-facing, and creative roles. However, it should complement, not replace, traditional hiring methods."
    ],
    [
        "question" => "How secure is candidate data?",
        "answer" => "Data security is our top priority. We are GDPR & CCPA Compliant, use 256-bit SSL Encryption for all data transmission, and enforce strict access controls."
    ],
    [
        "question" => "Do you offer customer support and training?",
        "answer" => "Absolutely! We provide comprehensive support, including 24/7 technical assistance and free training webinars on MBTI interpretation to ensure you get maximum value from our platform."
    ],
        [
            "question" => "How is the 'NexusPoint' different from a standard MBTI test?",
            "answer" => "While a standard MBTI test reveals your personality type, our Vocational NexusPoint Analysis goes further. It connects your type to specific career strengths, ideal work environments, and actionable management strategies, providing a 'nexus point' between your personality and professional potential."
        ]
    ];

    // JSON-LD'nin mainEntity kısmını PHP'de oluştur
    $mainEntity = [];
    foreach ($faqData as $faq) {
        $mainEntity[] = [
            "@type" => "Question",
            "name" => $faq['question'],
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => $faq['answer']
            ]
        ];
    }

    // Tüm JSON-LD yapısını oluştur
    $structuredDataJson = json_encode([
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "Organization",
                "name" => "CognifyWork",
                "url" => config('app.url'),
                "logo" => asset('images/logo.png'),
                "sameAs" => []
            ],
            [
                "@type" => "WebSite",
                "name" => "CognifyWork",
                "url" => config('app.url')
            ],
            [
                "@type" => "FAQPage",
                "mainEntity" => $mainEntity
            ]
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    // Hazırlanan JSON string'ini view'a gönder
    return view('homepage', ['structuredDataJson' => $structuredDataJson]);
});
Route::get('/dashboard', [TestController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Google Sosyal Giriş Rotaları - Guest middleware altında
Route::middleware('guest')->group(function () {
    Route::get('/auth/google/redirect', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google.redirect');
    Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('auth.google.callback');
});

// Mevcut test.start rotası
Route::get('/test/start', [TestController::class, 'start'])->name('test.start');

// İstenen yeni POST rotası
Route::post('/test/begin', [TestController::class, 'beginTest'])->name('test.begin');

// Soru sayfası artık TestResult modeli alacak.
Route::get('/test/questions/{testResult}', [TestController::class, 'showQuestions'])
    ->name('test.questions')
    ->middleware('set.test.language');

// AJAX ile test ilerleme kaydetme rotası
Route::post('/test/save-progress/{testResult}', [TestController::class, 'saveProgress'])->name('test.saveProgress');

// Cevap gönderme rotası da TestResult modeli alacak.
Route::post('/test/submit/{testResult}', [TestController::class, 'submitAnswers'])
    ->name('test.submit');

// Ödeme sayfasını gösterme rotası
Route::get('/test/payment/{testResult}', [TestController::class, 'showPaymentPage'])->middleware('auth')->name('test.payment');

// Sahte ödeme işlemini tamamlama rotası
Route::get('/test/payment/{testResult}/success', [TestController::class, 'handleSuccessfulPayment'])->middleware('auth')->name('test.handlePayment');

// Ödenmiş test sonucunu gösterme rotası
Route::get('/test/result/{testResult}', [TestController::class, 'showResult'])->middleware('auth')->name('test.showResult');

// PDF raporu indirme rotası
Route::get('/test/result/{testResult}/download', [TestController::class, 'downloadReport'])->middleware('auth')->name('test.downloadReport');

// Test sonrası kayıt/giriş sayfası
Route::get('/auth/register-or-login', [RegisteredUserController::class, 'showRegisterOrLogin'])->name('auth.showRegisterOrLogin');

// Privacy Policy sayfası
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

// Terms of Service sayfası
Route::get('/terms-of-service', function () {
    return view('terms-of-service');
})->name('terms-of-service');

?>
