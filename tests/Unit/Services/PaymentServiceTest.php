<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\Services\PaymentService;
use App\Models\User;
use App\Models\TestResult;
use App\Mail\PaymentSuccessful;

class PaymentServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that handleSuccessfulPayment method works correctly.
     */
    public function test_it_handles_successful_payment_correctly(): void
    {
        // Arrange - Hazırlık
        Mail::fake();
        
        // Bir kullanıcı oluştur
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        // Bu kullanıcıya ait, status'u 'pending_payment' olan bir TestResult oluştur
        $testResult = TestResult::create([
            'user_id' => $user->id,
            'mbti_type' => 'INTJ',
            'status' => 'pending_payment',
            'e_score' => 2, 'i_score' => 8,
            's_score' => 3, 'n_score' => 7,
            't_score' => 9, 'f_score' => 1,
            'j_score' => 6, 'p_score' => 4,
        ]);

        // Act - Eylem
        $paymentService = new PaymentService();
        $paymentService->handleSuccessfulPayment($testResult);

        // Assert - Doğrulama
        
        // 1. TestResult Güncellemesi: Test sonucunun status alanının 'completed' olarak güncellendiğini doğrula
        $testResult = $testResult->fresh();
        $this->assertEquals('completed', $testResult->status);
        
        // 2. Payment Kaydı Oluşturma: payments tablosunda doğru user_id ve test_result_id ile yeni bir ödeme kaydının oluşturulduğunu doğrula
        $this->assertDatabaseHas('payments', [
            'user_id' => $user->id,
            'test_result_id' => $testResult->id,
            'amount' => 14.99,
            'currency' => 'TRY',
            'status' => 'completed',
            'payment_gateway' => 'test'
        ]);
        
        // 3. E-posta Gönderimi: PaymentSuccessful mail'inin doğru kullanıcıya gönderildiğini doğrula
        Mail::assertSent(PaymentSuccessful::class, function ($mail) use ($testResult) {
            return $mail->hasTo($testResult->user->email) &&
                   $mail->testResult->id === $testResult->id;
        });
    }
}
