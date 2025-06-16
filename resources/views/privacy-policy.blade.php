<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $settings = app(App\Settings\GeneralSettings::class);
    @endphp
    <title>Privacy Policy - MindMetrics</title>
    <meta name="description" content="Learn how MindMetrics protects your privacy and handles your personal data in our comprehensive privacy policy.">
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

    <!-- PRIVACY POLICY CONTENT -->
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
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Privacy & Security
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight mb-6">
                    Privacy <span class="text-mindmetrics-indigo">Policy</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg sm:text-xl text-slate-600 mb-8 leading-relaxed">
                    Your privacy is our priority. Learn how we collect, use, and protect your personal information.
                </p>
                <div class="flex items-center justify-center text-sm text-slate-500">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    Last updated: December 16, 2024
                </div>
            </div>

            <!-- Privacy Policy Content -->
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
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Introduction</h2>
                            <p class="text-slate-600 leading-relaxed">
                                Welcome to MindMetrics ("we," "our," or "us"). We are committed to protecting your personal information and your right to privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our MBTI personality assessment services.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Information We Collect -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-mindmetrics-green to-emerald-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Information We Collect</h2>
                            <div class="space-y-4 text-slate-600">
                                <div>
                                    <h3 class="font-semibold text-slate-800 mb-2">Personal Information</h3>
                                    <ul class="list-disc list-inside space-y-1 ml-4">
                                        <li>Name and email address when you create an account</li>
                                        <li>Contact information when you reach out to us</li>
                                        <li>Payment information processed securely through our payment providers</li>
                                    </ul>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-slate-800 mb-2">Assessment Data</h3>
                                    <ul class="list-disc list-inside space-y-1 ml-4">
                                        <li>Your responses to our MBTI personality assessment questions</li>
                                        <li>Assessment results and personality type analysis</li>
                                        <li>Usage patterns and preferences within our platform</li>
                                    </ul>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-slate-800 mb-2">Technical Information</h3>
                                    <ul class="list-disc list-inside space-y-1 ml-4">
                                        <li>IP address, browser type, and device information</li>
                                        <li>Cookies and similar tracking technologies</li>
                                        <li>Website usage statistics and analytics data</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- How We Use Your Information -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">How We Use Your Information</h2>
                            <div class="space-y-3 text-slate-600">
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Provide and deliver our MBTI personality assessment services</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Generate personalized personality reports and insights</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Communicate with you about your account and our services</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Improve our services and develop new features</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Ensure security and prevent fraudulent activities</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Comply with legal obligations and protect our rights</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Information Sharing -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Information Sharing and Disclosure</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    We do not sell, trade, or rent your personal information to third parties. We may share your information only in the following circumstances:
                                </p>
                                <div class="space-y-3">
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Service Providers</h3>
                                        <p class="text-sm">We may share information with trusted third-party service providers who assist us in operating our website and providing our services, subject to confidentiality agreements.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Legal Requirements</h3>
                                        <p class="text-sm">We may disclose information when required by law or to protect our rights, property, or safety, or that of our users or others.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Business Transfers</h3>
                                        <p class="text-sm">In the event of a merger, acquisition, or sale of assets, your information may be transferred as part of the transaction.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Security -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Data Security</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.
                                </p>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Encryption</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">All data is encrypted in transit and at rest using industry-standard protocols.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Access Control</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">Strict access controls ensure only authorized personnel can access your data.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Regular Monitoring</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">We continuously monitor our systems for potential security threats.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Data Backup</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">Regular secure backups ensure your data is protected against loss.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Your Rights -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Your Rights</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    You have certain rights regarding your personal information. These rights may vary depending on your location and applicable laws.
                                </p>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-4 border border-blue-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 flex items-center">
                                            <svg class="w-4 h-4 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Access
                                        </h3>
                                        <p class="text-sm">Request a copy of the personal information we hold about you.</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-lg p-4 border border-green-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 flex items-center">
                                            <svg class="w-4 h-4 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Correction
                                        </h3>
                                        <p class="text-sm">Request correction of inaccurate or incomplete information.</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-lg p-4 border border-red-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 flex items-center">
                                            <svg class="w-4 h-4 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Deletion
                                        </h3>
                                        <p class="text-sm">Request deletion of your personal information under certain circumstances.</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-purple-50 to-violet-50 rounded-lg p-4 border border-purple-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 flex items-center">
                                            <svg class="w-4 h-4 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                            </svg>
                                            Portability
                                        </h3>
                                        <p class="text-sm">Request transfer of your data to another service provider.</p>
                                    </div>
                                </div>
                                <div class="bg-mindmetrics-indigo-light/30 rounded-lg p-4 border border-mindmetrics-indigo/20">
                                    <p class="text-sm">
                                        <strong>To exercise these rights:</strong> Contact us at
                                        <a href="mailto:privacy@mindmetrics.com" class="text-mindmetrics-indigo hover:underline font-medium">privacy@mindmetrics.com</a>
                                        with your request. We will respond within 30 days.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cookies and Tracking -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Cookies and Tracking</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    We use cookies and similar tracking technologies to enhance your experience on our website and to analyze how our services are used.
                                </p>
                                <div class="space-y-3">
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Essential Cookies</h3>
                                        <p class="text-sm">Required for the website to function properly. These cannot be disabled.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Analytics Cookies</h3>
                                        <p class="text-sm">Help us understand how visitors interact with our website by collecting anonymous information.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2">Preference Cookies</h3>
                                        <p class="text-sm">Remember your settings and preferences to provide a personalized experience.</p>
                                    </div>
                                </div>
                                <p class="text-sm bg-amber-50 p-3 rounded-lg border border-amber-200">
                                    <strong>Cookie Control:</strong> You can control cookies through your browser settings. However, disabling certain cookies may affect the functionality of our website.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Children's Privacy -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Children's Privacy</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    Our services are not intended for children under the age of 16. We do not knowingly collect personal information from children under 16.
                                </p>
                                <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-lg p-4 border border-yellow-200">
                                    <p class="text-sm">
                                        <strong>If you are a parent or guardian</strong> and believe your child has provided us with personal information, please contact us immediately so we can delete such information from our systems.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Changes to This Policy -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Changes to This Privacy Policy</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date.
                                </p>
                                <div class="bg-slate-50 rounded-lg p-4">
                                    <h3 class="font-semibold text-slate-800 mb-2">How We Notify You</h3>
                                    <ul class="text-sm space-y-1">
                                        <li>• Email notification for significant changes</li>
                                        <li>• Website banner for policy updates</li>
                                        <li>• Updated timestamp on this page</li>
                                    </ul>
                                </div>
                                <p class="text-sm">
                                    Your continued use of our services after any changes indicates your acceptance of the updated Privacy Policy.
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
                                    If you have any questions about this Privacy Policy or our privacy practices, please don't hesitate to contact us.
                                </p>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                        <h3 class="font-semibold mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            Email
                                        </h3>
                                        <a href="mailto:privacy@mindmetrics.com" class="text-white/90 hover:text-white underline">
                                            privacy@mindmetrics.com
                                        </a>
                                    </div>
                                    <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                        <h3 class="font-semibold mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Response Time
                                        </h3>
                                        <p class="text-white/90">Within 24-48 hours</p>
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
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo and Description -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <svg class="h-8 w-auto text-mindmetrics-indigo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-1.5m-6-16.5v.008c0 .19-.16.34-.347.347H10.586A.346.346 0 0110.24 4.5v-.007A.344.344 0 0110.586 4h2.828c.19 0 .347.157.347.347zm-3.375 0h.008v.008h-.008V4.5z" />
                        </svg>
                        <span class="text-2xl font-bold">MindMetrics</span>
                    </div>
                    <p class="text-slate-400 mb-4 max-w-md">
                        Discover your true personality with our comprehensive MBTI assessment. Gain insights into your strengths, preferences, and growth opportunities.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-slate-400">
                        <li><a href="/" class="hover:text-white transition-colors">Home</a></li>
                        <li><a href="/#features" class="hover:text-white transition-colors">Features</a></li>
                        <li><a href="/#pricing" class="hover:text-white transition-colors">Pricing</a></li>
                        <li><a href="/#faq" class="hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Legal</h3>
                    <ul class="space-y-2 text-slate-400">
                        <li><a href="/privacy-policy" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="/terms-of-service" class="hover:text-white transition-colors">Terms of Service</a></li>
                        <li><a href="mailto:support@mindmetrics.com" class="hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 mt-8 pt-8 flex flex-col sm:flex-row justify-between items-center">
                <p class="text-slate-400 text-sm">
                    © 2024 MindMetrics. All rights reserved.
                </p>
                <div class="flex space-x-4 mt-4 sm:mt-0">
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"/>
                        </svg>
                    </a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIconOpen = document.getElementById('menu-icon-open');
            const menuIconClose = document.getElementById('menu-icon-close');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                    
                    mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
                    mobileMenu.classList.toggle('hidden');
                    
                    if (menuIconOpen && menuIconClose) {
                        menuIconOpen.classList.toggle('hidden');
                        menuIconClose.classList.toggle('hidden');
                    }
                });
            }

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add scroll effect to navigation
            window.addEventListener('scroll', function() {
                const header = document.querySelector('header');
                if (header) {
                    if (window.scrollY > 50) {
                        header.classList.add('shadow-lg');
                    } else {
                        header.classList.remove('shadow-lg');
                    }
                }
            });
        });
    </script>

    <!-- CSS Animations -->
    <style>
        .nav-link {
            @apply text-slate-700 hover:text-mindmetrics-indigo font-medium transition-colors duration-200 relative;
        }
        
        .nav-link:hover:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: theme('colors.mindmetrics.indigo');
            transform: scaleX(1);
            transition: transform 0.3s ease;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: theme('colors.mindmetrics.indigo');
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .geometric-grid {
            background-image:
                radial-gradient(circle at 1px 1px, rgba(99, 102, 241, 0.15) 1px, transparent 0);
            background-size: 20px 20px;
        }

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        .prose h2 {
            color: theme('colors.slate.900');
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .prose h3 {
            color: theme('colors.slate.800');
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .prose p {
            margin-bottom: 1rem;
            line-height: 1.7;
        }

        .prose ul {
            margin-bottom: 1rem;
        }

        .prose li {
            margin-bottom: 0.25rem;
        }
    </style>
</body>
</html>
