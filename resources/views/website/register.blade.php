@extends('website.navbar.navbar')
@section('title','South-Dakota-Bride | Register')
@section('content')
<style>
    input.choices__input.choices__input--cloned {
    width: 120px !important;
}
</style>
<section class="vendors-register-section">
    <div class="vendors-register-upper-div">
        <div class="container pb-5">
            <div class="container pt-5">
                <h3 class="Testimonials-heading text-center text-white pt-5 mt-5">Testimonials</h3>
                <div class="swiper mySwiper mt-5 mb-5">
                    <div class="swiper-wrapper">
                        @foreach ($getTestimonials as $key => $value)
                        <div class="swiper-slide">
                            <div>

                            @if ($value->image != null)
                            <img src="{{ asset('storage/uploads/cms/' . $value->image) }}" alt="image" style="width:120px; height:120px;" class="mx-auto d-block user" alt="member" class="client-image">
                            @else
                            <img src="{{ (!empty($Value->image))?
                                asset('storage/uploads/cms/'.$Value->image):asset('storage/uploads/No-image.jpg') }}"
                                style="width:120px; height:120px;" class="mx-auto d-block user" class="client-image">
                            @endif
                                <div class="choose-card shadow-lg mr-3 ml-3 pt-5">
                                    <div class="d-flex justify-content-start">
                                        <img src="{{Asset('website/images/1x/inverted-commas.png')}}" alt="">
                                    </div>
                                    <h6 class="choose-card-heading pt-3">{{ $value->title }}</h6>
                                    <p class="choose-card-para">{!!Str::limit($value->content, 40)!!}</p>
                                    <div class="d-flex justify-content-end">
                                        <img src="{{asset('website/images/1x/inverted-commas1.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- ========================= SLIDER CLOSED ==================================== -->
            <div class="row">
                <div class="col-lg-12 pt-5">
                    <div class="z-index">
                        <h1 class="couple-text text-white mt-5 text-center pt-5 wow  animated bounceIn"
                            data-wow-duration="1s" data-wow-delay="0.5s">Vendors registration</h1>
                        <div class="col-lg-8 mx-auto">
                            <form class="form theme-form" id="" action="{{ route("vendor_store_Registeration") }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="from mt-5">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 wow animate__delay-1s animated fadeInLeft"
                                            data-wow-duration="1s" data-wow-delay="0.5s">
                                            <input class="Artical-input" type="name" name="name" placeholder="First Name">

                                        </div>
                                        <div class="col-lg-6 mb-4 wow animate__delay-1s animated fadeInLeft"
                                        data-wow-duration="1s" data-wow-delay="0.5s">
                                        <input class="Artical-input" type="name" name="last_name" placeholder="Last Name">

                                    </div>
                                        <div class="col-lg-6 mb-4 wow animate__delay-1s animated fadeInRight"
                                            data-wow-duration="1s" data-wow-delay="0.5s">
                                            <input class="Artical-input" type="email" name="email" placeholder="Email Address">

                                        </div>
                                        <div class="col-lg-6 mb-4 wow animate__delay-1s animated fadeInLeft"
                                            data-wow-duration="1s" data-wow-delay="0.5s">
                                            <input class="Artical-input" type="text" name="company" placeholder="Company">

                                        </div>
                                        <div class="col-lg-6 mb-4 wow animate__delay-1s animated fadeInRight"
                                            data-wow-duration="1s" data-wow-delay="0.5s">

                                            <select name="bussinessCategory" type="text" class="form-select" id="validationDefault03"
                                             placeholder="Bussiness Category">
                                            <option selected disabled>Business Category</option>
                                            @foreach ( $getServiceNames as $value )
                                            <option value="{{ $value->id }}">{{ $value->service }}</option>
                                            @endforeach
                                             </select>

                                        </div>
                                        <div class="col-lg-6 mb-4 wow animate__delay-1s animated fadeInLeft"
                                            data-wow-duration="1s" data-wow-delay="0.5s">
                                            <input id="phonebride" class="Artical-input" type="tel" placeholder="Phone No." name="contact"  maxlength="14"  pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">

                                        </div>

                                        <div class="col-lg-12 mb-4 wow animate__delay-1s animated fadeInRight comeForward">
                                            <select name="locations[]" id="choices-multiple-remove-button"
                                                placeholder="Location" multiple>
                                                @foreach ( $getLocationNames as $value )
                                                <option value="{{ $value->id }}">{{ $value->location }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br />
                                        <br />
                                        <br />
                                        <div class="col-lg-6 mb-4">
                                            <input class="Artical-input" name="password" type="password" placeholder="Password">

                                         </div>
                                         <div class="col-lg-6 mb-4">
                                            <input class="Artical-input" name="confirm_password" type="password" placeholder="Confirm Password">

                                         </div>
                                        <div class="col-lg-6 mx-auto pb-5 mt-4 reg-index wow animate__delay-1s animated bounceIn"
                                        data-wow-duration="1s" data-wow-delay="0.5s">

                                        <button type="submit" class="reg-btn-button btn">Register</button>

                                    </div>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('website.include.copyright')
<script type="text/javascript">
    $("#regiterForm").submit(function() {
    $("#pageloader").fadeIn();
    });
    </script>
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
