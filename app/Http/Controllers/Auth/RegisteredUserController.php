<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UserRegisteredWelcome;
use App\Models\User;
use App\Services\MbtiTestService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Test sonrası kayıt/giriş sayfasını gösterir.
     */
    public function showRegisterOrLogin(): View
    {
        return view('auth.register-or-login');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, MbtiTestService $mbtiTestService): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Hoş geldiniz e-postasını gönder
        Mail::to($user->email)->send(new UserRegisteredWelcome($user));

        // Session'da bekleyen test sonucunu işle
        $testResult = $mbtiTestService->commitPendingResultToDatabase($user);

        if ($testResult) {
            // Eğer bir test sonucu kaydedildiyse, ödeme sayfasına yönlendir
            return redirect()->route('test.payment', ['testResult' => $testResult->id]);
        }

        // Bekleyen bir test sonucu yoksa, normal dashboard'a yönlendir

        return redirect(route('dashboard', absolute: false));
    }
}
