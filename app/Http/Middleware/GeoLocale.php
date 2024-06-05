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
        $position = Location::get($request->ip());
        
        if ($position) {
            $countryCode = $position->countryCode;

            switch ($countryCode) {
                case 'DE':
                    $locale = 'de';
                    break;
                case 'ES':
                    $locale = 'es';
                    break;
                default:
                    $locale = 'en';
                    break;
            }
            App::setLocale($locale);
        } else {
            App::setLocale('en');
        }

        return $next($request);
    }
}
