<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<style>
    div.login-card .login-main .theme-form h4 {
    color: #fff;
}
div.login-card .login-main .theme-form label {
    font-size: 14px;
    color: #fff;
}
button.logInButton {
    background-color: #00264d !important;
    border-color: #00264d !important;
    color: #ffffff;
}
.loginCard .loginMain {
    border-radius: 10px;
    background: linear-gradient(180deg, #00264d, #00264d, #000000eb);
}

.login-card .login-main .theme-form p {
    color: #fff !important;
}


</style>
<div class="container-fluid p-0">
    <div class="row m-0">
       <div class="col-12 p-0">
          <div class="login-card loginCard">
             <div>

        <div class="login-main loginMain">
            
        <form class="theme-form" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            
            <h4 class="align-center">Guard Hire</h4>
            
                     <p>Enter your email & password to login</p>
            <!-- Email Address -->

            <div class="form-group">
                <label class="col-form-label">Email Address</label>
                <input class="form-control" type="email" id="email" name="email"  placeholder="Test@gmail.com">
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

            <!-- Password -->
            <div class="form-group">
                <label class="col-form-label">Password</label>
                <input class="form-control" type="password" id="password" name="password"  placeholder="*********">
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

            <!-- Remember Me -->
            <div class="form-group mb-0">
                

                <?php if(Route::has('register')): ?>

                
            <?php endif; ?>
            <button class="btn btn-primary btn-block logInButton" type="submit">Log In</button>

            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/auth/login.blade.php ENDPATH**/ ?>