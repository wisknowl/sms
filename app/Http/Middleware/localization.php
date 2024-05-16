<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(1);
        // app()->setLocale($request->segment(1));
        // URL::defaults(['locale' => $request->segment(1)]);
        if (Session::has('app_locale')) {
            // dump(1000);
            App::setLocale(Session::get('app_locale'));
        }
        return $next($request);
    }
}
