<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubQuestion extends Model
{
    protected $table = 'subquestions';

    public function answer()
    {
        return $this->hasOne(Answer::class, 'subquestion_id');
    }

    public function expectedAnswer()
    {
        return $this->hasOne(ExpectedAnswer::class, 'subquestion_id');
    }

    public function examAnswer()
    {
        return $this->hasOne(ExamAnswer::class, 'subquestion_id');
    }
}
