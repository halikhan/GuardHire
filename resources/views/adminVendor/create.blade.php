@extends('layouts.simple.master')
@section('title', 'Project List')
@section('title', 'Base Inputs')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection

@section('style')

@endsection
<style >
     .choices__list--multiple .choices__item {
            background-color: #EC0169;
            border: 0px;
        }
</style>
@section('breadcrumb-title')
<h3>Vendor</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Vendor </li>
<li class="breadcrumb-item active">list</li>
@endsection

@section('content')
<link rel="stylesheet" href="https://project.designprosusa.com/South_Dakota_Bride/public/website/css/choices.min.css">
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Create</h5>
            </div>
            {{-- <form class="form theme-form"> --}}
                <form class="form theme-form"id="" action="{{ route("adminVendor-store") }}" enctype="multipart/form-data" method="post">
                    @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Vendor First Name.*</label>
                                <input name="name" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Name" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Vendor Last Name.*</label>
                                <input name="last_name" class="form-control btn-square" id="exampleFormControlInput10" type="text" value="{{ old('last_name') }}" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Email.*</label>
                                <input name="email" class="form-control btn-square"  type="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Company.*</label>
                                <input name="company" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="company" value="{{ old('company') }}">
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Contact.*</label>
                                <input id="phonebride"  class="form-control btn-square"  type="tel" placeholder="Phone No." name="contact"  value="{{ old('contact') }}" maxlength="14"  pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleFormControlInput10">Select Cities.*</label>

                            <select name="locations[]" id="choices-multiple-remove-button"
                            placeholder="Location" style="width: 86px; " multiple>
                            @foreach ( $getLocationNames as $value )
                            <option value="{{ $value->id }}">{{ $value->location }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <select name="bussinessCategory" class="form-select" size="1">
                                    <label for="exampleFormControlInput10">Service Categories.*</label>
                                    <option selected disabled>Service Categories</option>
                                    @foreach ( $getServiceNames as $value )
                                    <option value="{{ $value->id }}">{{ $value->service }}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Upload Image.*</label>
                                <div class="col-sm-9">
                                    <input name="image" class="form-control" type="file">
                                    {{-- <input name="vednor_image[]" class="form-control" type="hidden"> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Password.*</label>
                                <input name="password" class="form-control btn-square" id="exampleFormControlInput10" type="password" value="{{ old('password') }}" placeholder="Password">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Confirm Password.*</label>
                                <input name="confirm_password" class="form-control btn-square" id="exampleFormControlInput10" type="password" value="{{ old('confirm_password') }}" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    document.getElementById('phonebride').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
</script>

<script src="https://project.designprosusa.com/South_Dakota_Bride/public/website/js/choices.min.js"></script>
<script>
    $(document).ready(function() {

        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount: 35,
            searchResultLimit: 35,
            renderChoiceLimit: 35
        });


    });
</script>

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
