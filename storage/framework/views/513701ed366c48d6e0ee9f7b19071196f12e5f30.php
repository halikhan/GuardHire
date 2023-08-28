<?php $__env->startSection('title', 'Browse Quotes'); ?>
<?php $__env->startSection('content'); ?>

    <style>
        .featuredCard:hover {
            transform: scale(1);
        }

        .featuredTopImage h2 {
            top: 20%;
            font-size: 28px;
        }
    </style>



    <header class="howItWorksHeaderImage"
        style="background-image: url('<?php echo e(!empty($banners->image) ? asset('storage/uploads/cms/' . $banners->image) : asset('storage/uploads/No-gallery.jpg')); ?>')">
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success')); ?>

            </div>
        <?php endif; ?>

        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="browseServiceHeaderHeading">
                            <h2><?php echo e($sectionBrowseQuotes->title); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- End Header -->

    <!-- Start Search Form -->
    <section class="searchFormBox">
        <?php echo $__env->make('frontend.searchbox', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
    <!-- End Search Form -->


    <!-- Start Browse Quotes -->

    <section class="browseServices">
        <div class="container">
            <div class="row">

                
                <div class="col-lg-3 col-md-12">

                    <?php echo $__env->make('frontend.apply-browes-quotes-filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
                

                

                <div class="col-lg-9">
                    

                    

                    <?php $__currentLoopData = $getClientJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row browseServiceCard">
                            <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                                <div class="groupSecurityImage">
                                    <img src="<?php echo e(!empty($value->get_user_images[0]['image'] ?? '') ? asset('storage/uploads/cms/' . $value->get_user_images[0]['image'] ?? '') : asset('storage/uploads/No-image.jpg')); ?>"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                                <div class="groupSecurityDetail">
                                    <h2><?php echo e($value->client_postjob_details->name ?? 'N/A'); ?> | <?php echo e($value->get_guardtype->name ?? 'N/A'); ?></h2>
                                    <p><?php echo substr($value->description ?? 'No Description Found', 0, 300); ?> ...</p>
                                    <div class="row">
                                        <div class="securityRatingDetail">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="securityStarting">
                                                    <h6>Starting Date:</h6>
                                                    <h6>Budget:</h6>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="securityRating securityStartingRating">

                                                        
                                                        
                                                        <a href="#">
                                                            <h6><?php echo e($value->starting_date ?? 'N/A'); ?></h6>
                                                        </a>
                                                        <a href="#">
                                                            <h6>$<?php echo e($value->per_hour_rate ?? '0.00'); ?></h6>
                                                        </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">

                                                <?php
                                                    $hasValidGuardCreditPts = false;
                                                    foreach ($value->guard_credit_pts as $guard_credit_pt) {
                                                        if ($value->id == $guard_credit_pt['client_job_id'] && Auth::check() && Auth::id() == $guard_credit_pt['guard_id']) {
                                                            $hasValidGuardCreditPts = true;
                                                            break;
                                                        }
                                                    }
                                                ?>

                                                <?php if($hasValidGuardCreditPts): ?>
                                                    <div class="hireNow">
                                                        <a href="<?php echo e(route('body.guard.event', $value->id)); ?>">
                                                            <button class="hireNowButton">Hired</button>
                                                        </a>
                                                    </div>
                                                <?php elseif($final_remain_points < 5 && Auth::check()): ?>
                                                    <div class="hireNow">
                                                        <a href="#" onclick="get_client_job_id('<?php echo e($value->id); ?>')"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <button class="hireNowButton">Hire Now</button>
                                                        </a>
                                                    </div>
                                                <?php elseif(Auth::check()): ?>
                                                    <div class="hireNow">
                                                        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                                                        <a href="#" onclick="confirmCreditJob('<?php echo e($value->id); ?>')">
                                                            <button class="hireNowButton">Hire Now</button>
                                                        </a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="hireNow">
                                                        <a href="<?php echo e(route('frontend.signin')); ?>">
                                                            <button class="hireNowButton">Login To Hire</button>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tags">
                                        <div class="row">
                                            <?php if($value->get_client_tags->count() > 0): ?>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tagsHeading">
                                                        <h6>Tags:</h6>
                                                    </div>
                                                </div>
                                                <?php $__currentLoopData = $value->get_client_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-lg-3 col-md-3 line">
                                                        <div class="armedHeading">
                                                            <h6><?php echo e($value_tags->client_tags_details->name); ?></h6>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tagsHeading">
                                                        <h6>No tags found.</h6>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="tags">
                                        <div class="row">
                                            <?php if($value->get_user_languages->count() > 0): ?>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tagsHeading">
                                                        <h6>Languages:</h6>
                                                    </div>
                                                </div>
                                                <?php $__currentLoopData = $value->get_user_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-lg-3 col-md-3 line">
                                                        <div class="armedHeading">
                                                            <h6><?php echo e($value_language->user_Language_details->name ??'N/A'); ?></h6>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tagsHeading">
                                                        <h6>No language found.</h6>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
        </div>
    </section>


    <!-- Start Browse Quotes -->

    <!-- Start Modal -->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Guard Hire Pricing Credit System</h1>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        
                        <?php $__currentLoopData = $getPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key == 3): ?>
                            <?php break; ?>
                        <?php endif; ?>
                        <div class="col-lg-4 col-md-4 col-sm-4" data-wow-duration="1.2s">

                            <div class="featuredCard mb-4">
                                <div class="featuredTopImage">
                                    <img src="<?php echo e(asset('frontend/assets/images/featuredImageOne.png')); ?>"
                                        alt="">
                                    <h2><?php echo e($value->title); ?> $<?php echo e($value->amount); ?></h2>
                                </div>
                                <div class="featuredDetail">
                                    <div class="featuredProperty">
                                        <h5><?php echo e($value->title); ?></h5>
                                        <p><?php echo e($value->type); ?> Credits /$ <?php echo e($value->amount); ?></p>
                                    </div>
                                    <div class="featuredBudget">
                                        <h5>Create Profile Listing:</h5>
                                        
                                        <p>Free/ $00.00</p>
                                    </div>
                                    <div class="featuredDuration">
                                        <h5>Create Service Listings:</h5>
                                        <p><?php echo e($value->mid_details); ?> pts/listing</p>

                                    </div>
                                    <div class="featuredExpiry">
                                        <h5>Message New Customers:</h5>
                                        <p><?php echo e($value->deatails); ?> pts/Customer</p>
                                        
                                    </div>
                                </div>
                                <div class="featuredButtom">
                                    <?php if(Auth::check()): ?>
                                        <a href="<?php echo e(route('stripe.payment.page', $value->slug)); ?>"
                                            onclick="get_package('<?php echo e($value->id); ?>')">
                                            <button class="exploreButton">Select</button></a>
                                    <?php else: ?>
                                        <a href="#" onclick="get_package('<?php echo e($value->id); ?>')"
                                            id="pkg_not_selected">
                                            <button class="exploreButton">Select</button></a>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <br>

                    
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="exploreButton" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function confirmCreditJob(creditJobId) {
        swal({
            title: 'Confirmation',
            text: 'Are you sure you want to proceed? It will charge 5pts',
            icon: 'warning',
            buttons: ['Cancel', 'Proceed'],
        }).then((proceed) => {
            if (proceed) {
                getCredit_and_client_job_id(creditJobId);
            }
        });
    }


    function getCredit_and_client_job_id(credit_job_id) {
        // console.log(credit_job_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "<?php echo e(route('credit_client_job_details')); ?>",
            data: {
                'id': credit_job_id
            },
            success: function(response) {
                if (response.status === 200) {
                    toastr.success('You have Successfully connected!', 'Success');
                    window.location.href = response.redirect;
                    // setTimeout(function() {
                    // }, 3000);
                }
            }
        });
    }
</script>



<!-- End Modal -->
<script>
    function get_client_job_id(clientjob_id) {
        // console.log(clientjob_id);
        $.ajax({
            type: 'get',
            url: "<?php echo e(route('get_client_job_page')); ?>",
            data: {
                'id': clientjob_id
            },
            success: function(response) {
                if (response.status == 200) {
                    toastr.info('please buy a package first', 'Info');
                    // $("#payment_redirect").attr("href","<?php echo e(route('pay_amount')); ?>");
                }
            }
        });
    }
</script>

<script>
    function get_package(package_id) {
        $.ajax({
            type: 'get',
            url: "<?php echo e(route('payment')); ?>",
            data: {
                'id': package_id
            },
            success: function(response) {
                if (response.status == 200) {
                    toastr.success('Package (' + response.title + ' ' + response.amount +
                        ') has been selected, successfully!', 'success');
                    // $("#payment_redirect").attr("href","<?php echo e(route('pay_amount')); ?>");

                }
            },
        });
    }
    if (!$("#pkg_not_selected").attr("href")) {
        toastr.info('Please Select any Package first');
    }
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/browse-quotes.blade.php ENDPATH**/ ?>