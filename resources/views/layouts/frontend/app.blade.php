<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
    <title>@yield('content'){{ config('app.name', 'Laravel') }}</title>

 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
   <!-- Site Metas -->
   <title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">

   <!-- Site Icons -->
   <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
   <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.min.css')}}">
   <!-- Site CSS -->
   <link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="{{asset('front_assets/css/responsive.css')}}">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="{{asset('front_assets/css/custom.css')}}">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @stack('css')
</head>
<body>
    @include('layouts.frontend.partial.header')
    @yield('content')
    @include('layouts.frontend.partial.footer')  

    
    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{asset('front_assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('front_assets/js/popper.min.js')}}"></script>
    <script src="{{asset('front_assets/js/bootstrap.min.j')}}s"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('front_assets/js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('front_assets/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('front_assets/js/inewsticker.js')}}"></script>
    <script src="{{asset('front_assets/js/bootsnav.js.')}}"></script>
    <script src="{{asset('front_assets/js/images-loded.min.js')}}"></script>
    <script src="{{asset('front_assets/js/isotope.min.js')}}"></script>
    <script src="{{asset('front_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front_assets/js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('front_assets/js/form-validator.min.js')}}"></script>
    <script src="{{asset('front_assets/js/contact-form-script.js')}}"></script>
    <script src="{{asset('front_assets/js/custom.js')}}"></script>
=======
    <title>@yield('title')-{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
  <!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    	<!-- Stylesheets -->

	<link href="{{asset('assets/frontend/css/common-css/bootstrap.css')}}" rel="stylesheet">


	<link href="{{asset('assets/frontend/css/common-css/swiper.css')}}" rel="stylesheet">

	<link href="{{asset('assets/frontend/css/ionicons.css')}}" rel="stylesheet">  
	{{-- ionicons css should put out of a folder in css --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	

	



    @stack('css')
</head>
<body>
 @include('layouts.frontend.partial.header')
 
	

    @yield('content')


@include('layouts.frontend.partial.footer')



   <!-- SCIPTS -->

	<script src="{{asset('assets/frontend/js/common-js/jquery-3.1.1.min.js')}}"></script>

	<script src="{{asset('assets/frontend/js/common-js/tether.min.js')}}"></script>

	<script src="{{asset('assets/frontend/js/common-js/bootstrap.js')}}"></script>

	<script src="{{asset('assets/frontend/js/common-js/scripts.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	{!! Toastr::message() !!}
	 
	<script>
	   @if($errors->any())
	   @foreach($errors->all() as $error)
		 toastr.error('{{ $error }}', 'Error',{
			 closeButton:true,
			 progressBar:true,

		 });

	   @endforeach

	   @endif
	   
   </script>
	
    @stack('js')
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
</body>
</html>
