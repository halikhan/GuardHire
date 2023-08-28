@extends('website.layout.master')
@section('title','South-Dakota-Bride | About-us')
@section('content')
<section class="Home-Section mt-5 pt-5 Gray-overlay">
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6 overlay-image-text wow  animated fadeInLeft">
                <div class="d-flex flex-row justify-content-around">
                    <div>
                        <div class="d-flex flex-column translate">
                            <div class="line-after">
                                <div class="line-after1"></div>
                            </div>
                            <div class="line-center">
                                <ul>
                                    <li><a href="{{$facebook[0]->social_media ?? ''}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="{{$instagram[0]->social_media ?? ''}}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="{{$twitter[0]->social_media ?? ''}}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="{{$youtube[0]->social_media ?? ''}}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="line-before">
                                <div class="line-before2"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="couple-img-wed">
                            <img src="{{asset('storage/uploads/cms/'.$banner->image)}}" alt="">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 overlay-image-text wow  animated fadeInRight">
                <h1 class="couple-text pt-5">{{$banner->title}}</h1>



            </div>

        </div>
    </div>
</section>
<!-- =============================BANNER  CLOSED==================================== -->
=
 <section class="mt-5">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <h5 class="couple-text pt-5"><span>Welcome</span></h5>
                <h1 class="couple-text wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">{{$about->title}}</h1>
                <div class="art-inner-para wow  animated fadeInLeft">
                <p class="art-inner-para wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">{!!$about->description3!!}
                </div>
                </p>

             </div>
             <div class="col-lg-6 wow  animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="about-div">
                    <img src="{{asset('storage/uploads/cms/'.$about->image)}}" alt="">
                </div>
             </div>
             <div class="col-lg-12 mx-auto mt-5 wow  animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">

            </div>
            <div class="col-lg-6 wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="about-div">
                    <img src="{{asset('storage/uploads/cms/'.$about_section->image)}}" alt="">
                </div>
             </div>
            <div class="col-lg-6 wow  animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <h5 class="couple-text pt-5"><span>Welcome to</span></h5>
                <h1 class="couple-text">{{$about_section->title}}</h1>
                <div class="art-inner-para">
                <p class="art-inner-para">{!!$about_section->description3!!}
                </div>
                </p>

             </div>


         </div>
     </div>
 </section>

@endsection
