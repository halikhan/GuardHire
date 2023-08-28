<div class="row packageBottom">
    <div class="col-lg-12">
        <div class="profileName">
            <h3>Package Details</h3>
        </div>
    </div>
</div>
<?php if($guardPaymentDetail && is_object($guardPaymentDetail)): ?>
<div class="row packageBottom">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Package : <span><?php echo e($guardPaymentDetail->package_title ??'No data found'); ?></span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Type : <span><?php echo e($guardPaymentDetail->package_type ??'No data found'); ?> Credits/ $<?php echo e($guardPaymentDetail->package_amount ??'No data found'); ?></span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Amount : <span>$<?php echo e($guardPaymentDetail->package_amount ??'No data found'); ?></span></h5>
        </div>
    </div>
</div>
<div class="row packageBottom">

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>New Message Pts :<span><?php echo e($guardPaymentDetail->msg_points ??'No data found'); ?></span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Service Listing Pts : <span><?php echo e($guardPaymentDetail->listing_points ??'No data found'); ?></span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Total Credit : <span><?php echo e($totalCreditsPurchased ??'No data found'); ?></span></h5>
        </div>
    </div>
</div>
<div class="row packageBottom">

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Used Message Pts :<span><?php echo e($totalCreditPoints ??'No data found'); ?></span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Used Service Listing Pts : <span><?php echo e($listingCount ??'No data found'); ?></span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Remaining Credits : <span><?php echo e($remainingCredits ??'No data found'); ?></span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        
    </div>
    
    <?php if($remainingCredits < 2): ?>
    <div class="col-lg-4 col-md-6 col-sm-12"><a href="<?php echo e(route('our.packages')); ?>">
        <button type="submit" class="savePasswordButton">Update Package</button></a>
    </div>
    <?php endif; ?>

</div>
<?php else: ?>
<div class="packageText">
    <h5> <p>No Package found.</p></h5>
</div>
<div class="col-lg-4 col-md-6 col-sm-12"><a href="<?php echo e(route('our.packages')); ?>">
    <button type="submit" class="savePasswordButton">Update Package</button></a>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/guard_dashboard/guard-package.blade.php ENDPATH**/ ?>