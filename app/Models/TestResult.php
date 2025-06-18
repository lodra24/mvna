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

}
