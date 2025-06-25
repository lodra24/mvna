<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class Settings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $navigationLabel = 'Genel Ayarlar';

    protected static ?string $title = 'Genel Site Ayarları';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Site Ayarları')
                    ->description('Sitenin genel metin ve başlık ayarları.')
                    ->schema([
                        Forms\Components\TextInput::make('hero_title_part_1')
                            ->label('Başlık (1. Kısım)')
                            ->required(),
                        Forms\Components\TextInput::make('hero_title_highlight')
                            ->label('Başlık (Vurgulu Kısım)')
                            ->helperText('Bu kısım ana sayfada renkli olarak gösterilecektir.')
                            ->required(),
                        Forms\Components\TextInput::make('hero_title_part_2')
                            ->label('Başlık (2. Kısım)')
                            ->required(),
                        Forms\Components\Textarea::make('hero_subtitle')
                            ->label('Ana Sayfa Alt Başlığı')
                            ->required()
                            ->rows(3),
                    ]),

                Forms\Components\Section::make('Fiyatlandırma Ayarları')
                    ->description('Test ve raporlama için fiyatlandırma bilgileri.')
                    ->schema([
                        Forms\Components\TextInput::make('test_price')
                            ->label('Test Fiyatı')
                            ->numeric()
                            ->prefix('$')
                            ->required(),
                    ]),

                Forms\Components\Section::make('SEO Ayarları')
                    ->description('Sitenin arama motorları için meta başlık ve açıklama ayarları.')
                    ->schema([
                        Forms\Components\TextInput::make('seo_meta_title')
                            ->label('Meta Başlık')
                            ->helperText('Arama sonuçlarında görünecek sayfa başlığı.')
                            ->maxLength(60),
                        Forms\Components\Textarea::make('seo_meta_description')
                            ->label('Meta Açıklama')
                            ->helperText('Arama sonuçlarında başlığın altında görünecek sayfa açıklaması.')
                            ->rows(3)
                            ->maxLength(160),
                    ]),

                Forms\Components\Section::make('Harici Kodlar & Scriptler')
                    ->description('Google Analytics, Facebook Pixel gibi harici kodları buraya ekleyin. Bu kodlar sitenin <head> etiketinin içine eklenecektir.')
                    ->schema([
                        Forms\Components\Textarea::make('site_custom_scripts')
                            ->label('Özel Scriptler / Kodlar')
                            ->rows(10)
                            ->helperText('Buraya eklenen kodlar, sitenin tüm sayfalarında <head> etiketinin kapanışından hemen önce yerleştirilecektir. Lütfen geçerli HTML/JavaScript kodları eklediğinizden emin olun (örn: <script>...</script>).')
                            ->placeholder('<!-- Google Analytics Kodu -->...'),
                    ]),

                Forms\Components\Section::make('Body Kapanış Scriptleri')
                    ->description('Chat widget\'ları gibi kodları buraya ekleyin. Bu kodlar sitenin </body> etiketinden hemen önce eklenecektir.')
                    ->schema([
                        Forms\Components\Textarea::make('site_body_scripts')
                            ->label('Body Kapanış Scriptleri')
                            ->rows(10)
                            ->helperText('Buraya eklenen kodlar, sitenin tüm sayfalarında </body> etiketinin kapanışından hemen önce yerleştirilecektir.')
                            ->placeholder('<!-- Chat Widget Kodu -->...'),
                    ]),

                Forms\Components\Section::make('Cookie Onay Ayarları')
                    ->description('Cookie onay banner\'ında gösterilecek mesaj ve buton metinlerini buradan yönetebilirsiniz.')
                    ->schema([
                        Forms\Components\Textarea::make('cookie_consent_message')
                            ->label('Cookie Onay Mesajı')
                            ->required()
                            ->rows(3)
                            ->helperText('Ziyaretçilere gösterilecek cookie onay mesajı.'),
                        Forms\Components\TextInput::make('cookie_consent_agree_button_text')
                            ->label('Onay Butonu Metni')
                            ->required()
                            ->helperText('Cookie onay butonunda gösterilecek metin.'),
                    ]),
            ]);
    }
}
