<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBTI Kişilik Analizi Raporu - {{ $mbtiType }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 20px;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 10px;
        }
        
        .report-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .report-subtitle {
            font-size: 14px;
            color: #666;
        }
        
        .mbti-type-section {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .mbti-type {
            font-size: 36px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 10px;
        }
        
        .mbti-description {
            font-size: 16px;
            color: #4a5568;
            font-style: italic;
        }
        
        .scores-section {
            margin-bottom: 25px;
        }
        
        .scores-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }
        
        .score-row {
            display: table-row;
        }
        
        .score-cell {
            display: table-cell;
            width: 25%;
            padding: 10px;
            border: 1px solid #e2e8f0;
            text-align: center;
            vertical-align: middle;
        }
        
        .score-label {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .score-value {
            font-size: 18px;
            color: #2563eb;
            font-weight: bold;
        }
        
        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }
        
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 5px;
        }
        
        .section-content {
            text-align: justify;
            line-height: 1.7;
        }
        
        .section-content h3 {
            font-size: 14px;
            font-weight: bold;
            color: #374151;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        
        .section-content ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        
        .section-content li {
            margin-bottom: 8px;
        }
        
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
        
        .page-break {
            page-break-before: always;
        }
        
        @media print {
            body {
                margin: 0;
                padding: 15px;
            }
            
            .header {
                margin-bottom: 20px;
            }
            
            .section {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">MindMetrics</div>
        <div class="report-title">MBTI Kişilik Analizi Raporu</div>
        <div class="report-subtitle">Profesyonel Kişilik Değerlendirmesi</div>
    </div>

    <div class="mbti-type-section">
        <div class="mbti-type">{{ $mbtiType ?? 'Belirlenemedi' }}</div>
        <div class="mbti-description">
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

    <div class="section scores-section">
        <div class="section-title">Detaylı Skorlar</div>
        <div class="scores-grid">
            <div class="score-row">
                <div class="score-cell">
                    <div class="score-label">Extraversion (E)</div>
                    <div class="score-value">{{ $testResult->e_score ?? 0 }}</div>
                </div>
                <div class="score-cell">
                    <div class="score-label">Introversion (I)</div>
                    <div class="score-value">{{ $testResult->i_score ?? 0 }}</div>
                </div>
                <div class="score-cell">
                    <div class="score-label">Sensing (S)</div>
                    <div class="score-value">{{ $testResult->s_score ?? 0 }}</div>
                </div>
                <div class="score-cell">
                    <div class="score-label">Intuition (N)</div>
                    <div class="score-value">{{ $testResult->n_score ?? 0 }}</div>
                </div>
            </div>
            <div class="score-row">
                <div class="score-cell">
                    <div class="score-label">Thinking (T)</div>
                    <div class="score-value">{{ $testResult->t_score ?? 0 }}</div>
                </div>
                <div class="score-cell">
                    <div class="score-label">Feeling (F)</div>
                    <div class="score-value">{{ $testResult->f_score ?? 0 }}</div>
                </div>
                <div class="score-cell">
                    <div class="score-label">Judging (J)</div>
                    <div class="score-value">{{ $testResult->j_score ?? 0 }}</div>
                </div>
                <div class="score-cell">
                    <div class="score-label">Perceiving (P)</div>
                    <div class="score-value">{{ $testResult->p_score ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>

    @if($mbtiTypeDetail)
        <!-- İşveren için Profil Özeti -->
        @if($mbtiTypeDetail->profile_summary_for_employer)
            <div class="section">
                <div class="section-title">İşveren için Profil Özeti</div>
                <div class="section-content">
                    <p>{{ $mbtiTypeDetail->profile_summary_for_employer }}</p>
                </div>
            </div>
        @endif

        <!-- İş Yerindeki Temel Güçlü Yönler -->
        @if($mbtiTypeDetail->key_strengths_in_workplace && count($mbtiTypeDetail->key_strengths_in_workplace) > 0)
            <div class="section">
                <div class="section-title">İş Yerindeki Temel Güçlü Yönler</div>
                <div class="section-content">
                    <ul>
                        @foreach($mbtiTypeDetail->key_strengths_in_workplace as $strength)
                            <li>{{ $strength }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Potansiyel Gelişim Alanları -->
        @if($mbtiTypeDetail->potential_development_areas_for_workplace_effectiveness && count($mbtiTypeDetail->potential_development_areas_for_workplace_effectiveness) > 0)
            <div class="section">
                <div class="section-title">Potansiyel Gelişim Alanları</div>
                <div class="section-content">
                    <ul>
                        @foreach($mbtiTypeDetail->potential_development_areas_for_workplace_effectiveness as $area)
                            <li>{{ $area }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- İletişim Tarzı ve İşveren İçin İpuçları -->
        @if($mbtiTypeDetail->communication_style_and_tips_for_employer)
            <div class="section page-break">
                <div class="section-title">İletişim Tarzı ve İşveren İçin İpuçları</div>
                <div class="section-content">
                    <p>{{ $mbtiTypeDetail->communication_style_and_tips_for_employer }}</p>
                </div>
            </div>
        @endif

        <!-- Görev Yönetimi Yaklaşımı ve İşveren İçin İpuçları -->
        @if($mbtiTypeDetail->task_management_approach_and_tips_for_employer)
            <div class="section">
                <div class="section-title">Görev Yönetimi Yaklaşımı ve İşveren İçin İpuçları</div>
                <div class="section-content">
                    <p>{{ $mbtiTypeDetail->task_management_approach_and_tips_for_employer }}</p>
                </div>
            </div>
        @endif

        <!-- Motivasyon Faktörleri ve İşveren İçin Öneriler -->
        @if($mbtiTypeDetail->motivators_for_employer_to_leverage && count($mbtiTypeDetail->motivators_for_employer_to_leverage) > 0)
            <div class="section">
                <div class="section-title">Motivasyon Faktörleri ve İşveren İçin Öneriler</div>
                <div class="section-content">
                    <ul>
                        @foreach($mbtiTypeDetail->motivators_for_employer_to_leverage as $motivator)
                            <li>{{ $motivator }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Geri Bildirim Alıcılığı ve İşveren Rehberliği -->
        @if($mbtiTypeDetail->feedback_receptivity_and_guidance_for_employer)
            <div class="section">
                <div class="section-title">Geri Bildirim Alıcılığı ve İşveren Rehberliği</div>
                <div class="section-content">
                    <p>{{ $mbtiTypeDetail->feedback_receptivity_and_guidance_for_employer }}</p>
                </div>
            </div>
        @endif

        <!-- Takım İşbirliği Tarzı -->
        @if($mbtiTypeDetail->team_collaboration_style_for_employer)
            <div class="section">
                <div class="section-title">Takım İşbirliği Tarzı</div>
                <div class="section-content">
                    <p>{{ $mbtiTypeDetail->team_collaboration_style_for_employer }}</p>
                </div>
            </div>
        @endif

        <!-- Liderlik Potansiyeli ve Tarz Notları -->
        @if($mbtiTypeDetail->leadership_potential_or_style_notes_for_employer)
            <div class="section">
                <div class="section-title">Liderlik Potansiyeli ve Tarz Notları</div>
                <div class="section-content">
                    <p>{{ $mbtiTypeDetail->leadership_potential_or_style_notes_for_employer }}</p>
                </div>
            </div>
        @endif

        <!-- Çalışma Ortamı Tercihleri -->
        @if($mbtiTypeDetail->work_environment_preferences_for_employer)
            <div class="section">
                <div class="section-title">Çalışma Ortamı Tercihleri</div>
                <div class="section-content">
                    <p>{{ $mbtiTypeDetail->work_environment_preferences_for_employer }}</p>
                </div>
            </div>
        @endif
    @else
        <div class="section">
            <div class="section-title">Rapor Bilgisi</div>
            <div class="section-content">
                <p>Bu kişilik tipi için detaylı rapor bilgisi henüz eklenmemiştir.</p>
            </div>
        </div>
    @endif

    <div class="footer">
        <p>Bu rapor MindMetrics MBTI Kişilik Analizi sistemi tarafından oluşturulmuştur.</p>
        <p>Rapor Tarihi: {{ now()->format('d.m.Y H:i') }}</p>
        <p>© {{ date('Y') }} MindMetrics. Tüm hakları saklıdır.</p>
    </div>
</body>
</html>