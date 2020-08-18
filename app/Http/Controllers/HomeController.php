<?php

namespace App\Http\Controllers;

use App\Category;
use App\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $products   = product::latest()->approved()->published()->take(6)->get();
        return view('welcome',compact('categories','products'));
    }
}
