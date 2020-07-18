
@extends('layouts.backend.app')


@section('title', 'Category add')

@push('css')
   
@endpush

@section('content')
<div class="container-fluid">
    

    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                       Add new category
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                <form action="{{route('admin.category.store')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                        <label for="email_address">Category Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="name" class="form-control" placeholder="Enter Tag Name" name="name">
                            </div>
                        </div>
                        <label for="email_address">Category image</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" id="name" class="form-control"name="image">
                            </div>
                        </div>
                        
                    <a class="btn btn-danger m-t-15 waves-effect " href="{{route('admin.category.index')}}">Back</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection


@section('js')
    
@endsection