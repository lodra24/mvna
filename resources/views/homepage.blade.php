<!DOCTYPE html>
<html lang="tr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindMetrics - İş Potansiyelini MBTI ile Açığa Çıkar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Inter fontu artık Tailwind tarafından yönetilecek, ama preload için kalabilir --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Blade dosyasındaki <style> bloğu kaldırıldı veya sadece @apply içermeyen stiller bırakıldı --}}
</head>
<body class="antialiased"> {{-- body'deki stiller app.css'e taşındı --}}

    <!-- HEADER / NAVİGASYON -->
    <header class="w-full bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center space-x-2">
                        <svg class="h-8 w-auto text-mindmetrics-indigo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> {{-- text-indigo-600 yerine özel renk --}}
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-1.5m-6-16.5v.008c0 .19-.16.34-.347.347H10.586A.346.346 0 0110.24 4.5v-.007A.344.344 0 0110.586 4h2.828c.19 0 .347.157.347.347zm-3.375 0h.008v.008h-.008V4.5z" />
                        </svg>
                        <span class="text-2xl font-bold text-slate-800">MindMetrics</span>
                    </a>
                </div>

                <!-- Desktop Navigasyon -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="nav-link">Özellikler</a>
                    <a href="#pricing" class="nav-link">Fiyatlandırma</a>
                    <a href="#faq" class="nav-link">SSS</a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-mindmetrics-indigo bg-mindmetrics-indigo-light hover:bg-indigo-200 rounded-md transition-colors duration-200"> {{-- Özel renkler kullanıldı --}}
                        Giriş Yap
                    </a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-slate-500 hover:text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                        <span class="sr-only">Ana menüyü aç</span>
                        <svg class="h-6 w-6" id="menu-icon-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="h-6 w-6 hidden" id="menu-icon-close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#features" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-50">Özellikler</a>
                <a href="#pricing" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-50">Fiyatlandırma</a>
                <a href="#faq" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-slate-900 hover:bg-slate-50">SSS</a>
            </div>
            <div class="pt-4 pb-3 border-t border-slate-200">
                <div class="px-5">
                    <a href="{{ route('login') }}" class="block w-full px-4 py-2 text-center text-base font-medium text-mindmetrics-indigo bg-mindmetrics-indigo-light hover:bg-indigo-200 rounded-md">Giriş Yap</a> {{-- Özel renkler --}}
                </div>
            </div>
        </div>
    </header>

    <!-- HERO BÖLÜMÜ -->
    <main class="hero-gradient-bg relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-purple-50"></div>
            <div class="absolute top-0 left-0 w-72 h-72 bg-indigo-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            <div class="absolute top-0 right-0 w-72 h-72 bg-purple-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
            <div class="absolute bottom-0 right-20 w-72 h-72 bg-yellow-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-6000"></div>
        </div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-24 md:pt-16 md:pb-32 text-center">

            <!-- Ön Başlık Alanı (Pre-Headline) -->
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4 mb-8">
                <div class="pre-headline-badge">
                    <span>Powered by <strong>MBTI Foundation</strong></span>
                </div>
                <div class="pre-headline-badge-ph">
                     <svg class="w-4 h-4 text-rose-500 mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span><strong>324+</strong> İşveren Tarafından Onaylandı</span>
                </div>
            </div>

            <!-- Ana Başlık (H1) -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight mb-6">
                MBTI Vocational <span class="text-mindmetrics-indigo">NexusPoint</span><br>Analysis  {{-- Özel renk --}}
            </h1>

            <!-- Alt Başlık/Açıklama -->
            <p class="max-w-2xl mx-auto text-lg sm:text-xl text-slate-600 mb-10">
                İşverenler için özel olarak tasarlanmış kişilik analiz testimizle adaylarınızı ve çalışanlarınızı daha derinlemesine tanıyın, yönetim stratejilerinizi güçlendirin.
            </p>

            <!-- Temel Faydalar (Checklist) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-x-6 gap-y-4 max-w-2xl mx-auto mb-12 text-left sm:text-center">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-slate-700 font-medium">Hızlı ve Kolay Test</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-slate-700 font-medium">Detaylı İşveren Raporu</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-slate-700 font-medium">Gelişmiş Analizler</span>
                </div>
            </div>

            <!-- Ana Çağrı Butonu (CTA) -->
            <div class="mb-5">
                <a href="#test-baslat" class="cta-button">
                    Testi Şimdi Başlat
                     <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <!-- Güvence Metni -->
            <p class="text-xs text-slate-500">
                ✨ Kredi Kartı Gerekli Değil • Anında Sonuçlar
            </p>
        </div>
    </main>

    <!-- Diğer Bölümler (Yer Tutucu) -->
    {{-- Diğer bölümler aynı kalabilir, gerekirse yukarıdaki gibi özel renkler (text-mindmetrics-indigo vb.) kullanılabilir --}}
    <section id="features" class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-slate-900 mb-4">Özellikler</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto mb-12">MindMetrics'in sunduğu benzersiz özelliklerle tanışın.</p>
        </div>
    </section>

    <section id="pricing" class="py-16 sm:py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-slate-900 mb-4">Fiyatlandırma</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto mb-12">İhtiyaçlarınıza uygun, şeffaf fiyatlandırma seçenekleri.</p>
        </div>
    </section>

    <section id="faq" class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-4">Sıkça Sorulan Sorular</h2>
                <p class="text-lg text-slate-600 mb-12">Aklınızdaki soruların cevaplarını burada bulabilirsiniz.</p>
            </div>
        </div>
    </section>

    <footer class="bg-slate-800 text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
            <div class="mb-4">
                 <a href="/" class="inline-flex items-center space-x-2">
                     <svg class="h-7 w-auto text-mindmetrics-indigo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-1.5m-6-16.5v.008c0 .19-.16.34-.347.347H10.586A.346.346 0 0110.24 4.5v-.007A.344.344 0 0110.586 4h2.828c.19 0 .347.157.347.347zm-3.375 0h.008v.008h-.008V4.5z" /></svg>
                    <span class="text-xl font-semibold text-slate-200">MindMetrics</span>
                </a>
            </div>
            <nav class="flex flex-wrap justify-center space-x-6 mb-4">
                <a href="#features" class="text-sm hover:text-slate-200">Özellikler</a>
                <a href="#pricing" class="text-sm hover:text-slate-200">Fiyatlandırma</a>
                <a href="#faq" class="text-sm hover:text-slate-200">SSS</a>
                <a href="/privacy-policy" class="text-sm hover:text-slate-200">Gizlilik Politikası</a>
                <a href="/terms-of-service" class="text-sm hover:text-slate-200">Kullanım Koşulları</a>
            </nav>
            <p class="text-sm">© {{ date('Y') }} MindMetrics. Tüm hakları saklıdır.</p>
        </div>
    </footer>

    <script>
        // Mobil Menü Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIconOpen = document.getElementById('menu-icon-open');
        const menuIconClose = document.getElementById('menu-icon-close');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIconOpen.classList.toggle('hidden');
            menuIconClose.classList.toggle('hidden');
            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
            mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
        });

        // Sayfa içi linklere yumuşak kaydırma
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (!mobileMenu.classList.contains('hidden') && targetId !== '#') { // Menüyü sadece section linklerinde kapat
                    mobileMenu.classList.add('hidden');
                    menuIconOpen.classList.remove('hidden');
                    menuIconClose.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                }
                if (targetId === '#') {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                } else {
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        // Header'ın yüksekliğini hesaba katmak için (sticky header varsa)
                        const headerOffset = document.querySelector('header').offsetHeight || 0;
                        const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                        const offsetPosition = elementPosition - headerOffset - 20; // 20px ek boşluk

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>
