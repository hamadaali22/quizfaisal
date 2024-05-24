<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if(!$user)
        {
            $user = User::create(['name' => $googleUser->name, 'email' => $googleUser->email, 'password' => \Hash::make(rand(100000,999999))]);
        }
        $token = JWTAuth::fromUser($user);
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
        // return view('front.front', compact('users'));
        return redirect(RouteServiceProvider::HOME);
    }
}