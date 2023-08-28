@extends('website.layout.master')
@section('title', 'South-Dakota-Bride | Payment')
@section('content')
    <?php
    $data['VednorReg'] = Session::get('VednorReg');
    $data['VednorLocation'] = Session::get('VednorLocation');
    $data['package_id'] = Session()->get('package_id');
    // dd($data['package_id']);
    ?>
    <style>
        #pageloader {
            background: rgb(129 129 129 / 17%);
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
            top: 0;
            left: 0;
        }

        #pageloader img {
            left: 50%;
            position: absolute;
            top: 50%;
          
            transform: translate(-50%, -50%);
            filter: grayscale(1);
        }
    </style>
    <div id="pageloader">
        <img src="{{ asset('frontend/assets/1x/Preloader.gif') }}" alt="processing..." />
    </div>

    <body class="body">
        <section class="signin-section pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 pt-4 mx-auto">
                        <h1 class="forget-password-text pt-5 text">Payment Details</h1>

                        <div class="col-lg-8 mx-auto mt-5 text-center">
                            <div class="paymentWrap d-flex justify-content-center">
                                <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">

                                    <input type="hidden" value="{{ csrf_token() }}" name="_token" id="_token" />
                                    <form id="regiterForm">
                                        {{ csrf_field() }}
                                        <div class="d-flex justify-content-center mt3 mb5 wow bounceIn">
                                            <div id="paypal-button-container"></div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </section>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script
        src="https://www.paypal.com/sdk/js?client-id=Adf6_PAq0G48YZq8jMOEB9aD-eZBcQZfJEyCNBtszoe7yEdLd_fUdadTXzK9rTP0wBCb7TIeW5ykREUd&vault=true&intent=subscription"
        data-sdk-integration-source="button-factory"></script>


    <script>
        var planLocalId = '{{ $package->id }}';
        var plan_id_array = [null, 'P-76N14594V0216422VMNP7Y3I', 'P-9B967686377669239MNP72RQ', 'P-6FL4559459721450MMNP73PY',
            'P-0DW257385W304754LMNP74MQ'
        ];


        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'subscribe'
            },
            createSubscription: function(data, actions) {
                return actions.subscription.create({
                    'plan_id': plan_id_array[planLocalId]
                });
            },
            onApprove: function(data, actions) {
                //   console.log(details);

                $.ajax({
                    url: '{{ route('store_vendor_payment') }}',
                    type: 'GET',
                    data: data,
                    success: function(data) {
                        $("#pageloader").fadeIn();
                        if (data.status == 200) {
                            console.log(data)
                            swal({
                                title: "Dear User!",
                                text: 'You have successfully purchased the plan',
                                type: "success",
                                icon: "success",
                            }).then(function() {
                                location.href = "{{ route('home') }}";
                            });
                        } else {
                            swal({
                                title: "Dear User!",
                                text: 'Something went wrong!, Please try again',
                                type: "error",
                                icon: "error",
                            });

                        }


                    }

                });
                console.log('Transaction completed');
            }
        }).render('#paypal-button-container'); // Renders the PayPal button
    </script>


    <script type="text/javascript">
        $("#regiterForm").submit(function() {

        });
    </script>
@endsection
