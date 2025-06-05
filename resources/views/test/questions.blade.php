@extends('layouts.test-layout')

@section('title', 'MBTI Testi')

@section('page-title')
    Merhaba, {{ $userName }}! <span style="color: #f59e0b !important; background: none !important; -webkit-text-fill-color: #f59e0b !important;">👋</span>
@endsection

@section('page-subtitle')
    Her soru için size en uygun seçeneği işaretleyin. Doğru ya da yanlış cevap yoktur, sadece sizin için en doğal olanı seçin.
@endsection

@section('content')
    @if(isset($questions) && count($questions) > 0)

        <!-- Form -->
        <form action="{{ route('test.submit') }}" method="POST" id="test-form" class="test-form">
            @csrf
            
            <!-- Questions -->
            <div class="space-y-6" id="questions-container">
                @foreach($questions as $index => $question)
                    <div class="test-question" data-question="{{ $index + 1 }}">
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

            <!-- Submit Button -->
            <div class="text-center mt-12 pt-8 border-t border-slate-200">
                <button type="submit" id="submit-btn" class="test-button test-button--primary test-button--large" disabled>
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span id="submit-text">Testi Tamamla</span>
                </button>
                
                <p class="text-sm text-slate-500 mt-3">
                    <span id="answered-count">0</span> / {{ count($questions) }} soru cevaplanmış
                </p>
            </div>
        </form>

        <!-- Floating Progress -->
        <div class="fixed bottom-4 right-4 bg-white rounded-full shadow-lg border border-slate-200 p-3 z-40" id="floating-progress">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 relative">
                    <svg class="w-8 h-8 transform -rotate-90" viewBox="0 0 36 36">
                        <path
                            d="M18 2.0845
                            a 15.9155 15.9155 0 0 1 0 31.831
                            a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none"
                            stroke="#e5e7eb"
                            stroke-width="3"
                        />
                        <path
                            id="progress-circle"
                            d="M18 2.0845
                            a 15.9155 15.9155 0 0 1 0 31.831
                            a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none"
                            stroke="#4f46e5"
                            stroke-width="3"
                            stroke-dasharray="0, 100"
                            stroke-linecap="round"
                        />
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-xs font-semibold text-slate-700" id="progress-percent">0%</span>
                    </div>
                </div>
                <span class="text-sm font-medium text-slate-700">İlerleme</span>
            </div>
        </div>

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
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('test-form');
    const submitBtn = document.getElementById('submit-btn');
    const submitText = document.getElementById('submit-text');
    const answeredCountEl = document.getElementById('answered-count');
    const progressCircle = document.getElementById('progress-circle');
    const progressPercent = document.getElementById('progress-percent');
    
    const totalQuestions = {{ count($questions ?? []) }};
    let answeredQuestions = 0;
    
    // Auto-save key
    const autoSaveKey = 'mbti_test_answers_{{ $userName }}';
    
    // Enable auto-save
    enableAutoSave(form, autoSaveKey);
    
    // Track answered questions
    function updateProgress() {
        const checkedInputs = form.querySelectorAll('input[type="radio"]:checked');
        answeredQuestions = checkedInputs.length;
        
        const percentage = Math.round((answeredQuestions / totalQuestions) * 100);
        
        // Update UI
        answeredCountEl.textContent = answeredQuestions;
        progressPercent.textContent = percentage + '%';
        progressCircle.style.strokeDasharray = percentage + ', 100';
        
        // Enable/disable submit button
        if (answeredQuestions === totalQuestions) {
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            submitText.textContent = 'Testi Tamamla';
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            submitText.textContent = `${totalQuestions - answeredQuestions} soru kaldı`;
        }
    }
    
    // Add event listeners to radio buttons
    const radioButtons = form.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', updateProgress);
    });
    
    // Form submission
    form.addEventListener('submit', function(e) {
        if (answeredQuestions < totalQuestions) {
            e.preventDefault();
            showToast('Lütfen tüm soruları cevaplayın.', 'warning');
            
            // Scroll to first unanswered question
            const firstUnanswered = form.querySelector('input[type="radio"]:not(:checked)');
            if (firstUnanswered) {
                const questionDiv = firstUnanswered.closest('.test-question');
                questionDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                questionDiv.classList.add('ring-2', 'ring-yellow-400', 'ring-opacity-50');
                setTimeout(() => {
                    questionDiv.classList.remove('ring-2', 'ring-yellow-400', 'ring-opacity-50');
                }, 2000);
            }
            return;
        }
        
        // Show loading and clear auto-save
        showLoading();
        clearAutoSave(autoSaveKey);
        
        // Add loading state to button
        submitBtn.classList.add('test-button--loading');
        submitText.textContent = 'Sonuçlar hazırlanıyor...';
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
            e.preventDefault();
            const questions = Array.from(document.querySelectorAll('.test-question'));
            const currentFocus = document.activeElement;
            const currentQuestion = currentFocus.closest('.test-question');
            
            if (currentQuestion) {
                const currentIndex = questions.indexOf(currentQuestion);
                let nextIndex;
                
                if (e.key === 'ArrowDown') {
                    nextIndex = Math.min(currentIndex + 1, questions.length - 1);
                } else {
                    nextIndex = Math.max(currentIndex - 1, 0);
                }
                
                const nextQuestion = questions[nextIndex];
                const firstRadio = nextQuestion.querySelector('input[type="radio"]');
                firstRadio.focus();
            }
        }
    });
    
    // Initialize progress
    updateProgress();
    
    // Smooth scroll for better UX
    const questions = document.querySelectorAll('.test-question');
    questions.forEach((question, index) => {
        question.style.animationDelay = (index * 0.1) + 's';
    });
    
    // Auto-scroll to continue from where user left off
    setTimeout(() => {
        const firstUnanswered = form.querySelector('input[type="radio"]:not(:checked)');
        if (firstUnanswered && answeredQuestions > 0) {
            const questionDiv = firstUnanswered.closest('.test-question');
            questionDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }, 1000);
});
</script>
@endpush