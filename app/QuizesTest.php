<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizesTest extends Model
{
    protected $table = 'quizes_test';
    public function quizes_answers() {
        return $this->hasMany(QuizesAnswers::class,"quizes_test_id","id");
    }
    public function quizes() {
        return $this->belongsTo(Quize::class,"quize_id","id");
    }
}
