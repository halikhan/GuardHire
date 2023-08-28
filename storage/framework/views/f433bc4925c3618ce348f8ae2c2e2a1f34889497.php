
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
        
        <table id="exampleTwo" class="table table-striped dataTable" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Client Name</th>
                    <th>Client Number</th>
                    <th>Client Email</th>
                    <th>Client Location</th>
                    <th>Job Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $getClientInformation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $clientjob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $hasValidGuardCreditPts = false;
                    foreach ($clientjob->guard_credit_pts as $guard_credit_pt) {
                        if (Auth::check() && Auth::id() == $guard_credit_pt['guard_id']) {
                            $hasValidGuardCreditPts = true;
                            break;
                        }
                    }
                ?>
                <?php if($hasValidGuardCreditPts): ?>
                    <tr>
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($clientjob->client_postjob_details->name ??''); ?>

                            <?php echo e($clientjob->client_postjob_details->last_name ??''); ?></td>
                        <td><?php echo e($clientjob->client_postjob_details->contact ??''); ?></td>
                        <td><?php echo e($clientjob->client_postjob_details->email ??''); ?></td>
                        <td><?php echo e($clientjob->client_location->location ??''); ?></td>
                        <td><?php echo e($clientjob->get_guardtype->name ??''); ?></td>

                        
                        

                        <td>
                            <?php if($clientjob->status == 1): ?>
                                <button class="blueActive" onclick="get_client_statusid()"><i class="fa fa-thumbs-up"></i></button>
                            <?php else: ?>
                                <button class="redActive" onclick="get_client_statusid()"><i class="fa fa-thumbs-down"></i></button>
                            <?php endif; ?>

                        </td>
                        <td>
                            <button class="editBubtton" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModalClientEdit" onclick="clientInfoModal(<?php echo e($clientjob->id); ?>)"><i class="fas fa-eye"></i></button>
                            <?php
                                $checkstatusofrating = App\Models\ClientRatingByGuard::where('client_id', $clientjob->client_postjob_details->id)->where('guard_id', Auth::id())->first();
                                    //  @dd($clientjob->client_postjob_details->id)
                          ?>
                        <?php if(isset($checkstatusofrating) && is_object($checkstatusofrating) && $checkstatusofrating->status == 1): ?>
                        <button class="ratingButtonYellow" type="button"><i class="fa fa-star" aria-hidden="true"></i></button>
                         <?php else: ?>
                         <button class="ratingButton" type="button" data-bs-toggle="modal"
                         data-bs-target="#exampleModalRatingClient"
                         onclick="hireCompanyRatingModal(<?php echo e($clientjob->client_postjob_details->id ??''); ?>)"><i class="fa fa-star"
                             aria-hidden="true"></i>
                        </button>
                         <?php endif; ?>
                            <button class="ratingButton" type="button" data-bs-toggle="modal" onclick="clientCommentModal(<?php echo e($clientjob->id); ?>)"
                                data-bs-target="#exampleModalChat"><i class="fas fa-comments"></i></button>
                            
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
            </tbody>
        </table>

        
    </div>
</div>
    <!-- End Modal Edit Client -->

    <!-- Start Modal Add Client -->

    

    <!-- End Modal Add Client -->
    <!-- Start Modal Chat -->

    <div class="modal fade" id="exampleModalChat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Chat Box</h1>
                    <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    
                    <div id="client_comment_modal">
                        <?php echo $__env->make('frontend.guard_dashboard.client-comment-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        

                </div>
            </div>
        </div>
    </div>

    <!-- End Modal Chat -->
    <!-- Start Modal Edit Client -->

    <div class="modal fade" id="exampleModalClientEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Client Information</h1>
                    <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <?php if($getClientInformation->count() > 0): ?>
                    <div id="client_info_modal">
                        <?php echo $__env->make('frontend.guard_dashboard.client-info-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php endif; ?>
                </div>
                
            </div>
        </div>
    </div>


<div class="modal fade" id="exampleModalRatingClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Rating</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div id="hireguard_rating_modal">
                    <?php echo $__env->make('frontend.guard_dashboard.hired-client-by-guard-rating-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Rating -->
    <!-- End Modal Rating -->
<script type="text/javascript">

function hireCompanyRatingModal(guard_job_id) {
    let id = guard_job_id;
    console.log(guard_job_id);
    document.querySelector('input[name="client_id"]').value = guard_job_id;
    }

    function clientInfoModal(client_info_id){
       let id = client_info_id;
       console.log(client_info_id);
         $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url:"<?php echo e(route('client.info.edit')); ?>",
           method:"POST",
           data:{
               id:id,
           },
           success: function(data) {
           console.log(data);
           $("#client_info_modal").html(data.html);
       }
       });
   }

   function clientCommentModal(client_info_id){
       let id = client_info_id;
       console.log(client_info_id);
         $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url:"<?php echo e(route('client.comment.modal')); ?>",
           method:"POST",
           data:{
               id:id,
           },
           success: function(data) {
           console.log(data);
           $("#client_comment_modal").html(data.html);
       }
       });
   }

   function get_client_statusid() {
        // console.log(old_packageid);
        toastr.info('Your cant change client status');
    }
   </script>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/guard_dashboard/client-info-guard-tab.blade.php ENDPATH**/ ?>