@extends('website.layout.master')
@section('title','South-Dakota-Bride | vendors')
@section('content')
<style>
    .cardvendor a{
        height: 340px;
        margin-top: 1rem;
    }

    .rating i {
            color: #ebd004;
        }
        .gold_star {
            color: #ebd004 !important;
            font-size: 14px;
        }

        .rating .black_star {
            color: #2c2c2c !important;
            font-size: 14px;
        }
        .cardvendor a img{
        height: 100%;
        width: 100%;
        margin-top: 1rem;
    }
</style>
<section class="Home-Section mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-row justify-content-around position-relative">
                    <div class="banner-links wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="d-flex flex-column translates">
                            <div class="line-after">
                                <div class="line-after1"></div>
                            </div>
                            <div class="line-center">
                                <ul>
                                    <li><a href="https://www.facebook.com" target="_blank"><i
                                                class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com" target="_blank"><i
                                                class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="https://www.twitter.com" target="_blank"><i
                                                class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="https://www.youtube.com" target="_blank"><i
                                                class="fa-brands fa-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="line-before">
                                <div class="line-before2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="banner-photo-text ">
                        {{-- <h1 class="banner-photo-text pt-5 wow  animated fadeInLeft">photographer-wedding-vendors</h1> --}}
                        <h1 class="banner-photo-text pt-5 wow  animated fadeInLeft">wedding-vendors</h1>

                        <div class="row mt-5">
                            <div class="col-lg-4 mt-5">
                                <a href="javascript:void(0)"><button class="vendors-a wow  animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Location</button></a>
                            </div>
                            <div class="col-lg-4 mt-5">
                                <a href="javascript:void(0)"><button class="reg-btn-vendors wow  animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">search</button></a>
                            </div>
                        </div>
                        <section class="Couple-Section-weddings">
                            <div class="container pt-5">
                                <div class="row">
                                    @foreach ($gevendorService as $value)
                                    <div class="col-lg-4 col-sm-6 mt-4 wow animate__delay-1s animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                        <div class="cardvendor">
                                            <a href="{{route('vendor-details',$value->slug)}}">

                                                @if ($value->image != null)
                                                <img src="{{ asset('storage/uploads/cms/' . $value->image) }}" alt="image" style="width:100%; height: 340px;">
                                                @else
                                                <img src="{{ (!empty($value->image))?
                                                    asset('storage/uploads/cms/'.$value->image):asset('storage/uploads/No-image.jpg') }}">
                                                @endif

                                            <div class="card-body">
                                                <h5 class="card-text">{{ $value->get_vednorbusinesscategory->service ??''}}</h5>
                                                <p class="weds-card-para-p">{{ $value->name ??''}}</p>
                                                <div class="rating text-center">
                                                    @if (!empty($value->get_user_rating[0]))
                                                    @for($i=1; $i <= 5; $i++)
                                                    @if($value->get_user_rating[0]->stars_rating >= $i)
                                                        <i class="fa fa-star gold_star"></i>
                                                    @else
                                                        <i class="fa fa-star black_star"></i>
                                                    @endif
                                                @endfor
                                                @else
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                @endif
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    @endforeach



                                </div>
                            </div>
                        </section>
                    </div>
                </div>

            </div>

        </div>
</section>
@endsection
