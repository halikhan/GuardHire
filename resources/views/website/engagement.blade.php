@extends('website.layout.master')
@section('title','South-Dakota-Bride | Engagement')
@section('content')
<style>

    .card a img {
        height: 100%;
        width: 100%;
        margin-top: 1rem;
    }

    .cstm-card-height a img {

        height: 100%;
        width: 100%;

    }
    .cstm-height {
    width: 100%;
    height: 400px;
    overflow: hidden;
}

</style>
<section class="Home-Section  pt-5 Gray-overlay mt-5">
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
                            <img src="{{ asset('storage/uploads/cms/' . $engagement_banner->image) }}" alt="">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 mb-5 overlay-image-text wow  animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <h1 class="couple-text pt-5">{{$engagement_banner->title1}}</h1>
                <h1 class="couple-text">{{$engagement_banner->title2}} <span>{{$engagement_banner->title3}}</span></h1>
                     <form action="{{route('engagement')}}" method="GET">
                            <div>
                                <input placeholder="Engagement Date" name="search" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />

                            </div>
                            <br />
                            <div class="reg-div">
                                <a href="javascript:void(0)">
                                    <button type="submit" class="sign-btn button wow animated bounceIn animate__delay-1s" >Search</button>
                                </a>
                            </div>
                    </form>
                    @if (!Auth::check())
                            <div class="d-flex align-item-center pt-4 ">
                            <div class="reg-div">
                                <a href="{{route('register')}}" >
                                    <button class="reg-btn button  wow animated bounceIn animate__delay-1s">Register</button>
                                </a>
                            </div>
                        </div>
                        @endif
        </div>
            </div>
        </div>
    </div>
</section>
<!-- ==============================================BANNER  CLOSED============================================== -->
<!-- ==============================================COUPLE SECTION  OPEN============================================== -->
<section class="Couple-Section mt-5">
    <div class="d-flex justify-content-center">
    <div class="CstDivs container">
       <div class="row mt-5">
        @if(count($engagementCeremony) == null)
        {{-- <div class="noUserFound"> --}}
            <span>No Engagement Found ...</span>
        {{-- </div> --}}
        @else
        @foreach($engagementCeremony as $item)

            <div class="col-lg-4 col-sm-6 mt-4 wow animate__delay-1s animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">

                <div class="cstm-card-height">
                    <a href="{{ route('engagement-details', $item->slug) }}">
                        <div class="cstm-height">
                            @if (!empty($item->image))
                            <img src="{{ asset('storage/uploads/cms/'.$item->image ??'')}}" class="card-img-top" alt="...">
                            @else
                            <img src="{{  asset('storage/uploads/No-image.jpg') }}" class="card-img-top" alt="...">
                            @endif
                        </div>

                    <div class="card-body">
                      <h6 class="card-text">{{$item->groom}}</h6>
                      <h6 class="card-text">And</h6>
                      <h6 class="card-text">{{$item->bride}}</h6>

                    </div>
                   </div>
                </a>
            </div>
            @endforeach
            @endif
            <div class="d-flex justify-content-around align-item-center mt-5 mb-5">
                {{ $engagementCeremony->links() }}

                        {{-- <div class="mt-5"><a href="javascript:void(0)"><button
                                    class="reg-btn wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">Load
                                    More</button></a></div> --}}
                    </div>
        </div>
       </div>
    </div>
</section>

@endsection

@push('scripts')

@if ($errors->any())
@foreach ($errors->all() as $error)
    <script>toastr.error('{{ $error }}')</script>
@endforeach
@endif

@if (Session::has('user_updated'))
    <script>swal('User Profile','{{ Session::get('user_updated') }}','success')</script>
@endif

@if (Session::has('user_error'))
    <script>swal('User Profile','{{ Session::get('user_error') }}','success')</script>
@endif

@endpush
