<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\MbtiTestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Google'a yönlendirme işlemini gerçekleştir
     */
    public function redirectToGoogle(): \Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')
            ->stateless()
            ->setHttpClient(new \GuzzleHttp\Client([
                'verify' => !app()->isLocal(), // Ortama göre SSL doğrulaması
                'timeout' => 30
            ]))
            ->redirect();
    }

    /**
     * Google'dan gelen callback'i işle
     */
    public function handleGoogleCallback(MbtiTestService $mbtiTestService): \Illuminate\Http\RedirectResponse
    {
        try {
            // Google'dan kullanıcı bilgilerini al - SSL doğrulamasını kapat
            $googleUser = Socialite::driver('google')
                ->stateless()
                ->setHttpClient(new \GuzzleHttp\Client([
                    'verify' => !app()->isLocal(), // Ortama göre SSL doğrulaması
                    'timeout' => 30
                ]))
                ->user();
            
            // Veritabanında Google ID'sine sahip kullanıcı olup olmadığını kontrol et
            $user = User::where('google_id', $googleUser->getId())->first();
            
            if ($user) {
                // Kullanıcı varsa, avatar bilgisini güncelle
                $user->avatar = $googleUser->getAvatar();
                $user->save();
            } else {
                // Kullanıcı yoksa, e-posta adresini kontrol et
                $existingUser = User::where('email', $googleUser->getEmail())->first();
                
                if ($existingUser) {
                    // E-posta varsa (daha önce normal kayıt), Google bilgilerini güncelle
                    $existingUser->google_id = $googleUser->getId();
                    $existingUser->avatar = $googleUser->getAvatar();
                    $existingUser->save();
                    $user = $existingUser;
                } else {
                    // Tamamen yeni kullanıcı oluştur
                    $user = User::create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                        'password' => null, // Google ile giriş yapan kullanıcılar için boş
                    ]);
                }
            }
            
            // Kullanıcıyı sisteme giriş yaptır
            Auth::login($user);
            
            // Session'da bekleyen test sonucunu veritabanına kaydet
            $testResult = $mbtiTestService->commitPendingResultToDatabase($user);
            
            // Eğer test sonucu varsa ödeme sayfasına, yoksa dashboard'a yönlendir
            if ($testResult) {
                return redirect()->route('test.payment', ['testResult' => $testResult->id]);
            }
            
            return redirect()->route('dashboard');
            
        } catch (\Exception $e) {
            // Debug için hata mesajını log'a yaz
            Log::error('Google OAuth Error: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Hata durumunda login sayfasına mesaj ile yönlendir
            return redirect()->route('login')->with('error', 'An error occurred while trying to log in with Google: ' . $e->getMessage());
        }
    }
}
