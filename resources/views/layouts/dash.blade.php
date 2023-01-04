<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from davur.dexignzone.com/laravel/demo/index by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Dec 2022 05:17:17 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Multi Restaurant Management | @yield('title') </title>

	<meta name="description" content="Some description for the page"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/favicon.png')}}">

    @include('elements.css')
	
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
		@include('elements.header')	

		@include('elements.sidebar')
        
			@yield('content')

        
		@include('elements.footer')	
        		
    </div>
    <!--**Main wrapper end***-->

	@include('elements.js') 	
 </body>
</html>