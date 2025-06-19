<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
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
        // Question modeli için Observer'ı kaydet
        Question::observe(QuestionObserver::class);
        
        // TestResult modeli için Policy'yi kaydet
        Gate::policy(TestResult::class, TestResultPolicy::class);
        
        // $settings değişkenini tüm view'larla paylaş.
        // Artık controller veya blade dosyalarında app() çağırmaya gerek yok.
        View::composer('*', function ($view) {
            $view->with('settings', app(GeneralSettings::class));
        });
    }
}
