
@extends('layouts.backend.app')


@section('title', 'Category add')

@push('css')
      <!-- Bootstrap Select Css -->
      <link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    
    <form action="{{route('admin.product.update',$product->id)}}" method="Post" enctype="multipart/form-data">
        @csrf
        @method('put')
    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                       Edit Product
                    </h2>
                
                </div>
                <div class="body">
               
                        
                        <div class="form-group">
                            <div class="form-line">
                            <input type="text" id="name" class="form-control" placeholder="Prduct name" name="title" value="{{$product->title}}">
                            </div>
                        </div>
                       
                        <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input type="file" id="name" class="form-control"name="image">
                            
                        </div>
                        <div class="form-group">
                           <input type="checkbox" id="publish" class="filled-in" name="status" value="1" {{$product->status==true ? 'checked':''}}> 
                           <label for="publish">Publish</label>  
                            
                        </div>
                        
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                       Tags & Categories
                    </h2>
                  
                </div>
                <div class="body">
               
                        
                        <div class="form-group">
                            <div class="form-line">
                                <label for="category">Select Category</label>
                                <select  name="categories[]" id="category" class="form-control show-tick"  multiple >
                                  @foreach($categories as $key => $cat)
                                <option 
                                @foreach($product->categories as $key => $ProductCategory)
                                    {{$ProductCategory->id == $cat->id ?'selected':'' }}
                                @endforeach
                                value="{{$cat->id}}">{{$cat->name}}
                               </option>
                                  @endforeach
                                </select>
                                  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="tag">Select Tag</label>
                                <select  name="tags[]" id="tag" class="form-control show-tick"  multiple>
                                  @foreach($tags as $key => $tag)
                                <option
                                @foreach($product->tags as $key => $ProudctTag)
                                    {{$ProudctTag->id == $tag->id ? 'selected' : '' }}
                                @endforeach
                                 value="{{$tag->id}}">{{$tag->name}}
                                </option>
                                  @endforeach
                                </select>
                                  
                            </div>
                        </div>
                                        
                 <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.product.index') }}">BACK</a> 
                 <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>     
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                      Body
                    </h2>
                  
                </div>
                <div class="body">
                <textarea name="body" id="tinymce" >{{$product->body}}</textarea>
                </div>
            </div>
        </div>
    </div>
   </form>
   </div>

@endsection


@push('js')
     <!-- Select Plugin Js -->
     <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
     <!-- TinyMCE -->
    <script src="{{asset('assets/backend/plugins/tinymce/tinymce.js')}}"></script>
    <script>
            //TinyMCE
     $(function () {
 
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = '{{asset('assets/backend/plugins/tinymce')}}';
});
</script>


@endpush