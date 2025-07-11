<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Quize;
use App\Level;
use App\Set;
use Auth;
use App\QuizesAnswers;
class QuizeHelpers
{
   
    public static function quizes($level_name,$type,$count)
    {
        // return $data =Quize::inRandomOrder()->where('level_name',$level_name)->with('levels')->has('levels')->whereHas('sets', function ($query)use($type,$count){
        //     $query->where('type', $type);
        // })->with("sets")->take($count)->get();   

        $user = Auth::guard('user-api')->user();

        $level=Level::where('type','quize')->where("name" , $level_name)->first();
        $sets = Set::inRandomOrder()->where('level_id',$level->id)->where('type', $type)->where('skill', 'rules')->take($count)->get();

        $data = [];

        $answeredQuizeIds = QuizesAnswers::where('user_id', $user->id )->pluck('quize_id')->toArray();

        foreach ($sets as $set) {
            // $quize = Quize::inRandomOrder()->where('set_id', $set->id)->with('levels')->with('sets')->first();
            
            $quize = Quize::inRandomOrder()->where('set_id', $set->id)->with('levels')->with('sets')
                    ->whereNotIn('id', $answeredQuizeIds)
                    ->first();
            if ($quize) {
                $data[] = $quize;
            }
        }
        return $data;



        // $levelIds = Quize::select('level_id')->whereHas('sets', function ($query) use ($type) {
        //     $query->where('type', $type);
        // })->with('levels')->has('levels')->groupBy('level_id')->pluck('level_id');

        // $quizzes = collect();

        // foreach ($levelIds as $levelId) {
        //     $quiz = Quize::inRandomOrder()->where('level_id', $levelId)->whereHas('sets', function ($query) use ($type) {
        //         $query->where('type', $type);
        //     })
        //     ->with(['levels', 'sets'])
        //     ->first();

        //     if ($quiz) {
        //     $quizzes->push($quiz);
        //     }
        // }

        // return $quizzes;


        
    }

}