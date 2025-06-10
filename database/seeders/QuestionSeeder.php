<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // E/I (Extraversion/Introversion) - Enerji Yönelimi
        Question::create([
            'question_text' => 'Bir sosyal etkinlikte genellikle nasıl davranırsınız?',
            'dimension' => 'E/I',
            'option_a_value' => 'E',
            'option_b_value' => 'I'
        ]);

        // S/N (Sensing/Intuition) - Bilgi Toplama
        Question::create([
            'question_text' => 'Bir problemi çözerken hangi yaklaşımı tercih edersiniz?',
            'dimension' => 'S/N',
            'option_a_value' => 'S',
            'option_b_value' => 'N'
        ]);

        // T/F (Thinking/Feeling) - Karar Verme
        Question::create([
            'question_text' => 'Önemli bir karar verirken neye öncelik verirsiniz?',
            'dimension' => 'T/F',
            'option_a_value' => 'T',
            'option_b_value' => 'F'
        ]);

        // J/P (Judging/Perceiving) - Yaşam Tarzı
        Question::create([
            'question_text' => 'Günlük hayatınızı nasıl organize etmeyi tercih edersiniz?',
            'dimension' => 'J/P',
            'option_a_value' => 'J',
            'option_b_value' => 'P'
        ]);
    }
}
