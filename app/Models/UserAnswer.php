<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $fillable = [
        'test_result_id',
        'question_id',
        'chosen_option'
    ];

    /**
     * Bu cevabın ait olduğu test sonucu
     */
    public function testResult()
    {
        return $this->belongsTo(TestResult::class);
    }

    /**
     * Bu cevabın ait olduğu soru
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
