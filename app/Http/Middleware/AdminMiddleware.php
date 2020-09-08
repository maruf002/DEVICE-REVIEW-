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
<<<<<<< HEAD
        if(Auth::check() && Auth::User()->id == 1){
=======
        if(Auth::check() && Auth::user()->role->id == 1){
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
