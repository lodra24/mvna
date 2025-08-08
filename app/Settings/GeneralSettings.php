<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public float $test_price = 14.99;
    public string $hero_title_part_1 = 'MBTI Vocational';
    public string $hero_title_highlight = 'NexusPoint';
    public string $hero_title_part_2 = 'Analysis';
    public string $hero_subtitle = 'Get deeper insights...';
    public ?string $seo_meta_title = 'MBTI Vocational NexusPoint Analysis | CognifyWork';
    public ?string $seo_meta_description = 'Unlock your potential...';
    public ?string $site_custom_scripts = null;
    public ?string $site_body_scripts = null;
    public ?string $cookie_consent_message = 'We use cookies...';
    public ?string $cookie_consent_agree_button_text = 'Accept & Continue';

    public static function group(): string
    {
        return 'general';
    }
}
