<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // beginTest metodu için eklendi ve showQuestions metodu için kullanılıyor
use Illuminate\View\View;    // start metodu için ve showQuestions metodunun dönüş tipi için
use Illuminate\Support\Facades\Redirect; // Yönlendirme için (veya sadece use Redirect;)
use Illuminate\Support\Facades\Cookie; // Dil tercihi kontrolü için
use Illuminate\Support\Facades\Cache; // Performans optimizasyonu için
// Alternatif olarak, global redirect() helper'ı kullandığımız için bu satır
// zorunlu olmayabilir, ancak açıkça belirtmek iyi bir pratiktir.
// Ayrıca, metodun dönüş tipini belirtmek için RedirectResponse da eklenebilir:
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Question;
use App\Models\TestResult;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Services\MbtiTestService;
use App\Services\PaymentService;
use App\Services\ReportService;
use App\Models\MbtiTypeDetail;
use App\Services\GeoIpService;
use App\Models\UserAnswer;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    
      use AuthorizesRequests; 
    /**
     * Displays the test starting page ('test.start' view).
     *
     * Checks for an unfinished test for the logged-in user or guest session and redirects accordingly.
     * Also handles logic for showing a language selection modal on a user's first visit.
     * Passes the user's name to the view for personalization.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\GeoIpService  $geoIpService
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function start(Request $request, GeoIpService $geoIpService): View|RedirectResponse
    {
        $user = Auth::user();

        // 1. First, check if the logged-in user has an unfinished test
        if ($user) {
            $unfinishedTest = $user->testResults()
                                   ->whereIn('status', ['in_progress', 'pending_payment'])
                                   ->latest('updated_at') // Get the most recently updated unfinished test
                                   ->first();
            
            if ($unfinishedTest) {
                // Redirect to payment page if pending payment, or to questions if test is in progress
                $targetRoute = $unfinishedTest->status === 'pending_payment' ? 'test.payment' : 'test.questions';
                return redirect()->route($targetRoute, ['testResult' => $unfinishedTest->id]);
            }
        }

        // 2. If no logged-in user or no unfinished test, check guest session
        $activeTestId = $request->session()->get('active_test_result_id');

        if ($activeTestId) {
            $testResult = TestResult::find($activeTestId);

            if ($testResult && $testResult->status === 'in_progress') {
                // Redirect the guest user to the questions of their unfinished test
                return redirect()->route('test.questions', ['testResult' => $testResult->id]);
            }
        }

        // Get the logged-in user's name, or use empty string if not logged in
        $userName = Auth::check() ? Auth::user()->name : '';
        
        // Initialize variables
        $showLanguageModal = false;
        $shouldSetPromptCookie = false;
        
        // First check: Does language_preference cookie exist?
        $languagePreference = $request->cookie('language_preference');
        
        if (!$languagePreference) {
            // Second check: Does has_been_prompted_for_lang cookie exist?
            $hasBeenPrompted = $request->cookie('has_been_prompted_for_lang');
            
            if (!$hasBeenPrompted) {
                // User's actual first visit
                $shouldSetPromptCookie = true;
                
                // Get user's browser language preference
                $preferredLanguage = $request->getPreferredLanguage(['tr', 'en']);
                
                if ($preferredLanguage === 'tr') {
                    $showLanguageModal = true;
                } else {
                    // If browser language is not 'tr', check IP location
                    $userIp = $request->ip();
                    if ($geoIpService->isIpFromTurkey($userIp)) {
                        $showLanguageModal = true;
                    }
                }
            } else {
                // User has visited before but hasn't made a language selection
                // Only check browser language, don't check IP location
                $preferredLanguage = $request->getPreferredLanguage(['tr', 'en']);
                
                if ($preferredLanguage === 'tr') {
                    $showLanguageModal = true;
                }
            }
        }
        
        return view('test.start', compact('userName', 'showLanguageModal', 'shouldSetPromptCookie'));
    }

    /**
     * Validates and stores the user's name, creates a new test session, and redirects to the questions page.
     *
     * Handles both logged-in users and guests. Stores the language preference and
     * creates a new TestResult record to track the test progress.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function beginTest(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $name = $request->input('name');
        
        // Get language preference - from the form first, then cookie, then default to 'en'
        $language = $request->input('lang')
            ?? $request->cookie('language_preference')
            ?? 'en';

        // Create a new TestResult record to track this test session
        $testResult = TestResult::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'guest_name' => Auth::guest() ? $name : null,
            'status' => 'in_progress',
            'mbti_type' => 'PEND',
        ]);
        
        // Store only the test ID in session to track which test the user is taking
        $request->session()->put('active_test_result_id', $testResult->id);
        
        // Store language preference in global session for SetTestLanguage middleware
        $request->session()->put('test_language', $language);

        return redirect()->route('test.questions', ['testResult' => $testResult]);
    }

    /**
     * Displays the questions page and passes the user's name to the view.
     *
     * Retrieves all test questions with caching for performance optimization
     * and loads any previously answered questions for this test.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\View\View
     */
    public function showQuestions(Request $request, TestResult $testResult): View
    {
        // Get user name from TestResult or session
        $userName = $testResult->guest_name ?? ($testResult->user ? $testResult->user->name : 'Guest');
        
        // Performance optimization: Only fetch required columns and cache the results
        $questions = Cache::remember('test_questions_all', now()->addHours(24), function () {
            return Question::select(['id', 'question_text', 'option_a_text', 'option_b_text'])->get();
        });

        // Fetch previously given answers for this test
        $initialAnswers = $testResult->userAnswers()
                                      ->pluck('chosen_option', 'question_id')
                                      ->toArray();

        return view('test.questions', [
            'userName' => $userName,
            'questions' => $questions,
            'testResult' => $testResult, // For creating the correct form action URL
            'initialAnswers' => $initialAnswers,
        ]);
    }

    /**
     * Saves a single answer during the test via AJAX.
     *
     * Provides real-time progress saving functionality. Validates user authorization
     * and saves or updates the user's answer for a specific question.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TestResult $testResult
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveProgress(Request $request, TestResult $testResult)
    {
        // Security check: Does the user own this test or is it the test in session?
        $activeTestId = $request->session()->get('active_test_result_id');
        
        // Session control for guest users
        if ($testResult->id !== $activeTestId) {
            // For logged-in users, also check via policy if needed
            if (Auth::check() && Auth::id() !== $testResult->user_id) {
                return response()->json(['error' => 'Unauthorized user for this test.'], 403);
            }
            if (!Auth::check() && $testResult->id !== $activeTestId) {
                return response()->json(['error' => 'Unauthorized session for this test.'], 403);
            }
        }

        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'chosen_option' => 'required|in:A,B',
        ]);

        UserAnswer::updateOrCreate(
            [
                'test_result_id' => $testResult->id,
                'question_id'    => $validated['question_id'],
            ],
            [
                'chosen_option' => $validated['chosen_option'],
            ]
        );

        return response()->json(['success' => true, 'message' => 'Progress saved.']);
    }

    /**
     * Processes and saves all test answers, calculates MBTI scores, and redirects accordingly.
     *
     * Handles the final test submission, performs security checks, saves all answers using upsert
     * for performance, calculates MBTI type and scores, and determines the next step based on
     * user authentication status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\MbtiTestService  $mbtiTestService
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function submitAnswers(Request $request, MbtiTestService $mbtiTestService, TestResult $testResult): JsonResponse|RedirectResponse
    {
        // 1. Security Check: Verify that the active_test_result_id in session matches the testResult ID from route
        if ($request->session()->get('active_test_result_id') !== $testResult->id) {
            abort(403, 'Unauthorized submission.');
        }

        // 2. Get and Save Answers
        $rawAnswers = $request->input('answers', []);
        
        // Use upsert to save all answers in a single query (N+1 problem solution)
        $answersToUpsert = [];
        foreach ($rawAnswers as $questionId => $chosenOption) {
            $answersToUpsert[] = [
                'test_result_id' => $testResult->id,
                'question_id' => $questionId,
                'chosen_option' => $chosenOption,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        if (!empty($answersToUpsert)) {
            UserAnswer::upsert(
                $answersToUpsert,
                ['test_result_id', 'question_id'], // Unique key
                ['chosen_option', 'updated_at']   // Columns to update
            );
        }

        // 3. Calculate Scores
        $processedData = $mbtiTestService->processTestResults($rawAnswers);

        // 4. Update TestResult Record
        $testResult->update([
            'mbti_type' => $processedData['mbti_type'],
            'e_score' => $processedData['scores']['E'],
            'i_score' => $processedData['scores']['I'],
            's_score' => $processedData['scores']['S'],
            'n_score' => $processedData['scores']['N'],
            't_score' => $processedData['scores']['T'],
            'f_score' => $processedData['scores']['F'],
            'j_score' => $processedData['scores']['J'],
            'p_score' => $processedData['scores']['P'],
            'status' => Auth::check() ? 'pending_payment' : 'pending_registration',
        ]);

        // 5. Clean Up Session
        $request->session()->forget('test_language');
        // Keep active_test_result_id in session as we'll need this ID after login/registration

        // 6. Determine URL for AJAX Response
        $redirectUrl = '';
        if (Auth::check()) {
            // Get payment page URL for logged-in user
            $redirectUrl = route('test.payment', ['testResult' => $testResult->id]);
        } else {
            // Get registration/login page URL for guest user
            $redirectUrl = route('auth.showRegisterOrLogin');
            // Add flash message to session, as this might behave like a non-AJAX request
            $request->session()->flash('mbti_type', $testResult->mbti_type);
        }

        return response()->json([
            'success' => true,
            'redirect_url' => $redirectUrl,
        ]);
    }

    /**
     * Displays the payment page.
     *
     * Shows the payment page for users who have completed the test.
     * Redirects to results if payment is already completed.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showPaymentPage(TestResult $testResult)
    {
        // Authorization check with policy
        $this->authorize('accessPayment', $testResult);
        
        // If report is already paid for, redirect directly to results page
        if ($testResult->status === 'completed') {
            return redirect()->route('test.showResult', ['testResult' => $testResult->id]);
        }
        
        // If payment is pending, show payment page
        return view('test.payment', compact('testResult'));
    }

    /**
     * Displays the paid test results.
     *
     * Shows the complete MBTI test results including type details and scores.
     * Only accessible for completed tests with proper authorization.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\View\View
     */
    public function showResult(TestResult $testResult)
    {
        // Authorization check with policy (ownership + completion status)
        $this->authorize('viewResult', $testResult);
        
        // Gather required data to display the report
        $mbtiTypeDetail = MbtiTypeDetail::where('mbti_type', $testResult->mbti_type)->first();
        
        $scores = [
            'E' => $testResult->e_score, 'I' => $testResult->i_score,
            'S' => $testResult->s_score, 'N' => $testResult->n_score,
            'T' => $testResult->t_score, 'F' => $testResult->f_score,
            'J' => $testResult->j_score, 'P' => $testResult->p_score,
        ];
        
        $mbtiType = $testResult->mbti_type;
        
        return view('test.results', compact('mbtiType', 'scores', 'mbtiTypeDetail', 'testResult'));
    }

    /**
     * Downloads the PDF report.
     *
     * Generates and downloads a PDF version of the MBTI test results.
     * Requires proper authorization and completed test status.
     *
     * @param  \App\Models\TestResult  $testResult
     * @param  \App\Services\ReportService  $reportService
     * @return \Illuminate\Http\Response
     */
    public function downloadReport(TestResult $testResult, ReportService $reportService)
    {
        // Authorization check with policy (ownership + completion status)
        $this->authorize('download', $testResult);
        
        return $reportService->generatePdfReport($testResult);
    }

    /**
     * Completes the mock payment process and sets the test result to completed status.
     *
     * Handles the successful payment flow, updates the test status, and redirects
     * the user to the results page with a success message.
     *
     * @param  \App\Models\TestResult  $testResult
     * @param  \App\Services\PaymentService  $paymentService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleSuccessfulPayment(TestResult $testResult, PaymentService $paymentService): RedirectResponse
    {
        // Authorization check with policy
        $this->authorize('processPayment', $testResult);

        // Use PaymentService to handle payment processing
        $paymentService->handleSuccessfulPayment($testResult);

        // Redirect user to results page with success message
        return redirect()->route('test.showResult', ['testResult' => $testResult->id])
            ->with('success', 'Your payment has been completed successfully. You can now access your report.');
    }

    /**
     * Displays the user dashboard page.
     *
     * Lists all test results for the logged-in user, ordered by creation date.
     * Provides users with an overview of their test history and access to their results.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard(): View
    {
        // Get all test results for the logged-in user
        $testResults = Auth::user()->testResults()->orderBy('created_at', 'desc')->get();
        
        return view('dashboard', compact('testResults'));
    }
}