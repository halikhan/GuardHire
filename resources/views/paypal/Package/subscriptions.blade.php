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
    <li class="breadcrumb-item active"> Plans</li>
@endsection
@section('content')

    <style>
        .buttonstatus {
            background-color: rgb(2, 100, 17);
            border: none;
            color: rgb(255, 255, 255);
            padding: 2px 7px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 26px;
        }

        .buttonsuspended {
            background-color: rgb(31, 2, 100);
            border: none;
            color: rgb(255, 255, 255);
            padding: 2px 7px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 26px;
        }

        .buttonold {
            background-color: rgb(74, 73, 78);
            border: none;
            color: rgb(255, 255, 255);
            padding: 2px 7px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 26px;
        }

        .buttonUpdated {
            background-color: rgb(250, 7, 7);
            border: none;
            color: rgb(255, 255, 255);
            padding: 2px 7px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 26px;
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
                                <h5>Paypal-Payment Details</h5>
                            </div>

                            {{-- <div class="col-md-4" align="right">
                            <a type="button" class="btn btn-primary for-font-color" href="{{ route('Package_create') }}">Create</a>

                        </div> --}}

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <div class="table-responsive product-table">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Name</th>
                                            <th>Amount</th>
                                            <th>Package Type</th>
                                            <th>Package Details</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Details </th>
                                            <th>Cancel Subscription</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getCMS as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->name ?? '' }}</td>
                                                <td>{{ $value->package_amount ?? '' }}</td>
                                                <td>{{ $value->PackageDetails->type ?? '' }}</td>
                                                <td>{{ $value->PackageDetails->details ?? '' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->PackageDetails->created_at ?? '')) }}
                                                </td>
                                                <td>
                                                    @if ($value->status == 0)
                                                        <button class="buttonstatus"> Active</button>
                                                    @elseif ($value->status == 1)
                                                        <button class="buttonsuspended">Suspended</button>
                                                    @elseif ($value->status == 2)
                                                        <button class="buttonUpdated">Canceled</button>
                                                    @else
                                                        <button class="buttonold">Previous Subcription</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    
                                                    @if ($value->status == 3)
                                                        <button class="buttonold">Previous Subcription</button>
                                                    @else
                                                        @if ($value->status == 2)
                                                            <button class="buttonUpdated">Canceled</button>
                                                        @else
                                                            <a
                                                                href="{{ route('subcription.updatepaypal', $value->package_id ?? '') }}"><button
                                                                    class="btn btn-success btn-xs for-font-color dejango"
                                                                    type="button"
                                                                    data-original-title="btn btn-danger btn-xs"
                                                                    onclick="AmagiLoader">
                                                                    Update</button>
                                                            </a>
                                                        @endif
                                                        <a
                                                            href="{{ route('showpaypal.payment', $value->package_id ?? '') }}"><button
                                                                class="btn btn-primary dejango" type="button"
                                                                data-original-title="btn btn-danger btn-xs"
                                                                onclick="AmagiLoader" title="">
                                                                Show</button></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($value->status == 0)
                                                        <a href="{{ route('cancel.paypal.payment', $value->package_id ?? '') }}"
                                                            id="delete"><button class="btn btn-danger " type="button"
                                                                data-original-title="btn btn-danger btn-xs"
                                                                onclick="AmagiLoader">
                                                                Cancel</button></a>

                                                    @elseif ($value->status == 1)
                                                        <button class="buttonsuspended">Suspended</button>
                                                    @elseif ($value->status == 3)
                                                        <button class="buttonold">Previous Subcription</button>
                                                    @else
                                                        <button class="buttonUpdated">Canceled</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($value->status == 0)
                                                        <form class="form theme-form"id=""
                                                            action="{{ route('paypal.suspend.payment', $value->package_id ?? '') }}"
                                                            enctype="multipart/form-data" method="post">
                                                            @csrf
                                                            <button class="btn btn-primary dejango" type="submit"
                                                                id="" onclick="AmagiLoader"> Suspend</button>
                                                        </form>
                                                    @elseif ($value->status == 3)
                                                        <button class="buttonold">Previous Subcription</button>
                                                    @elseif($value->status == 1)
                                                        <form class="form theme-form"id=""
                                                            action="{{ route('paypal.reactive.payment', $value->package_id ?? '') }}"
                                                            enctype="multipart/form-data" method="post">
                                                            @csrf
                                                            <button class="btn btn-info dejango" type="submit"
                                                                onclick="AmagiLoader"> Re-Active</button>
                                                        </form>
                                                    @else
                                                        <button class="buttonUpdated">Canceled</button>
                                                    @endif
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "To cancel this subscription permanently?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                });
            });
        });
    </script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/gh/AmagiTech/JSLoader/amagiloader.js"></script>
    <script>
        $('.dejango').click(function() {
            AmagiLoader.show();
            setTimeout(() => {
                AmagiLoader.hide();
            }, 1000);
        });
    </script>
@endsection
