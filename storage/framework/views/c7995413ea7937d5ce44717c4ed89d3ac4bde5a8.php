<?php $__env->startSection('title', 'Project List'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/rating.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<style type="text/css">
     select.form-select {
    width: 150px;
}
.btnExcel {
    padding: 6px 10px !important;
    width: 80px;
    background-color: rgb(3, 50, 3) !important;

}
select.form-select {
    width: 145px;
    padding: 6px 10px !important;
}
form.formBox {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 5px;
}
</style>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Users</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Users </li>
    <li class="breadcrumb-item active">list </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-8">
                                <h5>Users list</h5>
                            </div>
                            <div class="col-md-4" align="right">
                                <a type="button" class="btn btn-primary for-font-color" href="<?php echo e(route('backend.user.create')); ?>">
                                    Add </a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-9">
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Featured</th>
                                        <th>Package</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $getCMS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($value->name); ?> <?php echo e($value->last_name); ?></td>
                                            <td><?php echo e($value->email); ?></td>
                                            <td>
                                                <?php if($value->type == 2): ?>
                                                    
                                                   <b>Guard</b>
                                                <?php else: ?>
                                                <b>Client</b>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($value->image != null): ?>
                                                    <img src="<?php echo e(asset('storage/uploads/cms/' . $value->image)); ?>" alt="image" style="width:40%">
                                                <?php else: ?>
                                                    <img src="<?php echo e((!empty($Value->image))?
                                                        asset('storage/uploads/cms/'.$Value->image):asset('storage/uploads/No-image.jpg')); ?>"
                                                        style="width:40%">
                                                <?php endif; ?>
                                            </td>
                                            <td><a href="<?php echo e(route('user_status', ['id' => $value->id])); ?>">
                                                <?php if($value->status == 1): ?>
                                                    <button id="" class="btn btn-primary btn-sm regiterForm"><i class="fa fa-thumbs-up"></i></button>
                                                <?php else: ?>
                                                    <button id="" class="btn btn-danger btn-sm regiterForm"><i class="fa fa-thumbs-down"></i></button>
                                                <?php endif; ?>
                                            </a>
                                        </td>
                                        <td><a href="<?php echo e(route('featured_user', ['id' => $value->id])); ?>">
                                            <?php if($value->featured_status == 1): ?>
                                                <button id="" class="btn btn-success btn-sm regiterForm"><i class="fa fa-shield" aria-hidden="true"></i></button>
                                            <?php else: ?>
                                                <button id="" class="btn btn-danger btn-sm regiterForm"><i class="fa fa-thumbs-down"></i></button>
                                            <?php endif; ?>
                                        </a>
                                        </td>
                                        <td>
                                            <?php if($value->type == 2): ?>
                                            <button class="btn btn-info btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title=""> <a href="<?php echo e(route('user_package_details_show', $value->id)); ?>">Details</a></button>
                                        <?php else: ?>
                                        <b>N/A</b>
                                        <?php endif; ?>
                                        </td>

                                            <td>
                                                <a  href="<?php echo e(route('user_destroy', $value->slug)); ?>" id="delete"><button class="btn btn-danger btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button></a>
                                                <a href="<?php echo e(route('user_edit', $value->slug)); ?>"><button class="btn btn-success btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button></a>
                                                <button class="btn btn-info btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title=""> <a href="<?php echo e(route('user_show', $value->id)); ?>">Show</a></button>
                                                
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
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
    <script>
        $(document).ready(function() {
                    $("#mailregister").click(function(){
                var datalist = $("#selectdatalist").val();
                if (!datalist) {
                    // alert('Type Your valid Email');
                    toastr.error('please select any list of users');
                    return false;
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(".regiterForm").on('click',function() {
        $("#pageloader").fadeIn();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/users/index.blade.php ENDPATH**/ ?>