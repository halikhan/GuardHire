<?php $__env->startSection('title', 'Guard-Hire | Client dashboard'); ?>
<?php $__env->startSection('clientcontent'); ?>
<style>


    .rating {
        float: left;
        width: fit-content;
    }

    .rating label {
        color: #90A0A3;
        float: right;
        font-size: 20px;
        margin-left: 1rem;
    }

    .rating input[type="radio"] {
        display: none;
    }

    .rating input[type="radio"]:checked~label {
        color: #003d70;
    }

    .checked {
  color: #d98d08 !important;
}

</style>

    <div class="pageMainWrapper">
        <div class="container-fluid paddingLeft">
        <div class="row">
            <div class="col-lg-3 col-md-1">
            <nav class="sideNavBar">
                <ul class="nav nested nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link navLink active" id="pillsOneTab" data-bs-toggle="pill" data-bs-target="#pillsOne" type="button" role="tab" aria-controls="pillsOneTab" aria-selected="false">
                    <span class="icon"><i class="fas fa-user"></i><small>Profile</small></span>
                    <span class="title">Profile</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link navLink" id="pillsFourTab" data-bs-toggle="pill" data-bs-target="#pillsFour" type="button" role="tab" aria-controls="pillsFourTab" aria-selected="false">
                    <span class="icon"><i class="fas fa-briefcase"></i><small>Post a Request</small></span>
                    <span class="title">Post a Request</span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link navLink" id="pillsTwoTab" data-bs-toggle="pill" data-bs-target="#pillsTwo1" type="button" role="tab" aria-controls="pillsTwoTab1" aria-selected="false">
                    <span class="icon"><i class="fas fa-user-shield"></i><small>Hired Guard</small></span>
                    <span class="title">Hired Guard</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link navLink" id="pillsTwoTab" data-bs-toggle="pill" data-bs-target="#pillsTwo" type="button" role="tab" aria-controls="pillsTwoTab" aria-selected="false">
                    <span class="icon"><i class="fas fa-user-shield"></i><small>Hired Listing</small></span>
                    <span class="title">Hired Listing </span>
                    </button>
                </li>
                
                <a href="<?php echo e(url('/chatify')); ?>">
                    <li class="nav-item" role="presentation">
                    <button class="nav-link navLink" id="pillsThreeTab" data-bs-toggle="pill" data-bs-target="#pillsThree" type="button" role="tab" aria-controls="pillsThreeTab" aria-selected="false">

                        <span class="icon">
                        <i class="fas fa-comments"></i>
                        <small>Chat</small></span>
                        
                    <span class="title">Chat</span>
                    </button>
                </li>
                 </a>
                <li class="nav-item" role="presentation">
                    <button class="nav-link navLink" id="pillsFiveTab" data-bs-toggle="pill" data-bs-target="#pillsFive" type="button" role="tab" aria-controls="pillsFiveTab" aria-selected="false">
                    <span class="icon"><i class="fas fa-heart"></i><small>Wishlist</small></span>
                    <span class="title">Wishlist</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link navLink tabButtonOne" id="pillsFourTabreviews" data-bs-toggle="pill"
                        data-bs-target="#pillsFourreviews" type="button" role="tab" aria-controls="pillsFourTabreviews"
                        aria-selected="false">
                        <span class="icon"><i class="fas fa-star"></i><small>Reviews </small></span>
                        <span class="title">Reviews</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link navLink" id="pillsSixTab" data-bs-toggle="pill" data-bs-target="#pillsSix" type="button" role="tab" aria-controls="pillsSixTab" aria-selected="false">
                    <span class="icon"><i class="fas fa-lock"></i><small>Change Password</small></span>
                    <span class="title">Change Password</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link navLink" id="pillsSixTab" data-bs-toggle="pill"
                        data-bs-target="#pillseight" type="button" role="tab"
                        aria-controls="pillsSixTab" aria-selected="false">
                        <span class="icon"><i class="fas fa-info"></i><small>Help!</small></span>
                        <span class="title">Help</span>
                    </button>
                </li>
                <a href="<?php echo e(route('user.logout')); ?>">
                    <li class="nav-item" role="presentation">
                    <button class="navLink" id="pillsSevenTab" data-bs-toggle="pill" data-bs-target="#pillsSeven" type="button" role="tab" aria-controls="pillsSevenTab" aria-selected="false">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i><small>Log Out</small></span>
                        <span class="title">Log Out</span>
                    </button>
                    </li>
                </a>
                </ul>
            </nav>
            </div>
            <div class="col-lg-9 col-md-11">
            <div class="tab-content marginTop" id="pills-tabContent">

                

                <div class="tab-pane fade active show" id="pillsOne" role="tabpanel" aria-labelledby="pillsOneTab">
                <?php echo $__env->make('frontend.client_dashboard.client-profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                

                <div class="tab-pane fade" id="pillsTwo" role="tabpanel" aria-labelledby="pillsTwoTab">
                    <?php echo $__env->make('frontend.client_dashboard.hire-guard-listing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
                        

                        <div class="tab-pane fade" id="pillsTwo1" role="tabpanel" aria-labelledby="pillsTwoTab1">
                            <?php echo $__env->make('frontend.client_dashboard.hire-companies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                

                <div class="tab-pane fade" id="1pillsThree" role="tabpanel" aria-labelledby="pillsThreeTab">

                    

                    
                
                </div>

                         
                         <div class="tab-pane fade tabContentOnereviews" id="pillsFourreviews" role="tabpanel"
                         aria-labelledby="pillsFourTabreviews">
                         <?php echo $__env->make('frontend.client_dashboard.client-reviews-tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     </div>
                

                <div class="tab-pane fade" id="pillsFour" role="tabpanel" aria-labelledby="pillsFourTab">
                    <?php echo $__env->make('frontend.client_dashboard.client-post-job', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                

                <div class="tab-pane fade" id="pillsFive" role="tabpanel" aria-labelledby="pillsFiveTab">
                    <?php echo $__env->make('frontend.client_dashboard.client-wishlist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                

                <div class="tab-pane fade" id="pillsSix" role="tabpanel" aria-labelledby="pillsSixTab">
                    <?php echo $__env->make('frontend.client_dashboard.client-change-password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                

                </div>

                


                <div class="tab-pane fade" id="pillseight" role="tabpanel" aria-labelledby="pillsOneTab">
                    <div class="cstm-form-box-width">
                        <?php echo $__env->make('frontend.client_dashboard.client-help', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>



  <!-- Start Modal Add Guard -->

  

  <!-- End Modal Add Guard -->

  <!-- Start Modal Edit Guard -->



  <!-- End Modal Edit Guard -->

  <!-- Start Modal Rating -->

  

  <!-- End Modal Rating -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.client_dashboard.client_layouts.client_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/client_dashboard/client-dashboard.blade.php ENDPATH**/ ?>