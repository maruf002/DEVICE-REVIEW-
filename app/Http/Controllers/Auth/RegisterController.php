<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo ;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
<<<<<<< HEAD
        if(Auth::check() && Auth::User()->id ==1){
            $this->redirectTo = route('admin.dashboard');
        }
=======
        if(Auth::check() && Auth::user()->role->id == 1){
            $this->redirectTo = route('admin.dashboard');
         }else{
             $this->redirectTo = route('author.dashboard');
         }
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
<<<<<<< HEAD
=======
            'username' => ['required', 'string', 'max:255|unique:users'],
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
<<<<<<< HEAD
            'name' => $data['name'],
=======
            'role_id' => 2,
            'name' => $data['name'],
            'username'=>str_slug($data['username']),
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
