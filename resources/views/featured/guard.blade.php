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
    <li class="breadcrumb-item active">Show </li>
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
                                <h5>Show Guard Jobs </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Company Name</th>
                                        <th>Service</th>
                                        <th>Location</th>
                                        <th>Job Type</th>
                                        {{-- <th>Tags</th>
                                        <th>Language</th> --}}
                                        <th>Job Duration</th>
                                        <th>Per Hour</th>
                                        <th>Description</th>
                                        {{-- <th>Location</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($show_data  as $key => $data)
                                        {{-- @foreach ($collection  as $key=> $data ) --}}
                                        <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                        @if ($data->type==4)
                                        Featured Guard
                                        @elseif ($data->type==5)
                                        Featured Client
                                        @endif
                                    </td>
                                        {{-- <td>{{ $get_message->get_coach->type }}</td> --}}
                                        <td>{{ $data->featured_guardjobs->companyname ??''}}</td>
                                        <td> {{ $data->featured_guardjobs->fet_guardservice->service ??''}}</td>
                                        <td>{{ $data->featured_guardjobs->fet_guardlocation->location ??''}}</td>
                                        <td> {{ $data->featured_guardjobs->fet_guardtype->name ??''}}</td>
                                        {{-- <td> {{ $data->featured_guardjobs->tags ??''}}</td>
                                        <td> {{ $data->featured_guardjobs->language ??''}}</td> --}}
                                        <td> {{ $data->featured_guardjobs->job_duration ??''}}</td>
                                        <td> ${{ $data->featured_guardjobs->per_hour_rate ??''}}</td>
                                        <td> {!!Str::limit($data->featured_guardjobs->description, 40)!!}</td>
                                    </tr>
                                        {{-- @endforeach --}}
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
