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
    <!--  -->
    <link rel="stylesheet" href="{{asset('website/css/choices.min.css')}}">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{asset('website/css/stylesheet.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"  />
    <title>@yield('title')</title>
</head>

<body>
    <!-- ==============================================HEADER OPEN=========================================== -->
    <header class="header" id="register-form">
        <div class="container">
            <nav class="destop-nav-bar">
                <div class="d-flex justify-content-around">
                    <div class="logo">
                        <a href="{{route('home')}}"> <img src="{{ (!empty($logo_add->image))?
                            asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}" alt="img"></a>
                    </div>
                    <div class="link">
                        <div class="d-flex justify-content-center">
                            <a href="{{route('home')}}" class="header_links text-white">Home</a>
                            <a href="{{route('wedding')}}" class="header_links text-white">Weddings</a>
                            <a href="{{route('engagement')}}" class="header_links text-white">Engagements</a>
                            <a href="{{route('popular_vendors')}}" class="header_links text-white">Vendors</a>
                            <a href="{{route('planners')}}" class="header_links text-white">Planner</a>
                            <a href="{{route('blog')}}" class="header_links text-white">Blog</a>
                            <a href="{{route('events')}}" class="header_links text-white">Events</a>

                                @if (Auth::check() && Auth::user()->type == 3)
                                <a  class="{{ Request::is('user-dashboard') ? 'active' : '' }} header_links text-white"   href="{{route('user-dashboard')}}">My Account</a>
                                <a  class="{{ Request::is('user-logout') ? 'active' : '' }} link_header text-white"   href="{{route('user-logout')}}" class="header_links text-white">Log
                                    Out</a>

                                @elseif (Auth::check() && Auth::user()->type == 2)
                                <a  class="{{ Request::is('vendor-dashboard') ? 'active' : '' }}header_links text-white"   href="{{route('vendor-dashboard')}}" >My Account</a>
                                <a  class="{{ Request::is('user-logout') ? 'active' : '' }} link_header text-white"   href="{{route('user-logout')}}" class="header_links text-white">Log
                                    Out</a>
                                    @else
                                    <a class="{{ Request::is('signin') ? 'active' : '' }} header_links text-white modal-dialog-centered" href="{{route('signin')}}"  data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Sign In</a>
                                        <a  class="{{ Request::is('signup') ? 'active' : '' }} header_links text-white"   href="{{route('signup')}}" >Sign Up</a>
                                    @endif

                            <!-- <a href="../pages/register.html"><button class="reg-btn">Register</button></a> -->
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- moblie navbar -->
        <div id="main-content">
            <div id="title"><a href="{{route('home')}}"><img src="{{asset('website/images/SVG/white-logo.svg')}}" alt=""></a></div>
        </div>
        <div id="btn" class="">
            <div id="top"></div>
            <div id="middle"></div>
            <div id="bottom"></div>
        </div>
        <div id="box" class="">
            <div id="items">
                <div class="imglogo"><a href="{{route('home')}}"><img src="{{asset('website/images/SVG/logo.svg')}}" alt=""></a></div>
                <div class="item"><a href="{{route('home')}}" class="header_links">Home</a></div>
                <div class="item"><a href="{{route('wedding')}}" class="header_links">Weddings</a></div>
                <div class="item"><a href="{{route('engagement')}}" class="header_links">Engagements</a></div>
                <div class="item"><a href="{{route('popular_vendors')}}" class="header_links">Vendors</a></div>
                <div class="item"><a href="{{route('planners')}}" class="header_links">Planner</a></div>
                <div class="item"><a href="{{route('blog')}}" class="header_links">Blog</a></div>
                <div class="item"><a href="{{route('events')}}" class="header_links">Events</a></div>
                <div class="item">
                @if (Auth::check() && Auth::user()->type == 3)
                <a  class="{{ Request::is('user-dashboard') ? 'active' : '' }} header_links"   href="{{route('user-dashboard')}}">My Account</a>
                <a  class="{{ Request::is('user-logout') ? 'active' : '' }} link_header"   href="{{route('user-logout')}}" class="header_links">Log
                    Out</a>

                @elseif (Auth::check() && Auth::user()->type == 2)
                <a  class="{{ Request::is('vendor-dashboard') ? 'active' : '' }}header_links"   href="{{route('vendor-dashboard')}}" >My Account</a>
                <a  class="{{ Request::is('user-logout') ? 'active' : '' }} header_links"   href="{{route('user-logout')}}" class="header_link">Log
                    Out</a>
                    @else
                    <a class="{{ Request::is('signin') ? 'active' : '' }} " href="{{route('signin')}}" class="header_links"  data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Sign In</a>
                </div>
                       <div class="item"> <a  class="{{ Request::is('signup') ? 'active' : '' }}"   href="{{route('signup')}}" class="header_links item">Sign Up</a>
                    @endif
                       </div>

                <!-- <div class="item"><a href="../pages/register.html" class="header_links"><button class="reg-btn">Register</button></a></div> -->
            </div>
        </div>
    </header>
    <!-- ==============================================HEADER CLOSED========================================= -->
    <!-- ==============================================SLIDER OPEN============================================== -->
   @yield('content')
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
    <!--  -->
    <script src="{{asset('website/js/choices.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('website/js/main.js')}}"></script>
    <script>
        $(document).ready(function () {

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 35,
                searchResultLimit: 35,
                renderChoiceLimit: 35
            });


        });
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
        @if($errors->any())

        @foreach($errors->all() as $error)
        <script>
            toastr.error('{{$error}}');
        </script>
        @endforeach
        @endif
</body>

</html>
