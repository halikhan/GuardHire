<?php $__env->startSection('title', 'Home'); ?>
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
    <!-- sec# 01 Start Header -->

    <div class="margin-top-100">
        <div class="home-tricker">
            <figure class="marquee marquee--beet" data-text=" <?php echo e($dummuText->configuration); ?> ">
                <span class="sr-only"> <?php echo e($dummuText->configuration); ?> </span>
            </figure>
        </div>
    </div>
    <header class="headerImage margin-top-zero"
        style="background-image: url('<?php echo e(!empty($banners->image) ? asset('storage/uploads/cms/' . $banners->image) : asset('storage/uploads/No-gallery.jpg')); ?>')">
        <div class="container">

            <div class="row">
                <div class="offset-xl-5 col-xl-6 offset-lg-1 col-lg-10 col-md-12 col-sm-12  wow animate__animated animate__bounceIn"
                    data-wow-duration="1.2s">
                    <div class="headerDetails">
                        <h3>
                            <?php echo e($section1->title); ?> <span><?php echo e($section1->title1); ?> </span>
                            <?php echo e($section1->title2); ?><?php echo e($section1->title3); ?>

                        </h3>
                        <p>
                            
                            <?php echo e($section1->title4); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- End Header -->

    <!--  Start Search Form -->

    <section class="searchForm">
        <?php echo $__env->make('frontend.searchbox', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <!-- End Search Form -->

    <!-- sec# 02 Start Category -->

    <section class="category">
        <div class="container">
            <div class="catetoryHeading">
                <span class="strokeText"> <?php echo e($section2->title); ?></span>
                <h3> <?php echo e($section2->title1); ?></h3>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
                    <?php if(Auth::check() && Auth::user()->type === 2): ?>
                        <a href="<?php echo e(route('browse.quotes')); ?>">
                        <?php elseif(Auth::check() && Auth::user()->type === 3): ?>
                            <a href="<?php echo e(route('browse.services')); ?>">
                            <?php else: ?>
                                <a href="<?php echo e(route('browse.services')); ?>">
                    <?php endif; ?>
                    <div class="categoryCard">
                        <div class="categoryCardImage">
                            <img src="<?php echo e(!empty($getArmedSecurity->image) ? asset('storage/uploads/cms/' . $getArmedSecurity->image) : asset('storage/uploads/No-image.jpg')); ?>"
                                alt="">
                            <div class="categoryName">
                                <h4><?php echo e($getArmedSecurity->title ?? 'No name found'); ?></h4>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
                    <?php if(Auth::check() && Auth::user()->type === 2): ?>
                        <a href="<?php echo e(route('browse.quotes')); ?>">
                        <?php elseif(Auth::check() && Auth::user()->type === 3): ?>
                            <a href="<?php echo e(route('browse.services')); ?>">
                            <?php else: ?>
                                <a href="<?php echo e(route('browse.services')); ?>">
                    <?php endif; ?>
                    <div class="categoryCard">
                        <div class="categoryCardImage">
                            <img src="<?php echo e(!empty($getGroupSecurity->image) ? asset('storage/uploads/cms/' . $getGroupSecurity->image) : asset('storage/uploads/No-image.jpg')); ?>"
                                alt="">
                            <div class="categoryName">
                                <h4><?php echo e($getGroupSecurity->title ?? 'No name found'); ?></h4>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
                    <?php if(Auth::check() && Auth::user()->type === 2): ?>
                        <a href="<?php echo e(route('browse.quotes')); ?>">
                        <?php elseif(Auth::check() && Auth::user()->type === 3): ?>
                            <a href="<?php echo e(route('browse.services')); ?>">
                            <?php else: ?>
                                <a href="<?php echo e(route('browse.services')); ?>">
                    <?php endif; ?>
                    <div class="categoryCard">
                        <div class="categoryCardImage">
                            <img src="<?php echo e(!empty($getUnarmedSecurity->image) ? asset('storage/uploads/cms/' . $getUnarmedSecurity->image) : asset('storage/uploads/No-image.jpg')); ?>"
                                alt="">
                            <div class="categoryName">
                                <h4><?php echo e($getUnarmedSecurity->title ?? 'No name found'); ?></h4>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>

            

            
            <!-- <div class="categoryButton">
                  <a href="#"><button class="contactButton">Contact Us</button></a>
                </div> -->
        </div>
    </section>

    <!-- End Category -->

    <!-- sec# 03 Start How It Works -->

    <section class="howItWorks">
        <div class="container">
            <div class="howItWorksHeading">
                <span class="strokeText"> <?php echo e($section3->title); ?></span>
                <h3> <?php echo e($section3->title1); ?></h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <a href="<?php echo e(route('how.it.works')); ?>">
                        <div class="howItWorksCard">
                            <div class="howItWorksCardIcon">
                                <img src="<?php echo e(asset('frontend/assets/images/howItWorksIconOne.svg')); ?>"alt="" />
                            </div>
                            <div class="howItWorksCardText">
                                <h6><?php echo e($section10->title); ?></h6>
                                <p><?php echo e($section10->title1); ?></p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.2s">
                    <a href="<?php echo e(route('how.it.works')); ?>">
                        <div class="howItWorksCard">
                            <div class="howItWorksCardIcon">
                                <img src="<?php echo e(asset('frontend/assets/images/howItWorksIconTwo.svg')); ?>"alt="" />
                            </div>
                            <div class="howItWorksCardText">
                                <h6><?php echo e($section10->title2); ?></h6>
                                <p><?php echo e($section10->title3); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-12 wow animate__animated animate__fadeInRight"
                    data-wow-duration="1.2s">
                    <a href="<?php echo e(route('how.it.works')); ?>">
                        <div class="howItWorksCard">
                            <div class="howItWorksCardIcon">
                                <img src="<?php echo e(asset('frontend/assets/images/howItWorksIconThree.svg')); ?>"alt="" />
                            </div>
                            <div class="howItWorksCardText">
                                <h6><?php echo e($section10->title4); ?></h6>
                                
                                <?php echo $section10->content; ?>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- End How It Works -->

    <!-- sec# 04 Start Hire Guards -->

    <section class="hire">
        <div class="container">
            <div class="hireGuards">
                <div class="hireGuardsHeading">
                    <h2><?php echo e($section4->title); ?> </h2>
                </div>
                <?php if(!Auth::user()): ?>
                    <div class="hireGuardsButton mt-4">
                        <a href="<?php echo e(route('frontend.signin')); ?>"><button class="quoteButton">Request a Quote</button></a>
                        <a href="<?php echo e(route('frontend.signin')); ?>"><button class="hireButton">Get Hired as Guard</button></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- End How It Works -->

    <!-- sec# 05 Start Featured -->

    <section class="featured">
        <div class="container">
            <div class="howItWorksHeading">
                <span class="strokeText"><?php echo e($section5->title); ?></span>
                <h3><?php echo e($section5->title); ?></h3>
            </div>
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
                            <?php if(Auth::check() && Auth::user()->type == 2): ?>
                                <a href="<?php echo e(route('stripe.payment.page', $value->slug)); ?>"
                                    onclick="get_package('<?php echo e($value->id); ?>')">
                                    <button class="exploreButton">Select</button></a>
                            <?php else: ?>
                                

                                <a href="<?php echo e(route('frontend.signin')); ?>"
                                    onclick="get_package('<?php echo e($value->id); ?>')" id="pkg_not_selected">
                                    <button class="exploreButton">Login To Hire</button>
                                </a>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <div class="categoryButton wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
            <?php if(Auth::check() && Auth::user()->type == 3): ?>
                <a href="<?php echo e(route('browse.services')); ?>"><button class="exploreButton">Explore More</button></a>
            <?php else: ?>
                <a href="<?php echo e(route('frontend.signin')); ?>"><button class="exploreButton">Login To Explore
                        More</button></a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- End Featured -->

<!-- sec# 06 Start Featured Security Requests -->

<section class="securityRequest">
    <div class="container">
        <div class="catetoryHeading">
            <span class="strokeText"><?php echo e($section6->title); ?></span>
            <h3><?php echo e($section6->title1); ?></h3>
        </div>
        <div class="row">
            
            <?php $__currentLoopData = $getClientJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(is_object($value->client_postjob_details) && $value->client_postjob_details->featured_status ==1): ?>
            <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
                <div class="securityCard">
                    <div class="securityCardImage">
                        <img src="<?php echo e(!empty($value->get_user_images[0]['image'] ?? '') ? asset('storage/uploads/cms/' . $value->get_user_images[0]['image'] ?? '') : asset('storage/uploads/No-image.jpg')); ?>" alt="">
                    </div>
                    <div class="securityCardDetail">
                        <div class="securityCardHeading">
                            <a href="#">
                                <h5><?php echo e($value->client_postjob_details->name ?? ''); ?> | <?php echo e($value->get_guardtype->name ?? ''); ?></h5>
                            </a>
                            <p><?php echo e($value->client_location->location ?? ''); ?></p>

                            
                        </div>
                        <div class="tags">
                            <div class="row">
                                <?php
                                // Access the associated tags for this company
                                $tagIds = json_decode($value->tags, true); // Convert JSON string to PHP array
                                $companytags = App\Models\Tag::whereIn('id', $tagIds)->get(); // Retrieve the tags using the IDs
                                // @dd($tags);
                                ?>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="tagsHeading">
                                            <h6>Tags:</h6>
                                        </div>
                                    </div>
                                <?php $__currentLoopData = $companytags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="armedHeading">
                                            <h6><?php echo e($tags_value->name ?? ''); ?></h6>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="securityStartingHeading">
                            <h6>Starting From:</h6>
                            <p>$<?php echo e($value->per_hour_rate ?? '0.00'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
        <div class="categoryButton wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
            <?php if(Auth::check() && Auth::user()->type == 2): ?>
                <a href="<?php echo e(route('browse.quotes')); ?>"><button class="exploreMoreButton">Explore More</button></a>
            <?php elseif(Auth::check() && Auth::user()->type == 3): ?>
                <a href="#"><button class="exploreMoreButton">Explore More</button></a>
            <?php else: ?>
                <a href="<?php echo e(route('frontend.signin')); ?>"><button class="exploreButton">Login To Explore
                        More</button></a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- End Security Requests -->

<!-- sec# 07 Start Join Now -->

<section class="joinNow">
    <div class="container">
        <div class="joinNowGuards">
            <div class="hireGuardsHeading">
                <h2><?php echo e($section7->title); ?></h2>
            </div>
            <div class="hireGuardsButton wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
                <?php if(!Auth::user()): ?>
                    <a href="<?php echo e(route('frontend.signin')); ?>"><button class="quoteButton">Request a Quote</button></a>
                    <a href="<?php echo e(route('frontend.signin')); ?>"><button class="hireButton">Get Hired as
                            Guard</button></a>
                <?php endif; ?>
            </div>
            <div class="termCondition">
                <p><a href="<?php echo e(route('terms.conditions')); ?>"><?php echo e($section7->title1); ?></a> <?php echo e($section7->title2); ?> <a
                        href="<?php echo e(route('privacy.policy')); ?>"><?php echo e($section7->title3); ?></a> <?php echo e($section7->title4); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- End Join Now -->

<!-- sec# 08 Start Security Companies -->

<section class="securityRequest">
    <div class="container">
        <div class="catetoryHeading">
            <span class="strokeText"><?php echo e($section8->title); ?></span>
            <h3><?php echo e($section8->title1); ?></h3>
        </div>
        <div class="row">
            
            <?php $__currentLoopData = $getBrowseCompanies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($value->featured_status == 1): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
                    <div class="securityCard">
                        <a href="<?php echo e(route('browse.quotes')); ?>">
                        <div class="securityCardImage">
                            
                            <img src="<?php echo e(!empty($value->image) ? asset('storage/uploads/cms/' . $value->image) : asset('storage/uploads/No-image.jpg')); ?>"
                            alt="">
                        </div>
                        </a>
                        <div class="securityCardDetail">
                            <div class="securityCardHeading">
                                <h5><?php echo e($value->companyname ?? 'Company Name Not Found'); ?> | <?php echo e($value->license_no ?? 'N/A'); ?> |
                                    <?php if($value->guard_ratings->isEmpty()): ?>
                                    0.0/5
                                    <?php else: ?>
                                        <?php
                                        $totalRatings = $value->guard_ratings->count();
                                        $averageRating = $value->guard_ratings->avg('rate');
                                        ?>
                                        <?php echo e(number_format($averageRating, 1)); ?>/5
                                    <?php endif; ?>
                            </h5>

                                    
                            </div>
                         <p><?php echo e($value->guard_location->location ?? 'N/A'); ?> | <?php echo e($value->slogan ?? 'Slogan Not Found'); ?> </p>

                            <div class="tags">
                                <div class="row">
                                    <?php
                                    // Access the associated tags for this company
                                    $tagIds = json_decode($value->tag_id, true); // Convert JSON string to PHP array
                                    $companytags = App\Models\Tag::whereIn('id', $tagIds)->get(); // Retrieve the tags using the IDs
                                    // @dd($tags);
                                    ?>
                                        <div class="col-lg-2 col-md-2">
                                            <div class="tagsHeading">
                                                <h6>Tags:</h6>
                                            </div>
                                        </div>
                                    <?php $__currentLoopData = $companytags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-2 col-md-2">
                                            <div class="armedHeading">
                                                <h6><?php echo e($tags_value->name ?? ''); ?></h6>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="securityStartingHeading">
                                <h6>Starting From:</h6>
                                <p>$<?php echo e($value->starting_rate ?? '0.00'); ?></p>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
        <div class="categoryButton wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
            <?php if(Auth::check() && Auth::user()->type == 3): ?>
                <a href="<?php echo e(route('browse.companies')); ?>"><button class="exploreMoreButton">Explore More</button></a>
            <?php elseif(Auth::check() && Auth::user()->type == 2): ?>
                <a href="#"><button class="exploreButton">Explore More</button></a>
            <?php else: ?>
                <a href="<?php echo e(route('frontend.signin')); ?>"><button class="exploreButton">Login To Explore
                        More</button></a>
            <?php endif; ?>
            
        </div>

    </div>
</section>

<!-- End Security Companies -->

<!-- sec# 09 Start Blogs -->

<section class="featured">
    <div class="container">
        <div class="howItWorksHeading">
            <span class="strokeText"><?php echo e($section9->title); ?></span>
            <h3><?php echo e($section9->title1); ?></h3>
        </div>
        <div class="row">
            <?php $__currentLoopData = $blogsection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn"
                    data-wow-duration="1.6s">
                    <div class="blogCard">
                        <a href="<?php echo e(route('site.blogs')); ?>">
                            <div class="securityCardImage">
                                <img
                                    src="<?php echo e(!empty($value->image)
                                        ? asset('storage/uploads/cms/' . $value->image)
                                        : asset('storage/uploads/No-image.jpg')); ?>">
                            </div>
                            <div class="securityCardDetail">
                                <div class="blogCardHeading">
                                    <h5><?php echo e($value->groom); ?></h5>
                                    <p><?php echo Str::limit($value->content, 100) ?? null; ?>

                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="categoryButton wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
            <a href="<?php echo e(route('site.blogs')); ?>"><button class="exploreMoreButton">Explore More</button></a>
            
            
        </div>
    </div>
</section>

<!-- End Blogs -->
<script>
    if (!$("#pkg_not_selected").attr("href")) {
        toastr.info('Please Select any Package first');
    }
</script>
<!-- End Modal Rating -->
<script type="text/javascript">
    function saveToWishlist(wishlist_id) {
        let id = wishlist_id;
        console.log(wishlist_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "<?php echo e(route('wishlist.job.save')); ?>",
            method: "POST",
            data: {
                id: id,
            },
            success: function(data) {
                //    console.log(data);
                if (data.status == 400) {
                    toastr.success('User added to wishlist successfully!');
                } else {
                    toastr.error(err.message);
                }
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/index.blade.php ENDPATH**/ ?>