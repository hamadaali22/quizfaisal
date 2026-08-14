<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $table = 'instructions';

    protected $fillable = [
        'level_id',
        'desc_de',
        'desc_ar',
        'desc_en',
        'desc_fr',
        'desc_es',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}