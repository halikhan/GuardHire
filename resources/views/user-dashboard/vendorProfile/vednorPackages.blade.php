@extends('user-dashboard.layouts.master')
@section('content')
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
    .banner-photo-text.for-width-full{
        width: 100%;
    }
    .banner-photo-text.for-width-full .Couple-Section-weddings.remove-tanslate{
        transform: translate(0%);
    }

</style>
    <div class="for-content-tabs">
        <h2 class="top-tabt-heading">Update Package</h2>
        <br><br>

        <div class="banner-photo-text for-width-full">
            <section class="Couple-Section-weddings remove-tanslate">
                <div class="container">
                <div class="row">
                    {{-- <div class="col-lg-2 col-sm-6  mb-5">
                    </div> --}}
                    @foreach ( $vednorpackages as $value )

                    <div class="col-lg-3 col-sm-6  mb-5">
                        <label  for="p{{ $value->id }}" class="w-100">
                            <input type="hidden" name="package_id" id="packageId" />
                            <input type="radio" name="package" id="p{{ $value->id }}" hidden>
                            <div class="card Package-card p-card">
                                <h1 class="package-title pt-4">{{ $value->title }}</h1>
                                <span class="package-price">$ {{ $value->amount }}</span>
                            <div class="pt-4 pb-5">
                                <p class="package-p">&#10004; {{ $value->type }}<p>
                                <p class="package-p">&#10004; {{ $value->deatails }}</p>
                                <p class="package-p">&#10004; {{ $value->mid_details }}</p>
                            </div>
                            <div class="pb-5 mb-5 text-center">
                                <a  onclick="get_package('{{ $value->id }}')" type="button" class="reg-btn-vendors-package wow bounceIn animated">Choos e Pakage</a>
                            </div>
                            </div>
                        </label>
                    </div>
                    @endforeach
                        <div class="text-center mb-5">
                            <a id="payment_redirect">
                                <button class="reg-btn-vendors wow   bounceIn animated" data-wow-duration="1s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: bounceIn;">next</button></a>
                        </div>
                     </div>
                </div>
            </section>
        </div>
    </div>
    <script>
        function get_package(package_id){
                $.ajax({
                type: 'get',
                url: '{{ route('vendor_payment_package') }}',
                data: {'id' : package_id},
                success: function(response){

                    if(response.status == 200){
                        toastr.success('Package ('+ response.title +' '+ response.amount +') has been selected, successfully!','success');
                        $("#payment_redirect").attr("href","{{ route('vendor_payment_pay') }}");

                    }
                },
            });

            }

            $("#payment_redirect").on("click",function(){
                console.alert("payment");
                if(!$("#payment_redirect").attr("href")){
                    toastr.info('Please Select any Package first');
                }
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
@push('scripts')
<script type="text/javascript">
    document.getElementById('phone12').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
</script>
@endpush
