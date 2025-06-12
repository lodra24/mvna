<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\MbtiTestService;
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
    public function store(LoginRequest $request, MbtiTestService $mbtiTestService): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Session'da bekleyen test sonucunu işle
        $testResult = $mbtiTestService->commitPendingResultToDatabase(Auth::user());

        if ($testResult) {
            // Eğer bir test sonucu kaydedildiyse, ödeme sayfasına yönlendir
            return redirect()->route('test.payment', ['testResult' => $testResult->id]);
        }

        // Bekleyen bir test sonucu yoksa, normal dashboard'a yönlendir
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
