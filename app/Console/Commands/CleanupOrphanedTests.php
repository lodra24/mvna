<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TestResult;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CleanupOrphanedTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup-orphaned-tests {--dry-run : Sadece silinecek kayıtları listeler, silme işlemi yapmaz}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes orphaned guest test results that are older than 7 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dryRun = $this->option('dry-run');

        try {
            // 7 günden eski ve user_id'si null olan kayıtları hedefle
            $query = TestResult::whereNull('user_id')->where('updated_at', '<=', now()->subDays(7));

            if ($dryRun) {
                // Dry-run modu: Sadece bilgi göster
                $count = $query->count();
                
                if ($count > 0) {
                    $this->info("Şu kadar kayıt silinmek üzere bulundu: {$count}");
                    
                    // Kayıtları tablo halinde listele
                    $records = $query->select('id', 'updated_at')->get();
                    $tableData = $records->map(function ($record) {
                        return [
                            'ID' => $record->id,
                            'Son Güncelleme' => $record->updated_at->format('Y-m-d H:i:s')
                        ];
                    })->toArray();
                    
                    $this->table(['ID', 'Son Güncelleme'], $tableData);
                } else {
                    $this->info('Silinecek kayıt bulunamadı.');
                }
            } else {
                // Gerçek silme işlemi
                DB::transaction(function () use ($query) {
                    $count = $query->count();
                    
                    if ($count > 0) {
                        $query->delete();
                        
                        $message = "{$count} adet orphaned test kaydı silindi.";
                        $this->info($message);
                        Log::info($message);
                    } else {
                        $this->info('Silinecek kayıt bulunamadı.');
                    }
                });
            }
        } catch (\Exception $e) {
            $errorMessage = 'Cleanup işlemi sırasında hata oluştu: ' . $e->getMessage();
            Log::error($errorMessage);
            $this->error($errorMessage);
        }
    }
}
