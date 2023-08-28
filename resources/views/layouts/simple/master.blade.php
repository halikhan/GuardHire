<?php
$logo_add = App\Models\LogoManager::where('title','favicon')->first();

// dd($logo_add);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">

    {{-- {{asset('assets/images/favicon.png')}} --}}
    <link rel="icon" href="{{ (!empty($logo_add->image))?
        asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}" style="width:10px; height:10px;" type="image/x-icon">
    <link rel="shortcut icon" href="{{ (!empty($logo_add->image))?
        asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}" style="width:10px; height:10px;" type="image/x-icon">
    <title>Guard Hire </title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">


    @include('layouts.simple.css')
    @yield('style')
  </head>
  <style>
    .for-font-color{
        color: #fff !important;
    }
    .for-font-color a{
        color: #fff !important;

    }
    #pageloader {
      background:rgb(129 129 129 / 17%);
      display: none;
      height: 100%;
      position: fixed;
      width: 100%;
      z-index: 9999;
      top: 0;
      left: 0;
  }

  #pageloader img {
      left: 50%;
      /* margin-left: -32px;
              margin-top: -32px; */
      position: absolute;
      top: 50%;
      transform: translate(-50%, -50%);
      filter: grayscale(1);
  }
    .error{
        color: red;
    }
</style>
<div id="pageloader">
    <img src="{{asset('frontend/assets/1x/Preloader.gif') }}" alt="processing..." />
</div>
  <body @if(Route::current()->getName() == 'index') onload="startTime()" @endif>
    @if(Route::current()->getName() == 'index')
      <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
          <defs></defs>
          <filter id="goo">
            <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
            <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
          </filter>
        </svg>
      </div>
     @endif
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      @include('layouts.simple.header')
      <!-- Page Header Ends  -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('layouts.simple.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  @yield('breadcrumb-title')
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""> <i data-feather="home"></i></a></li>
                    @yield('breadcrumb-items')
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          @yield('content')
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('layouts.simple.footer')

      </div>
    </div>
    <!-- latest jquery-->
    @include('layouts.simple.script')
    <!-- Plugin used-->
    <script type="text/javascript">
        $(".regiterForm").on('click',function() {
        $("#pageloader").fadeIn();
        });
        </script>
    <script type="text/javascript">
      if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
            $(".according-menu.other" ).css( "display", "none" );
            $(".sidebar-submenu" ).css( "display", "block" );
      }
    </script>
  </body>
</html>
