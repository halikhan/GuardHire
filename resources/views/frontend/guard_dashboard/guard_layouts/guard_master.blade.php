<!DOCTYPE html>
<html lang="en">

<!-- Start Head -->

<title>Guard Hire - Guard Dashboard</title>

@include('frontend.guard_dashboard.guard_layouts.head')

<!-- End Head -->

<body>


  <!-- Start Navbar -->

  @include('frontend.guard_dashboard.guard_layouts.navbar')


  <!-- End Navbar -->



  <!-- End Modal Edit Job -->

  <!-- Start Modal Add Client -->

  @yield('guardcontent')

  <!-- End Modal Chat -->

  @include('frontend.guard_dashboard.guard_layouts.guard_scripts')




</body>

</html>
