<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'set.test.language' => \App\Http\Middleware\SetTestLanguage::class,
        ]);
    })
    ->withSchedule(function ($schedule) {
        $schedule->command('app:cleanup-orphaned-tests')->dailyAt('03:00')->withoutOverlapping(10);
        $schedule->command('sitemap:generate')->dailyAt('02:00');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
