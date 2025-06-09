<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController; // Eklendi
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Mevcut test.start rotası
Route::get('/test/start', [TestController::class, 'start'])->name('test.start');

// İstenen yeni POST rotası
Route::post('/test/begin', [TestController::class, 'beginTest'])->name('test.begin');

// YENİ EKLENEN ROTA
Route::get('/test/questions', [TestController::class, 'showQuestions'])->name('test.questions');

// Test cevaplarını gönderme rotası
Route::post('/test/submit', [TestController::class, 'submitAnswers'])->name('test.submit');

// Ödeme sayfasını gösterme rotası
Route::get('/test/payment/{testResult}', [TestController::class, 'showPaymentPage'])->middleware('auth')->name('test.payment');

// Ödenmiş test sonucunu gösterme rotası
Route::get('/test/result/{testResult}', [TestController::class, 'showResult'])->middleware('auth')->name('test.showResult');

?>