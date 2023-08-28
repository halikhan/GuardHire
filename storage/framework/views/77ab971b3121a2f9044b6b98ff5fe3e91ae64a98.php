<style>
    button.ratingButtonYellow {
    width: 35px;
    height: 35px;
    border: none;
    outline: none;
    padding: 4px 8px;
    background-color: #00264d;
    color: #9f6f05;
    font-family: MontserratMedium;
    font-size: 14px;
}
</style>
<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-12">

        

    <div class="profileName mb-4">
        <h3>Hired Listing</h3>
    </div>
        <table id="exampleTwo" class="table table-striped dataTable" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Guard Name</th>
                    <th>Company Name</th>
                    <th>Job Type</th>
                    <th>Job Duration</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $hireGuardiInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($info->guard_job_details->name ?? ''); ?></td>
                        <td><?php echo e($info->companyname ?? ''); ?></td>
                        <td><?php echo e($info->get_guardtype->name ?? ''); ?></td>
                        <td><?php echo e($info->job_duration ?? ''); ?></td>
                        <td>

                            <?php if($info->status == 1): ?>
                            <button class="blueActive" onclick="showToaster()"><i class="fa fa-thumbs-up"></i></button>
                            <?php else: ?>
                                <button class="redActive" onclick="showToaster()"><i class="fa fa-thumbs-down"></i></button>
                            <?php endif; ?>
                            </td>
                        <td>
                            <button class="editBubtton" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModalGuardInfo"
                                onclick="hireGuardInfoModal(<?php echo e($info->id); ?>)"><i class="fas fa-eye"></i></button>
                                <?php if($info->rating_status == 1): ?>
                                    <button class="ratingButtonYellow" type="button"><i class="fa fa-star"
                                             aria-hidden="true"></i></button>
                                 <?php else: ?>
                                 <button class="ratingButton" type="button" data-bs-toggle="modal"
                                 data-bs-target="#exampleModalRating"
                                 onclick="hireGuardRatingModal(<?php echo e($info->id); ?>)"><i class="fa fa-star"
                                     aria-hidden="true"></i></button>
                                 <?php endif; ?>
                            
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                

            </tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="exampleModalGuardInfo" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Show Guard Information</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div id="hireguard_info_modal">
                    <?php echo $__env->make('frontend.client_dashboard.hire-guard-info-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Rating</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div id="hireguard_rating_modal">
                    <?php echo $__env->make('frontend.client_dashboard.hired-guard-rating-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Rating -->


<script type="text/javascript">
    function hireGuardInfoModal(client_info_id) {
        let id = client_info_id;
        console.log(client_info_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "<?php echo e(route('hire.guard.info')); ?>",
            method: "POST",
            data: {
                id: id,
            },
            success: function(data) {
                $("#hireguard_info_modal").html(data.html);
                console.log(data);
            }
        });
    }

    function hireGuardRatingModal(guard_job_id) {
    let id = guard_job_id;
    console.log(guard_job_id);
    document.querySelector('input[name="guardjobid"]').value = guard_job_id;
    }
    function showToaster() {
        // Replace the following with your toaster library function
        // Example using Toastr library
        toastr.info('You cannot change the status.');
    }
</script>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/hire-guard-listing.blade.php ENDPATH**/ ?>