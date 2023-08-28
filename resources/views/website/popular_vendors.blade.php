@extends('website.layout.master')
@section('title', 'South-Dakota-Bride | Popular-Vendors')
<style>
    .card a {
        height: 340px;
        margin-top: 1rem;
    }

    .cstm-card-height img {
        height: 100%;
        width: 100%;
    }
.swiper-container.csymswiper-overflow{
    overflow: hidden;
    height: fit-content;
}
.noUserFound {
    display: flex !important;
    align-items: center !important;
    justify-content:center !important;
    height: 250px !important;
    font-family: 'Poppins-SemiBold' !important;
}
div.card {
    width: 100%;
    height: 500px !important;
}
</style>
@section('content')

    <section class="Home-Section pt-5 Gray-overlay mt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6 overlay-image-text wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="d-flex flex-row justify-content-around">
                        <div>
                            <div class="d-flex flex-column translate">
                                <div class="line-after">
                                    <div class="line-after1"></div>
                                </div>
                                <div class="line-center">
                                    <ul>
                                        <li><a href="{{ $facebook[0]->social_media ?? '' }}" target="_blank"><i
                                                    class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="{{ $instagram[0]->social_media ?? '' }}" target="_blank"><i
                                                    class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="{{ $twitter[0]->social_media ?? '' }}" target="_blank"><i
                                                    class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="{{ $youtube[0]->social_media ?? '' }}" target="_blank"><i
                                                    class="fa-brands fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                                <div class="line-before">
                                    <div class="line-before2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="Wed-Art-Divs">
                            <div class="couple-img-wed h-100">
                                {{-- <img src="{{ asset('storage/uploads/cms/' . $vendors_banner->image ??'') }}" alt=""> --}}
                                @if ($vendors_banner->image != null)
                                    <img src="{{ asset('storage/uploads/cms/' . $vendors_banner->image) }}"
                                        alt="image">
                                @else
                                    <img
                                        src="{{ !empty($vendors_banner->image)
                                            ? asset('storage/uploads/cms/' . $vendors_banner->image)
                                            : asset('storage/uploads/No-image.jpg') }}">
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 mb-5 overlay-image-text wow animated fadeInRight pt-2" data-wow-duration="1s"
                    data-wow-delay="0.5s">
                    <h1 class="couple-text-wed pt-2">{{ $vendors_banner->title }}</h1>
                    <div class="privacy-policy-para ">
                        <p class="privacy-policy-para ">
                            {!! $vendors_banner->description3 !!}<br>
                        </p>
                    </div>
                    <form action="{{ route('popular_vendors') }}">
                        <div class="row mt-5">
                            <div class="col-lg-6 ">
                                <p class="couple-para-wed">Search a Vendor by Category </p>
                                <input name="search" class="Artical-input" type="search" placeholder="Search">
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="javascript:void(0)"><button type="submit" class="reg-btn">Search Now</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ==============================================BANNER  CLOSED============================================== -->

    <section class="slider-section mt-5 pt-5">
        <h1 class="couple-text-wed pt-5 text-center wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
            Featured Vendors</h1>
        <div class="csContainer  mt-5">
            <div class="container">
                {{-- @if (!empty($getFeaturedVendors))
                <div class="noUserFound">
                    <span>No Vendor Found ...</span>
                </div>
                @else --}}
                @if(count($getFeaturedVendors) == null)
                {{-- <div class="noUserFound"> --}}
                    <span>No Vendor Found ...</span>
                {{-- </div> --}}
                @else
                <div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events csymswiper-overflow">

                    {{-- {{ dd($getFeaturedVendors); }} --}}
                    <div class="swiper-wrapper " id="swiper-wrapper-a174190929f27fa5" aria-live="off"
                        style="transform: translate3d(-2552px, 0px, 0px); transition-duration: 0ms;">


                        @foreach ($getFeaturedVendors as $key => $item)
                        <div class="swiper-slide swiper-slide-duplicate-prev"
                            data-swiper-slide-index="{{ $item->id }}" role="group"
                            aria-label="{{ $item->id }} / {{ count($getFeaturedVendors) }}"
                            style="width: 415.333px; margin-right: 10px;">

                            <div class="card mb-4 mt-5">
                                <div class="Features-images cstm-card-height">
                                    <img
                                        src="{{ !empty($item->get_top_vendors->image) ? asset('storage/uploads/cms/' . $item->get_top_vendors->image) : asset('storage/uploads/No-gallery.png') }}">
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="d-flex justify-content-around align-item-center mt-5 mb-5 wow animate__delay-1s  bounceIn animated"
                    data-wow-duration="1s" data-wow-delay="0.5s"
                    style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: bounceIn;">
                    @if (!Auth::check())
                    <div class="mt-5"><a href="{{ route('register') }}"><button class="reg-btn">Advertise with us</button></a>
                                </div>
                    @endif
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                @endif
            </div>
        </div>
    </section>

    <!-- ================= COUPLE SECTION  OPEN ============================= -->
    @if ($search == null)
    <section class="Couple-Section-wedding">
        <div class="CstDivs container">
            <h1 class="couple-text-wed pt-5 text-center wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                popular vendors categories</h1>

            <div class="d-flex justify-content-center">
                <div class="CstDivs container">
                    @if(count($getallPopular) == null)
                    {{-- <div class="noUserFound"> --}}
                        <span>No Vendor Found ...</span>
                    {{-- </div> --}}
                    @else
                    <div class="row">
                        @foreach ($getallPopular as $popular)
                        <div class="col-lg-4 col-sm-6 mt-4 wow animate__delay-1s animated fadeInLeft"
                            data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="card" style="height: 450px;">
                                <a href="{{ route('vendorlist', $popular->get_popular_vendors->slug ?? '') }}">
                                    <div class="cstm-card-height">
                                        <img
                                            src="{{ !empty($popular->get_popular_vendors->image)
                                                ? asset('storage/uploads/cms/' . $popular->get_popular_vendors->image)
                                                : asset('storage/uploads/No-gallery.png') }}">
                                    </div>

                                  <div class="card-body">
                                       <h5 class="card-text">
                                        {{ $popular->get_popular_vendors->get_vednorbusinesscategory->service ?? '' }}
                                      </h5>
                                      <p class="weds-card-para-p">{{ $popular->get_popular_vendors->name ?? '' }}</p>
                                  </div>
                                 </a>
                            </div>
                        </div>
                         @endforeach
                    </div>
                    @endif

                </div>
            </div>
    </section>
    @endif

    <!-- ================ COUPLE SECTION  CLOSED ================================ -->
    <!-- =========================== COUPLE SECTION  OPEN ================================ -->
    {{-- <br> <br> <br> --}}
    <section class="Couple-Section-wedding mt-5">
        <h1 class="couple-text-wed pt-5 text-center  wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
            Full vendors category list</h1>
        <div class="d-flex justify-content-center">
            <div class="CstDivs container">
                <div class="row">
                    @foreach ($gevendor as $value)
                        @if ($value->get_vednorbusinesscategory == null)
                            @continue
                        @endif
                        <div class="col-lg-4 col-sm-6 mt-4 wow animate__delay-1s animated fadeInLeft"
                            data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="card" style="height: 450px;">
                                <a href="{{ route('vendorlist', $value->slug) }}">
                                    @if ($value->image != null ?? '')
                                        <img src="{{ asset('storage/uploads/cms/' . $value->image) }}" alt="image"
                                            style="width:100%; height: 340px;">
                                    @else
                                        <img src="{{ !empty($Value->image)
                                            ? asset('storage/uploads/cms/' . $Value->image)
                                            : asset('storage/uploads/No-image.jpg') }}"
                                            style="width:100%; height: 340px;">
                                    @endif

                                <div class="card-body">
                                    <h5 class="card-text">{{ $value->get_vednorbusinesscategory->service ?? '' }}</h5>
                                    <p class="weds-card-para-p">{{ $value->get_book_vendors->name ?? '' }}</p>
                                </div>
                            </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
    </section>
@endsection
