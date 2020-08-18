@extends('layouts.frontend.app')


@section('title', 'home')


@push('css')
<link href="{{asset('assets/frontend/css/blog-sidebar/css/styles.css')}}" rel="stylesheet">

<link href="{{asset('assets/frontend/css/blog-sidebar/css/responsive.css')}}" rel="stylesheet">
<style>
    .cardf{
        min-width:300px;
        height:300px;
      
        
    }
</style>
@endpush


@section('content')
<div class="slider display-table center-text">
    <h1 class="title display-table-cell"><b>{{$author->name}}</b></h1>
</div><!-- slider -->

<section class="blog-area section">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="row">

                   
			@foreach($products as $key => $pro)
			<div class="col-lg-4 col-md-6">
				<div class="cardf">
					<div class="single-post post-style-1">

						<div class="blog-image"><img src="{{Storage::disk('public')->url('product/'.$pro->image)}}" alt="Blog Image"></div>

					<a class="avatar" href="{{route('author.profile',$pro->user->username)}}"><img src="{{Storage::disk('public')->url('profile/'.$pro->user->image)}}" alt="Profile Image"></a>

						<div class="blog-info">

                    <h4 class="title"><a href="#"><b>{{$pro->about}}</b></a></h4>

							<ul class="post-footer">
								<li><a href="#"><i class="ion-heart"></i>57</a></li>
								<li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
								<li><a href="#"><i class="ion-eye"></i>138</a></li>
							</ul>

						</div><!-- blog-info -->
					</div><!-- single-post -->
				</div><!-- card -->
			</div><!-- col-lg-4 col-md-6 -->
		
            @endforeach
                   

                </div><!-- row -->

                <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

            </div><!-- col-lg-8 col-md-12 -->

            <div class="col-lg-4 col-md-12 ">

                <div class="single-post info-area ">

                    <div class="about-area">
                        <h4 class="title"><b>ABOUT Author</b></h4>
                    <p> {{$author->name}}</p>
                    <span>Author since:{{$author->created_at}}</span>
                    <span>Total Post: {{$author->products->count()}}</span>
                    </div>

                
               

                </div><!-- info-area -->

            </div><!-- col-lg-4 col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->
</section><!-- section -->

@endsection


@push('js')
    
@endpush