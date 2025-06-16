<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $settings = app(App\Settings\GeneralSettings::class);
    @endphp
    <title>Terms of Service - MindMetrics</title>
    <meta name="description" content="Read our Terms of Service to understand the rules and guidelines for using MindMetrics MBTI personality assessment services.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if($settings->site_custom_scripts)
        {!! $settings->site_custom_scripts !!}
    @endif
</head>
<body class="antialiased">
    <!-- HEADER / NAVIGATION -->
    <header class="w-full bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center space-x-2">
                        <svg class="h-8 w-auto text-mindmetrics-indigo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-1.5m-6-16.5v.008c0 .19-.16.34-.347.347H10.586A.346.346 0 0110.24 4.5v-.007A.344.344 0 0110.586 4h2.828c.19 0 .347.157.347.347zm-3.375 0h.008v.008h-.008V4.5z" />
                        </svg>
                        <span class="text-2xl font-bold text-slate-800">MindMetrics</span>
                    </a>
                </div>
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/" class="nav-link">Home</a>
                    <a href="/#features" class="nav-link">Features</a>
                    <a href="/#pricing" class="nav-link">Pricing</a>
                    <a href="/#faq" class="nav-link">FAQ</a>
                    @guest
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-mindmetrics-indigo bg-mindmetrics-indigo-light hover:bg-indigo-200 rounded-md transition-colors duration-200">
                            Sign In
                        </a>
                    @endguest
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-mindmetrics-indigo bg-mindmetrics-indigo-light hover:bg-indigo-200 rounded-md transition-colors duration-200">
                            {{ Auth::user()->name }}
                        </a>
                    @endauth
                </nav>
                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-slate-500 hover:text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" id="menu-icon-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="h-6 w-6 hidden" id="menu-icon-close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-50">Home</a>
                <a href="/#features" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-50">Features</a>
                <a href="/#pricing" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-50">Pricing</a>
                <a href="/#faq" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-50">FAQ</a>
            </div>
            <div class="pt-4 pb-3 border-t border-slate-200">
                <div class="px-5">
                    @guest
                        <a href="{{ route('login') }}" class="block w-full px-4 py-2 text-center text-base font-medium text-mindmetrics-indigo bg-mindmetrics-indigo-light hover:bg-indigo-200 rounded-md">Sign In</a>
                    @endguest
                    @auth
                        <a href="{{ route('dashboard') }}" class="block w-full px-4 py-2 text-center text-base font-medium text-mindmetrics-indigo bg-mindmetrics-indigo-light hover:bg-indigo-200 rounded-md">{{ Auth::user()->name }}</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- TERMS OF SERVICE CONTENT -->
    <main class="bg-gradient-to-b from-slate-50 via-white to-slate-50 geometric-grid relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-purple-50 opacity-30"></div>
            <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center px-4 py-1.5 mb-6 text-xs font-semibold tracking-wider text-mindmetrics-indigo uppercase bg-mindmetrics-indigo-light/70 rounded-full">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 011.394.928l-.001.048L18 6l-.001.048a1 1 0 01-1.394.928L14.954 6.18l.046.194V8a1 1 0 11-2 0V6.977L10 5.956 7 6.977V8a1 1 0 11-2 0V6.374l.046-.194L2.395 6.976a1 1 0 01-1.394-.928L1 6l-.001-.048a1 1 0 011.394-.928L6.046 6.606 10 5.024V3a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Legal Terms
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight mb-6">
                    Terms of <span class="text-mindmetrics-indigo">Service</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg sm:text-xl text-slate-600 mb-8 leading-relaxed">
                    These terms govern your use of MindMetrics and our MBTI personality assessment services.
                </p>
                <div class="flex items-center justify-center text-sm text-slate-500">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    Last updated: December 16, 2024
                </div>
            </div>

            <!-- Terms of Service Content -->
            <div class="prose prose-lg prose-slate max-w-none">
                <!-- Introduction -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-mindmetrics-indigo to-indigo-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Welcome to MindMetrics</h2>
                            <p class="text-slate-600 leading-relaxed">
                                These Terms of Service ("Terms") govern your use of the MindMetrics website and our MBTI personality assessment services. By accessing or using our services, you agree to be bound by these Terms. If you do not agree to these Terms, please do not use our services.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Acceptance of Terms -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-mindmetrics-green to-emerald-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Acceptance of Terms</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    By creating an account, making a purchase, or using any part of our services, you acknowledge that you have read, understood, and agree to these Terms.
                                </p>
                                <div class="bg-slate-50 rounded-lg p-4">
                                    <h3 class="font-semibold text-slate-800 mb-2">You must be:</h3>
                                    <ul class="list-disc list-inside space-y-1 ml-4 text-sm">
                                        <li>At least 16 years of age to use our services</li>
                                        <li>Legally capable of entering into binding agreements</li>
                                        <li>Not prohibited from using our services under applicable law</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Use of Service -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Permitted Use</h2>
                            <div class="space-y-3 text-slate-600">
                                <p class="leading-relaxed">
                                    You may use our services for personal, non-commercial purposes in accordance with these Terms.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Take personality assessments for personal insight</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Access and download your personalized reports</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Share results with others for legitimate purposes</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>Contact our support team for assistance</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prohibited Uses -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L5.636 5.636"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Prohibited Activities</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    You agree not to engage in any of the following prohibited activities:
                                </p>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div class="bg-red-50 rounded-lg p-4 border border-red-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 text-red-800">Technical Abuse</h3>
                                        <ul class="text-sm space-y-1">
                                            <li>• Reverse engineering our assessments</li>
                                            <li>• Automated data scraping or extraction</li>
                                            <li>• Circumventing security measures</li>
                                        </ul>
                                    </div>
                                    <div class="bg-red-50 rounded-lg p-4 border border-red-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 text-red-800">Commercial Misuse</h3>
                                        <ul class="text-sm space-y-1">
                                            <li>• Reselling or redistributing our content</li>
                                            <li>• Using results for employment decisions</li>
                                            <li>• Creating competing services</li>
                                        </ul>
                                    </div>
                                    <div class="bg-red-50 rounded-lg p-4 border border-red-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 text-red-800">Harmful Conduct</h3>
                                        <ul class="text-sm space-y-1">
                                            <li>• Harassing other users or staff</li>
                                            <li>• Transmitting malicious code</li>
                                            <li>• Violating applicable laws</li>
                                        </ul>
                                    </div>
                                    <div class="bg-red-50 rounded-lg p-4 border border-red-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 text-red-800">Account Violations</h3>
                                        <ul class="text-sm space-y-1">
                                            <li>• Creating fake accounts</li>
                                            <li>• Sharing account credentials</li>
                                            <li>• Impersonating others</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Accounts -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">User Accounts</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    To access certain features, you may need to create an account. You are responsible for maintaining the security of your account.
                                </p>
                                <div class="space-y-3">
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Account Security</h3>
                                        <p class="text-sm">You are responsible for all activities that occur under your account. Use strong passwords and keep your login credentials confidential.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Accurate Information</h3>
                                        <p class="text-sm">Provide accurate and complete information when creating your account and keep it updated.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Account Termination</h3>
                                        <p class="text-sm">We may suspend or terminate accounts that violate these Terms or for other legitimate business reasons.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Terms -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Payment Terms</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    Some of our services require payment. Here are the terms that apply to paid services.
                                </p>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Pricing</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">Current pricing is displayed on our website and may change with notice.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Payment Processing</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">Payments are processed securely through third-party payment providers.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Refunds</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">Refunds may be available within 30 days of purchase for unused services.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Billing</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">All fees are charged immediately upon purchase unless otherwise stated.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Intellectual Property -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Intellectual Property</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    All content, features, and functionality on our platform are owned by MindMetrics and are protected by international copyright, trademark, and other intellectual property laws.
                                </p>
                                <div class="space-y-3">
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Our Content</h3>
                                        <p class="text-sm">Assessment questions, algorithms, reports, and website content remain our exclusive property.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Your Results</h3>
                                        <p class="text-sm">You own your assessment results and may use them for personal purposes.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Limited License</h3>
                                        <p class="text-sm">We grant you a limited, non-exclusive license to use our services for permitted purposes only.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Disclaimers -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Important Disclaimers</h2>
                            <div class="space-y-4 text-slate-600">
                                <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-lg p-6 border border-yellow-200">
                                    <h3 class="font-semibold text-slate-800 mb-3">Assessment Limitations</h3>
                                    <ul class="text-sm space-y-2">
                                        <li>• Our assessments are for personal insight and self-reflection purposes only</li>
                                        <li>• Results should not be used for medical, psychological, or employment decisions</li>
                                        <li>• Personality assessments are tools for understanding, not definitive judgments</li>
                                        <li>• Individual results may vary and are not guaranteed to be 100% accurate</li>
                                    </ul>
                                </div>
                                <div class="bg-slate-50 rounded-lg p-4">
                                    <h3 class="font-semibold text-slate-800 mb-2">Service Availability</h3>
                                    <p class="text-sm">We strive for 99.9% uptime but cannot guarantee uninterrupted service availability.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Limitation of Liability -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Limitation of Liability</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    To the maximum extent permitted by law, MindMetrics shall not be liable for any indirect, incidental, special, consequential, or punitive damages.
                                </p>
                                <div class="bg-red-50 rounded-lg p-4 border border-red-100">
                                    <p class="text-sm">
                                        <strong>Maximum Liability:</strong> Our total liability to you for any claims arising from your use of our services shall not exceed the amount you paid us in the 12 months preceding the claim.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Changes to Terms -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Changes to These Terms</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    We may update these Terms from time to time to reflect changes in our services or applicable law. We will notify you of significant changes.
                                </p>
                                <div class="bg-slate-50 rounded-lg p-4">
                                    <h3 class="font-semibold text-slate-800 mb-2">How We Notify You</h3>
                                    <ul class="text-sm space-y-1">
                                        <li>• Email notification for material changes</li>
                                        <li>• Website banner for important updates</li>
                                        <li>• Updated timestamp on this page</li>
                                    </ul>
                                </div>
                                <p class="text-sm">
                                    Your continued use of our services after changes take effect constitutes acceptance of the updated Terms.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-gradient-to-br from-mindmetrics-indigo to-indigo-700 rounded-2xl shadow-xl p-8 md:p-12 mb-12 text-white">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-white/20 rounded-xl mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold mb-3">Contact Us</h2>
                            <div class="space-y-4">
                                <p class="leading-relaxed opacity-90">
                                    If you have any questions about these Terms of Service, please don't hesitate to contact us.
                                </p>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                        <h3 class="font-semibold mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            Email
                                        </h3>
                                        <a href="mailto:legal@mindmetrics.com" class="text-white/90 hover:text-white underline">
                                            legal@mindmetrics.com
                                        </a>
                                    </div>
                                    <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                        <h3 class="font-semibold mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Response Time
                                        </h3>
                                        <p class="text-white/90 text-sm">
                                            We typically respond within 24-48 hours
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                    <h3 class="font-semibold mb-2">Related Policies</h3>
                                    <div class="flex flex-wrap gap-3">
                                        <a href="{{ route('privacy-policy') }}" class="text-white/90 hover:text-white underline text-sm">
                                            Privacy Policy
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <div class="flex items-center justify-center space-x-2 mb-4">
                    <svg class="h-8 w-auto text-mindmetrics-indigo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-1.5m-6-16.5v.008c0 .19-.16.34-.347.347H10.586A.346.346 0 0110.24 4.5v-.007A.344.344 0 0110.586 4h2.828c.19 0 .347.157.347.347zm-3.375 0h.008v.008h-.008V4.5z" />
                    </svg>
                    <span class="text-2xl font-bold">MindMetrics</span>
                </div>
                <p class="text-slate-400 mb-6">Discover your personality type with our comprehensive MBTI assessment.</p>
                <div class="flex justify-center space-x-6 mb-8">
                    <a href="/" class="text-slate-400 hover:text-white transition-colors duration-200">Home</a>
                    <a href="{{ route('privacy-policy') }}" class="text-slate-400 hover:text-white transition-colors duration-200">Privacy Policy</a>
                    <a href="{{ route('terms-of-service') }}" class="text-slate-400 hover:text-white transition-colors duration-200">Terms of Service</a>
                </div>
                <div class="border-t border-slate-700 pt-8">
                    <p class="text-slate-400 text-sm">
                        © 2024 MindMetrics. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIconOpen = document.getElementById('menu-icon-open');
            const menuIconClose = document.getElementById('menu-icon-close');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    const isHidden = mobileMenu.classList.contains('hidden');
                    
                    if (isHidden) {
                        mobileMenu.classList.remove('hidden');
                        menuIconOpen.classList.add('hidden');
                        menuIconClose.classList.remove('hidden');
                        mobileMenuButton.setAttribute('aria-expanded', 'true');
                    } else {
                        mobileMenu.classList.add('hidden');
                        menuIconOpen.classList.remove('hidden');
                        menuIconClose.classList.add('hidden');
                        mobileMenuButton.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });
    </script>
</body>
</html>