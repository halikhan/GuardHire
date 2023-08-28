@extends('frontend.layouts.master')
@section('title', 'Browse Companies')
@section('content')

    <!-- Start Header -->
    <link type="text/css" rel="stylesheet"
    href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <script
    src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
  </script>
    <header class="howItWorksHeaderImage"
        style="background-image: url('{{ !empty($banners->image) ? asset('storage/uploads/cms/' . $banners->image) : asset('storage/uploads/No-gallery.jpg') }}')">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="browseCompaniesHeaderHeading">
                            <h2>{{ $sectionBrowseCompanies->title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- End Header -->

    <!-- Start Search Form -->
    <section class="searchFormBox">
        @include('frontend.searchbox')
    </section>
    <!-- End Search Form -->


    <!-- Start Browse Companies -->
    <section class="browseServices">
        <div class="container">
            <div class="row">
                {{-- ====== ApplyFilter ======== --}}
                <div class="col-lg-3 col-md-12">

                    @include('frontend.applyfilters')
                </div>
                {{-- ====== End of ApplyFilter ======== --}}

                <div class="col-lg-9">
                    {{-- <div class="row">
                        <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="groupSecurityImage">
                                <img src="{{ asset('frontend/assets/images/companyOne.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h2>Company 01</h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                <div class="row">
                                    <div class="securityRatingDetail">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityStarting">
                                                <h6>Starting From:</h6>
                                                <p>$100.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityRating securityStartingRating">
                                                <a href="#">
                                                    <div class="starIcon">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                    <h6>$100.00</h6>
                                                    <h6>0.0/5 <span>(0)</span></h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="hireNow">
                                                <button class="hireNowButton" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">Hired Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="securityRatings securityBrowseRating">
                                    <a href="#">
                                        <div class="listIcon">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <h6>Save</h6>
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3">
                                            <div class="tagsHeading">
                                                <h6>Tags:</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="armedHeading">
                                                <h6>Armed Security</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 line">
                                            <div class="lawHeading">
                                                <h6>Law Enforcement</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="cprHeading">
                                                <h6>CPR</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @foreach ($getBrowseCompanies as $value)
                    <div class="row browseServiceCard">
                        <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="groupSecurityImage">
                                <img src="{{(!empty($value->image)) ? asset('storage/uploads/cms/'. $value->image):asset('storage/uploads/No-image.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h2>{{ $value->companyname ??''}}</h2>
                                <p>{!!substr($value->description ??'',0,300)!!} ...</p>
                                <div class="row">
                                    <div class="securityRatingDetail">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityStarting">
                                                <h6>Starting From:</h6>
                                                <p>${{ $value->starting_rate }}/hour</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityRating securityStartingRating">
                                                <a href="#">
                                                    <div class="starIcon">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                    @if ($value->guard_ratings == null)
                                                    <h6>0.0/5 <span>(0)</span></h6>
                                                    @else
                                                    <h6>{{ $value->guard_ratings->rate ??'' }}/5 <span>({{ count((array)$value->guard_ratings->rate) }})</span></h6>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="hireNow">
                                                <a href="{{ route('company',$value->id) }}"><button class="hireNowButton">Hired
                                                        Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="securityRatings securityBrowseRating">
                                     <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <a href="javascript:void(0)" type="button" onclick="saveToWishlist({{ $value->id }})">
                                        <div class="listIcon">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <h6>Save</h6>
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3">
                                            <div class="tagsHeading">
                                                <h6>Tags:</h6>
                                            </div>
                                        </div>
                                        @foreach ($value->get_guard_tags as $guard_tags)
                                        <div class="col-lg-3 col-md-3 line">
                                            <div class="armedHeading">
                                                <h6>{{ $guard_tags->guard_tags_details->name ??''}}</h6>
                                            </div>
                                        </div>
                                        @endforeach

                                        {{-- <div class="col-lg-3 col-md-3 line">
                                            <div class="lawHeading">
                                                <h6>Law Enforcement</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="cprHeading">
                                                <h6>CPR</h6>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="row browseServiceCard">
                        <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="groupSecurityImage">
                                <img src="{{ asset('frontend/assets/images/companyThree.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h2>Company 03</h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                <div class="row">
                                    <div class="securityRatingDetail">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityStarting">
                                                <h6>Starting From:</h6>
                                                <p>$100.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityRating securityStartingRating">
                                                <a href="#">
                                                    <div class="starIcon">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                    <h6>0.0/5 <span>(0)</span></h6>
                                                </a>
                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="hireNow">
                                                <a href="{{ route('company') }}"><button class="hireNowButton">Hired
                                                        Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="securityRatings securityBrowseRating">
                                    <a href="#">
                                        <div class="listIcon">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <h6>Save</h6>
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3">
                                            <div class="tagsHeading">
                                                <h6>Tags:</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="armedHeading">
                                                <h6>Armed Security</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 line">
                                            <div class="lawHeading">
                                                <h6>Law Enforcement</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="cprHeading">
                                                <h6>CPR</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row browseServiceCard">
                        <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="groupSecurityImage">
                                <img src="{{ asset('frontend/assets/images/companyFour.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h2>Company 04</h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                <div class="row">
                                    <div class="securityRatingDetail">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityStarting">
                                                <h6>Starting From:</h6>
                                                <p>$100.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityRating securityStartingRating">
                                                <a href="#">
                                                    <div class="starIcon">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                    <h6>0.0/5 <span>(0)</span></h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="hireNow">
                                                <a href="{{ route('company') }}"><button class="hireNowButton">Hired
                                                        Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="securityRatings securityBrowseRating">
                                    <a href="#">
                                        <div class="listIcon">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <h6>Save</h6>
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3">
                                            <div class="tagsHeading">
                                                <h6>Tags:</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="armedHeading">
                                                <h6>Armed Security</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 line">
                                            <div class="lawHeading">
                                                <h6>Law Enforcement</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="cprHeading">
                                                <h6>CPR</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row browseServiceCard">
                        <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="groupSecurityImage">
                                <img src="{{ asset('frontend/assets/images/companyFive.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h2>Company 05</h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                <div class="row">
                                    <div class="securityRatingDetail">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityStarting">
                                                <h6>Starting From:</h6>
                                                <p>$100.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityRating securityStartingRating">
                                                <a href="#">
                                                    <div class="starIcon">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                    <h6>0.0/5 <span>(0)</span></h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="hireNow">
                                                <a href="{{ route('company') }}"><button class="hireNowButton">Hired
                                                        Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="securityRatings securityBrowseRating">
                                    <a href="#">
                                        <div class="listIcon">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <h6>Save</h6>
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3">
                                            <div class="tagsHeading">
                                                <h6>Tags:</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="armedHeading">
                                                <h6>Armed Security</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 line">
                                            <div class="lawHeading">
                                                <h6>Law Enforcement</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="cprHeading">
                                                <h6>CPR</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>



            </div>
            <div class="categoryButton wow animate__ animate__fadeInUp animated" data-wow-duration="1.4s"
                style="visibility: visible; animation-duration: 1.4s; animation-name: fadeInUp;">
                <a href="#"><button class="exploreButton">Load More</button></a>
            </div>
        </div>
    </section>


    <!-- Start Browse Companies -->

    <!-- Start Modal -->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Guard Hire Pricing Credit System</h1>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    {{-- <table class="table">
                            <thead class="amountTableHeading">
                                <tr>
                                    <th scope="col">Items</th>
                                    <th scope="col">Guard Basic</th>
                                    <th scope="col">Guard Pro (Recommended) (50% Off)</th>
                                    <th scope="col">Guard Premium (60% Off)</th>
                                    <th scope="col">Client or Guard</th>
                                </tr>
                            </thead>
                            <tbody class="text">

                                <tr>
                                    <td class="fieldNameOne">Points/Credits Earned</td>
                                    <td class="fieldName">0 Credits / $0</td>
                                    <td class="fieldName">50 Credits / $55 $27.5</td>
                                    <td class="fieldName">100 / $110 $44</td>
                                    <td class="fieldName">N/A</td>
                                </tr>
                                <tr>
                                    <td class="fieldNameOne">Create a Profile Listings</td>
                                    <td class="fieldName">Free / 0</td>
                                    <td class="fieldName">Free / 0</td>
                                    <td class="fieldName">Free / 0</td>
                                    <td class="fieldName">Guard</td>
                                </tr>
                                <tr>
                                    <td class="fieldNameOne">Create Service Listings</td>
                                    <td class="fieldName">10</td>
                                    <td class="fieldName">15</td>
                                    <td class="fieldName">15</td>
                                    <td class="fieldName">Guard</td>
                                </tr>
                                <tr>
                                    <td class="fieldNameOne">Hired Now Features</td>
                                    <td class="fieldName">5</td>
                                    <td class="fieldName">5</td>
                                    <td class="fieldName">5</td>
                                    <td class="fieldName">Guard</td>
                                </tr>
                                <tr>
                                    <td class="fieldNameOne">Respond to a Quote (Requests)</td>
                                    <td class="fieldName">10</td>
                                    <td class="fieldName">10</td>
                                    <td class="fieldName">10</td>
                                    <td class="fieldName">Guard</td>
                                </tr>
                                <tr>
                                    <td class="fieldNameOne">Number of Skills (Tags)</td>
                                    <td class="fieldName">1</td>
                                    <td class="fieldName">1</td>
                                    <td class="fieldName">1</td>
                                    <td class="fieldName">Guard</td>
                                </tr>
                                <tr>
                                    <td class="fieldNameOne">Service Add One</td>
                                    <td class="fieldName">3</td>
                                    <td class="fieldName">3</td>
                                    <td class="fieldName">3</td>
                                    <td class="fieldName">Guard</td>
                                </tr>
                                <tr>
                                    <td class="fieldNameOne">Tags</td>
                                    <td class="fieldName">2</td>
                                    <td class="fieldName">2</td>
                                    <td class="fieldName">2</td>
                                    <td class="fieldName">Guard</td>
                                </tr>
                                <tr>
                                    <td class="fieldNameOne">Featured (Sponsored) Service Listings</td>
                                    <td class="fieldName">Paid Offline</td>
                                    <td class="fieldName">Paid Offline</td>
                                    <td class="fieldName">Paid Offline</td>
                                    <td class="fieldName">Guard</td>
                                </tr>
                                <tr>
                                    <td class="fieldNameOne">Featured (Sponsored) Guard Profile</td>
                                    <td class="fieldName">Paid Offline</td>
                                    <td class="fieldName">Paid Offline</td>
                                    <td class="fieldName">Paid Offline</td>
                                    <td class="fieldName">Guard</td>
                                </tr>
                                <tr class="tableFooter">
                                    <td class="fieldNameOne">Featured Quote for Service (Clients)</td>
                                    <td class="fieldName">Paid Offline <br>
                                        <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                    </td>
                                    <td class="fieldName">Paid Offline <br>
                                        <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                    </td>
                                    <td class="fieldName">Paid Offline <br>
                                        <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                    </td>
                                    <td class="fieldName">Paid Offline <br>
                                        <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                    </td>
                                </tr>
                            </tbody>
                    </table> --}}
                    <div class="row">
                        {{-- @dd($getPackages) --}}
                        @foreach ($getPackages as $value)
                        <div class="col-lg-4 col-md-4 col-sm-4" data-wow-duration="1.2s">

                            <div class="featuredCard">
                                <div class="featuredTopImage">
                                    <img src="{{ asset('frontend/assets/images/featuredImageOne.png') }}" alt="">
                                    <h2>{{ $value->title }} ${{ $value->amount }}</h2>
                                </div>
                                <div class="featuredDetail">
                                    <div class="featuredProperty">
                                        <h5>{{ $value->title }}</h5>
                                        <p>{{ $value->type }}</p>
                                    </div>
                                    <div class="featuredBudget">
                                        <h5>Create Profile Listing:</h5>
                                        {{-- <p>${{ $value->amount }}</p> --}}
                                        <p>Free/ $00.00</p>
                                    </div>
                                    <div class="featuredDuration">
                                        <h5>Create Service Listings:</h5>
                                        <p>{{ $value->deatails }}</p>
                                    </div>
                                    <div class="featuredExpiry">
                                        <h5>Message New Customers:</h5>
                                        <p>{{ $value->mid_details }}</p>
                                        {{-- <p>{{ $value->created_at }}</p> --}}
                                    </div>
                                </div>
                                <div class="featuredButtom">
                                <a href="{{ route('stripe.payment.page', $value->slug) }}" onclick="get_package('{{ $value->id }}')">
                                    <button class="exploreButton">Select</button></a>

                                    {{-- <button class="featuredCardButtom">
                                        <a onclick="get_package('{{ $value->id }}')" type="button"
                                             class="reg-btn-vendors-package ">Choose Pakage</a>
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <br>

                        {{-- <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12" data-wow-duration="1.2s">

                                <script async src="https://js.stripe.com/v3/buy-button.js"></script>

                                <stripe-buy-button buy-button-id="buy_btn_1N1DpuJ5CNuTNvMY8beKbAQq" publishable-key="pk_test_51KhLF7J5CNuTNvMYRYjEjy5QGaT2WVdzZ1Rbt6rPrrs8TCjgyPbjR69d37G7s6LnVte0OTlxduy1fESd090KpWkr00Rj8QLakP">
                                </stripe-buy-button>

                                <div class="howItWorksCardIcon" align="center">
                                    <img src="{{ asset('frontend/stripe-QR/40$.png') }}" alt="" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12" data-wow-duration="1.2s">

                                <script async src="https://js.stripe.com/v3/buy-button.js">
                                </script>

                                <stripe-buy-button buy-button-id="buy_btn_1N1E0QJ5CNuTNvMY17XtRsM0" publishable-key="pk_test_51KhLF7J5CNuTNvMYRYjEjy5QGaT2WVdzZ1Rbt6rPrrs8TCjgyPbjR69d37G7s6LnVte0OTlxduy1fESd090KpWkr00Rj8QLakP">
                                </stripe-buy-button>

                                <div class="howItWorksCardIcon" align="center">
                                    <img src="{{ asset('frontend/stripe-QR/500$.png') }}" alt="" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12" data-wow-duration="1.2s">

                                <script async src="https://js.stripe.com/v3/buy-button.js">
                                </script>

                                <stripe-buy-button buy-button-id="buy_btn_1N1E1EJ5CNuTNvMYBWzLVcyJ" publishable-key="pk_test_51KhLF7J5CNuTNvMYRYjEjy5QGaT2WVdzZ1Rbt6rPrrs8TCjgyPbjR69d37G7s6LnVte0OTlxduy1fESd090KpWkr00Rj8QLakP">
                                </stripe-buy-button>

                                <div class="howItWorksCardIcon" align="center">
                                    <img src="{{ asset('frontend/stripe-QR/100$.png') }}" alt="" />
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div class="categoryButton" data-wow-duration="1.4s">
                        <a href="" id="payment_redirect">
                            <button  type="button" class="exploreButton" id="checkout-button">Subscribe</button>
                        </a>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="exploreButton" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Guard Hire Pricing Credit System</h1>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead class="amountTableHeading">
                            <tr>
                                <th scope="col">Items</th>
                                <th scope="col">Guard Basic</th>
                                <th scope="col">Guard Pro (Recommended) (50% Off)</th>
                                <th scope="col">Guard Premium (60% Off)</th>
                                <th scope="col">Client or Guard</th>
                            </tr>
                        </thead>
                        <tbody class="text">

                            <tr>
                                <td class="fieldNameOne">Points/Credits Earned</td>
                                <td class="fieldName">0 Credits / $0</td>
                                <td class="fieldName">50 Credits / $55 $27.5</td>
                                <td class="fieldName">100 / $110 $44</td>
                                <td class="fieldName">N/A</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Create a Profile Listings</td>
                                <td class="fieldName">Free / 0</td>
                                <td class="fieldName">Free / 0</td>
                                <td class="fieldName">Free / 0</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Create Service Listings</td>
                                <td class="fieldName">10</td>
                                <td class="fieldName">15</td>
                                <td class="fieldName">15</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Hired Now Features</td>
                                <td class="fieldName">5</td>
                                <td class="fieldName">5</td>
                                <td class="fieldName">5</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Respond to a Quote (Requests)</td>
                                <td class="fieldName">10</td>
                                <td class="fieldName">10</td>
                                <td class="fieldName">10</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Number of Skills (Tags)</td>
                                <td class="fieldName">1</td>
                                <td class="fieldName">1</td>
                                <td class="fieldName">1</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Service Add One</td>
                                <td class="fieldName">3</td>
                                <td class="fieldName">3</td>
                                <td class="fieldName">3</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Tags</td>
                                <td class="fieldName">2</td>
                                <td class="fieldName">2</td>
                                <td class="fieldName">2</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Featured (Sponsored) Service Listings</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Featured (Sponsored) Guard Profile</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr class="tableFooter">
                                <td class="fieldNameOne">Featured Quote for Service (Clients)</td>
                                <td class="fieldName">Paid Offline <br>
                                    <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                </td>
                                <td class="fieldName">Paid Offline <br>
                                    <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                </td>
                                <td class="fieldName">Paid Offline <br>
                                    <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                </td>
                                <td class="fieldName">Paid Offline <br>
                                    <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                </td>
                            </tr>
                        </tbody>


                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="exploreButton" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- End Modal -->
<!-- End Modal Rating -->
<script type="text/javascript">
    function saveToWishlist(wishlist_id){
       let id = wishlist_id;
       console.log(wishlist_id);
         $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url:"{{ route('wishlist.job.save') }}",
           method:"POST",
           data:{
               id:id,
           },
           success: function(data) {
        //    console.log(data);
                if(data.status == 400){
                toastr.success('User added to wishlist successfully!');
            } else {
                toastr.error(err.message);
            }
       }
       });
   }

   </script>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
@endsection
