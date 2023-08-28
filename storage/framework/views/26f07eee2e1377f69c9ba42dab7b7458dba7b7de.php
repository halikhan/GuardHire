
<form method="GET" action="<?php echo e(route('apply.companies.search')); ?>">
    <?php echo csrf_field(); ?>
<div class="accordion" id="accordionExample">

    <div class="accordion-item accordionItem">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button accordionButton collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
                Search By Services
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
            data-bs-parent="#accordionExample">
            <div class="accordion-body accordionBodyScroll">
                <div class="side_menu">
                    <ul>
                        <li>
                            <?php $__currentLoopData = $getservice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check">
                                    <input name="serachservices[]" class="form-check-input" type="checkbox"
                                        value="<?php echo e($value->id); ?>">

                                    <label class="form-check-label">
                                        <a href="#"><?php echo e($value->service); ?></a>
                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item accordionItem">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button accordionButton collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                aria-controls="collapseTwo">
                Security Type : <span>(<?php echo e(count($getGuardType)); ?> Available)</span>
                
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
            data-bs-parent="#accordionExample">
            <div class="accordion-body accordionBodyScroll">
                <div class="side_menu">
                    <ul>
                        <li>
                            <?php $__currentLoopData = $getGuardType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check">
                                    <input name="serachguardtype[]" class="form-check-input" type="checkbox"
                                        value="<?php echo e($value->id); ?>">
                                    <label class="form-check-label">
                                        <a href="#"><?php echo e($value->name); ?></a>
                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item accordionItem">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button accordionButton collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                aria-controls="collapseThree">
                Budget Rate
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
            data-bs-parent="#accordionExample">
            <div class="accordion-body accordionBodyScroll">
                <div class="side_menu">
                    <select class="serviceDropdown form-select" id="services" placeholder="Select Hourly Rate"
                        style="width: 12.2rem" name="hourlyrate" required>
                        <option  disabled selected>Select Budget Rate</option>
                        <option value="1">$00 - $50</option>
                        <option value="2">$50 - $300</option>
                        <option value="3">$300 - $500</option>
                        <option value="4">$500 and Above</option>
                    </select>
                </div>

                
            </div>
        </div>
    </div>
    <div class="accordion-item accordionItem">
        <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button accordionButton collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                aria-controls="collapseFour">
                Search By Location
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
            data-bs-parent="#accordionExample">
            <div class="accordion-body accordionBodyScroll">

                <div class="side_menu">
                    
                    <ul>
                        <?php $__currentLoopData = $getlocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="form-check">
                                    <input name="serachlocation[]"class="form-check-input" type="checkbox" value="<?php echo e($value->id); ?>">
                                    <label class="form-check-label"><?php echo e($value->location); ?>

                                        
                                    </label>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item accordionItem">
        <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button accordionButton collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                aria-controls="collapseFive">
                Search By Language
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
            data-bs-parent="#accordionExample">
            <div class="accordion-body accordionBodyScroll">
                <div class="side_menu">
                    
                    <ul>
                        <?php $__currentLoopData = $getLanguage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Languagevalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="form-check">
                                    <input name="serachlanguage[]" class="form-check-input" type="checkbox" value="<?php echo e($Languagevalue->id); ?>">
                                    <label class="form-check-label"><?php echo e($Languagevalue->name); ?>

                                        
                                    </label>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item accordionItem">
        <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button accordionButton collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                aria-controls="collapseSix">
                Search By Tags
            </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
            data-bs-parent="#accordionExample">
            <div class="accordion-body accordionBodyScroll">
                <div class="side_menu">
                    <ul>

                        

                        <?php $__currentLoopData = $getAlltag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagsvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="form-check">
                                    <input name="serachtags[]" class="form-check-input" type="checkbox" value="<?php echo e($tagsvalue->id); ?>">
                                    <label class="form-check-label"><?php echo e($tagsvalue->name); ?>

                                        
                                    </label>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="applyFilter">
    <p>Click “Apply Filter” to apply
        latest changes made by you</p>
    <a href="#"><button type="submit" class="exploreButton">Apply Filter</button></a>
</div>
</form>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/applyfilters.blade.php ENDPATH**/ ?>