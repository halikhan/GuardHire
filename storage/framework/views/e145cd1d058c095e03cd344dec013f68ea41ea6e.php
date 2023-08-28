<?php $__env->startSection('title','Search Results'); ?>
<?php $__env->startSection('content'); ?>


    <!-- Start Header -->

    <header class="howItWorksHeaderImage" style="background-image: url('<?php echo e((!empty($searchbanners->image)) ? asset('storage/uploads/cms/'.$searchbanners->image):asset('storage/uploads/No-gallery.jpg')); ?>')">
        <div class="container">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="browseServiceHeaderHeading">
                        
                        <h2>Search Results</h2>
                        
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


    <!-- Start Browse Services -->

    <section class="browseServices">
        <div class="container">
            <div class="row">
              
              <div class="col-lg-3 col-md-12">

                <?php echo $__env->make('frontend.apply-browes-quotes-filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
            

                <div class="col-lg-9">
                    

                    <?php if($clientSerachresult->isEmpty()): ?>
                    <div class="row browseServiceCard">
                        <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="groupSecurityImage">
                                <img src="<?php echo e(asset('storage/uploads/No-image.jpg')); ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h6>Sponsored</h6>
                                <h2>Armed Security</h2>
                                <p> No Results Found
                                </p>
                                <div class="row">
                                    <div class="securityRatingDetail">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityStarting">
                                                <h6>Starting From:</h6>
                                                <p>$100.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityRating securityStartingRating">
                                                <a href="#">
                                                    <div class="starIcon">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                    <h6>0.0/5 <span>(0)</span></h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="hireNow">
                                                <a href="<?php echo e(route('home')); ?>"><button class="hireNowButton">Hired
                                                        Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <?php $__currentLoopData = $clientSerachresult; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row browseServiceCard">
                            <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                                <div class="groupSecurityImage">
                                    <img src="<?php echo e((!empty($value->client_postjob_details->image)) ? asset('storage/uploads/cms/'. $value->client_postjob_details->image):asset('storage/uploads/No-image.jpg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                                <div class="groupSecurityDetail">
                                    
                                    <h2><?php echo e($value->get_guardtype->name ??''); ?></h2>
                                    <p><?php echo substr($value->description ??'',0,300); ?> ...</p>

                                    <div class="row">
                                        <div class="securityRatingDetail">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="securityStarting">
                                                    <h6>Starting From:</h6>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                
                                                <div class="securityRating securityStartingRating">
                                                    <a href="#">
                                                        
                                                        <h6>$<?php echo e($value->per_hour_rate); ?>/hour</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="hireNow">
                                                    <a href="<?php echo e(route('group.security',$value->id ??'')); ?>"><button class="hireNowButton">Hired
                                                            Now</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>


                    

                </div>
            </div>
        </div>
    </section>


    <!-- Start Browse Services -->



    <!-- Start Modal -->


    

    <!-- End Modal -->


    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client-serach-results.blade.php ENDPATH**/ ?>