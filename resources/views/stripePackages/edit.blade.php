@extends('layouts.simple.master')
@section('title', 'Project List')
@section('title', 'Base Inputs')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Package</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Package </li>
<li class="breadcrumb-item active">links</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit</h5>
            </div>
            {{-- {{ route("Package_update",$edit_data->id ) }} --}}
                <form class="form theme-form" action="{{ route("stripePackages_update",$edit_data->plan_id ) }}" enctype="multipart/form-data" method="post">
                    @csrf
                <div class="card-body">
                <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Plan ID.*</label>
                                <input name="slug"  type="hidden" value="{{ $edit_data->slug }}">
                            
                                <input name="plan_id" class="form-control btn-square"  id="exampleFormControlInput10" type="text" value="{{ $edit_data->plan_id }}" placeholder="amount" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Name.*</label>
                                <input name="name" class="form-control btn-square"  id="exampleFormControlInput10" type="text" value="{{ $edit_data->name }}" placeholder="amount" >

                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">billing payment.*</label>
                                <input name="billing_Period" type="text" value="{{ $edit_data->billing_payment }}" placeholder="billing payment" >
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="exampleFormControlInput10">Billing Period.*</label>
                            {{-- <input name="type" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="type"> --}}
                            {{-- <div class="form-control" style="width:200px;"> --}}
                            <select name="billing_Period" value="{{ old('billing_Period') }}"
                                class="form-control" style="width:200px;">
                                {{-- <option disabled selected>Select Plan</option> --}}
                                <option value="week" {{ $edit_data->billing_payment == 'week' ? 'selected' : '' }}>Weekly</option>
                                <option value="month" {{ $edit_data->billing_payment == 'month' ? 'selected' : '' }}>Monthly</option>
                                <option value="year" {{ $edit_data->billing_payment == 'year' ? 'selected' : '' }}>Yearly</option>
                                <option value="day" {{ $edit_data->billing_payment == 'day' ? 'selected' : '' }}>Day</option>
                            </select>
                            {{-- </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Amount.*</label>
                                <input name="price" class="form-control btn-square"  id="exampleFormControlInput10" type="text" value="{{ $edit_data->price }}" placeholder="amount" >

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">interval count.*</label>
                                <input name="intervalCount" class="form-control btn-square" value="{{ $edit_data->interval_count }}"  placeholder="interval count">
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Details.*</label>
                                <input name="details" class="form-control btn-square" id="exampleFormControlInput10" type="text" value="{{ $edit_data->details }}" placeholder="details">
                            </div>
                        </div>
                    </div> --}}

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                    {{-- <input class="btn btn-light" type="reset" value="Cancel"> --}}
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
<script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>
@endsection
