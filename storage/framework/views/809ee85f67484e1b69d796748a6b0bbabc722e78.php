<?php
$getguardtagsData = new App\Models\Tag();
$getguardLanData = new App\Models\Language();
// $getguardtagsData = App\Models\Tag::all();
// $getguardLanData = App\Models\Language::all();

// Now you can use $getguardtagsData and $getguardLanData to access the data retrieved from the database

// dd($getguardtagsData);
?>

<form action="<?php echo e(route('guard.profile.update')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
<div class="row">
    <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="avatar-upload">
            <div class="avatar-edit">
                <input name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                <input name="old_image" type="hidden" class="inputName" value="<?php echo e(Auth::user()->image ?? ''); ?>">
                <label for="imageUpload">
                    <i class="fas fa-edit"></i>
                </label>
            </div>
            <div class="avatar-preview">
                <div id="imagePreview"
                    style="background-image: url('<?php echo e((!empty(Auth::user()->image)) ? asset('storage/uploads/cms/'. Auth::user()->image):asset('storage/uploads/No-image.jpg')); ?>')">
                </div>
            </div>
        </div>
        <div class="profileName">
            <h3><?php echo e(Auth::user()->name ?? ''); ?> </h3>
        </div>
        <div class="sloganText">
            <p><?php echo e(Auth::user()->slogan ?? ''); ?></p>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="profileField">
            <label>First Name.*</label>
            <input name="name" type="text" class="inputName" placeholder="First Name" value="<?php echo e(Auth::user()->name ?? ''); ?>">
            <label>Phone Number .*</label>
            <input id="usercontact" class="inputName" data-wow-delay="0.30s" type="tel"
            name="contact" maxlength="14" value="<?php echo e(Auth::user()->contact ?? ''); ?>"
           pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
            
            <label>Location.*</label>
            <div class="select">
                <select class="serviceDropdown" aria-label="Default select example"
                    id="location" name="userlocation" required>
                    <option selected="" disabled>Location</option>
                    
                    <?php $__currentLoopData = $getlocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>"
                            <?php echo e($value->id == Auth::user()->userlocation ? 'selected' : ''); ?>>
                            <?php echo e($value->location); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            
            <label>License No.*</label>
            <input name="license_no" type="text" class="inputName" placeholder="License No"value="<?php echo e(Auth::user()->license_no ?? ''); ?>">
            <label class="label">Tags.</label>
            <div multi plugin-remove_buttonv class="multipleSelect" style="width:80%">
                <select id="locationSets" multiple="multiple" placeholder="Tags"
                    style="width: 23.2rem" name="tags[]">
                    <?php $__currentLoopData = $getTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>" <?php echo e($value->id == Auth::user()->tag_id ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if(!empty(Auth::user()->tag_id)): ?>
            <?php
                $data = $getguardtagsData->whereIn('id', json_decode(Auth::user()->tag_id ??''))->get();
                //  dd($data);
            ?>
                    <input name="oldtags"
                    value="<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($items->name ?? ''); ?> | <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
                    class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
            <?php else: ?>
            <input name="date" value="No tags available" class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
            <?php endif; ?>
            <label>Starting Rate.*</label>
            <input name="starting_rate" type="number" class="inputName" placeholder="Starting Rate"
            value="<?php echo e(Auth::user()->starting_rate ?? ''); ?>">

            

        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="profileField">
            <label>Last Name.*</label>
            <input name="last_name" type="text" class="inputName" placeholder="Last Name"value="<?php echo e(Auth::user()->last_name ?? ''); ?>">
            <label>Email.*</label>
            <input name="email" type="email" class="inputName" placeholder="Email"value="<?php echo e(Auth::user()->email ?? ''); ?>" readonly>
            <label>Slogan</label>
            <input name="slogan" type="text" class="inputName" placeholder="Slogan" value="<?php echo e(Auth::user()->slogan ?? ''); ?>">
            <label>Company Name.*</label>
            <input name="companyname" type="text" class="inputName" placeholder="Company Name"
            value="<?php echo e(Auth::user()->companyname ?? ''); ?>">
            <label class="label">Language.</label>
            <div class="multipleSelect">
                <select id="locationSetsOne" multiple="multiple" placeholder="Language"
                    style="width: 23.2rem" name="languages[]">
                    <?php $__currentLoopData = $getLanguage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>" <?php echo e($value->id == Auth::user()->language_id ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </select>
            </div>
            <?php if(!empty(Auth::user()->language_id)): ?>
            <?php
                $data = $getguardLanData->whereIn('id', json_decode(Auth::user()->language_id ??''))->get();
                //  dd($data);
            ?>
            <input name="date"
            value="<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($items->name ?? ''); ?> | <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
            class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
            <?php else: ?>
            <input name="date" value="No language available" class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
            <?php endif; ?>
        </div>
    </div>
    <div class="offset-lg-3 offset-md-3 col-lg-8 col-md-12 col-sm-12">
        <div class="profileField">
            <label>Description.*</label>
            <textarea name="description" type="text" class="inputMessage" placeholder="Type Here..."><?php echo e(Auth::user()->description ?? ''); ?></textarea>
            <div class="sendBtn">
                <button type="submit" class="sendButton">Update</button>
            </div>
        </div>
    </div>
</div>
</form>

 

            <?php echo $__env->make('frontend.guard_dashboard.guard-portfolio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 


<script type="text/javascript">
    document.getElementById('usercontact').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
    document.getElementById('phone13').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
</script>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/guard_dashboard/guard-profile.blade.php ENDPATH**/ ?>