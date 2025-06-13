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
            ]);
    }
}
