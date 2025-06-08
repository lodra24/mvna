@extends('layouts.test-layout')

@section('title', 'MBTI Testi')

@section('page-title')
    Merhaba, {{ $userName }}! <span class="emoji-fix">👋</span>
@endsection

@section('page-subtitle')
    Her soru için size en uygun seçeneği işaretleyin. Doğru ya da yanlış cevap yoktur, sadece sizin için en doğal olanı seçin.
@endsection

@section('content')
    @if(isset($questions) && count($questions) > 0)

        <!-- Enhanced Progress Bar -->
        <div class="enhanced-progress" data-user-name="{{ $userName }}">
            <div class="progress-header">
                <span class="question-counter" id="question-counter">Soru 1/{{ count($questions) }}</span>
                <span class="progress-percentage" id="progress-percent">0%</span>
            </div>
            <div class="progress-bar-container">
                <div class="progress-bar-fill" id="progress-bar-fill"></div>
            </div>
            
            {{-- --- YENİ EKLENECEK BÖLÜM BAŞLANGICI --- --}}
            <!-- Visual Navigation Dots -->
            <div class="visual-nav-dots" id="visual-nav-dots">
                @foreach($questions as $index => $question)
                    <button
                        type="button"
                        class="nav-dot"
                        data-question-index="{{ $index }}"
                        data-question-id="{{ $question->id }}"
                        aria-label="Soru {{ $index + 1 }}'e git"
                    ></button>
                @endforeach
            </div>
            {{-- --- YENİ EKLENECEK BÖLÜM BİTİŞİ --- --}}
            
        </div>

        <!-- Form -->
        <form action="{{ route('test.submit') }}" method="POST" id="test-form" class="test-form">
            @csrf
            
            <!-- Questions -->
            <div class="questions-container" id="questions-container">
                @foreach($questions as $index => $question)
                    <div class="test-question" data-question="{{ $index + 1 }}" data-question-index="{{ $index }}">
                        <!-- Question Number -->
                        <div class="test-question__number">{{ $index + 1 }}</div>
                        
                        <!-- Question Text -->
                        <h3 class="test-question__text">{{ $question->question_text }}</h3>
                        
                        <!-- Options -->
                        <div class="test-options">
                            <div class="test-option">
                                <input
                                    type="radio"
                                    name="answers[{{ $question->id }}]"
                                    id="question_{{ $question->id }}_a"
                                    value="A"
                                    class="test-option__input"
                                    required
                                    data-question-id="{{ $question->id }}"
                                >
                                <label for="question_{{ $question->id }}_a" class="test-option__label">
                                    <div class="test-option__radio"></div>
                                    <span class="test-option__text">
                                        {{ config('mbti_question_options.' . $question->dimension . '.A', 'Seçenek A') }}
                                    </span>
                                </label>
                            </div>
                            
                            <div class="test-option">
                                <input
                                    type="radio"
                                    name="answers[{{ $question->id }}]"
                                    id="question_{{ $question->id }}_b"
                                    value="B"
                                    class="test-option__input"
                                    required
                                    data-question-id="{{ $question->id }}"
                                >
                                <label for="question_{{ $question->id }}_b" class="test-option__label">
                                    <div class="test-option__radio"></div>
                                    <span class="test-option__text">
                                        {{ config('mbti_question_options.' . $question->dimension . '.B', 'Seçenek B') }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- --- DEĞİŞİKLİK BAŞLANGIÇ --- --}}
            <!-- Navigation & Submission Buttons (Güncellenmiş) -->
            <div class="question-navigation" id="question-navigation-footer">
                <!-- Previous Button -->
                <button type="button" id="prev-question-btn" class="nav-button nav-button--secondary" style="display: none;">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Önceki Soru
                </button>
                
                <!-- Spacer: Butonları iki uca yaslar -->
                <div class="flex-1"></div>
                
                {{-- "Sonraki Soru" Butonu TAMAMEN KALDIRILDI --}}

                <!-- Submit Button Wrapper (JS ile yönetilecek) -->
                {{-- "text-center" sınıfı kaldırıldı, "flex" ve "items-end" eklendi --}}
                <div id="submit-button-wrapper" class="flex flex-col items-end" style="display: none;">
                    <button type="submit" id="submit-btn" class="test-button test-button--primary test-button--large" disabled>
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span id="submit-text">Testi Tamamla</span>
                    </button>
                    <p class="text-sm text-slate-500 mt-2"> {{-- mt-3'ten mt-2'ye düşürüldü --}}
                        <span id="answered-count">0</span> / {{ count($questions) }} soru cevaplanmış
                    </p>
                </div>
            </div>
            {{-- --- DEĞİŞİKLİK BİTİŞ --- --}}
        </form>


    @else
        <!-- No Questions Found -->
        <div class="text-center py-12">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-800 mb-2">Soru Bulunamadı</h3>
            <p class="text-slate-600 mb-6">Gösterilecek soru bulunamadı. Lütfen daha sonra tekrar deneyin.</p>
            <a href="{{ route('test.start') }}" class="test-button test-button--primary">
                Yeniden Dene
            </a>
        </div>
    @endif
@endsection

@section('navigation')
    <a href="{{ route('test.start') }}" class="test-nav-link test-nav-link--secondary">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Geri Dön
    </a>
@endsection

@push('scripts')
<script>
// Inline script devre dışı - QuestionManager tüm işlevselliği sağlıyor
console.log('Inline script devre dışı - QuestionManager kullanılıyor');
</script>
@endpush