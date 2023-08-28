<!DOCTYPE html>
<html lang="en">

<!-- Start Head -->

<title>Guard Hire - Guard Dashboard</title>

<?php echo $__env->make('frontend.guard_dashboard.guard_layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- End Head -->

<body>


  <!-- Start Navbar -->

  <?php echo $__env->make('frontend.guard_dashboard.guard_layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <!-- End Navbar -->



  <!-- End Modal Edit Job -->

  <!-- Start Modal Add Client -->

  <?php echo $__env->yieldContent('guardcontent'); ?>

  <!-- End Modal Chat -->

  <?php echo $__env->make('frontend.guard_dashboard.guard_layouts.guard_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




</body>

</html>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/guard_dashboard/guard_layouts/guard_master.blade.php ENDPATH**/ ?>