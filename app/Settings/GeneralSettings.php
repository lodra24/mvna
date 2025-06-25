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
    public ?string $seo_meta_title;
    public ?string $seo_meta_description;
    public ?string $site_custom_scripts;
    public ?string $site_body_scripts;
    public ?string $cookie_consent_message;
    public ?string $cookie_consent_agree_button_text;

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
            'seo_meta_title' => 'CognifyWork - Unlock Business Potential with MBTI',
            'seo_meta_description' => 'CognifyWork offers a comprehensive MBTI personality analysis test for employers to gain deeper insights into their candidates and employees, strengthening management and hiring strategies.',
            'site_custom_scripts' => null,
            'site_body_scripts' => null,
            'cookie_consent_message' => 'Sitemizde daha iyi bir deneyim sunmak için çerezleri kullanıyoruz.',
            'cookie_consent_agree_button_text' => 'Anladım ve Kabul Ediyorum',
        ];
    }
}