<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
=======
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $redirectTo;
=======
    protected $redirectTo ;
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
<<<<<<< HEAD
        if(Auth:: check() && Auth::User()->id ==1){
            $this->redirectTo = route('admin.dashboard');
=======
        if(Auth::check() && Auth::user()->role->id == 1){
           $this->redirectTo = route('admin.dashboard');
        }else{
            $this->redirectTo = route('author.dashboard');
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
        }
        $this->middleware('guest')->except('logout');
    }
}
