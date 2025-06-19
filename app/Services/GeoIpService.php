<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeoIpService
{
    /**
     * Verilen IP adresinin Türkiye'ye ait olup olmadığını kontrol eder.
     *
     * @param string|null $ipAddress
     * @return bool
     */
    public function isIpFromTurkey(?string $ipAddress): bool
    {
        // IP adresi null veya boş ise false döndür
        if (empty($ipAddress)) {
            return false;
        }

        // IP adresinin geçerli olup olmadığını kontrol et
        if (!filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            return false;
        }

        // Localhost IP'leri için kontrol
        if (in_array($ipAddress, ['127.0.0.1', '::1'])) {
            // Eğer uygulama 'local' ortamındaysa, test amacıyla true dön.
            // Canlı ortamda (production) ise her zaman false dönecek ve gerçek IP'ler için API kontrolü yapılacak.
            return config('app.env') === 'local';
        }

        // Private IP aralıklarını kontrol et (isteğe bağlı)
        if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE)) {
            // Geçerli public IP adresi
        } else {
            // Private IP adresi
            return false;
        }

        // IP adresine özel bir cache anahtarı oluştur
        $cacheKey = "geo_ip_turkey_{$ipAddress}";

        // Cache'den sonucu al, yoksa API'ye git ve sonucu 1 günlüğüne cache'le
        return Cache::remember($cacheKey, now()->addDay(), function () use ($ipAddress) {
            try {
                // ip-api.com servisine GET isteği gönder
                $response = Http::timeout(10)->get("http://ip-api.com/json/{$ipAddress}", [
                    'fields' => 'status,countryCode,message'
                ]);

                // HTTP yanıtı başarılı mı kontrol et
                if (!$response->successful()) {
                    Log::error('GeoIP API HTTP hatası', [
                        'ip' => $ipAddress,
                        'status_code' => $response->status(),
                        'response' => $response->body()
                    ]);
                    return false;
                }

                $data = $response->json();

                // API yanıtının status değerini kontrol et
                if (isset($data['status']) && $data['status'] === 'success') {
                    // countryCode 'TR' ise true döndür
                    return isset($data['countryCode']) && $data['countryCode'] === 'TR';
                } elseif (isset($data['status']) && $data['status'] === 'fail') {
                    // API'den başarısız yanıt geldi
                    Log::warning('GeoIP API başarısız yanıt', [
                        'ip' => $ipAddress,
                        'message' => $data['message'] ?? 'Bilinmeyen hata'
                    ]);
                    return false;
                }

                // Beklenmeyen yanıt formatı
                Log::warning('GeoIP API beklenmeyen yanıt formatı', [
                    'ip' => $ipAddress,
                    'response' => $data
                ]);
                return false;

            } catch (\Exception $e) {
                // Bağlantı hatası veya diğer istisnalar
                Log::error('GeoIP servisi hatası', [
                    'ip' => $ipAddress,
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                return false;
            }
        });
    }
}