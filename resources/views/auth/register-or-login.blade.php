@extends('layouts.test-layout')

@section('page-title', '')
@section('page-subtitle', '')

@section('content')
<div class="auth-page-container test-fade-in">
    <!-- Header Section -->
    <div class="auth-header">
        @if(session('mbti_type'))
            <h1 class="auth-title">Your Result: <span class="result-type">{{ session('mbti_type') }}!</span></h1>
            <p class="auth-subtitle">Register or log in to access your report.</p>
        @else
            <h1 class="auth-title">Create Account or <span class="gradient-text">Log In</span></h1>
            <p class="auth-subtitle">Please register or log in with your existing account to access your test results.</p>
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
                Login
            </button>
            <button class="auth-tab" data-tab="register">
                <svg class="tab-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                Register
            </button>
        </div>

        <!-- Forms Container -->
        <div class="forms-container">
            <!-- Login Form -->
            <div class="auth-form-panel active" id="login-panel">
                <div class="form-header">
                    <h2 class="form-title">Login</h2>
                    <p class="form-subtitle">Log in to your account to access your test results</p>
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
                            Your Email Address
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
                            placeholder="example@email.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="input-error" />
                    </div>

                    <!-- Password -->
                    <div class="input-group test-form-element">
                        <label for="login_password" class="input-label">
                            <svg class="label-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Your Password
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
                            <span class="remember-text">Remember Me</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                Forgot Password?
                            </a>
                        @endif
                    </div>

                    <!-- reCAPTCHA hidden input -->
                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response-login">

                    <!-- Submit Button -->
                    <div class="form-submit test-form-element">
                        <button type="submit" class="submit-button">
                            <svg class="button-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Login
                        </button>
                    </div>
                </form>

                <!-- Google Auth Separator for Login -->
                <div class="relative flex items-center justify-center my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-3 bg-white text-slate-500 font-medium">or</span>
                    </div>
                </div>

                <!-- Google Login Button -->
                <div class="mb-4">
                    <a href="{{ route('auth.google.redirect') }}" class="group w-full inline-flex justify-center items-center gap-3 py-3 px-4 border border-slate-300 rounded-xl shadow-sm bg-white text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:border-slate-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 hover:shadow-md">
                        <!-- Google SVG Logo -->
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" viewBox="0 0 48 48">
                            <path fill="#4285F4" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            <path fill="#34A853" d="M43.611,20.083L43.595,20L24,20v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571l5.657,5.657C39.818,35.533,44,30.347,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            <path fill="#FBBC05" d="M9.878,26.414c-1.396-4.145-1.396-8.87,0-13.014L4.221,7.743C1.536,13.298,1.536,19.702,4.221,25.257L9.878,26.414z"></path>
                            <path fill="#EA4335" d="M24,48c5.268,0,10.046-2.053,13.571-5.571l-5.657-5.657c-1.856,1.405-3.821,2.228-6.087,2.228c-5.223,0-9.654-3.343-11.303-8H4.221c2.684,5.454,8.128,9,14.779,9H24z"></path>
                            <path fill="none" d="M0,0h48v48H0z"></path>
                        </svg>
                        <span class="sr-only">Continue with Google</span>
                        Continue with Google
                    </a>
                </div>
            </div>

            <!-- Register Form -->
            <div class="auth-form-panel" id="register-panel">
                <div class="form-header">
                    <h2 class="form-title">Create Account</h2>
                    <p class="form-subtitle">Create a new account to access your test results</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="auth-form" id="register-form">
                    @csrf

                    <!-- Name -->
                    <div class="input-group test-form-element">
                        <label for="register_name" class="input-label">
                            <svg class="label-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Full Name
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
                            placeholder="Full Name"
                        />
                        <x-input-error :messages="$errors->get('name')" class="input-error" />
                    </div>

                    <!-- Email -->
                    <div class="input-group test-form-element">
                        <label for="register_email" class="input-label">
                            <svg class="label-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                            Your Email Address
                        </label>
                        <input
                            id="register_email"
                            class="form-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="example@email.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="input-error" />
                    </div>

                    <!-- Password -->
                    <div class="input-group test-form-element">
                        <label for="register_password" class="input-label">
                            <svg class="label-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Your Password
                        </label>
                        <input
                            id="register_password"
                            class="form-input"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="At least 8 characters"
                        />
                        <x-input-error :messages="$errors->get('password')" class="input-error" />
                    </div>

                    <!-- Password Confirmation -->
                    <div class="input-group test-form-element">
                        <label for="register_password_confirmation" class="input-label">
                            <svg class="label-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Confirm Password
                        </label>
                        <input
                            id="register_password_confirmation"
                            class="form-input"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Re-enter your password"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="input-error" />
                    </div>

                    <!-- reCAPTCHA hidden input -->
                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response-register">

                    <!-- Submit Button -->
                    <div class="form-submit test-form-element">
                        <button type="submit" class="submit-button">
                            <svg class="button-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Create Account
                        </button>
                    </div>
                </form>

                <!-- Google Auth Separator for Register -->
                <div class="relative flex items-center justify-center my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-3 bg-white text-slate-500 font-medium">or</span>
                    </div>
                </div>

                <!-- Google Register Button -->
                <div class="mb-4">
                    <a href="{{ route('auth.google.redirect') }}" class="group w-full inline-flex justify-center items-center gap-3 py-3 px-4 border border-slate-300 rounded-xl shadow-sm bg-white text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:border-slate-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 hover:shadow-md">
                        <!-- Google SVG Logo -->
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" viewBox="0 0 48 48">
                            <path fill="#4285F4" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            <path fill="#34A853" d="M43.611,20.083L43.595,20L24,20v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571l5.657,5.657C39.818,35.533,44,30.347,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            <path fill="#FBBC05" d="M9.878,26.414c-1.396-4.145-1.396-8.87,0-13.014L4.221,7.743C1.536,13.298,1.536,19.702,4.221,25.257L9.878,26.414z"></path>
                            <path fill="#EA4335" d="M24,48c5.268,0,10.046-2.053,13.571-5.571l-5.657-5.657c-1.856,1.405-3.821,2.228-6.087,2.228c-5.223,0-9.654-3.343-11.303-8H4.221c2.684,5.454,8.128,9,14.779,9H24z"></path>
                            <path fill="none" d="M0,0h48v48H0z"></path>
                        </svg>
                        <span class="sr-only">Continue with Google</span>
                        Continue with Google
                    </a>
                </div>
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
    min-height: 800px;
    padding-bottom: 2rem;
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
    min-height: 800px;
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
    
    // Enhanced form submission with reCAPTCHA
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    
    // Login form submission with reCAPTCHA
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Always prevent default first
            
            @if(Cookie::get('laravel_cookie_consent'))
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'login'})
                        .then(function(token) {
                            document.getElementById('g-recaptcha-response-login').value = token;
                            
                            const submitButton = loginForm.querySelector('.submit-button');
                            submitButton.style.opacity = '0.7';
                            submitButton.style.cursor = 'not-allowed';
                            
                            // Add loading state
                            submitButton.innerHTML = `
                                <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Processing...
                            `;
                            
                            loginForm.submit();
                        });
                });
            @else
                // Submit without reCAPTCHA if no cookie consent
                const submitButton = loginForm.querySelector('.submit-button');
                submitButton.style.opacity = '0.7';
                submitButton.style.cursor = 'not-allowed';
                submitButton.innerHTML = `
                    <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Processing...
                `;
                loginForm.submit();
            @endif
        });
    }
    
    // Register form submission with reCAPTCHA
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Always prevent default first
            
            @if(Cookie::get('laravel_cookie_consent'))
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'register'})
                        .then(function(token) {
                            document.getElementById('g-recaptcha-response-register').value = token;
                            
                            const submitButton = registerForm.querySelector('.submit-button');
                            submitButton.style.opacity = '0.7';
                            submitButton.style.cursor = 'not-allowed';
                            
                            // Add loading state
                            submitButton.innerHTML = `
                                <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Processing...
                            `;
                            
                            registerForm.submit();
                        });
                });
            @else
                // Submit without reCAPTCHA if no cookie consent
                const submitButton = registerForm.querySelector('.submit-button');
                submitButton.style.opacity = '0.7';
                submitButton.style.cursor = 'not-allowed';
                submitButton.innerHTML = `
                    <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Processing...
                `;
                registerForm.submit();
            @endif
        });
    }
});
</script>
@endsection