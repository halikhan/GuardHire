<?php $__env->startSection('title','Sign In'); ?>
<?php $__env->startSection('content'); ?>


    <!-- Start Sign In -->
    <?php
    $logo_add = App\Models\LogoManager::where('title','logo')->first();
    // dd($logo_add);
    ?>
    <section class="signIn">
        <div class="container">
            <div class="signInBox">
                <div class="signInImage">
                    <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e((!empty($logo_add->image))?
                        asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg')); ?>" alt=""></a>
                </div>

                <form action="<?php echo e(route('user.login')); ?>" id="regiterForm" method="POST" class="validatedForm">
                    <?php echo csrf_field(); ?>
                <div class="signInDetail">
                    <h4>Sign In Now</h4>
                    <p>Don’t have an account?<a href="<?php echo e(route('frontend.signup')); ?>">Sign Up</a></p>
                    <input type="email" name="email" class="searchInput" placeholder="Type Your Email">
                    <div class="password-container">
                       <input type="password" name="password" class="searchInput" placeholder="Password" id="password">
                         <i class="fa fa-eye" aria-hidden="true" id="eye"></i>
                     </div>
                      
                       <a href="#"><button class="signInButton" type="submit">Sign In Now</button></a>
                       
                            
                            <p> <a href="<?php echo e(route('forget-password')); ?>" class="a">Forgot your password?</p>


                    </div>
                </form>
                </div>
        </div>
        </div>
     </section>

    <!-- End Sign In -->

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/sign-in.blade.php ENDPATH**/ ?>