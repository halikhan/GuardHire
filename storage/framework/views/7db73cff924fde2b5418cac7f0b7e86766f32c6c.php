<?php $__env->startSection('title', 'Group Security'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Start Header -->
    <!-- Start Header -->

    <header class="browseSecurityHeaderImage"
        style="background-image: url('<?php echo e(!empty($banners->image) ? asset('storage/uploads/cms/' . $banners->image) : asset('storage/uploads/No-gallery.jpg')); ?>')">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="browseSecurityHeaderHeading">
                        
                        
                        <h2><?php echo e($getGuardBrowseServices->guard_service->service ??''); ?></h2>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <!-- End Header -->

    <!-- Start Group Security -->

    <section class="groupSecurity">
        

        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <div class="groupSecurityImageOne">
                        <img src="<?php echo e((!empty($getGuardBrowseServices->guard_job_details->image)) ? asset('storage/uploads/cms/'. $getGuardBrowseServices->guard_job_details->image):asset('storage/uploads/No-image.jpg')); ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                    <div class="groupSecurityDetails">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="groupSecurityDetailHeading">
                                    <h4><?php echo e($getGuardBrowseServices->guard_service->service ??''); ?></h4>
                                    <h6>Starting From:</h6>
                                    <h5>$<?php echo e($getGuardBrowseServices->per_hour_rate ??'0.00'); ?>/hour</h5>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="groupSecurityDetailButton">
                                    <div class="groupSecurityRating">
                                        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                                        <a href="javascript:void(0)" type="button" onclick="saveToWishlist(<?php echo e($getGuardBrowseServices->id); ?>)">
                                            <div class="listIcon">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                            </div>
                                            <h6>Save</h6>
                                        </a>
                                        
                                    </div>
                                    <div class="securityRating">
                                        <a href="#">
                                            
                                            <h6><?php echo e($getGuardBrowseServices->guard_job_details->name ??''); ?> | <?php echo e($getGuardBrowseServices->guard_job_details->email ??''); ?></h6>
                                            
                                        </a>
                                    </div>
                                    <h6>
                                        <?php
                                        $id = $getGuardBrowseServices->user_id;
                                    ?>
                                    <a href="<?php echo e(url('/chatify',$id)); ?>"><button class="hireBtn">Contact Now</button></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $getGuardPortfolioImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolioImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="groupSecurityImageTwo">
                                <img src="<?php echo e((!empty($portfolioImage->image)) ? asset('storage/uploads/cms/'. $portfolioImage->image):asset('storage/uploads/No-image.jpg')); ?>" alt="">
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
                    <div class="groupSecurityText">
                        <p><?php echo $getGuardBrowseServices->guard_job_details->description ??''; ?></p>
                        
                    </div>
                </div>
            </div>

        </div>
        
    </section>

    <!-- End Group Security -->

    <!-- Start Feature Security -->

    

    <!-- End Feature Security -->

    <!-- End Portfolio -->

    <script type="text/javascript">
        function saveToWishlist(wishlist_id){
           let id = wishlist_id;
           console.log(wishlist_id);
             $.ajax({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url:"<?php echo e(route('wishlist.job.save')); ?>",
               method:"POST",
               data:{
                   id:id,
               },
               success: function(data) {
            //    console.log(data);
                    if(data.status == 400){
                    toastr.success('User added to wishlist successfully!');
                } else {
                    toastr.error(err.message);
                }
           }
           });
       }

       </script>
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
           <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

           
           <script>
               $(document).ready(function() {
                   <?php if(session('notification')): ?>
                       var notification = <?php echo json_encode(session('notification')); ?>;
                       toastr.options = {
                           "closeButton": true,
                           "progressBar": true,
                           "positionClass": "toast-top-right"
                       };

                       toastr[notification['alert-type']](notification['message']);
                   <?php endif; ?>
               });
           </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/group-security.blade.php ENDPATH**/ ?>