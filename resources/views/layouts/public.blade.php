<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CognifyWork - Unlock Your Potential')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    @hasSection('title')
        <meta name="title" content="@yield('title') - CognifyWork">
    @else
        <meta name="title" content="{{ $settings->seo_meta_title ?? 'CognifyWork - Unlock Business Potential with MBTI' }}">
    @endif

    @hasSection('description')
        <meta name="description" content="@yield('description')">
    @else
        @if($settings->seo_meta_description)
            <meta name="description" content="{{ $settings->seo_meta_description }}">
        @endif
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    {{-- SEO ve Sosyal Medya Meta Etiketleri --}}
    
    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">
    
    {{-- Open Graph Etiketleri --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="CognifyWork">
    <meta property="og:title" content="@yield('title', $settings->seo_meta_title ?? 'CognifyWork - Unlock Business Potential with MBTI')">
    <meta property="og:description" content="@yield('description', $settings->seo_meta_description ?? 'Discover your MBTI personality type and unlock your business potential with CognifyWork.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/social-share.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="{{ str_replace('-', '_', app()->getLocale()) }}">
    
    {{-- Twitter Card Etiketleri --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', $settings->seo_meta_title ?? 'CognifyWork - Unlock Business Potential with MBTI')">
    <meta name="twitter:description" content="@yield('description', $settings->seo_meta_description ?? 'Discover your MBTI personality type and unlock your business potential with CognifyWork.')">
    <meta name="twitter:image" content="{{ asset('images/social-share.jpg') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @if(Cookie::get('laravel_cookie_consent'))
        @if($settings->site_custom_scripts)
            {!! $settings->site_custom_scripts !!}
        @endif
    @endif
    
    @stack('structured-data')
</head>
<body class="antialiased" x-data="{ showDemoModal: false, showToast: false, toastMessage: '' }">
    @include('cookie-consent::index')
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
                        <span class="text-2xl font-bold text-slate-800">CognifyWork</span>
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

    <main>
        @yield('content')
    </main>






    <!-- FOOTER -->
    <footer class="bg-slate-800 text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
            <div class="mb-4">
                 <a href="/" class="inline-flex items-center space-x-2">
                     <svg class="h-7 w-auto text-mindmetrics-indigo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-1.5m-6-16.5v.008c0 .19-.16.34-.347.347H10.586A.346.346 0 0110.24 4.5v-.007A.344.344 0 0110.586 4h2.828c.19 0 .347.157.347.347zm-3.375 0h.008v.008h-.008V4.5z" /></svg>
                    <span class="text-xl font-semibold text-slate-200">CognifyWork</span>
                </a>
            </div>
            <nav class="flex flex-wrap justify-center space-x-6 mb-4">
                <a href="#features" class="text-sm hover:text-slate-200 transition-colors duration-200">Features</a>
                <a href="#pricing" class="text-sm hover:text-slate-200 transition-colors duration-200">Pricing</a>
                <a href="#faq" class="text-sm hover:text-slate-200 transition-colors duration-200">FAQ</a>
                <a href="/privacy-policy" class="text-sm hover:text-slate-200 transition-colors duration-200">Privacy Policy</a>
                <a href="/terms-of-service" class="text-sm hover:text-slate-200 transition-colors duration-200">Terms of Service</a>
            </nav>
            <p class="text-sm">© {{ date('Y') }} CognifyWork. All rights reserved.</p>
        </div>
    </footer>
    
    @if(Cookie::get('laravel_cookie_consent'))
        @if($settings->site_body_scripts)
            {!! $settings->site_body_scripts !!}
        @endif
    @endif
</body>
</html>