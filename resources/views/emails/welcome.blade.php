<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CognifyWork</title>
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
            <div class="logo">CognifyWork</div>
            <h1>Welcome!</h1>
        </div>
        
        <div class="content">
            <p class="welcome-text">Hello {{ $user->name }},</p>
            
            <p>Thank you for joining the CognifyWork community! We're excited to help you with personality analysis and mental health assessments.</p>
            
            <p>Your account has been successfully created and you can now take advantage of all the features of our platform:</p>
            
            <ul>
                <li>MBTI personality tests</li>
                <li>Detailed personality analysis reports</li>
                <li>Personal development recommendations</li>
                <li>Progress tracking</li>
            </ul>
            
            <p>To get started right away, go to your dashboard:</p>
            
            <div style="text-align: center;">
                <a href="{{ route('dashboard') }}" class="button">Go to Your Dashboard</a>
            </div>
            
            <p>If you have any questions, please don't hesitate to contact us.</p>
        </div>
        
        <div class="footer">
            <p>Best regards,<br>CognifyWork Team</p>
            <p><small>This email was sent automatically.</small></p>
        </div>
    </div>
</body>
</html>