@extends('layouts.backend.app')


@section('title', 'Settings')


@push('css')
    
@endpush


@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
  
        <div class="body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
              
                <li role="presentation" class="">
                    <a href="#profile_with_icon_title" data-toggle="tab" aria-expanded="false">
                        <i class="material-icons">face</i>
                        <span>update profile</span>
                    </a>
                </li>
               
                <li role="presentation" class="">
                    <a href="#password_update" data-toggle="tab" aria-expanded="false">
                        <i class="material-icons">change_history</i>
                        <span>change password</span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="profile_with_icon_title">

                            <div class="body">
                            <form class="form-horizontal" method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data" >
                                @csrf
                                @method('put')

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                <input type="text" id="name" class="form-control"  name="name" value="{{Auth::user()->name}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="email_address_2">Email Address</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="email_address_2" class="form-control"  name="email" value="{{Auth::user()->email}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="profile">Profile Image</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" name="image" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="about">About</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="about" name="about"  class="form-control"  value="{{Auth::user()->about}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                       
              
             
             
            </div>
           
            <div role="tabpanel" class="tab-pane fade" id="password_update">
                <div class="body">
                    <form class="form-horizontal" method="post" action="{{route('admin.password.update')}}" >
                        @csrf
                        @method('put')

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="old ">Old-Password</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="password" id="old" class="form-control" name="old_password" placeholder="enter old password">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="new">New Password</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="new" class="form-control" name="password" placeholder="enter new password">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="new">Confirm Password</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="new" class="form-control" name="password_confirmation" placeholder="enter new password again">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                         
                            
                         
                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

             </div>

            </div>

        </div>
    </div>
</div>
@endsection


@push('js')
    
@endpush