<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
<<<<<<< HEAD
    //
=======
    public function products(){
        return  $this->belongsToMany('App\Product')->withTimestamps();///withTimestamps for created_at & updated_at
      }
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
}
