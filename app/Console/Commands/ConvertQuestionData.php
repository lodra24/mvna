<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class ConvertQuestionData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert-question-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Converts existing question_text data to translatable JSON format';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Soru verilerini JSON formatına çevirme işlemi başlatılıyor...');
        
        // Tüm soruları çek
        $questions = Question::all();
        $updatedCount = 0;
        
        foreach ($questions as $question) {
            // Mevcut question_text değerini al
            $currentText = $question->getAttributeValue('question_text');
            
            // Eğer zaten JSON formatında değilse çevir
            if (is_string($currentText)) {
                // Doğrudan veritabanı seviyesinde güncelleme yap
                DB::table('questions')
                    ->where('id', $question->id)
                    ->update([
                        'question_text' => json_encode(['en' => $currentText])
                    ]);
                
                $updatedCount++;
                $this->line("Soru ID {$question->id}: '{$currentText}' -> JSON formatına çevrildi");
            } else {
                $this->line("Soru ID {$question->id}: zaten JSON formatında, atlanıyor");
            }
        }
        
        $this->info("Veri dönüştürme işlemi tamamlandı!");
        $this->info("Toplam {$updatedCount} soru güncellendi.");
        
        return 0;
    }
}
