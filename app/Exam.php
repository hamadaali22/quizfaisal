<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

     public function examAnswers()
    {
        return $this->hasMany(ExamAnswer::class);
    }
}
