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

        // Session'da bekleyen test sonucu var mı kontrol et
        if (session()->has('pending_test_result')) {
            $testResultData = session('pending_test_result');
            
            // Test sonucunu veritabanına kaydet
            $testResult = TestResult::create([
                'user_id' => $user->id,
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

        return redirect(route('dashboard', absolute: false));
    }
}
