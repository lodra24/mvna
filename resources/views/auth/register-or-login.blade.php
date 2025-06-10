@extends('layouts.test-layout')

@section('page-title', '')
@section('page-subtitle', '')

@section('content')
<div class="auth-page-container test-fade-in">
    <!-- Header Section -->
    <div class="auth-header">
        @if(session('mbti_type'))
            <h1 class="auth-title">Sonucunuz: <span class="result-type">{{ session('mbti_type') }}!</span></h1>
            <p class="auth-subtitle">Raporunuza erişmek için kayıt olun veya giriş yapın.</p>
        @else
            <h1 class="auth-title">Hesap Oluşturun veya <span class="gradient-text">Giriş Yapın</span></h1>
            <p class="auth-subtitle">Test sonucunuza erişmek için lütfen kayıt olun veya mevcut hesabınızla giriş yapın.</p>
        @endif
    </div>

    <!-- Auth Forms Container -->
    <div class="auth-forms-wrapper">
        <!-- Tab Navigation -->
        <div class="auth-tabs">
            <button class="auth-tab active" data-tab="login">
                <svg class="tab-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
                Giriş Yap
            </button>
            <button class="auth-tab" data-tab="register">
                <svg class="tab-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                Kayıt Ol
            </button>
        </div>

        <!-- Forms Container -->
        <div class="forms-container">
            <!-- Login Form -->
            <div class="auth-form-panel active" id="login-panel">
                <div class="form-header">
                    <h2 class="form-title">Giriş Yap</h2>
                    <p class="form-subtitle">Hesabınıza giriş yaparak test sonucunuza erişin</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="session-status" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="auth-form" id="login-form">
                    @csrf

                    <!-- Email -->
                    <div class="input-group test-form-element">
                        <label for="login_email" class="input-label">
                            <svg class="label-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                            Email Adresiniz
                        </label>
                        <input
                            id="login_email"
                            class="form-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="ornek@email.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="input-error" />
                    </div>

                    <!-- Password -->
                    <div class="input-group test-form-element">
                        <label for="login_password" class="input-label">
                            <svg class="label-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Şifreniz
                        </label>
                        <input
                            id="login_password"
                            class="form-input"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                        />
                        <x-input-error :messages="$errors->get('password')" class="input-error" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="form-options test-form-element">
                        <label class="remember-label">
                            <input type="checkbox" name="remember" class="remember-checkbox">
                            <span class="checkmark"></span>
                            <span class="remember-text">Beni Hatırla</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                Şifremi Unuttum
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="form-submit test-form-element">
                        <button type="submit" class="submit-button">
                            <svg class="button-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Giriş Yap
                        </button>
                    </div>
                </form>
            </div>

            <!-- Register Form -->
            <div class="auth-form-panel" id="register-panel">
                <div class="form-header">
                    <h2 class="form-title">Hesap Oluştur</h2>
                    <p class="form-subtitle">Yeni bir hesap oluşturarak test sonucunuza erişin</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="auth-form" id="register-form">
                    @csrf

                    <!-- Name -->
                    <div class="input-group test-form-element">
                        <label for="register_name" class="input-label">
                            <svg class="label-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Adınız Soyadınız
                        </label>
                        <input
                            id="register_name"
                            class="form-input"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Adınız Soyadınız"
                        />
                        <x-input-error :messages="$errors->get('name')" class="input-error" />
                    </div>

                    <!-- Email -->
                    <div class="input-group test-form-element">
                        <label for="register_email" class="input-label">
                            <svg class="label-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                            Email Adresiniz
                        </label>
                        <input
                            id="register_email"
                            class="form-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="ornek@email.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="input-error" />
                    </div>

                    <!-- Password -->
                    <div class="input-group test-form-element">
                        <label for="register_password" class="input-label">
                            <svg class="label-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Şifreniz
                        </label>
                        <input
                            id="register_password"
                            class="form-input"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="En az 8 karakter"
                        />
                        <x-input-error :messages="$errors->get('password')" class="input-error" />
                    </div>

                    <!-- Password Confirmation -->
                    <div class="input-group test-form-element">
                        <label for="register_password_confirmation" class="input-label">
                            <svg class="label-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Şifre Onayı
                        </label>
                        <input
                            id="register_password_confirmation"
                            class="form-input"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Şifrenizi tekrar girin"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="input-error" />
                    </div>

                    <!-- Submit Button -->
                    <div class="form-submit test-form-element">
                        <button type="submit" class="submit-button">
                            <svg class="button-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Hesap Oluştur
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Styles -->
<style>
/* Main Container */
.auth-page-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
    min-height: calc(100vh - 200px);
}

/* Header Styles */
.auth-header {
    text-align: center;
    margin-bottom: 3rem;
}


.auth-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.result-type {
    background: linear-gradient(135deg, #4f46e5, #10B981);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 900;
}

.gradient-text {
    background: linear-gradient(135deg, #4f46e5, #10B981);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.auth-subtitle {
    font-size: 1.125rem;
    color: #6b7280;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Forms Wrapper */
.auth-forms-wrapper {
    max-width: 500px;
    margin: 0 auto;
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    overflow: hidden;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Tab Navigation */
.auth-tabs {
    display: flex;
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
}

.auth-tab {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 1rem 1.5rem;
    background: none;
    border: none;
    font-weight: 600;
    color: #64748b;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.auth-tab.active {
    color: #4f46e5;
    background: white;
}

.auth-tab.active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(135deg, #4f46e5, #10B981);
    border-radius: 3px 3px 0 0;
}

.tab-icon {
    width: 1.25rem;
    height: 1.25rem;
}

/* Forms Container */
.forms-container {
    position: relative;
    min-height: 650px;
}

.auth-form-panel {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    padding: 2rem;
    opacity: 0;
    transform: translateX(20px);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    pointer-events: none;
    min-height: 650px;
}

.auth-form-panel.active {
    opacity: 1;
    transform: translateX(0);
    pointer-events: auto;
}

/* Form Header */
.form-header {
    text-align: center;
    margin-bottom: 2rem;
}

.form-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.form-subtitle {
    color: #6b7280;
    font-size: 0.875rem;
}

/* Session Status */
.session-status {
    margin-bottom: 1.5rem;
    padding: 0.75rem 1rem;
    background: #dbeafe;
    border: 1px solid #93c5fd;
    border-radius: 8px;
    color: #1e40af;
    font-size: 0.875rem;
}

/* Input Groups */
.input-group {
    margin-bottom: 1.5rem;
}

.input-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.label-icon {
    width: 1rem;
    height: 1rem;
    color: #6b7280;
}

.form-input {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: rgba(248, 250, 252, 0.5);
    backdrop-filter: blur(5px);
}

.form-input:focus {
    outline: none;
    border-color: #4f46e5;
    box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
    background: white;
    transform: translateY(-1px);
}

.form-input::placeholder {
    color: #9ca3af;
}

.input-error {
    color: #ef4444;
    font-size: 0.75rem;
    margin-top: 0.25rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Form Options */
.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.remember-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    font-size: 0.875rem;
    color: #374151;
}

.remember-checkbox {
    position: relative;
    width: 1.25rem;
    height: 1.25rem;
    appearance: none;
    border: 2px solid #d1d5db;
    border-radius: 4px;
    transition: all 0.2s ease;
}

.remember-checkbox:checked {
    background: #4f46e5;
    border-color: #4f46e5;
}

.remember-checkbox:checked::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 0.75rem;
    font-weight: bold;
}

.forgot-link {
    color: #4f46e5;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    transition: color 0.2s ease;
}

.forgot-link:hover {
    color: #3730a3;
}

/* Submit Button */
.form-submit {
    margin-top: 2rem;
}

.submit-button {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 1rem 1.5rem;
    background: linear-gradient(135deg, #4f46e5, #10B981);
    color: white;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.3);
}

.submit-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4);
}

.submit-button:active {
    transform: translateY(0);
}

.button-icon {
    width: 1.25rem;
    height: 1.25rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .auth-page-container {
        padding: 1rem;
    }
    
    .auth-title {
        font-size: 2rem;
    }
    
    .auth-forms-wrapper {
        margin: 0;
        border-radius: 16px;
    }
    
    .auth-form-panel {
        padding: 1.5rem;
    }
    
    .auth-tab {
        padding: 0.875rem 1rem;
        font-size: 0.875rem;
    }
    
    .tab-icon {
        width: 1rem;
        height: 1rem;
    }
}

/* Animation Enhancements */
@keyframes slideInFromRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInFromLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.auth-form-panel.slide-in-right {
    animation: slideInFromRight 0.4s ease-out;
}

.auth-form-panel.slide-in-left {
    animation: slideInFromLeft 0.4s ease-out;
}
</style>

<!-- Enhanced JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.auth-tab');
    const panels = document.querySelectorAll('.auth-form-panel');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const targetTab = this.dataset.tab;
            
            // Remove active class from all tabs and panels
            tabs.forEach(t => t.classList.remove('active'));
            panels.forEach(p => {
                p.classList.remove('active');
                p.classList.remove('slide-in-right', 'slide-in-left');
            });
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Show target panel with animation
            const targetPanel = document.getElementById(targetTab + '-panel');
            if (targetPanel) {
                setTimeout(() => {
                    targetPanel.classList.add('active');
                    if (targetTab === 'register') {
                        targetPanel.classList.add('slide-in-right');
                    } else {
                        targetPanel.classList.add('slide-in-left');
                    }
                }, 50);
            }
        });
    });
    
    // Form validation enhancements
    const forms = document.querySelectorAll('.auth-form');
    forms.forEach(form => {
        const inputs = form.querySelectorAll('.form-input');
        
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateInput(this);
            });
            
            input.addEventListener('input', function() {
                if (this.classList.contains('error')) {
                    validateInput(this);
                }
            });
        });
    });
    
    function validateInput(input) {
        const value = input.value.trim();
        const type = input.type;
        let isValid = true;
        
        if (input.hasAttribute('required') && !value) {
            isValid = false;
        } else if (type === 'email' && value && !isValidEmail(value)) {
            isValid = false;
        } else if (type === 'password' && value && value.length < 8) {
            isValid = false;
        }
        
        if (isValid) {
            input.classList.remove('error');
            input.style.borderColor = '#10B981';
        } else {
            input.classList.add('error');
            input.style.borderColor = '#ef4444';
        }
    }
    
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Enhanced form submission
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitButton = this.querySelector('.submit-button');
            submitButton.style.opacity = '0.7';
            submitButton.style.cursor = 'not-allowed';
            
            // Add loading state
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = `
                <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                İşleniyor...
            `;
        });
    });
});
</script>
@endsection