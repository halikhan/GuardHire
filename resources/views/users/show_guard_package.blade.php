@extends('layouts.simple.master')
@section('title', 'Project List')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Guard</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Guard</li>
    <li class="breadcrumb-item active">Package </li>
@endsection

@section('content')
<style>
    .pakagesInner {
        width: 320px;
        height: 260px;
        overflow: hidden;
    }

    .deteleButton {
        background-color: #C1272D;
        color: #fff !important;
        font-family: Poppins-Regular;
        font-size: 11px;
        border-radius: 22px !important;
        outline: none;
        border: none;
        padding: 10px 20px !important;
    }

    .deteleButton a {
        color: #fff !important;
    }

    .editButton {
        background-color: #22B573;
        color: #fff !important;
        font-family: Poppins-Regular;
        font-size: 11px;
        border-radius: 22px !important;
        outline: none;
        border: none;
        padding: 10px 20px !important;
    }

    .editButton a {
        color: #fff !important;
    }

    .round-cstm-btn-green {
        border-radius: 30px !important;
        padding: 10px 20px !important;
        font-family: Poppins-Regular;
        background-color: #00a808 !important;
        border: none;
    }

    .round-cstm-btn-red a,
    .round-cstm-btn-green a {
        color: #fff;
        font-size: 14px;
    }

    .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper {
        height: 100% !important;
    }

    .for-back {
        display: flex;
        padding: 10px 30px;
        border-bottom: 1px solid #ecf3fa;
        flex-direction: row-reverse;
    }

    /* modal css */
    .modal-title {
        color: #fff;
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
        text-align: center !important;
        font-family: 'Gilroy-Bold';
        font-size: 2rem;
    }

    .btn-close {
        padding: 10px !important;
        transform: rotate(177deg);
        background-image: url('{{ asset('assets/images/other-images/close.svg') }}') !important;
        margin-right: 10px !important;
    }

    .btn-closeDiv {
        width: 100%;
        display: flex;
        justify-content: end;
    }

    .modal-header {
        border-bottom: none !important;
        justify-content: center !important;
    }

    .modal-content {
        /* background-image: url("../images/SVG/modalimg.svg"); */
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 30px !important;
        padding-bottom: 150px;
        background-color: #003d70 !important;
    }

    .divMon h4 {
        color: #ffff;
        font-family: 'Gilroy-Bold';
    }

    .divMon span {
        color: #ffff;
        font-family: 'Gilroy-Bold';
        font-size: 2rem;
    }

    .divMon p {
        color: #ffff;
        font-family: 'Gilroy-Bold';
        font-size: 1.5rem;
    }

    .Package-card1 {

        transition: 0.4s all ease-in-out;
    }

    #Csmcontainer .card .Package-card1 {
        transition: 0.4s all ease-in-out;

    }

    [type=radio]:checked+.Package-card1 {
        cursor: pointer;
        /* transform: scale(1.1); */
        transition: 0.2s all ease-in-out;
        border: 5px solid #fff !important;
        border-radius: 22px;
    }



    width: 90%;
    }

    */ #Csmcontainer .pakagesInner {
        position: absolute;
        width: 325px;
        height: 255px;
        /* margin-bottom: 3rem; */
        z-index: 0;
        cursor: pointer;

    }

    input.inputField {
        width: 100%;
        margin-bottom: 16px;
        border: 1px solid #8080804a !important;
    }

    button.btn.submitButton {
        background-color: #29ABE2;
        color: #fff;
    }

    .pkgSection label {
        display: flex;
        justify-content: center;

    }

    .pakagesInner::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url('{{ asset('assets/images/other-images/pakagesinnerbg.png') }}');
        z-index: -2;
    }

    .pakagesInner.p-card {
        position: sticky;
    }


    .divMon {
        padding: 2rem;
    }

    .btn-close {
        box-sizing: content-box;
        width: 1em;
        height: 1em;
        padding: 0.25em 0.25em;
        color: #000;
        background: transparent url('{{ asset('assets/images/other-images/close.svg') }}');
        border-radius: 0.25rem;
        opacity: .5;
    }

    .updateBtnn {
        color: #003D70;
        background-color: #fff;
        font-family: 'Gilroy-Bold';
        border: none;
        border-radius: 31px;
        padding: 7px 30px;
        font-size: 14px;
        border: 1px solid #003D70;
        margin-left: 1.5rem;
    }

    .card-input-element {
        display: none;
    }

    .card-input {
        margin: 10px;
        border: 5px solid transparent !important;
        border-radius: 22px;
        position: relative;
    }

    .card-input:hover {
        cursor: pointer;
    }

    .card-input-element:checked+.card-input {
        cursor: pointer !important;
        transition: 0.2s all ease-in-out !important;
        border: 5px solid #fff !important;
        border-radius: 22px !important;
    }

    button.updateButton {
        border-radius: 20px;
        padding: 8px 31px;
        border: none;
        background-color: #fff;
        font-family: 'Gilroy-Bold';
        font-weight: bold;
        color: #0071BC;
        border: 1px solid #003D70;
    }
</style>

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-8">
                                <h5>Guard Package Details</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            @if ($guardPaymentDetail && is_object($guardPaymentDetail))
                            <table class="display" id="basic-1">
                                <tbody>
                                    <tr>
                                        <th>Package</th>
                                        <td>{{$guardPaymentDetail->package_title ??'No data found'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>{{$guardPaymentDetail->package_type ??'No data found'}} Credits/ ${{$guardPaymentDetail->package_amount ??'No data found'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Amount</th>
                                        <td>${{$guardPaymentDetail->package_amount ??'No data found'}}</td>
                                    </tr>
                                    <tr>
                                        <th>New Message Pts</th>
                                        <td>{{$guardPaymentDetail->msg_points ??'No data found'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Service Listing Pts</th>
                                        <td>{{$guardPaymentDetail->listing_points ??'No data found'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Credit</th>
                                        <td>{{$totalCreditsPurchased ??'No data found'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Used Message Pts</th>
                                        <td>{{$totalCreditPoints ??'No data found'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Used Service Listing Pts</th>
                                        <td>{{$listingCount ??'No data found'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Remaining Credits</th>
                                        <td>{{$remainingCredits ??'No data found'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Gift Points for User</th>
                                        <td>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <form class="form theme-form"id="" action="{{ route('user.gift.points') }}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                                @csrf
                                                <input type="number" name="gifted_points" class="inputField">
                                                <input type="hidden" name="user_id" value="{{ $guardPaymentDetail->user_id }}">
                                                <input type="hidden" name="package_id" value="{{ $guardPaymentDetail->id }}">
                                                <button type="submit" onclick="submitForm()" class="btn submitButton">Submit</button>
                                            </form>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                                {{-- <div class="row packageBottom">
                                    @if ($remainingCredits < 2)
                                        <div class="col-lg-4 col-md-6 col-sm-12"><a href="{{route('our.packages')}}">
                                            <button type="submit" class="savePasswordButton">Update Package</button></a>
                                        </div>
                                     @endif
                                </div> --}}
                            @else
                            <div class="packageText">
                                <h5> <p>No Package found.</p></h5>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/ecommerce.js') }}"></script>
    <script src="{{ asset('assets/js/product-list-custom.js') }}"></script>
@endsection
