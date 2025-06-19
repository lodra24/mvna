<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Question;
use App\Models\TestResult;
use App\Observers\QuestionObserver;
use App\Policies\TestResultPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
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
    }
}
