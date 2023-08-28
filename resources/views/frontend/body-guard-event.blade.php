@extends('frontend.layouts.master')
@section('title','Guard-Hire | How it Works')
@section('content')


    <!-- Start Header -->
    <?php
    $logo_add = App\Models\LogoManager::where('title','favicon')->first();

    // dd($logo_add);
    ?>
    <header class="browseSecurityHeaderImage" style="background-image: url('{{(!empty($banners->image)) ? asset('storage/uploads/cms/'.$banners->image):asset('storage/uploads/No-gallery.jpg') }}')">
        <div class="container">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                     <div class="bodyGuardEventHeaderHeading">
                        {{-- <h2>Body Guard for any Event</h2> --}}
                        <h2>{{ $getclientQuote->get_guardtype->name ??''}}</h2>

                    </div>
                </div>
            </div>
        </div>
        </div>
     </header>

    <!-- End Header -->

    <!-- Start Body Guard For Any Event -->

    <section class="groupSecurity">
        <div class="container">
        <div class="row">
            <div class="col-lg-6 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
               <div class="groupSecurityImageOne">
                <img src="{{(!empty($getclientimage[0]['image'] ??'')) ? asset('storage/uploads/cms/'. $getclientimage[0]['image'] ??''):asset('storage/uploads/No-image.jpg') }}" alt="">
               </div>
            </div>
            <div class="col-lg-6 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
            <div class="groupSecurityDetail">
                <h2>{{ $getclientQuote->get_guardtype->name ??''}} | {{ $getclientQuote->client_postjob_details->name ??''}}</h2>
                <p>{!!substr($getclientQuote->description ??'',0,300)!!} ...</p>
                    <div class="row">
                        <div class="securityRatingDetail">
                        <div class="col-lg-4 col-md-4">
                            <div class="securityStarting">
                            <h6>Starting From:</h6>
                            {{-- <p>$100.00</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                        <div class="securityRating securityStartingRating">
                        <a href="#">
                        {{-- <div class="starIcon">
                          <i class="fa fa-star" aria-hidden="true"></i>
                        </div> --}}
                        {{-- <h6>0.0/5 <span>(0)</span></h6> --}}
                        <h6>$ {{ $getclientQuote->per_hour_rate ??''}}</h6>
                       </a></div>
                        </div>
                        <div class="col-lg-4 col-md-4"><div class="hireNow">
                        <a href="#">
                            <button class="hireNowButton" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModalChat">Send A Offer</button>
                            {{-- <button class="hireNowButton">Send A Offer</button> --}}
                        </a>
                        </div></div>
                        </div>
                    </div>
                    {{-- <div class="securityRatings securityBrowseRating">
                         <a href="#">
                         <div class="listIcon">
                          <i class="fa fa-heart-o" aria-hidden="true"></i>
                         </div>
                         <h6>Save</h6>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- End Body Guard For Any Event -->

        <!-- Start Modal Chat -->

        <div class="modal fade" id="exampleModalChat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modalHeaderChat">
                        <h1 class="modalTitle" id="exampleModalLabel">Chat Box</h1>
                        <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                                class="fa fa-times"></i></button>
                    </div>
                    <div class="modal-body modalBody">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="profileField">
                                    <div class="connectPhone">
                                        <h6>Connect With Call</h6>
                                        <a href="tel:111-222-333" data-bs-dismiss="modal">
                                            <p>{{ $getclientQuote->client_postjob_details->contact ??''}}
                                                </p>
                                        </a>
                                    </div>
                                    <div class="connectEmail">
                                        <h6>Connect With Email</h6>
                                        <a href="mailto:john@gmail.com" data-bs-dismiss="modal">
                                            <p>{{ $getclientQuote->client_postjob_details->email ??''}}</p>
                                        </a>
                                    </div>

                                    <div class="connectChat">
                                        <h6>Connect With Chat</h6>
                                        @php
                                        $id = $getclientQuote->client_postjob_details->id;
                                        @endphp
                                    <a href="{{ url('/chatify',$id) }}"><button class="ratingButton">Chat</button></a>
                                        {{-- <div class="chatOpen" data-bs-dismiss="modal">
                                            <p>Start Chating</p>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Modal Chat -->
    <!-- Start Feature Security -->

        {{-- <section class="featureSecurity">
          <div class="container">
            <div class="featureSecurityHeading">
              <h2>Quotes</h2>
            </div>
            <div class="row browseServiceCard">
             <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
                <div class="securityCard eventSecurityCard">
                    <div class="securityCardImage">
                      <img src="{{ asset('frontend/assets/images/securityCompanyOne.png') }}" alt="">
                    </div>
                    <div class="securityCardDetail">
                      <div class="securityCardHeading">
                        <a href="#"><h5>I Will Make Professional Excel
                          And Google Sheets</h5></a>
                      </div>
                      <div class="securityStartingHeading">
                        <h6>Starting From:</h6>
                        <p>$100.00</p>
                      </div>
                    </div>
                    <div class="blueLine"></div>
                    <div class="securityCardRating">
                      <div class="row">
                       <div class="col-lg-6 centerBorder">
                         <div class="securityRating">
                           <a href="#">
                           <h6 class="mt-1">US</h6>
                          </div></a>
                       </div>
                       <div class="col-lg-6">
                         <div class="securityRating">
                           <a href="#">
                           <div class="listIcon">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                           </div>
                           <h6>Save</h6>
                          </div></a>
                       </div>
                      </div>
                 </div>
                 </div>
               </div>
               <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
               <div class="securityCard eventSecurityCard">
                    <div class="securityCardImage">
                      <img src="{{ asset('frontend/assets/images/securityCompanyTwo.png') }}" alt="">
                    </div>
                    <div class="securityCardDetail">
                      <div class="securityCardHeading">
                        <a href="#"><h5>I Will Make Professional Excel
                          And Google Sheets</h5></a>
                      </div>
                      <div class="securityStartingHeading">
                        <h6>Starting From:</h6>
                        <p>$100.00</p>
                      </div>
                    </div>
                    <div class="blueLine"></div>
                    <div class="securityCardRating">
                      <div class="row">
                       <div class="col-lg-6 centerBorder">
                         <div class="securityRating">
                           <a href="#">
                           <h6 class="mt-1">US</h6>
                          </div></a>
                       </div>
                       <div class="col-lg-6">
                         <div class="securityRating">
                           <a href="#">
                           <div class="listIcon">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                           </div>
                           <h6>Save</h6>
                          </div></a>
                       </div>
                      </div>
                 </div>
                 </div>
               </div>
               <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
               <div class="securityCard eventSecurityCard">
                    <div class="securityCardImage">
                      <img src="{{ asset('frontend/assets/images/securityCompanyThree.png') }}" alt="">
                    </div>
                    <div class="securityCardDetail">
                      <div class="securityCardHeading">
                        <a href="#"><h5>I Will Make Professional Excel
                          And Google Sheets</h5></a>
                      </div>
                      <div class="securityStartingHeading">
                        <h6>Starting From:</h6>
                        <p>$100.00</p>
                      </div>
                    </div>
                    <div class="blueLine"></div>
                    <div class="securityCardRating">
                      <div class="row">
                       <div class="col-lg-6 centerBorder">
                         <div class="securityRating">
                           <a href="#">
                           <h6 class="mt-1">US</h6>
                          </div></a>
                       </div>
                       <div class="col-lg-6">
                         <div class="securityRating">
                           <a href="#">
                           <div class="listIcon">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                           </div>
                           <h6>Save</h6>
                          </div></a>
                       </div>
                      </div>
                 </div>
                 </div>
               </div>
               <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
               <div class="securityCard eventSecurityCard">
                    <div class="securityCardImage">
                      <img src="{{ asset('frontend/assets/images/securityTwo.png') }}" alt="">
                    </div>
                    <div class="securityCardDetail">
                      <div class="securityCardHeading">
                        <a href="#"><h5>I Will Make Professional Excel
                          And Google Sheets</h5></a>
                      </div>
                      <div class="securityStartingHeading">
                        <h6>Starting From:</h6>
                        <p>$100.00</p>
                      </div>
                    </div>
                    <div class="blueLine"></div>
                    <div class="securityCardRating">
                      <div class="row">
                       <div class="col-lg-6 centerBorder">
                         <div class="securityRating">
                           <a href="#">
                           <h6 class="mt-1">US</h6>
                          </div></a>
                       </div>
                       <div class="col-lg-6">
                         <div class="securityRating">
                           <a href="#">
                           <div class="listIcon">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                           </div>
                           <h6>Save</h6>
                          </div></a>
                       </div>
                      </div>
                 </div>
                 </div>
               </div>
               <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
               <div class="securityCard eventSecurityCard">
                    <div class="securityCardImage">
                      <img src="{{ asset('frontend/assets/images/securityOne.png') }}" alt="">
                    </div>
                    <div class="securityCardDetail">
                      <div class="securityCardHeading">
                        <a href="#"><h5>I Will Make Professional Excel
                          And Google Sheets</h5></a>
                      </div>
                      <div class="securityStartingHeading">
                        <h6>Starting From:</h6>
                        <p>$100.00</p>
                      </div>
                    </div>
                    <div class="blueLine"></div>
                    <div class="securityCardRating">
                      <div class="row">
                       <div class="col-lg-6 centerBorder">
                         <div class="securityRating">
                           <a href="#">
                           <h6 class="mt-1">US</h6>
                          </div></a>
                       </div>
                       <div class="col-lg-6">
                         <div class="securityRating">
                           <a href="#">
                           <div class="listIcon">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                           </div>
                           <h6>Save</h6>
                          </div></a>
                       </div>
                      </div>
                 </div>
                 </div>
               </div>
               <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
               <div class="securityCard eventSecurityCard">
                    <div class="securityCardImage">
                      <img src="{{ asset('frontend/assets/images/securityThree.png') }}" alt="">
                    </div>
                    <div class="securityCardDetail">
                      <div class="securityCardHeading">
                        <a href="#"><h5>I Will Make Professional Excel
                          And Google Sheets</h5></a>
                      </div>
                      <div class="securityStartingHeading">
                        <h6>Starting From:</h6>
                        <p>$100.00</p>
                      </div>
                    </div>
                    <div class="blueLine"></div>
                    <div class="securityCardRating">
                      <div class="row">
                       <div class="col-lg-6 centerBorder">
                         <div class="securityRating">
                           <a href="#">
                           <h6 class="mt-1">US</h6>
                          </div></a>
                       </div>
                       <div class="col-lg-6">
                         <div class="securityRating">
                           <a href="#">
                           <div class="listIcon">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                           </div>
                           <h6>Save</h6>
                          </div></a>
                       </div>
                      </div>
                 </div>
                 </div>
               </div>
            </div>
           </div>
        </section> --}}

    <!-- End Feature Security -->


    @endsection

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @endsection

