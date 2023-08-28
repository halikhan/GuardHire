@extends('user-dashboard.layouts.master')
@section('content')
{{-- <?php
$data['VednorReg'] = Session::get('VednorReg');
$data['VednorLocation'] = Session::get('VednorLocation');
$data['package_id'] = Session()->get('package_id');
dd($data);
?> --}}
<style>
    .edit-submit-cstmbtn {
        margin-top: 2rem;
        background-color: #d82e6b;
    font-family: "Solway-Bold";
    font-weight: 600;
    color: #ffffff;
        border-radius: 12px;
        padding: 8px 16px;
        font-size: 16px;
    }

    .edit-submit-cstmbtn:hover {
        margin-top: 2rem;
        background-color: #d82e6b;
        font-family: "Solway-Bold";
        font-weight: 600;
        color: #fbf7f8;
    }
    .top-tabt-heading {
        color: #d82e6b;
        font-size: 58px;
        font-family: "JA-Hand-Reg";
    }

    #pageloader {
        background:rgb(129 129 129 / 17%);
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
        height: 100%;
         width: 100%;
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        filter: grayscale(1);
    }

</style>
      <div id="pageloader">
        <img src="{{asset('frontend/assets/1x/Preloader.gif') }}" alt="processing..." />
    </div>
    <div class="for-content-tabs">
        <h2 class="top-tabt-heading">Update Package</h2>
        <br><br>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script
src="https://www.paypal.com/sdk/js?client-id=Adf6_PAq0G48YZq8jMOEB9aD-eZBcQZfJEyCNBtszoe7yEdLd_fUdadTXzK9rTP0wBCb7TIeW5ykREUd&vault=true&intent=subscription"
data-sdk-integration-source="button-factory"></script>


<script>
  var planLocalId = '{{ $package->id }}';
        var plan_id_array = [null, 'P-76N14594V0216422VMNP7Y3I', 'P-9B967686377669239MNP72RQ', 'P-6FL4559459721450MMNP73PY',
            'P-0DW257385W304754LMNP74MQ'
        ];


    paypal.Buttons({
      createSubscription: function(data, actions) {
        return actions.subscription.create({
          'plan_id': plan_id_array[planLocalId]
        });
      },
      onApprove: function(data, actions) {
            //   console.log(details);

        $.ajax({
                url: '{{ route('update_vendor_payment') }}',
                type: 'GET',
                data: data,
                success: function(data) {
                    $("#pageloader").fadeIn();
                    if(data.status == 200){
                        console.log(data)
                        location.href = '{{route("vendor-dashboard")}}';

                    }
                    else{
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
    }).render('#paypal-button-container');
  </script>



<script type="text/javascript">
    $("#regiterForm").submit(function() {
    });
    </script>
@endsection
{{-- @push('scripts')

     @endpush --}}

