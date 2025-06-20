<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap for the website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Sitemap nesnesini oluştur
        $sitemap = Sitemap::create();

        // Ana sayfa (/)
        $sitemap->add(
            Url::create('/')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(1.0)
        );

        // Gizlilik Politikası (/privacy-policy)
        $sitemap->add(
            Url::create('/privacy-policy')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.3)
        );

        // Hizmet Şartları (/terms-of-service)
        $sitemap->add(
            Url::create('/terms-of-service')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.3)
        );

        // Test başlangıç sayfası (/test/start)
        $sitemap->add(
            Url::create('/test/start')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8)
        );

        // Sitemap'i public/sitemap.xml dosyasına kaydet
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap başarıyla oluşturuldu: public/sitemap.xml');
        
        return Command::SUCCESS;
    }
}
