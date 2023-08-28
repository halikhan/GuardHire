

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"  />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.js"></script>
<script src="<?php echo e(asset('frontend/clientassets/js/main.js')); ?>"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });

		$(function(){
			$(document).on('click','#delete',function(e){
				 e.preventDefault();
				 var link = $(this).attr("href");
				Swal.fire({
				title: 'Are you sure?',
				text: "To Delete this Data?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = link
					Swal.fire(
					'Deleted!',
					'Your file has been deleted.',
					'success'
					)
				}
				});
			});
		});
</script>


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
<script>
    <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error("<?php echo e($error); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</script>

<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/client_layouts/client_scripts.blade.php ENDPATH**/ ?>