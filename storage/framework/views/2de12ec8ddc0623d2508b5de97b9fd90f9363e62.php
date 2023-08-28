
<form id="upload-form" method="post" action="<?php echo e(route('store.hire.guard.rating')); ?>" enctype="multipart/form-data">

        
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <input name="guardjobid" type="hidden">
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
                    <textarea type="text" name="message" class="inputMessage" placeholder="Type Here..." required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="addJobButton">Save</button>
        </div>
</form>

<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/hired-guard-rating-modal.blade.php ENDPATH**/ ?>