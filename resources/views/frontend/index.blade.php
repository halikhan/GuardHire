@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')
    <style>
        .featuredCard:hover {
            transform: scale(1);
        }

        .featuredTopImage h2 {
            top: 20%;
            font-size: 28px;
        }

        .card-top-heading {
            height: 200px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-image: linear-gradient(180deg, #00264d, #00264d, #000000eb);
            margin-bottom: 1rem;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .card-top-heading .braek-line {
            background-color: #ffffff4d;
            height: 1px;
            width: 80%;
            margin: 6px auto;
        }

        .card-top-heading h2 {
            font-family: GilroyBold;
            color: #fff;
            text-transform: capitalize;
            margin-bottom: 0px;
        }

        .box-width {
            width: 100%;
        }
    </style>
    <!-- sec# 01 Start Header -->

    <div class="margin-top-100">
        <div class="home-tricker">
            <figure class="marquee marquee--beet" data-text=" {{ $dummuText->configuration }} ">
                <span class="sr-only"> {{ $dummuText->configuration }} </span>
            </figure>
        </div>
    </div>
    <header class="headerImage margin-top-zero"
        style="background-image: url('{{ !empty($banners->image) ? asset('storage/uploads/cms/' . $banners->image) : asset('storage/uploads/No-gallery.jpg') }}')">
        <div class="container">

            <div class="row">
                <div class="offset-xl-5 col-xl-6 offset-lg-1 col-lg-10 col-md-12 col-sm-12  wow animate__animated animate__bounceIn"
                    data-wow-duration="1.2s">
                    <div class="headerDetails">
                        <h3>
                            {{ $section1->title }} <span>{{ $section1->title1 }} </span>
                            {{ $section1->title2 }}{{ $section1->title3 }}
                        </h3>
                        <p>
                            {{-- {!! $section1->title4 !!} --}}
                            {{ $section1->title4 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- End Header -->

    <!--  Start Search Form -->

    <section class="searchForm">
        @include('frontend.searchbox')
    </section>

    <!-- End Search Form -->

    <!-- sec# 02 Start Category -->

    <section class="category">
        <div class="container">
            <div class="catetoryHeading">
                <span class="strokeText"> {{ $section2->title }}</span>
                <h3> {{ $section2->title1 }}</h3>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
                    @if (Auth::check() && Auth::user()->type === 2)
                        <a href="{{ route('browse.quotes') }}">
                        @elseif (Auth::check() && Auth::user()->type === 3)
                            <a href="{{ route('browse.services') }}">
                            @else
                                <a href="{{ route('browse.services') }}">
                    @endif
                    <div class="categoryCard">
                        <div class="categoryCardImage">
                            <img src="{{ !empty($getArmedSecurity->image) ? asset('storage/uploads/cms/' . $getArmedSecurity->image) : asset('storage/uploads/No-image.jpg') }}"
                                alt="">
                            <div class="categoryName">
                                <h4>{{ $getArmedSecurity->title ?? 'No name found' }}</h4>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
                    @if (Auth::check() && Auth::user()->type === 2)
                        <a href="{{ route('browse.quotes') }}">
                        @elseif (Auth::check() && Auth::user()->type === 3)
                            <a href="{{ route('browse.services') }}">
                            @else
                                <a href="{{ route('browse.services') }}">
                    @endif
                    <div class="categoryCard">
                        <div class="categoryCardImage">
                            <img src="{{ !empty($getGroupSecurity->image) ? asset('storage/uploads/cms/' . $getGroupSecurity->image) : asset('storage/uploads/No-image.jpg') }}"
                                alt="">
                            <div class="categoryName">
                                <h4>{{ $getGroupSecurity->title ?? 'No name found' }}</h4>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
                    @if (Auth::check() && Auth::user()->type === 2)
                        <a href="{{ route('browse.quotes') }}">
                        @elseif (Auth::check() && Auth::user()->type === 3)
                            <a href="{{ route('browse.services') }}">
                            @else
                                <a href="{{ route('browse.services') }}">
                    @endif
                    <div class="categoryCard">
                        <div class="categoryCardImage">
                            <img src="{{ !empty($getUnarmedSecurity->image) ? asset('storage/uploads/cms/' . $getUnarmedSecurity->image) : asset('storage/uploads/No-image.jpg') }}"
                                alt="">
                            <div class="categoryName">
                                <h4>{{ $getUnarmedSecurity->title ?? 'No name found' }}</h4>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>

            {{--
                <div class="row">
                    @foreach ($getClientJobs as $value)
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.2s">
                    @if (is_object($value->client_postjob_details) && $value->client_postjob_details->featured_status == 1)
                        @if (Auth::check() && Auth::user()->type == 3)
                        <a href="{{ route('browse.services') }}">
                            <div class="categoryCard">
                                <div class="categoryCardImage">
                                    <img src="{{ !empty($value->get_user_images[0]['image'] ?? '') ? asset('storage/uploads/cms/' . $value->get_user_images[0]['image'] ?? '') : asset('storage/uploads/No-image.jpg') }}" alt="">
                                    <div class="categoryName">
                                        <h4>{{ $value->get_guardtype->name ?? '' }}</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @else
                            <a href="#">
                                <div class="categoryCard">
                                    <div class="categoryCardImage">

                                        <img src="{{ !empty($value->get_user_images[0]['image'] ?? '') ? asset('storage/uploads/cms/' . $value->get_user_images[0]['image'] ?? '') : asset('storage/uploads/No-image.jpg') }}" alt="">
                                        <div class="categoryName">
                                            <h4>{{ $value->get_guardtype->name ?? '' }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endif
                </div>
                @endforeach --}}

            {{-- <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
                    <a href="{{ route('browse.services') }}">
                        <div class="categoryCard">
                            <div class="categoryCardImage">
                                <img src="{{ asset('frontend/assets/images/categoryCardTwo.png') }}"alt="" />
                                <div class="categoryName">
                                    <h4>Armed Security</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.6s">
                    <a href="{{ route('browse.services') }}">
                        <div class="categoryCard">
                            <div class="categoryCardImage">
                                <img src="{{ asset('frontend/assets/images/categoryCardThree.png') }}"alt="" />
                                <div class="categoryName">
                                    <h4>Unarmed Security</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.8s">
                    <a href="{{ route('browse.services') }}">
                        <div class="categoryCard">
                            <div class="categoryCardImage">
                                <img src="{{ asset('frontend/assets/images/categoryCardFour.png') }}"alt="" />
                                <div class="categoryName">
                                    <h4>Executive Security</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                </div> --}}
            <!-- <div class="categoryButton">
                  <a href="#"><button class="contactButton">Contact Us</button></a>
                </div> -->
        </div>
    </section>

    <!-- End Category -->

    <!-- sec# 03 Start How It Works -->

    <section class="howItWorks">
        <div class="container">
            <div class="howItWorksHeading">
                <span class="strokeText"> {{ $section3->title }}</span>
                <h3> {{ $section3->title1 }}</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <a href="{{ route('how.it.works') }}">
                        <div class="howItWorksCard">
                            <div class="howItWorksCardIcon">
                                <img src="{{ asset('frontend/assets/images/howItWorksIconOne.svg') }}"alt="" />
                            </div>
                            <div class="howItWorksCardText">
                                <h6>{{ $section10->title }}</h6>
                                <p>{{ $section10->title1 }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-duration="1.2s">
                    <a href="{{ route('how.it.works') }}">
                        <div class="howItWorksCard">
                            <div class="howItWorksCardIcon">
                                <img src="{{ asset('frontend/assets/images/howItWorksIconTwo.svg') }}"alt="" />
                            </div>
                            <div class="howItWorksCardText">
                                <h6>{{ $section10->title2 }}</h6>
                                <p>{{ $section10->title3 }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- offset-lg-3  --}}
                <div class="col-lg-4 col-md-4 col-sm-12 wow animate__animated animate__fadeInRight"
                    data-wow-duration="1.2s">
                    <a href="{{ route('how.it.works') }}">
                        <div class="howItWorksCard">
                            <div class="howItWorksCardIcon">
                                <img src="{{ asset('frontend/assets/images/howItWorksIconThree.svg') }}"alt="" />
                            </div>
                            <div class="howItWorksCardText">
                                <h6>{{ $section10->title4 }}</h6>
                                {{-- <p> {!! $section10->content !!}</p> --}}
                                {!! $section10->content !!}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- End How It Works -->

    <!-- sec# 04 Start Hire Guards -->

    <section class="hire">
        <div class="container">
            <div class="hireGuards">
                <div class="hireGuardsHeading">
                    <h2>{{ $section4->title }} </h2>
                </div>
                @if (!Auth::user())
                    <div class="hireGuardsButton mt-4">
                        <a href="{{ route('frontend.signin') }}"><button class="quoteButton">Request a Quote</button></a>
                        <a href="{{ route('frontend.signin') }}"><button class="hireButton">Get Hired as Guard</button></a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- End How It Works -->

    <!-- sec# 05 Start Featured -->

    <section class="featured">
        <div class="container">
            <div class="howItWorksHeading">
                <span class="strokeText">{{ $section5->title }}</span>
                <h3>{{ $section5->title }}</h3>
            </div>
            <div class="row widthTop">
                @foreach ($getPackages as $key => $value)
                    @if ($key == 3)
                    @break
                @endif
                <div class="col-lg-4 col-md-4 col-sm-4" data-wow-duration="1.2s">

                    <div class="featuredCard mb-4">
                        {{-- <div class="featuredTopImage">
                            <img src="{{ asset('frontend/assets/images/featuredImageOne.png') }}" alt="" >

                            <h2> {{ $value->title }} ${{ $value->amount }}</h2>

                        </div> --}}
                        <div class="card-top-heading">
                            <div class="box-width">
                                <h2>{{ $value->title }}</h2>
                                <div class="braek-line"></div>
                                <h2>${{ $value->amount }}</h2>
                            </div>
                        </div>
                        <div class="featuredDetail">
                            <div class="featuredProperty">
                                <h5>{{ $value->title }}</h5>
                                <p>{{ $value->type }} Credits /$ {{ $value->amount }}</p>
                            </div>
                            <div class="featuredBudget">
                                <h5>Create Profile Listing:</h5>
                                {{-- <p>${{ $value->amount }}</p> --}}
                                <p>Free/ $00.00</p>
                            </div>
                            <div class="featuredDuration">
                                <h5>Create Service Listings:</h5>
                                <p>{{ $value->mid_details }} pts/listing</p>

                            </div>
                            <div class="featuredExpiry">
                                <h5>Message New Customers:</h5>
                                <p>{{ $value->deatails }} pts/Customer</p>
                                {{-- <p>{{ $value->created_at }}</p> --}}
                            </div>
                        </div>
                        <div class="featuredButtom">
                            @if (Auth::check() && Auth::user()->type == 2)
                                <a href="{{ route('stripe.payment.page', $value->slug) }}"
                                    onclick="get_package('{{ $value->id }}')">
                                    <button class="exploreButton">Select</button></a>
                            @else
                                {{-- <a href="#" onclick="get_package('{{ $value->id }}')" id="pkg_not_selected">
                                <button class="exploreButton">Login to Select</button></a> --}}

                                <a href="{{ route('frontend.signin') }}"
                                    onclick="get_package('{{ $value->id }}')" id="pkg_not_selected">
                                    <button class="exploreButton">Login To Hire</button>
                                </a>
                            @endif
                            {{-- <button class="featuredCardButtom">
                                <a onclick="get_package('{{ $value->id }}')" type="button"
                                     class="reg-btn-vendors-package ">Choose Pakage</a>
                            </button> --}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="categoryButton wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
            @if (Auth::check() && Auth::user()->type == 3)
                <a href="{{ route('browse.services') }}"><button class="exploreButton">Explore More</button></a>
            @else
                <a href="{{ route('frontend.signin') }}"><button class="exploreButton">Login To Explore
                        More</button></a>
            @endif
        </div>
    </div>
</section>

<!-- End Featured -->

<!-- sec# 06 Start Featured Security Requests -->

<section class="securityRequest">
    <div class="container">
        <div class="catetoryHeading">
            <span class="strokeText">{{ $section6->title }}</span>
            <h3>{{ $section6->title1 }}</h3>
        </div>
        <div class="row">
            {{-- @dd($getClientJobs) --}}
            @foreach ($getClientJobs as $value)
            @if (is_object($value->client_postjob_details) && $value->client_postjob_details->featured_status ==1)
            <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
                <div class="securityCard">
                    <div class="securityCardImage">
                        <img src="{{ !empty($value->get_user_images[0]['image'] ?? '') ? asset('storage/uploads/cms/' . $value->get_user_images[0]['image'] ?? '') : asset('storage/uploads/No-image.jpg') }}" alt="">
                    </div>
                    <div class="securityCardDetail">
                        <div class="securityCardHeading">
                            <a href="#">
                                <h5>{{ $value->client_postjob_details->name ?? '' }} | {{ $value->get_guardtype->name ?? '' }}</h5>
                            </a>
                            <p>{{ $value->client_location->location ?? '' }}</p>

                            {{-- <div class="wishlistIcon">
                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div> --}}
                        </div>
                        <div class="tags">
                            <div class="row">
                                @php
                                // Access the associated tags for this company
                                $tagIds = json_decode($value->tags, true); // Convert JSON string to PHP array
                                $companytags = App\Models\Tag::whereIn('id', $tagIds)->get(); // Retrieve the tags using the IDs
                                // @dd($tags);
                                @endphp
                                    <div class="col-lg-2 col-md-2">
                                        <div class="tagsHeading">
                                            <h6>Tags:</h6>
                                        </div>
                                    </div>
                                @foreach ($companytags as $tags_value)
                                    <div class="col-lg-2 col-md-2">
                                        <div class="armedHeading">
                                            <h6>{{ $tags_value->name ?? '' }}</h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="securityStartingHeading">
                            <h6>Starting From:</h6>
                            <p>${{ $value->per_hour_rate ?? '0.00' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
      </div>
        <div class="categoryButton wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
            @if (Auth::check() && Auth::user()->type == 2)
                <a href="{{ route('browse.quotes') }}"><button class="exploreMoreButton">Explore More</button></a>
            @elseif (Auth::check() && Auth::user()->type == 3)
                <a href="#"><button class="exploreMoreButton">Explore More</button></a>
            @else
                <a href="{{ route('frontend.signin') }}"><button class="exploreButton">Login To Explore
                        More</button></a>
            @endif
        </div>
    </div>
</section>

<!-- End Security Requests -->

<!-- sec# 07 Start Join Now -->

<section class="joinNow">
    <div class="container">
        <div class="joinNowGuards">
            <div class="hireGuardsHeading">
                <h2>{{ $section7->title }}</h2>
            </div>
            <div class="hireGuardsButton wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
                @if (!Auth::user())
                    <a href="{{ route('frontend.signin') }}"><button class="quoteButton">Request a Quote</button></a>
                    <a href="{{ route('frontend.signin') }}"><button class="hireButton">Get Hired as
                            Guard</button></a>
                @endif
            </div>
            <div class="termCondition">
                <p><a href="{{ route('terms.conditions') }}">{{ $section7->title1 }}</a> {{ $section7->title2 }} <a
                        href="{{ route('privacy.policy') }}">{{ $section7->title3 }}</a> {{ $section7->title4 }}</p>
            </div>
        </div>
    </div>
</section>

<!-- End Join Now -->

<!-- sec# 08 Start Security Companies -->

<section class="securityRequest">
    <div class="container">
        <div class="catetoryHeading">
            <span class="strokeText">{{ $section8->title }}</span>
            <h3>{{ $section8->title1 }}</h3>
        </div>
        <div class="row">
            {{-- @dd($getClientJobs) --}}
            @foreach ($getBrowseCompanies as $value)
                @if ($value->featured_status == 1)
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
                    <div class="securityCard">
                        <a href="{{ route('browse.quotes') }}">
                        <div class="securityCardImage">
                            {{-- <img src="{{ !empty($value->get_user_images[0]['image'] ?? '') ? asset('storage/uploads/cms/' . $value->get_user_images[0]['image'] ?? '') : asset('storage/uploads/No-image.jpg') }}" alt=""> --}}
                            <img src="{{ !empty($value->image) ? asset('storage/uploads/cms/' . $value->image) : asset('storage/uploads/No-image.jpg') }}"
                            alt="">
                        </div>
                        </a>
                        <div class="securityCardDetail">
                            <div class="securityCardHeading">
                                <h5>{{ $value->companyname ?? 'Company Name Not Found' }} | {{ $value->license_no ?? 'N/A' }} |
                                    @if ($value->guard_ratings->isEmpty())
                                    0.0/5
                                    @else
                                        <?php
                                        $totalRatings = $value->guard_ratings->count();
                                        $averageRating = $value->guard_ratings->avg('rate');
                                        ?>
                                        {{ number_format($averageRating, 1) }}/5
                                    @endif
                            </h5>

                                    {{-- <h5>{{ $value->get_guardtype->name ?? '' }} | {{ $value->client_location->location ?? '' }}</h5> --}}
                            </div>
                         <p>{{ $value->guard_location->location ?? 'N/A' }} | {{ $value->slogan ?? 'Slogan Not Found' }} </p>

                            <div class="tags">
                                <div class="row">
                                    @php
                                    // Access the associated tags for this company
                                    $tagIds = json_decode($value->tag_id, true); // Convert JSON string to PHP array
                                    $companytags = App\Models\Tag::whereIn('id', $tagIds)->get(); // Retrieve the tags using the IDs
                                    // @dd($tags);
                                    @endphp
                                        <div class="col-lg-2 col-md-2">
                                            <div class="tagsHeading">
                                                <h6>Tags:</h6>
                                            </div>
                                        </div>
                                    @foreach ($companytags as $tags_value)
                                        <div class="col-lg-2 col-md-2">
                                            <div class="armedHeading">
                                                <h6>{{ $tags_value->name ?? '' }}</h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="securityStartingHeading">
                                <h6>Starting From:</h6>
                                <p>${{ $value->starting_rate ?? '0.00' }}</p>

                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
      </div>
        <div class="categoryButton wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
            @if (Auth::check() && Auth::user()->type == 3)
                <a href="{{ route('browse.companies') }}"><button class="exploreMoreButton">Explore More</button></a>
            @elseif (Auth::check() && Auth::user()->type == 2)
                <a href="#"><button class="exploreButton">Explore More</button></a>
            @else
                <a href="{{ route('frontend.signin') }}"><button class="exploreButton">Login To Explore
                        More</button></a>
            @endif
            {{-- <a href="{{ route('browse.companies') }}"><button class="exploreMoreButton">Explore More</button></a> --}}
        </div>

    </div>
</section>

<!-- End Security Companies -->

<!-- sec# 09 Start Blogs -->

<section class="featured">
    <div class="container">
        <div class="howItWorksHeading">
            <span class="strokeText">{{ $section9->title }}</span>
            <h3>{{ $section9->title1 }}</h3>
        </div>
        <div class="row">
            @foreach ($blogsection as $value)
                <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn"
                    data-wow-duration="1.6s">
                    <div class="blogCard">
                        <a href="{{ route('site.blogs') }}">
                            <div class="securityCardImage">
                                <img
                                    src="{{ !empty($value->image)
                                        ? asset('storage/uploads/cms/' . $value->image)
                                        : asset('storage/uploads/No-image.jpg') }}">
                            </div>
                            <div class="securityCardDetail">
                                <div class="blogCardHeading">
                                    <h5>{{ $value->groom }}</h5>
                                    <p>{!! Str::limit($value->content, 100) ?? null !!}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="categoryButton wow animate__animated animate__fadeInUp" data-wow-duration="1.4s">
            <a href="{{ route('site.blogs') }}"><button class="exploreMoreButton">Explore More</button></a>
            {{-- @if (Auth::check())
                @else
                <a href="{{ route('frontend.signin') }}"><button class="exploreButton">Login To Explore More</button></a>
                @endif --}}
            {{-- <a href="{{ route('site.blogs') }}"><button class="exploreButton">Explore More</button></a> --}}
        </div>
    </div>
</section>

<!-- End Blogs -->
<script>
    if (!$("#pkg_not_selected").attr("href")) {
        toastr.info('Please Select any Package first');
    }
</script>
<!-- End Modal Rating -->
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
                //    console.log(data);
                if (data.status == 400) {
                    toastr.success('User added to wishlist successfully!');
                } else {
                    toastr.error(err.message);
                }
            }
        });
    }
</script>
@endsection
