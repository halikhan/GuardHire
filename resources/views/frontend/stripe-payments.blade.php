@extends('frontend.layouts.master')
@section('title', 'Browse Quotes')
@section('content')

    <?php
        // $get_package =  App\Models\packages::find(session()->get('package_id'));
    // dd(session()->get('package_id'));

        require_once __DIR__ . '/../../../vendor/autoload.php';
        use Illuminate\Support\Facades\URL;
        use App\Models\PaymentDetail;
        $stripe = new \Stripe\StripeClient('sk_test_51KhLF7J5CNuTNvMYG43rQ5JIHfysm31ktZxesfAk5QoM7tNKwqjBsZdW7yiGyDHP0pv5xbCRX0oZymO1YzKlPSqa00k0tTHGiP');
        // $successUrl = auth()->user()->type === 2 ? URL::route('guard.dashboard') : (auth()->user()->type === 3 ? URL::route('client.dashboard') : URL::route('home'));
        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $package->title,
                        ],
                        'unit_amount' => intval($package->amount * 100 ?? ''),
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => URL::route('store_user_payment'),
            'cancel_url' => URL::route('home'),
        ]);

        $checkout_session_json = json_encode($checkout_session);
        session()->put('checkout_response', $checkout_session_json);

    ?>

    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }
        .checkoutBox{
            margin-top: 10%
        }
        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }



        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #00264d;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: rgb(8, 45, 73);
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
    <!-- End Header -->

    <!-- Start Search Form -->
    <section class="checkoutBox">
        <div class="row">
            <div class="col-75">
                <div class="container">
                    {{-- <div class="row">
                        <div class="col-100">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="New York">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="NY">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001">
                                </div>
                            </div>
                        </div>
                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                        </label>
                    --}}
                    <input type="submit" value="Continue to checkout" id="checkout-button" class="btn">
                    <label>
                    </label>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </div>
    </section>
    <!-- End Search Form -->

        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const stripe = Stripe(
                "pk_test_51KhLF7J5CNuTNvMYRYjEjy5QGaT2WVdzZ1Rbt6rPrrs8TCjgyPbjR69d37G7s6LnVte0OTlxduy1fESd090KpWkr00Rj8QLakP"
            );
            const btn = document.getElementById('checkout-button');
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                stripe.redirectToCheckout({
                    sessionId: "<?php echo $checkout_session->id; ?>"
                });
            });
        </script>
            <script>
                // Assuming you are using jQuery AJAX
                $.ajax({
                    // ... Your AJAX settings ...
                    success: function(response) {
                        if (response.status === 200) {
                            window.location.href = response.redirect;
                        }
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
            integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @endsection
