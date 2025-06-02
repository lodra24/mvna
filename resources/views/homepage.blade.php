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
                    <a href="#features" class="nav-link">Features</a>
                    <a href="#pricing" class="nav-link">Pricing</a>
                    <a href="#faq" class="nav-link">FAQ</a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-mindmetrics-indigo bg-mindmetrics-indigo-light hover:bg-indigo-200 rounded-md transition-colors duration-200">
                        Sign In
                    </a>
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
                    <a href="{{ route('login') }}" class="block w-full px-4 py-2 text-center text-base font-medium text-mindmetrics-indigo bg-mindmetrics-indigo-light hover:bg-indigo-200 rounded-md">Sign In</a>
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
            <!-- Main Headline (H1) - Ana sayfayla uyumlu -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight mb-6">
                MBTI Vocational <span class="text-mindmetrics-indigo">NexusPoint</span><br>Analysis
            </h1>
            <!-- Subheadline/Description - Ana sayfayla uyumlu -->
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
                <a href="#test-baslat" class="cta-button">
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

    <!-- TRUSTED BY SECTION - Tamamen yeniden düzenlendi -->
    <section id="trusted-by" class="py-16 sm:py-20 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header - Ana sayfayla uyumlu -->
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

            <!-- Logo Carousel Container - Tamamen yeniden yapıldı -->
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

    <!-- FEATURES SECTION -->
    <section id="features" class="py-20 sm:py-32 bg-gradient-to-b from-slate-50 via-white to-slate-50 relative overflow-hidden">
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

    <!-- PRICING SECTION -->
    <section id="pricing" class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center justify-center px-4 py-1.5 mb-6 text-xs font-semibold tracking-wider text-mindmetrics-indigo uppercase bg-mindmetrics-indigo-light/70 rounded-full">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                </svg>
                Transparent Pricing
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">
                Simple, <span class="text-transparent bg-clip-text bg-gradient-to-r from-mindmetrics-indigo to-mindmetrics-green">Transparent Pricing</span>
            </h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto mb-12 leading-relaxed">
                Choose the plan that fits your organization's needs. No hidden fees, no surprises.
            </p>
            <!-- Pricing cards will go here -->
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section id="faq" class="py-16 sm:py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <div class="inline-flex items-center justify-center px-4 py-1.5 mb-6 text-xs font-semibold tracking-wider text-mindmetrics-indigo uppercase bg-mindmetrics-indigo-light/70 rounded-full">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                    </svg>
                    Support Center
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">
                    Frequently Asked <span class="text-transparent bg-clip-text bg-gradient-to-r from-mindmetrics-indigo to-mindmetrics-green">Questions</span>
                </h2>
                <p class="text-lg text-slate-600 mb-12 leading-relaxed">
                    Find answers to the most common questions about our MBTI-based personality assessment platform.
                </p>
            </div>
            <!-- FAQ accordions will go here -->
        </div>
    </section>

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

    <script>
        // Mobil Menü Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIconOpen = document.getElementById('menu-icon-open');
        const menuIconClose = document.getElementById('menu-icon-close');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIconOpen.classList.toggle('hidden');
            menuIconClose.classList.toggle('hidden');
            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
            mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
        });

        // Sayfa içi linklere yumuşak kaydırma
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                
                if (!mobileMenu.classList.contains('hidden') && targetId !== '#') {
                    mobileMenu.classList.add('hidden');
                    menuIconOpen.classList.remove('hidden');
                    menuIconClose.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                }
                
                if (targetId === '#') {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                } else {
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        const headerOffset = document.querySelector('header').offsetHeight || 0;
                        const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                        const offsetPosition = elementPosition - headerOffset - 20;
                        
                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Logo carousel'ı kullanıcı etkileşiminde durdurma/başlatma
        const logoCarousel = document.querySelector('.logo-carousel-track');
        if (logoCarousel) {
            logoCarousel.addEventListener('mouseenter', () => {
                logoCarousel.style.animationPlayState = 'paused';
            });
            
            logoCarousel.addEventListener('mouseleave', () => {
                logoCarousel.style.animationPlayState = 'running';
            });
        }
    </script>
</body>
</html>