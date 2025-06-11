/**
 * Test Pages JavaScript Interactions
 * Modern MBTI Test sayfaları için özel JavaScript fonksiyonları
 */

// Question Manager for single question display
class QuestionManager {
    constructor() {
        this.currentQuestionIndex = 0;
        this.totalQuestions = 0;
        this.questions = [];
        this.answers = {};
        this.advanceTimer = null; // YENİ EKLEME
        this.init();
    }

    init() {
        this.setupQuestions();
        this.setupEventListeners();
        // --- YENİ EKLEME ---
        this.setupVisualNav();
        // --- BİTİŞ ---
        this.showCurrentQuestion();
        this.updateProgress();
    }

    setupQuestions() {
        this.questions = Array.from(document.querySelectorAll('.test-question'));
        this.totalQuestions = this.questions.length;
        
        // Tüm soruları gizle, sadece ilkini göster
        this.questions.forEach((question, index) => {
            if (index === 0) {
                question.classList.add('question-active');
            } else {
                question.classList.add('question-next');
            }
        });
    }

    setupEventListeners() {
        // Radio button change events
        document.addEventListener('change', (e) => {
            if (e.target.type === 'radio') {
                this.handleAnswerSelection(e.target);
            }
        });

        // Navigation button events
        const prevBtn = document.getElementById('prev-question-btn');
        // const nextBtn = document.getElementById('next-question-btn'); // BU SATIRI SİLİN
        
        if (prevBtn) {
            prevBtn.addEventListener('click', () => this.previousQuestion());
        }
        // if (nextBtn) { ... } // BU if BLOKUNU TAMAMEN SİLİN

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.target.type === 'radio') {
                this.handleKeyboardNavigation(e);
            }
        });
    }

    // --- YENİ METOT BAŞLANGICI ---
    setupVisualNav() {
        const container = document.getElementById('visual-nav-dots');
        if (!container) return;

        container.addEventListener('click', (e) => {
            const dot = e.target.closest('.nav-dot');
            if (dot && dot.dataset.questionIndex) {
                const index = parseInt(dot.dataset.questionIndex, 10);
                this.goToQuestion(index);
            }
        });
    }

    goToQuestion(index) {
        if (index >= 0 && index < this.totalQuestions) {
            this.currentQuestionIndex = index;
            this.showCurrentQuestion();
        }
    }
    // --- YENİ METOT BİTİŞİ ---

    handleAnswerSelection(radioInput) {
        const questionId = radioInput.getAttribute('data-question-id');
        this.answers[questionId] = radioInput.value;
        
        // --- ÇÖZÜM: BU SATIRI EKLEYİN ---
        // Her cevap seçildiğinde progress bar'ı anında güncelle.
        this.updateProgress();
        // --- ÇÖZÜM BİTTİ ---

        // Seçim feedback'i
        // Önceki tüm 'selected' sınıflarını kaldıralım ki sadece mevcut seçim parlasın.
        const parentQuestion = radioInput.closest('.test-question');
        parentQuestion.querySelectorAll('.test-option').forEach(opt => opt.classList.remove('selected'));
        radioInput.closest('.test-option').classList.add('selected');
        
        // Çifte tetiklenmeyi önlemek için mevcut timer'ı temizle
        clearTimeout(this.advanceTimer);
        
        // Auto-advance için debounced timer
        this.advanceTimer = setTimeout(() => {
            if (this.currentQuestionIndex < this.totalQuestions - 1) {
                this.nextQuestion();
            } else {
                // Son soruda progress bar'ın %100 olduğundan emin olmak için tekrar çağırabiliriz
                // ama yukarıda zaten ekledik, bu yüzden sadece butonu güncellemek yeterli.
                this.updateSubmitButton();
            }
        }, 700); // Biraz daha uzun bekleme süresi
    }

    handleKeyboardNavigation(e) {
        switch (e.key) {
            case 'ArrowLeft':
                e.preventDefault();
                this.previousQuestion();
                break;
            case 'ArrowRight':
                e.preventDefault();
                if (this.isCurrentQuestionAnswered()) {
                    this.nextQuestion();
                }
                break;
            case 'Enter':
                if (this.currentQuestionIndex === this.totalQuestions - 1 && this.allQuestionsAnswered()) {
                    document.getElementById('submit-btn')?.click();
                }
                break;
        }
    }

    showCurrentQuestion() {
        // --- DEĞİŞİKLİK BAŞLANGIÇ ---
        const container = document.getElementById('questions-container');
        // --- DEĞİŞİKLİK BİTİŞ ---
        const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        this.questions.forEach((question, index) => {
            // Tüm sınıfları temizle
            question.classList.remove('question-active', 'question-prev', 'question-next');
            
            if (index === this.currentQuestionIndex) {
                // Aktif soruyu göster
                question.classList.add('question-active');
            } else if (index < this.currentQuestionIndex) {
                // Geçmiş sorular
                question.classList.add('question-prev');
            } else {
                // Gelecek sorular
                question.classList.add('question-next');
            }
        });

        // --- DEĞİŞİKLİK BAŞLANGIÇ: Konteyner yüksekliğini dinamik olarak ayarla ---
        const activeQuestion = this.questions[this.currentQuestionIndex];
        if (container && activeQuestion) {
            // Yüksekliği ayarlamadan önce bir sonraki frame'i bekle
            requestAnimationFrame(() => {
                container.style.height = `${activeQuestion.offsetHeight}px`;
            });
        }
        // --- DEĞİŞİKLİK BİTİŞ ---
        
        // Scroll pozisyonunu koru
        requestAnimationFrame(() => {
            window.scrollTo(0, currentScrollTop);
            
            // Focus işlemini animasyon tamamlandıktan sonra yap
            setTimeout(() => {
                const activeQuestion = this.questions[this.currentQuestionIndex];
                const firstRadio = activeQuestion.querySelector('input[type="radio"]');
                if (firstRadio) {
                    firstRadio.focus();
                }
            }, 400);
        });
        
        this.updateNavigationButtons();
        this.updateProgress();
    }

    nextQuestion() {
        if (this.currentQuestionIndex < this.totalQuestions - 1) {
            this.currentQuestionIndex++;
            this.showCurrentQuestion();
        }
    }

    previousQuestion() {
        if (this.currentQuestionIndex > 0) {
            this.currentQuestionIndex--;
            this.showCurrentQuestion();
        }
    }

    updateNavigationButtons() {
        const prevBtn = document.getElementById('prev-question-btn');
        const submitWrapper = document.getElementById('submit-button-wrapper');
        const allAnswered = this.allQuestionsAnswered();
        
        // --- DEĞİŞİKLİK BAŞLANGIÇ: Mantığı tamamen yeniden yazıyoruz ---

        // Kural 1: "Önceki Soru" butonunu yönet.
        // Eğer ilk soruda değilsek her zaman göster.
        if (prevBtn) {
            prevBtn.style.display = this.currentQuestionIndex > 0 ? 'inline-flex' : 'none';
        }
    
        // Kural 2: "Testi Tamamla" butonunu yönet.
        // Eğer tüm sorular cevaplandıysa her zaman göster.
        if (submitWrapper) {
            submitWrapper.style.display = allAnswered ? 'flex' : 'none'; // 'block' yerine 'flex'
        }
        
        // --- DEĞİŞİKLİK BİTİŞ ---
    }

    updateProgress() {
        const answeredCount = Object.keys(this.answers).length;
        const percentage = Math.round((answeredCount / this.totalQuestions) * 100);
        const currentQuestionNumber = this.currentQuestionIndex + 1;
        
        // Update progress elements
        const progressBarFill = document.getElementById('progress-bar-fill');
        const progressPercent = document.getElementById('progress-percent');
        const answeredCountEl = document.getElementById('answered-count');
        const questionCounter = document.getElementById('question-counter');
        
        // Update main progress bar - %100'de tam dolması için özel kontrol
        if (progressBarFill) {
            if (percentage === 100) {
                progressBarFill.style.width = '100%';
                progressBarFill.style.borderRadius = '9999px';
            } else {
                progressBarFill.style.width = percentage + '%';
            }
        }
        if (progressPercent) {
            progressPercent.textContent = percentage + '%';
        }
        if (answeredCountEl) {
            answeredCountEl.textContent = answeredCount;
        }
        if (questionCounter) {
            questionCounter.textContent = `Question ${currentQuestionNumber}/${this.totalQuestions}`;
        }
        
        this.updateSubmitButton();
        this.updateNavigationButtons();

        // --- YENİ EKLEME ---
        this.updateVisualNavDots();
        // --- BİTİŞ ---
    }

    updateSubmitButton() {
        const submitBtn = document.getElementById('submit-btn');
        const submitText = document.getElementById('submit-text');
        
        if (submitBtn && submitText) {
            const allAnswered = this.allQuestionsAnswered();
            const remainingQuestions = this.totalQuestions - Object.keys(this.answers).length;
            
            submitBtn.disabled = !allAnswered;
            
            if (allAnswered) {
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                submitText.textContent = 'Complete Test';
            } else {
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                submitText.textContent = `${remainingQuestions} questions left`;
            }
        }
    }

    // --- YENİ METOT BAŞLANGICI ---
    updateVisualNavDots() {
        const dots = document.querySelectorAll('.nav-dot');
        if (dots.length === 0) return;

        dots.forEach((dot, index) => {
            const questionId = dot.dataset.questionId;
            
            // Önceki sınıfları temizle
            dot.classList.remove('active', 'answered');

            // Cevaplanmış mı kontrol et
            if (this.answers.hasOwnProperty(questionId)) {
                dot.classList.add('answered');
            }

            // Aktif mi kontrol et
            if (index === this.currentQuestionIndex) {
                dot.classList.add('active');
            }
        });
    }
    // --- YENİ METOT BİTİŞİ ---

    isCurrentQuestionAnswered() {
        const currentQuestion = this.questions[this.currentQuestionIndex];
        const checkedRadio = currentQuestion.querySelector('input[type="radio"]:checked');
        return !!checkedRadio;
    }

    allQuestionsAnswered() {
        return Object.keys(this.answers).length === this.totalQuestions;
    }

    // Auto-save integration
    saveProgress() {
        const userName = document.querySelector('[data-user-name]')?.dataset.userName || 'user';
        const saveKey = `mbti_test_answers_${userName}`;
        
        try {
            const saveData = {
                answers: this.answers,
                currentQuestion: this.currentQuestionIndex
            };
            localStorage.setItem(saveKey, JSON.stringify(saveData));
        } catch (error) {
            console.warn('Progress save error:', error);
        }
    }

    loadProgress() {
        const userName = document.querySelector('[data-user-name]')?.dataset.userName || 'user';
        const saveKey = `mbti_test_answers_${userName}`;
        
        try {
            const savedData = localStorage.getItem(saveKey);
            if (savedData) {
                const data = JSON.parse(savedData);
                this.answers = data.answers || {};
                this.currentQuestionIndex = data.currentQuestion || 0;
                
                // Restore radio button states
                Object.keys(this.answers).forEach(questionId => {
                    const radio = document.querySelector(`input[data-question-id="${questionId}"][value="${this.answers[questionId]}"]`);
                    if (radio) {
                        radio.checked = true;
                        radio.closest('.test-option').classList.add('selected');
                    }
                });
            }
        } catch (error) {
            console.warn('Progress load error:', error);
        }
    }
}

// Test sayfası utilities
class TestPageUtils {
    constructor() {
        this.init();
    }

    init() {
        this.setupFormValidation();
        this.setupProgressTracking();
        this.setupKeyboardNavigation();
        this.setupAccessibility();
        this.setupAnimations();
    }

    // Form validation enhancements
    setupFormValidation() {
        const forms = document.querySelectorAll('.test-form');
        
        forms.forEach(form => {
            const inputs = form.querySelectorAll('input, select, textarea');
            
            inputs.forEach(input => {
                // Real-time validation
                input.addEventListener('blur', () => {
                    this.validateField(input);
                });

                input.addEventListener('input', () => {
                    if (input.classList.contains('test-error')) {
                        this.validateField(input);
                    }
                });
            });
        });
    }

    validateField(field) {
        const value = field.value.trim();
        const isRequired = field.hasAttribute('required');
        const fieldType = field.type;
        
        let isValid = true;
        let errorMessage = '';

        if (isRequired && !value) {
            isValid = false;
            errorMessage = 'This field is required.';
        } else if (fieldType === 'email' && value && !this.isValidEmail(value)) {
            isValid = false;
            errorMessage = 'Please enter a valid email address.';
        } else if (fieldType === 'text' && field.name === 'name' && value && value.length < 2) {
            isValid = false;
            errorMessage = 'Name must be at least 2 characters.';
        }

        this.toggleFieldError(field, !isValid, errorMessage);
        return isValid;
    }

    toggleFieldError(field, hasError, message = '') {
        const errorClass = 'test-error';
        const errorElement = field.parentNode.querySelector('.test-input-group__error');

        if (hasError) {
            field.classList.add(errorClass);
            if (errorElement) {
                errorElement.textContent = message;
            }
        } else {
            field.classList.remove(errorClass);
            if (errorElement) {
                errorElement.textContent = '';
            }
        }
    }

    isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Progress tracking for questions
    setupProgressTracking() {
        const questionForm = document.getElementById('test-form');
        if (!questionForm) return;

        const radioButtons = questionForm.querySelectorAll('input[type="radio"]');
        const progressElements = {
            fill: document.getElementById('progress-fill'),
            circle: document.getElementById('progress-circle'),
            percent: document.getElementById('progress-percent'),
            count: document.getElementById('answered-count')
        };

        let totalQuestions = 0;
        const questionIds = new Set();

        // Count unique questions
        radioButtons.forEach(radio => {
            const questionId = radio.getAttribute('data-question-id');
            if (questionId) {
                questionIds.add(questionId);
            }
        });
        totalQuestions = questionIds.size;

        const updateProgress = () => {
            const answeredQuestions = new Set();
            
            radioButtons.forEach(radio => {
                if (radio.checked) {
                    const questionId = radio.getAttribute('data-question-id');
                    if (questionId) {
                        answeredQuestions.add(questionId);
                    }
                }
            });

            const answeredCount = answeredQuestions.size;
            const percentage = totalQuestions > 0 ? Math.round((answeredCount / totalQuestions) * 100) : 0;

            // Update progress elements
            if (progressElements.fill) {
                progressElements.fill.style.width = percentage + '%';
            }
            if (progressElements.circle) {
                progressElements.circle.style.strokeDasharray = percentage + ', 100';
            }
            if (progressElements.percent) {
                progressElements.percent.textContent = percentage + '%';
            }
            if (progressElements.count) {
                progressElements.count.textContent = answeredCount;
            }

            // Update submit button state
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            
            if (submitBtn && submitText) {
                if (answeredCount === totalQuestions) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    submitText.textContent = 'Testi Tamamla';
                } else {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    submitText.textContent = `${totalQuestions - answeredCount} soru kaldı`;
                }
            }
        };

        // Add event listeners
        radioButtons.forEach(radio => {
            radio.addEventListener('change', updateProgress);
        });

        // Initial update
        updateProgress();
    }

    // Keyboard navigation for questions
    setupKeyboardNavigation() {
        document.addEventListener('keydown', (e) => {
            if (!document.querySelector('.test-question')) return;

            const questions = Array.from(document.querySelectorAll('.test-question'));
            const currentFocus = document.activeElement;
            const currentQuestion = currentFocus.closest('.test-question');

            if (!currentQuestion) return;

            const currentIndex = questions.indexOf(currentQuestion);
            let nextIndex = currentIndex;

            switch (e.key) {
                case 'ArrowDown':
                case 'ArrowRight':
                    e.preventDefault();
                    nextIndex = Math.min(currentIndex + 1, questions.length - 1);
                    break;
                case 'ArrowUp':
                case 'ArrowLeft':
                    e.preventDefault();
                    nextIndex = Math.max(currentIndex - 1, 0);
                    break;
                case 'Home':
                    e.preventDefault();
                    nextIndex = 0;
                    break;
                case 'End':
                    e.preventDefault();
                    nextIndex = questions.length - 1;
                    break;
                default:
                    return;
            }

            if (nextIndex !== currentIndex) {
                const nextQuestion = questions[nextIndex];
                const firstRadio = nextQuestion.querySelector('input[type="radio"]');
                if (firstRadio) {
                    firstRadio.focus();
                    nextQuestion.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });
    }

    // Accessibility enhancements
    setupAccessibility() {
        // Add ARIA labels to progress indicators
        const progressElements = document.querySelectorAll('[id*="progress"]');
        progressElements.forEach(element => {
            if (!element.getAttribute('aria-label')) {
                element.setAttribute('aria-label', 'Test ilerleme durumu');
            }
        });

        // Enhance radio button groups
        const radioGroups = document.querySelectorAll('.test-options');
        radioGroups.forEach(group => {
            const question = group.closest('.test-question');
            const questionText = question?.querySelector('.test-question__text');
            
            if (questionText && !group.getAttribute('role')) {
                group.setAttribute('role', 'radiogroup');
                group.setAttribute('aria-labelledby', questionText.id || 'question-text');
            }
        });

        // Add skip links for screen readers
        this.addSkipLinks();
    }

    addSkipLinks() {
        const skipLinksContainer = document.createElement('div');
        skipLinksContainer.className = 'sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 z-50';
        skipLinksContainer.innerHTML = `
            <a href="#main-content" class="bg-blue-600 text-white px-4 py-2 rounded">
                Ana içeriğe geç
            </a>
        `;
        document.body.insertBefore(skipLinksContainer, document.body.firstChild);

        // Add main content ID if not exists
        const mainContent = document.querySelector('main') || document.querySelector('.test-container');
        if (mainContent && !mainContent.id) {
            mainContent.id = 'main-content';
        }
    }

    // Animation enhancements
    setupAnimations() {
        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        // Observe animatable elements
        const animatableElements = document.querySelectorAll('.test-question, .test-score-card, .test-stat-card');
        animatableElements.forEach(element => {
            observer.observe(element);
        });

        // Add CSS for animate-in class
        if (!document.querySelector('#test-animations-style')) {
            const style = document.createElement('style');
            style.id = 'test-animations-style';
            style.textContent = `
                .animate-in {
                    animation: slideInUp 0.6s ease-out forwards;
                }
                
                @keyframes slideInUp {
                    from {
                        opacity: 0;
                        transform: translateY(30px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
            `;
            document.head.appendChild(style);
        }
    }

    // Utility methods
    static showToast(message, type = 'info', duration = 3000) {
        if (window.showToast) {
            window.showToast(message, type, duration);
        }
    }

    static showLoading() {
        if (window.showLoading) {
            window.showLoading();
        }
    }

    static hideLoading() {
        if (window.hideLoading) {
            window.hideLoading();
        }
    }
}

// Auto-save functionality
class TestAutoSave {
    constructor(formId, saveKey) {
        this.form = document.getElementById(formId);
        this.saveKey = saveKey;
        this.debounceTimer = null;
        
        if (this.form) {
            this.init();
        }
    }

    init() {
        this.loadSavedData();
        this.setupAutoSave();
    }

    loadSavedData() {
        try {
            const savedData = localStorage.getItem(this.saveKey);
            if (savedData) {
                const data = JSON.parse(savedData);
                
                Object.keys(data).forEach(name => {
                    const elements = this.form.querySelectorAll(`[name="${name}"]`);
                    elements.forEach(element => {
                        if (element.type === 'radio' || element.type === 'checkbox') {
                            if (element.value === data[name]) {
                                element.checked = true;
                            }
                        } else {
                            element.value = data[name];
                        }
                    });
                });
            }
        } catch (error) {
            console.warn('Auto-save verisi yüklenirken hata:', error);
        }
    }

    setupAutoSave() {
        const inputs = this.form.querySelectorAll('input, select, textarea');
        
        inputs.forEach(input => {
            input.addEventListener('change', () => {
                this.debouncedSave();
            });
        });
    }

    debouncedSave() {
        clearTimeout(this.debounceTimer);
        this.debounceTimer = setTimeout(() => {
            this.saveData();
        }, 500);
    }

    saveData() {
        try {
            const formData = new FormData(this.form);
            const data = {};
            
            for (let [key, value] of formData.entries()) {
                data[key] = value;
            }
            
            localStorage.setItem(this.saveKey, JSON.stringify(data));
        } catch (error) {
            console.warn('Auto-save hatası:', error);
        }
    }

    clearSavedData() {
        try {
            localStorage.removeItem(this.saveKey);
        } catch (error) {
            console.warn('Auto-save temizleme hatası:', error);
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Initialize test page utilities
    new TestPageUtils();
    
    // Initialize question manager for test questions page
    const testForm = document.getElementById('test-form');
    if (testForm && document.querySelector('.test-question')) {
        window.questionManager = new QuestionManager();
        
        // Load saved progress
        window.questionManager.loadProgress();
        
        // Auto-save on answer changes
        testForm.addEventListener('change', () => {
            if (window.questionManager) {
                window.questionManager.saveProgress();
            }
        });
        
        // Clear auto-save on successful form submission
        testForm.addEventListener('submit', () => {
            setTimeout(() => {
                const userName = document.querySelector('[data-user-name]')?.dataset.userName || 'user';
                const saveKey = `mbti_test_answers_${userName}`;
                localStorage.removeItem(saveKey);
            }, 1000);
        });
    }
    
    // Initialize auto-save for other forms
    if (testForm && !document.querySelector('.test-question')) {
        const userName = document.querySelector('[data-user-name]')?.dataset.userName || 'user';
        const autoSave = new TestAutoSave('test-form', `mbti_test_answers_${userName}`);
        
        testForm.addEventListener('submit', () => {
            setTimeout(() => {
                autoSave.clearSavedData();
            }, 1000);
        });
    }
});

// Export for global access
window.TestPageUtils = TestPageUtils;
window.TestAutoSave = TestAutoSave;
window.QuestionManager = QuestionManager;