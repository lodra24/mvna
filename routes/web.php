<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController; // Eklendi
use App\Http\Controllers\Auth\RegisteredUserController; // Yeni eklendi
use App\Http\Controllers\Auth\SocialiteController; // Sosyal giriş için eklendi
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
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