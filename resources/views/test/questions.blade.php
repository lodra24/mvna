<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBTI Testi - MindMetrics</title>
</head>
<body>
    <h1>Merhaba, {{ $userName }}!</h1>

    <form action="{{ route('test.submit') }}" method="POST">
        @csrf

        @if(isset($questions) && count($questions) > 0)
            @foreach($questions as $index => $question)
                <div>
                    <h3>{{ $index + 1 }}. {{ $question->question_text }}</h3>
                    <div>
                        <input type="radio" name="answers[{{ $question->id }}]" id="question_{{ $question->id }}_a" value="A" required>
                        <label for="question_{{ $question->id }}_a">
                            {{ config('mbti_question_options.' . $question->dimension . '.A', 'Seçenek A') }}
                        </label>
                    </div>
                    <div>
                        <input type="radio" name="answers[{{ $question->id }}]" id="question_{{ $question->id }}_b" value="B" required>
                        <label for="question_{{ $question->id }}_b">
                            {{ config('mbti_question_options.' . $question->dimension . '.B', 'Seçenek B') }}
                        </label>
                    </div>
                </div>
                @if(!$loop->last) <hr> @endif
            @endforeach

            <button type="submit">Testi Bitir</button>
        @else
            <p>Gösterilecek soru bulunamadı.</p>
        @endif
    </form>
</body>
</html>