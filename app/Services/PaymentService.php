<?php

namespace App\Services;

use App\Models\TestResult;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\PaymentSuccessful;

class PaymentService
{
    public function handleSuccessfulPayment(TestResult $testResult): void
    {
        // Güvenlik kontrolü: Tamamlanmamış testlerin ödemesini engelle
        if (empty($testResult->mbti_type) || $testResult->mbti_type === 'PEND') {
            Log::warning('Tamamlanmamış bir test için ödeme tamamlanmaya çalışıldı.', [
                'test_result_id' => $testResult->id,
                'mbti_type' => $testResult->mbti_type,
                'user_id' => $testResult->user_id
            ]);
            return;
        }

        // Test sonucunun durumunu 'completed' olarak güncelle
        $testResult->status = 'completed';
        $testResult->save();

        // Payment tablosuna yeni kayıt oluştur
        Payment::create([
            'user_id' => $testResult->user_id, // Değişiklik: Auth::id() yerine
            'test_result_id' => $testResult->id,
            'transaction_id' => uniqid('fake-'),
            'amount' => app(\App\Settings\GeneralSettings::class)->test_price,
            'currency' => 'TRY',
            'status' => 'completed',
            'payment_gateway' => 'test',
            'gateway_response' => ['test' => 'Sahte ödeme işlemi']
        ]);

        // Ödeme başarılı e-postasını gönder
        Mail::to($testResult->user->email)->send(new PaymentSuccessful($testResult));
    }
}