<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question_text',
        'dimension',
        'category',
        'option_a_value',
        'option_b_value'
    ];

    /**
     * Bu soruya verilen cevapları getir
     */
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
