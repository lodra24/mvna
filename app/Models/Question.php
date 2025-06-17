<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    use HasTranslations;
    protected $fillable = [
        'question_text',
        'dimension',
        'option_a_value',
        'option_b_value'
    ];

    public $translatable = ['question_text'];

    /**
     * Bu soruya verilen cevapları getir
     */
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
