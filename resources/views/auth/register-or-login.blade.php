@extends('layouts.test-layout')

@section('content')
<div class="test-container">
    <div class="test-header">
        @if(session('mbti_type'))
            <h1 class="test-title">Sonucunuz: {{ session('mbti_type') }}!</h1>
            <p class="test-subtitle">Raporunuza erişmek için kayıt olun veya giriş yapın.</p>
        @else
            <h1 class="test-title">Hesap Oluşturun veya Giriş Yapın</h1>
            <p class="test-subtitle">Test sonucunuza erişmek için lütfen kayıt olun veya mevcut hesabınızla giriş yapın.</p>
        @endif
    </div>

    <div class="auth-forms-container">
        <!-- Kayıt Ol Formu -->
        <div class="auth-form-section">
            <h2 class="auth-form-title">Kayıt Ol</h2>
            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <!-- İsim -->
                <div class="form-group">
                    <x-input-label for="register_name" :value="__('İsim')" />
                    <x-text-input id="register_name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="form-error" />
                </div>

                <!-- Email -->
                <div class="form-group">
                    <x-input-label for="register_email" :value="__('Email')" />
                    <x-text-input id="register_email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="form-error" />
                </div>

                <!-- Şifre -->
                <div class="form-group">
                    <x-input-label for="register_password" :value="__('Şifre')" />
                    <x-text-input id="register_password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="form-error" />
                </div>

                <!-- Şifre Onayı -->
                <div class="form-group">
                    <x-input-label for="register_password_confirmation" :value="__('Şifre Onayı')" />
                    <x-text-input id="register_password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="form-error" />
                </div>

                <div class="form-actions">
                    <x-primary-button class="submit-btn">
                        {{ __('Kayıt Ol') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <!-- Giriş Yap Formu -->
        <div class="auth-form-section">
            <h2 class="auth-form-title">Giriş Yap</h2>
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <x-input-label for="login_email" :value="__('Email')" />
                    <x-text-input id="login_email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="form-error" />
                </div>

                <!-- Şifre -->
                <div class="form-group">
                    <x-input-label for="login_password" :value="__('Şifre')" />
                    <x-text-input id="login_password" class="form-input" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="form-error" />
                </div>

                <!-- Beni Hatırla -->
                <div class="form-group">
                    <label for="remember_me" class="remember-label">
                        <input id="remember_me" type="checkbox" class="remember-checkbox" name="remember">
                        <span class="remember-text">{{ __('Beni Hatırla') }}</span>
                    </label>
                </div>

                <div class="form-actions">
                    @if (Route::has('password.request'))
                        <a class="forgot-password-link" href="{{ route('password.request') }}">
                            {{ __('Şifrenizi mi unuttunuz?') }}
                        </a>
                    @endif

                    <x-primary-button class="submit-btn">
                        {{ __('Giriş Yap') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.auth-forms-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    max-width: 1000px;
    margin: 2rem auto;
    padding: 0 1rem;
}

.auth-form-section {
    background: white;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
}

.auth-form-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 1.5rem;
    text-align: center;
    border-bottom: 2px solid #3b82f6;
    padding-bottom: 0.5rem;
}

.auth-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 1rem;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.form-input:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-error {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.form-actions {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-top: 1rem;
}

.submit-btn {
    width: 100%;
    padding: 0.75rem 1.5rem;
    background-color: #3b82f6;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.2s;
}

.submit-btn:hover {
    background-color: #2563eb;
}

.remember-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
}

.remember-checkbox {
    width: 1rem;
    height: 1rem;
}

.remember-text {
    font-size: 0.875rem;
    color: #374151;
}

.forgot-password-link {
    color: #3b82f6;
    text-decoration: none;
    font-size: 0.875rem;
    text-align: center;
}

.forgot-password-link:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .auth-forms-container {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .auth-form-section {
        padding: 1.5rem;
    }
}
</style>
@endsection