<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizesAnswers extends Model
{
    protected $table = 'quizes_answers';
    public function quizes() {
        return $this->belongsTo(Quize::class,"quize_id","id");
    }
}

