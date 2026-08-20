<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'level_id',
        'question_de', 'question_ar', 'question_en', 'question_fr', 'question_es',
        'answer_de', 'answer_ar', 'answer_en', 'answer_fr', 'answer_es',
        'status',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function getQuestion($locale = 'ar')
    {
        return $this->{"question_{$locale}"} ?? $this->question_en;
    }

    public function getAnswer($locale = 'ar')
    {
        return $this->{"answer_{$locale}"} ?? $this->answer_en;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}