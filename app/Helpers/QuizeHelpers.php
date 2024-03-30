<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Quize;
class QuizeHelpers
{
   
    public static function quizes($id)
    {
        $data =Quize::where('level_name','A2')->with('levels')->whereHas('sets', function ($query){
            $query->where('type', 'difficult');
        })->with("sets")->take(5)->get();
        return $data;
    }
}