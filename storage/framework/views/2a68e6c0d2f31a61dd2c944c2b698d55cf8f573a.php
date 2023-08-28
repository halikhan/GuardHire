<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-12">
        <div class="addJob">
            <button class="addJobButton" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">Post a Request</button>
        </div>
        <table id="exampleOne" class="table table-striped dataTable" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Job Description</th>
                    <th>Job Duration</th>
                    <th>Location</th>
                    <th>Service</th>
                    <th>Budget (Allow for a range or hourly rate)</th>
                    
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $__currentLoopData = $clientJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $clientJob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($clientJob->get_guardtype->name ?? ''); ?></td>
                        <td><?php echo e($clientJob->job_duration ?? 'N/A'); ?></td>
                        <td><?php echo e($clientJob->client_location->location ?? ''); ?></td>
                        <td><?php echo e($clientJob->client_service->service ?? ''); ?></td>
                        <td>$ <?php echo e($clientJob->per_hour_rate ?? '0.00'); ?></td>
                        
                        <td>
                            
                            <a href="<?php echo e(route('client.job.status', ['id' => $clientJob->id])); ?>">
                                <?php if($clientJob->status == 1): ?>
                                    <button class="blueActive"><i class="fa fa-thumbs-up"></i></button>
                                <?php else: ?>
                                    <button class="redActive"><i class="fa fa-thumbs-down"></i></button>
                                <?php endif; ?>
                            </a>
                        </td>
                        <td>

                            <a href="javascript:void(0)">
                                <button class="editBubtton" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit" onclick="clientJobEdit(<?php echo e($clientJob->id); ?>)"><i
                                        class="fas fa-edit"></i></button>
                            </a>
                            <a href="<?php echo e(route('client.job.delete', $clientJob->id)); ?>" type="button" id="delete"> <button
                                    class="deleteButton"><i class="fas fa-trash-alt"></i></button></a>
                            
                            
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>
    </div>
</div>
<!-- Start Modal Add Job -->

<div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Post a Request</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo e(route('client.post.job')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <input name="clientjob_id" type="hidden" value="">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="profileField">
                                <label>Guard Type</label>
                                <div class="select">
                                    <select class="serviceDropdown" aria-label="Default select example" id="job_type"
                                        name="job_type" required>
                                        <option selected disabled>Select Guard Type</option>
                                        <?php $__currentLoopData = $getGuardType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                <label>Location</label>
                                <div class="select">
                                    <select class="serviceDropdown" aria-label="Default select example" id="location"
                                        name="location" required>
                                        <option selected="" disabled>Location</option>
                                        <?php $__currentLoopData = $getlocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->location); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <label>Starting Date</label>
                                <input type="date" name="starting_date" class="inputName" placeholder="Starting Date"
                                    required>
                                    <label>Job Duration</label>
                                    <div class="select">
                                        <select class="serviceDropdown" aria-label="Default select example" id="job_duration" name="job_duration" required>
                                            <option selected disabled>Select Duration</option>
                                            <option value="recurring">Recurring</option>
                                            <option value="onetime">One Time</option>
                                            
                                          </select>
                                    </div>

                                    
                                <label class="label">Language</label>
                                <div class="multipleSelect">
                                    <select id="locationSetsOne" multiple="multiple" placeholder="Language"
                                        style="width: 23.2rem" name="languages[]" required>
                                        <?php $__currentLoopData = $getLanguage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="profileField">

                                    <label>Job Type</label>
                                    <div class="select">
                                        <select class="serviceDropdown" aria-label="Default select example" id="services"
                                            name="services" required>
                                            <option selected disabled>Job Type</option>
                                            <?php $__currentLoopData = $getservice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->service); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <label>Budget (Allow for a range or hourly rate)</label>
                                <input type="text" class="inputName"
                                    placeholder="Budget (Allow for a range or hourly rate)" id="per_hour_rate"
                                    name="per_hour_rate">
                                <label>Ending Date</label>
                                <input type="date" name="ending_date" class="inputName" placeholder="Ending Date">
                                <label class="label">Tags</label>
                                <div class="multipleSelect">
                                    <select id="locationSets" class="multipleSelectWidth" multiple="multiple" placeholder="Tags"
                                        style="width: 23.2rem" name="tags[]" required>
                                        <?php $__currentLoopData = $getTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 row">
                                    <div class="col-sm-12">
                                        <input name="jobimage[]" id="imagesupport" multiple class="form-control"
                                            type="file">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="profileField">
                                <label>Description</label>
                                <textarea type="text" name="description" class="inputMessage" placeholder="Type Here..." required></textarea>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="addJobButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Modal Add Job -->

<!-- Start Modal Edit Job -->

<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Edit Post a Request</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <?php if($clientJobs->count() > 0): ?>
                    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                    <div id="client_job_modal">
                        <?php echo $__env->make('frontend.client_dashboard.client-job-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- End Modal Edit Job -->



<!-- End Modal Rating -->
<script type="text/javascript">
    function clientJobEdit(client_id) {
        let id = client_id;
        console.log(client_id);
        // $('#client_job_modal').text("");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "<?php echo e(route('client.job.edit')); ?>",
            method: "POST",
            data: {
                id: id,
            },
            success: function(data) {
                $("#client_job_modal").html(data.html);
                console.log(data.html);

            }
        });
    }
</script>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/client-post-job.blade.php ENDPATH**/ ?>