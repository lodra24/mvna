<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Payment Was Successful - CognifyWork</title>
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
        .success-icon {
            font-size: 48px;
            color: #10b981;
            margin-bottom: 20px;
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
            margin: 10px 5px;
            text-align: center;
            min-width: 180px;
        }
        .button:hover {
            background-color: #3730a3;
        }
        .button.secondary {
            background-color: #10b981;
        }
        .button.secondary:hover {
            background-color: #059669;
        }
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }
        .highlight-box {
            background-color: #f0f9ff;
            border-left: 4px solid #4f46e5;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 5px 5px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">CognifyWork</div>
            <div class="success-icon">✅</div>
            <h1>Your Payment Was Successful!</h1>
        </div>
        
        <div class="content">
            <p class="welcome-text">Hello {{ $testResult->user->name }},</p>
            
            <p>Your payment for the CognifyWork report has been successfully processed. Thank you!</p>
            
            <div class="highlight-box">
                <p><strong>Your report is ready!</strong> You can immediately access your personality analysis report using the buttons below.</p>
            </div>
            
            <p>In your report, you will find:</p>
            
            <ul>
                <li>Detailed MBTI personality analysis</li>
                <li>Your strengths and development areas</li>
                <li>Career recommendations</li>
                <li>Your relationship and communication style</li>
                <li>Personal development suggestions</li>
            </ul>
            
            <div class="button-container">
                <a href="{{ route('test.showResult', ['testResult' => $testResult->id]) }}" class="button">
                    📊 View Report
                </a>
                <br>
                <a href="{{ route('test.downloadReport', ['testResult' => $testResult->id]) }}" class="button secondary">
                    📄 Download PDF
                </a>
            </div>
            
            <p>If you have any questions after reviewing your report, please don't hesitate to contact us.</p>
            
            <p>Thank you for choosing CognifyWork!</p>
        </div>
        
        <div class="footer">
            <p>Best regards,<br>CognifyWork Team</p>
            <p><small>This email was sent automatically.</small></p>
        </div>
    </div>
</body>
</html>