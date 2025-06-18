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

        // Session'da bekleyen test sonucunu kontrol et
        if (session()->has('active_test_result_id')) {
            $testResultId = session('active_test_result_id');
            $testResult = TestResult::find($testResultId);
            
            // Güvenlik kontrolleri: test var mı ve user_id null mu?
            if ($testResult && $testResult->user_id === null) {
                // Testi kullanıcıya ata
                $testResult->user_id = Auth::user()->id;
                $testResult->guest_name = null;
                $testResult->status = 'pending_payment';
                $testResult->save();
                
                // Session'ı temizle
                session()->forget('active_test_result_id');
                
                // Ödeme sayfasına yönlendir
                return redirect()->route('test.payment', ['testResult' => $testResult->id]);
            }
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
