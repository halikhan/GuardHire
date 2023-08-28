@extends('frontend.layouts.master')
@section('title', 'Company')
@section('content')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

    <!-- Start Header -->
    <style>
        .CompnaysecurityRating.securityStartingRating a {
            text-decoration: none;
        }

        .rating {
            float: left;
            width: fit-content;
        }

        .rating label {
            color: #90A0A3;
            float: right;
            font-size: 20px;
            margin-left: 1rem;
        }

        .rating input[type="radio"] {
            display: none;
        }

        .rating input[type="radio"]:checked~label {
            color: #003d70;
        }

        .checked {
            color: #00264d !important;
        }

        .CompnaysecurityRating a {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
    </style>
    <header class="browseSecurityHeaderImage"
        style="background-image: url('{{ !empty($banners->image) ? asset('storage/uploads/cms/' . $banners->image) : asset('storage/uploads/No-gallery.jpg') }}')">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="browseSecurityHeaderHeading">
                            <h2>{{ $getGuardcompany->companyname ?? '' }}</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- End Header -->


    <section class="groupSecurity">
        <div class="container-fluid ">
            <!-- Start Group Security -->
            {{-- @if (session('notification'))
            <div class="alert alert-{{ session('notification.alert-type') }}">
                {{ session('notification.message') }}
            </div>
            @endif --}}
            <div class="row">
                <div class="offset-lg-1 col-lg-4 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                    <div class="groupSecurityImage">
                        <img src="{{ !empty($getGuardcompany->image) ? asset('storage/uploads/cms/' . $getGuardcompany->image) : asset('storage/uploads/No-image.jpg') }}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                    <div class="groupSecurityDetail">
                        <h2>{{ $getGuardcompany->companyname ?? '' }} | {{ $getGuardcompany->name ?? '' }}</h2>
                        <p><b>{{ $getGuardcompany->slogan ?? 'Slogan Not Found' }} |  {{ $getGuardcompany->guard_location->location ?? 'N/A' }} | {{ $getGuardcompany->license_no ?? 'N/A' }}</b></p>
                        <div class="CompnaysecurityRating securityStartingRating">
                            <a href="#">
                                <div class="starIcon">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                @if ($getGuardcompany->guard_ratings->isEmpty())
                                    <h6>0.0/5 <span>(0)</span></h6>
                                @else
                                    <?php
                                    $totalRatings = $getGuardcompany->guard_ratings->count();
                                    $averageRating = $getGuardcompany->guard_ratings->avg('rate');
                                    ?>
                                    <h6>{{ number_format($averageRating, 1) }}/5
                                        {{-- <span>({{ $totalRatings }})</span> --}}
                                    </h6>
                                @endif
                            </a>
                        </div>
                        {{-- <p> {{ $getGuardcompany->email ?? '' }} | {{ $getGuardcompany->contact ?? '' }}</p> --}}
                        <p>{!! substr($getGuardcompany->description ?? '', 0, 300) !!} ...</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="offset-lg-1 col-lg-10 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
                    <div class="groupSecurityText">
                        <p>{!! $getGuardcompany->description ?? '' !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-lg-10 offset-lg-1 mt-4">
                        <div class="row">
                            <div class="companyRatingDetail">
                                <div class="col-lg-4 col-md-4">
                                    <div class="securityStarting securityStartingOne">
                                        {{-- @dd($getGuardcompany->starting_rate) --}}
                                        @if ($getGuardcompany->starting_rate != null)
                                            <h6>Budget: ${{ $getGuardcompany->starting_rate }}</h6>
                                        @else
                                            <h6>Budget: $0</h6>
                                        @endif
                                        {{-- <p>$100.00</p> --}}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="securityRating securityStartingRating rightLine">
                                        <a href="#">
                                            {{-- <div class="starIcon">
                                                 <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <h6>0.0/5 <span>(0)</span></h6> --}}
                                            <h6>
                                                @php
                                                    $id = $getGuardcompany->user_id;
                                                @endphp
                                                <a href="{{ url('/chatify', $id) }}">
                                                    <button type="button" class="hireNowButton hireNowButtonOne">Chat
                                                        Now</button></a>
                                                {{-- <button class="hireNowBtn" type="button" data-bs-toggle="modal"
                                                 data-bs-target="#exampleModalChat"> Hire Now</button> --}}

                                            </h6>

                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="securityRating securityStartingRating">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="javascript:void(0)" type="button"
                                            onclick="saveToWishlist({{ $getGuardcompany->id }})">
                                            <div class="listIcon">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                            </div>
                                            <h6>Save</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- End Group Security -->

    <!-- Start Portfolio -->

    <section class="featureSecurity">
        <div class="container">
            <div class="portfolioHeading">
                <h2>Portfolio</h2>
            </div>

            <main class="main">
                <div class="container containerOne">
                    @foreach ($getGuardPortfolioImage as $portfolioImage)
                        <div class="card">
                            <div class="card-image">
                                <a href="{{ !empty($portfolioImage->image) ? asset('storage/uploads/cms/' . $portfolioImage->image) : asset('storage/uploads/No-image.jpg') }}"
                                    data-fancybox="gallery">
                                    <img src="{{ !empty($portfolioImage->image) ? asset('storage/uploads/cms/' . $portfolioImage->image) : asset('storage/uploads/No-image.jpg') }}"
                                        alt="portfolio">
                                </a>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="card">
                        <div class="card-image">
                          <a href="{{ asset('frontend/assets/images/guardTwo.jpg') }}"
                          data-fancybox="gallery">
                            <img src="{{ asset('frontend/assets/images/guardTwo.jpg') }}" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="{{ asset('frontend/assets/images/guardThree.jfif') }}" data-fancybox="gallery">
                            <img src="{{ asset('frontend/assets/images/guardThree.jfif') }}" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="{{ asset('frontend/assets/images/guardFour.jpg') }}" data-fancybox="gallery">
                            <img src="{{ asset('frontend/assets/images/guardFour.jpg') }}" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="{{ asset('frontend/assets/images/guardFive.jpg') }}" data-fancybox="gallery">
                            <img src="{{ asset('frontend/assets/images/guardFive.jpg') }}" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="{{ asset('frontend/assets/images/guardSix.jpg') }}" data-fancybox="gallery">
                            <img src="{{ asset('frontend/assets/images/guardSix.jpg') }}"alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="{{ asset('frontend/assets/images/guardSeven.jpg') }}" data-fancybox="gallery">
                            <img src="{{ asset('frontend/assets/images/guardSeven.jpg') }}" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="{{ asset('frontend/assets/images/guardNine.jpg') }}" data-fancybox="gallery">
                            <img src="{{ asset('frontend/assets/images/guardNine.jpg') }}" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="{{ asset('frontend/assets/images/guardOne.webp') }}" data-fancybox="gallery">
                            <img src="{{ asset('frontend/assets/images/guardOne.webp') }}" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="{{ asset('frontend/assets/images/guardTwo.jpg') }}"
                          data-fancybox="gallery">
                            <img src="{{ asset('frontend/assets/images/guardTwo.jpg') }}" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="{{ asset('frontend/assets/images/guardThree.jfif') }}" data-fancybox="gallery">
                            <img src="{{ asset('frontend/assets/images/guardThree.jfif') }}" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="{{ asset('frontend/assets/images/guardFour.jpg') }}" data-fancybox="gallery">
                            <img src="{{ asset('frontend/assets/images/guardFour.jpg') }}" alt="Image Gallery">
                          </a>
                        </div>
                 </div> --}}

                </div>
                <div class="portfolioHeading">
                    <h2>Company Reviews</h2>
                </div>
                <br>
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            @if (count($guardCompanyRating) > 0)
                                <table id="exampleThree" class="table table-striped dataTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Guard Name</th>
                                            <th>Company Name</th>
                                            <th>Client Name</th>
                                            <th>Client Message</th>
                                            <th>Client Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guardCompanyRating as $key => $ratings)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $ratings->get_guard_name->name ?? '' }}</td>
                                                <td>{{ $ratings->get_guard_name->companyname ?? '' }}</td>
                                                <td>{{ $ratings->get_rated_client_name->name ?? '' }}</td>
                                                <td>{{ $ratings->message ?? '' }}</td>
                                                <td>
                                                    @if ($ratings->rate ?? '')
                                                        <span
                                                            class="fa fa-star{{ $ratings->rate >= 1 ? ' checked' : '' }}"></span>
                                                        <span
                                                            class="fa fa-star{{ $ratings->rate >= 2 ? ' checked' : '' }}"></span>
                                                        <span
                                                            class="fa fa-star{{ $ratings->rate >= 3 ? ' checked' : '' }}"></span>
                                                        <span
                                                            class="fa fa-star{{ $ratings->rate >= 4 ? ' checked' : '' }}"></span>
                                                        <span
                                                            class="fa fa-star{{ $ratings->rate == 5 ? ' checked' : '' }}"></span>
                                                    @else
                                                        no rating found
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="portfolioHeading">

                                    <p>No reviews found.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </main>

        </div>
    </section>
    <script type="text/javascript">
        function saveToWishlist(wishlist_id) {
            let id = wishlist_id;
            console.log(wishlist_id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('wishlist.job.save') }}",
                method: "POST",
                data: {
                    id: id,
                },
                success: function(data) {
                    if (data.status === 'already_added') {
                        toastr.info('This job is already in your wishlist!');
                    } else if (data.status === 'added') {
                        toastr.success('Job added to wishlist successfully!');
                    } else {
                        toastr.error('An error occurred while saving the job.');
                    }
                },
                error: function(err) {
                    toastr.error('An error occurred while saving the job.');
                }
            });
        }
    </script>
    <!-- End Portfolio -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Script to show the notification using Toastr.js --}}
    <script>
        $(document).ready(function() {
            @if (session('notification'))
                var notification = {!! json_encode(session('notification')) !!};
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right"
                };

                toastr[notification['alert-type']](notification['message']);
            @endif
        });
    </script>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
@endsection
