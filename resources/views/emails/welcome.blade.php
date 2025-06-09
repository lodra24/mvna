<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindMetrics'e Hoş Geldiniz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #4f46e5;
            margin-bottom: 10px;
        }
        .welcome-text {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 30px;
        }
        .button {
            display: inline-block;
            background-color: #4f46e5;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #3730a3;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">MindMetrics</div>
            <h1>Hoş Geldiniz!</h1>
        </div>
        
        <div class="content">
            <p class="welcome-text">Merhaba {{ $user->name }},</p>
            
            <p>MindMetrics topluluğuna katıldığınız için teşekkür ederiz! Kişilik analizleri ve zihinsel sağlık değerlendirmeleri konusunda size yardımcı olmaktan mutluluk duyacağız.</p>
            
            <p>Hesabınız başarıyla oluşturuldu ve artık platformumuzun tüm özelliklerinden yararlanabilirsiniz:</p>
            
            <ul>
                <li>MBTI kişilik testleri</li>
                <li>Detaylı kişilik analizi raporları</li>
                <li>Kişisel gelişim önerileri</li>
                <li>İlerleme takibi</li>
            </ul>
            
            <p>Hemen başlamak için kontrol panelinize gidin:</p>
            
            <div style="text-align: center;">
                <a href="{{ route('dashboard') }}" class="button">Kontrol Panelinize Gidin</a>
            </div>
            
            <p>Herhangi bir sorunuz olursa, bizimle iletişime geçmekten çekinmeyin.</p>
        </div>
        
        <div class="footer">
            <p>İyi günler,<br>MindMetrics Ekibi</p>
            <p><small>Bu e-posta otomatik olarak gönderilmiştir.</small></p>
        </div>
    </div>
</body>
</html>