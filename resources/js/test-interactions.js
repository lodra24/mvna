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
        this.testId = this.form.dataset.testId;
        this.saveProgressUrl = `/test/save-progress/${this.testId}`;
        
        // Test durumunu yönetecek özellikler
        this.currentQuestionIndex = 0;
        this.answers = {};
        this.advanceTimer = null;
        
        
        // Sınıfı başlat
        this.init();
    }
    
    init() {
        this.loadInitialAnswers();
        this.setupEventListeners();
        this.showQuestion(this.currentQuestionIndex);
        this.updateUI();
    }
    
    loadInitialAnswers() {
        const initialAnswersData = document.getElementById('initial-answers-data');
        if (initialAnswersData) {
            try {
                const answers = JSON.parse(initialAnswersData.textContent);
                this.answers = answers;

                // Arayüzdeki radio butonları işaretle
                Object.entries(this.answers).forEach(([questionId, value]) => {
                    const radioInput = this.form.querySelector(`input[data-question-id="${questionId}"][value="${value}"]`);
                    if (radioInput) {
                        radioInput.checked = true;
                        const selectedOption = radioInput.closest('.test-option');
                        if (selectedOption) {
                            selectedOption.classList.add('selected');
                        }
                    }
                });

                // En son cevaplanan sorudan bir sonrakine git veya son soruda kal
                const lastAnsweredIndex = this.findLastAnsweredQuestionIndex();
                if (lastAnsweredIndex !== -1 && lastAnsweredIndex < this.totalQuestions - 1) {
                    this.currentQuestionIndex = lastAnsweredIndex + 1;
                } else if(lastAnsweredIndex !== -1) {
                    this.currentQuestionIndex = lastAnsweredIndex;
                }

            } catch (e) {
                console.error("Başlangıç cevapları yüklenirken hata oluştu:", e);
            }
        }
    }
    
    findLastAnsweredQuestionIndex() {
        const answeredIds = Object.keys(this.answers);
        if (answeredIds.length === 0) return -1;

        let lastIndex = -1;
        this.questions.forEach((q, index) => {
            const questionId = q.querySelector('input[type=radio]').dataset.questionId;
            if (answeredIds.includes(questionId)) {
                lastIndex = index;
            }
        });
        return lastIndex;
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
        
        // Form submit event listener
        this.form.addEventListener('submit', (e) => {
            e.preventDefault(); // Varsayılan form gönderimini engelle
            this.handleFormSubmit();
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
        
        this.saveAnswerToServer(questionId, value);
        
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
    
    async saveAnswerToServer(questionId, chosenOption) {
        try {
            const response = await fetch(this.saveProgressUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    question_id: questionId,
                    chosen_option: chosenOption
                })
            });

            if (!response.ok) {
                const errorData = await response.json();
                console.error('Cevap kaydedilemedi:', response.statusText, errorData);
            } else {
                console.log(`Cevap kaydedildi: Soru ${questionId} = ${chosenOption}`);
            }
        } catch (error) {
            console.error('Sunucu bağlantı hatası:', error);
        }
    }
    
    async handleFormSubmit() {
        const overlay = document.getElementById('submission-overlay');
        const messageEl = document.getElementById('submission-message');
        const spinnerEl = document.getElementById('submission-spinner');

        // 1. Arayüzü Hazırla ve Göster
        messageEl.textContent = 'Checking your answers...';
        overlay.classList.remove('hidden');
        overlay.classList.add('flex'); // flex ile ortalamayı sağlıyoruz
        
        // Kullanıcıyı sayfanın en üstüne yumuşakça kaydır
        window.scrollTo({ top: 0, behavior: 'smooth' });

        try {
            // Bir sonraki adıma geçmeden önce kısa bir gecikme ekleyerek animasyonun görünmesini sağla
            await new Promise(resolve => setTimeout(resolve, 800));

            // 2. Mesajı Güncelle
            messageEl.textContent = 'Calculating your result...';
            spinnerEl.classList.add('animate-pulse'); // Spinner'a ek bir efekt

            const formData = new FormData(this.form);
            const response = await fetch(this.form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                },
                body: formData,
            });

            // Sonuç hesaplanıyormuş gibi hissettirmek için minimum bir bekleme süresi
            await new Promise(resolve => setTimeout(resolve, 1500));

            const result = await response.json();

            if (response.ok && result.success && result.redirect_url) {
                // 3. Başarı Mesajı ve Yönlendirme
                messageEl.textContent = 'Redirecting to your results...';
                spinnerEl.classList.remove('animate-pulse');

                // Sayfanın kararak geçiş yapması
                overlay.style.transition = 'opacity 0.5s ease-in';
                overlay.style.opacity = '0.9';

                setTimeout(() => {
                    window.location.href = result.redirect_url;
                }, 700);

            } else {
                throw new Error(result.message || 'Submission failed.');
            }
        } catch (error) {
            // 4. Hata Yönetimi
            console.error('Form submission error:', error);
            messageEl.textContent = `An error occurred: ${error.message}. Please try again.`;
            // Hata durumunda spinner'ı gizle ve bir hata ikonu göster (opsiyonel)
            spinnerEl.style.display = 'none';

            // Kullanıcıya hatayı okuması için zaman ver, sonra arayüzü gizle
            setTimeout(() => {
                overlay.classList.add('hidden');
                overlay.classList.remove('flex');
                spinnerEl.style.display = 'block'; // Spinner'ı tekrar görünür yap
            }, 4000);
        }
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