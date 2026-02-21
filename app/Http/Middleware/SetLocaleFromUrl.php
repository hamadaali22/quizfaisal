<?php

namespace App\Http\Middleware;

use Closure;

class SetLocaleFromUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return $next($request);
        $locale = $request->segment(1); // أول جزء في الرابط

        if (in_array($locale, ['ar', 'en', 'de', 'fr', 'es'])) {
            app()->setLocale($locale);
        } else {
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
