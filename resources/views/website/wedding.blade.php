@extends('website.layout.master')
@section('title', 'South-Dakota-Bride | Wedding')
@section('content')
    <section class="Home-Section  pt-5 Gray-overlay mt-5">
        <div class="container pt-5">
            <div class="row ">
                <div class="col-lg-6 overlay-image-text wow animated fadeInLeft" data-wow-duration="1s"
                    data-wow-delay="0.5s">
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
                        <div class="Wed-Art-Div">
                            <div class="couple-img-wed">
                                <img src="{{ asset('storage/uploads/cms/' . $wedding_banner->image) }}" alt="">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 mb-5 overlay-image-text wow animated fadeInRight" data-wow-duration="1s"
                    data-wow-delay="0.5s">
                    <h1 class="couple-text-wed pt-5">{{ $wedding_banner->title }}</h1>
                    <p class="couple-para-wed">Search by couple name</p>

                    <form action="{{route('wedding')}}" method="GET">
                    <div>
                        <input type="search" name="search" placeholder="Find a couple"></div>
                    <div class="mt-4"><a href="javascript:void(0)"><button type="submit" class="reg-btn">Search
                                Now</button></a>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- ================================== BANNER  CLOSED ======================================= -->
    <!-- ===================================== COUPLE SECTION  OPEN ============================ -->
    <section class="Couple-Section mt-5">
        <div class="d-flex justify-content-center">
            <div class="CstDivs container">
                <div class="row mt-5">
                    @if(count($getWeddinglist) == null)
                    {{-- <div class="noUserFound"> --}}
                        <span>No Wedding Found ...</span>
                    {{-- </div> --}}
                    @else
                    @foreach ($getWeddinglist as $value)
                    <div class="col-lg-4 col-sm-6 mt-4 wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="card">
                            {{-- <a href="{{ route('wedding-details', $value->id) }}"> --}}
                                <a href="{{ route('wedding-details', $value->slug) }}">
                                <div class="cstm-card-height">
                                    @if (!empty($value->image))
                                    <img src="{{ asset('storage/uploads/cms/'.$value->image ??'')}}" class="card-img-top" alt="...">
                                    @else
                                    <img src="{{  asset('storage/uploads/No-image.jpg') }}" class="card-img-top" alt="...">
                                    @endif
                                </div>
                            <div class="card-body">
                                <h6 class="card-text">{{ $value->groom }}</h6>
                                <h6 class="card-text">And</h6>
                                <h6 class="card-text">{{ $value->bride }}</h6>
                            </div>
                        </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="d-flex justify-content-around align-item-center mt-5 mb-5">

                        {{ $getWeddinglist->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
