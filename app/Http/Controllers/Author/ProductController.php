<?php

namespace App\Http\Controllers\Author;

use App\Tag;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Auth::user()->products()->get();
        return view('author.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $tags       = Tag::latest()->get();
        return view('author.product.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');
        $slug  = str_slug($request->title);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('product')) {
                Storage::disk('public')->makeDirectory('product');
            }

            $productImage = Image::make($image)->resize(1600, 1066)->stream();
            storage::disk('public')->put('product/' . $imagename, $productImage);
        } else {
            $imagename = 'default.png'; // also ok without this else
        }

        $product = new Product();
        $product->user_id = Auth::id(); //auth::id()= present authinticated id
        $product->title   = $request->title;
        $product->slug    = $slug;
        $product->image   = $imagename;
        $product->body   = $request->body;
        if (isset($request->status)) {
            $product->status = true;
        } else {
            $product->status = false;
        }

        $product->is_approved = false; //for admin we forcefully make it true , but in author there will something else
        $product->save();
        //$request->tags=tags array by select name
        $product->categories()->attach($request->categories); //categories()=function in product model
        $product->tags()->attach($request->tags);
        Toastr::success('product Successfuly saved', 'success');
        return redirect()->route('author.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if($product->user_id != Auth::id()){
            Toastr::error('you are not authorized to access this post','Error');
            return redirect()->back();
        }
        $categories = Category::latest()->get();
        $tags       = Tag::latest()->get();
        return view('author.product.show',compact('product','categories','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if($product->user_id != Auth::id()){
            Toastr::error('you are not authorized to access this post','Error');
            return redirect()->back();
        }
        
        $categories = Category::latest()->get();
        $tags       = Tag::latest()->get();
        return view('author.product.edit',compact('product','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        if($product->user_id != Auth::id()){
            Toastr::error('you are not authorized to access this post','Error');
            return redirect()->back();
        }
        $this->validate($request,[
            'title'=>'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg',
            'categories'=>'required',
            'tags'=>'required',
            'body'=>'required',
         ]);
         $image = $request->file('image');
         $slug  = str_slug($request->title);
         if(isset($image)){
             $currentDate= Carbon::now()->toDateString();
             $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('product')){
                Storage::disk('public')->makeDirectory('product');
             }

             //delete older image
             if(Storage::disk('public')->exists('product/'.$product->image)){
                Storage::disk('public')->delete('product/'.$product->image);
             }
 
            $productImage= Image::make($image)->resize(1600,1066)->stream();
            storage::disk('public')->put('product/'.$imagename,$productImage);
     
         }else{
             $imagename = $product->image; 
         }
          
         
         $product->user_id = Auth::id();//auth::id()= present authinticated id
         $product->title   = $request->title;
         $product->slug    = $slug;
         $product->image   = $imagename;
         $product->body   = $request->body;
         if(isset($request->status)){
             $product->status = true;
         }else{
             $product->status = false;
         }
 
         $product->is_approved = false;//for admin we forcefully make it true , but in author there will something else
        $product->save();
        //$request->tags=tags array by select name
        $product->categories()->sync($request->categories);//categories()=function in product model
        $product->tags()->sync($request->tags);
        Toastr::success('product Successfuly Updated','success');
        return redirect()->route('author.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->user_id != Auth::id()){
            Toastr::error('you are not authorized to access this post','Error');
            return redirect()->back();
        }
        if(storage::disk('public')->exists('product/'.$product->image)){
            Storage::disk('public')->delete('product/'.$product->image);
        }
        $product->categories()->detach();
        $product->tags()->detach();
        $product->delete();
        Toastr::success('post successfully deleted','success');
        return redirect()->back();
    }
}
