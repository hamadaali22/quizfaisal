<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Auth;
use App\ContactInfo;



use App\User;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
      $cont = ContactInfo::first();
      view()->share('contact', $cont);


    }
}
