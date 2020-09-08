<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add($product){
        
         $user = Auth::user();
        $isFavourite=$user->favorite_products()->where('product_id',$product)->count();
         if($isFavourite == 0){
             $user->favorite_products()->attach($product);
            Toastr::success('Post Successfully Added To Your List:','Success');
            return redirect()->back();
        }else{
             $user->favorite_products()->detach($product);
           Toastr::success('Post Successfully Removed To Your List:','Success');
            return redirect()->back();
        }

    }

}
