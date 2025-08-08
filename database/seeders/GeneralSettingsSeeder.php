<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Settings\GeneralSettings;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // GeneralSettings sınıfından bir nesne oluşturup kaydetmek,
        // veritabanında kayıt yoksa defaults() metodundaki
        // varsayılan değerlerin yazılmasını sağlar.
        (new GeneralSettings())->save();
    }
}
