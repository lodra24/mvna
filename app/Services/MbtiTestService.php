<?php

namespace App\Services;

use App\Models\Question;
use App\Models\User;
use App\Models\TestResult;
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

        foreach ($submittedAnswers as $questionId => $chosenOption) {
            $question = Question::find($questionId);
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
     * İşlenen test sonucunu session'a kaydeder.
     *
     * @param array $testData
     * @return void
     */
    public function savePendingResultToSession(array $testData): void
    {
        $testResultData = [
            'mbti_type' => $testData['mbti_type'],
            'scores' => $testData['scores'],
            'status' => 'pending_registration'
        ];
        
        Session::put('pending_test_result', $testResultData);
    }

    /**
     * Session'da bekleyen test sonucunu veritabanına kaydeder.
     *
     * @param \App\Models\User $user
     * @return \App\Models\TestResult|null
     */
    public function commitPendingResultToDatabase(User $user): ?TestResult
    {
        if (!Session::has('pending_test_result')) {
            return null;
        }

        $testResultData = Session::get('pending_test_result');
        
        $testResult = TestResult::create([
            'user_id' => $user->id,
            'mbti_type' => $testResultData['mbti_type'],
            'e_score' => $testResultData['scores']['E'],
            'i_score' => $testResultData['scores']['I'],
            's_score' => $testResultData['scores']['S'],
            'n_score' => $testResultData['scores']['N'],
            't_score' => $testResultData['scores']['T'],
            'f_score' => $testResultData['scores']['F'],
            'j_score' => $testResultData['scores']['J'],
            'p_score' => $testResultData['scores']['P'],
            'status' => 'pending_payment'
        ]);
        
        Session::forget('pending_test_result');
        
        return $testResult;
    }
}