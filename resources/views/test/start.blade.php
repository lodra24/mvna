@extends('layouts.test-layout')

@section('title', 'Start the Test')

@section('page-title', 'MBTI Vocational NexusPoint Analysis')

@section('page-subtitle')
    Discover your personality type and unlock your career potential. This comprehensive analysis will help you identify your strengths and ideal work environment.
@endsection


@section('content')
    <div class="test-form test-fade-in">
        <!-- Welcome Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-mindmetrics-indigo to-indigo-600 rounded-full mb-4 test-form-element">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-800 mb-2 test-title-slide">Ready to Begin?</h2>
            <p class="text-slate-600 test-form-element">The test will take approximately 10-15 minutes and consists of 60 questions.</p>
        </div>

        <!-- Dil Seçim Banner -->
        @if($showLanguageModal ?? false)
        <div id="language-banner" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-lg p-4 sm:p-6 mb-6 test-form-element">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-start sm:items-center">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 sm:mr-3 mt-0.5 sm:mt-0 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                    </svg>
                    <div class="min-w-0 flex-1">
                        <h4 class="font-semibold text-base sm:text-lg mb-1 leading-tight">Testi Türkçe olarak çözmek ister misiniz?</h4>
                        <p class="text-blue-100 text-sm leading-relaxed">Sorular ve sonuçlar Türkçe dilinde gösterilecektir.</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 sm:ml-4 sm:flex-shrink-0">
                    <button type="button" id="lang-tr-btn" class="w-full sm:w-auto px-4 py-2.5 sm:py-2 bg-white text-blue-600 font-medium rounded-lg hover:bg-blue-50 transition-colors text-center">
                        Evet, Türkçe
                    </button>
                    <button type="button" id="lang-en-btn" class="w-full sm:w-auto px-4 py-2.5 sm:py-2 bg-blue-500 text-white border border-white font-medium rounded-lg hover:bg-blue-400 transition-colors text-center">
                        No, English
                    </button>
                </div>
            </div>
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('test.begin') }}" method="POST" id="start-form" class="test-form__section">
            @csrf
            
            <!-- Name Input -->
            <div class="test-input-group test-form-element">
                <label for="name" class="test-input-group__label">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-mindmetrics-indigo" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Your Full Name
                    </span>
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="test-input-group__input"
                    placeholder="e.g., Jane Doe"
                    value="{{ $userName ?? '' }}"
                    required
                    autocomplete="name"
                    maxlength="100"
                >
                @error('name')
                    <p class="test-input-group__error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Privacy Notice -->
            <div class="bg-slate-50 border border-slate-200 rounded-lg p-4 mb-6 test-form-element">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-mindmetrics-indigo mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h4 class="text-sm font-semibold text-slate-800 mb-1">Privacy Guarantee</h4>
                        <p class="text-sm text-slate-600">
                            The information you provide is kept completely confidential and is only used to personalize your test results. It will not be shared with third parties.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Test Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8 test-form-element">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-200 rounded-lg p-4 text-center">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h5 class="font-semibold text-blue-800 text-sm mb-1">Duration</h5>
                    <p class="text-blue-600 text-xs">10-15 Minutes</p>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-lg p-4 text-center">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h5 class="font-semibold text-green-800 text-sm mb-1">Questions</h5>
                    <p class="text-green-600 text-xs">60 Questions</p>
                </div>
                
                <div class="bg-gradient-to-br from-purple-50 to-violet-50 border border-purple-200 rounded-lg p-4 text-center">
                    <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h5 class="font-semibold text-purple-800 text-sm mb-1">Result</h5>
                    <p class="text-purple-600 text-xs">Instant</p>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center test-form-element">
                <button type="submit" class="test-button test-button--primary test-button--large">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                    Start Test
                </button>
            </div>
        </form>
    </div>
@endsection

@section('navigation')
    <a href="{{ url('/') }}" class="test-nav-link test-nav-link--secondary">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Back to Homepage
    </a>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tüm DOM elementlerinin tanımlamaları en başta toplanmalı
    const form = document.getElementById('start-form');
    const nameInput = document.getElementById('name');
    const languageBanner = document.getElementById('language-banner');
    const langTrBtn = document.getElementById('lang-tr-btn');
    const langEnBtn = document.getElementById('lang-en-btn');
    
    // Form validation
    form.addEventListener('submit', function(e) {
        if (!validateForm(form)) {
            e.preventDefault();
            showToast('Please fill in all required fields.', 'error');
            return;
        }
        
        showLoading();
    });
    
    // Real-time name validation
    nameInput.addEventListener('input', function() {
        const value = this.value.trim();
        if (value.length < 2) {
            this.classList.add('test-error');
        } else {
            this.classList.remove('test-error');
        }
    });
    
    // localStorage Progress Check - Sabit Anahtar Belirle
    const saveKey = 'mbti_test_progress';
    
    // Elementleri Seç
    const startForm = document.getElementById('start-form');
    const pageTitle = document.querySelector('.test-header__title');
    const pageSubtitle = document.querySelector('.test-header__subtitle');
    const submitButton = startForm.querySelector('button[type="submit"]');
    
    // localStorage'ı Oku ve Arayüzü Güncelle
    const savedData = localStorage.getItem(saveKey);
    
    if (savedData) {
        try {
            const progress = JSON.parse(savedData);
            
            // Geçerli userName ve answers kontrolü
            if (progress.userName && progress.answers && Object.keys(progress.answers).length > 0) {
                // İsim giriş alanını doldur
                nameInput.value = progress.userName;
                
                // Gönderim butonunun metnini değiştir
                if (submitButton) {
                    const buttonText = submitButton.querySelector('span') || submitButton;
                    buttonText.textContent = 'Continue Test';
                }
                
                // Sayfa başlığını güncelle
                if (pageTitle) {
                    pageTitle.innerHTML = `Welcome Back, <span class="text-mindmetrics-indigo">${progress.userName}</span>!`;
                } else {
                    // Alternatif seçici - h2 elementi
                    const h2Title = document.querySelector('h2.text-2xl');
                    if (h2Title) {
                        h2Title.innerHTML = `Welcome Back, <span class="text-mindmetrics-indigo">${progress.userName}</span>!`;
                    }
                }
                
                // Sayfa alt başlığını güncelle
                if (pageSubtitle) {
                    pageSubtitle.textContent = "It looks like you have a test in progress. Click below to continue where you left off.";
                } else {
                    // Alternatif seçici - p elementi
                    const pSubtitle = document.querySelector('p.text-slate-600');
                    if (pSubtitle) {
                        pSubtitle.textContent = "It looks like you have a test in progress. Click below to continue where you left off.";
                    }
                }
            }
        } catch (error) {
            console.error('Error parsing saved progress:', error);
        }
    }
    
    // Auto-focus on name input (eğer localStorage'dan doldurulamazsa)
    if (!nameInput.value) {
        nameInput.focus();
    }
    
    // İlk ziyaret çerezini oluşturma mantığı
    const shouldSetPromptCookie = @json($shouldSetPromptCookie ?? false);
    
    if (languageBanner && shouldSetPromptCookie) {
        // has_been_prompted_for_lang çerezini oluştur
        const expires = new Date();
        expires.setDate(expires.getDate() + 1); // 1 gün geçerlilik
        document.cookie = `has_been_prompted_for_lang=true; expires=${expires.toUTCString()}; path=/; SameSite=Lax`;
    }
    
    // Dil seçim banner işlevselliği
    if (langTrBtn && langEnBtn && languageBanner) {
        // Türkçe butonuna tıklandığında
        langTrBtn.addEventListener('click', function() {
            setLanguagePreference('tr');
        });
        
        // İngilizce butonuna tıklandığında
        langEnBtn.addEventListener('click', function() {
            setLanguagePreference('en');
        });
        
        function setLanguagePreference(language) {
            // Cookie oluştur (30 gün geçerli, güvenlik flag'leri ile)
            const expires = new Date();
            expires.setDate(expires.getDate() + 30);
            document.cookie = `language_preference=${language}; expires=${expires.toUTCString()}; path=/; SameSite=Lax`;
            
            // Forma hidden input ekle
            let langInput = document.querySelector('input[name="lang"]');
            if (!langInput) {
                langInput = document.createElement('input');
                langInput.type = 'hidden';
                langInput.name = 'lang';
                startForm.appendChild(langInput);
            }
            langInput.value = language;
            
            // Banner'ı DOM'dan kaldır
            languageBanner.remove();
            
            // Kullanıcıya bilgi ver (showToast fonksiyonunun varlığını kontrol et)
            const message = language === 'tr' ? 'Test Türkçe dilinde çözülecek.' : 'Test will be conducted in English.';
            if (typeof showToast === 'function') {
                showToast(message, 'success');
            } else {
                // Fallback - basit alert
                console.log(message);
            }
        }
    }
});
</script>
@endpush