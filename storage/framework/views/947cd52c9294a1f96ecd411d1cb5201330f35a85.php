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
                    <th>Guard Location</th>
                    <th>Starting Rate</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $hireCopmaniesInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $companyinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($companyinfo->guard_job_details->name ?? 'N/A'); ?></td>
                        <td><?php echo e($companyinfo->guard_job_details->companyname ?? 'N/A'); ?></td>
                        <td><?php echo e($companyinfo->guard_job_details->guard_location->location ?? 'N/A'); ?></td>
                        <td>$<?php echo e($companyinfo->guard_job_details->starting_rate ?? '0.00'); ?></td>
                        <td>
                            <?php if($companyinfo->status == 1): ?>
                                <button class="blueActive"><i class="fa fa-thumbs-up"></i></button>
                            <?php else: ?>
                                <button class="redActive"><i class="fa fa-thumbs-down"></i></button>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button class="editBubtton" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModalGuardcompanyinfo"
                                onclick="hireCompanyinfoModal(<?php echo e($companyinfo->id); ?>)"><i class="fas fa-eye"></i></button>
                                <?php if($companyinfo->rating_status == 1): ?>
                                    <button class="ratingButtonYellow" type="button"><i class="fa fa-star"
                                             aria-hidden="true"></i></button>
                                 <?php else: ?>
                                 <button class="ratingButton" type="button" data-bs-toggle="modal"
                                 data-bs-target="#exampleModalRatingcompanyinfo"
                                 onclick="hireCompanyRatingModal(<?php echo e($companyinfo->company_id); ?>)"><i class="fa fa-star"
                                     aria-hidden="true"></i></button>
                                 <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModalGuardcompanyinfo" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Show Guard Iformation</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div id="hireCompany_info_modal">
                    <?php echo $__env->make('frontend.client_dashboard.hire-companies-info-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalRatingcompanyinfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Rating</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div id="hireguard_rating_modal">
                    <?php echo $__env->make('frontend.client_dashboard.hired-companies-rating-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Rating -->


<script type="text/javascript">
    function hireCompanyinfoModal(client_info_id) {
        let id = client_info_id;
        console.log(client_info_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "<?php echo e(route('hire.companies.info')); ?>",
            method: "POST",
            data: {
                id: id,
            },
            success: function(data) {
                $("#hireCompany_info_modal").html(data.html);
                console.log(data);
            }
        });
    }

    function hireCompanyRatingModal(guard_job_id) {
    let id = guard_job_id;
    console.log(guard_job_id);
    document.querySelector('input[name="guardCompanyid"]').value = guard_job_id;
    }

</script>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/hire-listing.blade.php ENDPATH**/ ?>