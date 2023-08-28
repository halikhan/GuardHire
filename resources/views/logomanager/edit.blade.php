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
<h3>Logo</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Logo</li>
<li class="breadcrumb-item active">Edit</li>
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
                <form class="form theme-form"id="" action="{{ route("logoUpdate",$edit_data->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <select name="title" class="form-select" size="1">
                                    <option disabled>Select Type</option>
                                    <option value="logo" {{ ($edit_data->title) == 'logo' ? 'selected' : '' }}>Logo</option>
                                    <option value="footer" {{ ($edit_data->title) == 'footer' ? 'selected' : '' }}>Footer</option>
                                    <option value="favicon" {{ ($edit_data->title) == 'favicon' ? 'selected' : '' }}>Favicon</option>
                                 </select>
                                @error('title')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('title') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                      <div class="row">
                             <div class="col-md-12">

                                @if ($edit_data->image != null)
                                <img src="{{ asset('storage/uploads/logo/' . $edit_data->image) }}" alt="image" style="width:120px; height:80px;">
                            @else
                            <img src="{{ (!empty($edit_data->image))?
                                asset('storage/uploads/logo/'.$edit_data->image):asset('storage/uploads/No-image.jpg') }}" style="width:120px; height:80px;">
                            @endif
                            </div>
                    <div class="col-md-12">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Upload File</label>
                            <div class="col-sm-12">
                                <input name="image" id="imagesupport" class="form-control" type="file">
                            </div>
                            {{-- @error('image')
                            <p class="help-block" style="color: red">
                                {{ $errors->first('image') }}
                            </p>
                            @enderror --}}
                        </div>

                    </div>
                    </div>
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

<script>
    $("#imagesupport").on("change", function() {
        var input = this;
        if (input.files && input.files[0]) {
            var type = input.files[0].type; // image/jpg, image/png, image/jpeg...
            // allow jpg, png, jpeg, bmp, gif, ico
            var type_reg = /^image\/(jpg|png|jpeg|bmp|gif|ico|webp)$/;
            if (type_reg.test(type)) {} else {
                toastr.error("You must select an image file only.")
                this.value = '';
            }
        }

        if (this.files[0].size > 3145728) {
            toastr.error("Please Upload file less than 3 Mb")
            $(this).val('');
        }
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
