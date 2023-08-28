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
    <h3>Event Mangement</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Event </li>
    <li class="breadcrumb-item active">Details </li>
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
                                <h5>Event list</h5>
                            </div>
                            <div class="col-md-4" align="right">
                                {{-- style="height: 50px; width: 50px;" <i data-feather="plus-square"></i> --}}
                                <a type="button" class="btn btn-primary" href="{{ route('eventCreate') }}">
                                     Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Location</th>
                                        <th>Image</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCMS as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->event_date }}</td>
                                            <td>{{ $value->event_time }}</td>
                                            <td>{{ $value->location }}</td>
                                            <td>
                                                @if ($value->image != null)
                                                <img src="{{ asset('storage/uploads/cms/' . $value->image) }}" alt="image" style="width:60%;">
                                                @else
                                                <img src="{{ (!empty($Value->image))?
                                                    asset('storage/uploads/cms/'.$Value->image):asset('storage/uploads/No-image.jpg') }}"
                                                    style="width:60%;">
                                                @endif
                                        </td>
                                            <td>{!!Str::limit($value->description, 40)!!}</td>
                                            <td>
                                                <a  href="{{ route('eventdestroy', $value->slug) }}" id="delete"><button class="btn btn-danger btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button></a>
                                                <a href="{{ route('eventEdit', $value->slug) }}">  <button class="btn btn-success btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button></a>
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
