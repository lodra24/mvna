<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MBTI Personality Report - {{ $testResult->mbti_type ?? 'Unknown' }}</title>
    <style>
        /* Font Tanimlamalari */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            src: url('{{ storage_path('fonts/Inter-Regular.ttf') }}') format('truetype');
        }
        @font-face {
            font-family: 'Inter';
            font-style: bold;
            font-weight: 700;
            src: url('{{ storage_path('fonts/Inter-Bold.ttf') }}') format('truetype');
        }
        
        /* Sayfa Yapisi */
        @page {
            margin: 25mm 15mm 25mm 15mm;
        }
        body {
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            line-height: 1.6;
            color: #333;
        }

        /* Header ve Footer */
        .header, .footer {
            position: fixed;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #888;
        }
        .header {
            top: -20mm;
            height: 15mm;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        .footer {
            bottom: -20mm;
            height: 15mm;
            border-top: 1px solid #ddd;
            padding-top: 5px;
        }
        .footer .page-number:after {
            content: counter(page);
        }

        /* Tipografi */
        h1 { font-size: 24px; color: #2c5282; border-bottom: 2px solid #a3bfd9; padding-bottom: 8px; margin-bottom: 20px; font-weight: 700; }
        h2 { font-size: 18px; color: #2d3748; margin-top: 25px; margin-bottom: 15px; font-weight: 700; }
        h3 { font-size: 16px; color: #4a5568; margin-top: 20px; margin-bottom: 10px; font-weight: 700; }
        p { margin-bottom: 1em; }
        strong { font-weight: 700; }
        ul { padding-left: 20px; list-style-type: disc; }
        li { margin-bottom: 8px; }

        /* Ana Icerik Kartlari */
        .card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fdfdfd;
        }
        
        /* Sayfa Sonu Kontrolleri */
        .card, section, table, ul {
            page-break-inside: avoid;
        }
        h1, h2, h3 {
            page-break-after: avoid;
        }
        .page-break {
            page-break-after: always;
        }

        /* Kapak Sayfasi */
        .cover-page { text-align: center; padding: 40px 0; background-color: #f7fafc; border-radius: 10px; margin: 15mm 0 20px 0; }
        .cover-brand { font-size: 42px; font-weight: 700; color: #4c51bf; margin-bottom: 20px; letter-spacing: 2px; }
        .cover-title { font-size: 28px; font-weight: 700; color: #2d3748; margin-bottom: 30px; }
        .cover-user-info { background-color: #ffffff; border: 2px solid #e2e8f0; border-radius: 12px; padding: 30px; margin: 20px auto; max-width: 400px; }
        .cover-user-name { font-size: 22px; font-weight: 700; color: #2d3748; margin-bottom: 15px; }
        .cover-mbti-type { font-size: 48px; font-weight: 700; color: #4c51bf; margin: 15px 0; letter-spacing: 4px; }
        .cover-type-name { font-size: 20px; font-weight: 700; color: #4a5568; font-style: italic; margin-bottom: 20px; }
        .cover-date { font-size: 14px; color: #718096; margin-top: 30px; }

        /* Tercih Spektrumlari Tablosu */
        .preference-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .preference-table td { padding: 8px; vertical-align: middle; }
        .label-cell { font-weight: 700; color: #2d3748; }
        .bar-cell { padding: 0 10px; }
        .spectrum-bar-container { height: 12px; background-color: #e2e8f0; border-radius: 6px; width: 100%; overflow: hidden; }
        .spectrum-bar-fill { height: 100%; border-radius: 6px; }
        .description-cell { text-align: center; font-weight: 700; color: #4c51bf; padding-top: 5px; padding-bottom: 15px; font-size: 13px; }

        /* Ozel Listeler */
        .styled-list { list-style: none; padding: 0; }
        .styled-list li {
            background-color: #f8f9fa;
            border-left: 4px solid;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 0 4px 4px 0;
        }
        .strength-item { border-color: #38a169; }
        .development-item { border-color: #ed8936; }
        .career-item { border-color: #3182ce; }
        .famous-item { border-color: #d53f8c; text-align: center; }

        /* Bilişsel Fonksiyonlar Listesi */
        .cognitive-function-item {
            border-color: #2c5282;
        }
        .function-position { font-weight: 700; color: #2c5282; margin-bottom: 4px; }
        .function-name { font-weight: 700; margin-bottom: 4px; }
        .function-description { font-size: 12px; color: #4a5568; }

        .closing-message { background-color: #2c5282; color: white; padding: 22px; border-radius: 8px; text-align: center; margin-top: 25px; }
        .closing-message h2 { color: white; }

    </style>
</head>
<body>
    <div class="header">
        CognifyWork - MBTI Personality Report
    </div>
    <div class="footer">
        <div class="page-number"></div>
    </div>

    <main>
        <!-- SAYFA 1: KAPAK -->
        <div class="cover-page">
            <div class="cover-brand">CognifyWork</div>
            <div class="cover-title">MBTI Personality Report</div>
            <div class="cover-user-info">
                <div class="cover-user-name">{{ $testResult->user->name ?? 'Guest User' }}</div>
                <div class="cover-mbti-type">{{ $testResult->mbti_type ?? 'XXXX' }}</div>
                <div class="cover-type-name">{{ $mbtiTypeDetail->type_name ?? 'Personality Type' }}</div>
            </div>
            <div class="cover-date">
                Report Date: {{ now()->format('d F Y') }}
            </div>
        </div>

        <div class="page-break"></div>

        <!-- SAYFA 2: GİRİŞ VE TERCİHLER -->
        <section>
            <h1>1. Introduction to Your Report</h1>
            <div class="card">
                <p>Welcome, <strong>{{ $testResult->user->name ?? 'Guest User' }}</strong>! This comprehensive MBTI Personality Report has been specifically designed to help you understand your unique personality preferences and how they translate into your professional life.</p>
                <p>Through careful analysis of your responses, we've identified your personality type as <strong>{{ $testResult->mbti_type ?? 'Unknown' }}</strong> - <em>{{ $mbtiTypeDetail->type_name ?? 'Personality Type' }}</em>. This report will guide you through understanding your natural preferences, strengths, and potential career paths that align with your authentic self.</p>
                <p>The insights contained within this report are based on the Myers-Briggs Type Indicator framework, one of the most trusted and widely-used personality assessment tools in professional development. Use this information as a compass to navigate your career journey with greater self-awareness and confidence.</p>
            </div>
        </section>

        <section>
            <h1>2. Understanding Your Preferences</h1>
            <p>Your personality type is composed of four key dimensions. Each dimension represents a spectrum between two preferences. Below, you can see where your natural tendencies lie on each spectrum:</p>
            @php
                function getPreferenceDescription($dominantLetter, $percentage) {
                    $preferenceName = '';
                    switch ($dominantLetter) {
                        case 'E': $preferenceName = 'Extraversion'; break; case 'I': $preferenceName = 'Introversion'; break;
                        case 'S': $preferenceName = 'Sensing'; break; case 'N': $preferenceName = 'Intuition'; break;
                        case 'T': $preferenceName = 'Thinking'; break; case 'F': $preferenceName = 'Feeling'; break;
                        case 'J': $preferenceName = 'Judging'; break; case 'P': $preferenceName = 'Perceiving'; break;
                    }
                    if ($percentage > 70) { return "Strong preference for {$preferenceName} ({$percentage}%)"; }
                    if ($percentage > 60) { return "Moderate preference for {$preferenceName} ({$percentage}%)"; }
                    return "Slight preference for {$preferenceName} ({$percentage}%)";
                }
            @endphp
            <table class="preference-table">
                <tbody>
                    @foreach (['ei' => ['E', 'I'], 'sn' => ['S', 'N'], 'tf' => ['T', 'F'], 'jp' => ['J', 'P']] as $dim => $letters)
                        @php $pref = $preferencesData[$dim]; @endphp
                        <tr>
                            <td class="label-cell" style="width: 40%; text-align: left;">{{ $letters[0] }} [{{ $pref['score1'] }}]</td>
                            <td class="bar-cell" style="width: 20%;">
                                <div class="spectrum-bar-container">
                                    <div class="spectrum-bar-fill" style="width: {{ $pref['percentage'] }}%; float: {{ $pref['dominant_letter'] === $letters[0] ? 'left' : 'right' }}; background-color: {{ ['#6366F1','#10B981','#F59E0B','#8B5CF6'][array_search($dim, array_keys($preferencesData))] }};"></div>
                                </div>
                            </td>
                            <td class="label-cell" style="width: 40%; text-align: right;">[{{ $pref['score2'] }}] {{ $letters[1] }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="description-cell">{{ getPreferenceDescription($pref['dominant_letter'], $pref['percentage']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <div class="page-break"></div>

        <!-- SAYFA 3: İŞ YERİ PROFİLİ -->
        <section>
            <h1>3. In-Depth Profile for Workplace</h1>
            <div class="card">
                <h2>Profile Summary</h2>
                <p>{{ $mbtiTypeDetail->profile_summary_for_employer ?? 'No data available.' }}</p>
            </div>
            <div class="card">
                <h2>Key Strengths in Workplace</h2>
                @if($mbtiTypeDetail && !empty($mbtiTypeDetail->key_strengths_in_workplace))
                    <ul class="styled-list">
                        @foreach($mbtiTypeDetail->key_strengths_in_workplace as $strength)
                            <li class="strength-item">{{ $strength }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No data available.</p>
                @endif
            </div>
            <div class="card">
                <h2>Potential Development Areas for Workplace Effectiveness</h2>
                @if($mbtiTypeDetail && !empty($mbtiTypeDetail->potential_development_areas_for_workplace_effectiveness))
                    <ul class="styled-list">
                        @foreach($mbtiTypeDetail->potential_development_areas_for_workplace_effectiveness as $area)
                            <li class="development-item">{{ $area }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No data available.</p>
                @endif
            </div>
        </section>

        

        <!-- SAYFA 4: İLETİŞİM VE İŞBİRLİĞİ -->
        <section>
            <h1>4. Communication & Collaboration Style</h1>
            <div class="card">
                <h2>Communication Style and Tips for Employer</h2>
                <p>{{ $mbtiTypeDetail->communication_style_and_tips_for_employer ?? 'No data available.' }}</p>
            </div>
            <div class="card">
                <h2>Team Collaboration Style for Employer</h2>
                <p>{{ $mbtiTypeDetail->team_collaboration_style_for_employer ?? 'No data available.' }}</p>
            </div>
        </section>
        
        

        <!-- SAYFA 5: YÖNETİM VE BÜYÜME -->
        <section>
            <h1>5. Management & Growth Insights</h1>
             <div class="card">
                <h2>Task Management Approach and Tips for Employer</h2>
                <p>{{ $mbtiTypeDetail->task_management_approach_and_tips_for_employer ?? 'No data available.' }}</p>
            </div>
             <div class="card">
                <h2>Feedback Receptivity and Guidance for Employer</h2>
                <p>{{ $mbtiTypeDetail->feedback_receptivity_and_guidance_for_employer ?? 'No data available.' }}</p>
            </div>
            <div class="card">
                <h2>Leadership Potential or Style Notes for Employer</h2>
                <p>{{ $mbtiTypeDetail->leadership_potential_or_style_notes_for_employer ?? 'No data available.' }}</p>
            </div>
        </section>

        <div class="page-break"></div>
        
        <!-- SAYFA 6: GELİŞMİŞ İÇGÖRÜLER -->
        <section>
            <h1>6. Advanced Insights: Beyond the Four Letters</h1>
            <div class="card">
                <h2>Cognitive Functions</h2>
                <p>Your personality type is driven by a specific hierarchy of cognitive functions - mental processes that determine how you perceive and judge information. Understanding these functions provides deeper insight into your natural thinking patterns:</p>
                 @if($mbtiTypeDetail && !empty($mbtiTypeDetail->cognitive_functions))
                    <ul class="styled-list">
                        @foreach($mbtiTypeDetail->cognitive_functions as $function)
                            @php
                                // Gelen verinin hem string hem de array olabilme ihtimaline karşı kontrol
                                $function_parts = is_array($function) ? $function : explode(':', $function, 2);
                                $position = trim($function_parts[0]);
                                $name = trim($function_parts[1] ?? '');
                            @endphp
                            <li class="cognitive-function-item">
                                <div class="function-position">{{ $position }}:</div>
                                <div class="function-name">{{ $name }}</div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No data available.</p>
                @endif
            </div>
             <div class="card">
                <h2>How to Handle Stress</h2>
                <p>{{ $mbtiTypeDetail->how_to_handle_stress ?? 'No data available.' }}</p>
            </div>
        </section>
        
        <div class="page-break"></div>

        <!-- SAYFA 7: KARİYER -->
        <section>
            <h1>7. Career & Development Pathways</h1>
            <div class="card">
                <h2>Career Suggestions</h2>
                 @if($mbtiTypeDetail && !empty($mbtiTypeDetail->career_suggestions))
                    <ul class="styled-list">
                        @foreach($mbtiTypeDetail->career_suggestions as $career)
                            <li class="career-item">{{ $career }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No data available.</p>
                @endif
            </div>
            <div class="card">
                <h2>Famous Examples</h2>
                 @if($mbtiTypeDetail && !empty($mbtiTypeDetail->famous_examples))
                    <ul class="styled-list">
                        @foreach($mbtiTypeDetail->famous_examples as $example)
                            <li class="famous-item">{{ $example }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No data available.</p>
                @endif
            </div>
        </section>
                      <!-- SAYFA 8: SONUÇ VE SONRAKİ ADIMLAR -->
        <section>
            <h2>8. Conclusion & Next Steps</h2>
            <div class="card">
                <h2>Your Journey Forward</h2>
                <p>Congratulations, <strong>{{ $testResult->user->name ?? 'Guest User' }}</strong>! You've completed a comprehensive exploration of your <strong>{{ $testResult->mbti_type ?? 'Unknown' }}</strong> personality type. This report represents more than just a collection of insights—it's a roadmap for your personal and professional development.</p>
                
                <h3>Actionable Next Steps:</h3>
                <ul>
                    <li>Leverage your identified strengths in daily work situations and project assignments</li>
                    <li>Be mindful of your development areas and create a focused improvement plan</li>
                    <li>Use your communication style insights to build stronger relationships with colleagues</li>
                    <li>Consider the suggested career paths when making future professional decisions</li>
                    <li>Apply your stress management strategies during challenging periods</li>
                    <li>Share relevant insights with your manager or team to improve collaboration</li>
                </ul>

                <p>Remember, personality type is not a limitation—it's a foundation for growth. Use these insights as a starting point for continuous learning and development throughout your career journey.</p>
            </div>
        </section>
        <!-- SONUÇ -->
        <div class="closing-message">
            <h2>Thank You for Choosing CognifyWork</h2>
            <p>We're honored to be part of your self-discovery journey. Your personality is unique, valuable, and full of potential. Take these insights forward with confidence, knowing that understanding yourself better is the first step toward achieving your professional goals and finding fulfillment in your career path.</p>
        </div>
    </main>
</body>
</html>