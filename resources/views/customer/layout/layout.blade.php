<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
<!-- Bootstrap style --> 
<link id="callCss" rel="stylesheet" href="{{asset('front_theme/themes/bootshop/bootstrap.min.css')}}" media="screen"/>
<link href="{{asset('front_theme/themes/css/base.css')}}" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive --> 
<link href="{{asset('front_theme/themes/css/bootstrap-responsive.min.css')}}" rel="stylesheet"/>
<link href="{{asset('front_theme/themes/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->   
<link href="{{asset('front_theme/themes/js/google-code-prettify/prettify.css')}}" rel="stylesheet"/>
<!-- fav and touch icons -->
<link rel="shortcut icon" href="{{asset('themes/images/ico/favicon.ico')}}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('front_theme/themes/images/ico/apple-touch-icon-144-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('front_theme/themes/images/ico/apple-touch-icon-114-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('front_theme/themes/images/ico/apple-touch-icon-72-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" href="{{asset('front_theme/themes/images/ico/apple-touch-icon-57-precomposed.png')}}">
<style type="text/css" id="enject"></style>
  </head>
<body>

<!-- Header start ====================================================================== -->
@include('customer.layout.header')
<!-- Header End====================================================================== -->

{{-- slider start --}}
@yield('slider')
{{-- slider End --}}

<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar start================================================== -->
	@include('customer.layout.sidebar')
<!-- Sidebar end=============================================== -->

{{-- main content start --}}
@yield('content')
{{-- main content end --}}
		</div>
	</div>
</div>
<!-- Footer start ================================================================== -->
@include('customer.layout.footer')
<!-- Footer end ================================================================== -->


	
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="{{asset('front_theme/themes/js/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('front_theme/themes/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front_theme/themes/js/google-code-prettify/prettify.js')}}"></script>

<script src="{{asset('front_theme/themes/js/bootshop.js')}}"></script>
<script src="{{asset('front_theme/themes/js/jquery.lightbox-0.5.js')}}"></script>
<script src="{{asset('front_theme/themes/js/jquery-original.js')}}" type="text/javascript"></script>
	
	<!-- Themes switcher section ============================================================================================= -->

@stack('footer-script')
</body>
</html>