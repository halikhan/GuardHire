<?php
$logo_add = App\Models\LogoManager::where('title','favicon')->first();
$logo_main = App\Models\LogoManager::where('title','logo')->first();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="shortcut icon" href="{{asset('assets/images/SVG/logo.svg')}}" sizes="196x196" type="image/x-icon"> --}}
    <link rel="icon" href="{{ (!empty($logo_add->image))?
        asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}" style="width:10px; height:10px;" type="image/x-icon">
    <link rel="shortcut icon" href="{{ (!empty($logo_add->image))?
        asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}" style="width:10px; height:10px;" type="image/x-icon">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}" />
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SWIPER SLIDER CSS -->
    <link rel="stylesheet" href="{{asset('website/css/swiper-bundle.css')}}" />
    <!-- Butter JS -->
    <link rel="stylesheet" href="{{asset('website/css/butter.css')}}">
    <!--WOW JS  -->
    <link rel="stylesheet" href="{{asset('website/css/wow.css')}}">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{asset('website/css/stylesheet.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"  />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <title>@yield('title')</title>
    <style type="text/css">
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
<script>
    toastr.options = {
        "positionClass": "toast-top-right",
        "showDuration": "9000",
        "hideDuration": "9000",
        "timeOut": "9000",
        "extendedTimeOut": "9000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>
    <div id="pageloader">
      <img src="{{asset('frontend/assets/1x/Preloader.gif') }}" alt="processing..." />
  </div>
</head>
<body>
 <!--Header open--->
    <!-- ==============================================HEADER OPEN=========================================== -->
    <header class="header" id="navbar-fixed-top">
        <div class="container">
            <nav class="destop-nav-bar">
                <div class="d-flex justify-content-between">
                    <div class="logo">

                        <a href="{{route('home')}}"> <img src="{{ (!empty($logo_main->image))?
                            asset('storage/uploads/logo/'.$logo_main->image):asset('storage/uploads/No-image.jpg') }}"
                            style="width:120px; height:80px;" alt=""></a>
                    </div>
                    <div class="link">
                        <div class="d-flex justify-content-center">

                            <a class="{{ Request::is('/') ? 'active' : '' }}" href="{{route('home')}}" class="header_links active">Home</a>
                            <a class="{{ Request::is('wedding') ? 'active' : '' }}" href="{{route('wedding')}}" class="header_links">Weddings</a>
                            <a class="{{ Request::is('engagement') ? 'active' : '' }}" href="{{route('engagement')}}" class="header_links">Engagements</a>
                            <a class="{{ Request::is('popular_vendors') ? 'active' : '' }}" href="{{route('popular_vendors')}}" class="header_links">Vendors</a>
                            <a class="{{ Request::is('planners') ? 'active' : '' }}" href="{{route('planners')}}" class="header_links">Planner</a>
                            <a  class="{{ Request::is('blog') ? 'active' : '' }}" href="{{route('blog')}}" class="header_links">Blog</a>
                            <a  class="{{ Request::is('events') ? 'active' : '' }}" href="{{route('events')}}" class="header_links">Events</a>
                            <a class="{{ Request::is('signin') ? 'active' : '' }}" href="{{route('signin')}}" class="header_links modal-dialog-centered" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Sign In</a>
                            <a  class="{{ Request::is('signup') ? 'active' : '' }}"   href="{{route('signup')}}" class="header_links">Sign Up</a>
                            <!-- <a href="register.html"><button class="reg-btn">Register</button></a> -->

                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- moblie navbar -->
        <div id="main-content">
            <div id="title"><a href="{{route('home')}}"><img src="{{asset('website/images/SVG/logo.svg')}}" alt=""></a></div>
        </div>
        <div id="btn" class="">
            <div id="top"></div>
            <div id="middle"></div>
            <div id="bottom"></div>
        </div>
        <div id="box" class="">
            <div id="items">
                <div class="imglogo"><img src="{{asset('website/images/SVG/logo.svg')}}" alt=""></div>
                <div class="item"><a class="{{ Request::is('home') ? 'active' : '' }}" href="{{route('home')}}" class="header_links active">Home</a></div>
                <div class="item"><a class="{{ Request::is('wedding') ? 'active' : '' }}" href="{{route('wedding')}}" class="header_links">Weddings</a></div>
                <div class="item"><a class="{{ Request::is('engagement') ? 'active' : '' }}" href="{{route('engagement')}}" class="header_links">Engagements</a>
                </div>
                <div class="item"><a  class="{{ Request::is('popular_vendors') ? 'active' : '' }}" href="{{route('popular_vendors')}}" class="header_links">vendors</a>
                </div>
                <div class="item"><a class="{{ Request::is('planners') ? 'active' : '' }}" href="{{route('planners')}}" class="header_links">Planner</a></div>
                <div class="item"><a class="{{ Request::is('blog') ? 'active' : '' }}" href="{{route('blog')}}" class="header_links">Blog</a></div>
                <div class="item"><a class="{{ Request::is('events') ? 'active' : '' }}" href="{{route('events')}}" class="header_links">Events</a></div>
                <div class="item"><a class="{{ Request::is('signin') ? 'active' : '' }}" href="{{route('signin')}}" class="header_links" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Sign In</a></div>
                <div class="item"><a class="{{ Request::is('signup') ? 'active' : '' }}" href="{{route('signup')}}" class="header_links">Sign Up</a></div>
                <!-- <div class="item"><a href="register.html" class="header_links"><button
                            class="reg-btn">Register</button></a></div> -->
            </div>
        </div>
    </header>

    <!-- ==============================================HEADER CLOSED========================================= -->
    <!-- ==============================================BANNER  OPEN============================================== -->

 @yield('content')

<section class="mt-5 footer">
    <div class="container">
            <div class="footer-logo">
                <div class="position-relative footer-border d-flex pt-4">
                    <div class="footer-img"  style="background:  url('{{ asset('storage/uploads/logo/'.$logo_main->image)}}') no-repeat">
                        <!-- <img src="./assets/images/SVG/logo.svg" alt=""> -->
                    </div>
                </div>
            </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-md-12">
                    <ul class="footer-link ">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('wedding')}}">Weddings</a></li>
                        <li><a href="{{route('engagement')}}">Engagements</a></li>
                        <li><a href="{{route('popular_vendors')}}">Vendors</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 col-md-12">
                    <ul class="footer-link ">
                        <li><a href="{{route('planners')}}">Planner</a></li>
                        <li><a href="{{route('blog')}}">Blog</a></li>
                        <li><a href="{{route('events')}}">Events</a></li>
                        <li><a href="{{route('register')}}">Vendors Register</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <p class="footer-para">social links</p>
                    <div class="d-flex footer-icon">
                        <div class="icons-div">
                            <span><a href="{{$facebook[0]->social_media ?? ''}}" target="_blank"><i
                                        class="fa-brands fa-facebook-square"></i></a></span>
                        </div>
                        <div class="icons-div">
                            <span><a href="{{$instagram[0]->social_media ?? ''}}" target="_blank"><i
                                        class="fa-brands fa-instagram"></i></a></span>
                        </div>
                        <div class="icons-div">
                            <span><a href="{{$twitter[0]->social_media ?? ''}}" target="_blank">
                                    <i class="fa-brands fa-twitter"></i></li></a></span>
                        </div>
                        <div class="icons-div">
                            <span><a href="{{$youtube[0]->social_media ?? ''}}" target="_blank">
                                    <i class="fa-brands fa-youtube"></i></li></a></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-12 col-sm-12 ">
                    <p class="footer-para">Join Our Mailing List</p>
                    <form class="form theme-form register" id="regiterForm" action="{{ route("user_subcription") }}"  method="post">
                        @csrf
                        <input class="form-control"  type="email" name="email" placeholder="Email Address">

                        <div class="reg-div"><a href="javascript:void(0)"><button
                                    class="footer-btn" onClick="validateFm();">Subscribe</button></a></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="footer-logo">
            <div class="position-relative therapy-border d-flex pt-4">

                <div class="footer-img-bottom position-relative">

                </div>

            </div>
        </div>


        <div class="container footer-other-links">
            <div class="row">
                <div class="col-lg-12">
                    <ul class=" other-links ">
                        <li><a href="{{route('terms-conditions')}}" class="pr-2">Terms & Condition</a>
                        </li>
                        <li><a href="{{route('privacy-policy')}}">Privacy Policy</a>
                        </li>
                        <li><a href="{{route('about-us')}}">About Us</a>
                        </li>
                        <li><a href="{{route('contact-us')}}">Contact Us</a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>

    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center ">
                        <span class="for-theme-link pt-1" style="color:white">
                          {{$copyright->configuration}} DESIGNED AND DEVELOPED BY<a href="https://designprosusa.com/" target="_blank"> DESIGN PRO USA </a>
                        </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==============================================FOOTER CLOSED============================================== -->
<!-- ----Butter /Div -->
</div>
<!-- ====================================================Modal====================================================== -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
data-target=".bd-example-modal-lg">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div>
            <h1 class="forget-password-text pt-5 text-center">Sign In</h1>
        </div>
        <div class="modal-body signin-section">
            <form action="{{route('user-signin')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <input class="Artical-input" name="email" type="email" placeholder="Name/Email Address">
                </div>
                <div class="mb-4">
                    <input class="Artical-input" name="password" type="password" placeholder="Password">
                </div>
                <div class="mb-4">
                    <a href="{{route('forget-password')}}" class="a">
                        <p class="forget-password-para">Forget Password?</p>
                    </a>
                </div>
                <div class="mb-4 text-center">
                    <button type="submit" class="change-pwd">Sign In</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
    </div>
</div>
</div>




 <!-- ====Jquery JS ==== -->
 <script src="{{asset('website/js/jquery.min.js')}}"> </script>
 <!-- ===Boostrap Bundle JS ====-->
 <script src="{{asset('website/js/bootstrap.bundle.min.js')}}"> </script>
 <!-- swiper slider js -->
 <script src="{{asset('website/js/swiper-bundle.min.js')}}"></script>
 <!-- Butter JS -->
 <script src="{{asset('website/js/butter.js')}}"></script>
 <!--WOW JS   -->
 <script src="{{asset('website/js/wow.js')}}"></script>
 <!-- Custom Js -->
 <script src="{{asset('website/js/main.js')}}"></script>
 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
function validateFm(){
  $(".register").validate({

  rules: {
    email: {
    required: true,
    email: true
    // fadeOut();
    }

}
  });
  $("#regiterForm").submit(function() {
    $("#pageloader").fadeOut();
    });

}
</script>

</script>
<script type="text/javascript">
    $("#regiterForm").submit(function() {
    $("#pageloader").fadeIn();

    });
</script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
 </script>

 <script>
     @if(Session::has('message'))
     var type = "{{ Session::get('alert-type','info') }}"
     switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
     }
     @endif
     </script>
</body>

</html>
