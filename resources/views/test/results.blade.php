@extends('layouts.test-layout')

@section('title', 'Test Sonucunuz')

@section('page-title')
    Tebrikler! <span class="emoji-fix">🎉</span>
@endsection

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
                    @php
                        $score = $scores[$key] ?? 0;
                        $progressPercentage = $maxScore > 0 ? ($score / $maxScore) * 100 : 0;
                        $circumference = 2 * 3.14159 * 36; // radius = 36
                        $strokeDasharray = ($progressPercentage / 100) * $circumference;
                    @endphp
                    <div class="test-score-card">
                        <div class="test-score-card__header">
                            <div class="test-score-card__label">{{ strtoupper($detail['label']) }} ({{ $key }})</div>
                        </div>
                        
                        <div class="test-score-card__icon-container">
                            <svg class="test-score-card__progress-ring" viewBox="0 0 80 80">
                                <circle class="test-score-card__progress-circle test-score-card__progress-bg"
                                        cx="40" cy="40" r="36"></circle>
                                <circle class="test-score-card__progress-circle test-score-card__progress-fill test-score-progress--{{ $detail['icon'] }}"
                                        cx="40" cy="40" r="36"
                                        style="stroke-dasharray: {{ $strokeDasharray }} {{ $circumference }}"></circle>
                            </svg>
                            <div class="test-score-card__icon test-score-card__icon--{{ $detail['icon'] }}">{{ $key }}</div>
                        </div>
                        
                        <div class="test-score-card__value">{{ $score }} puan</div>
                        
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
                    @if($mbtiTypeDetail)
                        <!-- İşveren için Profil Özeti -->
                        @if($mbtiTypeDetail->profile_summary_for_employer)
                            <h3><strong>İşveren için Profil Özeti</strong></h3>
                            <p>{{ $mbtiTypeDetail->profile_summary_for_employer }}</p>
                        @endif

                        <!-- İş Yerindeki Temel Güçlü Yönler -->
                        @if($mbtiTypeDetail->key_strengths_in_workplace && count($mbtiTypeDetail->key_strengths_in_workplace) > 0)
                            <h3><strong>İş Yerindeki Temel Güçlü Yönler</strong></h3>
                            <ul>
                                @foreach($mbtiTypeDetail->key_strengths_in_workplace as $strength)
                                    <li>✅ {{ $strength }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <!-- Potansiyel Gelişim Alanları -->
                        @if($mbtiTypeDetail->potential_development_areas_for_workplace_effectiveness && count($mbtiTypeDetail->potential_development_areas_for_workplace_effectiveness) > 0)
                            <h3><strong>Potansiyel Gelişim Alanları</strong></h3>
                            <ul>
                                @foreach($mbtiTypeDetail->potential_development_areas_for_workplace_effectiveness as $area)
                                    <li>🔄 {{ $area }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <!-- İletişim Tarzı ve İşveren İçin İpuçları -->
                        @if($mbtiTypeDetail->communication_style_and_tips_for_employer)
                            <h3><strong>İletişim Tarzı ve İşveren İçin İpuçları</strong></h3>
                            <p>{{ $mbtiTypeDetail->communication_style_and_tips_for_employer }}</p>
                        @endif

                        <!-- Görev Yönetimi Yaklaşımı ve İşveren İçin İpuçları -->
                        @if($mbtiTypeDetail->task_management_approach_and_tips_for_employer)
                            <h3><strong>Görev Yönetimi Yaklaşımı ve İşveren İçin İpuçları</strong></h3>
                            <p>{{ $mbtiTypeDetail->task_management_approach_and_tips_for_employer }}</p>
                        @endif

                        <!-- Motivasyon Faktörleri ve İşveren İçin Öneriler -->
                        @if($mbtiTypeDetail->motivators_for_employer_to_leverage && count($mbtiTypeDetail->motivators_for_employer_to_leverage) > 0)
                            <h3><strong>Motivasyon Faktörleri ve İşveren İçin Öneriler</strong></h3>
                            <ul>
                                @foreach($mbtiTypeDetail->motivators_for_employer_to_leverage as $motivator)
                                    <li>🎯 {{ $motivator }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <!-- Geri Bildirim Alıcılığı ve İşveren Rehberliği -->
                        @if($mbtiTypeDetail->feedback_receptivity_and_guidance_for_employer)
                            <h3><strong>Geri Bildirim Alıcılığı ve İşveren Rehberliği</strong></h3>
                            <p>{{ $mbtiTypeDetail->feedback_receptivity_and_guidance_for_employer }}</p>
                        @endif

                        <!-- Takım İşbirliği Tarzı -->
                        @if($mbtiTypeDetail->team_collaboration_style_for_employer)
                            <h3><strong>Takım İşbirliği Tarzı</strong></h3>
                            <p>{{ $mbtiTypeDetail->team_collaboration_style_for_employer }}</p>
                        @endif

                        <!-- Liderlik Potansiyeli ve Tarz Notları -->
                        @if($mbtiTypeDetail->leadership_potential_or_style_notes_for_employer)
                            <h3><strong>Liderlik Potansiyeli ve Tarz Notları</strong></h3>
                            <p>{{ $mbtiTypeDetail->leadership_potential_or_style_notes_for_employer }}</p>
                        @endif

                        <!-- Çalışma Ortamı Tercihleri -->
                        @if($mbtiTypeDetail->work_environment_preferences_for_employer)
                            <h3><strong>Çalışma Ortamı Tercihleri</strong></h3>
                            <p>{{ $mbtiTypeDetail->work_environment_preferences_for_employer }}</p>
                        @endif
                    @else
                        <p>Bu kişilik tipi için detaylı rapor bilgisi henüz eklenmemiştir.</p>
                    @endif
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
            
            <a href="{{ route('dashboard') }}" class="test-action-button test-action-button--secondary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 9h6v6H9z"></path>
                </svg>
                Dashboard'a Git
            </a>
            
            <a href="{{ route('test.downloadReport', ['testResult' => $testResult->id]) }}" class="test-action-button test-action-button--secondary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                PDF İndir
            </a>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate circular progress rings
    const progressRings = document.querySelectorAll('.test-score-card__progress-fill');
    progressRings.forEach((ring, index) => {
        const currentStrokeDasharray = ring.style.strokeDasharray;
        ring.style.strokeDasharray = '0 251.2'; // Start with 0 progress
        
        setTimeout(() => {
            ring.style.strokeDasharray = currentStrokeDasharray;
        }, 800 + (index * 150));
    });
    
    // Add celebration effect
    setTimeout(() => {
        if (typeof showToast === 'function') {
            showToast('Test başarıyla tamamlandı! 🎉', 'success', 4000);
        }
    }, 1000);
    
    // Clear any auto-saved data
    const userName = '{{ $userName ?? "user" }}';
    if (typeof clearAutoSave === 'function') {
        clearAutoSave(`mbti_test_answers_${userName}`);
    }
    
    // Add smooth reveal animation to result cards
    const cards = document.querySelectorAll('.test-score-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px) scale(0.95)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0) scale(1)';
        }, 600 + (index * 150));
    });
    
    // Add hover effects for icons
    const iconContainers = document.querySelectorAll('.test-score-card__icon-container');
    iconContainers.forEach(container => {
        container.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.test-score-card__icon');
            if (icon) {
                icon.style.transform = 'translate(-50%, -50%) scale(1.1)';
            }
        });
        
        container.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.test-score-card__icon');
            if (icon) {
                icon.style.transform = 'translate(-50%, -50%) scale(1)';
            }
        });
    });
});
</script>
@endpush