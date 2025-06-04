/**
 * Test Pages JavaScript Interactions
 * Modern MBTI Test sayfaları için özel JavaScript fonksiyonları
 */

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
            errorMessage = 'Bu alan zorunludur.';
        } else if (fieldType === 'email' && value && !this.isValidEmail(value)) {
            isValid = false;
            errorMessage = 'Geçerli bir e-posta adresi girin.';
        } else if (fieldType === 'text' && field.name === 'name' && value && value.length < 2) {
            isValid = false;
            errorMessage = 'Ad en az 2 karakter olmalıdır.';
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
    
    // Initialize auto-save for test form if exists
    const testForm = document.getElementById('test-form');
    if (testForm) {
        const userName = document.querySelector('[data-user-name]')?.dataset.userName || 'user';
        const autoSave = new TestAutoSave('test-form', `mbti_test_answers_${userName}`);
        
        // Clear auto-save on successful form submission
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