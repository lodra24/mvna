<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $fillable = [
        'user_id',
        'guest_name',
        'mbti_type',
        'e_score',
        'i_score',
        's_score',
        'n_score',
        't_score',
        'f_score',
        'j_score',
        'p_score',
        'report_path',
        'payment_id',
        'status'
    ];

    /**
     * Bu test sonucunun ait olduğu kullanıcı
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * Bu test sonucunun ait olduğu ödeme
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * Bu test sonucuna ait kullanıcı cevapları
     */
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }

    /**
     * Bu test sonucuna ait MBTI tip detayları
     */
    public function mbtiTypeDetail()
    {
        return $this->hasOne(MbtiTypeDetail::class, 'mbti_type', 'mbti_type');
    }

    /**
     * İki boyut harfi arasındaki tercih yoğunluğunu hesaplar
     *
     * @param string $dimension_letter_1 İlk boyut harfi (örn: 'E')
     * @param string $dimension_letter_2 İkinci boyut harfi (örn: 'I')
     * @return array ['dominant_letter' => string, 'percentage' => int, 'score1' => int, 'score2' => int]
     */
    public function getPreferenceFor($dimension_letter_1, $dimension_letter_2)
    {
        // Harf parametrelerini küçük harfe çevir ve skor sütun adlarını oluştur
        $score_column_1 = strtolower($dimension_letter_1) . '_score';
        $score_column_2 = strtolower($dimension_letter_2) . '_score';
        
        // İlgili skor sütunlarından değerleri al
        $score1 = $this->{$score_column_1} ?? 0;
        $score2 = $this->{$score_column_2} ?? 0;
        
        // Toplam skor hesapla
        $total_score = $score1 + $score2;
        
        // Eğer toplam skor sıfırsa, varsayılan değer döndür
        if ($total_score == 0) {
            return [
                'dominant_letter' => 'N/A',
                'percentage' => 50,
                'score1' => 0,
                'score2' => 0
            ];
        }
        
        // Hangi skorun daha büyük olduğunu kontrol et ve baskın harfi belirle
        if ($score1 > $score2) {
            $dominant_letter = strtoupper($dimension_letter_1);
            $dominant_score = $score1;
        } elseif ($score2 > $score1) {
            $dominant_letter = strtoupper($dimension_letter_2);
            $dominant_score = $score2;
        } else {
            // Skorlar eşitse, ilk harfi baskın kabul et
            $dominant_letter = strtoupper($dimension_letter_1);
            $dominant_score = $score1;
        }
        
        // Baskın skorun yüzdesini hesapla ve yuvarla
        $percentage = round(($dominant_score / $total_score) * 100);
        
        return [
            'dominant_letter' => $dominant_letter,
            'percentage' => $percentage,
            'score1' => $score1,
            'score2' => $score2
        ];
    }

}
