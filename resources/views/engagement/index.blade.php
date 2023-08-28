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
    <h3>engagement</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">engagement </li>
    <li class="breadcrumb-item active">list </li>
@endsection
<style>
      .dataTables_wrapper button {
    font-size: 10px !important;
    padding: 8px !important;
     }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h5>engagement list</h5>
                            </div>
                            <div class="col-md-4" align="right">
                                <a type="button" class="btn btn-primary" href="{{ route('engagement_create') }}">
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
                                        <th>Groom Name</th>
                                        <th>Bride Name</th>

                                        <th>Location</th>
                                        {{-- <th>Date</th> --}}
                                        <th>Image</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCMS as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value->bride }} {{ $value->bride_last_name }}</td>
                                            <td>{{ $value->groom }} {{ $value->groom_last_name }}</td>
                                            <td>{{ $value->location }}</td>
                                            {{-- <td>{{ $value->date }}</td> --}}
                                            <td>
                                                    @if ($value->image != null)
                                                    <img src="{{ asset('storage/uploads/cms/' . $value->image) }}" alt="image" style="width:40%">
                                                    @else
                                                    <img src="{{ (!empty($Value->image))?
                                                        asset('storage/uploads/cms/'.$Value->image):asset('storage/uploads/No-image.jpg') }}"
                                                       style="width:40%">
                                                    @endif
                                            </td>
                                            <td>{!!Str::limit($value->content, 20)!!}</td>
                                            <td>
                                                <a  href="{{ route('engagement_destroy', $value->slug) }}" id="delete"><button class="btn btn-danger btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button></a>
                                                <a href="{{ route('engagement_edit', $value->slug) }}"> <button class="btn btn-success btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title=""> Edit</button></a>
                                                <a href="{{ route('engagement_show', $value->slug) }}"> <button class="btn btn-info " type="button" data-original-title="btn btn-danger btn-xs" title=""> show</button></a>
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
