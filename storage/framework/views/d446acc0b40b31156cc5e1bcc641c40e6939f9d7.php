<?php $__env->startSection('title', 'Guard-Hire | guard dashboard'); ?>
<?php $__env->startSection('guardcontent'); ?>
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
                                <button class="nav-link navLink active" id="pillsOneTab" data-bs-toggle="pill"
                                    data-bs-target="#pillsOne" type="button" role="tab" aria-controls="pillsOneTab"
                                    aria-selected="false">
                                    <span class="icon"><i class="fas fa-user"></i><small>Profile</small></span>
                                    <span class="title">Profile</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link navLink" id="pillsTwoTab" data-bs-toggle="pill"
                                    data-bs-target="#pillsTwo" type="button" role="tab" aria-controls="pillsTwoTab"
                                    aria-selected="false">
                                    <span class="icon"><i class="fas fa-briefcase"></i><small>My Job</small></span>
                                    <span class="title">My Job</span>
                                </button>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <button class="nav-link navLink" id="pillsThreeTab" data-bs-toggle="pill"
                                    data-bs-target="#pillsThree" type="button" role="tab" aria-controls="pillsThreeTab"
                                    aria-selected="false">
                                    <span class="icon"><i class="fas fa-cube"></i><small>Package</small></span>
                                    <span class="title">Package</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link navLink tabButtonOne" id="pillsFourTab" data-bs-toggle="pill"
                                    data-bs-target="#pillsFour" type="button" role="tab" aria-controls="pillsFourTab"
                                    aria-selected="false">
                                    <span class="icon"><i class="fas fa-info"></i><small>Client Management</small></span>
                                    <span class="title">Client Management</span>
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
                                <button class="nav-link navLink" id="pillsSixTab" data-bs-toggle="pill"
                                    data-bs-target="#pillsSix" type="button" role="tab" aria-controls="pillsSixTab"
                                    aria-selected="false">
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
                                    <button class="navLink" id="pillsSevenTab" data-bs-toggle="pill"
                                        data-bs-target="#pillsSeven" type="button" role="tab"
                                        aria-controls="pillsSevenTab" aria-selected="false">
                                        <span class="icon"><i class="fas fa-sign-out-alt"></i><small>Log
                                                Out</small></span>
                                        <span class="title">Log Out</span>
                                    </button>
                                </li>
                            </a>

                        </ul>
                    </nav>
                </div>

                <div class="col-lg-9 col-md-11">
                    <div class="tab-content marginTop" id="pills-tabContent">

                        
                        <div class="tab-pane fade active show" id="pillsOne" role="tabpanel"
                            aria-labelledby="pillsOneTab">
                            <?php echo $__env->make('frontend.guard_dashboard.guard-profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        

                        <div class="tab-pane fade" id="pillsTwo" role="tabpanel" aria-labelledby="pillsTwoTab">

                            <?php echo $__env->make('frontend.guard_dashboard.guard-job', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>

                        

                        <div class="tab-pane fade" id="pillsEight" role="tabpanel" aria-labelledby="pillsEightTab">
                            <?php echo $__env->make('frontend.guard_dashboard.guard-portfolio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        

                        <div class="tab-pane fade" id="pillsThree" role="tabpanel" aria-labelledby="pillsThreeTab">
                            <?php echo $__env->make('frontend.guard_dashboard.guard-package', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        
                        <div class="tab-pane fade tabContentOne" id="pillsFour" role="tabpanel"
                            aria-labelledby="pillsFourTab">
                            <?php echo $__env->make('frontend.guard_dashboard.client-info-guard-tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>

                         
                         <div class="tab-pane fade tabContentOnereviews" id="pillsFourreviews" role="tabpanel"
                         aria-labelledby="pillsFourTabreviews">
                         <?php echo $__env->make('frontend.guard_dashboard.guard-reviews-tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     </div>

                        
                        <div class="tab-pane fade tabContentTwo" id="pillsFive2" role="tabpanel"
                            aria-labelledby="pillsFiveTab">
                            <div class="row">
                                <div class="col-lg-3 col-md-11 col-sm-11 chatRight">
                                    <div class="chatListBox">
                                        <div class="chatListHeading">
                                            <h4>My Chat List</h4>
                                        </div>
                                        <ul class="nav  mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item chatList" role="presentation">
                                                <div class="chatList active" id="pillsChatOneTab" data-bs-toggle="pill"
                                                    data-bs-target="#pillsChatOne" role="tab"
                                                    aria-controls="pillsChatOneTab" aria-selected="true">
                                                    <div class="chatNameList">
                                                        <div class="chatImage">
                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                alt="">
                                                            <div class="activeIcon">
                                                                <i class="fas fa-circle"></i>
                                                            </div>
                                                        </div>
                                                        <div class="chatNameBox">
                                                            <div class="chatNameDate">
                                                                <h6>John Smith</h6>
                                                                <span>1/12/2022</span>
                                                            </div>
                                                            <div class="chatText">
                                                                <p>Lorem ipsum dolor sit amet.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item chatList" role="presentation">
                                                <div class="chatList" id="pillsChatOneTab" data-bs-toggle="pill"
                                                    data-bs-target="#pillsChatTwo" role="tab"
                                                    aria-controls="pillsChatTwoTab" aria-selected="false">
                                                    <div class="chatNameList">
                                                        <div class="chatImage">
                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                alt="">
                                                            <div class="activeIcon">
                                                                <i class="fas fa-circle"></i>
                                                            </div>
                                                        </div>
                                                        <div class="chatNameBox">
                                                            <div class="chatNameDate">
                                                                <h6>John Smith</h6>
                                                                <span>1/12/2022</span>
                                                            </div>
                                                            <div class="chatText">
                                                                <p>Lorem ipsum dolor sit amet.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-12 col-sm-12 chatLeft">
                                    <div class="tab-content" id="pills-tabContent1">

                                        <div class="tab-pane fade show active" id="pillsChatOne" role="tabpanel"
                                            aria-labelledby="pillsChatOneTab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-11 col-md-12 col-sm-12 chatLeft">
                                                        <div class="chatBox">
                                                            <div class="chatMessage">
                                                                <div class="chatHeader">
                                                                    <div class="chatHeaderDetail">
                                                                        <div class="chatHeaderImage">
                                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="chatHeaderName">
                                                                            <h6>John Smith</h6>
                                                                        </div>
                                                                        <div class="chatHeaderActive">
                                                                            <i class="fas fa-circle"></i>
                                                                            <span>Active</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="messageBox">
                                                                    <div class="chatMessageLeft">
                                                                        <div class="chatMessageImage">
                                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="chatLeftText">
                                                                            <div class="chatLeftNameDate">
                                                                                <h6>John Smith</h6>
                                                                                <span>1/12/2022</span>
                                                                            </div>
                                                                            <p>Lorem ipsum dolor sit, consectetuer
                                                                                adipiscing elit...</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="today">
                                                                        <span>Today</span>
                                                                    </div>
                                                                    <div class="chatMessageRight">
                                                                        <div class="chatLeftText">
                                                                            <div class="chatLeftNameDate">
                                                                                <h6>John Smith</h6>
                                                                                <span>1/12/2022</span>
                                                                            </div>
                                                                            <p>Lorem ipsum dolor sit, consectetuer
                                                                                adipiscing elit...</p>
                                                                        </div>
                                                                        <div class="chatMessageImage">
                                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="chatMessageLeft">
                                                                        <div class="chatMessageImage">
                                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="chatLeftText">
                                                                            <div class="chatLeftNameDate">
                                                                                <h6>John Smith</h6>
                                                                                <span>1/12/2022</span>
                                                                            </div>
                                                                            <p>Lorem ipsum dolor sit, consectetuer
                                                                                adipiscing elit...</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="chatMessageRight">
                                                                        <div class="chatLeftText">
                                                                            <div class="chatLeftNameDate">
                                                                                <h6>John Smith</h6>
                                                                                <span>1/12/2022</span>
                                                                            </div>
                                                                            <p>Lorem ipsum dolor sit, consectetuer
                                                                                adipiscing elit...</p>
                                                                        </div>
                                                                        <div class="chatMessageImage">
                                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                                alt="">
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                            <div class="testArea">
                                                                <textarea type="text" class="inputTextArea" placeholder="Type a message..."></textarea>
                                                                <!-- <div class="attach">
                                          <label class="filelabel">
                                            <i class="fa fa-paperclip">
                                            </i>
                                            <input class="FileUpload1" id="FileInput" name="booking_attachment" type="file" />
                                          </label>
                                        </div> -->
                                                                <div class="submit">
                                                                    <button class="submitButton"><i
                                                                            class="fas fa-location-arrow"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-4 col-md-12 col-sm-12 chatLeft">
                                    <div class="chatDetailBox">
                                      <div class="chatDetails">
                                        <div class="chatHeaderImage profileImageDetail">
                                          <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png" alt="">
                                        </div>
                                        <div class="chatHeaderName mt-2">
                                          <h6>John Smith</h6>
                                        </div>
                                        <div class="profileEmail">
                                          <p>JohnSmith@gmail.com</p>
                                        </div>
                                        <div class="connectIcon">
                                          <a href="tel:440-787-6158"><i class="fas fa-phone-alt"></i></a>
                                          <a href="#"><i class="fas fa-video"></i></a>
                                          <a href="mailto:Btboland@icloud.com"><i class="fas fa-envelope"></i></a>
                                        </div>
                                      </div>
                                      <div class="shareDetail">

                                        <ul class="nav mb-3" id="pills-tab" role="tablist">

                                          <li role="presentation">
                                            <button class="imageTab active" id="pillsImageTab" data-bs-toggle="pill" data-bs-target="#pillsImage" type="button" role="tab" aria-controls="pillsImageTab" aria-selected="true">Image</button>
                                          </li>
                                          <li role="presentation">
                                            <button class="fileTab" id="pillsFileTab" data-bs-toggle="pill" data-bs-target="#pillsFile" type="button" role="tab" aria-controls="pillsFileTab" aria-selected="false">Shared Files</button>
                                          </li>

                                        </ul>

                                        <div class="tab-content" id="pills-tabContent2">

                                          <div class="tab-pane fade show active" id="pillsImage" role="tabpanel" aria-labelledby="pillsImageTab">
                                            <div class="shareImagesBox">

                                              <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                  <div class="shareImages">
                                                    <img src="<?php echo e(asset('frontend/guardassets/im')); ?>ages/guardOne.jpg" alt="">
                                                  </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                  <div class="shareImages">
                                                    <img src="<?php echo e(asset('frontend/guardassets/imag')); ?>es/guardThree.jpg" alt="">
                                                  </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                  <div class="shareImages">
                                                    <img src="<?php echo e(asset('frontend/guardassets/im')); ?>ages/guardTwo.jpg" alt="">
                                                  </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                  <div class="shareImages">
                                                    <img src="<?php echo e(asset('frontend/guardassets/imag')); ?>es/guardThree.jpg" alt="">
                                                  </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                  <div class="shareImages">
                                                    <img src="<?php echo e(asset('frontend/guardassets/im')); ?>ages/guardTwo.jpg" alt="">
                                                  </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                  <div class="shareImages">
                                                    <img src="<?php echo e(asset('frontend/guardassets/im')); ?>ages/guardOne.jpg" alt="">
                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                          </div>
                                          <div class="tab-pane fade" id="pillsFile" role="tabpanel" aria-labelledby="pillsFileTab">
                                            <div class="shareFileDetail">
                                              <div class="shareFile">
                                                <i class="fas fa-folder-open"></i>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                              </div>
                                              <div class="shareFile">
                                                <i class="fas fa-folder-open"></i>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                              </div>
                                              <div class="shareFile">
                                                <i class="fas fa-folder-open"></i>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                              </div>
                                              <div class="shareFile">
                                                <i class="fas fa-folder-open"></i>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                              </div>
                                              <a href="#"><button class="viewAll">View All</button></a>
                                            </div>
                                          </div>

                                        </div>

                                      </div>
                                    </div>
                                  </div> -->
                                                </div>
                                            </div>
                                        </div>



                                        <div class="tab-pane fade" id="pillsChatTwo" role="tabpanel"
                                            aria-labelledby="pillsChatTwoTab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-11 col-md-12 col-sm-12 chatLeft">
                                                        <div class="chatBox">
                                                            <div class="chatMessage">
                                                                <div class="chatHeader">
                                                                    <div class="chatHeaderDetail">
                                                                        <div class="chatHeaderImage">
                                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="chatHeaderName">
                                                                            <h6>John Smith</h6>
                                                                        </div>
                                                                        <div class="chatHeaderActive">
                                                                            <i class="fas fa-circle"></i>
                                                                            <span>Active</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="messageBox">
                                                                    <div class="chatMessageLeft">
                                                                        <div class="chatMessageImage">
                                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="chatLeftText">
                                                                            <div class="chatLeftNameDate">
                                                                                <h6>John Smith</h6>
                                                                                <span>1/12/2022</span>
                                                                            </div>
                                                                            <p>Lorem ipsum dolor sit, consectetuer
                                                                                adipiscing elit...</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="chatMessageRight">
                                                                        <div class="chatLeftText">
                                                                            <div class="chatLeftNameDate">
                                                                                <h6>John Smith</h6>
                                                                                <span>1/12/2022</span>
                                                                            </div>
                                                                            <p>Lorem ipsum dolor sit, consectetuer
                                                                                adipiscing elit...</p>
                                                                        </div>
                                                                        <div class="chatMessageImage">
                                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="today">
                                                                        <span>Today</span>
                                                                    </div>
                                                                    <div class="chatMessageLeft">
                                                                        <div class="chatMessageImage">
                                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="chatLeftText">
                                                                            <div class="chatLeftNameDate">
                                                                                <h6>John Smith</h6>
                                                                                <span>1/12/2022</span>
                                                                            </div>
                                                                            <p>Lorem ipsum dolor sit, consectetuer
                                                                                adipiscing elit...</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="chatMessageRight">
                                                                        <div class="chatLeftText">
                                                                            <div class="chatLeftNameDate">
                                                                                <h6>John Smith</h6>
                                                                                <span>1/12/2022</span>
                                                                            </div>
                                                                            <p>Lorem ipsum dolor sit, consectetuer
                                                                                adipiscing elit...</p>
                                                                        </div>
                                                                        <div class="chatMessageImage">
                                                                            <img src="<?php echo e(asset('frontend/guardassets/images')); ?>/profileImage.png"
                                                                                alt="">
                                                                        </div>
                                                                    </div>




                                                                </div>
                                                            </div>
                                                            <div class="testArea">
                                                                <textarea type="text" class="inputTextArea" placeholder="Type a message..."></textarea>
                                                                <div class="submit">
                                                                    <button class="submitButton"><i
                                                                            class="fas fa-location-arrow"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                        

                        <div class="tab-pane fade" id="pillsSix" role="tabpanel" aria-labelledby="pillsSixTab">

                            <?php echo $__env->make('frontend.guard_dashboard.guard-change-password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        

                        <div class="tab-pane fade" id="pillseight" role="tabpanel" aria-labelledby="pillsOneTab">
                            <div class="cstm-form-box-width">
                            <?php echo $__env->make('frontend.guard_dashboard.guard-help', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.guard_dashboard.guard_layouts.guard_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/guard_dashboard/guard-dashboard.blade.php ENDPATH**/ ?>