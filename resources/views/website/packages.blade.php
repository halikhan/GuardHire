@extends('website.layout.master')
@section('title','South-Dakota-Bride | Packages')
@section('content')

 {{-- <?php
$data['VednorReg'] = Session::get('VednorReg');
$data['VednorLocation'] = Session::get('VednorLocation');
$data['bookcoach'] = Session::get('bookcoach');
dd($data);
?> --}}
<section class="Home-Section mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-row justify-content-around position-relative">
                    <div class="banner-links wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="d-flex flex-column translates">
                            <div class="line-after">
                                <div class="line-after1"></div>
                            </div>
                            <div class="line-center">
                                <ul>
                                    <li><a href="{{$facebook[0]->social_media ?? ''}}" target="_blank"><i
                                                class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="{{$instagram[0]->social_media ?? ''}}" target="_blank"><i
                                                class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="{{$twitter[0]->social_media ?? ''}}" target="_blank"><i
                                                class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="{{$youtube[0]->social_media ?? ''}}" target="_blank"><i
                                                class="fa-brands fa-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="line-before">
                                <div class="line-before2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-photo-text pt-5">
                        <h1 class="banner-photo-text pt-5 wow  animated fadeInLeft text-center wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">packages</h1>
                        <section class="Couple-Section-weddings">
                            <div class="container pt-5">
                            <div class="row">

                                @foreach ( $getPackages as $value )

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
                                    <div class="text-center pt-5 mt-5 mb-5">
                                        <a id="payment_redirect">
                                            <button class="reg-btn-vendors wow   bounceIn animated" data-wow-duration="1s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: bounceIn;">next</button></a>
                                    </div>
                                 </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
</section>

<script>
    function get_package(package_id){

            $.ajax({
            type: 'get',
            url: '{{ route('payment') }}',
            data: {'id' : package_id},
            success: function(response){
                if(response.status == 200){
                    toastr.success('Package ('+ response.title +' '+ response.amount +') has been selected, successfully!','success');
                    $("#payment_redirect").attr("href","{{ route('pay_amount') }}");

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

