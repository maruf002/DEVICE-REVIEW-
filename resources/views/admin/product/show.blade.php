
@extends('layouts.backend.app')


@section('title', 'Category add')

@push('css')
      <!-- Bootstrap Select Css -->
      <link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    
<a href="{{route('admin.product.index')}}" class="btn btn-danger">Back</a>

@if($product->is_approved == false)

<button type="button" class="btn btn-success pull-right" onclick="approvePost({{$product->id}})" >
<i class="material-icons">done</i>
<span>Approve</span>
</button>
<form id="approval-form" action="{{route('admin.product.approve',$product->id)}}" method="post" style="display: none;">
    @csrf
    @method('put')
 </form>                                                                                                                                                                                                                      
@else
<button type="button" class="btn btn-success pull-right " disabled >
    <i class="material-icons">done</i>
    <span>Approved</span>
    </button>
    
@endif
<br><br>
    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                       {{$product->title}}
                    <small>Posted By <strong><a href="">{{$product->user->name}}</a></strong></small>
                    </h2>
                
                </div>
                <div class="body">
               
                     {!!$product->body!!}   
                  
                        
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header bg-cyan">
                  <h2>Categories</h2>
              </div>
              <div class="body">
                  @foreach($product->categories as $key => $cat)
                      <span class="label bg-cyan">{{$cat->name}}</span>
                  @endforeach
              </div>
          </div>

          <div class="card">
            <div class="header bg-green">
                <h2>
                Tags
                </h2>
          
            </div>
            <div class="body">
                {{-- tags is a function in post model --}}
            @foreach($product->tags as $key => $tag)

            <span class="label bg-green">{{$tag->name}}</span>
                
            @endforeach
                
            </div>
        </div>

        <div class="card">
            <div class="header bg-amber">
              <h2>Featured Image</h2>
            </div>
            <div class="body">
            <img src="{{Storage::disk('public')->url('product/'.$product->image)}}" alt="" class="img-responsive thumbnail">
            </div>
        </div>

        </div>

     
    </div>
   
   
   </div>

@endsection


@push('js')
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script> 
<script type="text/javascript">
    function approvePost(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('approval-form').submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>

@endpush