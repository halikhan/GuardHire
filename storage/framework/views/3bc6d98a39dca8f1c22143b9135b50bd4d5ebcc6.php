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

        .card-top-heading {
            height: 200px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-image: linear-gradient(180deg, #00264d, #00264d, #000000eb);
            margin-bottom: 1rem;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        }

        .card-top-heading .braek-line {
            background-color: #ffffff4d;
            height: 1px;
            width: 80%;
            margin: 6px auto;
        }

        .card-top-heading h2 {
            font-family: GilroyBold;
            color: #fff;
            text-transform: capitalize;
            margin-bottom: 0px;
        }

        .box-width {
            width: 100%;
        }
    </style>


    <section class="category">
        <div class="container">
            <div class="catetoryHeading mTop">
                <br>
                <span class="strokeText"> <?php echo e($sectionBrowseQuotes->title); ?></span>
                <h3> <?php echo e($sectionBrowseQuotes->title); ?></h3>
            </div>
        </div>
    </section>
    <!-- End Header -->

    <!-- Start Search Form -->
    
    <!-- End Search Form -->


    <!-- Start Browse Quotes -->

    <section class="browseServices">
        <div class="container">
            <div class="row widthTop">
                <?php $__currentLoopData = $getPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key == 3): ?>
                    <?php break; ?>
                <?php endif; ?>
                <div class="col-lg-4 col-md-4 col-sm-4" data-wow-duration="1.2s">

                    <div class="featuredCard mb-4">
                        
                        <div class="card-top-heading">
                            <div class="box-width">
                                <h2><?php echo e($value->title); ?></h2>
                                <div class="braek-line"></div>
                                <h2>$<?php echo e($value->amount); ?></h2>
                            </div>
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
                                <a href="#" onclick="get_package('<?php echo e($value->id); ?>')" id="pkg_not_selected">
                                    <button class="exploreButton">Login to Select</button></a>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/our-packages.blade.php ENDPATH**/ ?>