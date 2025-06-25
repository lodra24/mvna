@php
    $settings = app(\App\Settings\GeneralSettings::class);
@endphp

@if($cookieConsentConfig['enabled'] && ! $alreadyConsentedWithCookies)
    <div class="js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2 sm:pb-5 z-50">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="p-3 sm:p-4 rounded-xl bg-slate-800/90 backdrop-blur-sm shadow-2xl border border-slate-700/50">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center text-white">
                        <span class="flex p-2 rounded-lg bg-slate-700/80 backdrop-blur-sm">
                            <!-- Cookie İkonu -->
                            <svg class="h-6 w-6 text-amber-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </span>
                        <div class="ml-3">
                            <p class="font-medium text-white">
                                <span class="md:hidden"> 
                                    {{ Str::limit($settings->cookie_consent_message ?? 'Sitemizde daha iyi bir deneyim sunmak için çerezleri kullanıyoruz.', 60) }} 
                                </span>
                                <span class="hidden md:inline"> 
                                    {{ $settings->cookie_consent_message ?? 'Sitemizde daha iyi bir deneyim sunmak için çerezleri kullanıyoruz.' }} 
                                </span>
                            </p>
                            <p class="text-slate-300 text-sm mt-1">
                                <a href="{{ route('privacy-policy') }}" class="font-medium hover:text-white underline decoration-dotted underline-offset-2 transition-colors">
                                    Privacy Policy
                                </a>
                                <span class="mx-2">•</span>
                                <a href="{{ route('terms-of-service') }}" class="font-medium hover:text-white underline decoration-dotted underline-offset-2 transition-colors">
                                    Terms of Service
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="order-3 mt-4 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto sm:ml-4">
                        <button class="js-cookie-consent-agree w-full sm:w-auto px-6 py-2.5 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-105 hover:shadow-lg">
                            {{ $settings->cookie_consent_agree_button_text ?? 'Anladım ve Kabul Ediyorum' }}
                        </button>
                    </div>
                    <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                        <button type="button" class="js-cookie-consent-agree -mr-1 flex p-2 rounded-md hover:bg-slate-700/60 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-800 transition-colors duration-200">
                            <span class="sr-only">Kapat</span>
                            <!-- X İkonu -->
                            <svg class="h-6 w-6 text-slate-400 hover:text-white transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.laravelCookieConsent = (function () {
            const COOKIE_VALUE = 1;
            const COOKIE_DOMAIN = '{{ config('session.domain') ?? request()->getHost() }}';

            function consentWithCookies() {
                setCookie('{{ $cookieConsentConfig['cookie_name'] }}', COOKIE_VALUE, {{ $cookieConsentConfig['cookie_lifetime'] }});
                hideCookieDialog();
            }

            function cookieExists(name) {
                return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
            }

            function hideCookieDialog() {
                const dialogs = document.getElementsByClassName('js-cookie-consent');
                
                for (let i = 0; i < dialogs.length; ++i) {
                    // Güzel bir fade-out animasyonu
                    dialogs[i].style.transition = 'opacity 0.3s ease-out, transform 0.3s ease-out';
                    dialogs[i].style.opacity = '0';
                    dialogs[i].style.transform = 'translateY(100%)';
                    
                    setTimeout(() => {
                        dialogs[i].style.display = 'none';
                    }, 300);
                }
            }

            function setCookie(name, value, expirationInDays) {
                const date = new Date();
                date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
                document.cookie = name + '=' + value
                    + ';expires=' + date.toUTCString()
                    + ';domain=' + COOKIE_DOMAIN
                    + ';path=/{{ config('session.secure') ? ';secure' : null }}'
                    + '{{ config('session.same_site') ? ';samesite='.config('session.same_site') : null }}';
            }

            if (cookieExists('{{ $cookieConsentConfig['cookie_name'] }}')) {
                hideCookieDialog();
            }

            const buttons = document.getElementsByClassName('js-cookie-consent-agree');

            for (let i = 0; i < buttons.length; ++i) {
                buttons[i].addEventListener('click', consentWithCookies);
            }

            return {
                consentWithCookies: consentWithCookies,
                hideCookieDialog: hideCookieDialog
            };
        })();
    </script>

@endif
