<script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
<!-- Bootstrap js-->
<script src="<?php echo e(asset('assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
<!-- feather icon js-->
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather-icon.js')); ?>"></script>
<!-- scrollbar js-->
<!-- Sidebar jquery-->
<script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>
<!-- Plugins JS start-->
<?php echo $__env->yieldContent('script'); ?>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
</script>
<script>
    <?php if(Session::has('message')): ?>
    var type = "<?php echo e(Session::get('alert-type','info')); ?>"
    switch(type){
       case 'info':
       toastr.info(" <?php echo e(Session::get('message')); ?> ");
       break;
       case 'success':
       toastr.success(" <?php echo e(Session::get('message')); ?> ");
       break;
       case 'warning':
       toastr.warning(" <?php echo e(Session::get('message')); ?> ");
       break;
       case 'error':
       toastr.error(" <?php echo e(Session::get('message')); ?> ");
       break;
    }
    <?php endif; ?>
    </script>
      <?php if($errors->any()): ?>

      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <script>
          toastr.error('<?php echo e($error); ?>');
      </script>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
<!-- Plugin used-->
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/layouts/authentication/script.blade.php ENDPATH**/ ?>