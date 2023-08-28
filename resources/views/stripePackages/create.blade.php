@extends('layouts.simple.master')
@section('title', 'Project List')


@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css') }}">
@endsection

@section('breadcrumb-title')
    <h3>Package</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Package </li>
    <li class="breadcrumb-item active">links</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Create</h5>
                    </div>
                    {{-- <form class="form theme-form"> --}}
                    <form class="form theme-form"id="" action="{{ route('stripePackages_store') }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Plan Name.*</label>
                                        <input name="name" class="form-control btn-square" value="{{ old('name') }}"
                                            id="exampleFormControlInput10" type="text" placeholder="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Price.*</label>
                                        <input name="price" class="form-control btn-square" id="exampleFormControlInput10"
                                            type="number" value="{{ old('price') }}" maxlength="2" placeholder="price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Currency.*</label>
                                        <input name="currency" value="usd" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Interval Count.*</label>
                                        <input name="intervalCount" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="number" placeholder="Interval Count">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Billing Period.*</label>
                                        {{-- <input name="type" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="type"> --}}
                                        {{-- <div class="form-control" style="width:200px;"> --}}
                                        <select name="billing_Period" value="{{ old('billing_Period') }}"
                                            class="form-control" style="width:200px;">
                                            <option disabled selected>Select Plan</option>
                                            <option value="week">Weekly</option>
                                            <option value="month">Monthly</option>
                                            <option value="year">Yearly</option>
                                            <option value="day">Day</option>
                                        </select>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            {{-- <input class="btn btn-light" type="reset" value="Cancel"> --}}
                        </div>
                    </form>
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
