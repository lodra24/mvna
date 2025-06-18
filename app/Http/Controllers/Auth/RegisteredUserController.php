<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UserRegisteredWelcome;
use App\Models\User;
use App\Models\TestResult;
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
    public function store(Request $request): RedirectResponse
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

        // Session'da bekleyen test sonucunu kontrol et
        if (session()->has('active_test_result_id')) {
            $testResultId = session('active_test_result_id');
            $testResult = TestResult::find($testResultId);
            
            // Güvenlik kontrolleri: test var mı ve user_id null mu?
            if ($testResult && $testResult->user_id === null) {
                // Testi kullanıcıya ata
                $testResult->user_id = $user->id;
                $testResult->guest_name = null;
                $testResult->status = 'pending_payment';
                $testResult->save();
                
                // Session'ı temizle
                session()->forget('active_test_result_id');
                
                // Ödeme sayfasına yönlendir
                return redirect()->route('test.payment', ['testResult' => $testResult->id]);
            }
        }

        return redirect(route('dashboard', absolute: false));
    }
}
