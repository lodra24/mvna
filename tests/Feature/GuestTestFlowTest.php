<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class GuestTestFlowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a guest can complete the test and is redirected to register.
     */
    public function test_a_guest_can_complete_the_test_and_is_redirected_to_register(): void
    {
        // Arrange: Create questions for each MBTI dimension
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

        // Act & Assert: Step 1 - Start the test
        $response = $this->post(route('test.begin'), ['name' => 'Test Guest']);
        $response->assertRedirect(route('test.questions'));

        // Act & Assert: Step 2 - Submit answers
        $answers = [
            $question1->id => 'A', // E
            $question2->id => 'B', // N
            $question3->id => 'A', // T
            $question4->id => 'B'  // P
        ];

        $response = $this->post(route('test.submit'), ['answers' => $answers]);
        
        // Assert redirection to register/login page
        $response->assertRedirect(route('auth.showRegisterOrLogin'));
        
        // Assert session has pending test result
        $response->assertSessionHas('pending_test_result');
        
        // Assert session has correct MBTI type
        $response->assertSessionHas('mbti_type', 'ENTP');

        // Act & Assert: Step 3 - Register user
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Find the newly created user and their test result
        $user = User::where('email', 'test@example.com')->first();
        $testResult = $user->testResults()->first();

        // Assert redirection to payment page
        $response->assertRedirect(route('test.payment', ['testResult' => $testResult]));

        // Assert user is now authenticated
        $this->assertAuthenticatedAs($user);

        // Assert pending_test_result is removed from session
        $response->assertSessionMissing('pending_test_result');

        // Assert test result is created in database with correct data
        $this->assertDatabaseHas('test_results', [
            'user_id' => $user->id,
            'mbti_type' => 'ENTP',
            'status' => 'pending_payment'
        ]);
    }
}
