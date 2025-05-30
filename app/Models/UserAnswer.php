<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'chosen_option'
    ];

    /**
     * Bu cevabın ait olduğu kullanıcı
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Bu cevabın ait olduğu soru
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
