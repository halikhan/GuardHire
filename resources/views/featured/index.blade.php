@extends('layouts.simple.master')
@section('title', 'Project List')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">
@endsection

@section('style')
@endsection

<style type="text/css">
     select.form-select {
    width: 150px;
}
.btnExcel {
    padding: 6px 10px !important;
    width: 80px;
    background-color: rgb(3, 50, 3) !important;

}
select.form-select {
    width: 145px;
    padding: 6px 10px !important;
}
form.formBox {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 5px;
}
</style>

@section('breadcrumb-title')
    <h3>Featured</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Featured </li>
    <li class="breadcrumb-item active">list </li>
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
                                <h5>Featured listing</h5>
                            </div>
                            <div class="col-md-4" align="right">
                                <a type="button" class="btn btn-primary for-font-color" href="{{ route('backend.featured.create') }}">
                                    Add </a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-9">
                            </div>
                            {{-- <div class="col-md-3"  align="right">
                                <form class="form theme-form formBox" action="{{ route('backend.user.export') }}"
                                    enctype="multipart/form-data" method="GET">
                                    @csrf

                                    <select name="dataValue" id="selectdatalist" class="form-select" size="1">
                                        <option selected disabled>Select Users</option>
                                        <option value="10">1 to 10</option>
                                        <option value="50">1 to 50</option>
                                        <option value="100">1 to 100</option>
                                        <option value="500">1 to 500</option>
                                        <option value="null">All Users</option>
                                    </select>
                                        <br>
                                        <button  class="btn btn-success btnExcel" type="submit" onClick="validateFm();" id="mailregister">Export</button>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        {{-- <th>Image</th> --}}
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCMS as $key => $value)
                                        <tr>
                                            <td>{{ $key+1 }}</td>

                                        <td>{{ $value->name }} {{ $value->last_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>
                                                @if ($value->type == 2)
                                                {{-- <span style="background-color:rgb(46, 145, 226)"></span> --}}
                                                <b>Guard</b>
                                                @elseif ($value->type == 3)
                                                <b>Client</b>
                                                @elseif ($value->type == 4)
                                                Featured Guard
                                                @elseif ($value->type == 5)
                                                Featured Client
                                                @endif

                                            </td>
                                            <td><a href="{{ route('user_status', ['id' => $value->id]) }}">
                                                @if ($value->status == 1)
                                                    <button id="" class="btn btn-info btn-sm regiterForm"><i class="fa fa-thumbs-up"></i></button>
                                                @else
                                                    <button id="" class="btn btn-danger btn-sm regiterForm"><i class="fa fa-thumbs-down"></i></button>
                                                @endif
                                            </a>
                                        </td>
                                            <td>
                                                @if ($value->image != null)
                                                    <img src="{{ asset('storage/uploads/cms/' . $value->image) }}" alt="image" style="width:40%">
                                                @else
                                                    <img src="{{ (!empty($Value->image))?
                                                        asset('storage/uploads/cms/'.$Value->image):asset('storage/uploads/No-image.jpg') }}"
                                                        style="width:40%">
                                                @endif
                                            </td>
                                            <td>
                                                <a  href="{{ route('featured_destroy', $value->slug) }}" id="delete"><button class="btn btn-danger btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button></a>
                                                <a href="{{ route('featured_edit', $value->slug) }}"><button class="btn btn-success btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button></a>
                                                <button class="btn btn-info btn-xs for-font-color" type="button" data-original-title="btn btn-danger btn-xs" title=""> <a href="{{ route('featured_show', $value->id) }}">Show</a></button>
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
    <script>
        $(document).ready(function() {
                    $("#mailregister").click(function(){
                var datalist = $("#selectdatalist").val();
                if (!datalist) {
                    // alert('Type Your valid Email');
                    toastr.error('please select any list of users');
                    return false;
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(".regiterForm").on('click',function() {
        $("#pageloader").fadeIn();
        });
    </script>
@endsection
