@extends('frontend.layouts.master')
@section('title', 'Browse Quotes')
@section('content')

<?php
$packageId = Session()->get('package_id');

if ($packageId){
    $package = App\Models\packages::find($packageId);
    require_once __DIR__ . '/../../../vendor/autoload.php';
    // This is your test secret API key.
    \Stripe\Stripe::setApiKey('sk_test_51KhLF7J5CNuTNvMYG43rQ5JIHfysm31ktZxesfAk5QoM7tNKwqjBsZdW7yiGyDHP0pv5xbCRX0oZymO1YzKlPSqa00k0tTHGiP');
    $session = \Stripe\Checkout\Session::create([
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $package->title ?? '',
                    ],
                    'unit_amount' => intval($package->amount * 100 ?? ''),
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => route('home'),
        // 'success_url' => 'https://example.com/success',
        'cancel_url' => 'https://example.com/cancel',
    ]);
    // Flash success message to session
    // Session::flash('success', 'Payment was successful.');
    // toastr.info('Payment was successfull');
    Session()->forget('package_id');

}
elseif ($packageId == null) {
// dd($packageId, 'walamba');
require_once __DIR__ . '/../../../vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51KhLF7J5CNuTNvMYG43rQ5JIHfysm31ktZxesfAk5QoM7tNKwqjBsZdW7yiGyDHP0pv5xbCRX0oZymO1YzKlPSqa00k0tTHGiP');
$session = \Stripe\Checkout\Session::create([
    'line_items' => [
        [
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'dummy'?? '',
                ],
                'unit_amount' => 1 * 100,
            ],
            'quantity' => 1,
        ],
    ],
    'mode' => 'payment',
    'success_url' => route('home'),
    // 'success_url' => 'https://example.com/success',
    'cancel_url' => 'https://example.com/cancel',
]);
    // Flash success message to session
    // Session::flash('success', 'Payment was successful.');
}
    // require 'vendor/autoload.php';

?>


<header class="howItWorksHeaderImage" style="background-image: url('{{ !empty($banners->image) ? asset('storage/uploads/cms/' . $banners->image) : asset('storage/uploads/No-gallery.jpg') }}')">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    <div class="container">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="browseServiceHeaderHeading">
                        <h2>{{ $sectionBrowseQuotes->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- End Header -->

<!-- Start Search Form -->
<section class="searchFormBox">
    @include('frontend.searchbox')
</section>
<!-- End Search Form -->


<!-- Start Browse Quotes -->

<section class="browseServices">
    <div class="container">
        <div class="row">

            {{-- ====== ApplyFilter ======== --}}
            <div class="col-lg-3 col-md-12">

                @include('frontend.applyclientfilters')
            </div>
            {{-- ====== End of ApplyFilter ======== --}}

            {{-- <div class="col-lg-3 col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item accordionItem">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button accordionButton collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    Search By Services
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body accordionBodyScroll">
                                    <div class="side_menu">
                                        <ul>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Bank Security</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Concert Event</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Church / House of Worship</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Construction Site</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Data Center</a>
                                                    </label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Medical Facility</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Movie Set and Film</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Location</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Personal / Executive</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Security</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Night Club and Night Lounge</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Political Event</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">School and Campus</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Stadium and Sporting Event</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Residential Security</a>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item accordionItem">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button accordionButton collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Guard Type : <span>(0 Selected)</span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body accordionBodyScroll">
                                    <div class="side_menu">
                                        <ul>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Armed Security</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Mobile Patrol</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Off Duty Law Enforcement</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">On Duty Law Enforcement</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Unarmed Security</a>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item accordionItem">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button accordionButton collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Hourly Rate
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body accordionBodyScroll">
                                    <div class="side_menu">
                                        <ul>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">$5 and Blow</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">$5 - $10</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">$10 - $20</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">$20 - $30</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">$30 - $40</a>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item accordionItem">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button accordionButton collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    Search By Location
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body accordionBodyScroll">
                                    <div class="side_menu">
                                        <input type="search" class="searchInput" placeholder="Search Location">
                                        <ul>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">US</a>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item accordionItem">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button accordionButton collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    Search By Language
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body accordionBodyScroll">
                                    <div class="side_menu">
                                        <input type="search" class="searchInput" placeholder="Search Language">
                                        <ul>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Abkhazian</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Afar</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Afrikaans</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Akan</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Albanian</a>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item accordionItem">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button accordionButton collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">
                                    Search By Tags
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body accordionBodyScroll">
                                    <div class="side_menu">
                                        <ul>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Armed Security</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Law Enforcement</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">CPR</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">24/7</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Kids Security</a>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        <a href="#">Other</a>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="applyFilter">
                        <p>Click “Apply Filter” to apply
                            latest changes made by you</p>
                        <a href="#"><button class="exploreButton">Apply Filter</button></a>
                    </div>
    </div> --}}

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                        <div class="groupSecurityImage">
                            <img src="{{ asset('frontend/assets/images/groupSecurityFive.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                        <div class="groupSecurityDetail">
                            <h2>Body Guard for any Event</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation
                                ullamcorper suscipit lobortis.</p>
                            <div class="row">
                                <div class="securityRatingDetail">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="securityStarting">
                                            <h6>Starting From:</h6>
                                            {{-- <p>$100.00</p> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="securityRating securityStartingRating">
                                            <a href="#">
                                                {{-- <div class="starIcon">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div> --}}
                                                <h6>$100.00</h6>
                                                {{-- <h6>0.0/5 <span>(0)</span></h6> --}}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="hireNow">
                                            <button class="hireNowButton" data-bs-toggle="modal" data-bs-target="#exampleModal">Hired Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="securityRatings securityBrowseRating">
                                    <a href="#">
                                        <div class="listIcon">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <h6>Save</h6>
                                    </a>
                                </div> --}}
                        </div>
                    </div>
                </div>

                @foreach ($getClientJobs as $value)
                <div class="row browseServiceCard">
                    <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                        <div class="groupSecurityImage">
                            <img src="{{ !empty($value->get_user_images[0]['image'] ?? '') ? asset('storage/uploads/cms/' . $value->get_user_images[0]['image'] ?? '') : asset('storage/uploads/No-image.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                        <div class="groupSecurityDetail">
                            <h2>{{ $value->get_guardtype->name ?? '' }}</h2>
                            <p>{!! substr($value->description ?? '', 0, 300) !!} ...</p>
                            <div class="row">
                                <div class="securityRatingDetail">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="securityStarting">
                                            <h6>Starting From:</h6>
                                            {{-- <p>$100.00</p> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="securityRating securityStartingRating">
                                            <a href="#">
                                                {{-- <div class="starIcon">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div> --}}
                                                {{-- <h6>0.0/5 <span>(0)</span></h6> --}}
                                                <h6>$ {{ $value->per_hour_rate ?? '' }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="hireNow">
                                            <a href="{{ route('body.guard.event', $value->id) }}"><button class="hireNowButton">Hired Now</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="securityRatings securityBrowseRating">
                                    <a href="#">
                                        <div class="listIcon">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <h6>Save</h6>
                                    </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                @endforeach

    {{-- <div class="row browseServiceCard">
                        <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="groupSecurityImage">
                                <img src="{{ asset('frontend/assets/images/groupSecurityThree.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h2>Body Guard for any Event</h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                    quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation
                                    ullamcorper suscipit lobortis.</p>
                                <div class="row">
                                    <div class="securityRatingDetail">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityStarting">
                                                <h6>Starting From:</h6>
                                                <p>$100.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityRating securityStartingRating">
                                                <a href="#">
                                                    <div class="starIcon">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                    <h6>0.0/5 <span>(0)</span></h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="hireNow">
                                                <a href="{{ route('body.guard.event') }}"><button class="hireNowButton">Hired Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="securityRatings securityBrowseRating">
                                    <a href="#">
                                        <div class="listIcon">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <h6>Save</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row browseServiceCard">
                        <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="groupSecurityImage">
                                <img src="{{ asset('frontend/assets/images/groupSecurityTwo.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h2>Pioneers Of E-Commerce Data Entry</h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                    quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation
                                    ullamcorper suscipit lobortis.</p>
                                <div class="row">
                                    <div class="securityRatingDetail">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityStarting">
                                                <h6>Starting From:</h6>
                                                <p>$100.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityRating securityStartingRating">
                                                <a href="#">
                                                    <div class="starIcon">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                    <h6>0.0/5 <span>(0)</span></h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="hireNow">
                                                <a href="{{ route('body.guard.event') }}"><button class="hireNowButton">Hired Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="securityRatings securityBrowseRating">
                                    <a href="#">
                                        <div class="listIcon">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <h6>Save</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row browseServiceCard">
                        <div class="col-lg-5 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="groupSecurityImage">
                                <img src="{{ asset('frontend/assets/images/groupSecurityOne.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                            <div class="groupSecurityDetail">
                                <h2>Body Guard for any Event</h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                    quis nostrud exerci tation ullamcorper suscipit lobortis, quis nostrud exerci tation
                                    ullamcorper suscipit lobortis.</p>
                                <div class="row">
                                    <div class="securityRatingDetail">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityStarting">
                                                <h6>Starting From:</h6>
                                                <p>$100.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="securityRating securityStartingRating">
                                                <a href="#">
                                                    <div class="starIcon">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                    <h6>0.0/5 <span>(0)</span></h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="hireNow">
                                                <a href="{{ route('body.guard.event') }}"><button class="hireNowButton">Hired Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="securityRatings securityBrowseRating">
                                    <a href="#">
                                        <div class="listIcon">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <h6>Save</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
    </div> --}}

    </div>
    </div>

    </div>
</section>


<!-- Start Browse Quotes -->

<!-- Start Modal -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Guard Hire Pricing Credit System</h1>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                
                {{-- <table class="table">
                        <thead class="amountTableHeading">
                            <tr>
                                <th scope="col">Items</th>
                                <th scope="col">Guard Basic</th>
                                <th scope="col">Guard Pro (Recommended) (50% Off)</th>
                                <th scope="col">Guard Premium (60% Off)</th>
                                <th scope="col">Client or Guard</th>
                            </tr>
                        </thead>
                        <tbody class="text">

                            <tr>
                                <td class="fieldNameOne">Points/Credits Earned</td>
                                <td class="fieldName">0 Credits / $0</td>
                                <td class="fieldName">50 Credits / $55 $27.5</td>
                                <td class="fieldName">100 / $110 $44</td>
                                <td class="fieldName">N/A</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Create a Profile Listings</td>
                                <td class="fieldName">Free / 0</td>
                                <td class="fieldName">Free / 0</td>
                                <td class="fieldName">Free / 0</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Create Service Listings</td>
                                <td class="fieldName">10</td>
                                <td class="fieldName">15</td>
                                <td class="fieldName">15</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Hired Now Features</td>
                                <td class="fieldName">5</td>
                                <td class="fieldName">5</td>
                                <td class="fieldName">5</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Respond to a Quote (Requests)</td>
                                <td class="fieldName">10</td>
                                <td class="fieldName">10</td>
                                <td class="fieldName">10</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Number of Skills (Tags)</td>
                                <td class="fieldName">1</td>
                                <td class="fieldName">1</td>
                                <td class="fieldName">1</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Service Add One</td>
                                <td class="fieldName">3</td>
                                <td class="fieldName">3</td>
                                <td class="fieldName">3</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Tags</td>
                                <td class="fieldName">2</td>
                                <td class="fieldName">2</td>
                                <td class="fieldName">2</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Featured (Sponsored) Service Listings</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr>
                                <td class="fieldNameOne">Featured (Sponsored) Guard Profile</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Paid Offline</td>
                                <td class="fieldName">Guard</td>
                            </tr>
                            <tr class="tableFooter">
                                <td class="fieldNameOne">Featured Quote for Service (Clients)</td>
                                <td class="fieldName">Paid Offline <br>
                                    <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                </td>
                                <td class="fieldName">Paid Offline <br>
                                    <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                </td>
                                <td class="fieldName">Paid Offline <br>
                                    <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                </td>
                                <td class="fieldName">Paid Offline <br>
                                    <a href="#"><button class="packageButton" type="button">Subscribe</button></a>
                                </td>
                            </tr>
                        </tbody>
                </table> --}}
 
                <div class="row">
                    {{-- @dd($getPackages) --}}
                    @foreach ($getPackages as $value)
                    <div class="col-lg-3 col-md-6 col-sm-12" data-wow-duration="1.2s">
                        <div class="featuredCard">
                            <div class="featuredTopImage">
                                <img src="{{ asset('frontend/assets/images/featuredImageOne.png') }}" alt="">
                                <h2>{{ $value->title }} ${{ $value->amount }}</h2>  
                            </div>
                            <div class="featuredDetail">
                                <div class="featuredProperty">
                                    <h5>{{ $value->title }}</h5>
                                    <p>{{ $value->type }}</p>
                                </div>
                                <div class="featuredBudget">
                                    <h5>Create Profile Listing:</h5>
                                    {{-- <p>${{ $value->amount }}</p> --}}
                                    <p>Free/ $00.00</p>
                                </div>
                                <div class="featuredDuration">
                                    <h5>Create Service Listings:</h5>
                                    <p>{{ $value->deatails }}</p>
                                </div>
                                <div class="featuredExpiry">
                                    <h5>Message New Customers:</h5>
                                    <p>{{ $value->mid_details }}</p>
                                    {{-- <p>{{ $value->created_at }}</p> --}}
                                </div>
                            </div>
                            <div class="featuredButtom">
                                <button class="featuredCardButtom">
                                    <a onclick="get_package('{{ $value->id }}')" type="button"
                                         class="reg-btn-vendors-package ">Choose Pakage</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12" data-wow-duration="1.2s">
                         
                            <script async src="https://js.stripe.com/v3/buy-button.js"></script>

                            <stripe-buy-button buy-button-id="buy_btn_1N1DpuJ5CNuTNvMY8beKbAQq" publishable-key="pk_test_51KhLF7J5CNuTNvMYRYjEjy5QGaT2WVdzZ1Rbt6rPrrs8TCjgyPbjR69d37G7s6LnVte0OTlxduy1fESd090KpWkr00Rj8QLakP">
                            </stripe-buy-button>
                         
                            <div class="howItWorksCardIcon" align="center">
                                <img src="{{ asset('frontend/stripe-QR/40$.png') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12" data-wow-duration="1.2s">
                        
                            <script async src="https://js.stripe.com/v3/buy-button.js">
                            </script>

                            <stripe-buy-button buy-button-id="buy_btn_1N1E0QJ5CNuTNvMY17XtRsM0" publishable-key="pk_test_51KhLF7J5CNuTNvMYRYjEjy5QGaT2WVdzZ1Rbt6rPrrs8TCjgyPbjR69d37G7s6LnVte0OTlxduy1fESd090KpWkr00Rj8QLakP">
                            </stripe-buy-button>
                          
                            <div class="howItWorksCardIcon" align="center">
                                <img src="{{ asset('frontend/stripe-QR/500$.png') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12" data-wow-duration="1.2s">
                     
                            <script async src="https://js.stripe.com/v3/buy-button.js">
                            </script>

                            <stripe-buy-button buy-button-id="buy_btn_1N1E1EJ5CNuTNvMYBWzLVcyJ" publishable-key="pk_test_51KhLF7J5CNuTNvMYRYjEjy5QGaT2WVdzZ1Rbt6rPrrs8TCjgyPbjR69d37G7s6LnVte0OTlxduy1fESd090KpWkr00Rj8QLakP">
                            </stripe-buy-button>
                         
                            <div class="howItWorksCardIcon" align="center">
                                <img src="{{ asset('frontend/stripe-QR/100$.png') }}" alt="" />
                            </div>
                        </div>
                    </div> --}}

                </div>

                <div class="categoryButton" data-wow-duration="1.4s">
                    <a href="" id="payment_redirect">
                        <button  type="button" class="exploreButton" id="checkout-button">Subscribe</button>
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="exploreButton" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe(
            'pk_test_51KhLF7J5CNuTNvMYRYjEjy5QGaT2WVdzZ1Rbt6rPrrs8TCjgyPbjR69d37G7s6LnVte0OTlxduy1fESd090KpWkr00Rj8QLakP'
        ) //Your Publishable key.
        const btn = document.getElementById('checkout-button');
        btn.addEventListener("click", function() {
            stripe.redirectToCheckout({sessionId: "<?php echo $packageId; ?>"})
            if (!$("#payment_redirect").attr("href")) {
            toastr.info('Please Select any Package first');
            }else {
                stripe.redirectToCheckout({sessionId: "<?php echo $packageId; ?>"})
                .then(function (result) {
                    if (result.error) {
                    // Display error message to user
                    toastr.error(result.error.message);
                    }
                })
            }            

            });
    </script>

<!-- End Modal -->
<script>
    function get_package(package_id) {

        $.ajax({
            type: 'get',
            url: "{{ route('payment') }}",
            data: {
                'id': package_id
            },
            success: function(response) {
                if (response.status == 200) {
                    toastr.success('Package (' + response.title + ' ' + response.amount +
                        ') has been selected, successfully!', 'success');
                    // $("#payment_redirect").attr("href","{{ route('pay_amount') }}");

                }
            },
        });
    }
    
</script>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
@endsection