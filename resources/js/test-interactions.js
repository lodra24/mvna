/**
 * QuestionManager Sınıfı
 * Test sayfasının tüm durumunu ve mantığını yöneten merkezi JavaScript sınıfı
 */

class QuestionManager {
    constructor() {
        // DOM elementlerini seç ve sınıf özelliklerine ata
        this.form = document.getElementById('test-form');
        this.questionsContainer = document.getElementById('questions-container');
        this.questions = Array.from(this.questionsContainer.querySelectorAll('.test-question'));
        this.totalQuestions = this.questions.length;
        
        // Test durumunu yönetecek özellikler
        this.currentQuestionIndex = 0;
        this.answers = {};
        this.advanceTimer = null;
        
        // LocalStorage için kullanıcı adı ve anahtar
        this.userName = document.querySelector('[data-user-name]')?.dataset.userName || 'guest_user';
        this.saveKey = 'mbti_test_progress';
        this.saveDebounceTimer = null;
        
        // Sınıfı başlat
        this.init();
    }
    
    init() {
        this.loadProgress();
        this.setupEventListeners();
        this.showQuestion(this.currentQuestionIndex);
        this.updateUI();
    }
    
    showQuestion(index) {
        // Mevcut soru indeksini güncelle
        this.currentQuestionIndex = index;
        
        // Tüm soru elementleri üzerinde döngü kur
        this.questions.forEach((question, questionIndex) => {
            // Önceki sınıfları kaldır
            question.classList.remove('question-active', 'question-prev', 'question-next');
            
            // Yeni sınıfları indekse göre ekle
            if (questionIndex === this.currentQuestionIndex) {
                question.classList.add('question-active');
            } else if (questionIndex < this.currentQuestionIndex) {
                question.classList.add('question-prev');
            } else {
                question.classList.add('question-next');
            }
        });
        
        // Dinamik yükseklik ayarı
        const activeQuestionEl = this.questions[this.currentQuestionIndex];
        if (this.questionsContainer && activeQuestionEl) {
            this.questionsContainer.style.height = `${activeQuestionEl.offsetHeight}px`;
        }
        
        // Arayüzü güncelle
        this.updateUI();
        
        // Focus mantığı - soru değiştikten 400ms sonra yeni sorunun ilk radio butonuna odaklan
        setTimeout(() => {
            const activeQuestionEl = this.questions[this.currentQuestionIndex];
            if (activeQuestionEl) {
                activeQuestionEl.querySelector('input[type="radio"]')?.focus();
            }
        }, 400);
    }
    
    nextQuestion() {
        // Son sorudan sonra geçiş yapma
        if (this.currentQuestionIndex < this.totalQuestions - 1) {
            this.currentQuestionIndex++;
            this.showQuestion(this.currentQuestionIndex);
        }
    }
    
    previousQuestion() {
        // İlk sorudan önce geçiş yapma
        if (this.currentQuestionIndex > 0) {
            this.currentQuestionIndex--;
            this.showQuestion(this.currentQuestionIndex);
        }
    }
    
    setupEventListeners() {
        // Önceki soru butonu için event listener
        const prevBtn = document.getElementById('prev-question-btn');
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                this.previousQuestion();
            });
        }
        
        // Nav-dot'lar için click event listener
        const navDots = document.querySelectorAll('.nav-dot');
        navDots.forEach(dot => {
            dot.addEventListener('click', (e) => {
                const questionIndex = parseInt(e.target.getAttribute('data-question-index'));
                if (!isNaN(questionIndex)) {
                    this.showQuestion(questionIndex);
                }
            });
        });
        
        // Radio butonları için change event listener
        this.questionsContainer.addEventListener('change', (e) => {
            if (e.target.type === 'radio' && e.target.name.startsWith('answers')) {
                this.handleAnswerSelection(e.target);
            }
        });
        
        // Form submit event listener - progress temizleme için
        this.form.addEventListener('submit', () => {
            this.clearProgress();
        });
    }
    
    updateUI() {
        // Merkezi arayüz güncelleme metodu
        this.updateProgressBar();
        this.updateNavigationButtons();
        this.updateNavDots();
    }
    
    updateProgressBar() {
        // Cevaplanmış soru sayısını al
        const answeredCount = Object.keys(this.answers).length;
        
        // İlerleme yüzdesini hesapla
        const percentage = Math.round((answeredCount / this.totalQuestions) * 100);
        
        // Progress bar'ı güncelle
        const progressBarFill = document.getElementById('progress-bar-fill');
        if (progressBarFill) {
            progressBarFill.style.width = percentage + '%';
        }
        
        // Progress yüzdesini güncelle
        const progressPercent = document.getElementById('progress-percent');
        if (progressPercent) {
            progressPercent.textContent = percentage + '%';
        }
        
        // Soru sayacını güncelle
        const questionCounter = document.getElementById('question-counter');
        if (questionCounter) {
            questionCounter.textContent = `Question ${this.currentQuestionIndex + 1}/${this.totalQuestions}`;
        }
        
        // Cevaplanmış soru sayısını güncelle
        const answeredCountElement = document.getElementById('answered-count');
        if (answeredCountElement) {
            answeredCountElement.textContent = answeredCount;
        }
    }
    
    updateNavigationButtons() {
        // Önceki soru butonunu güncelle
        const prevBtn = document.getElementById('prev-question-btn');
        if (prevBtn) {
            prevBtn.style.display = this.currentQuestionIndex > 0 ? 'inline-flex' : 'none';
        }
        
        // Tüm sorular cevaplanmış mı kontrol et
        const allAnswered = this.allQuestionsAnswered();
        
        // Submit button wrapper'ını sürekli görünür yap
        const submitWrapper = document.getElementById('submit-button-wrapper');
        if (submitWrapper) {
            submitWrapper.style.display = 'flex';
        }
        
        // Submit butonunu sadece tüm sorular cevaplanmışsa aktif et
        const submitBtn = document.getElementById('submit-btn');
        if (submitBtn) {
            submitBtn.disabled = !allAnswered;
        }
    }
    
    handleAnswerSelection(radioInput) {
        // Önceki zamanlayıcıyı iptal et
        clearTimeout(this.advanceTimer);
        
        // Cevabı kaydet
        const questionId = radioInput.getAttribute('data-question-id');
        const value = radioInput.value;
        this.answers[questionId] = value;
        
        // UI'yi anında güncelle
        this.updateUI();
        
        // Görsel geri bildirim - selected CSS sınıfını güncelle
        const currentQuestion = radioInput.closest('.test-question');
        if (currentQuestion) {
            // Önce tüm seçeneklerden selected sınıfını kaldır
            const allOptions = currentQuestion.querySelectorAll('.test-option');
            allOptions.forEach(option => option.classList.remove('selected'));
            
            // Seçilen seçeneğe selected sınıfını ekle
            const selectedOption = radioInput.closest('.test-option');
            if (selectedOption) {
                selectedOption.classList.add('selected');
            }
        }
        
        // Progress'i kaydet (debounced)
        this.debouncedSaveProgress();
        
        // Otomatik ilerleme mantığı
        this.advanceTimer = setTimeout(() => {
            if (this.currentQuestionIndex < this.totalQuestions - 1) {
                this.nextQuestion();
            }
        }, 400);
    }
    
    allQuestionsAnswered() {
        // Tüm soruların cevaplanıp cevaplanmadığını kontrol et
        return Object.keys(this.answers).length === this.totalQuestions;
    }
    
    saveProgress() {
        // Progress objesini oluştur
        const progressData = {
            answers: this.answers,
            currentQuestionIndex: this.currentQuestionIndex,
            userName: this.userName,
            timestamp: new Date().getTime()
        };
        
        // localStorage'a kaydet
        localStorage.setItem(this.saveKey, JSON.stringify(progressData));
        console.log('Progress saved.');
    }
    
    debouncedSaveProgress() {
        // Mevcut timer'ı temizle
        clearTimeout(this.saveDebounceTimer);
        
        // Yeni timer kur
        this.saveDebounceTimer = setTimeout(() => {
            this.saveProgress();
        }, 500);
    }
    
    loadProgress() {
        // localStorage'dan veriyi oku
        const savedData = localStorage.getItem(this.saveKey);
        
        if (savedData) {
            try {
                const progressData = JSON.parse(savedData);
                
                // Veriyi sınıf özelliklerine ata
                this.answers = progressData.answers || {};
                this.currentQuestionIndex = progressData.currentQuestionIndex || 0;
                
                // Kayıtlı cevapları radio butonlarına uygula
                Object.entries(this.answers).forEach(([questionId, value]) => {
                    const radioInput = this.form.querySelector(`input[data-question-id="${questionId}"][value="${value}"]`);
                    if (radioInput) {
                        radioInput.checked = true;
                        // Görsel geri bildirim için selected sınıfını ekle
                        const selectedOption = radioInput.closest('.test-option');
                        if (selectedOption) {
                            selectedOption.classList.add('selected');
                        }
                    }
                });
                
                console.log('Progress loaded.');
            } catch (error) {
                console.error('Error loading progress:', error);
            }
        }
    }
    
    clearProgress() {
        // localStorage'dan veriyi sil
        localStorage.removeItem(this.saveKey);
    }
    
    updateNavDots() {
        // Nav-dot'ları güncelle
        const navDots = document.querySelectorAll('.nav-dot');
        
        navDots.forEach((dot, index) => {
            // Tüm sınıfları temizle
            dot.classList.remove('active', 'answered');
            
            // Soru ID'sini al
            const questionId = dot.getAttribute('data-question-id');
            
            // Aktif soru mu kontrol et
            if (index === this.currentQuestionIndex) {
                dot.classList.add('active');
            }
            
            // Cevaplanmış soru mu kontrol et
            if (questionId && this.answers[questionId]) {
                dot.classList.add('answered');
            }
        });
    }
}

// Sayfa tamamen yüklendiğinde QuestionManager'ı başlat
document.addEventListener('DOMContentLoaded', function() {
    // test-form elementinin varlığını kontrol et
    if (document.getElementById('test-form')) {
        // QuestionManager nesnesini oluştur ve global değişkene ata
        window.questionManager = new QuestionManager();
    }
});