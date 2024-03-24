<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quize extends Model
{
    public function levels() {
        return $this->belongsTo(Level::class,"level_id","id")->where('name3','A2');
    }
    public function sets_difficult() {
        return $this->belongsTo(Set::class,"set_id","id")->where('type','difficult');
    }
    public function sets_middle() {
        return $this->belongsTo(Set::class,"set_id","id")->where('type','middle');
    }
    public function sets_easy() {
        return $this->belongsTo(Set::class,"set_id","id")->where('type','easy');
    }
    
}
