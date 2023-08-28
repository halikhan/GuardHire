<?php
$getclientTagsData = new App\Models\Tag();
$getclientLanData = new App\Models\Language();
// dd($getlocation);
?>

<form action="<?php echo e(route('client.profile.update')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12">

            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload">
                        <i class="fas fa-edit"></i>
                    </label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview"
                        style="background-image: url('<?php echo e(!empty(Auth::user()->image) ? asset('storage/uploads/cms/' . Auth::user()->image) : asset('storage/uploads/No-image.jpg')); ?>')">
                    </div>
                </div>
            </div>
            <div class="profileName">
                <h3><?php echo e(Auth::user()->name ?? ''); ?> </h3>
            </div>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="profileField">
                <label>First Name</label>
                <input name="name" type="text" class="inputName" placeholder="First Name"
                    value="<?php echo e(Auth::user()->name ?? ''); ?>">
                <label>Phone Number</label>
                <input name="contact" type="text" min="0" class="inputName"
                    placeholder="Phone Number"value="<?php echo e(Auth::user()->contact ?? ''); ?>">
                <label>Location</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="location"
                        name="userlocation">
                        <option selected="" disabled>Location</option>
                        <?php $__currentLoopData = $getlocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e($value->id == optional(Auth::user())->userlocation ? 'selected' : ''); ?>>
                                <?php echo e($value->location); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <label class="label">Language.</label>
                <div class="multipleSelect">
                    <select id="locationSetsOne" multiple="multiple" placeholder="Language" style="width: 23.2rem"
                        name="languages[]">
                        <?php $__currentLoopData = $getLanguage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e($value->id == optional(Auth::user())->language_id ? 'selected' : ''); ?>>
                                <?php echo e($value->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php if(!empty(Auth::user()->language_id)): ?>
                    <?php
                        $data = $getclientLanData->whereIn('id', json_decode(Auth::user()->language_id ?? ''))->get();
                        //  dd($data);
                    ?>
                    <input name="date" value="<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($items->name ?? ''); ?> | <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
                        class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
                <?php else: ?>
                    <input name="date" value="No language available" class="form-control btn-square"
                        id="exampleFormControlInput10" type="text" readonly>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="profileField">
                <label>Last Name</label>
                <input name="last_name" type="text" class="inputName"
                    placeholder="Last Name"value="<?php echo e(Auth::user()->last_name ?? ''); ?>">
                <label>Email</label>
                <input name="email" type="email" class="inputName"
                    placeholder="Email"value="<?php echo e(Auth::user()->email ?? ''); ?>" readonly>
                <label>Services</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="services" name="services"
                        required>
                        <option selected disabled>Services</option>
                        <?php $__currentLoopData = $getservice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e($value->id == optional(Auth::user())->services ? 'selected' : ''); ?>>
                                <?php echo e($value->service); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <label class="label">Tags.</label>
                <div class="multipleSelect selectize-control multi plugin-remove_button">
                    <select id="locationSets" multiple="multiple" placeholder="Tags" style="width: 23.2rem"
                        name="tags[]">
                        <?php $__currentLoopData = $getTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e($value->id == optional(Auth::user())->tag_id ? 'selected' : ''); ?>>
                                <?php echo e($value->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <?php if(!empty(Auth::user()->tag_id)): ?>
                    <?php
                        $data = $getclientTagsData->whereIn('id', json_decode(Auth::user()->tag_id ?? ''))->get();
                        //  dd($data);
                    ?>
                    <input name="oldtags" value="<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($items->name ?? ''); ?> | <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
                        class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
                <?php else: ?>
                    <input name="date" value="No tags available" class="form-control btn-square"
                        id="exampleFormControlInput10" type="text" readonly>
                <?php endif; ?>

            </div>
        </div>

        <div class="offset-lg-3 offset-md-3 col-lg-8 col-md-12 col-sm-12">
            <div class="profileField">
                <label>Description</label>
                <textarea name="description" type="text" class="inputMessage" placeholder="Type Here..."><?php echo e(Auth::user()->description ?? ''); ?></textarea>
                <div class="sendBtn">
                    <button type="submit" class="sendButton">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/client-profile.blade.php ENDPATH**/ ?>