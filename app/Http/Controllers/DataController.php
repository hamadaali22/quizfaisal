<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DataController extends Controller
{
    public function process()
    {
        $user = Auth::user();
        // dd($user);
        return view('front.front',['data' => $user]);
        $data = [
            'title' => 'Example Title',
            'content' => 'This is an example content.',
            'id' => rand(1, 1000)
        ];
        // dd($data);
        return view('data', ['data' => $data]);
    }
}
