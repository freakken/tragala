<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAccess
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
        if (Auth::guard($guard)->check() && Auth::user()->usergroup > 2) {
            return $next($request);
        }

        return redirect('/home');
    }
}