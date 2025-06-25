<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait RecaptchaValidation
{
    /**
     * reCAPTCHA token'ını Google API'si ile doğrular
     *
     * @param string|null $token reCAPTCHA token'ı
     * @param string $expectedAction Beklenen eylem adı
     * @return bool Doğrulama sonucu
     */
    protected function validateRecaptcha(?string $token, string $expectedAction): bool
    {
        // Çerez onayı yoksa, reCAPTCHA'yı atla ve doğrulamayı başarılı say
        if (!request()->cookie('laravel_cookie_consent')) {
            return true;
        }

        // Token boşsa hemen false döndür
        if (empty($token)) {
            return false;
        }

        // config/services.php dosyasından secret key'i al
        $secretKey = config('services.recaptcha.secret_key');
        
        if (empty($secretKey)) {
            return false;
        }

        try {
            // HTTP istemcisini başlat
            $http = Http::asForm();

            // Eğer uygulama ortamı 'local' ise, SSL doğrulamasını atla
            if (app()->isLocal()) {
                $http->withoutVerifying();
            }

            // İsteği gönder
            $response = $http->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $secretKey,
                'response' => $token,
                'remoteip' => request()->ip()
            ]);

            // Yanıtı JSON olarak al
            $responseData = $response->json();
            
            // Google'dan gelen tüm yanıtı logla
            Log::info('reCAPTCHA Validation Response:', $responseData);

            // Doğrulama kontrolü yap
            if (
                isset($responseData['success']) && 
                $responseData['success'] === true &&
                isset($responseData['score']) && 
                $responseData['score'] >= 0.5 &&
                isset($responseData['action']) && 
                $responseData['action'] === $expectedAction
            ) {
                return true;
            }

            return false;

        } catch (\Exception $e) {
            // Bağlantı hatasını logla
            Log::error('reCAPTCHA Connection Error: ' . $e->getMessage());
            // Hata durumunda false döndür
            return false;
        }
    }
}