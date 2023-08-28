<?php $__env->startSection('title','Sign Up'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Start Sign Up -->
    <?php
    $logo_add = App\Models\LogoManager::where('title','logo')->first();
    // dd($logo_add);
    ?>

    <section class="signUp">
        <div class="container">
            <div class="signUpBox">
                <div class="signInImage">
                    <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e((!empty($logo_add->image))?
                        asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg')); ?>" alt=""></a>
                </div>
                <form action="<?php echo e(route('user.signup')); ?>" id="regiterForm" method="POST" class="validatedForm" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="signInDetail">
                        <h4>It's Free to Sign Up and Get Started.</h4>
                        <p>Already have account?<a href="<?php echo e(route('frontend.signin')); ?>">Sign In</a></p>
                        <div class="radioBox">
                            <p>I am:</p>
                            <input type="radio" id="radioOne" name="type" value="2" class="form-check-input" checked>
                             <label for="radioOne">Security Company</label>
                             &nbsp; <input type="radio" id="radioTwo" name="type" value="3" class="form-check-input">
                            <label for="radioTwo">Hiring Security Services</label>
                        </div>
                        <br>
                        
                            <div id="securityCompanyFields">
                                <div class="dFlex">
                                <div class="inputField">
                                    <input type="text" class="searchInput" placeholder="Company Name" name="companyname" value="<?php echo e(old('companyname')); ?>">
                                    <?php $__errorArgs = ['companyname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="help-block" style="color: red">
                                        <?php echo e($errors->first('companyname')); ?>

                                    </p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="inputField">
                                    <input type="file" class="searchInput" placeholder="Upload Profile Image" name="image">
                                </div>
                            </div>

                            </div>
                        

                        <div class="inputBox">
                            <div class="inputField">
                                <input type="text" class="searchInput" placeholder="First Name" name="name" value="<?php echo e(old('name')); ?>">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="help-block" style="color: red">
                                    <?php echo e($errors->first('name')); ?>

                                </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="inputField">
                                <input type="text" class="searchInput" placeholder="Last Name" name="last_name" value="<?php echo e(old('last_name')); ?>">
                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="help-block" style="color: red">
                                    <?php echo e($errors->first('last_name')); ?>

                                </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="inputBox">
                            <div class="inputField">
                                <input type="text" class="searchInput" placeholder="Type Username" name="username" value="<?php echo e(old('username')); ?>">
                                 <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="help-block" style="color: red">
                                    <?php echo e($errors->first('username')); ?>

                                </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="inputField">
                                <input type="tel" class="searchInput" placeholder="Phone No" name="contact" value="<?php echo e(old('contact')); ?>">
                                 <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="help-block" style="color: red">
                                    <?php echo e($errors->first('contact')); ?>

                                </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="inputBox">
                            <div class="inputField">
                                <input type="email" class="searchInput" placeholder="Email" name="email" value="<?php echo e(old('email ')); ?>">
                                 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="help-block" style="color: red">
                                    <?php echo e($errors->first('email')); ?>

                                </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="inputField">
                                <div class="password-container">
                                    <input type="password" class="searchInput" placeholder="Password" id="password" name="password" value="<?php echo e(old('password')); ?>">
                                    <i class="fa fa-eye" aria-hidden="true" id="eye"></i>
                                     <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="help-block" style="color: red">
                                    <?php echo e($errors->first('password')); ?>

                                </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="inputBox">
                            

                            <div class="inputField">
                                <div class="select">
                                    <select name="userlocation" class="serviceDropdown" aria-label="Default select example">
                                        <option selected disabled>Locations</option>
                                        <?php $__currentLoopData = $getlocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->location); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </select>
                                </div>
                                 <?php $__errorArgs = ['user_location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="help-block" style="color: red">
                                    <?php echo e($errors->first('user_location')); ?>

                                </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            

                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="1" name="subscribe" checked>
                            <label class="form-check-label">
                                Terms & Conditions
                            </label>
                        </div>
                        <a href="#"><button class="signInButton" type="submit">Sign Up Now</button></a>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>

<br><br><br><br>

    <!-- End Sign Up -->
    <script>
        const radioOne = document.getElementById('radioOne');
        const radioTwo = document.getElementById('radioTwo');
        const securityCompanyFields = document.getElementById('securityCompanyFields');
        // const securityCompanyFields = document.getElementById('securityCompanyFields');

        radioOne.addEventListener('change', function() {
            if (radioOne.checked) {
                securityCompanyFields.style.display = 'block';
            } else {
                securityCompanyFields.style.display = 'none';
            }
        });

        radioTwo.addEventListener('change', function() {
            if (radioTwo.checked) {
                securityCompanyFields.style.display = 'none';
            } else {
                securityCompanyFields.style.display = 'block';
            }
        });
    </script>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/sign-up.blade.php ENDPATH**/ ?>