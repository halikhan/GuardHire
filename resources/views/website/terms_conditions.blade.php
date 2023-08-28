@extends('website.layout.master')
@section('title','South-Dakota-Bride | Terms-and-Conditions')
@section('content')
<section class="Home-Section mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="d-flex flex-row justify-content-around">
                    <div class="banner-links  wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="d-flex flex-column translate">
                            <div class="line-after">
                                <div class="line-after1"></div>
                            </div>
                            <div class="line-center">
                                <ul>
                                    <li><a href="{{$facebook[0]->social_media ?? ''}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="{{$instagram[0]->social_media ?? ''}} target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="{{$twitter[0]->social_media ?? ''}}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="{{$youtube[0]->social_media ?? ''}}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="line-before">
                                <div class="line-before2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-photo-text wow  animated fadeInLeft add-font" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h1 class="banner-photo-text pt-5">{{$terms->title}}</h1>
                        <p> {!! $terms->description !!}
                        </p>
                    </div>
                </div>

            </div>

        </div>
</section>

@endsection
