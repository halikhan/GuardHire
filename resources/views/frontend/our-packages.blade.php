@extends('frontend.layouts.master')
@section('title', 'Browse Quotes')
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


    <section class="category">
        <div class="container">
            <div class="catetoryHeading mTop">
                <br>
                <span class="strokeText"> {{ $sectionBrowseQuotes->title }}</span>
                <h3> {{ $sectionBrowseQuotes->title }}</h3>
            </div>
        </div>
    </section>
    <!-- End Header -->

    <!-- Start Search Form -->
    {{-- <section class="searchFormBox">
        @include('frontend.searchbox')
    </section> --}}
    <!-- End Search Form -->


    <!-- Start Browse Quotes -->

    <section class="browseServices">
        <div class="container">
            <div class="row widthTop">
                @foreach ($getPackages as $key => $value)
                    @if ($key == 3)
                    @break
                @endif
                <div class="col-lg-4 col-md-4 col-sm-4" data-wow-duration="1.2s">

                    <div class="featuredCard mb-4">
                        {{-- <div class="featuredTopImage">
                        <img src="{{ asset('frontend/assets/images/featuredImageOne.png') }}" alt="" >
                        <h2>{{ $value->title }} ${{ $value->amount }}</h2>
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
                            @if (Auth::check())
                                <a href="{{ route('stripe.payment.page', $value->slug) }}"
                                    onclick="get_package('{{ $value->id }}')">
                                    <button class="exploreButton">Select</button></a>
                            @else
                                <a href="#" onclick="get_package('{{ $value->id }}')" id="pkg_not_selected">
                                    <button class="exploreButton">Login to Select</button></a>
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
                    @foreach ($getPackages as $key => $value)
                        @if ($key == 3)
                        @break
                    @endif
                    <div class="col-lg-4 col-md-4 col-sm-4" data-wow-duration="1.2s">

                        <div class="featuredCard mb-4">
                            <div class="featuredTopImage">
                                <img src="{{ asset('frontend/assets/images/featuredImageOne.png') }}"
                                    alt="">
                                <h2>{{ $value->title }} ${{ $value->amount }}</h2>
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
                                @if (Auth::check())
                                    <a href="{{ route('stripe.payment.page', $value->slug) }}"
                                        onclick="get_package('{{ $value->id }}')">
                                        <button class="exploreButton">Select</button></a>
                                @else
                                    <a href="#" onclick="get_package('{{ $value->id }}')"
                                        id="pkg_not_selected">
                                        <button class="exploreButton">Select</button></a>
                                @endif


                                {{-- <button class="featuredCardButtom">
                                    <a onclick="get_package('{{ $value->id }}')" type="button"
                                         class="reg-btn-vendors-package ">Choose Pakage</a>
                                </button> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
                <br>

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
            {{-- <div class="categoryButton" data-wow-duration="1.4s">
                    <a href="" id="payment_redirect">
                        <button  type="button" class="exploreButton" id="checkout-button">Subscribe</button>
                    </a>
                </div> --}}
        </div>
        <div class="modal-footer">
            <button type="button" class="exploreButton" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function confirmCreditJob(creditJobId) {
        swal({
            title: 'Confirmation',
            text: 'Are you sure you want to proceed? It will charge 5pts',
            icon: 'warning',
            buttons: ['Cancel', 'Proceed'],
        }).then((proceed) => {
            if (proceed) {
                getCredit_and_client_job_id(creditJobId);
            }
        });
    }

    function getCredit_and_client_job_id(credit_job_id) {
        // console.log(credit_job_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{ route('credit_client_job_details') }}",
            data: {
                'id': credit_job_id
            },
            success: function(response) {
                if (response.status === 200) {
                    toastr.success('You have Successfully connected!', 'Success');
                    window.location.href = response.redirect;
                    // setTimeout(function() {
                    // }, 3000);
                }
            }
        });
    }
</script>



<!-- End Modal -->
<script>
    function get_client_job_id(clientjob_id) {
        // console.log(clientjob_id);
        $.ajax({
            type: 'get',
            url: "{{ route('get_client_job_page') }}",
            data: {
                'id': clientjob_id
            },
            success: function(response) {
                if (response.status == 200) {
                    toastr.info('please buy a package first', 'Info');
                    // $("#payment_redirect").attr("href","{{ route('pay_amount') }}");
                }
            }
        });
    }
</script>

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
    if (!$("#pkg_not_selected").attr("href")) {
        toastr.info('Please Select any Package first');
    }
</script>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
@endsection
