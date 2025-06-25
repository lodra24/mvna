<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    
    @if(Cookie::get('laravel_cookie_consent'))
        @if($settings->site_custom_scripts)
            {!! $settings->site_custom_scripts !!}
        @endif
    @endif
</head>
<body class="font-sans text-gray-900 antialiased">
    <!-- Main Login Container -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-50 via-white to-indigo-50 geometric-hexagon geometric-floating relative overflow-hidden">
        
        <!-- Background Pattern Effects -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 left-0 w-96 h-96 bg-mindmetrics-indigo/10 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-mindmetrics-green/10 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>
            <div class="absolute bottom-0 right-20 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-6000"></div>
        </div>

        <!-- Login Card -->
        <div class="relative z-10 max-w-md w-full space-y-8">
            <!-- Header Section -->
            <div class="text-center">
                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <a href="/" class="flex items-center space-x-3 group">
                        <div class="w-12 h-12 bg-gradient-to-br from-mindmetrics-indigo to-mindmetrics-green rounded-xl shadow-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                            <svg class="h-7 w-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-1.5m-6-16.5v.008c0 .19-.16.34-.347.347H10.586A.346.346 0 0110.24 4.5v-.007A.344.344 0 0110.586 4h2.828c.19 0 .347.157.347.347zm-3.375 0h.008v.008h-.008V4.5z" />
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-slate-800 group-hover:text-mindmetrics-indigo transition-colors duration-200">MindMetrics</span>
                    </a>
                </div>

                <!-- Welcome Message -->
                <div class="mb-8">
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-2">
                        Welcome Back
                    </h2>
                    <p class="text-slate-600">
                        Sign in to your account and continue your personality analysis
                    </p>
                </div>
            </div>

            <!-- Login Form Card -->
            <div class="bg-white/80 backdrop-blur-md shadow-2xl rounded-2xl border border-white/20 overflow-hidden">
                <div class="px-8 py-10">
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-6 p-4 bg-mindmetrics-green/10 border border-mindmetrics-green/20 rounded-xl">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <p class="text-sm text-mindmetrics-green font-medium">{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Session Error -->
                    @if (session('error'))
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-red-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <p class="text-sm text-red-600 font-medium">{{ session('error') }}</p>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">
                                Your Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                    class="block w-full pl-10 pr-3 py-3 border border-slate-300 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-mindmetrics-indigo focus:border-transparent transition-all duration-200 bg-white/50 backdrop-blur-sm hover:bg-white/70"
                                    placeholder="example@email.com">
                            </div>
                            @error('email')
                                <div class="mt-2 flex items-center text-red-600">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-sm">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                                Your Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>
                                <input id="password" type="password" name="password" required autocomplete="current-password"
                                    class="block w-full pl-10 pr-3 py-3 border border-slate-300 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-mindmetrics-indigo focus:border-transparent transition-all duration-200 bg-white/50 backdrop-blur-sm hover:bg-white/70"
                                    placeholder="••••••••">
                            </div>
                            @error('password')
                                <div class="mt-2 flex items-center text-red-600">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-sm">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="flex items-center">
                                <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-mindmetrics-indigo focus:ring-mindmetrics-indigo border-slate-300 rounded transition-colors duration-200">
                                <span class="ml-2 text-sm text-slate-600">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-mindmetrics-indigo hover:text-mindmetrics-green font-medium transition-colors duration-200" href="{{ route('password.request') }}">
                                    Forgot your password?
                                </a>
                            @endif
                        </div>

                        <!-- reCAPTCHA Hidden Input -->
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response-login-page">

                        <!-- Login Button -->
                        <div>
                            <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-gradient-to-r from-mindmetrics-indigo to-mindmetrics-green hover:from-mindmetrics-indigo/90 hover:to-mindmetrics-green/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mindmetrics-indigo shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-white/80 group-hover:text-white transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>
                                </span>
                                Sign In
                            </button>
                        </div>
                    </form>

                    <!-- Google Auth Separator -->
                    <div class="relative flex items-center justify-center my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-slate-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-3 bg-white text-slate-500 font-medium">or</span>
                        </div>
                    </div>

                    <!-- Google Login Button -->
                    <div class="mb-6">
                        <a href="{{ route('auth.google.redirect') }}" class="group w-full inline-flex justify-center items-center gap-3 py-3 px-4 border border-slate-300 rounded-xl shadow-sm bg-white text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:border-slate-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mindmetrics-indigo transition-all duration-200 hover:shadow-md">
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

                    <!-- Register Link -->
                    <div class="text-center pt-4 border-t border-slate-200">
                        <p class="text-sm text-slate-600">
                            Don't have an account yet?
                            <a href="{{ route('register') }}" class="font-semibold text-mindmetrics-indigo hover:text-mindmetrics-green transition-colors duration-200 ml-1">
                                Sign up now
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Card Bottom Decoration -->
                <div class="px-8 py-4 bg-gradient-to-r from-mindmetrics-indigo/5 to-mindmetrics-green/5 border-t border-slate-200/50">
                    <div class="text-center text-xs text-slate-500 space-y-1">
                        <p class="flex items-center justify-center">
                            <svg class="w-4 h-4 text-mindmetrics-green mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                            Secure login • GDPR compliant
                        </p>
                    </div>
                </div>
            </div>

            <!-- Back to Home Link -->
            <div class="text-center">
                <a href="/" class="inline-flex items-center text-sm text-slate-600 hover:text-mindmetrics-indigo transition-colors duration-200 font-medium">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Homepage
                </a>
            </div>
        </div>
    </div>
    
    <!-- Form Submit JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.querySelector('form'); // Bu sayfada tek form olduğu için bu şekilde seçebiliriz.
        if (loginForm) {
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // reCAPTCHA validation
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ config("services.recaptcha.site_key") }}', {action: 'login'}).then(function(token) {
                        document.getElementById('g-recaptcha-response-login-page').value = token;
                        loginForm.submit();
                    });
                });
            });
        }
    });
    </script>
    
    @if(Cookie::get('laravel_cookie_consent'))
        @if($settings->site_body_scripts)
            {!! $settings->site_body_scripts !!}
        @endif
    @endif
</body>
</html>
