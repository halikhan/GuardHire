<?php $__env->startSection('title', 'Project List'); ?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/dropzone.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Package</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Package </li>
    <li class="breadcrumb-item active">links</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Create</h5>
                    </div>
                    
                    <form class="form theme-form"id="" action="<?php echo e(route('stripePackages_store')); ?>"
                        enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Plan Name.*</label>
                                        <input name="name" class="form-control btn-square" value="<?php echo e(old('name')); ?>"
                                            id="exampleFormControlInput10" type="text" placeholder="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Price.*</label>
                                        <input name="price" class="form-control btn-square" id="exampleFormControlInput10"
                                            type="number" value="<?php echo e(old('price')); ?>" maxlength="2" placeholder="price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Currency.*</label>
                                        <input name="currency" value="usd" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Interval Count.*</label>
                                        <input name="intervalCount" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="number" placeholder="Interval Count">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Billing Period.*</label>
                                        
                                        
                                        <select name="billing_Period" value="<?php echo e(old('billing_Period')); ?>"
                                            class="form-control" style="width:200px;">
                                            <option disabled selected>Select Plan</option>
                                            <option value="week">Weekly</option>
                                            <option value="month">Monthly</option>
                                            <option value="year">Yearly</option>
                                            <option value="day">Day</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/rating/jquery.barrating.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/rating/rating-script.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ecommerce.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/product-list-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/stripePackages/create.blade.php ENDPATH**/ ?>