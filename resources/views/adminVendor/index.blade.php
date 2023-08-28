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
    <h3>Guards</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Guards </li>
    <li class="breadcrumb-item active">list </li>
@endsection

@section('content')
    <style type="text/css">
        #pageloader {
            background: rgb(129 129 129 / 17%);
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
            top: 0;
            left: 0;
        }

        #pageloader img {
            left: 50%;
            /* margin-left: -32px;
                  margin-top: -32px; */
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            filter: grayscale(1);
        }

        select.form-select {
            width: 150px;
        }

        .btnExcel {
            padding: 6px 10px !important;
            width: 70px;
            background-color: green !important;

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
    <div id="pageloader">
        <img src="{{ asset('frontend/assets/1x/Preloader.gif') }}" alt="processing..." width="30%" height="60%" />
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h5>Guards list</h5>
                            </div>
                            <div class="col-md-4" align="right">
                                <a type="button" class="btn btn-primary" href="{{ route('adminVendor-Create') }}">
                                    Add</a>
                            </div>

                        </div>
                        <br>
                        {{-- <div class="row">
                            <div class="col-md-9">
                            </div>
                            <div class="col-md-3"  align="right">
                                <form class="form theme-form formBox" action="{{ route('backend.vendor.export') }}"
                                    enctype="multipart/form-data" method="GET">
                                    @csrf

                                    <select name="dataValue" id="selectdatalist"  class="form-select" size="1">
                                        <option selected disabled>Select Guards</option>
                                        <option value="10">1 to 10</option>
                                        <option value="50">1 to 50</option>
                                        <option value="100">1 to 100</option>
                                        <option value="500">1 to 500</option>
                                        <option value="null">All Guards</option>
                                    </select>
                                        <br>
                                        <button  class="btn btn-success btnExcel" type="submit" onClick="validateFm();" id="mailregister">Export</button>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        {{-- <th>Bussiness Category</th> --}}
                                        <th>Email</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCMS as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }} {{ $value->last_name }}</td>
                                            {{-- <td>{{ $value->get_vednorbusinesscategory->service ?? '' }}</td> --}}
                                            <td>{{ $value->email }}</td>

                                            {{-- <td>
                                                <a href="{{ route('vendor_status', ['id' => $value->id]) }}">
                                                    @if ($value->status == 1)
                                                        <button class="btn btn-info btn-sm regiterForm"><i
                                                                class="fa fa-thumbs-up"></i></button>
                                                    @else
                                                        <button class="btn btn-danger btn-sm regiterForm"><i
                                                                class="fa fa-thumbs-down"></i></button>
                                                    @endif
                                                </a>
                                            </td> --}}
                                            <td>
                                                @if ($value->image != null)
                                                    <img src="{{ asset('storage/uploads/cms/' . $value->image) }}"
                                                        alt="image"
                                                        style="width:70px; height:80px; object-fit: cover; overflow:hidden">
                                                @else
                                                    <img src="{{ !empty($Value->image)
                                                        ? asset('storage/uploads/cms/' . $Value->image)
                                                        : asset('storage/uploads/No-image.jpg') }}"
                                                        style="width:70px; height:80px; object-fit: cover; overflow:hidden ">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('adminVendor-destroy', $value->slug) }}"
                                                    id="delete"><button class="btn btn-danger btn-xs for-font-color"
                                                        type="button" data-original-title="btn btn-danger btn-xs"
                                                        title="">Delete</button></a>
                                                <a href="{{ route('adminVendor-Edit', $value->slug) }}"> <button
                                                        class="btn btn-success btn-xs for-font-color" type="button"
                                                        data-original-title="btn btn-danger btn-xs" title="">
                                                        Edit</button></a>
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
            $("#mailregister").click(function() {
                var datalist = $("#selectdatalist").val();
                if (!datalist) {
                    // alert('Type Your valid Email');
                    toastr.error('please select any list of Guards');
                    return false;
                }
            });
        });
    </script>


    <script type="text/javascript">
        $("#regiterForm").on('click', function() {
            $("#pageloader").fadeIn();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    'csv',
                    'excel',
                    'pdf',
                    {
                        extend: 'print',
                        text: 'Print all (not just selected)',
                        exportOptions: {
                            modifier: {
                                selected: null
                            }
                        }
                    }
                ],
                select: true
            });
        });
    </script>
@endsection
