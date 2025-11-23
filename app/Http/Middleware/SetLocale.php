<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if locale is in session
        if (session()->has('locale')) {
            $locale = session()->get('locale');
        } 
        // Check if locale is in query string
        elseif ($request->has('lang')) {
            $locale = $request->get('lang');
            session()->put('locale', $locale);
        }
        // Use default locale
        else {
            $locale = config('app.locale');
        }

        // Validate locale
        $availableLocales = ['en', 'ms', 'id', 'zh'];
        if (in_array($locale, $availableLocales)) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
