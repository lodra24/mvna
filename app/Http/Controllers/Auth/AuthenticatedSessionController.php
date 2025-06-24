<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\MbtiTestService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Traits\RecaptchaValidation;

class AuthenticatedSessionController extends Controller
{
    use RecaptchaValidation;
    
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
    public function store(LoginRequest $request, MbtiTestService $mbtiTestService): RedirectResponse
    {
        // reCAPTCHA doğrulaması
        $token = $request->input('g-recaptcha-response');
        
        if (!$this->validateRecaptcha($token, 'login')) {
            return redirect()->back()
                ->withErrors(['email' => 'reCAPTCHA validation failed. Please try again.'])
                ->withInput();
        }

        $request->authenticate();

        $request->session()->regenerate();

        // Session'da bekleyen test sonucunu kullanıcıya ata
        $testResult = $mbtiTestService->assignPendingTestToUser(Auth::user());
        
        if ($testResult) {
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
