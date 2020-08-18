@extends('layouts.frontend.app')


@section('title', 'Settings')


@push('css')
   
	<link href="{{asset('assets/frontend/css/front-page-category/css/styles.css')}}" rel="stylesheet">

	<link href="{{asset('assets/frontend/css/front-page-category/css/responsive.css')}}" rel="stylesheet"> 
	<style>
		.bar{
			width: 150px;
			height: 200px;
			background-color:#092532;
		}
		ul.new,li.new{
			float: center;
			list-style-type: none;
			color: aqua;
			display: block;
			padding: 11.5px 2px;
		}
		.favorite_product{
             color: blue;
		}
		

	</style>
@endpush


@section('content')

<div class="main-slider">
		<div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
			data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
			data-swiper-breakpoints="true" data-swiper-loop="true" >
			<div class="swiper-wrapper">

				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="images/category-1-400x250.jpg" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>BEAUTY</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->

				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="images/category-2-400x250.jpg" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>SPORT</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->

				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="images/category-3-400x250.jpg" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>HEALTH</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->

				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="images/category-4-400x250.jpg" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>DESIGN</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->

				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="images/category-5-400x250.jpg" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>MUSIC</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->

				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="images/category-6-400x250.jpg" alt="Blog Image"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>MOVIE</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->

			</div><!-- swiper-wrapper -->

		</div><!-- swiper-container -->

	</div><!-- slider -->

	<section class="blog-area section">
		<div class="container">
			
      
		<div class="row">
			<div class="col-lg-2 col-md-6">
						<!-- The sidebar -->
			<div class="bar">
			  <ul class="new">
				<li class="new"><a class="active" href="#home">Home</a></li>
				<li class="new"><a href="#news">News</a></li>
				<li class="new"><a href="#contact">Contact</a></li>
				<li class="new"><a href="#about">About</a></li>
			  </ul>
			</div>     
		
			</div>
		
			@foreach($products as $key => $pro)
			<div class="col-lg-4 col-md-6">
				<div class="card h-100">
					<div class="single-post post-style-1">

						<div class="blog-image"><img src="{{Storage::disk('public')->url('product/'.$pro->image)}}" alt="Blog Image"></div>

					<a class="avatar" href="{{route('author.profile',$pro->user->username)}}"><img src="{{Storage::disk('public')->url('profile/'.$pro->user->image)}}" alt="Profile Image"></a>

						<div class="blog-info">

							<h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
							Concepts in Physics?</b></a></h4>

							<ul class="post-footer">
								<li>
									@guest
									<a href="javascript:void(0);" onclick="toastr.info('To add favourite list, you need to login first.','Info',{
										closeButton: true,
										progressbar: true,
									})"><i class="ion-heart"></i>{{$pro->favorite_to_users->count()}}</a>
									@else
								<a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{$pro->id}}').submit();"
									 class="{{!Auth::user()->favorite_products->
									 where('pivot.product_id',$pro->id)->count() == 0 ?'favorite_product' : ''}}">
									<i class="ion-heart"></i>{{$pro->favorite_to_users->count()}}</a>

									<form id="favorite-form-{{$pro->id}}" action="{{route('product.favorite',$pro->id)}}" method="POST" style="display: none;">
										@csrf
		
									</form>  
										  
									   @endguest
								</li>
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

	</div><!-- container -->
	</section><!-- section -->
@endsection

@push('js')
    
@endpush