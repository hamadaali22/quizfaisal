<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    protected $table = 'exams_answers';
    public function exams() {
        return $this->belongsTo(Exam::class,"exam_id","id");
    }
}
