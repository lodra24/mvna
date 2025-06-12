<?php

namespace Tests\Unit\Services;

use App\Models\Question;
use App\Models\User;
use App\Services\MbtiTestService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class MbtiTestServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that calculateScores method calculates scores correctly.
     */
    public function test_it_calculates_scores_correctly(): void
    {
        // Arrange - Sahte soru verileri oluştur
        $question1 = Question::create([
            'question_text' => 'Test Question 1',
            'dimension' => 'E/I',
            'option_a_value' => 'E',
            'option_b_value' => 'I'
        ]);

        $question2 = Question::create([
            'question_text' => 'Test Question 2',
            'dimension' => 'S/N',
            'option_a_value' => 'S',
            'option_b_value' => 'N'
        ]);

        $question3 = Question::create([
            'question_text' => 'Test Question 3',
            'dimension' => 'T/F',
            'option_a_value' => 'T',
            'option_b_value' => 'F'
        ]);

        $question4 = Question::create([
            'question_text' => 'Test Question 4',
            'dimension' => 'J/P',
            'option_a_value' => 'J',
            'option_b_value' => 'P'
        ]);

        // Kullanıcı tüm sorularda 'A' seçeneğini seçmiş
        $submittedAnswers = [
            $question1->id => 'A',
            $question2->id => 'A',
            $question3->id => 'A',
            $question4->id => 'A'
        ];

        // Act - MbtiTestService'ten bir örnek oluştur ve calculateScores metodunu çağır
        $mbtiTestService = new MbtiTestService();
        $result = $mbtiTestService->calculateScores($submittedAnswers);

        // Assert - Beklenen sonuçları doğrula
        $expectedScores = [
            'E' => 1,
            'I' => 0,
            'S' => 1,
            'N' => 0,
            'T' => 1,
            'F' => 0,
            'J' => 1,
            'P' => 0
        ];

        $this->assertEquals($expectedScores, $result);
    }

    /**
     * Test that calculateScores method calculates scores correctly with mixed answers.
     */
    public function test_it_calculates_scores_correctly_with_mixed_answers(): void
    {
        // Arrange - Sahte soru verileri oluştur
        $question1 = Question::create([
            'question_text' => 'Test Question 1',
            'dimension' => 'E/I',
            'option_a_value' => 'E',
            'option_b_value' => 'I'
        ]);

        $question2 = Question::create([
            'question_text' => 'Test Question 2',
            'dimension' => 'S/N',
            'option_a_value' => 'S',
            'option_b_value' => 'N'
        ]);

        $question3 = Question::create([
            'question_text' => 'Test Question 3',
            'dimension' => 'T/F',
            'option_a_value' => 'T',
            'option_b_value' => 'F'
        ]);

        $question4 = Question::create([
            'question_text' => 'Test Question 4',
            'dimension' => 'J/P',
            'option_a_value' => 'J',
            'option_b_value' => 'P'
        ]);

        // Kullanıcı karışık seçenekler seçmiş (A, B, A, B)
        $submittedAnswers = [
            $question1->id => 'A', // E
            $question2->id => 'B', // N
            $question3->id => 'A', // T
            $question4->id => 'B'  // P
        ];

        // Act - MbtiTestService'ten bir örnek oluştur ve calculateScores metodunu çağır
        $mbtiTestService = new MbtiTestService();
        $result = $mbtiTestService->calculateScores($submittedAnswers);

        // Assert - Beklenen sonuçları doğrula
        $expectedScores = [
            'E' => 1,
            'I' => 0,
            'S' => 0,
            'N' => 1,
            'T' => 1,
            'F' => 0,
            'J' => 0,
            'P' => 1
        ];

        $this->assertEquals($expectedScores, $result);
    }

    /**
     * Test that calculateScores method handles invalid question IDs gracefully.
     */
    public function test_it_handles_invalid_question_ids_gracefully(): void
    {
        // Arrange - Sadece bir geçerli soru oluştur
        $validQuestion = Question::create([
            'question_text' => 'Valid Question',
            'dimension' => 'E/I',
            'option_a_value' => 'E',
            'option_b_value' => 'I'
        ]);

        // Geçerli ve geçersiz soru ID'leri karışık
        $submittedAnswers = [
            $validQuestion->id => 'A', // Geçerli soru
            999 => 'A',                // Geçersiz soru ID'si
            1000 => 'B'                // Başka bir geçersiz soru ID'si
        ];

        // Act - MbtiTestService'ten bir örnek oluştur ve calculateScores metodunu çağır
        $mbtiTestService = new MbtiTestService();
        $result = $mbtiTestService->calculateScores($submittedAnswers);

        // Assert - Sadece geçerli sorunun skorlanması beklenir
        $expectedScores = [
            'E' => 1,
            'I' => 0,
            'S' => 0,
            'N' => 0,
            'T' => 0,
            'F' => 0,
            'J' => 0,
            'P' => 0
        ];

        $this->assertEquals($expectedScores, $result);
    }

    /**
     * Test that determineMbtiType method determines MBTI type correctly with clear winners.
     */
    public function test_it_determines_mbti_type_correctly(): void
    {
        // Arrange - Her boyutta net bir kazananın olduğu skorlar
        $scores = [
            'E' => 5, 'I' => 2,
            'S' => 6, 'N' => 1,
            'T' => 7, 'F' => 0,
            'J' => 4, 'P' => 3
        ];

        // Act - MbtiTestService'ten bir örnek oluştur ve determineMbtiType metodunu çağır
        $mbtiTestService = new MbtiTestService();
        $result = $mbtiTestService->determineMbtiType($scores);

        // Assert - Beklenen MBTI tipinin döndürüldüğünü doğrula
        $this->assertEquals('ESTJ', $result);
    }

    /**
     * Test that determineMbtiType method determines MBTI type correctly when scores are tied.
     */
    public function test_it_determines_mbti_type_correctly_when_scores_are_tied(): void
    {
        // Arrange - En az bir boyutta skorların eşit olduğu durum
        // Beraberlik durumunda E, S, T, J tercih edilmeli (>= operatörü sayesinde)
        $scores = [
            'E' => 3, 'I' => 3, // Beraberlik - E tercih edilmeli
            'S' => 5, 'N' => 2, // S kazanıyor
            'T' => 4, 'F' => 4, // Beraberlik - T tercih edilmeli
            'J' => 1, 'P' => 6  // P kazanıyor
        ];

        // Act - MbtiTestService'ten bir örnek oluştur ve determineMbtiType metodunu çağır
        $mbtiTestService = new MbtiTestService();
        $result = $mbtiTestService->determineMbtiType($scores);

        // Assert - Beraberlik kurallarını doğru uygulayan MBTI tipini doğrula
        $this->assertEquals('ESTP', $result);
    }

    /**
     * Test that commitPendingResultToDatabase method commits pending result from session to database.
     */
    public function test_it_commits_pending_result_from_session_to_database(): void
    {
        // Arrange - Bir kullanıcı oluştur
        $user = User::factory()->create();

        // Test için sahte session verisi hazırla
        $pendingResult = [
            'mbti_type' => 'INFP',
            'scores' => [
                'E' => 1,
                'I' => 6,
                'S' => 2,
                'N' => 5,
                'T' => 3,
                'F' => 4,
                'J' => 2,
                'P' => 5
            ],
            'status' => 'pending_registration'
        ];

        // Session'a veriyi ekle
        Session::put('pending_test_result', $pendingResult);

        // Act - MbtiTestService'ten bir örnek oluştur ve commitPendingResultToDatabase metodunu çağır
        $mbtiTestService = new MbtiTestService();
        $mbtiTestService->commitPendingResultToDatabase($user);

        // Assert - Veritabanı kontrolü
        $this->assertDatabaseHas('test_results', [
            'user_id' => $user->id,
            'mbti_type' => 'INFP',
            'e_score' => 1,
            'i_score' => 6,
            's_score' => 2,
            'n_score' => 5,
            't_score' => 3,
            'f_score' => 4,
            'j_score' => 2,
            'p_score' => 5,
            'status' => 'pending_payment'
        ]);

        // Assert - Session kontrolü
        $this->assertFalse(Session::has('pending_test_result'));
    }

    /**
     * Test that processTestResults method processes test results and returns correct data structure.
     */
    public function test_it_processes_test_results_and_returns_correct_data_structure(): void
    {
        // Arrange - 4 farklı boyutta soru oluştur
        $question1 = Question::create([
            'question_text' => 'Test Question 1',
            'dimension' => 'E/I',
            'option_a_value' => 'E',
            'option_b_value' => 'I'
        ]);

        $question2 = Question::create([
            'question_text' => 'Test Question 2',
            'dimension' => 'S/N',
            'option_a_value' => 'S',
            'option_b_value' => 'N'
        ]);

        $question3 = Question::create([
            'question_text' => 'Test Question 3',
            'dimension' => 'T/F',
            'option_a_value' => 'T',
            'option_b_value' => 'F'
        ]);

        $question4 = Question::create([
            'question_text' => 'Test Question 4',
            'dimension' => 'J/P',
            'option_a_value' => 'J',
            'option_b_value' => 'P'
        ]);

        // Karışık cevap seti oluştur
        $submittedAnswers = [
            $question1->id => 'A', // E
            $question2->id => 'B', // N
            $question3->id => 'A', // T
            $question4->id => 'B'  // P
        ];

        // Beklenen skorları tanımla
        $expectedScores = [
            'E' => 1,
            'I' => 0,
            'S' => 0,
            'N' => 1,
            'T' => 1,
            'F' => 0,
            'J' => 0,
            'P' => 1
        ];

        // Beklenen MBTI tipini tanımla
        $expectedMbtiType = 'ENTP';

        // Act - MbtiTestService'ten bir örnek oluştur ve processTestResults metodunu çağır
        $mbtiTestService = new MbtiTestService();
        $result = $mbtiTestService->processTestResults($submittedAnswers);

        // Assert - Dönen sonucun bir dizi olduğunu doğrula
        $this->assertIsArray($result);

        // Assert - Dönen dizide 'scores' ve 'mbti_type' anahtarlarının bulunduğunu doğrula
        $this->assertArrayHasKey('scores', $result);
        $this->assertArrayHasKey('mbti_type', $result);

        // Assert - Dönen dizinin 'scores' anahtarındaki değerin beklenen skorlar ile aynı olduğunu doğrula
        $this->assertEquals($expectedScores, $result['scores']);

        // Assert - Dönen dizinin 'mbti_type' anahtarındaki değerin beklenen MBTI tipi ile aynı olduğunu doğrula
        $this->assertEquals($expectedMbtiType, $result['mbti_type']);
    }

    /**
     * Test that savePendingResultToSession method saves pending result to session correctly.
     */
    public function test_it_saves_pending_result_to_session_correctly(): void
    {
        // Arrange - processTestResults'ten dönebilecek gibi sahte bir $testData dizisi oluştur
        $testData = [
            'mbti_type' => 'ENTJ',
            'scores' => [
                'E' => 5,
                'I' => 2,
                'S' => 3,
                'N' => 4,
                'T' => 6,
                'F' => 1,
                'J' => 7,
                'P' => 0
            ]
        ];

        // Act - MbtiTestService'ten bir örnek oluştur ve savePendingResultToSession metodunu çağır
        $mbtiTestService = new MbtiTestService();
        $mbtiTestService->savePendingResultToSession($testData);

        // Assert - Anahtar Kontrolü: pending_test_result anahtarının session'da var olduğunu doğrula
        $this->assertTrue(Session::has('pending_test_result'));

        // Assert - Değer Kontrolü: Session'dan veriyi al ve beklenen yapıya sahip olup olmadığını doğrula
        $sessionData = Session::get('pending_test_result');

        // Assert - Aldığın verinin 'mbti_type' anahtarının 'ENTJ' olduğunu doğrula
        $this->assertEquals('ENTJ', $sessionData['mbti_type']);

        // Assert - Aldığın verinin 'scores' anahtarının, hazırladığın skor dizisiyle aynı olduğunu doğrula
        $this->assertEquals($testData['scores'], $sessionData['scores']);

        // Assert - Aldığın verinin 'status' anahtarının 'pending_registration' olarak ayarlandığını doğrula
        $this->assertEquals('pending_registration', $sessionData['status']);
    }
}
