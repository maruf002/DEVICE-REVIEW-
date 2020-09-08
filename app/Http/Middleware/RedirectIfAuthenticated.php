<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
<<<<<<< HEAD
        if (Auth::guard($guard)->check() && Auth::User()->id ==1) {
            // return redirect(RouteServiceProvider::HOME);
            return redirect()->route('admin.dashboard');
        }else{
            return $next($request);
        }
        
        }

        
=======
        if (Auth::guard($guard)->check() && Auth::user()->role->id ==1 ) {
            return redirect()->route('admin.dashboard');
        }elseif(Auth::guard($guard)->check() && Auth::user()->role->id ==2){
            return redirect()->route('author.dashboard');
        }else{
           
        return $next($request);
        }

    }
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
}
