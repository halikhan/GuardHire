

<div class="row packageBottom mt-4">
    <div class="offset-lg-3 col-lg-9 col-md-12">
        <div class="portfolioName">
            <h3><?php echo e(Auth::user()->name ?? ''); ?> Portfolio</h3>
        </div>
        <main class="main">
            <div class="container containerOne">
            
                <?php if(count($userPortfolioImage) > 0): ?>
                <?php $__currentLoopData = $userPortfolioImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-image">
                        <a href="#" data-fancybox="gallery<?php echo e($value->image); ?>">
                            
                            <img src="<?php echo e((!empty($value->image)) ? asset('storage/uploads/cms/'. $value->image) : asset('storage/uploads/No-image.jpg')); ?>"
                            alt="Image Gallery" style="width: 100%; height: 100%;">
                        </a>
                    </div>
                    <div class="hoverClose">
                        <div class="hoverCloseIcon">
                            <a id="delete" href="<?php echo e(route('guard.portfolio.delete',$value->id)); ?>"><i class="fas fa-times"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                   <div class="card-image">
                        <a href="#" data-fancybox="gallery">
                            <img src="<?php echo e(asset('storage/uploads/No-image.jpg')); ?>"
                                alt="Image Gallery" style="height:150px; width:150px;">
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </main>
        <form id="upload-form" method="post" action="<?php echo e(route('guard.portfolio.store')); ?>" enctype="multipart/form-data">
            <div class="portfolioHeading">
                <?php echo csrf_field(); ?>
            <div>
                <label class="uploadBtn">
                    <p>Upload Image</p>
                    <input type="file" name="image[]" multiple placeholder="Upload Profile Image"
                        class="uploadInputfile">
                </label>
                <button type="submit" class="addJobButton">Save</button>
            </div>
        </div>
        </form>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/guard_dashboard/guard-portfolio.blade.php ENDPATH**/ ?>