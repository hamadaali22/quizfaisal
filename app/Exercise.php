<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'exercises';
    public function levels() {
        return $this->belongsTo(Level::class,"level_id","id");
    }
}

