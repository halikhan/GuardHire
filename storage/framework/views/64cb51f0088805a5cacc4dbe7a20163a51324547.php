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
<h3>Page</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Page </li>
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
            
                <form class="form theme-form"id="" action="<?php echo e(route("PageContent_update",$edit_data->id)); ?>" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">

                                 
                                 <input  name="page" readonly value="<?php echo e($edit_data->page); ?>" class="form-control btn-square" id="exampleFormControlInput10" type="hidden" placeholder="Title">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Section Name.*</label>
                                <input name="section_name" class="form-control btn-square" value="<?php echo e($edit_data->section_name); ?>" id="exampleFormControlInput10" type="text" placeholder="Section Name" readonly>
                                <input name="oldsection_name" value="<?php echo e($edit_data->section_name); ?>"  type="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Main Title </label>
                                <input name="title" value="<?php echo e($edit_data->title); ?>" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title" >
                                <input name="oldtitle" value="<?php echo e($edit_data->title); ?>"  type="hidden">
                            </div>
                        </div>
                    </div>
                    <?php if($edit_data->title1): ?>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 1</label>
                                <input name="title1" value="<?php echo e($edit_data->title1); ?>" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                <input name="oldtitle1" value="<?php echo e($edit_data->title1); ?>"  type="hidden">

                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($edit_data->title2): ?>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 2</label>
                                <input name="title2" value="<?php echo e($edit_data->title2); ?>" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                <input name="oldtitle2" value="<?php echo e($edit_data->title2); ?>"  type="hidden">

                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($edit_data->title3): ?>
                    
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 3</label>
                                <input name="title3" value="<?php echo e($edit_data->title3); ?>" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                <input name="oldtitle3" value="<?php echo e($edit_data->title3); ?>"  type="hidden">

                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($edit_data->title4): ?>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 4</label>
                                <input name="title4" value="<?php echo e($edit_data->title4); ?>" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                <input name="oldtitle4" value="<?php echo e($edit_data->title4); ?>"  type="hidden">


                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($edit_data->content): ?>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 mb-0">
                                <label for="exampleFormControlTextarea14">Enter Short Description</label>
                                <textarea value="" name="content" class="ckeditor form-control btn-square" id="exampleFormControlTextarea14" rows="3" ></textarea>
                                <input name="oldcontent" value="<?php echo e($edit_data->content); ?>" type="hidden">
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>


                </div>
                <div class="card-footer" id="submit">
                    <button class="btn btn-primary" name="submit" type="submit">Update</button>
                    
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>



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

<script>
    editor.on( 'required', function( evt ) {
        editor.showNotification( 'This field is required.', 'warning' );
        evt.cancel();
    } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/pagecontent/edit.blade.php ENDPATH**/ ?>