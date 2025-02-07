<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function level_images() {
        return $this->belongsTo(LevelImage::class,"level_id","id");
    }
}
