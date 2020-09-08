<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function profile($username)
    {
        $author = User::Where('username', $username)->first();
        $products  = $author->products()->Approved()->published()->get();
        return view('profile', compact('author', 'products'));
    }
}
