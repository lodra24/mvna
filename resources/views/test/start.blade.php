<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Başla - MindMetrics</title>
    {{-- Şimdilik CSS eklemeyin --}}
</head>
<body>
    <h1>MBTI Vocational NexusPoint Analysis</h1>
    <p>Lütfen adınızı girin:</p>
    <form action="{{ route('test.begin') }}" method="POST">
    @csrf
    <div>
        <label for="name">Adınız Soyadınız:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <button type="submit">Teste Başla</button>
</form>
</body>
</html>