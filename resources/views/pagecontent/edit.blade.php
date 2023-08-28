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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit</h5>

            </div>
            {{-- <form class="form theme-form"> --}}
                <form class="form theme-form"id="" action="{{ route("PageContent_update",$edit_data->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">

                                 {{-- <label for="exampleFormControlInput10">Page</label> --}}
                                 <input  name="page" readonly value="{{ $edit_data->page }}" class="form-control btn-square" id="exampleFormControlInput10" type="hidden" placeholder="Title">
                                {{-- <select class="form-select" size="1">
                                    <option selected disabled>Select Page</option>
                                    @foreach ( $getpages as  $page)
                                    <option value="{{ $page->id }}"{{ $page->id ? 'selected' : '' }}>{{ $page->page_name }}</option>

                                    @endforeach
                                 </select> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Section Name.*</label>
                                <input name="section_name" class="form-control btn-square" value="{{ $edit_data->section_name }}" id="exampleFormControlInput10" type="text" placeholder="Section Name" readonly>
                                <input name="oldsection_name" value="{{ $edit_data->section_name }}"  type="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Main Title </label>
                                <input name="title" value="{{ $edit_data->title }}" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title" >
                                <input name="oldtitle" value="{{ $edit_data->title }}"  type="hidden">
                            </div>
                        </div>
                    </div>
                    @if ($edit_data->title1)
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 1</label>
                                <input name="title1" value="{{ $edit_data->title1 }}" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                <input name="oldtitle1" value="{{ $edit_data->title1 }}"  type="hidden">

                            </div>
                        </div>
                    </div>
                    @endif

                    @if ($edit_data->title2)
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 2</label>
                                <input name="title2" value="{{ $edit_data->title2 }}" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                <input name="oldtitle2" value="{{ $edit_data->title2 }}"  type="hidden">

                            </div>
                        </div>
                    </div>
                    @endif
                    @if ($edit_data->title3)
                    {{-- @dd( $edit_data->title3 ); --}}
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 3</label>
                                <input name="title3" value="{{ $edit_data->title3 }}" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                <input name="oldtitle3" value="{{ $edit_data->title3 }}"  type="hidden">

                            </div>
                        </div>
                    </div>
                    @endif
                    @if ($edit_data->title4)
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Title 4</label>
                                <input name="title4" value="{{ $edit_data->title4 }}" class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Title">
                                <input name="oldtitle4" value="{{ $edit_data->title4 }}"  type="hidden">


                            </div>
                        </div>
                    </div>
                    @endif

                    @if ($edit_data->content)
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 mb-0">
                                <label for="exampleFormControlTextarea14">Enter Short Description</label>
                                <textarea value="" name="content" class="ckeditor form-control btn-square" id="exampleFormControlTextarea14" rows="3" ></textarea>
                                <input name="oldcontent" value="{{ $edit_data->content }}" type="hidden">
                            </div>
                        </div>
                    </div>
                    @endif


                </div>
                <div class="card-footer" id="submit">
                    <button class="btn btn-primary" name="submit" type="submit">Update</button>
                    {{-- <input class="btn btn-light" type="reset" value="Cancel"> --}}
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

@endsection

@section('script')

{{-- <script type="text/javascript">
    $(document).ready(function(){
      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });
  </script> --}}

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

<script>
    editor.on( 'required', function( evt ) {
        editor.showNotification( 'This field is required.', 'warning' );
        evt.cancel();
    } );
    </script>
@endsection
