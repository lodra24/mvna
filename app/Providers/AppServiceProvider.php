<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Question;
use App\Observers\QuestionObserver;

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
    }
}
