
<form id="upload-form" method="post" action="<?php echo e(route('user.update.password')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="portfolioHeading">
        <div class="row packageBottom passwordTop">
            <div class="col-lg-12">
                <div class="profileName mb-4">
                    <h3>Change Password</h3>
                </div>
            </div>
            <div class="changePassword">
                <div class="profileField">
                    
                    <input type="password" name="password" class="inputName" placeholder="New Password" value="<?php echo e(old('password')); ?>">
                    <input type="password" name="confirm_password" class="inputName" placeholder="Confirm Password" value="<?php echo e(old('confirm_password')); ?>">
                </div>
                <button type="submit" class="savePasswordButton">Save Password</button>
            </div>
        </div>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/client-change-password.blade.php ENDPATH**/ ?>