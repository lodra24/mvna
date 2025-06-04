<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Sonucunuz - MindMetrics</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        h2 {
            color: #555;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        .mbti-result {
            background-color: #e8f4fd;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
        }
        .mbti-type {
            font-size: 2em;
            font-weight: bold;
            color: #2c5aa0;
            margin-bottom: 10px;
        }
        .scores-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            margin: 20px 0;
        }
        .score-item {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #007bff;
        }
        .score-label {
            font-weight: bold;
            color: #333;
        }
        .score-value {
            font-size: 1.2em;
            color: #007bff;
        }
        .navigation {
            text-align: center;
            margin-top: 30px;
        }
        .nav-link {
            display: inline-block;
            padding: 12px 24px;
            margin: 0 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .nav-link:hover {
            background-color: #0056b3;
        }
        .nav-link.secondary {
            background-color: #6c757d;
        }
        .nav-link.secondary:hover {
            background-color: #545b62;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Test Sonucunuz</h1>
        
        <div class="mbti-result">
            <div class="mbti-type">{{ $mbtiType ?? 'Belirlenemedi' }}</div>
            <p>Kişilik tipiniz yukarıda gösterilmektedir.</p>
        </div>

        <h2>Detaylı Skorlar</h2>
        <div class="scores-list">
            <div class="score-item">
                <div class="score-label">Extraversion (E)</div>
                <div class="score-value">{{ $scores['E'] ?? 0 }} puan</div>
            </div>
            <div class="score-item">
                <div class="score-label">Introversion (I)</div>
                <div class="score-value">{{ $scores['I'] ?? 0 }} puan</div>
            </div>
            <div class="score-item">
                <div class="score-label">Sensing (S)</div>
                <div class="score-value">{{ $scores['S'] ?? 0 }} puan</div>
            </div>
            <div class="score-item">
                <div class="score-label">Intuition (N)</div>
                <div class="score-value">{{ $scores['N'] ?? 0 }} puan</div>
            </div>
            <div class="score-item">
                <div class="score-label">Thinking (T)</div>
                <div class="score-value">{{ $scores['T'] ?? 0 }} puan</div>
            </div>
            <div class="score-item">
                <div class="score-label">Feeling (F)</div>
                <div class="score-value">{{ $scores['F'] ?? 0 }} puan</div>
            </div>
            <div class="score-item">
                <div class="score-label">Judging (J)</div>
                <div class="score-value">{{ $scores['J'] ?? 0 }} puan</div>
            </div>
            <div class="score-item">
                <div class="score-label">Perceiving (P)</div>
                <div class="score-value">{{ $scores['P'] ?? 0 }} puan</div>
            </div>
        </div>

        <div class="navigation">
            <a href="{{ url('/') }}" class="nav-link">Ana Sayfaya Dön</a>
            <a href="{{ route('test.start') }}" class="nav-link secondary">Yeni Teste Başla</a>
        </div>
    </div>
</body>
</html>