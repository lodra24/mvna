<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindMetrics - Unlock Business Potential with MBTI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased" x-data="{ showDemoModal: false, showToast: false, toastMessage: '' }">
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
                    <a href="#features" class="nav-link">Features</a>
                    <a href="#pricing" class="nav-link">Pricing</a>
                    <a href="#faq" class="nav-link">FAQ</a>
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
                <a href="#features" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-50">Features</a>
                <a href="#pricing" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-50">Pricing</a>
                <a href="#faq" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-50">FAQ</a>
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

    <!-- HERO SECTION -->
    <main class="hero-gradient-bg relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-purple-50 opacity-50"></div>
            <div class="absolute top-0 left-0 w-72 h-72 bg-indigo-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            <div class="absolute top-0 right-0 w-72 h-72 bg-purple-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
            <div class="absolute bottom-0 right-20 w-72 h-72 bg-yellow-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-6000"></div>
        </div>
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-16 md:pt-16 md:pb-20 text-center">
            <!-- Pre-Headline Area -->
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4 mb-8">
                <div class="pre-headline-badge">
                    <span>Powered by <strong>MBTI Foundation</strong></span>
                </div>
                <div class="pre-headline-badge-ph">
                     <svg class="w-4 h-4 text-rose-500 mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span><strong>324+</strong> Approved by Employers</span>
                </div>
            </div>
            <!-- Main Headline (H1) -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight mb-6">
                MBTI Vocational <span class="text-mindmetrics-indigo">NexusPoint</span><br>Analysis
            </h1>
            <!-- Subheadline/Description -->
            <p class="max-w-2xl mx-auto text-lg sm:text-xl text-slate-600 mb-10 leading-relaxed">
                Get deeper insights into your candidates and employees with our personality analysis test designed specifically for employers, and strengthen your management strategies.
            </p>
            <!-- Key Benefits (Checklist) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-x-6 gap-y-4 max-w-2xl mx-auto mb-12 text-left sm:text-center">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-slate-700 font-medium">Quick and Easy Test</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-slate-700 font-medium">Detailed Employer Report</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-slate-700 font-medium">Advanced Analytics</span>
                </div>
            </div>
            <!-- Main Call-to-Action (CTA) -->
            <div class="mb-5">
                <a href="{{ route('test.start') }}" class="cta-button">
                    Start Test Now
                     <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <!-- Trust Text -->
            <p class="text-xs text-slate-500">
                ✨ No Credit Card Required • Instant Results
            </p>
        </div>
    </main>

    <!-- TRUSTED BY SECTION - Grid Pattern Eklendi -->
    <section id="trusted-by" class="py-16 sm:py-20 bg-white geometric-grid  relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 sm:mb-16">
                <div class="inline-flex items-center justify-center px-4 py-1.5 mb-6 text-xs font-semibold tracking-wider text-mindmetrics-indigo uppercase bg-mindmetrics-indigo-light/70 rounded-full">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Trusted Partners
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">
                    Trusted by <span class="text-transparent bg-clip-text bg-gradient-to-r from-mindmetrics-indigo to-mindmetrics-green">Global Industry Leaders</span>
                </h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">
                    We partner with innovative companies worldwide to enhance their team dynamics and hiring precision through advanced personality insights.
                </p>
            </div>

            <!-- Logo Carousel Container -->
            <div class="trusted-companies-container">
                <!-- Gradient fade effects -->
                <div class="carousel-fade-left"></div>
                <div class="carousel-fade-right"></div>
                
                <!-- Logo Carousel -->
                <div class="logo-carousel-wrapper">
                    <div class="logo-carousel-track">
                        @php
                            $trustedCompanies = [
                                ['name' => 'TechCorp', 'domain' => 'microsoft.com'],
                                ['name' => 'InnovateLab', 'domain' => 'google.com'],
                                ['name' => 'GlobalTech', 'domain' => 'apple.com'],
                                ['name' => 'FutureSoft', 'domain' => 'amazon.com'],
                                ['name' => 'DataDriven', 'domain' => 'meta.com'],
                                ['name' => 'SmartSys', 'domain' => 'netflix.com'],
                                ['name' => 'NextGen', 'domain' => 'tesla.com'],
                                ['name' => 'CloudFirst', 'domain' => 'spotify.com'],
                                ['name' => 'AI Systems', 'domain' => 'openai.com'],
                                ['name' => 'Digital Flow', 'domain' => 'adobe.com'],
                            ];
                            // Seamless scroll için logoları çoğalt
                            $allCompanies = array_merge($trustedCompanies, $trustedCompanies);
                        @endphp
                        
                        @foreach($allCompanies as $company)
                        <div class="client-logo">
                            <img src="https://logo.clearbit.com/{{ $company['domain'] }}?size=120&format=png"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/120x60/E2E8F0/64748B?text={{ urlencode($company['name']) }}';"
                                 alt="{{ $company['name'] }} Logo"
                                 loading="lazy">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Trust indicators -->
            <div class="mt-12 text-center">
                <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-8 text-sm text-slate-600">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">500+ Companies</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">50,000+ Tests Completed</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">98% Satisfaction Rate</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION - Hexagon Pattern + Floating Eklendi -->
    <section id="features" class="py-20 sm:py-32 bg-gradient-to-b from-slate-50 via-white to-slate-50 geometric-hexagon geometric-floating relative overflow-hidden">
        <div class="absolute inset-0 -z-10 opacity-60">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-mindmetrics-indigo/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-mindmetrics-green/10 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 sm:mb-24">
                <div class="inline-flex items-center justify-center px-4 py-1.5 mb-6 text-xs font-semibold tracking-wider text-mindmetrics-indigo uppercase bg-mindmetrics-indigo-light/70 rounded-full">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Premium Features
                </div>
                <h2 class="text-4xl sm:text-5xl font-extrabold text-slate-900 mb-6 tracking-tight">
                    What You Get with <span class="text-transparent bg-clip-text bg-gradient-to-r from-mindmetrics-indigo to-mindmetrics-green">MindMetrics</span>
                </h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
                    Empower your HR decisions with science-backed personality insights that transform how you hire, manage, and develop talent.
                </p>
            </div>
            <div class="space-y-24 lg:space-y-32">
                <!-- Feature 1 -->
                <div class="relative">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-x-16 lg:gap-y-10 lg:items-center">
                        <div class="mb-10 lg:mb-0">
                            <div class="flex items-center mb-6">
                                <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-mindmetrics-indigo to-indigo-600 rounded-2xl shadow-xl">
                                    <svg class="w-9 h-9 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                                </div>
                                <div class="ml-5"><span class="text-sm font-semibold text-mindmetrics-indigo uppercase tracking-wider">Feature 01</span></div>
                            </div>
                            <h3 class="text-3xl font-bold text-slate-900 mb-4 tracking-tight">Deep Personality Profiles</h3>
                            <p class="text-lg text-slate-600 leading-relaxed mb-6">Uncover candidates' and employees' core personality traits, motivations, and decision-making mechanisms based on MBTI framework.</p>
                            <ul class="space-y-3 text-slate-600">
                                <li class="flex items-start"><svg class="w-6 h-6 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>16 personality type analysis</span></li>
                                <li class="flex items-start"><svg class="w-6 h-6 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Cognitive function mapping</span></li>
                                <li class="flex items-start"><svg class="w-6 h-6 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Behavioral predictions</span></li>
                            </ul>
                        </div>
                        <div class="relative mt-10 lg:mt-0" aria-hidden="true">
                             <div class="absolute -inset-4 rounded-3xl bg-gradient-to-tr from-mindmetrics-indigo/10 via-transparent to-pink-500/10 opacity-70 blur-xl animate-blob animation-delay-4000"></div>
                            <div class="relative aspect-[4/3] rounded-2xl bg-white shadow-2xl overflow-hidden ring-1 ring-slate-900/10">
                                <img class="absolute inset-0 w-full h-full object-cover" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Abstract visual for Deep Personality Profiles">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="relative">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-x-16 lg:gap-y-10 lg:items-center">
                        <div class="mb-10 lg:mb-0 lg:order-2">
                            <div class="flex items-center mb-6">
                                <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-mindmetrics-green to-emerald-600 rounded-2xl shadow-xl">
                                    <svg class="w-9 h-9 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" /></svg>
                                </div>
                                <div class="ml-5"><span class="text-sm font-semibold text-mindmetrics-green uppercase tracking-wider">Feature 02</span></div>
                            </div>
                            <h3 class="text-3xl font-bold text-slate-900 mb-4 tracking-tight">Practical Management Guide</h3>
                            <p class="text-lg text-slate-600 leading-relaxed mb-6">Get actionable insights and management tips specifically tailored for each personality type to optimize your hiring, task assignment, and performance management processes.</p>
                            <ul class="space-y-3 text-slate-600">
                                <li class="flex items-start"><svg class="w-6 h-6 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Personalized management strategies</span></li>
                                <li class="flex items-start"><svg class="w-6 h-6 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Communication style recommendations</span></li>
                                <li class="flex items-start"><svg class="w-6 h-6 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Performance optimization tips</span></li>
                            </ul>
                        </div>
                        <div class="relative mt-10 lg:mt-0 lg:order-1" aria-hidden="true">
                            <div class="absolute -inset-4 rounded-3xl bg-gradient-to-tr from-mindmetrics-green/10 via-transparent to-sky-500/10 opacity-70 blur-xl animate-blob animation-delay-2000"></div>
                            <div class="relative aspect-[4/3] rounded-2xl bg-white shadow-2xl overflow-hidden ring-1 ring-slate-900/10">
                                 <img class="absolute inset-0 w-full h-full object-cover" src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Practical Management Guide Visual">
                                 <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="relative">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-x-16 lg:gap-y-10 lg:items-center">
                        <div class="mb-10 lg:mb-0">
                            <div class="flex items-center mb-6">
                                <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-xl">
                                    <svg class="w-9 h-9 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" /></svg>
                                </div>
                                <div class="ml-5"><span class="text-sm font-semibold text-purple-600 uppercase tracking-wider">Feature 03</span></div>
                            </div>
                            <h3 class="text-3xl font-bold text-slate-900 mb-4 tracking-tight">Strong Team Synergy</h3>
                            <p class="text-lg text-slate-600 leading-relaxed mb-6">Build more harmonious, collaborative, and high-performing teams by understanding how different personality types interact together.</p>
                            <ul class="space-y-3 text-slate-600">
                                <li class="flex items-start"><svg class="w-6 h-6 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Team compatibility analysis</span></li>
                                <li class="flex items-start"><svg class="w-6 h-6 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Conflict resolution insights</span></li>
                                <li class="flex items-start"><svg class="w-6 h-6 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Leadership development paths</span></li>
                            </ul>
                        </div>
                         <div class="relative mt-10 lg:mt-0" aria-hidden="true">
                            <div class="absolute -inset-4 rounded-3xl bg-gradient-to-tr from-purple-500/10 via-transparent to-pink-500/10 opacity-70 blur-xl animate-blob animation-delay-6000"></div>
                            <div class="relative aspect-[4/3] rounded-2xl bg-white shadow-2xl overflow-hidden ring-1 ring-slate-900/10">
                                 <img class="absolute inset-0 w-full h-full object-cover" src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Team Synergy Visual">
                                 <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PRICING SECTION - Diamond Pattern + Green Floating Eklendi -->
    <section id="pricing" class="py-16 sm:py-20 bg-white geometric-diamond geometric-floating-enhanced relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 -z-10 opacity-40">
            <div class="absolute top-1/3 left-1/4 w-72 h-72 bg-mindmetrics-indigo/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-1/3 right-1/4 w-64 h-64 bg-mindmetrics-green/10 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center px-4 py-1.5 mb-6 text-xs font-semibold tracking-wider text-mindmetrics-indigo uppercase bg-mindmetrics-indigo-light/70 rounded-full">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    Simple Pricing
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">
                    Comprehensive Analysis, <span class="text-transparent bg-clip-text bg-gradient-to-r from-mindmetrics-indigo to-mindmetrics-green">Career Investment</span>
                </h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto mb-4 leading-relaxed">
                    Transform your career potential with our advanced MBTI personality assessment platform that delivers comprehensive insights and actionable management strategies.
                </p>
                <p class="text-sm text-slate-500">
                    One-time transparent pricing • Lifetime access • 30-day money-back guarantee
                </p>
            </div>

            <!-- Pricing Card -->
            <div class="max-w-md mx-auto">
                <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-200/80 hover:shadow-3xl hover:border-mindmetrics-indigo/20 transition-all duration-300 group">
                    <!-- Popular badge -->
                    <div class="absolute -top-px left-1/2 -translate-x-1/2">
                        <div class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-mindmetrics-indigo to-mindmetrics-green text-white text-xs font-semibold tracking-wider uppercase rounded-b-xl shadow-lg">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            Career Advantage
                        </div>
                    </div>

                    <!-- Card content -->
                    <div class="px-8 pt-12 pb-8">
                        <!-- Plan name -->
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-slate-900 mb-2">What's Inside Your Report?</h3>
                            <p class="text-slate-600">Comprehensive insights that add value to your career</p>
                        </div>

                        <!-- Value Proposition -->
                        <div class="text-center mb-8">
                            <div class="bg-gradient-to-r from-mindmetrics-indigo/10 to-mindmetrics-green/10 rounded-xl p-6 mb-4">
                                <h4 class="text-lg font-semibold text-slate-900 mb-2">Complete Career Analysis Package</h4>
                                <p class="text-slate-600 text-sm leading-relaxed">One transparent investment for lifetime access to all these professional insights and development tools.</p>
                            </div>
                        </div>

                        <!-- Report Contents -->
                        <div class="mb-8">
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-mindmetrics-indigo/10 rounded-lg flex items-center justify-center mr-4 mt-0.5">
                                        <svg class="w-5 h-5 text-mindmetrics-indigo" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-slate-900 mb-1">Detailed MBTI Personality Profile</h5>
                                        <p class="text-sm text-slate-600">Complete 16-type analysis with cognitive function mapping</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-mindmetrics-green/10 rounded-lg flex items-center justify-center mr-4 mt-0.5">
                                        <svg class="w-5 h-5 text-mindmetrics-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-slate-900 mb-1">Employer-Focused Strengths Analysis</h5>
                                        <p class="text-sm text-slate-600">Key strengths and value propositions for workplace success</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-4 mt-0.5">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-slate-900 mb-1">Development Areas & Growth Tips</h5>
                                        <p class="text-sm text-slate-600">Personalized improvement strategies and actionable insights</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-4 mt-0.5">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-slate-900 mb-1">Ideal Work Environment Analysis</h5>
                                        <p class="text-sm text-slate-600">Optimal workplace conditions and team dynamics preferences</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 bg-rose-100 rounded-lg flex items-center justify-center mr-4 mt-0.5">
                                        <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-slate-900 mb-1">PDF Download & Sharing</h5>
                                        <p class="text-sm text-slate-600">Professional report format for portfolio and interviews</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 p-4 bg-gradient-to-r from-mindmetrics-indigo/5 to-mindmetrics-green/5 rounded-lg border border-slate-200">
                                <p class="text-sm text-slate-700 text-center font-medium">
                                    <span class="text-mindmetrics-indigo">One-time investment</span> for comprehensive career insights that provide <span class="text-mindmetrics-green">lifetime value</span> to your professional development.
                                </p>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div class="mb-6">
                            <a href="{{ route('test.start') }}" class="cta-button w-full group-hover:scale-105 transition-transform duration-200">
                                Get My Report
                                <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>

                        <!-- Trust indicators -->
                        <div class="text-center text-xs text-slate-500 space-y-1">
                            <p>✨ Instant access • No setup required</p>
                            <p>🔒 Secure & GDPR compliant</p>
                        </div>
                    </div>

                    <!-- Decorative gradient border -->
                    <div class="absolute inset-0 -z-10 bg-gradient-to-r from-mindmetrics-indigo/5 via-transparent to-mindmetrics-green/5 rounded-3xl transform scale-105 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            </div>

    </section>

    <!-- FAQ SECTION - Wave Pattern + Circuit Board Eklendi -->
    <section id="faq" class="py-16 sm:py-20 bg-slate-50 geometric-wave geometric-circuit geometric-tech-overlay relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 -z-10 opacity-30">
            <div class="absolute top-1/4 right-1/3 w-80 h-80 bg-mindmetrics-indigo/8 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-1/4 left-1/3 w-72 h-72 bg-mindmetrics-green/8 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center px-4 py-1.5 mb-6 text-xs font-semibold tracking-wider text-mindmetrics-indigo uppercase bg-mindmetrics-indigo-light/70 rounded-full">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                    </svg>
                    Support Center
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">
                    Frequently Asked <span class="text-transparent bg-clip-text bg-gradient-to-r from-mindmetrics-indigo to-mindmetrics-green">Questions</span>
                </h2>
                <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                    Find answers to the most common questions about our MBTI-based personality assessment platform.
                </p>
                <div class="inline-flex items-center px-4 py-2 bg-white rounded-full shadow-md border border-slate-200">
                    <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm font-medium text-slate-700">Can't find your answer? <a href="mailto:info@mindmetrics.com?subject=Sales Inquiry&amp;body=Hello, I would like to learn more about MindMetrics MBTI assessment platform for my organization." class="text-mindmetrics-indigo hover:text-mindmetrics-green transition-colors">Contact us</a></span>
                </div>
            </div>

            <!-- FAQ Accordion -->
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden hover:shadow-md transition-all duration-300">
                    <button class="faq-question w-full px-6 py-6 text-left flex items-center justify-between focus:outline-none focus:ring-2 focus:ring-mindmetrics-indigo/20 focus:ring-inset"
                            >
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-8 h-8 bg-mindmetrics-indigo/10 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-mindmetrics-indigo" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-lg font-semibold text-slate-900">What is MBTI and how does it help employers?</span>
                        </div>
                        <svg class="faq-icon w-6 h-6 text-slate-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6">
                        <div class="pl-12 text-slate-600 leading-relaxed">
                            <p class="mb-3">MBTI (Myers-Briggs Type Indicator) is a scientifically-backed personality assessment that identifies 16 distinct personality types based on psychological preferences. For employers, this provides invaluable insights into:</p>
                            <ul class="space-y-2 ml-4">
                                <li class="flex items-start">
                                    <span class="w-2 h-2 bg-mindmetrics-green rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                    <span>How candidates approach problem-solving and decision-making</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="w-2 h-2 bg-mindmetrics-green rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                    <span>Communication styles and teamwork preferences</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="w-2 h-2 bg-mindmetrics-green rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                    <span>Leadership potential and management styles</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden hover:shadow-md transition-all duration-300">
                    <button class="faq-question w-full px-6 py-6 text-left flex items-center justify-between focus:outline-none focus:ring-2 focus:ring-mindmetrics-indigo/20 focus:ring-inset"
                            >
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-8 h-8 bg-mindmetrics-green/10 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-mindmetrics-green" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-lg font-semibold text-slate-900">How long does the assessment take to complete?</span>
                        </div>
                        <svg class="faq-icon w-6 h-6 text-slate-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6">
                        <div class="pl-12 text-slate-600 leading-relaxed">
                            <p class="mb-3">Our assessment is designed to be both comprehensive and time-efficient:</p>
                            <div class="bg-slate-50 rounded-lg p-4 mb-3">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="font-medium text-slate-900">Assessment Duration:</span>
                                    <span class="text-mindmetrics-indigo font-semibold">15-20 minutes</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="font-medium text-slate-900">Report Generation:</span>
                                    <span class="text-mindmetrics-green font-semibold">Instant</span>
                                </div>
                            </div>
                            <p>The assessment consists of carefully crafted questions that don't require deep thinking - participants should go with their first instinct for the most accurate results.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden hover:shadow-md transition-all duration-300">
                    <button class="faq-question w-full px-6 py-6 text-left flex items-center justify-between focus:outline-none focus:ring-2 focus:ring-mindmetrics-indigo/20 focus:ring-inset"
                            >
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h4a2 2 0 012 2v2a2 2 0 01-2 2H8a2 2 0 01-2-2v-2zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-lg font-semibold text-slate-900">What's included in the employer report?</span>
                        </div>
                        <svg class="faq-icon w-6 h-6 text-slate-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6">
                        <div class="pl-12 text-slate-600 leading-relaxed">
                            <p class="mb-4">Our comprehensive employer report provides actionable insights across multiple dimensions:</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <div>
                                            <div class="font-medium text-slate-900">Personality Overview</div>
                                            <div class="text-sm text-slate-500">Complete MBTI type breakdown</div>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <div>
                                            <div class="font-medium text-slate-900">Management Tips</div>
                                            <div class="text-sm text-slate-500">How to effectively manage this person</div>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <div>
                                            <div class="font-medium text-slate-900">Team Dynamics</div>
                                            <div class="text-sm text-slate-500">How they work with others</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <div>
                                            <div class="font-medium text-slate-900">Communication Style</div>
                                            <div class="text-sm text-slate-500">Preferred communication methods</div>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <div>
                                            <div class="font-medium text-slate-900">Stress Indicators</div>
                                            <div class="text-sm text-slate-500">Warning signs and solutions</div>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-mindmetrics-green mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <div>
                                            <div class="font-medium text-slate-900">Development Areas</div>
                                            <div class="text-sm text-slate-500">Growth opportunities & recommendations</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden hover:shadow-md transition-all duration-300">
                    <button class="faq-question w-full px-6 py-6 text-left flex items-center justify-between focus:outline-none focus:ring-2 focus:ring-mindmetrics-indigo/20 focus:ring-inset"
                            >
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-8 h-8 bg-rose-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-lg font-semibold text-slate-900">Is the assessment suitable for all job roles?</span>
                        </div>
                        <svg class="faq-icon w-6 h-6 text-slate-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6">
                        <div class="pl-12 text-slate-600 leading-relaxed">
                            <p class="mb-4">Yes! Our MBTI assessment is valuable across all industries and job levels. It's particularly effective for:</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-4">
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-mindmetrics-indigo rounded-full mr-3"></span>
                                    <span class="font-medium">Leadership positions</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-mindmetrics-green rounded-full mr-3"></span>
                                    <span class="font-medium">Team-based roles</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-3"></span>
                                    <span class="font-medium">Customer-facing positions</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-rose-500 rounded-full mr-3"></span>
                                    <span class="font-medium">Creative & technical roles</span>
                                </div>
                            </div>
                            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-amber-600 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <div>
                                        <p class="text-amber-800 font-medium mb-1">Important Note:</p>
                                        <p class="text-amber-700 text-sm">Personality assessments should complement, not replace, traditional hiring methods like skills testing and interviews.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden hover:shadow-md transition-all duration-300">
                    <button class="faq-question w-full px-6 py-6 text-left flex items-center justify-between focus:outline-none focus:ring-2 focus:ring-mindmetrics-indigo/20 focus:ring-inset"
                            >
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-lg font-semibold text-slate-900">How secure is candidate data?</span>
                        </div>
                        <svg class="faq-icon w-6 h-6 text-slate-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6">
                        <div class="pl-12 text-slate-600 leading-relaxed">
                            <p class="mb-4">Data security and privacy are our top priorities. We implement industry-leading security measures:</p>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900">GDPR & CCPA Compliant</div>
                                        <div class="text-sm text-slate-500">Full compliance with international privacy regulations</div>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900">256-bit SSL Encryption</div>
                                        <div class="text-sm text-slate-500">Bank-level security for all data transmission</div>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900">Controlled Access</div>
                                        <div class="text-sm text-slate-500">Only authorized personnel can access assessment data</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden hover:shadow-md transition-all duration-300">
                    <button class="faq-question w-full px-6 py-6 text-left flex items-center justify-between focus:outline-none focus:ring-2 focus:ring-mindmetrics-indigo/20 focus:ring-inset"
                            >
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                            </div>
                            <span class="text-lg font-semibold text-slate-900">Do you offer customer support and training?</span>
                        </div>
                        <svg class="faq-icon w-6 h-6 text-slate-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-6">
                        <div class="pl-12 text-slate-600 leading-relaxed">
                            <p class="mb-4">Absolutely! We provide comprehensive support to ensure you get maximum value from our platform:</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div class="bg-blue-50 rounded-lg p-4">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd"/>
                                        </svg>
                                        <h4 class="font-semibold text-blue-900">24/7 Support</h4>
                                    </div>
                                    <p class="text-blue-800 text-sm">Round-the-clock technical support via email, chat, and phone</p>
                                </div>
                                <div class="bg-green-50 rounded-lg p-4">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                        </svg>
                                        <h4 class="font-semibold text-green-900">Free Training</h4>
                                    </div>
                                    <p class="text-green-800 text-sm">Live webinars and training sessions on MBTI interpretation</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-lg p-4">
                                <div>
                                    <div class="font-medium text-slate-900">Need immediate help?</div>
                                    <div class="text-sm text-slate-600">Our average response time is under 2 hours</div>
                                </div>
                                <a href="#contact-support" class="inline-flex items-center px-4 py-2 bg-mindmetrics-indigo text-white text-sm font-medium rounded-lg hover:bg-mindmetrics-green transition-colors duration-200">
                                    Contact Support
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom CTA -->
            <div class="mt-16 text-center">
                <div class="bg-gradient-to-r from-mindmetrics-indigo/5 to-mindmetrics-green/5 rounded-2xl p-8 border border-slate-200">
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Still have questions?</h3>
                    <p class="text-slate-600 mb-6 max-w-2xl mx-auto">Our team of MBTI experts is here to help you make the most of personality insights in your organization.</p>
                    <div class="flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4">
                        <a href="#" @click.prevent="showDemoModal = true" class="cta-button">
                            Schedule a Demo
                            <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="mailto:info@mindmetrics.com?subject=Sales Inquiry&body=Hello, I would like to learn more about MindMetrics MBTI assessment platform for my organization." class="inline-flex items-center px-6 py-3 text-mindmetrics-indigo border border-mindmetrics-indigo/20 rounded-lg font-medium hover:bg-mindmetrics-indigo/5 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Contact Sales Team
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Demo Request Modal -->
    <div x-show="showDemoModal"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: none;">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm transition-opacity"
             @click="showDemoModal = false"></div>
        
        <!-- Modal container -->
        <div class="flex min-h-full items-center justify-center p-4">
            <!-- Modal content -->
            <div x-show="showDemoModal"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl ring-1 ring-slate-900/10 overflow-hidden">
                
                <!-- Modal header -->
                <div class="bg-gradient-to-r from-mindmetrics-indigo to-mindmetrics-green px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-white">Schedule a Demo</h3>
                        <button @click="showDemoModal = false"
                                class="text-white/80 hover:text-white transition-colors duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Modal body -->
                <div class="p-6">
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        Get a personalized demonstration of our MBTI assessment platform and discover how it can transform your hiring and management processes.
                    </p>
                    
                    <!-- Demo request form -->
                    <form class="space-y-4" @submit.prevent="submitDemoForm">
                        <div>
                            <label for="demo-name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                            <input type="text" id="demo-name" name="name"
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-mindmetrics-indigo/20 focus:border-mindmetrics-indigo transition-colors duration-200"
                                   placeholder="Enter your full name">
                        </div>
                        
                        <div>
                            <label for="demo-email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                            <input type="email" id="demo-email" name="email"
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-mindmetrics-indigo/20 focus:border-mindmetrics-indigo transition-colors duration-200"
                                   placeholder="Enter your email address">
                        </div>
                        
                        <div>
                            <label for="demo-company" class="block text-sm font-medium text-slate-700 mb-2">Company Name</label>
                            <input type="text" id="demo-company" name="company"
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-mindmetrics-indigo/20 focus:border-mindmetrics-indigo transition-colors duration-200"
                                   placeholder="Enter your company name">
                        </div>
                        
                        <div>
                            <label for="demo-message" class="block text-sm font-medium text-slate-700 mb-2">Message (Optional)</label>
                            <textarea id="demo-message" name="message" rows="3"
                                      class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-mindmetrics-indigo/20 focus:border-mindmetrics-indigo transition-colors duration-200"
                                      placeholder="Tell us about your specific needs..."></textarea>
                        </div>
                        
                        <!-- Submit button -->
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-mindmetrics-indigo to-mindmetrics-green text-white font-medium py-3 px-4 rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                            Request Demo
                        </button>
                    </form>
                    
                    <!-- Trust indicators -->
                    <div class="mt-4 pt-4 border-t border-slate-200">
                        <div class="flex items-center justify-center text-xs text-slate-500">
                            <svg class="w-4 h-4 text-green-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            We'll respond within 24 hours
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div x-show="showToast"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-2"
         class="fixed top-4 right-4 z-50 max-w-sm w-full"
         style="display: none;"
         x-init="$watch('showToast', value => { if(value) { setTimeout(() => showToast = false, 5000) } })">
        <div class="bg-white rounded-lg shadow-lg border border-green-200 overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-3 w-0 flex-1">
                        <p class="text-sm font-medium text-gray-900" x-text="toastMessage"></p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button @click="showToast = false" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Progress bar -->
            <div class="bg-green-500 h-1 w-full animate-pulse"></div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-slate-800 text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
            <div class="mb-4">
                 <a href="/" class="inline-flex items-center space-x-2">
                     <svg class="h-7 w-auto text-mindmetrics-indigo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-1.5m-6-16.5v.008c0 .19-.16.34-.347.347H10.586A.346.346 0 0110.24 4.5v-.007A.344.344 0 0110.586 4h2.828c.19 0 .347.157.347.347zm-3.375 0h.008v.008h-.008V4.5z" /></svg>
                    <span class="text-xl font-semibold text-slate-200">MindMetrics</span>
                </a>
            </div>
            <nav class="flex flex-wrap justify-center space-x-6 mb-4">
                <a href="#features" class="text-sm hover:text-slate-200 transition-colors duration-200">Features</a>
                <a href="#pricing" class="text-sm hover:text-slate-200 transition-colors duration-200">Pricing</a>
                <a href="#faq" class="text-sm hover:text-slate-200 transition-colors duration-200">FAQ</a>
                <a href="/privacy-policy" class="text-sm hover:text-slate-200 transition-colors duration-200">Privacy Policy</a>
                <a href="/terms-of-service" class="text-sm hover:text-slate-200 transition-colors duration-200">Terms of Service</a>
            </nav>
            <p class="text-sm">© {{ date('Y') }} MindMetrics. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>