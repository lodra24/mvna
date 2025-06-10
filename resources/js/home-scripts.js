console.log("home-scripts.js başarıyla yüklendi!");
// Mobil Menü Toggle
const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');
const menuIconOpen = document.getElementById('menu-icon-open');
const menuIconClose = document.getElementById('menu-icon-close');

if (mobileMenuButton && mobileMenu && menuIconOpen && menuIconClose) { // Elementlerin varlığını kontrol et
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        menuIconOpen.classList.toggle('hidden');
        menuIconClose.classList.toggle('hidden');
        const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
        mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
    });
}

// Sayfa içi linklere yumuşak kaydırma
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        
        // Mobil menü açıksa ve link # değilse kapat
        if (mobileMenu && !mobileMenu.classList.contains('hidden') && targetId !== '#') {
            mobileMenu.classList.add('hidden');
            if (menuIconOpen) menuIconOpen.classList.remove('hidden');
            if (menuIconClose) menuIconClose.classList.add('hidden');
            if (mobileMenuButton) mobileMenuButton.setAttribute('aria-expanded', 'false');
        }
        
        if (targetId === '#') {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        } else {
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const header = document.querySelector('header');
                const headerOffset = header ? header.offsetHeight : 0;
                const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                const offsetPosition = elementPosition - headerOffset - 20;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        }
    });
});

// Logo carousel'ı kullanıcı etkileşiminde durdurma/başlatma
const logoCarousel = document.querySelector('.logo-carousel-track');
if (logoCarousel) {
    logoCarousel.addEventListener('mouseenter', () => {
        logoCarousel.style.animationPlayState = 'paused';
    });
    
    logoCarousel.addEventListener('mouseleave', () => {
        logoCarousel.style.animationPlayState = 'running';
    });
}

// FAQ Accordion functionality - Animasyonlu version
window.toggleFAQ = function(button) { // Fonksiyonu global scope'a taşı
    const faqItem = button.closest('.faq-item');
    const answer = faqItem.querySelector('.faq-answer');
    const icon = button.querySelector('.faq-icon');
    const isOpen = answer.classList.contains('open');
    
    // Tüm FAQ öğelerini kapat
    document.querySelectorAll('.faq-item').forEach(item => {
        const otherAnswer = item.querySelector('.faq-answer');
        const otherIcon = item.querySelector('.faq-icon');
        if (item !== faqItem && otherAnswer.classList.contains('open')) {
            otherAnswer.classList.remove('open');
            otherIcon.style.transform = 'rotate(0deg)';
            item.classList.remove('ring-2', 'ring-mindmetrics-indigo/20', 'active');
        }
    });
    
    // Mevcut öğeyi aç/kapat
    if (isOpen) {
        answer.classList.remove('open');
        icon.style.transform = 'rotate(0deg)';
        faqItem.classList.remove('ring-2', 'ring-mindmetrics-indigo/20', 'active');
    } else {
        answer.classList.add('open');
        icon.style.transform = 'rotate(180deg)';
        faqItem.classList.add('ring-2', 'ring-mindmetrics-indigo/20', 'active');
    }
}

// Sayfa yüklendiğinde tüm FAQ butonlarına stil uygula
document.addEventListener('DOMContentLoaded', function() {
    // toggleFAQ fonksiyonunu butonlara event listener olarak ekle
    document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', function() {
            toggleFAQ(this);
        });

        // Kullanıcı seçimi ve dokunma vurgusunu engelleme stilleri
        button.style.userSelect = 'none';
        button.style.webkitUserSelect = 'none';
        button.style.mozUserSelect = 'none';
        button.style.msUserSelect = 'none';
        button.style.webkitTouchCallout = 'none';
        button.style.webkitTapHighlightColor = 'transparent';
        
        button.querySelectorAll('*').forEach(child => {
            child.style.userSelect = 'none';
            child.style.webkitUserSelect = 'none';
        });
    });
    
    // Demo Form Submit Function
    window.submitDemoForm = function() {
        // Form verilerini al
        const form = event.target;
        const formData = new FormData(form);
        
        // Basit validasyon
        const name = formData.get('name');
        const email = formData.get('email');
        const company = formData.get('company');
        
        if (!name || !email || !company) {
            alert('Lütfen tüm zorunlu alanları doldurun.');
            return;
        }
        
        // Email format kontrolü
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Lütfen geçerli bir email adresi girin.');
            return;
        }
        
        // Modal'ı kapat
        if (window.Alpine) {
            Alpine.store('demoModal', false);
        }
        
        // Toast mesajını göster
        setTimeout(() => {
            if (window.Alpine) {
                const data = Alpine.$data(document.body);
                data.toastMessage = 'Your message has been sent successfully! We will get back to you within 24 hours.';
                data.showToast = true;
                data.showDemoModal = false;
            }
        }, 300);
        
        // Form'u temizle
        form.reset();
        
        console.log('Demo request submitted:', {
            name: name,
            email: email,
            company: company,
            message: formData.get('message')
        });
    }
});