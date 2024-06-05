<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\App;

class GeoLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $clientIP = file_get_contents('https://api.ipify.org');
        $position = Location::get($clientIP);

        $locale = $position ? (strtolower($position->countryCode) === 'us' ? 'en' : strtolower($position->countryCode)) : 'en';

        App::setLocale($locale);

        return $next($request);

    }
}
