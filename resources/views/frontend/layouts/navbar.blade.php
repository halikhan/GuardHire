<?php
$logo_main = App\Models\LogoManager::where('title','logo')->first();
?>
<nav class="navbar" id="navbarHeader">
      <div class="container">
        <div class="logoImage">
          <a class="navbar-brand" href="{{ route('home') }}"
            ><img src="{{ (!empty($logo_main->image))?
                asset('storage/uploads/logo/'.$logo_main->image):asset('storage/uploads/No-image.jpg') }}" alt=""></a>
        </div>
        <div class="navMenu" id="navMenu">
            <ul class="navItem d-flex align-items-center">
              <li class="navLink" id="navLink">
                <a href="{{ route('home') }}" id="home" class="navLink">Home</a>
              </li>
              <li class="navLink" id="navLink">
                <a href="{{ route('how.it.works') }}" id="works" class="navLink">How It Works</a>
              </li>
                <!-- Common menu item for logged-in users -->
                <li class="navLink" id="navLink">
                    <a href="{{ route('site.blogs') }}" id="blog" class="navLink">Blog</a>
                </li>
              @guest
                <!-- Display these menu items for non-logged-in users -->

                <li class="navLink" id="navLink">
                    <a href="{{ route('browse.quotes') }}" id="quotes" class="navLink">Browse Requests</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="{{ route('browse.services') }}" id="services" class="navLink">Browse Services</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="{{ route('browse.companies') }}" id="company" class="navLink">Browse Companies</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="{{ route('frontend.signin') }}" id="signIn" class="navLink">Sign In</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="{{ route('frontend.signup') }}" id="signUp" class="navLink">Sign Up</a>
                  </li>
              @else
                <!-- Display these menu items for logged-in users -->
                @if (Auth::user()->type == '2')
                  <!-- Display these menu items for users with type '2' -->
                  <li class="navLink" id="navLink">
                    <a href="{{ route('browse.quotes') }}" id="quotes" class="navLink">Browse Requests</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="{{ route('our.packages') }}" id="quotes" class="navLink">Our Packages</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="{{ route('guard.dashboard') }}" id="signIn" class="navLink">Profile</a>
                  </li>

                @elseif (Auth::user()->type == '3')
                  <!-- Display these menu items for users with type '3' -->
                  <li class="navLink" id="navLink">
                    <a href="{{ route('browse.services') }}" id="services" class="navLink">Browse Services</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="{{ route('browse.companies') }}" id="company" class="navLink">Browse Companies</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="{{ route('client.dashboard') }}" id="signIn" class="navLink">Profile</a>
                  </li>

                @endif
                <!-- Logout menu item for all logged-in users -->
                {{-- <li class="navLink" id="navLink">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="navLink">Logout</button>
                  </form>
                </li> --}}

              @endguest

            </ul>
          </div>

        {{-- <div class="navMenu" id="navMenu">
          <ul class="navItem d-flex align-items-center">
            <li class="navLink" id="navLink">
              <a href="{{ route('home') }}" id="home" class="navLink">Home</a>
            </li>
            <li class="navLink" id="navLink">
              <a href="{{ route('how.it.works') }}" id="works" class="navLink">How It Works</a>
            </li>
            @if (Auth::check() && Auth::user()->type == '2')
            <li class="navLink" id="navLink">
                <a href="{{ route('browse.quotes') }}" id="quotes" class="navLink">Browse Requests</a>
            </li>
            <li class="navLink" id="navLink">
                <a href="{{ route('our.packages') }}" id="quotes" class="navLink">Our Packages</a>
            </li>
            @endif
            @if (Auth::check() && Auth::user()->type == '3')
            <li class="navLink" id="navLink">
              <a href="{{ route('browse.services') }}" id="services" class="navLink">Browse services</a>
            </li>
            <li class="navLink" id="navLink">
              <a href="{{ route('browse.companies') }}" id="company" class="navLink">Browse Companies</a>
            </li>
            @endif
            <li class="navLink" id="navLink">
              <a href="{{ route('site.blogs') }}" id="blog" class="navLink">Blog</a>
            </li>
            @if (Auth::check() && Auth::user()->type == '2')
            <li class="navLink" id="navLink">
                <a href="{{ route('guard.dashboard') }}" id="signIn" class="navLink">Profile</a>
            </li>
              @elseif (Auth::check() && Auth::user()->type == '3')
              <li class="navLink" id="navLink">
                <a href="{{ route('client.dashboard') }}" id="signIn" class="navLink">Profile</a>
            </li>
              @else
              <li class="navLink" id="navLink">
                <a href="{{ route('frontend.signin') }}" id="signIn" class="navLink">Sign In</a>
              </li>
              <li class="navLink" id="navLink">
                <a href="{{ route('frontend.signup') }}" id="signUp" class="navLink">Sign Up</a>
              </li>
              @endif
          </ul>
        </div> --}}
      </div>
    </nav>

    <div class="sideNavbar" id="navbarHeader">
      <div id="nav-icon1" class="sideBarButton">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="sideNavbarImage">
        <a class="navbar-brand" href="{{ route('home') }}"
          ><img src="{{ asset('frontend/assets/images/logo.png') }}"
        /></a>
      </div>
    </div>

    <div id="mySidenav" class="sidenav">
      <div class="navbarBrand">
        <a href="{{ route('home') }}"><img src="{{ (!empty($logo_main->image))?
            asset('storage/uploads/logo/'.$logo_main->image):asset('storage/uploads/No-image.jpg') }}" alt=""></a>
      </div>
      <a href="{{ route('home') }}" class="navLink">Home</a>
      <a href="{{ route('how.it.works') }}" class="navLink">How It Works</a>
      @if (Auth::check() && Auth::user()->type == '2')
      <a href="{{ route('browse.quotes') }}" class="navLink">Browse Requests</a>
      <a href="{{ route('our.packages') }}" id="quotes" class="navLink">Our Packages</a>
      @endif
      @if (Auth::check() && Auth::user()->type == '3')
      <a href="{{ route('browse.services') }}" class="navLink">Browse Listings</a>
      <a href="{{ route('browse.companies') }}" class="navLink">Browse Companies</a>
      @endif

      <a href="{{ route('site.blogs') }}" id="blog" class="navLink">Blogs</a>
      <a href="{{ route('frontend.signin') }}" class="navLink">Sign In</a>
      <a href="{{ route('frontend.signup') }}" class="navLink">Sign Up</a>
    </div>
