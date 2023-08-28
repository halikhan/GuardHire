<?php $__env->startSection('title', 'Project List'); ?>
<?php $__env->startSection('title', 'Base Inputs'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/dropzone.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Users</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Users </li>
    <li class="breadcrumb-item active">list</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit</h5>
                    </div>
                    
                    <form class="form theme-form" action="<?php echo e(route('user_update', $edit_data->id)); ?>"
                        enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10"> First Name.*</label>
                                        <input name="name" class="form-control btn-square" id="exampleFormControlInput10"
                                            value="<?php echo e($edit_data->name); ?>" type="text" placeholder="First Name">
                                            <input name="type" value="<?php echo e($edit_data->type); ?>" type="hidden" placeholder="First Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Last Name.*</label>
                                        <input name="last_name" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="text"
                                            value="<?php echo e($edit_data->last_name); ?>" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Email.*</label>
                                        <input name="email" class="form-control btn-square" id="exampleFormControlInput10"
                                            type="email" value="<?php echo e($edit_data->email); ?>" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="inputState">Phone.*</label>
                                        <input id="phone1" class="form-control btn-square" type="tel"
                                            placeholder="Phone No." name="contact" value="<?php echo e($edit_data->contact); ?>"
                                            maxlength="14" pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Location.*</label>
                                        <select name="userlocation" class="form-select" size="1">
                                            
                                            
                                            <?php $__currentLoopData = $getlocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>" <?php echo e($value->id == $edit_data->userlocation ? 'selected' : ''); ?>>
                                                    <?php echo e($value->location ?? ''); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Upload Image.*</label>
                                        <div class="col-sm-12">
                                            <input name="image" class="form-control" type="file">
                                            <input name="oldimage" class="form-control" value="<?php echo e($edit_data->image); ?>"
                                                type="hidden">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3" style="display: none;">
                                        <select name="type" class="form-select" size="1">
                                            <option selected disabled>Type</option>
                                            <option value="2"<?php echo e($edit_data->type == 2 ? 'selected' : ''); ?>>Security
                                                Company</option>
                                            <option value="3" <?php echo e($edit_data->type == 3 ? 'selected' : ''); ?>>Hire
                                                Security Services</option>
                                        </select>
                                        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="help-block" style="color: red">
                                                <?php echo e($errors->first('type')); ?>

                                            </p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlInput10">Status.*</label>
                                    <div class="mb-3">
                                        <label class="switch">
                                            <?php if($edit_data->status == 1): ?>
                                            <input name="status" type="checkbox" checked>
                                            <?php else: ?>
                                            <input name="status" type="checkbox">
                                            <?php endif; ?>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlInput10">Featured Status.*</label>
                                    <div class="mb-3">
                                        <label class="switch">
                                            <?php if($edit_data->featured_status == 1): ?>
                                            <input name="featured_status" type="checkbox" checked>
                                            <?php else: ?>
                                            <input name="featured_status" type="checkbox">
                                            <?php endif; ?>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Password.*</label>
                                        <input name="password" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="password" value="<?php echo e(old('password')); ?>"
                                            placeholder="Password">
                                        <input name="oldpassword" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="hidden"
                                            value="<?php echo e($edit_data->password); ?>" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            

                        </div>

                        
                        <div class="card-footer">
                            <button class="btn btn-primary mailregister" type="submit">Submit</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script>
        let autocomplete;
        let address1Field;
        let postalField;

        function initAutocomplete() {
            address1Field = document.querySelector("#ship-address");
            postalField = document.querySelector("#postcode");
            // addresses in the US and Canada.
            autocomplete = new google.maps.places.Autocomplete(address1Field, {
                componentRestrictions: {
                    country: ["us"]
                },
                fields: ["address_components", "geometry"],
                types: ["address"],
            });
            address1Field.focus();
            autocomplete.addListener("place_changed", fillInAddress);
        }

        function fillInAddress() {
            const place = autocomplete.getPlace();
            let address1 = "";
            let postcode = "";
            document.getElementById('latitude_input').value = place.geometry.location.lat();
            document.getElementById('longitude_input').value = place.geometry.location.lng();
            for (const component of place.address_components) {
                const componentType = component.types[0];
                // console
                switch (componentType) {
                    case "street_number": {
                        address1 = `${component.long_name} ${address1}`;
                        break;
                    }

                    case "route": {
                        address1 += component.short_name;
                        break;
                    }

                    case "postal_code": {
                        postcode = `${component.long_name}${postcode}`;
                        break;
                    }
                    case "locality":
                        document.querySelector("#locality").value = component.long_name;
                        break;
                    case "administrative_area_level_1": {
                        document.querySelector("#state").value = component.short_name;
                        break;
                    }
                }
            }

            address1Field.value = address1;
            postalField.value = postcode;
        }
    </script>
    <script type="text/javascript">
        $("#regiterForm").submit(function() {
            $("#pageloader").fadeIn();
        });
    </script>
    <script>
        $(document).ready(function() {
            var dateToday = new Date();
            var month = dateToday.getMonth() + 1;
            var day = dateToday.getDate();
            var year = dateToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#txt-appoint_date').attr('min', maxDate);
        });
    </script>
    <script type="text/javascript">
        document.getElementById('phone1').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
        document.getElementById('phone13').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>


    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dropzone/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dropzone/dropzone-script.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/users/edit.blade.php ENDPATH**/ ?>