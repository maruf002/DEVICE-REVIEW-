<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Category;
use App\product;
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct()
    {
        $this->middleware('auth');
    }
=======
    
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
        return view('home');
=======
        $categories = Category::all();
        $products   = product::latest()->approved()->published()->take(6)->get();
        return view('welcome',compact('categories','products'));
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
    }
}
