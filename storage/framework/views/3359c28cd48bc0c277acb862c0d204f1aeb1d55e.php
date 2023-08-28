<?php $__env->startSection('title', 'Browse Companies'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Start Header -->
    <link type="text/css" rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <header class="howItWorksHeaderImage"
        style="background-image: url('<?php echo e(!empty($banners->image) ? asset('storage/uploads/cms/' . $banners->image) : asset('storage/uploads/No-gallery.jpg')); ?>')">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="browseCompaniesHeaderHeading">
                            <h2><?php echo e($sectionBrowseCompanies->title); ?></h2>
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


    <!-- Start Browse Companies -->
    <section class="browseServices">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-3 col-md-12">

                    <?php echo $__env->make('frontend.apply-browes-compnaies-filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                

                <div class="col-lg-9">
                    
                    <?php $__currentLoopData = $getBrowseCompanies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row browseServiceCard">
                            <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                                <div class="groupSecurityImage">
                                    <img src="<?php echo e(!empty($value->image) ? asset('storage/uploads/cms/' . $value->image) : asset('storage/uploads/No-image.jpg')); ?>"
                                        alt="">
                                </div>
                            </div>
                            
                            <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                                <div class="groupSecurityDetail">
                                    <h2><?php echo e($value->companyname ?? 'Company Name Not Found'); ?> | <?php echo e($value->license_no ?? 'N/A'); ?></h2>
                                    <p><b><?php echo e($value->slogan ?? 'Slogan Not Found'); ?> |  <?php echo e($value->guard_location->location ?? 'N/A'); ?></b></p>

                                    <p><?php echo isset($value->description) && strlen($value->description) > 0
                                        ? substr($value->description, 0, 300) . ' ...'
                                        : 'Description Not Available'; ?></p>
                                    <div class="row">
                                        <div class="securityRatingDetail">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="securityStarting">
                                                    
                                                    <a style="color:black">
                                                        <h6>Budget $<?php echo e($value->starting_rate ?? '0.00'); ?></h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="securityRating securityStartingRating">
                                                    <a href="#">
                                                        <div class="starIcon">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>
                                                        <?php if($value->guard_ratings->isEmpty()): ?>
                                                            <h6>0.0/5
                                                                
                                                            </h6>
                                                        <?php else: ?>
                                                            <?php
                                                            $totalRatings = $value->guard_ratings->count();
                                                            $averageRating = $value->guard_ratings->avg('rate');
                                                            ?>
                                                            <h6><?php echo e(number_format($averageRating, 1)); ?>/5
                                                                
                                                            </h6>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="hireNow">
                                                    <?php if(Auth::check()): ?>
                                                        <?php
                                                            $clientHiredCompany = App\Models\ClientHiredCompany::where('client_id', Auth::id())
                                                                ->where('company_id', $value->id)
                                                                ->first();
                                                        ?>
                                                        <?php if($clientHiredCompany): ?>
                                                            <a href="<?php echo e(route('company', $value->id)); ?>"><button
                                                                    class="hireNowButton">Hired</button></a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('company', $value->id)); ?>"><button
                                                                    class="hireNowButton">Hire Now</button></a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('frontend.signin')); ?>"><button
                                                                class="hireNowButton">Login to Hire</button></a>
                                                    <?php endif; ?>


                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="securityRatings securityBrowseRating">
                                        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                                        <a href="javascript:void(0)" type="button"
                                            onclick="saveToWishlist(<?php echo e($value->id); ?>)">
                                            <div class="listIcon">
                                                <?php
                                                    $wishlistListingService = App\Models\CompanyWishlist::where([
                                                        'user_id' => Auth::id(),
                                                        'guard_id' => $value->id,
                                                    ])->first();
                                                    // dd($wishlistListingService);
                                                ?>
                                                <?php if($wishlistListingService): ?>
                                                    <div class="listIcon">
                                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                                    </div>
                                                    <h6><?php echo e($value->isInWishlist ? 'Save' : 'Remove'); ?></h6>
                                                <?php else: ?>
                                                    <div class="listIcon">
                                                        <i id="wishlistIcon-<?php echo e($value->id); ?>"
                                                            class="fa fa-heart<?php echo e($value->isInWishlist ? '' : '-o'); ?>"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                    <h6><?php echo e($value->isInWishlist ? 'Remove' : 'Save'); ?></h6>
                                                <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="tags">
                                        <div class="row">
                                            <?php if($value->get_guard_tags->count() > 0): ?>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tagsHeading">
                                                        <h6>Tags:</h6>
                                                    </div>
                                                </div>
                                                <?php $__currentLoopData = $value->get_guard_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guard_tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-lg-3 col-md-3 line">
                                                        <div class="armedHeading">
                                                            <h6><?php echo e($guard_tags->guard_tags_details->name ?? ''); ?></h6>
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
                                </div>
                            </div>
                        </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="categoryButton wow animate__ animate__fadeInUp animated" data-wow-duration="1.4s"
            style="visibility: visible; animation-duration: 1.4s; animation-name: fadeInUp;">
            <a href="#"><button class="exploreButton">Load More</button></a>
        </div>
        </div>
    </section>


    <!-- Start Browse Companies -->

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
                        
                        <?php $__currentLoopData = $getPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-4 col-sm-4" data-wow-duration="1.2s">

                                <div class="featuredCard">
                                    <div class="featuredTopImage">
                                        <img src="<?php echo e(asset('frontend/assets/images/featuredImageOne.png')); ?>"
                                            alt="">
                                        <h2><?php echo e($value->title); ?> $<?php echo e($value->amount); ?></h2>
                                    </div>
                                    <div class="featuredDetail">
                                        <div class="featuredProperty">
                                            <h5><?php echo e($value->title); ?></h5>
                                            <p><?php echo e($value->type); ?></p>
                                        </div>
                                        <div class="featuredBudget">
                                            <h5>Create Profile Listing:</h5>
                                            
                                            <p>Free/ $00.00</p>
                                        </div>
                                        <div class="featuredDuration">
                                            <h5>Create Service Listings:</h5>
                                            <p><?php echo e($value->deatails); ?></p>
                                        </div>
                                        <div class="featuredExpiry">
                                            <h5>Message New Customers:</h5>
                                            <p><?php echo e($value->mid_details); ?></p>
                                            
                                        </div>
                                    </div>
                                    <div class="featuredButtom">
                                        <a href="<?php echo e(route('stripe.payment.page', $value->slug)); ?>"
                                            onclick="get_package('<?php echo e($value->id); ?>')">
                                            <button class="exploreButton">Select</button></a>


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

    

    <!-- End Modal -->
    <!-- End Modal Rating -->
    <script type="text/javascript">
        function saveToWishlist(wishlist_id) {
            let id = wishlist_id;
            console.log(wishlist_id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "<?php echo e(route('wishlist.company.save')); ?>",
                method: "POST",
                data: {
                    id: id,
                },
                success: function(response) {
                    if (response.status === 'added') {
                        // Update heart icon to red filled heart
                        $('#wishlistIcon-' + wishlist_id).removeClass('fa-heart-o').addClass('fa-heart');
                        toastr.success('Item added to your wishlist!');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else if (response.status === 'removed') {
                        // Update heart icon to empty heart
                        $('#wishlistIcon-' + wishlist_id).removeClass('fa-heart').addClass('fa-heart-o');
                        toastr.info('Item removed from your wishlist!');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else if (response.status === 'already_added') {
                        toastr.info('This item is already in your wishlist!');
                    }
                },
                error: function(err) {
                    toastr.error('An error occurred while saving the job.');
                }
            });
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

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/browse-companies.blade.php ENDPATH**/ ?>