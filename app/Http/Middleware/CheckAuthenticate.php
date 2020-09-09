<?php

namespace App\Http\Middleware;

use Closure;
use View;

class CheckAuthenticate
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
        if ($request->session()->has('user')) {
            $request->session()->get('user');
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
