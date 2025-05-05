<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    public function quizes() {
        return $this->hasMany(Quize::class,"set_id","id");
    }
}
