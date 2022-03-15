<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (auth()->user()->login_status == 'online') {
            dd("in");
            return $next($request);
        } else {
            dd("out");
            return redirect('/')->with('error', "Sorry Only Admin can Access it..");

        }

    }
}
