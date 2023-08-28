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
    <h3>Paypal</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Paypal</li>
    <li class="breadcrumb-item active"> List</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-8">
                                <h5>Products Details</h5>
                            </div>
                            <div class="col-md-4" align="right">
                                <a type="button" class="btn btn-primary for-font-color" href="{{ route('product.create') }}">Add Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <div class="table-responsive product-table">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Product id</th>
                                            <th>Edit Product</th>
                                            <th>Show</th>
                                            <th>Create Plan</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($getCMS as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->description }}</td>
                                                <td>{{ $value->product_id }}</td>
                                                <td> <a href="{{ route('product.edit', $value->id) }}"class="btn btn-primary"
                                                    type="button" id="dejangoshow"> Edit
                                                </a>
                                            </td>
                                                <td>
                                                    {{-- {{ route('single.paypal.packages.show', $value->payment_id) }} --}}
                                                    {{-- <form class="form theme-form"
                                                    action="{{ route('product.show', $value->product_id) }}"
                                                    enctype="multipart/form-data" method="post">
                                                    @csrf --}}
                                                    <a href="{{ route('product.show', $value->product_id) }}"class="btn btn-success"
                                                        type="button" id="dejangoshow"> Show</a>

                                                    {{-- </form> --}}
                                                </td>
                                             <td>
                                                <a href="{{ route('Plans.create', $value->product_id) }}"class="btn btn-info"
                                                type="button" id="dejangoshow"> Create</a>
                                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
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
