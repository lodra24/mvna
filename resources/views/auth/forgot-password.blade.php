<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Reset Password</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @if(Cookie::get('laravel_cookie_consent'))
        @if($settings->site_custom_scripts)
            {!! $settings->site_custom_scripts !!}
        @endif
    @endif
</head>
<body class="font-sans text-gray-900 antialiased">
    <!-- Main Reset Password Container -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-50 via-white to-indigo-50 geometric-hexagon geometric-floating relative overflow-hidden">
        
        <!-- Background Pattern Effects -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 left-0 w-96 h-96 bg-mindmetrics-indigo/10 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-mindmetrics-green/10 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>
            <div class="absolute bottom-0 right-20 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-6000"></div>
        </div>

        <!-- Reset Password Card -->
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
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-4">
                        Reset Your Password
                    </h2>
                    <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 mb-6">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-mindmetrics-indigo mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-sm text-slate-600 leading-relaxed">
                                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reset Password Form Card -->
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

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                    class="block w-full pl-10 pr-3 py-3 border border-slate-300 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-mindmetrics-indigo focus:border-transparent transition-all duration-200 bg-white/50 backdrop-blur-sm hover:bg-white/70"
                                    placeholder="Enter your email address">
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

                        <!-- Send Reset Link Button -->
                        <div>
                            <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-gradient-to-r from-mindmetrics-indigo to-mindmetrics-green hover:from-mindmetrics-indigo/90 hover:to-mindmetrics-green/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mindmetrics-indigo shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-white/80 group-hover:text-white transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </span>
                                Email Password Reset Link
                            </button>
                        </div>

                        <!-- Back to Login Link -->
                        <div class="text-center pt-4 border-t border-slate-200">
                            <p class="text-sm text-slate-600">
                                Remember your password?
                                <a href="{{ route('login') }}" class="font-semibold text-mindmetrics-indigo hover:text-mindmetrics-green transition-colors duration-200 ml-1">
                                    Sign in here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Card Bottom Decoration -->
                <div class="px-8 py-4 bg-gradient-to-r from-mindmetrics-indigo/5 to-mindmetrics-green/5 border-t border-slate-200/50">
                    <div class="text-center text-xs text-slate-500 space-y-1">
                        <p class="flex items-center justify-center">
                            <svg class="w-4 h-4 text-mindmetrics-green mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                            Secure password reset • GDPR compliant
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
    
    @if(Cookie::get('laravel_cookie_consent'))
        @if($settings->site_body_scripts)
            {!! $settings->site_body_scripts !!}
        @endif
    @endif
</body>
</html>
