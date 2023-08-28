@extends('frontend.layouts.master')
@section('title','Search Results')
@section('content')


    <!-- Start Header -->

    <header class="howItWorksHeaderImage" style="background-image: url('{{(!empty($searchbanners->image)) ? asset('storage/uploads/cms/'.$searchbanners->image):asset('storage/uploads/No-gallery.jpg') }}')">
        <div class="container">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="browseServiceHeaderHeading">
                        {{-- <h2>{{ $sectionBrowseServices->title }}</h2> --}}
                        <h2>Search Results</h2>
                        <a href="{{ route('browse.quotes') }}" align="center"><button type="button" class="exploreButton" >Back</button></a>
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


    <!-- Start Browse Services -->

    <section class="browseServices">
        <div class="container">
            <div class="row">
              {{-- ====== ApplyFilter ======== --}}
              <div class="col-lg-3 col-md-12">

                @include('frontend.apply-browes-quotes-filters')

            </div>
            {{-- ====== End of ApplyFilter ======== --}}

                <div class="col-lg-9">
                    {{-- @dd( count($clientSerachresult) == 0 ) --}}

                    @if ($clientSerachresult->isEmpty())
                    <div class="row browseServiceCard">
                        <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="groupSecurityImage">
                                <img src="{{ asset('storage/uploads/No-image.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h6>Sponsored</h6>
                                <h2>Armed Security</h2>
                                <p> No Results Found
                                </p>
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
                                                <a href="{{ route('home') }}"><button class="hireNowButton">Hired
                                                        Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    @foreach ($clientSerachresult as $value)
                        <div class="row browseServiceCard">
                            <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                                <div class="groupSecurityImage">
                                    <img src="{{(!empty($value->client_postjob_details->image)) ? asset('storage/uploads/cms/'. $value->client_postjob_details->image):asset('storage/uploads/No-image.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                                <div class="groupSecurityDetail">
                                    {{-- <h6>Sponsored</h6> --}}
                                    <h2>{{ $value->get_guardtype->name ??''}}</h2>
                                    <p>{!!substr($value->description ??'',0,300)!!} ...</p>

                                    <div class="row">
                                        <div class="securityRatingDetail">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="securityStarting">
                                                    <h6>Starting From:</h6>
                                                    {{-- <p>${{ $value->per_hour_rate }}</p> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                {{-- <div class="securityRating securityStartingRating">
                                                    <a href="#">
                                                        <div class="starIcon">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>
                                                        <h6>0.0/5 <span>(0)</span></h6>
                                                    </a>
                                                </div> --}}
                                                <div class="securityRating securityStartingRating">
                                                    <a href="#">
                                                        {{-- <div class="starIcon">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div> --}}
                                                        <h6>${{ $value->per_hour_rate }}/hour</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="hireNow">
                                                    <a href="{{ route('group.security',$value->id ??'') }}"><button class="hireNowButton">Hired
                                                            Now</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="browseServiceHeaderHeading">
                        <a href="{{ route('browse.quotes') }}" align="center"><button type="button" class="exploreButton">Go Back</button></a>
                    </div>
                    @endif
                    
                    {{-- <div class="row browseServiceCard">
                        <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="groupSecurityImage">
                                <img src="{{ asset('frontend/assets/images/groupSecurityOne.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h6>Sponsored</h6>
                                <h2>Group Security</h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                    minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud
                                    exerci tation ullamcorper suscipit lobortis.</p>
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
                                                <a href="{{ route('group.security') }}"><button class="hireNowButton">Hired
                                                        Now</button></a>
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
                                <img src="{{ asset('frontend/assets/images/groupSecurityTwo.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h6>Sponsored</h6>
                                <h2>Armed Security</h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                    minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud
                                    exerci tation ullamcorper suscipit lobortis.</p>
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
                                                <a href="{{ route('group.security') }}"><button class="hireNowButton">Hired
                                                        Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </section>


    <!-- Start Browse Services -->



    <!-- Start Modal -->


    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Guard Hire Pricing Credit System</h1>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
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


    @endsection

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @endsection
