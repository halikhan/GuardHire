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
            
            <div class="col-lg-12">
                <div class="profileName mb-4">
                    <h3><?php echo e(Auth::user()->name ?? ''); ?> Reviews</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-11 col-md-11 col-sm-12">

                    <table id="exampleFour" class="table table-striped dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Guard Name</th>
                                <th>Company Name</th>
                                
                                
                                <th>Guard Message</th>
                                <th> Rating</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $clientRating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ratings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    
                                    <td><?php echo e($ratings->get_rated_client_name->name ?? ''); ?></td>
                                    <td><?php echo e($ratings->get_rated_client_name->companyname ?? ''); ?></td>
                                    
                                    <td><?php echo e($ratings->message ?? ''); ?></td>
                                    <td>
                                        <?php if($ratings->rate ?? ''): ?>
                                        
                                        <span class="fa fa-star<?php echo e($ratings->rate >= 1 ? ' checked' : ''); ?>"></span>
                                        <span class="fa fa-star<?php echo e($ratings->rate >= 2 ? ' checked' : ''); ?>"></span>
                                        <span class="fa fa-star<?php echo e($ratings->rate >= 3 ? ' checked' : ''); ?>"></span>
                                        <span class="fa fa-star<?php echo e($ratings->rate >= 4 ? ' checked' : ''); ?>"></span>
                                        <span class="fa fa-star<?php echo e($ratings->rate == 5 ? ' checked' : ''); ?>"></span>
                                        <?php else: ?>
                                            no rating found
                                        <?php endif; ?>
                                    </td>
                                    

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

    <!-- Start Modal Edit Client -->

    <!-- End Modal Rating -->
    <script type="text/javascript">
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
   </script>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/client-reviews-tab.blade.php ENDPATH**/ ?>