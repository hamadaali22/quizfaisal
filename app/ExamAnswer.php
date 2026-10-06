<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    protected $table = 'exams_answers';
    public function exams() {
        return $this->belongsTo(Exam::class,"exam_id","id");
    }
   
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function subquestion()
    {
        return $this->belongsTo(SubQuestion::class, 'subquestion_id', 'id');
    }
}
