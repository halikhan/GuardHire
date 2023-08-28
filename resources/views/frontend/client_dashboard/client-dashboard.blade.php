@extends('frontend.client_dashboard.client_layouts.client_master')
@section('title', 'Guard-Hire | Client dashboard')
@section('clientcontent')
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
                {{-- @php
                    $countmessage = App\Models\ChMessage::where('to_id',Auth::id())->where('seen',0)->get();
                @endphp --}}
                <a href="{{ url('/chatify') }}">
                    <li class="nav-item" role="presentation">
                    <button class="nav-link navLink" id="pillsThreeTab" data-bs-toggle="pill" data-bs-target="#pillsThree" type="button" role="tab" aria-controls="pillsThreeTab" aria-selected="false">

                        <span class="icon">
                        <i class="fas fa-comments"></i>
                        <small>Chat</small></span>
                        {{-- <span class="message-count">{{count($countmessage)}}</span> --}}
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
                <a href="{{ route('user.logout') }}">
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

                {{-- ======= Client-Profile ======= --}}

                <div class="tab-pane fade active show" id="pillsOne" role="tabpanel" aria-labelledby="pillsOneTab">
                @include('frontend.client_dashboard.client-profile')
                </div>

                {{-- ======= Client-Hired-Guard ======= --}}

                <div class="tab-pane fade" id="pillsTwo" role="tabpanel" aria-labelledby="pillsTwoTab">
                    @include('frontend.client_dashboard.hire-guard-listing')

                </div>
                        {{-- ======= Client-Hired-Listing ======= --}}

                        <div class="tab-pane fade" id="pillsTwo1" role="tabpanel" aria-labelledby="pillsTwoTab1">
                            @include('frontend.client_dashboard.hire-companies')
                        </div>
                {{-- ======= client-chat ======= --}}

                <div class="tab-pane fade" id="1pillsThree" role="tabpanel" aria-labelledby="pillsThreeTab">

                    {{-- @include('vendor.Chatify.pages.app') --}}

                    {{-- @yield('chatcontent') --}}
                {{-- <div class="row">
                    <div class="col-lg-3 col-md-11 col-sm-11 chatRight">
                    <div class="chatListBox">
                        <div class="chatListHeading">
                        <h4>My Chat List</h4>
                        </div>
                        <ul class="nav  mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item chatList" role="presentation">
                            <div class="chatList active" id="pillsChatOneTab" data-bs-toggle="pill" data-bs-target="#pillsChatOne" role="tab" aria-controls="pillsChatOneTab" aria-selected="true">
                            <div class="chatNameList">
                                <div class="chatImage">
                                <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
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
                            <div class="chatList" id="pillsChatOneTab" data-bs-toggle="pill" data-bs-target="#pillsChatTwo" role="tab" aria-controls="pillsChatTwoTab" aria-selected="false">
                            <div class="chatNameList">
                                <div class="chatImage">
                                <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
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

                        <div class="tab-pane fade show active" id="pillsChatOne" role="tabpanel" aria-labelledby="pillsChatOneTab">
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-11 col-md-12 col-sm-12 chatLeft">
                                <div class="chatBox">
                                <div class="chatMessage">
                                    <div class="chatHeader">
                                    <div class="chatHeaderDetail">
                                        <div class="chatHeaderImage">
                                        <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
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
                                        <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
                                        </div>
                                        <div class="chatLeftText">
                                        <div class="chatLeftNameDate">
                                            <h6>John Smith</h6>
                                            <span>1/12/2022</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit, consectetuer adipiscing elit...</p>
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
                                        <p>Lorem ipsum dolor sit, consectetuer adipiscing elit...</p>
                                        </div>
                                        <div class="chatMessageImage">
                                        <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="chatMessageLeft">
                                        <div class="chatMessageImage">
                                        <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
                                        </div>
                                        <div class="chatLeftText">
                                        <div class="chatLeftNameDate">
                                            <h6>John Smith</h6>
                                            <span>1/12/2022</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit, consectetuer adipiscing elit...</p>
                                        </div>
                                    </div>
                                    <div class="chatMessageRight">
                                        <div class="chatLeftText">
                                        <div class="chatLeftNameDate">
                                            <h6>John Smith</h6>
                                            <span>1/12/2022</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit, consectetuer adipiscing elit...</p>
                                        </div>
                                        <div class="chatMessageImage">
                                        <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
                                        </div>
                                    </div>

                                    </div>
                                </div>
                                <div class="testArea">
                                    <textarea type="text" class="inputTextArea" placeholder="Type a message..."></textarea>
                                    <div class="submit">
                                    <button class="submitButton"><i class="fas fa-location-arrow"></i></button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                        <div class="tab-pane fade" id="pillsChatTwo" role="tabpanel" aria-labelledby="pillsChatTwoTab">
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-11 col-md-12 col-sm-12 chatLeft">
                                <div class="chatBox">
                                <div class="chatMessage">
                                    <div class="chatHeader">
                                    <div class="chatHeaderDetail">
                                        <div class="chatHeaderImage">
                                        <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
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
                                        <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
                                        </div>
                                        <div class="chatLeftText">
                                        <div class="chatLeftNameDate">
                                            <h6>John Smith</h6>
                                            <span>1/12/2022</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit, consectetuer adipiscing elit...</p>
                                        </div>
                                    </div>
                                    <div class="chatMessageRight">
                                        <div class="chatLeftText">
                                        <div class="chatLeftNameDate">
                                            <h6>John Smith</h6>
                                            <span>1/12/2022</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit, consectetuer adipiscing elit...</p>
                                        </div>
                                        <div class="chatMessageImage">
                                        <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="today">
                                        <span>Today</span>
                                    </div>
                                    <div class="chatMessageLeft">
                                        <div class="chatMessageImage">
                                        <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
                                        </div>
                                        <div class="chatLeftText">
                                        <div class="chatLeftNameDate">
                                            <h6>John Smith</h6>
                                            <span>1/12/2022</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit, consectetuer adipiscing elit...</p>
                                        </div>
                                    </div>
                                    <div class="chatMessageRight">
                                        <div class="chatLeftText">
                                        <div class="chatLeftNameDate">
                                            <h6>John Smith</h6>
                                            <span>1/12/2022</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit, consectetuer adipiscing elit...</p>
                                        </div>
                                        <div class="chatMessageImage">
                                        <img src="{{ asset('frontend/clientassets/images/profileImage.png') }}" alt="">
                                        </div>
                                    </div>




                                    </div>
                                </div>
                                <div class="testArea">
                                    <textarea type="text" class="inputTextArea" placeholder="Type a message..."></textarea>
                                    <div class="submit">
                                    <button class="submitButton"><i class="fas fa-location-arrow"></i></button>
                                    </div>
                                </div>
                                </div>
                            </div>

                            </div>
                        </div>
                        </div>
                    </div>


                    </div>

                </div> --}}
                </div>

                         {{-- ======= Guard-Reviews ======= --}}
                         <div class="tab-pane fade tabContentOnereviews" id="pillsFourreviews" role="tabpanel"
                         aria-labelledby="pillsFourTabreviews">
                         @include('frontend.client_dashboard.client-reviews-tab')
                     </div>
                {{-- ======= client-post-job ======= --}}

                <div class="tab-pane fade" id="pillsFour" role="tabpanel" aria-labelledby="pillsFourTab">
                    @include('frontend.client_dashboard.client-post-job')
                </div>

                {{-- ======= client-wishlist ======= --}}

                <div class="tab-pane fade" id="pillsFive" role="tabpanel" aria-labelledby="pillsFiveTab">
                    @include('frontend.client_dashboard.client-wishlist')
                </div>

                {{-- ======= client-change-password ======= --}}

                <div class="tab-pane fade" id="pillsSix" role="tabpanel" aria-labelledby="pillsSixTab">
                    @include('frontend.client_dashboard.client-change-password')

                {{-- <div class="row packageBottom passwordTop">
                    <div class="col-lg-12">
                    <div class="profileName mb-4">
                        <h3>Change Password</h3>
                    </div>
                    </div>
                    <div class="changePassword">
                    <div class="profileField">
                        <input type="password" class="inputName" placeholder="Old Password">
                        <input type="password" class="inputName" placeholder="New Password">
                        <input type="password" class="inputName" placeholder="Confirm Password">
                    </div>
                    <button class="savePasswordButton">Save Password</button>
                    </div>
                </div> --}}

                </div>

                {{-- ======= client-help in package ======= --}}


                <div class="tab-pane fade" id="pillseight" role="tabpanel" aria-labelledby="pillsOneTab">
                    <div class="cstm-form-box-width">
                        @include('frontend.client_dashboard.client-help')

                        {{-- <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="profileField">
                                    <label>Full Name</label>
                                    <input type="text" class="inputName" placeholder="First Name">
                                    <label>Phone Number</label>
                                    <input type="number" min="0" class="inputName"
                                        placeholder="Phone Number">
                                    <label>Email</label>
                                    <input type="email" class="inputName" placeholder="Email@">

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="profileField">
                                    <label>Message</label>
                                    <textarea type="text" class="inputMessage" placeholder="Type Here..."></textarea>
                                    <div class="sendBtn text-center">
                                        <button type="submit" class="sendButton">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>



  <!-- Start Modal Add Guard -->

  {{-- <div class="modal fade" id="exampleModalGuard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header modalHeader">
          <h1 class="modalTitle" id="exampleModalLabel">Add Guard Information</h1>
          <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="profileField">
                <label>Guard Name</label>
                <input type="text" class="inputName" placeholder="Guard Name">
                <label>Job Type</label>
                <input type="text" class="inputName" placeholder="Job Type">
                <label>Status</label>
                <div class="status">
                  <input class="input" type="checkbox" id="toggle-btn-3">
                  <label class="label" for="toggle-btn-3"></label>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="profileField">
                <label>Company Name</label>
                <input type="text" class="inputName" placeholder="Company Name">
                <label>Job Duration</label>
                <input type="text" class="inputName" placeholder="Job Duration">
              </div>
            </div>

          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="addJobButton">Save</button>
        </div>
      </div>
    </div>
  </div> --}}

  <!-- End Modal Add Guard -->

  <!-- Start Modal Edit Guard -->



  <!-- End Modal Edit Guard -->

  <!-- Start Modal Rating -->

  {{-- <div class="modal fade" id="exampleModalRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header modalHeader">
          <h1 class="modalTitle" id="exampleModalLabel">Rating</h1>
          <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
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
                <textarea type="text" class="inputMessage" placeholder="Type Here..."></textarea>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="addJobButton">Save</button>
        </div>
      </div>
    </div>
  </div> --}}

  <!-- End Modal Rating -->
@endsection

{{--
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html> --}}
