<?php

use Illuminate\Support\Facades\Route;


use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
   
//     return view('front.front',['data' => '']);
// });

Route::get('/', 'Admin\DashBoardController@index');

// Route::get('/insert', function() {
//     $students = app('firebase.firestore')->database()->collection('users')->documents();
//     $stuRef = app('firebase.firestore')->database()->collection('users')->newDocument();
//     $stuRef->set([
//         'firstname' => 'Seven',
//         'lastname' => 'Stac',
//     ]);
//     echo "<h1>".'inserted'."</h1>";
// });



// Route::get('get-collection', 'FirebaseController@hamadaindex');

Route::get('en/google-login', 'GoogleLoginController@redirectToGoogle')->name('google.redirect');
Route::get('ar/google-login', 'GoogleLoginController@redirectToGoogle')->name('google.redirect');
Route::get('de/google-login', 'GoogleLoginController@redirectToGoogle')->name('google.redirect');
Route::get('fr/google-login', 'GoogleLoginController@redirectToGoogle')->name('google.redirect');
Route::get('es/google-login', 'GoogleLoginController@redirectToGoogle')->name('google.redirect');
Route::get('/google/callback', 'GoogleLoginController@handleGoogleCallback')->name('google.callback');

// Route::get('{lang}/google-login', 'GoogleLoginController@redirectToGoogle')->name('google.redirect');
// Route::get('google/callback',  'GoogleLoginController@handleGoogleCallback')->name('google.callback');


// Route::get('/data-t', 'DataController@process');


//   Route::get('/myanswer', function () {
//     return view('front.myanswer');
// });

// Route::get('{any}',function($any){

//       return view('front.front',['data' => '']);
//   })->where('any','^((?!admin|api|activation|myanswer).)*$');






