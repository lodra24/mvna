<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\TestResult;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Session'da bekleyen test sonucu var mı kontrol et
        if (session()->has('pending_test_result')) {
            $testResultData = session('pending_test_result');
            
            // Test sonucunu veritabanına kaydet
            $testResult = TestResult::create([
                'user_id' => Auth::id(),
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
            
            // Session'daki pending test result'ı temizle
            session()->forget('pending_test_result');
            
            // Kullanıcıyı ödeme sayfasına yönlendir
            return redirect()->route('test.payment', ['testResult' => $testResult->id]);
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
