<?php $__env->startSection('title','Blogs'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Start Header -->

  <header class="blogHeaderImage"  style="background-image: url('<?php echo e((!empty($banners->image)) ? asset('storage/uploads/cms/'.$banners->image):asset('storage/uploads/No-gallery.jpg')); ?>')">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                     <div class="blogHeaderHeading">
                        <h2><?php echo e($sectionBlogs->title); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <!-- End Header -->


  <!-- Start Blogs -->

  <section class="featured">
          <div class="container">
           <div class="howItWorksHeading">
             <span class="strokeText"><?php echo e($sectionBlogs->title); ?></span>
             <h3><?php echo e($sectionBlogs->title); ?></h3>
           </div>


           <div class="row">
            <?php $__currentLoopData = $blogsection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
              <div class="blogCard">
                <a href="<?php echo e(route('inner.blog',$value->slug)); ?>">
                    
                <div class="securityCardImage">
                    <img src="<?php echo e((!empty($value->image))?
                        asset('storage/uploads/cms/'.$value->image):asset('storage/uploads/No-image.jpg')); ?>">
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


          </div>
    </section>

    <!-- End Blogs -->


    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/blogs.blade.php ENDPATH**/ ?>