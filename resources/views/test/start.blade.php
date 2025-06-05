@extends('layouts.test-layout')

@section('title', 'Teste Başla')

@section('page-title', 'MBTI Vocational NexusPoint Analysis')

@section('page-subtitle')
    Kişilik tipinizi keşfedin ve kariyer potansiyelinizi ortaya çıkarın. Bu kapsamlı analiz, güçlü yönlerinizi ve ideal çalışma ortamınızı belirlemenize yardımcı olacak.
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
            <h2 class="text-2xl font-bold text-slate-800 mb-2 test-title-slide">Başlamaya Hazır mısınız?</h2>
            <p class="text-slate-600 test-form-element">Test yaklaşık 10-15 dakika sürecek ve 60 sorudan oluşmaktadır.</p>
        </div>

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
                        Adınız ve Soyadınız
                    </span>
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="test-input-group__input"
                    placeholder="Örn: Ahmet Yılmaz"
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
                        <h4 class="text-sm font-semibold text-slate-800 mb-1">Gizlilik Garantisi</h4>
                        <p class="text-sm text-slate-600">
                            Verdiğiniz bilgiler tamamen gizli tutulur ve sadece test sonuçlarınızı kişiselleştirmek için kullanılır.
                            Hiçbir şekilde üçüncü taraflarla paylaşılmaz.
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
                    <h5 class="font-semibold text-blue-800 text-sm mb-1">Süre</h5>
                    <p class="text-blue-600 text-xs">10-15 Dakika</p>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-lg p-4 text-center">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h5 class="font-semibold text-green-800 text-sm mb-1">Sorular</h5>
                    <p class="text-green-600 text-xs">60 Soru</p>
                </div>
                
                <div class="bg-gradient-to-br from-purple-50 to-violet-50 border border-purple-200 rounded-lg p-4 text-center">
                    <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-2">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h5 class="font-semibold text-purple-800 text-sm mb-1">Sonuç</h5>
                    <p class="text-purple-600 text-xs">Anında</p>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center test-form-element">
                <button type="submit" class="test-button test-button--primary test-button--large">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                    Teste Başla
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
        Ana Sayfaya Dön
    </a>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('start-form');
    const nameInput = document.getElementById('name');
    
    // Form validation
    form.addEventListener('submit', function(e) {
        if (!validateForm(form)) {
            e.preventDefault();
            showToast('Lütfen tüm alanları doldurun.', 'error');
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
    
    // Auto-focus on name input
    nameInput.focus();
});
</script>
@endpush