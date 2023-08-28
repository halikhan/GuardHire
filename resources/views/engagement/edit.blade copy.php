@extends('layouts.simple.master')
@section('title', 'Project List')
@section('title', 'Base Inputs')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Engagement</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Engagement </li>
    <li class="breadcrumb-item active">list</li>
@endsection

@section('content')
    <style>
        .for-ctm-height {
            max-height: 200px !important;
            min-height: 200px !important;
        }

        .cke_contents.cke_reset {
            max-height: 200px !important;
            min-height: 200px !important;
        }

        .mutipleimages {
            color: red;
            font-size: 11px;
        }
        .image_container {
            height: 60px;
            width: 100px;
            border-radius: 6px;
            overflow: hidden;
            margin: 10px;
            color: #d82e6b;
        }

        .image_container img {
            height: 100%;
            width: auto;
            object-fit: cover;
        }

        .image_container span {
            top: -14px;
            right: 3px;
            color: red;
            font-size: 26px;
            font-weight: 700;
            cursor: pointer;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit</h5>
                    </div>
                    {{-- <form class="form theme-form"> --}}
                    <form class="form theme-form"id="" action="{{ route('engagement_update', $edit_data->slug) }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Groom First Name.*</label>
                                        <input name="groom" value="{{ $edit_data->groom }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="text"
                                            placeholder="Groom">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Groom Last Name.*</label>
                                        <input name="groom_last_name" value="{{ $edit_data->groom_last_name }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="text"
                                            placeholder="Groom">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Bride First Name.*</label>
                                        <input name="bride" value="{{ $edit_data->bride }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="text"
                                            placeholder="Bride">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Bride Last Name.*</label>
                                        <input name="bride_last_name" value="{{ $edit_data->bride_last_name }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="text"
                                            placeholder="Bride">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Location.*</label>
                                        <input name="location" value="{{ $edit_data->location }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="text"
                                            placeholder="location">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Date.*</label>
                                        <input name="date" id="txt-appoint_date" value="{{ $edit_data->date }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    @if ($edit_data->image != null)
                                        <img src="{{ asset('storage/uploads/cms/' . $edit_data->image) }}" alt="image"
                                            style="width:100px; height:100px;">
                                    @else
                                        <img src="{{ !empty($edit_data->image)
                                            ? asset('storage/uploads/cms/' . $edit_data->image)
                                            : asset('storage/uploads/No-image.jpg') }}"
                                            style="width:80px; height:80px;">
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Update Image.*</label>
                                        {{-- <div class="col-sm-9"> --}}
                                            <input name="image" class="form-control" type="file">
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    @if ($getUserWeddingimages->image != null)
                                        @foreach (json_decode($getUserWeddingimages->image) as $image)
                                            <img src="{{ asset('storage/uploads/cms/' . $image) }}" alt="image"
                                                style="width:120px; height:80px;">
                                        @endforeach
                                    @else
                                        <img src="{{ !empty($getUserWeddingimages->image)
                                            ? asset('storage/uploads/cms/' . $getUserWeddingimages->image)
                                            : asset('storage/uploads/No-image.jpg') }}"
                                            style="width:80px; height:80px;">
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label for="inputImage">Wedding Images.*</label>
                                        <h6 class="mutipleimages">Please select multiple images at once.*</h6>

                                        <input type="file" name="wedding_image[]" class="myfrm form-control"
                                            id="wedding_images" multiple onchange="image_select()">
                                    {{-- </div> --}}
                                </div>
                                <div class=" d-flex flex-wrap justify-content-start" id="wedding_Multiple_Images">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 mb-0">
                                    {{-- ckeditor --}}
                                    <label for="exampleFormControlTextarea14">Enter Description</label>
                                    <textarea name="content" class="ckeditor form-control btn-square" id="exampleFormControlTextarea14" rows="3">{!! $edit_data->content !!}</textarea>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection

@section('script')

    <script>
        var images = [];

        function image_select() {

            var image = document.getElementById('wedding_images').files;
            if (image.length > 5) {
                $('#wedding_images').val("");
                toastr.error('You can upload only 5 images!');
                location.reload();
                return false;

            }
            for (i = 0; i < image.length; i++) {

                images.push({

                    "name": image[i].name,
                    "url": URL.createObjectURL(image[i]),
                    "file": image[i],
                })
            }

            document.getElementById('wedding_Multiple_Images').innerHTML = image_show();
        }

        function image_show() {
            var image = "";

            // var imgCount = document.images.length;
            if (images.length < 6) {

                images.forEach((i) => {
                    console.log(images.length);
                    image += `<div class="image_container d-flex justify-content-center position-relative">
              <img src="` + i.url + `" alt="Image" style="width:80px; height:60px;">
              <span class="position-absolute" onclick="delete_image(` + images.indexOf(i) + `)">&times;</span>
          </div>`;

                });
                return image;

            } else {
                // var images.length = "";
                toastr.error('Please select 5 images at once!');
                $('#wedding_images').val("");
                location.reload();
                return null;
            }


        }

        function delete_image(e) {
            images.splice(e, 1);
            document.getElementById('wedding_Multiple_Images').innerHTML = image_show();
            const dt = new DataTransfer()
            const input = document.getElementById('wedding_images')
            const {
                files
            } = input

            for (let i = 0; i < files.length; i++) {
                const file = files[i]
                if (e !== i)
                    dt.items.add(file);
            }

            input.files = dt.files;
            console.log(document.getElementById('wedding_images').files);
        }
    </script>

    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script>
        $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
            // alert('test');
            var dateToday = new Date();
            var month = dateToday.getMonth() + 1;
            var day = dateToday.getDate();
            var year = dateToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#txt-appoint_date').attr('min', maxDate);
        });
    </script>
@endsection
