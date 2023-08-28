@extends('frontend.layouts.master')
@section('title', 'Group Security')
@section('content')

    <!-- Start Header -->
    <!-- Start Header -->

    <header class="browseSecurityHeaderImage"
        style="background-image: url('{{ !empty($banners->image) ? asset('storage/uploads/cms/' . $banners->image) : asset('storage/uploads/No-gallery.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="browseSecurityHeaderHeading">
                        {{-- <h2>Group Security</h2> --}}
                        {{-- <h2>{{ $sectiongroup_security->title }}</h2> --}}
                        <h2>{{ $getGuardBrowseServices->guard_service->service ??''}}</h2>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <!-- End Header -->

    <!-- Start Group Security -->

    <section class="groupSecurity">
        {{-- @foreach ($getBrowseServices as $getGuardBrowseServices) --}}

        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <div class="groupSecurityImageOne">
                        <img src="{{(!empty($getGuardBrowseServices->guard_job_details->image)) ? asset('storage/uploads/cms/'. $getGuardBrowseServices->guard_job_details->image):asset('storage/uploads/No-image.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                    <div class="groupSecurityDetails">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="groupSecurityDetailHeading">
                                    <h4>{{ $getGuardBrowseServices->guard_service->service ??''}}</h4>
                                    <h6>Starting From:</h6>
                                    <h5>${{ $getGuardBrowseServices->per_hour_rate ??'0.00'}}/hour</h5>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="groupSecurityDetailButton">
                                    <div class="groupSecurityRating">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="javascript:void(0)" type="button" onclick="saveToWishlist({{ $getGuardBrowseServices->id }})">
                                            <div class="listIcon">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                            </div>
                                            <h6>Save</h6>
                                        </a>
                                        {{-- <a href="#">
                                            <div class="listIcon">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                            </div>
                                            <h6>Save</h6>
                                        </a> --}}
                                    </div>
                                    <div class="securityRating">
                                        <a href="#">
                                            {{-- <div class="starIcon">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div> --}}
                                            <h6>{{$getGuardBrowseServices->guard_job_details->name ??''}} | {{$getGuardBrowseServices->guard_job_details->email ??''}}</h6>
                                            {{-- <h6>0.0/5 <span>(0)</span></h6> --}}
                                        </a>
                                    </div>
                                    <h6>
                                        @php
                                        $id = $getGuardBrowseServices->user_id;
                                    @endphp
                                    <a href="{{ url('/chatify',$id) }}"><button class="hireBtn">Contact Now</button></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($getGuardPortfolioImage as $portfolioImage)
                        <div class="col-lg-4 col-md-4">
                            <div class="groupSecurityImageTwo">
                                <img src="{{(!empty($portfolioImage->image)) ? asset('storage/uploads/cms/'. $portfolioImage->image):asset('storage/uploads/No-image.jpg') }}" alt="">
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="col-lg-4 col-md-4">
                            <div class="groupSecurityImageTwo">
                                <img src="{{ asset('frontend/assets/images/securityImageThree.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="groupSecurityImageTwo">
                                <img src="{{ asset('frontend/assets/images/securityImageFour.png') }}" alt="">
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
                    <div class="groupSecurityText">
                        <p>{!! $getGuardBrowseServices->guard_job_details->description ??'' !!}</p>
                        {{-- <p>{!!substr($getGuardBrowseServices->guard_job_details->description ??'',0,300)!!} ...</p> --}}
                    </div>
                </div>
            </div>

        </div>
        {{-- @endforeach --}}
    </section>

    <!-- End Group Security -->

    <!-- Start Feature Security -->

    {{-- <section class="featureSecurity">
          <div class="container">
            <div class="featureSecurityHeading">
              <h2>Feature Security</h2>
            </div>
            <div class="row browseServiceCard">
                <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                <div class="groupSecurityImage">
                    <img src="{{ asset('frontend/assets/images/groupSecurityOne.png') }}" alt="">
                </div>
                </div>
                <div class="col-lg-6 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                <div class="groupSecurityDetail">
                        <h2>Armed Security</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation ullamcorper suscipit lobortis, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation ullamcorper suscipit lobortis.</p>
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
                       </a></div>
                        </div>
                        <div class="col-lg-4 col-md-4"><div class="hireNow">
                        <a href="#"><button class="hireNowButton">Hired Now</button></a>
                        </div></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row browseServiceCard">
                <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                <div class="groupSecurityImage">
                    <img src="{{ asset('frontend/assets/images/groupSecurityFive.png') }}" alt="">
                </div>
                </div>
                <div class="col-lg-6 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                <div class="groupSecurityDetail">
                        <h2>Unarmed Security</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation ullamcorper suscipit lobortis, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation ullamcorper suscipit lobortis.</p>
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
                       </a></div>
                        </div>
                        <div class="col-lg-4 col-md-4"><div class="hireNow">
                        <a href="#"><button class="hireNowButton">Hired Now</button></a>
                        </div></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
          </div>
        </section> --}}

    <!-- End Feature Security -->

    <!-- End Portfolio -->

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
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
           <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

           {{-- Script to show the notification using Toastr.js --}}
           <script>
               $(document).ready(function() {
                   @if (session('notification'))
                       var notification = {!! json_encode(session('notification')) !!};
                       toastr.options = {
                           "closeButton": true,
                           "progressBar": true,
                           "positionClass": "toast-top-right"
                       };

                       toastr[notification['alert-type']](notification['message']);
                   @endif
               });
           </script>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
@endsection
