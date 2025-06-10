<?php

namespace App\Filament\Widgets;

use App\Models\TestResult;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MbtiTypeDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'MBTI Tiplerine Göre Dağılım';

    protected static ?string $pollingInterval = '30s'; // 30 saniyede bir güncellensin (isteğe bağlı)

    protected function getData(): array
    {
        $data = TestResult::query()
            ->select('mbti_type', DB::raw('count(*) as total'))
            ->groupBy('mbti_type')
            ->pluck('total', 'mbti_type');

        return [
            'datasets' => [
                [
                    'label' => 'Test Sonuçları',
                    'data' => $data->values()->toArray(),
                ],
            ],
            'labels' => $data->keys()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
