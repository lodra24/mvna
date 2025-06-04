@extends('layouts.test-layout')

@section('title', 'Test Sonucunuz')

@section('page-title', 'Tebrikler! 🎉')

@section('page-subtitle')
    MBTI kişilik analizi tamamlandı. Aşağıda detaylı sonuçlarınızı inceleyebilirsiniz.
@endsection

@section('progress', '100')

@section('card-class', 'test-card--elevated')

@section('content')
    <div class="test-results">
        <!-- MBTI Type Display -->
        <div class="test-results__mbti-card">
            <div class="test-results__mbti-type">{{ $mbtiType ?? 'Belirlenemedi' }}</div>
            <div class="test-results__mbti-description">
                @php
                    $typeDescriptions = [
                        'INTJ' => 'Mimar - Yaratıcı ve stratejik düşünür',
                        'INTP' => 'Düşünür - Yenilikçi mucitler',
                        'ENTJ' => 'Komutan - Cesur, yaratıcı ve güçlü iradeli liderler',
                        'ENTP' => 'Tartışmacı - Akıllı ve meraklı düşünürler',
                        'INFJ' => 'Avukat - Yaratıcı ve içgörülü ilham vericiler',
                        'INFP' => 'Arabulucu - Şiirsel, nazik ve özgecil insanlar',
                        'ENFJ' => 'Başrol - Karizmatik ve ilham verici liderler',
                        'ENFP' => 'Kampanyacı - Coşkulu, yaratıcı ve sosyal özgür ruhlar',
                        'ISTJ' => 'Lojistikçi - Pratik ve gerçekçi, güvenilir çalışanlar',
                        'ISFJ' => 'Koruyucu - Sıcakkanlı ve özverili koruyucular',
                        'ESTJ' => 'Yönetici - Mükemmel yöneticiler, eşsiz yönetim yetenekleri',
                        'ESFJ' => 'Konsolos - Olağanüstü derecede özenli, sosyal ve popüler insanlar',
                        'ISTP' => 'Sanal - Cesur ve pratik deneyimciler',
                        'ISFP' => 'Maceracı - Esnek ve büyüleyici sanatçılar',
                        'ESTP' => 'Girişimci - Akıllı, enerjik ve algısal insanlar',
                        'ESFP' => 'Eğlendirici - Kendiliğinden, enerjik ve coşkulu insanlar'
                    ];
                @endphp
                {{ $typeDescriptions[$mbtiType] ?? 'Kişilik tipiniz belirlendi' }}
            </div>
        </div>

        <!-- Statistics Overview -->
        <div class="test-stats">
            <div class="test-stat-card">
                <div class="test-stat-card__icon">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <div class="test-stat-card__value">{{ array_sum($scores ?? []) }}</div>
                <div class="test-stat-card__label">Toplam Puan</div>
            </div>
            
            <div class="test-stat-card">
                <div class="test-stat-card__icon">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="test-stat-card__value">
                    @php
                        $dominantScore = max($scores ?? []);
                        $dominantType = array_search($dominantScore, $scores ?? []);
                    @endphp
                    {{ $dominantScore }}
                </div>
                <div class="test-stat-card__label">En Güçlü Özellik</div>
            </div>
            
            <div class="test-stat-card">
                <div class="test-stat-card__icon">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="test-stat-card__value">{{ strlen($mbtiType ?? '') }}</div>
                <div class="test-stat-card__label">Boyut Sayısı</div>
            </div>
        </div>

        <!-- Detailed Scores -->
        <div class="test-results__details">
            <h2 class="test-results__section-title">Detaylı Skorlar</h2>
            
            <div class="test-results__scores">
                @php
                    $scoreDetails = [
                        'E' => ['label' => 'Extraversion', 'description' => 'Dışa dönük, sosyal, enerjik', 'icon' => 'e'],
                        'I' => ['label' => 'Introversion', 'description' => 'İçe dönük, düşünceli, sakin', 'icon' => 'i'],
                        'S' => ['label' => 'Sensing', 'description' => 'Somut, pratik, detaycı', 'icon' => 's'],
                        'N' => ['label' => 'Intuition', 'description' => 'Sezgisel, yaratıcı, gelecek odaklı', 'icon' => 'n'],
                        'T' => ['label' => 'Thinking', 'description' => 'Mantıklı, objektif, analitik', 'icon' => 't'],
                        'F' => ['label' => 'Feeling', 'description' => 'Duygusal, empatik, değer odaklı', 'icon' => 'f'],
                        'J' => ['label' => 'Judging', 'description' => 'Planlı, organize, kararlı', 'icon' => 'j'],
                        'P' => ['label' => 'Perceiving', 'description' => 'Esnek, spontan, uyumlu', 'icon' => 'p']
                    ];
                    $maxScore = max($scores ?? [1]);
                @endphp
                
                @foreach($scoreDetails as $key => $detail)
                    @php $score = $scores[$key] ?? 0; @endphp
                    <div class="test-score-card">
                        <div class="test-score-card__header">
                            <div class="test-score-card__label">{{ $detail['label'] }} ({{ $key }})</div>
                            <div class="test-score-card__icon test-score-card__icon--{{ $detail['icon'] }}">{{ $key }}</div>
                        </div>
                        
                        <div class="test-score-card__value">{{ $score }} puan</div>
                        
                        <div class="test-score-progress test-score-progress--{{ $detail['icon'] }}">
                            <div class="test-score-progress__bar" style="--progress-width: {{ $maxScore > 0 ? ($score / $maxScore) * 100 : 0 }}%; width: {{ $maxScore > 0 ? ($score / $maxScore) * 100 : 0 }}%"></div>
                        </div>
                        
                        <div class="test-score-card__description">{{ $detail['description'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Personality Description -->
        @if($mbtiType && $mbtiType !== 'Belirlenemedi')
            <div class="test-results__details">
                <h2 class="test-results__section-title">{{ $mbtiType }} Kişilik Tipi Hakkında</h2>
                <div class="test-results__description">
                    @php
                        $descriptions = [
                            'INTJ' => 'INTJ\'ler doğal stratejistlerdir. Karmaşık sistemleri anlama ve iyileştirme konusunda yeteneklidirler. Bağımsız çalışmayı tercih ederler ve uzun vadeli hedeflere odaklanırlar.',
                            'INTP' => 'INTP\'ler teorik düşünürlerdir. Yeni fikirler geliştirme ve karmaşık problemleri çözme konusunda yeteneklidirler. Esneklik ve özerklik ararlar.',
                            'ENTJ' => 'ENTJ\'ler doğal liderlerdir. Organizasyon ve yönetim konusunda yeteneklidirler. Hedef odaklı çalışır ve ekipleri motive etmede başarılıdırlar.',
                            'ENTP' => 'ENTP\'ler yenilikçi düşünürlerdir. Yaratıcı problem çözme ve beyin fırtınası yapmaktan hoşlanırlar. Çeşitlilik ve değişim ararlar.',
                            'INFJ' => 'INFJ\'ler idealiste ve vizyonerlerdir. İnsanlara yardım etme konusunda tutkulu ve empati yetenekleri yüksektir. Anlamlı işler yapmayı tercih ederler.',
                            'INFP' => 'INFP\'ler değer odaklı bireylerdir. Yaratıcılık ve otantiklik önemlidir. Kişisel gelişim ve anlamlı işler peşinde koşarlar.',
                            'ENFJ' => 'ENFJ\'ler doğal mentorlarıdır. İnsanları geliştirme ve motive etme konusunda yeteneklidirler. Takım çalışması ve işbirliğini tercih ederler.',
                            'ENFP' => 'ENFP\'ler coşkulu ve yaratıcıdırlar. Yeni fikirler ve projeler konusunda heyecan duyarlar. İnsan odaklı çalışma ortamlarını tercih ederler.',
                            'ISTJ' => 'ISTJ\'ler güvenilir ve sistematiktirler. Detaylara dikkat eder ve prosedürleri takip etmeyi tercih ederler. İstikrarlı ve öngörülebilir ortamları severler.',
                            'ISFJ' => 'ISFJ\'ler destekleyici ve özenlidirler. İnsanlara hizmet etme konusunda tutkulu ve pratik yardım sağlamaktan hoşlanırlar.',
                            'ESTJ' => 'ESTJ\'ler organize ve verimlidirler. Yönetim ve koordinasyon konusunda yeteneklidirler. Sonuç odaklı çalışır ve hedeflere ulaşmaya odaklanırlar.',
                            'ESFJ' => 'ESFJ\'ler sosyal ve destekleyicidirler. Takım uyumu ve pozitif çalışma ortamı yaratma konusunda yeteneklidirler.',
                            'ISTP' => 'ISTP\'ler pratik problem çözücülerdir. Teknik konularda yetenekli ve hands-on yaklaşımı tercih ederler. Esneklik ve özerklik ararlar.',
                            'ISFP' => 'ISFP\'ler uyumlu ve yaratıcıdırlar. Kişisel değerlerine uygun işler yapmayı tercih ederler. Sakin ve destekleyici ortamları severler.',
                            'ESTP' => 'ESTP\'ler enerjik ve pratiktirler. Hızlı karar verme ve acil durumlarda çalışma konusunda yeteneklidirler. Dinamik ortamları tercih ederler.',
                            'ESFP' => 'ESFP\'ler coşkulu ve insancıldırlar. Takım çalışması ve pozitif enerji yaratma konusunda yeteneklidirler. İnsan etkileşimi olan işleri tercih ederler.'
                        ];
                    @endphp
                    <p><strong>Genel Özellikler:</strong> {{ $descriptions[$mbtiType] ?? 'Bu kişilik tipi hakkında detaylı bilgi yakında eklenecektir.' }}</p>
                    
                    <p><strong>Kariyer Önerileri:</strong> {{ $mbtiType }} kişilik tipine sahip bireyler genellikle analitik düşünme, problem çözme ve stratejik planlama gerektiren alanlarda başarılı olurlar.</p>
                    
                    <p><strong>Çalışma Tarzı:</strong> Kendi kişilik tipinize uygun çalışma ortamları ve yöntemler seçerek daha verimli ve mutlu olabilirsiniz.</p>
                </div>
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="test-results__actions">
            <a href="{{ url('/') }}" class="test-action-button test-action-button--primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Ana Sayfaya Dön
            </a>
            
            <a href="{{ route('test.start') }}" class="test-action-button test-action-button--secondary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Yeni Test Yap
            </a>
            
            <button onclick="window.print()" class="test-action-button test-action-button--secondary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
                Sonuçları Yazdır
            </button>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate score progress bars
    const progressBars = document.querySelectorAll('.test-score-progress__bar');
    progressBars.forEach((bar, index) => {
        setTimeout(() => {
            bar.style.width = bar.style.getPropertyValue('--progress-width');
        }, 500 + (index * 100));
    });
    
    // Add celebration effect
    setTimeout(() => {
        showToast('Test başarıyla tamamlandı! 🎉', 'success', 4000);
    }, 1000);
    
    // Clear any auto-saved data
    const userName = '{{ $userName ?? "user" }}';
    clearAutoSave(`mbti_test_answers_${userName}`);
    
    // Add smooth reveal animation to result cards
    const cards = document.querySelectorAll('.test-score-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease-out';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 800 + (index * 100));
    });
});
</script>
@endpush