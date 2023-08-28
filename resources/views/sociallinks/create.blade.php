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

@section('breadcrumb-title')
<h3>Social links Create</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Social </li>
<li class="breadcrumb-item active">links</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Create</h5>
            </div>
            {{-- <form class="form theme-form"> --}}
                <form class="form theme-form"id="" action="{{ route("socialAdd") }}" enctype="multipart/form-data" method="post">
                    @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <select name="type" class="form-select" size="1">
                                    <option selected disabled>Select type</option>
                                    <option value="1">Facebook</option>
                                    <option value="2">Instagram</option>
                                    <option value="3">Twitter</option>
                                    <option value="4">Youtube</option>
                                 </select>
                                @error('type')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('type') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Social Links.*</label>
                                <input name="social_media" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Social Links">
                                @error('social_media')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('social_media') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
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
