<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-12">
        <div class="addJob">
            <button class="addJobButton" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">Add
                Listing</button>
        </div>
        <table id="exampleOne" class="table table-striped dataTable" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th class="second">Company Name</th>
                    <th>Job Type</th>
                    <th>Job Duration</th>
                    <th>Location</th>
                    <th class="five">Service</th>
                    <th>Per Hour Rate</th>
                    <th>Status</th>
                    <th class="seven">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php $__currentLoopData = $guardJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $guardJob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key + 1); ?></td>
                        
                        <td class="second"><?php echo e(Auth::user()->companyname); ?></br></td>

                        <td><?php echo e($guardJob->get_guardtype->name); ?></td>
                        <td><?php echo e($guardJob->job_duration ??'N/A'); ?></td>
                        <td><?php echo e($guardJob->guard_location->location ??''); ?></td>
                        <td class="five"><?php echo e($guardJob->guard_service->service ??''); ?></br></td>
                        <td><?php echo e($guardJob->per_hour_rate ??'N/A'); ?></td>
                        
                        <td>
                            <a href="<?php echo e(route('guard.job.status', ['id' => $guardJob->id])); ?>">
                                <?php if($guardJob->status == 1): ?>
                                    <button class="blueActive"><i class="fa fa-thumbs-up"></i></button>
                                <?php else: ?>
                                    <button class="redActive"><i class="fa fa-thumbs-down"></i></button>
                                <?php endif; ?>
                            </a>
                        </td>
                        <td class="seven">
                            <a href="javascript:void(0)">
                                <button class="editBubtton" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit" onclick="guardJobModal(<?php echo e($guardJob->id); ?>)"><i
                                        class="fas fa-edit"></i></button>
                            </a>
                            <a href="<?php echo e(route('guard.job.delete', $guardJob->id)); ?>" id="delete"><button
                                    class="deleteButton" type="button" title=""><i
                                        class="fas fa-trash-alt"></i></button></a>
                            
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Start Modal Addz Job -->

<div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Add Listing</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('guard.job.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="profileField">
                                <label>Job Description</label>
                                <div class="select">
                                    <select class="serviceDropdown" aria-label="Default select example" id="job_type"
                                        name="job_type" required>
                                        <option selected="" disabled>Select Job</option>
                                        <?php $__currentLoopData = $getGuardType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                
                                <label>Location</label>
                                <div class="select">
                                    <select class="serviceDropdown" aria-label="Default select example" id="location"
                                        name="location" required>
                                        
                                        <?php $__currentLoopData = $getlocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"  <?php echo e($value->id == Auth::user()->userlocation ? 'selected' : ''); ?>><?php echo e($value->location); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <label>Services</label>
                                <div class="select">
                                    <select class="serviceDropdown" aria-label="Default select example" id="services"
                                        name="services" required>
                                        
                                        <?php $__currentLoopData = $getservice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->service); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <label class="label">Language</label>
                                <div class="multipleSelect">
                                    <select id="locationSets" multiple="multiple" placeholder="Language"
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
                                <label>Company Name</label>
                                <input name="companyname" type="text" class="inputName" value="<?php echo e(Auth::user()->companyname); ?>" readonly>
                                <label>Job Duration</label>
                                
                                    <select class="serviceDropdown" aria-label="Default select example" id="job_duration" name="job_duration" required>
                                        <option selected disabled>Select Duration</option>
                                        <?php for($i = 1; $i <= 12; $i++): ?>
                                          <option value="<?php echo e($i); ?> Month"><?php echo e($i); ?> Month<?php echo e($i > 1 ? 's' : ''); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                <label>Per Hour Rate</label>
                                <input type="number" class="inputName" placeholder="Per Hour Rate" id="per_hour_rate"
                                    name="per_hour_rate">
                                <label class="label">Tags</label>
                                <div class="multipleSelect">
                                    <select id="locationSetsOne" multiple="multiple" placeholder="Tags"
                                        style="width: 23.2rem" name="tags[]" required>
                                        <?php $__currentLoopData = $getTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                             

                    </div>
                    <div class="row mt-3 mb-2">
                    <div class="col-md-12">
                                
                                
                                <input name="jobimage[]" id="imagesupport" multiple class="form-control" type="file">
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="profileField">
                        <label>Description</label>
                        <textarea name="description" type="text" class="inputMessage" placeholder="Type Here..."></textarea>
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
                <h1 class="modalTitle" id="exampleModalLabel">Edit Listing</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                
                <?php if($guardJobs->count() > 0): ?>
                <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                <div id="guard_job_modal">
                    <?php echo $__env->make('frontend.guard_dashboard.guard-job-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>

<!-- End Modal Edit Job -->

<!-- Start Modal Rating -->

<div class="modal fade" id="exampleModalRating" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Rating</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="rating">
                            <h5>Rate</h5>
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="profileField">
                            <label>Message</label>
                            <textarea type="text" class="inputMessage" placeholder="Type Here..."></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="addJobButton">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Call select2() on your element after both scripts have been loaded -->


<!-- End Modal Rating -->
<script type="text/javascript">
    function guardJobModal(guard_id) {
        let id = guard_id;
        console.log(guard_id);
        $('#guard_job_modal').text("");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "<?php echo e(route('guard.job.edit')); ?>",
            method: "POST",
            data: {
                id: id,
            },
            success: function(data) {
                $("#guard_job_modal").html(data.html);
                console.log(data.html);

            }
        });
    }
</script>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/guard_dashboard/guard-job.blade.php ENDPATH**/ ?>