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
use App\Http\Traits\RecaptchaValidation;

class RegisteredUserController extends Controller
{
    use RecaptchaValidation;
    
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
        // reCAPTCHA doğrulaması
        $token = $request->input('g-recaptcha-response');
        
        if (!$this->validateRecaptcha($token, 'register')) {
            return redirect()->back()
                ->withErrors(['recaptcha' => 'reCAPTCHA validation failed. Please try again.'])
                ->withInput();
        }

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

        // Session'da bekleyen test sonucunu kullanıcıya ata
        $testResult = $mbtiTestService->assignPendingTestToUser($user);
        
        if ($testResult) {
            return redirect()->route('test.payment', ['testResult' => $testResult->id]);
        }

        return redirect(route('dashboard', absolute: false));
    }
}
