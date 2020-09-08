<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index(){
        return view('admin.settings');
    }
    public function update(Request $request){
        $this->validate($request,[
            'name' =>'required',
            'email'=>'required|email',
            'image'=>'required|image',

        ]);

        $image = $request->file('image');
        $slug  = str_slug($request->name);
        //findorFail() exactly work like find but its show the exact error if not found
        $user  = User::findorFail(Auth::id());
        if(isset($image)){
            $currentDate = carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!storage::disk('public')->exists('profile')){
                storage::disk('public')->makeDirectory('profile');
            }
            //delete old image from profile folder

            if(storage::disk('public')->exists('profile/'.$user->image)){
                storage::disk('public')->delete('profile/'.$user->image);
            }
            
            $profile=Image::make($image)->resize(500,500)->stream();
            storage::disk('public')->put('profile/'.$imageName,$profile);
        }else{
            $imageName=$user->image;
        }

        $user->name = $request->name;
        $user->email=$request->email;
        $user->image=$imageName;
        $user->about=$request->about;
        $user->save();
        Toastr::success('profile successfully updated','Success');
        return redirect()->back();

    }

    public function password_update(Request $request){
       $this->validate($request,[
          'old_password'=>'required',
          'password'   =>'required|confirmed',

       ]);

       $hashedpassword = Auth::user()->password;
       if(Hash::check($request->old_password,$hashedpassword)){
           if(!Hash::check($request->password, $hashedpassword)){
               $user = User::find(Auth::id());
               $user->password = Hash::make($request->password);
               $user->save();
               Toastr::success('Password Successfully Changed','Success');
               Auth::logout();
               return redirect()->back();//for reload the logout page,necessary  
           }else{
            Toastr::error('New password can not be the same as old password.','Error');
            return redirect()->back(); 
           }
       }else{
        Toastr::error('Current password not match.','Error');
        return redirect()->back();
       }


    }
}
