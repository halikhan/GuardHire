<!DOCTYPE html>
<html lang="en">

<!-- Start Head -->
  <title>Guard Hire | <?php echo $__env->yieldContent('title'); ?></title>
  <?php echo $__env->make('frontend.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- End Head -->

  <body>
    <!-- Start Navbar -->
    <?php echo $__env->make('frontend.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Navbar -->

 <!-- Start Home Page Body -->

    <?php echo $__env->yieldContent('content'); ?>

 <!-- End Home -->

  <!-- Start Footer -->

  <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- End Footer -->
 <!-- Start scripts -->

 <?php echo $__env->make('frontend.layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <!-- End scripts -->


</body>
</html>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>