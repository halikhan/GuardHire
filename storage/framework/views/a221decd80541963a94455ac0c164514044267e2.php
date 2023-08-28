<?php $__env->startSection('title', 'Project List'); ?>
<?php $__env->startSection('title', 'Base Inputs'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/dropzone.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Banner</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Banner </li>
<li class="breadcrumb-item active">list</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit</h5>

            </div>
            
                <form class="form theme-form"id="" action="<?php echo e(route("testimonialUpdate",$edit_data->id)); ?>" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title.*</label>
                                <input name="title" value="<?php echo e($edit_data->title); ?>" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if($edit_data->image != null): ?>
                         <img src="<?php echo e(asset('storage/uploads/cms/' . $edit_data->image)); ?>" alt="image" style="width:120px; height:80px;">
                        <?php else: ?>
                        <img src="<?php echo e((!empty($edit_data->image))?
                            asset('storage/uploads/cms/'.$edit_data->image):asset('storage/uploads/No-image.jpg')); ?>" style="width:80px; height:80px;">
                        <?php endif; ?>
                     </div>
                        <div class="col-md-12">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Upload File</label>
                                <div class="col-sm-12">
                                    <input name="image" id="imagesupport" class="form-control" type="file">
                                </div>

                            </div>

                        </div>
                 </div>

                    

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                    
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script>
    $("#imagesupport").on("change", function() {
        var input = this;
        if (input.files && input.files[0]) {
            var type = input.files[0].type; // image/jpg, image/png, image/jpeg...
            // allow jpg, png, jpeg, bmp, gif, ico
            var type_reg = /^image\/(jpg|png|jpeg|bmp|gif|ico|webp)$/;
            if (type_reg.test(type)) {} else {
                toastr.error("You must select an image file only.")
                this.value = '';
            }
        }

        if (this.files[0].size > 3145728) {
            toastr.error("Please Upload file less than 3 Mb")
            $(this).val('');
        }
    });

</script>

<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dropzone/dropzone.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dropzone/dropzone-script.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/testimonial/edit.blade.php ENDPATH**/ ?>