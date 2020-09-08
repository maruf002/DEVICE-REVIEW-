<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'name', 'email', 'password',
=======
       'role_id', 'name','username', 'email', 'password',
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
<<<<<<< HEAD
=======

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }
    public function favorite_products(){
        return $this->belongsToMany('App\product');
    }
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
}
