@extends('website.layout.master')
@section('title', 'South-Dakota-Bride | Vendor-Details')
@section('content')
    <?php
    $getlocation = new App\Models\location();
    // dd($getlocation);
    ?>
    <style>
        .gallery-section .active {
            border-bottom: none;
            color: #EC0169;
        }

        .bookbtn {
            border: none;
            border-radius: 5px;
            background-color: #f6921e;
            color: #ffffff;
            padding: 14px 53px;
            font-size: 12px;
            font-family: MontBold;
            margin-top: 1.5rem;
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

        .for-margin-main-top {
            margin-top: 4rem
        }

        .for-margin-top {
            margin-top: 1rem
        }

        .gallery-section .gallery-image {
            width: 100%;
            height: 400px;
        }

        .gallery-section .gallery-image img {
            width: 100%;
            height: 100%;
        }

        .reviewSendSection {
            background-color: #F2F2F2;
            padding-bottom: 1rem;
        }

        .profileDetail {
            display: flex;
            padding: 5px 0px;
            width: 100%;
        }

        .profileimg {
            background-color: gray;
            border-radius: 15px;
            margin-right: 10px;
            width: 80px;
            height: 80px;
            overflow: hidden;
        }

        .detailSection .tabsSection .profileimg {
            background-color: gray;
            border-radius: 15px;
            margin-right: 10px;
            width: 80px;
            height: 80px;
            overflow: hidden;
        }

        .profileName {
            margin-top: 8px;

        }

        .profileName input {
            border: none;
            border-bottom: 1px solid black;
            background: transparent;
            margin-bottom: 12px;
            padding-left: 8;
        }

        .ratingSection {
            display: flex;
        }

        .rating {
            display: flex;
            /* width: 100%; */
            justify-content: center;
            overflow: hidden;
            flex-direction: row-reverse;
            /* height: 150px; */
            position: relative;
        }

        .rating>label {
            cursor: pointer;
            width: 26px;
            height: 26px;
            margin-top: auto;
            background-image: url(data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 76%;
            transition: .3s;
        }

        .reviewPara input {
            width: 100%;
            border: none;
            border-bottom: 1px solid;
            font-family: 'MontRegular';
            padding: 5px 1px;
            margin: 5px 1px;
            background-color: transparent;
            outline: none;
        }

        .reviewPara {
            font-family: 'MontRegular';
            margin-top: 0.5rem;
            font-size: 12px;
        }

        .rating i {
            color: #ebd004;
        }

        .cstm-width.contact-from {
            width: 56%;
            margin: auto
        }

        .tabs-btn-btn.active {
            text-decoration: none;
            background-color: #000;
            color: #FFF;
            font-size: 12px;
            border: none;
            padding: 9px 30px;
            transition: 0.5s all ease-in-out;
        }

        .tabs-btn-btn {
            text-decoration: none;
            background-color: transparent;
            color: #FFF;
            font-size: 12px;
            border: none;
            padding: 9px 30px;
            transition: 0.5s all ease-in-out;
        }

        .cstm-color {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 50%;
            margin: auto;
        }

        .for-background-color {
            background-color: #d82e6b;
            padding: 10px;
        }

        .swiper-container {
            overflow: hidden;
        }
    </style>

    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: fixed;
            top: 0.5px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>

    <section class="slider-section mt-5 pt-5">
        <div class="csContainer mt-5">
            <div class="container">
                <div class="swiper-container ">
                    <div class="swiper-wrapper ">
                        @if (!empty($getVendorimages))
                        @if (json_decode($getVendorimages->image))
                            @foreach (json_decode($getVendorimages->image) as $image)
                                <div class="swiper-slide">
                                    <div class="card mb-4 mt-5">
                                        <div class="Slider_Images_Div">
                                            <img src="{{ asset('storage/uploads/cms/' . $image ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <div class="swiper-slide">
                                <div class="card mb-4 mt-5">
                                    <div class="Slider_Images_Div">
                                        <img
                                            src="{{ asset('storage/uploads/No-gallery.png') }}">
                                    </div>
                                </div>
                            </div>
                         @endif
                        @else
                            <div class="swiper-slide">
                                <div class="card mb-4 mt-5">
                                    <div class="Slider_Images_Div">
                                        <img
                                            src="{{ !empty($image) ? asset('storage/uploads/cms/' . $value->image) : asset('storage/uploads/No-gallery.png') }}">
                                    </div>
                                </div>
                            </div>

                        @endif

                    </div>
                </div>
            </div>
            <div class="sBtns">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

    <!-- =========================== slider closed =========================== -->
    <!-- =============== P R O F I L E INFO  ===================================== -->
    <section class="profile wow  animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container text-center  mt-5">
            <div class="row">

                <div class="col-lg-12">
                    @foreach ($getvendorDetailsService as $value)
                        <div>
                            <h1 class="text">{{ $value->name }}</h1>
                        </div>
                        <div class="rating pt-3">
                            @if (!empty($value->get_user_rating[0]))
                                {{-- {{ dd($value->get_user_rating[0]); }} --}}
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($value->get_user_rating[0]->stars_rating >= $i)
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
                        <div class="profile-links pt-3 d-flex justify-content-center">
                            <a href="https://goo.gl/maps/DKt5kZgULkunrP5MA">{{ $value->company }}</a>

                        </div>
                        <div class="d-flex justify-content-center profile-links pt-2">
                            <div> <a>{{ $value->contact ??''}}</a></div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center pt-3 con-inf-links-location">

                        @if (!empty($getVendorlocations->locations))
                            <a href="">
                                @php
                                    $data = $getlocation->whereIn('id', json_decode($getVendorlocations->locations))->get();
                                    //  dd($data);
                                @endphp
                                @foreach ($data as $items)
                                    <span>{{ $items->location ?? '' }} |</span>
                                @endforeach
                            </a>
                        @else
                            <span>No Cities</span>
                        @endif
                    {{-- <div class="d-flex justify-content-center">
                        <div class="p-2">
                    @if (!empty($getVendorlocations->locations))
                    <a href="">
                        @php
                            $data = $getlocation->whereIn('id', json_decode($getVendorlocations->locations))->get();
                            //  dd($data);
                        @endphp
                        @foreach ($data as $items)
                            <span>{{ $items->location ?? '' }} |</span>
                        @endforeach
                    </a>
                        @else
                            <span>No location</span>
                        @endif
                        </div>
                    </div> --}}
                    {{-- {{ dd(json_decode($getVendorlocations->locations ?? '') ); }} --}}

            </div>

                    <div class="d-flex  justify-content-center pt-3 profile-links">
                        <div class="icons-div">
                            <span><a href="{{ $vendorfacebook[0]->social_media ?? '' }}" target="_blank"><i
                                        class="fa-brands fa-facebook-square"></i></a></span>
                        </div>
                        <div class="icons-div">
                            <span><a href="{{ $vendorinstagram[0]->social_media ?? '' }}" target="_blank"><i
                                        class="fa-brands fa-instagram"></i></a></span>
                        </div>
                        <div class="icons-div">
                            <span><a href="{{ $vendortwitter[0]->social_media ?? '' }}" target="_blank">
                                    <i class="fa-brands fa-twitter"></i></li></a></span>
                        </div>
                        <div class="icons-div">
                            <span><a href="{{ $vendoryoutube[0]->social_media ?? '' }}" target="_blank">
                                    <i class="fa-brands fa-youtube"></i></li></a></span>
                        </div>

                    </div>


                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- ======================  N A V B A R  ========================================= -->
    <div class="container mt-4 CSTM for-background-color">
        <div class="nav nav-pills cstm-color" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="tabs-btn-btn" id="v-pills-review-tab" data-bs-toggle="pill" data-bs-target="#v-pills-review"
                type="button" role="tab" aria-controls="v-pills-review" aria-selected="false">Cities</button>
            <button class="tabs-btn-btn active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Photos</button>
            <button class="tabs-btn-btn" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">About</button>
            <button class="tabs-btn-btn" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
                type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Reviews</button>
            <button class="tabs-btn-btn" id="v-pills-settings-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                aria-selected="false">Contact</button>
        </div>
    </div>
    <div class="gallery-section">
        <div class="container">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab">
                    <div class="row for-margin-main-top ">
                        @if (!empty($getVendorimages))
                        @if (json_decode($getVendorimages->image))
                            @foreach (json_decode($getVendorimages->image) as $image)
                                <div class="col-lg-4">
                                    <div class="gallery-image mt-3 mb-3 ">
                                        <img src="{{ asset('storage/uploads/cms/' . $image ?? '') }}" alt="">

                                    </div>
                                </div>
                            @endforeach
                            @else
                            <div class="col-lg-4">
                                <div class="gallery-image">
                                    <img
                                        src="{{ asset('storage/uploads/No-image.jpg') }}">
                                </div>
                            </div>
                         @endif
                        @else
                            <div class="col-lg-4">
                                <div class="gallery-image">
                                    <img
                                        src="{{ !empty($image) ? asset('storage/uploads/cms/' . $image) : asset('storage/uploads/No-image.jpg') }}">
                                </div>
                            </div>
                        @endif


                    </div>

                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div>
                        <div class="art-inner-para wow   fadeInLeft animated" data-wow-duration="1s"
                            data-wow-delay="0.5s"
                            style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInLeft;">
                            <h5 class="couple-text pt-5"><span></span></h5>
                            <h1 class="couple-text wow   fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s"
                                style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInLeft;">
                                About {{ $value->name }} photography</h1>
                            {{-- <h4 class="">About {{ $value->name }} photography</h4> --}}
                            <div class="art-inner-para wow   fadeInLeft"
                                style="visibility: visible; animation-name: fadeInLeft;">

                                @if ($getAboutVendors)
                                <p class="art-inner-para wow   fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s"
                                style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInLeft;">
                                {!! strip_tags($getAboutVendors->aboutvendor ?? '') !!}
                                </p>
                                @else
                                <p class="art-inner-para" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                No data available
                                </p>
                                @endif
                            </div>
                            <div class="wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <h4 class="pt-5">Services</h4>
                                <span>{{ $value->get_vednorbusinesscategory->service ?? '' }} </span>
                            </div>
                            <div class="wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                {{-- <h4 class="pt-5">{{ $value->name }} photographer Stoplight</h4>
                                <p>{{ $getAboutVendors->stoplight ?? '' }}</p>

                                <div class="">
                                    <a href="{{ !empty($getAboutVendors->image)
                                        ? asset('storage/uploads/cms/' . $getAboutVendors->image ?? '')
                                        : asset('storage/uploads/No-image.jpg') }}"
                                        download><button class="reg-btn">
                                            Vendor Stoplight</button>
                                    </a>
                                </div> --}}

                                <h4 class="pt-5">{{ $value->name }} photographer reviews</h4>
                                <p>{{ $getAboutVendors->reviews ?? '' }}</p>
                            </div>
                            <div class="">
                                <a href="{{ !empty($getAboutVendors->image2)
                                    ? asset('storage/uploads/cms/' . $getAboutVendors->image2 ?? '')
                                    : asset('storage/uploads/No-image.jpg') }}"
                                    download><button class="sign-btn">Register to reviews</button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="row for-margin-main-top">
                        <div class="col-lg-12 mt1 mb1 reviewSendSection">

                            <form action=" {{ route('user_rating', $value->id) }}" enctype="multipart/form-data"
                                method="post">
                                @csrf
                                <div class="profileDetail">
                                    <div class="profileimg">
                                        <img src="https://venu2go.com/public/assets/public/img/SVG/user.png"
                                            alt="avatar" width="80" style="border-radius: 50%">
                                    </div>

                                    <div class="profileName">
                                        <input type="text" placeholder="Name" name="userName">
                                        <div class="ratingSection">
                                            <div class="feedback">
                                                <div class="rate">
                                                    <input type="radio" id="star5" name="stars_rating"
                                                        value="5" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="stars_rating"
                                                        value="4" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="stars_rating"
                                                        value="3" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="stars_rating"
                                                        value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="stars_rating"
                                                        value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviewPara">
                                    <input type="text" placeholder="Write a Review..." name="review">
                                    <div class="reviewSendbtn text-end mt1">
                                        <button type="submit" class="reg-btn"> Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="cstm-width contact-from">
                        <div class="text-center wow   fadeInRight animated" data-wow-duration="1s" data-wow-delay="0.5s"
                            style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInRight;">
                            <h3 class="couple-text pt-5">get in touch</h3>
                            <form id="regiterForm" action="{{ route('vendor_contact', $value->id) }}" method="POST"
                                class="from">
                                @csrf
                                <input type="name" name="name" placeholder="Name">
                                <input type="email" name="email" placeholder="Email Address">
                                <input id="phonebride" class="Artical-input" type="tel" placeholder="Phone No."
                                    name="phone_number" maxlength="14" pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                                <textarea type="message" name="message" id="" cols="85" rows="7" placeholder="Message"></textarea>
                                <div class="d-flex justify-content-around align-item-center mt-5 mb-5">
                                    <div class="mt-5"><button type="submit" class="reg-btn wow animated bounceIn"
                                            data-wow-duration="1s" data-wow-delay="0.5s"
                                            style="visibility: hidden; animation-duration: 1s; animation-delay: 0.5s; animation-name: none;">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-review" role="tabpanel" aria-labelledby="v-pills-review-tab">
                    <div class="d-flex justify-content-around mt-5 con-inf-links-location">
                        <div class="d-flex justify-content-center">
                            <div class="p-2"><a href="">Cities</a></div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-center">
                                <div class="p-2">
                                    @if (!empty($getVendorlocations->locations))
                                        <a href="">
                                            @php
                                                $data = $getlocation->whereIn('id', json_decode($getVendorlocations->locations))->get();
                                                //  dd($data);
                                            @endphp
                                            @foreach ($data as $items)
                                                <span>{{ $items->location ?? '' }} |</span>
                                            @endforeach
                                        </a>
                                    @else
                                        <span>No location</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- ============================================== contact info   ========================================= -->
    <section class="details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-info mt-5 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h1>{{ $value->name }} contact info</h1>
                        <div class="col-lg-8 col-sm-8 mx-auto">
                            <div class="d-flex justify-content-around mt-5 con-inf-links">
                                <div class="d-flex justify-content-center">
                                    <div class="p-2"><i class="fa-solid fa-phone"></i></div>
                                    <div class="p-2"><a href="tel:123-456-789">{{ $value->contact }}</a></div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-center">
                                        <div class="p-2"><i class="fa-solid fa-envelope"></i></div>
                                        <div class="p-2"><a href="mailto:webapparel@mail.com"
                                                target="_blank">{{ $value->email }}</a></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-center">
                                        <div class="p-2"><i class="fa-solid fa-location-dot"></i></div>
                                        <div class="p-2"><a href="https://goo.gl/maps/DKt5kZgULkunrP5MA"
                                                target="_blank">{{ $value->company }}</a></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript">
        document.getElementById('phonebride').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
        document.getElementById('phone13').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>

@endsection
<link rel="stylesheet" href="https://codepen.io/depy/pen/LaXVEK.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://codepen.io/depy/pen/LaXVEK.js"></script>
@push('scripts')
    <script>
        $("#regiterForm").submit(function() {
            $("#pageloader").fadeIn();
        });
        $(document).ready(function() {

            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function() {
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    } else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function() {
                $(this).parent().children('li.star').each(function(e) {
                    $(this).removeClass('hover');
                });
            });


            /* 2. Action to perform on click */
            $('#stars li').on('click', function() {
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                var msg = "";
                if (ratingValue > 1) {
                    msg = "Thanks! You rated this " + ratingValue + " stars.";
                } else {
                    msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
                }
                responseMessage(msg);

            });


        });


        function responseMessage(msg) {
            $('.success-box').fadeIn(200);
            $('.success-box div.text-message').html("<span>" + msg + "</span>");
        }
    </script>
@endpush
