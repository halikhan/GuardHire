@extends('website.layout.master')
@section('title', 'South-Dakota-Bride | Wedding-Details')
@section('content')
    <style>
        .card a {
            height: 340px;
            margin-top: 1rem;
        }

        .card a img {
            height: 100%;
            width: 100%;
            margin-top: 1rem;
        }

        .cstm-card-height img {

            width: 50%;
            height: 50%;

        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            /* margin-top: 5rem; */
            display: block;
            width: 100%;
            height: 100px;
            /* object-fit: center; */
        }
        .weds-banner-img.for-fit-to-content img{
            object-fit: none;
            object-position: top;
        }
    </style>
    <section class="mt-5 pt-5 pb-5 image-change">
        <div class="container CstDivs mt-5">
            <div class="row">
                <div class="col-lg-6 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    {{-- @foreach (json_decode($getWeddingimages->image) as $image) --}}
                    <div class="weds-banner-img for-fit-to-content" id="featured_img">
                        <img src="{{ !empty($details->image)? asset('storage/uploads/cms/' . $details->image)
                            : asset('storage/uploads/No-image.jpg') }}" alt="" id="img">
                    </div>
                    {{-- @endforeach --}}
                </div>
                {{-- @foreach ($getWeddingprofile as $value) --}}
                <div class="col-lg-6 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h1 class="weds-text pt-3 mt-3">{{ $details->groom ?? '' }}</h1>
                    <h1 class="weds-text">and</h1>
                    <h1 class="weds-text">{{ $details->bride ?? '' }}</h1>
                    <p class="weds-para pt-3">{{ $details->location ?? '' }}</p>
                    <h4 class="weds-text pt-3">the day we said yes</h4>
                    {{-- <p class="weds-para pt-3">{{ date('D,m,Y', strtotime($details->date . ' + day'))}}</p> --}}
                    <p class="weds-para pt-3">{{ date('M-d-y', strtotime($details->date)) }}</p>
                    <h4 class="weds-text pt-3">our love story</h4>
                    <p class="weds-para-p pt-5 pb-2">{!! $details->content ?? '' !!}</p>
                    <div class="d-flex justify-content-around mt-5" id="thumb_img">
                        {{-- <div class="weds-img-div"> --}}
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @if ($getWeddingimages)
                                    @foreach (json_decode($getWeddingimages->image ?? '') as $image)
                                        <div class="swiper-slide">
                                            <img class="active" src="{{ !empty($image)
                                                ? asset('storage/uploads/cms/' . $image)
                                                : asset('storage/uploads/No-image.jpg') }}"
                                                onclick="changeimg('{{ asset('storage/uploads/cms/' . $image) }}',this)">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/uploads/No-image.jpg') }}"
                                            onclick="changeimg('{{ asset('storage/uploads/No-image.jpg') }}',this)">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/uploads/No-image.jpg') }}"
                                            onclick="changeimg('{{ asset('storage/uploads/No-image.jpg') }}',this)">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/uploads/No-image.jpg') }}"
                                            onclick="changeimg('{{ asset('storage/uploads/No-image.jpg') }}',this)">
                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </section>
    <!-- ==========================  BANNER  CLOSED ====================================== -->
    <!-- =========================== COUPLE SECTION  OPEN ====================================== -->
    <section class="Couple-Section-wedding mt-5">
        <div class="d-flex justify-content-center">
            <div class="container CstDivs">
                <div class="row">
                    @foreach ($getbookvendor as $value)
                        <div class="col-lg-4 col-sm-6 mt-4 wow animate__delay-1s animated fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.5s">
                            <div class="card ">
                                <a href="{{ route('vendorlist', $value->get_book_vendors->slug) }}">
                                    @if ($value->get_book_vendors->image != null ?? '')
                                        <img src="{{ asset('storage/uploads/cms/' . $value->get_book_vendors->image) }}"
                                            alt="image" width: 100%; height: 100%>
                                    @else
                                        <img
                                            src="{{ !empty($Value->get_book_vendors->image)
                                                ? asset('storage/uploads/cms/' . $Value->get_book_vendors->image)
                                                : asset('storage/uploads/No-image.jpg') }}">
                                    @endif
                                </a>
                                <div class="card-body">
                                    <h5 class="card-text">
                                        {{ $value->get_book_vendors->get_vednorbusinesscategory->service ?? '' }}</h5>
                                    <p class="weds-card-para-p">{{ $value->get_book_vendors->name ?? '' }}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>

    </script>
@endsection
