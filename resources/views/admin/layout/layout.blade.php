<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('admin_theme/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin_theme/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin_theme/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin_theme/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('admin_theme/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admin_theme/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('admin_theme/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('admin_theme/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @if (Auth::user())
              <div class="profile clearfix">
                <div class="profile_pic">
                  <a href=""><img src="{{asset('admin_theme/images/img.jpg')}}" alt="..." class="img-circle profile_img"></a>
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2>{{auth()->user()->name}}</h2>
                </div>
              </div>
            @endif
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu  start-->
            @include('admin.layout.sidebar')
            <!-- /sidebar menu end -->

            <!-- /menu footer buttons -->
            {{-- included with sidebar --}}
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('admin.layout.header')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content start -->
        @include('admin.layout.footer')
        <!-- /footer content end -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('admin_theme/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('admin_theme/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('admin_theme/vendors/nprogress/nprogress.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('admin_theme/build/js/custom.min.js')}}"></script>

    @stack('footer-script')
	
  </body>
</html>
