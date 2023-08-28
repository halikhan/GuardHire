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
    <h3>Pages</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Page </li>
    <li class="breadcrumb-item active">list </li>
@endsection

@section('content')
<style>
    .pageimage{
        width:40% !important;
    }
</style>
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-8">
                                <h5>Pages list</h5>
                            </div>
                            {{-- <div class="col-md-4" align="right">
                                <a type="button" class="btn btn-primary for-font-color" href="{{ route('page.content.create') }}"> Create</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Page Name</th>
                                        <th>Title</th>
                                        {{-- <th>Section Name</th> --}}
                                       {{--  <th>Title2</th>
                                        <th>Title3</th>
                                        <th>Title4</th> --}}
                                        {{-- <th>Image</th> --}}
                                        {{-- <th>Image2</th> --}}
                                        {{-- <th>Content</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCMS as $key => $value)
                                    {{-- @foreach ($value->getPageName as $item)
                                    {{$item}}
                                    @endforeach --}}
                                        <tr>
                                           <td>{{ $key+1 }}</td>
                                           <td>{{ $value->getPageName->page_name }}</td>
                                           {{-- <td>{{ $value->section_name }}</td> --}}
                                           <td>{{ $value->title }}</td>
                                           {{-- <td>{{ $value->title2 }}</td>
                                           <td>{{ $value->title3 }}</td>
                                           <td>{{ $value->title4 }}</td> --}}
                                           {{-- <td class="pageimage">
                                            @if ($value->image != null)
                                            <img src="{{ asset('storage/uploads/cms/' . $value->image) }}" alt="image" class="pageimage">
                                            @else
                                            <img src="{{ (!empty($Value->image))?
                                                asset('storage/uploads/cms/'.$Value->image):asset('storage/uploads/No-image.jpg') }}" alt="image" class="pageimage">
                                            @endif
                                        </td> --}}
                                        {{-- <td class="pageimage">
                                            @if ($value->image2 != null)
                                            <img src="{{ asset('storage/uploads/cms/' . $value->image2) }}" alt="image" class="pageimage">
                                            @else
                                            <img src="{{ (!empty($Value->image2))?
                                                asset('storage/uploads/cms/'. $Value->image2):asset('storage/uploads/No-image.jpg') }}" alt="image" class="pageimage">
                                            @endif
                                        </td> --}}
                                            {{-- <td>{!!substr($value->content,0,20)!!}.....</td> --}}
                                            {{-- <td>{{$value->content}}</td> --}}
                                            {{-- <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td> --}}
                                            <td>
                                                {{-- <button class="btn btn-danger btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title=""><a  href="{{ route('PageContent_destroy', $value->id) }}" id="delete">Delete</a></button> --}}
                                                <a href="{{ route('page.content.edit', $value->slug) }}"><button class="btn btn-success btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button></a>
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
