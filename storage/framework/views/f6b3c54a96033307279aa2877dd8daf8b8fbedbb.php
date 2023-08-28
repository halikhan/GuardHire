<!DOCTYPE html>
<html lang="en">

<!-- Start Head -->

<title>Guard Hire - Client Dashboard</title>

<?php echo $__env->make('frontend.client_dashboard.client_layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- End Head -->

<body>


  <!-- Start Navbar -->

  <?php echo $__env->make('frontend.client_dashboard.client_layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <!-- Start Modal Add Client -->

  <?php echo $__env->yieldContent('clientcontent'); ?>

  <!-- End Modal Chat -->

  <?php echo $__env->make('frontend.client_dashboard.client_layouts.client_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



</body>

</html>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/client_layouts/client_master.blade.php ENDPATH**/ ?>