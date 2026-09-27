<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $table = 'instructions';

    protected $fillable = [
        'level_id',
        'title_de',
        'title_ar',
        'title_en',
        'title_fr',
        'title_es',

        'slug_de',
        'slug_ar',
        'slug_en',
        'slug_fr',
        'slug_es',

        'desc_de',
        'desc_ar',
        'desc_en',
        'desc_fr',
        'desc_es',

        'title_meta_de',
        'title_meta_ar',
        'title_meta_en',
        'title_meta_fr',
        'title_meta_es',

        'desc_meta_de',
        'desc_meta_ar',
        'desc_meta_en',
        'desc_meta_fr',
        'desc_meta_es',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}