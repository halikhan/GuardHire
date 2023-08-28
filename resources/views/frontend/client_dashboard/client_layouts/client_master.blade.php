<!DOCTYPE html>
<html lang="en">

<!-- Start Head -->

<title>Guard Hire - Client Dashboard</title>

@include('frontend.client_dashboard.client_layouts.head')

<!-- End Head -->

<body>


  <!-- Start Navbar -->

  @include('frontend.client_dashboard.client_layouts.navbar')


  <!-- Start Modal Add Client -->

  @yield('clientcontent')

  <!-- End Modal Chat -->

  @include('frontend.client_dashboard.client_layouts.client_scripts')



</body>

</html>
