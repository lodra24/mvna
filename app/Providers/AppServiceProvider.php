<?php

namespace App\Providers;

// Laravel'in temel servisleri
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

// Rate Limiting için gerekli sınıflar
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

// Uygulamanızın kendi sınıfları
use App\Models\Question;
use App\Models\TestResult;
use App\Observers\QuestionObserver;
use App\Policies\TestResultPolicy;
use App\Settings\GeneralSettings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Ayarları singleton olarak kaydet.
        // Bu, her istekte sadece bir kez ayarların çekilmesini sağlar.
        $this->app->singleton(GeneralSettings::class, function ($app) {
            return new GeneralSettings();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // --- Mevcut Kodlarınız ---
        
        // Question modeli için Observer'ı kaydet
        Question::observe(QuestionObserver::class);
        
        // TestResult modeli için Policy'yi kaydet
        Gate::policy(TestResult::class, TestResultPolicy::class);
        
        // $settings değişkenini tüm view'larla paylaş.
        // Artık controller veya blade dosyalarında app() çağırmaya gerek yok.
        View::composer('*', function ($view) {
            $view->with('settings', app(GeneralSettings::class));
        });

        // --- YENİ EKLENEN BÖLÜM: RATE LIMITER TANIMLAMALARI ---
        // Bu metod, uygulamanız başladığında çalışır ve tekrar kullanılabilir
        // rate limiter kurallarını tanımlar.
        $this->configureRateLimiting();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting(): void
    {
        // 'api' isminde bir rate limiter tanımlar.
        // API rotaları için kullanılır ve dakikada 60 isteğe izin verir.
        // İstekler, giriş yapmış kullanıcının ID'sine veya misafir kullanıcının IP adresine göre gruplanır.
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // 'web' isminde bir rate limiter tanımlar.
        // Web rotaları için kullanılır ve dakikada 60 isteğe izin verir.
        // İstekler, kullanıcının oturum ID'sine veya misafir kullanıcının IP adresine göre gruplanır.
        RateLimiter::for('web', function (Request $request) {
            return Limit::perMinute(60)->by($request->session()->get('id') ?: $request->ip());
        });
    }
}