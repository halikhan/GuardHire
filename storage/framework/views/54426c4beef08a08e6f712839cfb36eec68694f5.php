<form method="post" action="<?php echo e(route('client.post.job.update')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="profileField">
                <input name="clientjob_id" type="hidden" value="<?php echo e($clientJob->id); ?>">
                <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
                <label>Guard Type</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="job_type" name="job_type"
                        required>
                        <option selected="" disabled>Select Guard Type</option>
                        <?php $__currentLoopData = $getGuardType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e($value->id == $clientJob->job_type ? 'selected' : ''); ?>>
                                <?php echo e($value->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <label>Location</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="location" name="location"
                        required>
                        
                        <?php $__currentLoopData = $getlocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e($value->id == $clientJob->location ? 'selected' : ''); ?>>
                                <?php echo e($value->location); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <label>Starting Date</label>
                <input type="date" class="form-control" id="starting_date" name="starting_date"
                    value="<?php echo e($clientJob->starting_date ?? ''); ?>" required>
                <label>Job Duration</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="job_duration"
                        name="job_duration" required>
                        
                        <option value="recurring">Recurring</option>
                        <option value="onetime">One Time</option>
                        
                    </select>

                </div>
                

                <label class="label">Language</label>
                <div class="multipleSelect">
                    <select id="editlocationSets" multiple="multiple" placeholder="Language" style="width: 23.2rem"
                        name="languages[]">
                        <?php $__currentLoopData = $getLanguage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e(in_array($value->id, $userLanguage->pluck('language_id')->toArray()) ? 'selected' : ''); ?>>
                                <?php echo e($value->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>


                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="profileField">
                <label>Job Type</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="serviceName" name="services"
                        required>
                        <option selected="">Services</option>
                        <?php $__currentLoopData = $getservice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e($value->id == $clientJob->services ? 'selected' : ''); ?>><?php echo e($value->service); ?>

                            </option>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <label>Budget (Allow for a range or hourly rate)</label>
                <input type="text" class="inputName" placeholder="Budget (Allow for a range or hourly rate)"
                    id="per_hour_rate" name="per_hour_rate" value="<?php echo e($clientJob->per_hour_rate); ?>"required>
                <label>Ending Date</label>
                <input type="date" class="form-control" id="ending_date" name="ending_date"
                    value="<?php echo e($clientJob->ending_date); ?>">
                <label class="label">Tags</label>
                <div class="multipleSelect">
                    <select id="SetsOneedit" class="multipleSelectWidth" multiple="multiple" placeholder="Tags" style="width: 23.2rem"
                        name="tags[]">
                        <?php $__currentLoopData = $getTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e(in_array($value->id, $userTag->pluck('tag_id')->toArray()) ? 'selected' : ''); ?>>
                                <?php echo e($value->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $userJobsImage = App\Models\ImageGallery::where('user_id', Auth::id())
                ->where('client_job_id', $clientJob->id)
                ->get();
            // dd($getlocation);
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
                                    <a id="delete" href="<?php echo e(route('client.jobimage.delete', $value->id)); ?>"><i
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
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="profileField">
                <label>Description</label>
                <textarea class="inputMessage" id="description" name="description" placeholder="Type Here..." required><?php echo e($clientJob->description); ?></textarea>
                
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="addJobButton">Update</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        var selector = $('#editlocationSets, #SetsOneedit');
        selector.selectize({
            plugins: ['remove_button']
        });
    });
</script>
<script>
    $(".mailregister").click(function() {
        var rea = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        var Email = $("#subEmail").val();
        var x = rea.test(Email);
        if (!x) {
            // alert('Type Your valid Email');
            toastr.error('please select a tag');
            return false;
        }
    });

    function validateFm() {

        $(".register").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                    // fadeOut();
                }
            }
        });
    }
</script>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/client-job-edit.blade.php ENDPATH**/ ?>