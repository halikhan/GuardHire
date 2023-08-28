<?php $__env->startSection('title','Guard-Hire | How it Works'); ?>
<?php $__env->startSection('content'); ?>


    <!-- Start Header -->
    <?php
    $logo_add = App\Models\LogoManager::where('title','favicon')->first();

    // dd($logo_add);
    ?>
    <header class="browseSecurityHeaderImage" style="background-image: url('<?php echo e((!empty($banners->image)) ? asset('storage/uploads/cms/'.$banners->image):asset('storage/uploads/No-gallery.jpg')); ?>')">
        <div class="container">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                     <div class="bodyGuardEventHeaderHeading">
                        
                        <h2><?php echo e($getclientQuote->get_guardtype->name ??''); ?></h2>

                    </div>
                </div>
            </div>
        </div>
        </div>
     </header>

    <!-- End Header -->

    <!-- Start Body Guard For Any Event -->

    <section class="groupSecurity">
        <div class="container">
        <div class="row">
            <div class="col-lg-6 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
               <div class="groupSecurityImageOne">
                <img src="<?php echo e((!empty($getclientimage[0]['image'] ??'')) ? asset('storage/uploads/cms/'. $getclientimage[0]['image'] ??''):asset('storage/uploads/No-image.jpg')); ?>" alt="">
               </div>
            </div>
            <div class="col-lg-6 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
            <div class="groupSecurityDetail">
                <h2><?php echo e($getclientQuote->get_guardtype->name ??''); ?> | <?php echo e($getclientQuote->client_postjob_details->name ??''); ?></h2>
                <p><?php echo substr($getclientQuote->description ??'',0,300); ?> ...</p>
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
                        
                        
                        <h6>$ <?php echo e($getclientQuote->per_hour_rate ??''); ?></h6>
                       </a></div>
                        </div>
                        <div class="col-lg-4 col-md-4"><div class="hireNow">
                        <a href="#">
                            <button class="hireNowButton" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModalChat">Send A Offer</button>
                            
                        </a>
                        </div></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- End Body Guard For Any Event -->

        <!-- Start Modal Chat -->

        <div class="modal fade" id="exampleModalChat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modalHeaderChat">
                        <h1 class="modalTitle" id="exampleModalLabel">Chat Box</h1>
                        <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                                class="fa fa-times"></i></button>
                    </div>
                    <div class="modal-body modalBody">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="profileField">
                                    <div class="connectPhone">
                                        <h6>Connect With Call</h6>
                                        <a href="tel:111-222-333" data-bs-dismiss="modal">
                                            <p><?php echo e($getclientQuote->client_postjob_details->contact ??''); ?>

                                                </p>
                                        </a>
                                    </div>
                                    <div class="connectEmail">
                                        <h6>Connect With Email</h6>
                                        <a href="mailto:john@gmail.com" data-bs-dismiss="modal">
                                            <p><?php echo e($getclientQuote->client_postjob_details->email ??''); ?></p>
                                        </a>
                                    </div>

                                    <div class="connectChat">
                                        <h6>Connect With Chat</h6>
                                        <?php
                                        $id = $getclientQuote->client_postjob_details->id;
                                        ?>
                                    <a href="<?php echo e(url('/chatify',$id)); ?>"><button class="ratingButton">Chat</button></a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Modal Chat -->
    <!-- Start Feature Security -->

        

    <!-- End Feature Security -->


    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/body-guard-event.blade.php ENDPATH**/ ?>