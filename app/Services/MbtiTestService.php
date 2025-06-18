<?php

namespace App\Services;

use App\Models\Question;
use App\Models\User;
use App\Models\TestResult;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Session;

class MbtiTestService
{
    /**
     * Test sonuçlarını işler ve hem skorları hem de MBTI tipini döndürür.
     *
     * @param array $submittedAnswers ['question_id' => 'chosen_option'] formatında.
     * @return array ['scores' => array, 'mbti_type' => string]
     */
    public function processTestResults(array $submittedAnswers): array
    {
        $scores = $this->calculateScores($submittedAnswers);
        $mbtiType = $this->determineMbtiType($scores);

        return [
            'scores' => $scores,
            'mbti_type' => $mbtiType
        ];
    }

    /**
     * Verilen cevaplara göre MBTI skorlarını hesaplar.
     *
     * @param array $submittedAnswers ['question_id' => 'chosen_option'] formatında.
     * @return array
     */
    public function calculateScores(array $submittedAnswers): array
    {
        $scores = [
            'E' => 0, 'I' => 0, 'S' => 0, 'N' => 0,
            'T' => 0, 'F' => 0, 'J' => 0, 'P' => 0
        ];

        // Boş cevap dizisi kontrolü - gereksiz veritabanı sorgularını önler
        if (empty($submittedAnswers)) {
            return $scores;
        }

        // Soru ID'lerini topla
        $questionIds = array_keys($submittedAnswers);
        
        // Tek sorgu ile tüm soruları al ve ID'ye göre anahtarla
        $questions = Question::whereIn('id', $questionIds)->get()->keyBy('id');

        foreach ($submittedAnswers as $questionId => $chosenOption) {
            $question = $questions->get($questionId);
            if ($question) {
                $mbtiLetter = ($chosenOption === 'A') ? $question->option_a_value : $question->option_b_value;
                if (isset($scores[$mbtiLetter])) {
                    $scores[$mbtiLetter]++;
                }
            }
        }

        return $scores;
    }

    /**
     * Hesaplanan skorlara göre MBTI tipini belirler.
     *
     * @param array $scores
     * @return string
     */
    public function determineMbtiType(array $scores): string
    {
        $mbtiType = '';
        $mbtiType .= ($scores['E'] >= $scores['I']) ? 'E' : 'I';
        $mbtiType .= ($scores['S'] >= $scores['N']) ? 'S' : 'N';
        $mbtiType .= ($scores['T'] >= $scores['F']) ? 'T' : 'F';
        $mbtiType .= ($scores['J'] >= $scores['P']) ? 'J' : 'P';

        return $mbtiType;
    }

    /**
     * Session'da bekleyen test sonucunu kullanıcıya atar.
     *
     * @param User $user
     * @return TestResult|null
     */
    public function assignPendingTestToUser(User $user): ?TestResult
    {
        if (session()->has('active_test_result_id')) {
            $testResultId = session('active_test_result_id');
            $testResult = TestResult::find($testResultId);

            if ($testResult && $testResult->user_id === null) {
                $testResult->user_id = $user->id;
                $testResult->guest_name = null;
                $testResult->status = 'pending_payment';
                $testResult->save();
                
                session()->forget('active_test_result_id');
                return $testResult;
            }
        }
        return null;
    }

    /**
     * Session'da bekleyen test sonucunu veritabanına kaydeder (SocialiteController için alias).
     *
     * @param User $user
     * @return TestResult|null
     */
    public function commitPendingResultToDatabase(User $user): ?TestResult
    {
        return $this->assignPendingTestToUser($user);
    }

}