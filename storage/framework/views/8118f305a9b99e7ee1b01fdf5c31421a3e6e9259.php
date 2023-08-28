<div class="row">
    <?php if(count($clientwishlists) == 0 && count($companyWishlists) == 0): ?>
    <div class="col-lg-12">
        <div class="profileName mb-4">
            <h3> no wishlist available</h3>
        </div>
    </div>
    <?php endif; ?>

    <?php if(count($clientwishlists) > 0): ?>
    <div class="profileName mb-4">
        <h3>Listing Wishlist</h3>
    </div>
        <?php $__empty_1 = true; $__currentLoopData = $clientwishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-lg-11 col-md-11 col-sm-12">
            <div class="wishlistDetailBox">
                <div class="wishlistDetail">
                    <div class="wishlistImage">
                        <img src="<?php echo e(!empty($wishlist->guard_job_details->image ?? '') ? asset('storage/uploads/cms/' . $wishlist->guard_job_details->image ?? '') : asset('storage/uploads/No-image.jpg')); ?>"
                            alt="">
                    </div>
                    <div class="wishlistName">
                        <h6><?php echo e($wishlist->guard_job_details->name ?? ''); ?> |  <?php echo e($wishlist->guard_job->companyname ?? 'no company found'); ?></h6>
                        <p>
                            <?php echo substr($wishlist->guard_job->description ?? 'no description found', 0, 170); ?>

                        </p>
                        <h6>$<?php echo e($wishlist->guard_job->per_hour_rate ?? '0.00'); ?></h6>
                    </div>
                </div>

                <div class="wishlistHireDelete">
                    <?php
                        $id = $wishlist->job_id;
                    ?>
                    
                    
                        <button class="hireNowBtn ListinghiredInfo" id="1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalChat" data-job-id="<?php echo e($wishlist->job_id ??''); ?>">
                            Hire Now
                        </button>
                    
                    
                    <a href="<?php echo e(route('client.wishlist.delete', $wishlist->id)); ?>" type="button" id="delete"> <button
                            class="deleteButton"><i class="fas fa-trash-alt"></i></button></a>
                    <?php
                        $id = $wishlist->id;
                    ?>

                    <a href="<?php echo e(url('/chatify', $id)); ?>" type="button"> <button class="deleteButton"><i
                                class="fas fa-comments"></i></button></a>

                </div>
            </div>
        </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profileName mb-4">
                            <h3> no wishlist available</h3>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
    <?php endif; ?>
            
    <?php if(count($companyWishlists) > 0): ?>
        <div class="profileName mb-4">
            <h3>Company Wishlist</h3>
        </div>
        <?php $__empty_1 = true; $__currentLoopData = $companyWishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-lg-11 col-md-11 col-sm-12">
            <div class="wishlistDetailBox">
                <div class="wishlistDetail">
                    <div class="wishlistImage">
                        <img src="<?php echo e(!empty($comp_data->guard_job_details->image ?? '') ? asset('storage/uploads/cms/' . $comp_data->guard_job_details->image ?? '') : asset('storage/uploads/No-image.jpg')); ?>"
                            alt="">
                    </div>
                    <div class="wishlistName">
                        <h6><?php echo e($comp_data->guard_job_details->companyname ?? 'Company Name Not Found'); ?></h6>
                        <p>
                            <?php echo substr($comp_data->guard_job_details->description ?? 'no description found', 0, 170); ?>

                        </p>
                        <h6>$<?php echo e($comp_data->guard_job_details->starting_rate ?? '0.00'); ?></h6>
                    </div>
                </div>
                <div class="wishlistHireDelete">

                        <button class="hireNowBtn companyhiredInfo" id="1" type="button" data-bs-toggle="modal" data-bs-target="#compnayModalChat" data-company-id="<?php echo e($comp_data->guard_id); ?>">
                            Hire Now
                        </button>

                    <a href="<?php echo e(route('compnay.wishlist.delete', $comp_data->id)); ?>" type="button" id="delete"> <button
                            class="deleteButton"><i class="fas fa-trash-alt"></i></button></a>
                    <?php
                        $id = $comp_data->id;
                    ?>
                    <a href="<?php echo e(url('/chatify', $id)); ?>" type="button"> <button class="deleteButton"><i
                                class="fas fa-comments"></i></button></a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="profileName mb-4">
                        <h3> no wishlist available</h3>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>

</div>







 

    <div class="modal fade" id="exampleModalChat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Chat Box</h1>
                    <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="profileField">
                                <div class="connectPhone">
                                    <h6>Connect With Call</h6>
                                    <a href="tel:<?php echo e($wishlist->guard_job_details->contact ?? ''); ?>" data-bs-dismiss="modal">
                                        <p><?php echo e($wishlist->guard_job_details->contact ?? ''); ?>

                                        </p>
                                    </a>
                                </div>
                                <div class="connectEmail">
                                    <h6>Connect With Email</h6>
                                    <a href="mailto:<?php echo e($wishlist->guard_job_details->email ?? ''); ?>" data-bs-dismiss="modal">
                                        <p><?php echo e($wishlist->guard_job_details->email ?? ''); ?></p>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="modal fade" id="compnayModalChat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Chat Box</h1>
                    <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="profileField">
                                <div class="connectPhone">
                                    <h6>Connect With Call</h6>
                                    <a href="tel:<?php echo e($comp_data->guard_job_details->contact ?? ''); ?>" data-bs-dismiss="modal">
                                        <p><?php echo e($comp_data->guard_job_details->contact ?? ''); ?>

                                        </p>
                                    </a>
                                </div>
                                <div class="connectEmail">
                                    <h6>Connect With Email</h6>
                                    <a href="mailto:<?php echo e($comp_data->guard_job_details->email ?? ''); ?>" data-bs-dismiss="modal">
                                        <p><?php echo e($comp_data->guard_job_details->email ?? ''); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".ListinghiredInfo").on("click", function() {
                console.log("Hire action executed successfully.");
                const listing_data_id = $(this).data("job-id");
                const csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "<?php echo e(route('listing.wishlist.hire')); ?>",
                    type: "POST",
                    data: {
                        _token: csrfToken,
                        listing_data_id: listing_data_id
                    },
                    success: function(response) {
                            toastr.success('Added to Hired Listing successfully!');
                            // console.log("Hire action executed successfully.");
                        },
                        error: function(xhr) {
                            console.error("Something went wronge!:", xhr.statusText);
                        }
                });
            });
        });
    </script>
<script>
    $(document).ready(function() {
        $(".companyhiredInfo").on("click", function() {
            console.log("Hire action executed successfully.");
            const comp_data_id = $(this).data("company-id");
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "<?php echo e(route('compnay.wishlist.hire')); ?>",
                type: "POST",
                data: {
                    _token: csrfToken,
                    comp_data_id: comp_data_id
                },
                success: function(response) {
                        toastr.success('Added to Hired Guard successfully!');
                        // console.log("Hire action executed successfully.");
                    },
                    error: function(xhr) {
                        console.error("Something went wronge!:", xhr.statusText);
                    }
            });
        });
    });
</script>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/client-wishlist.blade.php ENDPATH**/ ?>