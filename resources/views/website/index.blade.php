@extends('website.layout.master')
@section('title','South-Dakota-Bride | Home')
@section('content')
<style>
    .about-text-div p {
    font-family: 'Poppins-Light';
    color: #FFF;
    /* text-align: center; */
}
.navi,
.navi1  {
    height: 295px;
}
</style>
 <!-- ==============================================BANNER  OPEN============================================== -->
 <section class="Home-Section  pt-5 Gray-overlay mt-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 overlay-image-text wow animated fadeInLeft"
                data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="d-flex flex-row justify-content-around">

                    <div>
                        <div class="d-flex flex-column translate">
                            <div class="line-after">
                                <div class="line-after1"></div>
                            </div>
                            <div class="line-center">
                                <ul>
                                    <li><a href="{{$facebook[0]->social_media ?? ''}}" target="_blank"><i
                                                class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="{{$instagram[0]->social_media ?? ''}}" target="_blank"><i
                                                class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="{{$twitter[0]->social_media ?? ''}}" target="_blank"><i
                                                class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="{{$youtube[0]->social_media ?? ''}}" target="_blank"><i
                                                class="fa-brands fa-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="line-before">
                                <div class="line-before2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="Wed-Art-Div">
                        <!-- <div class="couple-img"> -->
                        <div class="couple-img ">

                            @if ($banner->image != null)
                            <img src="{{ asset('storage/uploads/cms/' . $banner->image) }}" alt="">
                        @else
                            <img src="{{ (!empty($banner->image))?
                                asset('storage/uploads/cms/'.$about->image):asset('storage/uploads/No-image.jpg') }}">
                        @endif
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-lg-6 col-sm-6 mb-5 col-md-6 overlay-image-text  wow animated fadeInRight"
                data-wow-duration="1s" data-wow-delay="0.5s" d-flex align-items-center">
                <div class="Home_text_div">
                    <h1 class="couple-text-home pt-5">{{$banner->title1}} <span>{{$banner->title2}}<br></span>
                        {{$banner->title3}}<br><span>{{$banner->title4}}</span></h1>
                        {{-- @if (!Auth::check() && Auth::user()->type == 3) --}}
                        @if (!Auth::check())
                    <div class="d-flex align-item-center pt-4 Home-Button">
                        <div class="reg-div"><a href="{{route('signin')}}" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><button
                                    class="reg-btn button  wow animated bounceIn animate__delay-1s">Sign
                                    In</button></a></div>
                        <div class="sign-div"><a href="{{route('signup')}}"><button
                                    class="sign-btn button wow animated bounceIn animate__delay-1s">Sign
                                    Up</button></a></div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>

    <!-- ==============================================BANNER  CLOSED============================================== -->
    <!-- ==============================================ABOUT  OPEN============================================== -->
    <section class="About-Section">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 "></div>
                <div class="col-lg-5 col-sm-12 ">
                    <div class="about-text-div">
                        <h1 class="about-text pt-5 text wow animated fadeInLeft " data-wow-duration="1s"
                            data-wow-delay="0.5s">{{$about->title}}</h1>
                            <div class="about-para d-flex wow animated fadeInLeft">
                        <p class="about-para d-flex wow animated fadeInLeft" >
                           {!!$about->content !!}
                        </p>
                        </div>
                        <div class="reg-div pt-3"><a href="{{route('about-us')}}"><button
                                    class="reg-btn">Read
                                    More</button></a></div>
                        <div class="overlay-image pt-5">
                            {{-- <img src="{{ asset('storage/uploads/cms/' . $about->image) }}" alt=""> --}}
                            <img src="{{ (!empty($about->image))?
                                asset('storage/uploads/cms/'.$about->image):asset('storage/uploads/No-image.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="about-bg wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                        {{-- <img src="{{ asset('storage/uploads/cms/' . $about->image2) }}" alt=""> --}}
                        <img src="{{ (!empty($about->image2))?
                            asset('storage/uploads/cms/'.$about->image2):asset('storage/uploads/No-image.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================== ABOUT  CLOSED ================================= -->
    <!-- ========================WEDDING PLANNING  OPEN ==================================== -->
    <section class="wed-plan mt-5 mb-5 pb-5 wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
        <h1 class="wed-text pt-5">{{$plan->title}}</h1>
        <div class="container text-center">
            <p class="wed-para text-center"{!!$plan->description3 !!}<br>

            </p>
        </div>
    </section>
    <!-- ==================== WEDDING PLANNING  CLOSED ======================= -->
    <!-- ============================= WEDDING PLANNING  SECOND SECTION OPEN =============================== -->
    <section>
        <div class="container">
            <div class="div1">
                <div class="row wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    @foreach ($recent_blogs as $key => $value )
                             @if($key % 2 != 0)
                             <div class="col-lg-3 col-sm-6  mb-5 mt-2" >
                                <div>
                                    <div class="wrapper1">
                                        <div class="navi1">
                                            @if ($value->image != null)
                                                    <img src="{{ asset('storage/uploads/cms/' . $value->image) }}" alt="image">
                                                @else
                                                    <img src="{{ (!empty($Value->image))?
                                                        asset('storage/uploads/cms/'.$Value->image):asset('storage/uploads/No-image.jpg') }}">
                                                @endif
                                        </div>
                                        <div id="infoi1">
                                            <div class="fixed">
                                                <h6>{{$value->groom}}</h6>
                                                <p>{!!  substr(strip_tags($value->content), 0, 139) !!}</p>
                                                <div class="d-flex align-items-end flex-column">
                                                    <div class="position-relative arrow-links">
                                                        <a href="{{route('blog')}}">
                                                            <img src="{{asset('website/images/1x/arrow.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @else
                             <div class="col-lg-3 col-sm-6 mb-5 mt-2">
                                <div>
                                    <div class="wrapper">
                                        <div class="navi">
                                            @if ($value->image != null)
                                            <img src="{{ asset('storage/uploads/cms/' . $value->image) }}" alt="image">
                                        @else
                                            <img src="{{ (!empty($Value->image))?
                                                asset('storage/uploads/cms/'.$Value->image):asset('storage/uploads/No-image.jpg') }}">
                                        @endif
                                        </div>
                                        <div id="infoi">
                                            <div class="fixed">
                                                <h6>{{$value->groom}}</h6>
                                                <p>{!!  substr(strip_tags($value->content), 0, 139) !!}
                                                </p>
                                                <div class="d-flex align-items-end flex-column">

                                                    <div class="position-relative arrow-links">
                                                        <a href="{{route('blog')}}">
                                                            <img src="{{asset('website/images/1x/arrow.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @endif
                         @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== WEDDING PLANNING  SECOND SECTION  CLOSED ============================ -->

    <!-- ===================== REGISTER NOW SECTION OPEN ================================= -->

    <section class="register-section position-relative" style="background-image: url('{{ asset('storage/uploads/cms/' . $vendors->image) }}')">
        <div class="register-upper-div">
            <div class="container">
                <div class="col-lg-12 pt-5">
                    <div class="d-flex justify-content-center align-item-center pt-5 wow animated zoomIn">
                        <div class="about-text-div">
                            <h1 class="about-text text-center pt-5">{{$vendors->title}}</h1>
                            <div class="about-para text-center pt-3">
                            <p class="about-para text-center pt-3 about-text-div">{!! $vendors->description3 !!}<br>  </p>
                            </div>
                            @if (!Auth::check())
                            <div class="reg-div text-center pb-5 pt-3"><a
                                    href="{{route('register')}}"><button class="reg-btn">Register
                                        Now</button></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============= REGISTER NOW SECTION CLOSED ====================================== -->
    <!-- ================ WEDDING PLANNING  OPEN ================================= -->
    <section class="wed-plan mt-5 mb-5 pb-5 wow animated bounceIn">
        <h1 class="wed-text pt-5">{{$meet_vendors->title}}</h1>
        <div class="container">
            <p class="wed-para text-center">{!!  substr(strip_tags($meet_vendors->description3), 0, 110) !!}<br>
                {!!  substr(strip_tags($meet_vendors->description3), 110, 150) !!}<br>{!!  substr(strip_tags($meet_vendors->description3), 150) !!}
            </p>
        </div>
    </section>
    <!-- ============================ WEDDING PLANNING  CLOSED ==================================== -->
    <section>
        <div class="container">
            <div class="div1">
                @if (!empty($getvendorsTestimonials))
                <div class="row wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                     @foreach ($getvendorsTestimonials as $key => $value )
                             @if($key % 2 != 0)
                             <div class="col-lg-3 col-sm-6  mb-5 mt-2" >
                                <div>
                                    <div class="wrapper1">
                                        <div class="navi1">
                                            @if ($value->get_about_vendordetails->image == true ??'')
                                            {{-- @if ($value->get_about_vendordetails->image ??'') --}}
                                            <img src="{{ asset('storage/uploads/cms/' . $value->get_about_vendordetails->image ?? '') }}">
                                            @else
                                            <div class="navi1">
                                                <img src="{{ (!empty($Value->get_about_vendordetails->image))?
                                                    asset('storage/uploads/cms/'.$Value->get_about_vendordetails->image):asset('storage/uploads/No-image.jpg') }}">
                                                       </div>
                                            @endif
                                        </div>

                                        <div id="infoi1">
                                            <div class="fixed">
                                                <h6>{{$value->get_about_vendordetails->name ??''}}</h6>
                                                <p>{!!  substr(strip_tags($value->aboutvendor ?? ''), 0, 139) !!}</p>
                                                <div class="d-flex align-items-end flex-column">
                                                    <div class="position-relative arrow-links">
                                                        <a href="{{route('popular_vendors')}}">
                                                            <img src="{{asset('website/images/1x/arrow.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @else
                             <div class="col-lg-3 col-sm-6 mb-5 mt-2">
                                <div>
                                    <div class="wrapper">
                                        <div class="navi">
                                            {{-- <img src="{{ asset('storage/uploads/cms/' . $value->get_about_vendordetails->image ?? '') }}"> --}}

                                            @if (@$value->get_about_vendordetails->image != null)
                                            <img src="{{ asset('storage/uploads/cms/' . $value->get_about_vendordetails->image ?? '') }}">
                                            @else
                                                <img src="{{ (!empty($Value->get_about_vendordetails->image))?
                                                    asset('storage/uploads/cms/'.$Value->get_about_vendordetails->image):asset('storage/uploads/No-image.jpg') }}">
                                            @endif
                                        </div>
                                        <div id="infoi">
                                            <div class="fixed">
                                                <h6>{{$value->get_about_vendordetails->name ?? ''}}</h6>
                                                <p>{!!  substr(strip_tags($value->aboutvendor ?? ''), 0, 139) !!}
                                                </p>
                                                <div class="d-flex align-items-end flex-column">

                                                    <div class="position-relative arrow-links">
                                                        <a href="{{route('popular_vendors')}}">
                                                            <img src="{{asset('website/images/1x/arrow.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @endif
                         @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>

@endsection
