/**
 * QuestionManager Class
 * Central JS class to manage the entire state and logic of the test page.
 */

class QuestionManager {
    constructor() {
        // Select DOM elements and assign to class properties
        this.form = document.getElementById('test-form');
        this.questionsContainer = document.getElementById('questions-container');
        this.questions = Array.from(this.questionsContainer.querySelectorAll('.test-question'));
        this.totalQuestions = this.questions.length;
        this.testId = this.form.dataset.testId;
        this.saveProgressUrl = `/test/save-progress/${this.testId}`;
        
        // Properties to manage the test state
        this.currentQuestionIndex = 0;
        this.answers = {};
        this.advanceTimer = null;
        
        
        // Initialize the class
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

                // Mark the radio buttons on the UI
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

                // Go to the next question after the last answered one, or stay on the last question
                const lastAnsweredIndex = this.findLastAnsweredQuestionIndex();
                if (lastAnsweredIndex !== -1 && lastAnsweredIndex < this.totalQuestions - 1) {
                    this.currentQuestionIndex = lastAnsweredIndex + 1;
                } else if(lastAnsweredIndex !== -1) {
                    this.currentQuestionIndex = lastAnsweredIndex;
                }

            } catch (e) {
                console.error("Error loading initial answers:", e);
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
        // Update the current question index
        this.currentQuestionIndex = index;
        
        // Loop through all question elements
        this.questions.forEach((question, questionIndex) => {
            // Remove previous classes
            question.classList.remove('question-active', 'question-prev', 'question-next');
            
            // Add new classes based on index
            if (questionIndex === this.currentQuestionIndex) {
                question.classList.add('question-active');
            } else if (questionIndex < this.currentQuestionIndex) {
                question.classList.add('question-prev');
            } else {
                question.classList.add('question-next');
            }
        });
        
        // Dynamic height adjustment
        const activeQuestionEl = this.questions[this.currentQuestionIndex];
        if (this.questionsContainer && activeQuestionEl) {
            this.questionsContainer.style.height = `${activeQuestionEl.offsetHeight}px`;
        }
        
        // Update the UI
        this.updateUI();
        
        // Focus logic - focus on the first radio button of the new question 400ms after question change
        setTimeout(() => {
            const activeQuestionEl = this.questions[this.currentQuestionIndex];
            if (activeQuestionEl) {
                activeQuestionEl.querySelector('input[type="radio"]')?.focus();
            }
        }, 400);
    }
    
    nextQuestion() {
        // Don't transition after the last question
        if (this.currentQuestionIndex < this.totalQuestions - 1) {
            this.currentQuestionIndex++;
            this.showQuestion(this.currentQuestionIndex);
        }
    }
    
    previousQuestion() {
        // Don't transition before the first question
        if (this.currentQuestionIndex > 0) {
            this.currentQuestionIndex--;
            this.showQuestion(this.currentQuestionIndex);
        }
    }
    
    setupEventListeners() {
        // Event listener for the previous question button
        const prevBtn = document.getElementById('prev-question-btn');
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                this.previousQuestion();
            });
        }
        
        // Click event listener for nav-dots
        const navDots = document.querySelectorAll('.nav-dot');
        navDots.forEach(dot => {
            dot.addEventListener('click', (e) => {
                const questionIndex = parseInt(e.target.getAttribute('data-question-index'));
                if (!isNaN(questionIndex)) {
                    this.showQuestion(questionIndex);
                }
            });
        });
        
        // Change event listener for radio buttons
        this.questionsContainer.addEventListener('change', (e) => {
            if (e.target.type === 'radio' && e.target.name.startsWith('answers')) {
                this.handleAnswerSelection(e.target);
            }
        });
        
        // Form submit event listener
        this.form.addEventListener('submit', (e) => {
            e.preventDefault(); // Prevent default form submission
            this.handleFormSubmit();
        });
    }
    
    updateUI() {
        // Central UI update method
        this.updateProgressBar();
        this.updateNavigationButtons();
        this.updateNavDots();
    }
    
    updateProgressBar() {
        // Get the number of answered questions
        const answeredCount = Object.keys(this.answers).length;
        
        // Calculate the progress percentage
        const percentage = Math.round((answeredCount / this.totalQuestions) * 100);
        
        // Update the progress bar
        const progressBarFill = document.getElementById('progress-bar-fill');
        if (progressBarFill) {
            progressBarFill.style.width = percentage + '%';
        }
        
        // Update the progress percentage
        const progressPercent = document.getElementById('progress-percent');
        if (progressPercent) {
            progressPercent.textContent = percentage + '%';
        }
        
        // Update the question counter
        const questionCounter = document.getElementById('question-counter');
        if (questionCounter) {
            questionCounter.textContent = `Question ${this.currentQuestionIndex + 1}/${this.totalQuestions}`;
        }
        
        // Update the answered question count
        const answeredCountElement = document.getElementById('answered-count');
        if (answeredCountElement) {
            answeredCountElement.textContent = answeredCount;
        }
    }
    
    updateNavigationButtons() {
        // Update the previous question button
        const prevBtn = document.getElementById('prev-question-btn');
        if (prevBtn) {
            prevBtn.style.display = this.currentQuestionIndex > 0 ? 'inline-flex' : 'none';
        }
        
        // Check if all questions are answered
        const allAnswered = this.allQuestionsAnswered();
        
        // Keep the submit button wrapper always visible
        const submitWrapper = document.getElementById('submit-button-wrapper');
        if (submitWrapper) {
            submitWrapper.style.display = 'flex';
        }
        
        // Activate the submit button only if all questions are answered
        const submitBtn = document.getElementById('submit-btn');
        if (submitBtn) {
            submitBtn.disabled = !allAnswered;
        }
    }
    
    handleAnswerSelection(radioInput) {
        // Cancel the previous timer
        clearTimeout(this.advanceTimer);
        
        // Save the answer
        const questionId = radioInput.getAttribute('data-question-id');
        const value = radioInput.value;
        this.answers[questionId] = value;
        
        // Update the UI immediately
        this.updateUI();
        
        // Visual feedback - update the selected CSS class
        const currentQuestion = radioInput.closest('.test-question');
        if (currentQuestion) {
            // First remove the selected class from all options
            const allOptions = currentQuestion.querySelectorAll('.test-option');
            allOptions.forEach(option => option.classList.remove('selected'));
            
            // Add the selected class to the chosen option
            const selectedOption = radioInput.closest('.test-option');
            if (selectedOption) {
                selectedOption.classList.add('selected');
            }
        }
        
        this.saveAnswerToServer(questionId, value);
        
        // Automatic progression logic
        this.advanceTimer = setTimeout(() => {
            if (this.currentQuestionIndex < this.totalQuestions - 1) {
                this.nextQuestion();
            }
        }, 400);
    }
    
    allQuestionsAnswered() {
        // Check if all questions have been answered
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
                console.error('Failed to save answer:', response.statusText, errorData);
            } else {
                console.log(`Answer saved: Question ${questionId} = ${chosenOption}`);
            }
        } catch (error) {
            console.error('Server connection error:', error);
        }
    }
    
    async handleFormSubmit() {
        const overlay = document.getElementById('submission-overlay');
        const messageEl = document.getElementById('submission-message');
        const spinnerEl = document.getElementById('submission-spinner');

        // 1. Prepare and Show the UI
        messageEl.textContent = 'Checking your answers...';
        overlay.classList.remove('hidden');
        overlay.classList.add('flex'); // use flex for centering
        
        // Smoothly scroll the user to the top of the page
        window.scrollTo({ top: 0, behavior: 'smooth' });

        try {
            // Add a short delay before proceeding to the next step to ensure the animation is visible
            await new Promise(resolve => setTimeout(resolve, 800));

            // 2. Update the Message
            messageEl.textContent = 'Calculating your result...';
            spinnerEl.classList.add('animate-pulse'); // Add an extra effect to the spinner

            const formData = new FormData(this.form);
            const response = await fetch(this.form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                },
                body: formData,
            });

            // Minimum waiting time to make it feel like the result is being calculated
            await new Promise(resolve => setTimeout(resolve, 1500));

            const result = await response.json();

            if (response.ok && result.success && result.redirect_url) {
                // 3. Success Message and Redirection
                messageEl.textContent = 'Redirecting to your results...';
                spinnerEl.classList.remove('animate-pulse');

                // Make the page fade out for transition
                overlay.style.transition = 'opacity 0.5s ease-in';
                overlay.style.opacity = '0.9';

                setTimeout(() => {
                    window.location.href = result.redirect_url;
                }, 700);

            } else {
                throw new Error(result.message || 'Submission failed.');
            }
        } catch (error) {
            // 4. Error Handling
            console.error('Form submission error:', error);
            messageEl.textContent = `An error occurred: ${error.message}. Please try again.`;
            // Hide the spinner in case of error and show an error icon (optional)
            spinnerEl.style.display = 'none';

            // Give the user time to read the error, then hide the UI
            setTimeout(() => {
                overlay.classList.add('hidden');
                overlay.classList.remove('flex');
                spinnerEl.style.display = 'block'; // Make the spinner visible again
            }, 4000);
        }
    }
    
    updateNavDots() {
        // Update the nav-dots
        const navDots = document.querySelectorAll('.nav-dot');
        
        navDots.forEach((dot, index) => {
            // Clear all classes
            dot.classList.remove('active', 'answered');
            
            // Get the question ID
            const questionId = dot.getAttribute('data-question-id');
            
            // Check if it's the active question
            if (index === this.currentQuestionIndex) {
                dot.classList.add('active');
            }
            
            // Check if the question is answered
            if (questionId && this.answers[questionId]) {
                dot.classList.add('answered');
            }
        });
    }
}

// Initialize QuestionManager when the page is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Check if the test-form element exists
    if (document.getElementById('test-form')) {
        // Create a QuestionManager instance and assign it to a global variable
        window.questionManager = new QuestionManager();
    }
});