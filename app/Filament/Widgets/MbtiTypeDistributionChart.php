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
        // Renk paleti tanımlama
        $colorPalette = [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
            '#9966FF', '#FF9F40', '#FF6B6B', '#4ECDC4',
            '#45B7D1', '#96CEB4', '#FFEAA7', '#DDA0DD',
            '#98D8C8', '#F7DC6F', '#BB8FCE', '#85C1E9'
        ];

        $data = TestResult::query()
            ->select('mbti_type', DB::raw('count(*) as total'))
            ->groupBy('mbti_type')
            ->pluck('total', 'mbti_type');

        // Her MBTI tipi için renk atama
        $backgroundColors = [];
        $dataKeys = $data->keys()->toArray();
        
        foreach ($dataKeys as $index => $key) {
            $backgroundColors[] = $colorPalette[$index % count($colorPalette)];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Test Sonuçları',
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => $backgroundColors,
                ],
            ],
            'labels' => $dataKeys,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
