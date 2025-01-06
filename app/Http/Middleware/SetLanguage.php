<?php

namespace App\Http\Middleware;

use Closure;


use Illuminate\Support\Facades\App;

class SetLanguage
{
    public function handle($request, Closure $next)
    {
        $locale = $request->query('lang', session('lang', 'en'));
        App::setLocale($locale);
        session(['lang' => $locale]);
        return $next($request);
    }
}


