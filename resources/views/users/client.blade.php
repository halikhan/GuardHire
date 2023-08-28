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
    <h3>Client</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Client</li>
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
                                <h5>Show Client Jobs </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        {{-- <th>Type</th> --}}
                                        <th>Service</th>
                                        <th>Guard Type</th>
                                        <th>Location</th>
                                        <th>Per Hour</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($show_data  as $collection )
                                        @foreach ($collection->get_clientjobs  as $key=> $studentData )
                                        <tr>
                                        <td>{{ $key+1 }}</td>
                                        {{-- <td>
                                        @if ($studentData->client_service->type==2)
                                        Student
                                        @elseif ($studentData->client_service->type==3)
                                        Coach
                                        @elseif ($studentData->client_service->type==4)
                                        Evaluator
                                        @endif
                                    </td> --}}
                                        <td>{{ $studentData->client_service->service }}</td>
                                        <td>{{ $studentData->get_guardtype->name ??''}}</td>
                                        <td> {{ $studentData->client_location->location ??''}}</td>
                                        {{-- <td>{{ $studentData->get_timeSlot->appoinment_date ??''}}</td> --}}
                                        <td> ${{ $studentData->per_hour_rate ??'0.00'}}</td>
                                        <td> {!!Str::limit($studentData->description, 40)!!}</td>

                                    </tr>
                                        @endforeach
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
