<?php

namespace App\Http\Controllers\Admin;

<<<<<<< HEAD
use App\Category;
use App\Product;
=======
use App\Tag;
use App\Product;
use App\Category;
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

<<<<<<< HEAD

=======
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $products = Product::latest()->get();
        return view('admin.products.view_products', compact('products'));
=======
        $products = product::latest()->get();
        return view('admin.product.index',compact('products'));
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        $categories = Category::where('parent_id', 0)->get();
        $categories_dropdown = "<option value = '' selected disabled>Select </option>";
        foreach ($categories as $key => $cat) {
            $categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name . "</option>";
            $sub_categories = Category::where('parent_id', $cat->id)->get();

            foreach ($sub_categories as $key => $sub) {
                $categories_dropdown .= "<option value='" . $sub->id . "'> &nbsp;--&nbsp" . $sub->name . "</option>";
            }
        }
        return view('admin.products.add_product', compact('categories_dropdown'));
=======
        $categories = Category::latest()->get();
        $tags       = Tag::latest()->get();
        return view('admin.product.create',compact('categories','tags'));
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $this->validate($request, [
            'category_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required',
            'product_color' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'image'        => 'required'

        ]);

        $image = $request->file('image');
        $name  = $request->product_name;
        if (isset($image)) {
            //make unique name for image
            $currentDate = carbon::now()->toDatestring();
            $imageName   = $name . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!storage::disk('public')->exists('product')) {
                storage::disk('public')->makeDirectory('product');
            }
            $productImage = Image::make($image)->resize(500, 500)->stream();
            storage::disk('public')->put('product/' . $imageName, $productImage);
        }

        $product = new Product();
        $product->user_id = Auth::id(); //auth::id()= present authinticated id
        $product->name   = $request->product_name;
        $product->category_id   = $request->category_id;
        $product->code   = $request->product_code;
        $product->color   = $request->product_color;
        $product->description   = $request->product_description;
        $product->price   = $request->product_price;
        $product->image   = $imageName;

        //    if(isset($request->status)){
        //        $post->status = true;
        //    }else{
        //        $post->status = false;
        //    }

        $product->save();
=======
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
 
            $productImage= Image::make($image)->resize(1600,1066)->stream();
            storage::disk('public')->put('product/'.$imagename,$productImage);
     
         }else{
             $imagename = 'default.png'; // also ok without this else
         }
          
         $product = new Product();
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
 
         $product->is_approved = true;//for admin we forcefully make it true , but in author there will something else
        $product->save();
        //$request->tags=tags array by select name
        $product->categories()->attach($request->categories);//categories()=function in product model
        $product->tags()->attach($request->tags);
        Toastr::success('product Successfuly saved','success');
        return redirect()->route('admin.product.index');
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
<<<<<<< HEAD
        //
=======

      $categories = Category::latest()->get();
        $tags       = Tag::latest()->get();
        return view('admin.product.show',compact('product','categories','tags'));
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
<<<<<<< HEAD
        return view('admin.products.edit_product', compact('product'));
=======
        $categories = Category::latest()->get();
        $tags       = Tag::latest()->get();
        return view('admin.product.edit',compact('product','categories','tags'));
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
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
<<<<<<< HEAD

        $this->validate($request, [
            'product_name' => 'required',
            'product_code' => 'required',
            'product_color' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'image'        => 'image'

        ]);

        $image = $request->file('image');
        $name  = $request->product_name;
        if (isset($image)) {
            //make unique name for image
            $currentDate = carbon::now()->toDatestring();
            $imageName   = $name . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!storage::disk('public')->exists('product')) {
                storage::disk('public')->makeDirectory('product');
            }
            //delete old post image
            if (storage::disk('public')->exists('product/' . $product->image)) {
                storage::disk('public')->delete('product/' . $product->image);
            }
            $productImage = Image::make($image)->resize(500, 500)->stream();
            storage::disk('public')->put('product/' . $imageName, $productImage);
        } else {
            $imageName = $product->image;
        }


        $product->user_id = Auth::id(); //auth::id()= present authinticated id
        $product->name   = $request->product_name;
        $product->code   = $request->product_code;
        $product->color   = $request->product_color;
        $product->description   = $request->product_description;
        $product->price   = $request->product_price;
        $product->image   = $imageName;

        //    if(isset($request->status)){
        //        $post->status = true;
        //    }else{
        //        $post->status = false;
        //    }

        $product->save();
        return redirect()->route('admin.product.index');
=======
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
 
         $product->is_approved = true;//for admin we forcefully make it true , but in author there will something else
        $product->save();
        //$request->tags=tags array by select name
        $product->categories()->sync($request->categories);//categories()=function in product model
        $product->tags()->sync($request->tags);
        Toastr::success('product Successfuly Updated','success');
        return redirect()->route('admin.product.index');
    }

    public function pending(){
        $products = Product::where('is_approved',false)->get();
        return view('admin.product.pending',compact('products'));
    }

    public function approval($id){
        
        $product = Product::find($id);
        if($product->is_approved == false){
            $product->is_approved = true;
            $product->save();
            Toastr::success('Post Successfully Approved','success');
        }else{
            Toastr::info('This Post is already approved.','info');
        }
        return redirect()->back();
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
<<<<<<< HEAD
        if (storage::disk('public')->exists('product/' . $product->image)) {
            storage::disk('public')->delete('product/' . $product->image);
        }
        $product->delete();
=======
        if(storage::disk('public')->exists('product/'.$product->image)){
            Storage::disk('public')->delete('product/'.$product->image);
        }
        $product->categories()->detach();
        $product->tags()->detach();
        $product->delete();
        Toastr::success('post successfully deleted','success');
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
        return redirect()->back();
    }
}
