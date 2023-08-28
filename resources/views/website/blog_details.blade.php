@extends('website.layout.master')
@section('title','South-Dakota-Bride | Blog-Details')
<style>
    .cstm-img-height{
        width: 100%;
        height: 100%;
    }
</style>
@section('content')
<section class="Home-Section mt-5 pt-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 col-sm-12 wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="d-flex flex-row justify-content-around">
                    <div>
                        <div class="d-flex flex-column translate">
                            <div class="line-after">
                                <div class="line-after1"></div>
                            </div>
                            <div class="line-center">
                                <ul>
                                    <li><a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="https://www.youtube.com" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="line-before">
                                <div class="line-before2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="couple-img-wed cstm-img-height">
                        <img src="{{ asset('storage/uploads/cms/' . $details->image) }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12 wow  animated fadeInRight add-font" data-wow-duration="1s" data-wow-delay="0.5s">
                <h1 class="couple-text pt-5">{{$details->men}}</h1>
                <h1 class="couple-text">{{$details->women}}</h1>
                <p class="art-inner-para">{!! $details->content !!}
                 </p>


            </div>
         
        </div>
    </div>
</section>
@endsection
