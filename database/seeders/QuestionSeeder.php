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
        // E/I (Extraversion/Introversion) - Energy Orientation
        Question::create([
            'question_text' => 'How do you typically behave at a social event?',
            'dimension' => 'E/I',
            'option_a_value' => 'E',
            'option_b_value' => 'I'
        ]);

        // S/N (Sensing/Intuition) - Information Gathering
        Question::create([
            'question_text' => 'Which approach do you prefer when solving a problem?',
            'dimension' => 'S/N',
            'option_a_value' => 'S',
            'option_b_value' => 'N'
        ]);

        // T/F (Thinking/Feeling) - Decision Making
        Question::create([
            'question_text' => 'What do you prioritize when making an important decision?',
            'dimension' => 'T/F',
            'option_a_value' => 'T',
            'option_b_value' => 'F'
        ]);

        // J/P (Judging/Perceiving) - Lifestyle
        Question::create([
            'question_text' => 'How do you prefer to organize your daily life?',
            'dimension' => 'J/P',
            'option_a_value' => 'J',
            'option_b_value' => 'P'
        ]);
    }
}
