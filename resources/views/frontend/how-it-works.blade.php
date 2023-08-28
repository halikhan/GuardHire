@extends('frontend.layouts.master')
@section('title', 'How it Works')
@section('content')

    <header class="howItWorksHeaderImage"
        style="background-image: url('{{ !empty($banners->image) ? asset('storage/uploads/cms/' . $banners->image) : asset('storage/uploads/No-gallery.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="howItWorksHeaderHeading">
                        <h2>{{ $sectionhowitworks->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <!-- End Header -->

    <!-- Start Search Form -->

    <section class="searchFormBox">
        <div class="container">
            <div class="howItWorkSearchBox">
                <div class="searchwrapper howItWorkSearch wow animate__animated animate__bounceIn" data-wow-duration="1.5s">
                    <div class="searchbox">
                        <form method="GET" action="{{ route('apply.howitworks.search') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="search" type="search" class="form-control inputSearchField"
                                        placeholder="Type Here...">
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control categories" id="services" name="services" required>
                                        <option disabled selected>Select Service</option>

                                        @foreach ($getservice as $value)
                                            <option value="{{ $value->id }}">{{ $value->service }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control categories" id="location" name="location" required>
                                        <option disabled selected>Select Location</option>

                                        @foreach ($getlocation as $value)
                                            <option value="{{ $value->id }}">{{ $value->location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1"><input type="submit" class="btn searchButton" value="Search"></div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="hireGuardsButton mt-4">
                        <a href="{{ route('browse.quotes') }}"><button class="quoteButton">Request a Quote</button></a>
                        <a href="{{ route('browse.services') }}"><button class="hireButton">Get Hired as Guard</button></a>
                      </div> --}}
                </div>
            </div>
        </div>

    </section>

    <!-- End Search Form -->

    <!-- Start How It Works -->

    <section class="howItWorksDetails">
        <div class="container">
            <div class="row worksLeftRight">
                <div class="col-lg-5 col-md-12 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <div class="howItWorksImage">
                        <img src="{{ !empty($bannersfaqs->image) ? asset('storage/uploads/cms/' . $bannersfaqs->image) : asset('storage/uploads/No-gallery.jpg') }}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                    <div class="howItWorksText">
                        <div class="howItWorksTextHeading">
                            {{-- <h2>Guard Hire FAQ's</h2> --}}
                            {{-- <h2>{!! $sectionhowitworks->description3 !!}</h2> --}}
                            <h2>{{ $sectionhowitworks->title1 }}</h2>

                        </div>
                    </div>
                    <div class="howItWorksQa">
                        <div class="accordion" id="accordionExample">
                            <p>
                                {!! $sectionhowitworks->content !!}
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row worksLeftRight">
                <div class="col-lg-7 col-md-12wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                    <div class="howItWorksText">
                        <div class="howItWorksTextHeading">
                            <h2>{!! $sectionhowitworks->description3 !!}</h2>

                            </div>

                       </div>

                    </div>
            </div> --}}

            <div class="row worksLeftRight">
                <div class="faqCenterHeading">
                    <h2>{{ $names_of_faqs->title }}</h2>
                    {{-- <h2>General</h2> --}}
                </div>
                <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <div class="howItWorksQa">
                        <div class="accordion" id="accordionExampleOne">
                            @foreach ($general_faqs as $key => $faq)
                                @if ($key == 0)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne{{ $faq->id }}" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>
                                        <div id="collapseOne{{ $faq->id }}" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>{!! $faq->answer !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>

                                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>{!! $faq->answer !!}</p>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="row worksLeftRight">
                <div class="faqCenterHeading">
                    <h2>{{ $names_of_faqs->title1 }}</h2>
                    {{-- <h2>Client</h2> --}}
                </div>
                <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <div class="howItWorksQa">
                        <div class="accordion" id="accordionExampleOne">
                            @foreach ($client_faqs as $key => $faq)
                                @if ($key == 0)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne{{ $faq->id }}" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>
                                        <div id="collapseOne{{ $faq->id }}" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>{!! $faq->answer !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>

                                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>{!! $faq->answer !!}</p>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="row worksLeftRight">
                <div class="faqCenterHeading">
                    <h2>{{ $names_of_faqs->title2 }}</h2>
                    {{-- <h2>Guard</h2> --}}
                </div>
                <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                    <div class="howItWorksQa">
                        <div class="accordion" id="accordionExampleOne">
                            @foreach ($guard_faqs as $key => $faq)
                                @if ($key == 0)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne{{ $faq->id }}" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>
                                        <div id="collapseOne{{ $faq->id }}" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>{!! $faq->answer !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>

                                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>{!! $faq->answer !!}</p>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
@endsection
