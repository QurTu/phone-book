<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::check() && Auth::user()->role_id == 1) {
            return $next($request);
        }elseif(Auth::check() && Auth::user()->role_id == 2) {
            return \redirect('noAccess');
        } else {
            return \redirect(route('login'));

        }
    }
}
