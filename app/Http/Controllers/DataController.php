<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DataController extends Controller
{
    public function process()
    {
        $data = [
            'title' => 'Example Title',
            'content' => 'This is an example content.',
            'id' => rand(1, 1000)
        ];
        // dd($data);
        return view('data', ['data' => $data]);
    }
}
