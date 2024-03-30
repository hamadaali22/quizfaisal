<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Quize;
class QuizeHelpers
{
   
    public static function quizes($level_name,$type,$count)
    {
        return $data =Quize::where('level_name',$level_name)->with('levels')->has('levels')->whereHas('sets', function ($query)use($type,$count){
            $query->where('type', $type);
        })->with("sets")->take($count)->get();   
    }
}