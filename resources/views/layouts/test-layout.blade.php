<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $settings->seo_meta_title ?? 'MBTI Test') - CognifyWork</title>
    @if($settings->seo_meta_title)
        <meta name="title" content="{{ $settings->seo_meta_title }}">
    @endif
    @if($settings->seo_meta_description)
        <meta name="description" content="{{ $settings->seo_meta_description }}">
    @endif
    
    <!-- Preconnect to external resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/test-pages.css', 'resources/js/test-interactions.js'])
    
    <!-- Additional head content -->
    @stack('head')
    @if($settings->site_custom_scripts)
        {!! $settings->site_custom_scripts !!}
    @endif
</head>
<body class="test-page test-layout test-bg-pattern" style="overflow-x: hidden;">
    <!-- Test Header -->
    <header class="test-container">
        <div class="test-header">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                    <svg class="h-10 w-auto text-mindmetrics-indigo group-hover:text-mindmetrics-green transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-1.5m-6-16.5v.008c0 .19-.16.34-.347.347H10.586A.346.346 0 0110.24 4.5v-.007A.344.344 0 0110.586 4h2.828c.19 0 .347.157.347.347zm-3.375 0h.008v.008h-.008V4.5z" />
                    </svg>
                    <span class="text-3xl font-bold text-slate-800 group-hover:text-mindmetrics-indigo transition-colors duration-200">CognifyWork</span>
                </a>
            </div>
            
            <!-- Page Title -->
            <h1 class="test-header__title">
                @yield('page-title', 'MBTI Vocational NexusPoint Analysis')
            </h1>
            
            <!-- Page Subtitle -->
            @hasSection('page-subtitle')
                <p class="test-header__subtitle">
                    @yield('page-subtitle')
                </p>
            @endif
            
        </div>
    </header>

    <!-- Main Content -->
    <main class="test-container">
        <div class="test-card @yield('card-class', '')">
            @yield('content')
        </div>
    </main>

    <!-- Footer Navigation -->
    @hasSection('navigation')
        <footer class="test-container">
            <div class="test-navigation">
                @yield('navigation')
            </div>
        </footer>
    @endif

    <!-- Loading Overlay -->
    <div id="loading-overlay" class="fixed inset-0 bg-white bg-opacity-90 backdrop-blur-sm z-50 hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="text-center">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-mindmetrics-indigo mb-4"></div>
                <p class="text-slate-600 font-medium">Processing...</p>
            </div>
        </div>
    </div>

    <!-- Toast Notifications Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    
    <!-- Inline Scripts -->
    <script>
        // CSRF Token for AJAX requests
        window.csrfToken = '{{ csrf_token() }}';
        
        // Loading overlay utilities
        window.showLoading = function() {
            document.getElementById('loading-overlay').classList.remove('hidden');
        };
        
        window.hideLoading = function() {
            document.getElementById('loading-overlay').classList.add('hidden');
        };
        
        // Toast notification utility
        window.showToast = function(message, type = 'info', duration = 3000) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            const bgColors = {
                'success': 'bg-green-500',
                'error': 'bg-red-500',
                'warning': 'bg-yellow-500',
                'info': 'bg-blue-500'
            };
            
            toast.className = `${bgColors[type]} text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out`;
            toast.textContent = message;
            
            container.appendChild(toast);
            
            // Animate in
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
            }, 100);
            
            // Animate out and remove
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    if (container.contains(toast)) {
                        container.removeChild(toast);
                    }
                }, 300);
            }, duration);
        };
        
        // Form validation utilities
        window.validateForm = function(formElement) {
            const requiredFields = formElement.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('test-error');
                    isValid = false;
                } else {
                    field.classList.remove('test-error');
                }
            });
            
            return isValid;
        };
        
        // Smooth scroll to element
        window.scrollToElement = function(elementId) {
            const element = document.getElementById(elementId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        };
        
    </script>
    
    <!-- Page specific scripts -->
    @stack('scripts')
    
    @if($settings->site_body_scripts)
        {!! $settings->site_body_scripts !!}
    @endif
</body>
</html>