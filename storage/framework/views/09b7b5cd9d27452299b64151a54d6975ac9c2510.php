<?php $__env->startSection('title', 'How it Works'); ?>
<?php $__env->startSection('content'); ?>

    <header class="howItWorksHeaderImage"
        style="background-image: url('<?php echo e(!empty($banners->image) ? asset('storage/uploads/cms/' . $banners->image) : asset('storage/uploads/No-gallery.jpg')); ?>')">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="howItWorksHeaderHeading">
                        <h2><?php echo e($sectionhowitworks->title); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <!-- End Header -->

    <!-- Start Search Form -->

    <section class="searchFormBox">
        <div class="container">
            <div class="howItWorkSearchBox">
                <div class="searchwrapper howItWorkSearch wow animate__animated animate__bounceIn" data-wow-duration="1.5s">
                    <div class="searchbox">
                        <form method="GET" action="<?php echo e(route('apply.howitworks.search')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="search" type="search" class="form-control inputSearchField"
                                        placeholder="Type Here...">
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control categories" id="services" name="services" required>
                                        <option disabled selected>Select Service</option>

                                        <?php $__currentLoopData = $getservice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->service); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control categories" id="location" name="location" required>
                                        <option disabled selected>Select Location</option>

                                        <?php $__currentLoopData = $getlocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->location); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-1"><input type="submit" class="btn searchButton" value="Search"></div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </section>

    <!-- End Search Form -->

    <!-- Start How It Works -->

    <section class="howItWorksDetails">
        <div class="container">
            <div class="row worksLeftRight">
                <div class="col-lg-5 col-md-12 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <div class="howItWorksImage">
                        <img src="<?php echo e(!empty($bannersfaqs->image) ? asset('storage/uploads/cms/' . $bannersfaqs->image) : asset('storage/uploads/No-gallery.jpg')); ?>"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                    <div class="howItWorksText">
                        <div class="howItWorksTextHeading">
                            
                            
                            <h2><?php echo e($sectionhowitworks->title1); ?></h2>

                        </div>
                    </div>
                    <div class="howItWorksQa">
                        <div class="accordion" id="accordionExample">
                            <p>
                                <?php echo $sectionhowitworks->content; ?>

                            </p>

                        </div>
                    </div>
                </div>
            </div>

            

            <div class="row worksLeftRight">
                <div class="faqCenterHeading">
                    <h2><?php echo e($names_of_faqs->title); ?></h2>
                    
                </div>
                <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <div class="howItWorksQa">
                        <div class="accordion" id="accordionExampleOne">
                            <?php $__currentLoopData = $general_faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key == 0): ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne<?php echo e($faq->id); ?>" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <?php echo e($faq->question); ?>

                                            </button>
                                        </h2>
                                        <div id="collapseOne<?php echo e($faq->id); ?>" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p><?php echo $faq->answer; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($faq->id); ?>"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                <?php echo e($faq->question); ?>

                                            </button>
                                        </h2>

                                        <div id="collapse<?php echo e($faq->id); ?>" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p><?php echo $faq->answer; ?></p>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row worksLeftRight">
                <div class="faqCenterHeading">
                    <h2><?php echo e($names_of_faqs->title1); ?></h2>
                    
                </div>
                <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <div class="howItWorksQa">
                        <div class="accordion" id="accordionExampleOne">
                            <?php $__currentLoopData = $client_faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key == 0): ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne<?php echo e($faq->id); ?>" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <?php echo e($faq->question); ?>

                                            </button>
                                        </h2>
                                        <div id="collapseOne<?php echo e($faq->id); ?>" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p><?php echo $faq->answer; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($faq->id); ?>"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                <?php echo e($faq->question); ?>

                                            </button>
                                        </h2>

                                        <div id="collapse<?php echo e($faq->id); ?>" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p><?php echo $faq->answer; ?></p>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row worksLeftRight">
                <div class="faqCenterHeading">
                    <h2><?php echo e($names_of_faqs->title2); ?></h2>
                    
                </div>
                <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <div class="howItWorksQa">
                        <div class="accordion" id="accordionExampleOne">
                            <?php $__currentLoopData = $guard_faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key == 0): ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne<?php echo e($faq->id); ?>" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <?php echo e($faq->question); ?>

                                            </button>
                                        </h2>
                                        <div id="collapseOne<?php echo e($faq->id); ?>" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p><?php echo $faq->answer; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($faq->id); ?>"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                <?php echo e($faq->question); ?>

                                            </button>
                                        </h2>

                                        <div id="collapse<?php echo e($faq->id); ?>" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p><?php echo $faq->answer; ?></p>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/how-it-works.blade.php ENDPATH**/ ?>