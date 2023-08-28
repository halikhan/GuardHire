@extends('website.layout.master')
@section('title','South-Dakota-Bride | Events')
@section('content')

<section class="Home-Section pt-5 Gray-overlay mt-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6 overlay-image-text wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
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
                    <div class="Wed-Art-Div">
                        <div class="couple-img-wed">
                            <img src="{{ asset('storage/uploads/cms/' . $events_banner->image) }}" alt="">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 mb-5 overlay-image-text">
                <h1 class="couple-text pt-5 wow  animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">{{$events_banner->title}}</h1>



            </div>

        </div>
    </div>
</section>
<!-- =========================== BANNER  CLOSED ======================================= -->
 <!-- ====================== COUPLE SECTION  OPEN ============================= -->
 <section class="Event-Couple-Section mt-5">
    <div class="d-flex justify-content-center">
    <div class="CstDivs container">
       <div class="row mt-5">
        @foreach ( $event_details as $item)
            <div class="col-lg-4 col-sm-6 mt-4 wow animate__delay-1s animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="card">
                         <a href="{{ route('event-details',$item->slug)}}">
                       <div class="cstm-card-height">
                        <img src="{{ asset('storage/uploads/cms/' . $item->image) }}" class="card-img-top" alt="...">
                       </div>
                    </a>
                    <div class="card-body">
                      <h6 class="card-text">{{$item->title}}</h6>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-around align-item-center mt-5 mb-5 wow animate__delay-1s animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="mt-5"><a href="{{route('events')}}"><button class="reg-btn">less events</button></a></div>
        </div>
       </div>
    </div>
</section>

@endsection
