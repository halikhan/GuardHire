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
    <h3>Social links</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Social</li>
    <li class="breadcrumb-item active"> links</li>
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
                                <h5>Social links </h5>
                            </div>
                            {{-- <div class="col-md-4" align="right">
                                <a type="button" class="btn btn-primary for-font-color" href="{{ route('socialCreate') }}">Create</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        {{-- <th>Type</th> --}}
                                        <th>#</th>
                                        {{-- <th>Title</th> --}}
                                        <th>Social Link</th>
                                        {{-- <th><i data-feather="instagram"></i> Instagram</th> --}}
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCMS as $key => $value)
                                        <tr>
                                            {{-- <td>{{ $value->type }}</td> --}}
                                            <td>{{ $key+1 }}</td>
                                            {{-- <td>{{$value->type}}</td> --}}
                                            <td>{{ $value->social_media }}</td>
                                            {{-- <td>{{ $value->instagram }}</td> --}}
                                            <td>
                                                {{-- <button class="btn btn-danger btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title=""><a  href="{{ route('socialdestroy', $value->id) }}" id="delete">Delete</a></button> --}}
                                                <a href="{{ route('socialEdit', $value->slug) }}"> <button class="btn btn-success btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button></a>
                                             </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
