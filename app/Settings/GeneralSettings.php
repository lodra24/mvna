<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public float $test_price;
    public string $hero_title_part_1;
    public string $hero_title_highlight;
    public string $hero_title_part_2;
    public string $hero_subtitle;

    public static function group(): string
    {
        return 'general';
    }

    public static function defaults(): array
    {
        return [
            'test_price' => 14.99,
            'hero_title_part_1' => 'MBTI Vocational',
            'hero_title_highlight' => 'NexusPoint',
            'hero_title_part_2' => 'Analysis',
            'hero_subtitle' => 'Get deeper insights into your candidates and employees with our personality analysis test designed specifically for employers, and strengthen your management strategies.',
        ];
    }
}