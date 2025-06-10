<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\TestResult;
use App\Models\Question;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Toplam Kullanıcı', User::count())
                ->description('Kayıtlı kullanıcı sayısı')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Stat::make('Toplam Test Sonucu', TestResult::count())
                ->description('Tamamlanan test sayısı')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),
            
            Stat::make('Ödeme Tamamlanan', TestResult::where('status', 'completed')->count())
                ->description('Ödeme yapılan test sayısı')
                ->descriptionIcon('heroicon-m-credit-card')
                ->color('warning'),
            
            Stat::make('Toplam Soru', Question::count())
                ->description('Sistemdeki soru sayısı')
                ->descriptionIcon('heroicon-m-question-mark-circle')
                ->color('primary'),
        ];
    }
}