<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseExamAnswer extends Model
{
    protected $table = 'exercises_exams_answers';

    protected $fillable = [
        'user_id',
        'level_id',
        'exercise_id',
        'sub_id',
        'answer',
        'expected_answer',
    ];
}