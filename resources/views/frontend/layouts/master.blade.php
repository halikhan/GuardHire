<!DOCTYPE html>
<html lang="en">

<!-- Start Head -->
  <title>Guard Hire | @yield('title')</title>
  @include('frontend.layouts.head')

    <!-- End Head -->

  <body>
    <!-- Start Navbar -->
    @include('frontend.layouts.navbar')
    <!-- End Navbar -->

 <!-- Start Home Page Body -->

    @yield('content')

 <!-- End Home -->

  <!-- Start Footer -->

  @include('frontend.layouts.footer')

  <!-- End Footer -->
 <!-- Start scripts -->

 @include('frontend.layouts.scripts')

 <!-- End scripts -->


</body>
</html>
