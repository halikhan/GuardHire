

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="profileField">
            <label>Guard Name</label>
            <input type="text" value="<?php echo e($companyinfo->guard_job_details->name ??''); ?>" class="inputName"
                placeholder="Client Name" readonly>
            <label>Guard Location</label>
            <input type="text" value="<?php echo e($companyinfo->guard_job_details->guard_location->location ?? 'N/A'); ?>"
                class="inputName" placeholder="Client Number" readonly>
            <label>Guard Email</label>
            <input type="email" value="<?php echo e($companyinfo->guard_job_details->email ??''); ?>"
                class="inputName" placeholder="Client Email" readonly>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="profileField">
            <label>Company Name</label>
            <input type="text" value="<?php echo e($companyinfo->guard_job_details->companyname ?? 'N/A'); ?>" class="inputName" placeholder="Job Type" readonly>
            
            <label>Starting Rate</label>
            <input type="text" value="$<?php echo e($companyinfo->guard_job_details->starting_rate ?? '0.00'); ?>"
                class="inputName" placeholder="Client Number" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="profileField">
            <label>Description</label>
                <textarea name="description" type="text" class="inputMessage" placeholder="Type Here..." readonly><?php echo e($companyinfo->guard_job_details->description ?? ''); ?></textarea>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/hire-companies-info-modal.blade.php ENDPATH**/ ?>