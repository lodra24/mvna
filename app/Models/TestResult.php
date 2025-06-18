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
     * MBTI tipini hesapla
     */
    public function calculateMbtiType()
    {
        $mbti = '';
        
        // E/I boyutu
        $mbti .= $this->e_score > $this->i_score ? 'E' : 'I';
        
        // S/N boyutu
        $mbti .= $this->s_score > $this->n_score ? 'S' : 'N';
        
        // T/F boyutu
        $mbti .= $this->t_score > $this->f_score ? 'T' : 'F';
        
        // J/P boyutu
        $mbti .= $this->j_score > $this->p_score ? 'J' : 'P';
        
        return $mbti;
    }
}
