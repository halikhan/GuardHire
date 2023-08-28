<form action="<?php echo e(route('guard.job.update')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="profileField">
                <input name="guardjob_id" type="hidden" value="<?php echo e($guardJob->id ?? ''); ?>">
                <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
                <label>Job Description</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="job_type"
                        name="job_type" required>
                        <option disabled selected>Select Job</option>
                        <?php $__currentLoopData = $getGuardType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e($value->id == @$guardJob->job_type ? 'selected' : ''); ?>>
                                <?php echo e($value->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <label>Location</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="location"
                        name="location" required>
                        <option disabled selected>Location</option>
                        <?php $__currentLoopData = $getlocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e($value->id == $guardJob->location_id ? 'selected' : ''); ?>>
                                <?php echo e($value->location); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <label>Services</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="serviceName"
                        name="services" required>
                        <option selected disabled>Services</option>
                        <?php $__currentLoopData = $getservice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e($value->id == $guardJob->services ? 'selected' : ''); ?>>
                                <?php echo e($value->service); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <label class="label">Language</label>
                <div class="multipleSelect">
                    <select id="editlocationSets" multiple="multiple" placeholder="Language" style="width: 23.2rem" name="languages[]" required>
                        <?php $__currentLoopData = $getLanguage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>" <?php echo e(in_array($value->id, $userLanguage->pluck('language_id')->toArray()) ? 'selected' : ''); ?>>
                                <?php echo e($value->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="profileField">
                <label>Company Name</label>
                <input name="companyname" type="text" class="inputName" value="<?php echo e(Auth::user()->companyname); ?>" readonly>

                <label>Job Duration</label>
                
                <select class="serviceDropdown" aria-label="Default select example" id="job_duration" name="job_duration">
                    <?php for($i = 1; $i <= 12; $i++): ?>
                      <option value="<?php echo e($i); ?> Month" <?php echo e($i == $guardJob->job_duration ? 'selected' : ''); ?>>
                        <?php echo e($i); ?> Month<?php echo e($i > 1 ? 's' : ''); ?>

                      </option>
                    <?php endfor; ?>
                </select>
                <label>Per Hour Rate</label>
                <input type="text" class="inputName" placeholder="Per Hour Rate" id="per_hour_rate"
                    name="per_hour_rate" value="<?php echo e($guardJob->per_hour_rate); ?>">
                <label class="label">Tags</label>
                <div class="multipleSelect">
                    <select id="locationSetsOneedit" multiple="multiple" placeholder="Tags" style="width: 23.2rem" name="tags[]" required>
                        <?php $__currentLoopData = $getTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>" <?php echo e(in_array($value->id, $userTag->pluck('tag_id')->toArray()) ? 'selected' : ''); ?>>
                                <?php echo e($value->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php
        $userJobsImage = App\Models\ImageGallery::where('user_id', Auth::id())
            ->where('guard_job_id', $guardJob->id)
            ->get();
        ?>
        <?php $__currentLoopData = $userJobsImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-2 col-md-3 col-sm-3">
                <div class="container containerOne">
                    <div class="card" style="width:100px; height:100px;">
                        <div class="card-image">
                            <a href="#" data-fancybox="gallery<?php echo e($value->image); ?>">
                                <img src="<?php echo e(!empty($value->image) ? asset('storage/uploads/cms/' . $value->image) : asset('storage/uploads/No-image.jpg')); ?>"
                                    alt="Image Gallery" style="width:100px; height:100px;">
                            </a>
                        </div>
                        <div class="hoverClose">
                            <div class="hoverCloseIcon">
                                <a id="delete" href="<?php echo e(route('guard.jobimage.delete', $value->id)); ?>"><i
                                        class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="col-md-12">
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <input name="jobimage[]" id="imagesupport" multiple class="form-control" type="file">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="profileField">
                <label>Description</label>
                <textarea name="description" type="text" class="inputMessage" placeholder="Type Here..."><?php echo e($guardJob->description); ?></textarea>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="addJobButton">Update</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#editlocationSets, #locationSetsOneedit').selectize({
            plugins: ['remove_button']
        });
    });


</script>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/guard_dashboard/guard-job-modal.blade.php ENDPATH**/ ?>