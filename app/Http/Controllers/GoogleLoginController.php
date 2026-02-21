<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use JWTAuth;

class GoogleLoginController extends Controller
{
    // Redirect to Google login
    public function redirectToGoogle($lang)
    {
        // نحفظ اللغة في session
        session(['lang' => $lang]);
        return Socialite::driver('google')->stateless()->redirect();
    }

    // Handle callback from Google
    public function handleGoogleCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->email)->first();
        if(!$user)
        {
            $user = User::create(['name' => $googleUser->name, 'email' => $googleUser->email, 'password' => \Hash::make(rand(100000,999999))]);
        }
        $token = JWTAuth::fromUser($user);
        // $token = Auth::guard('user-api')::fromUser($user);
        // $token = JWTAuth::guard('user-api')->fromUser($user);
        $user->token=$token;
        $user->save();
        
        // return $user;
        // Auth::login($user);
        $data = [
            'title' => 'Example Title',
            'content' => 'This is an example content.xxx',
            'id' => rand(1, 1000)
        ];
        // return "rgdfdhd";
        // return redirect('data-t')->route('data-t');
        return view('front.front',['data' => $user]);


    }
}