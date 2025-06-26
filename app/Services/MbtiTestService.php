<?php

namespace App\Services;

use App\Models\Question;
use App\Models\User;
use App\Models\TestResult;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Cache\LockTimeoutException;

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
     * Session'da bekleyen test sonucunu kullanıcıya atar (Thread-safe implementation).
     *
     * @param User $user
     * @return TestResult|null
     */
    public function assignPendingTestToUser(User $user): ?TestResult
    {
        // Early exit if no active test result in session
        if (!session()->has('active_test_result_id')) {
            return null;
        }

        $testResultId = session('active_test_result_id');
        $lockKey = "assign_test_to_user:{$user->id}:{$testResultId}";
        
        // Create a lock with 10 seconds timeout
        $lock = Cache::lock($lockKey, 10);
        
        try {
            // Try to acquire the lock for 5 seconds
            $lock->block(5);
            
            // Double-check: ensure session still has the active test result
            if (!session()->has('active_test_result_id')) {
                Log::info('Active test result ID removed from session during lock acquisition', [
                    'user_id' => $user->id,
                    'test_result_id' => $testResultId,
                    'lock_key' => $lockKey
                ]);
                return null;
            }
            
            // Find the test result
            $testResult = TestResult::find($testResultId);
            
            if ($testResult && $testResult->user_id === null) {
                // Assign the test to the user
                $testResult->user_id = $user->id;
                $testResult->guest_name = null;
                
                // Only change status from pending_registration to pending_payment
                // Other statuses (in_progress, completed etc.) should be preserved
                if ($testResult->status === 'pending_registration') {
                    $testResult->status = 'pending_payment';
                }
                
                $testResult->save();
                
                // Remove from session after successful assignment
                session()->forget('active_test_result_id');
                
                Log::info('Test result successfully assigned to user', [
                    'user_id' => $user->id,
                    'test_result_id' => $testResultId,
                    'previous_status' => 'pending_registration',
                    'new_status' => $testResult->status,
                    'lock_key' => $lockKey
                ]);
                
                return $testResult;
            }
            
            // Test result not found or already assigned
            return null;
            
        } catch (LockTimeoutException $e) {
            Log::warning('Failed to acquire lock for test assignment - timeout occurred', [
                'user_id' => $user->id,
                'test_result_id' => $testResultId,
                'lock_key' => $lockKey,
                'error' => $e->getMessage()
            ]);
            return null;
        } finally {
            // Always release the lock if it was acquired
            if (isset($lock)) {
                $lock->release();
            }
        }
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