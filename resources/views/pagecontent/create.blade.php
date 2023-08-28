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
<h3>Page</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Page </li>
<li class="breadcrumb-item active">list</li>
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
                <form class="form theme-form"id="" action="{{ route("PageContent_store") }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="slug" id="slug">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <select name="page" class="form-select" size="1">
                                    <option selected disabled>Select Page</option>
                                    @foreach ( $getpages as  $page)
                                    <option value="{{ $page->id }}">{{ $page->page_name }}</option>
                                    @endforeach
                                 </select>
                                @error('page')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('page') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Section Name.*</label>
                                <input name="section_name" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Section Name">
                                @error('section_name')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('section_name') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title*</label>
                                <input name="title" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                @error('title')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('title') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 1.*</label>
                                <input name="title1" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                @error('title1')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('title1') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 2.*</label>
                                <input name="title2" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                @error('title2')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('title2') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 3.*</label>
                                <input name="title3" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                @error('title3')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('title3') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 4.*</label>
                                <input name="title4" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                @error('title4')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('title4') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Upload File.*</label>
                                <div class="col-sm-9">
                                    <input name="image" class="form-control" type="file">
                                    @error('image')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('image') }}
                                    </p>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Background Image File.*</label>
                                <div class="col-sm-9">
                                    <input name="image2" class="form-control" type="file">
                                    @error('image2')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('image2') }}
                                    </p>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Upload PDF.*</label>
                                <div class="col-sm-9">
                                    <input name="pdf" class="form-control" type="file">
                                    @error('pdf')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('pdf') }}
                                    </p>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3 mb-0">
                                {{-- ckeditor --}}
                                <label for="exampleFormControlTextarea14">Enter Description</label>
                                <textarea name="content" class="ckeditor form-control btn-square" id="exampleFormControlTextarea14" rows="3"></textarea>

                                @error('content')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('content') }}
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
