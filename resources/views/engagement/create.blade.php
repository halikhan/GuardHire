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
<h3>Engagement</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Engagement </li>
<li class="breadcrumb-item active">list</li>
@endsection

@section('content')
<style>
    .for-ctm-height{
        max-height:200px !important;
        min-height:200px !important;
    }
    .cke_contents.cke_reset{
        max-height:200px !important;
        min-height:200px !important;
    }
    <style>
    .for-ctm-height{
        max-height:200px !important;
        min-height:200px !important;
    }
    .cke_contents.cke_reset{
        max-height:200px !important;
        min-height:200px !important;
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
        .mutipleimages{
            color: red;
            font-size: 11px;
        }
    </style>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Create</h5>
            </div>
            {{-- <form class="form theme-form"> --}}
                <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                <form class="form theme-form"id="" action="{{ route("engagement_store") }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput10">Select Groom.*</label>
                                    <select  name="user_id" for="exampleFormControlInput10" class="form-control btn-square">
                                     @foreach ($users as $user )
                                         <option value="{{$user->id}}" class="form-control btn-square" id="exampleFormControlInput10">{{$user->groom_first_name}}</option>
                                     @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="add_item row align-center">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput10">Services.*</label>
                                        <select name="service[]" type="text" class="form-select btn-square" id="validationDefault03"
                                            placeholder="Bussiness Category" onchange="changeServiceType(this);">
                                            <option selected disabled>Service Category</option>
                                            @foreach ($getServiceNames as $value)
                                                <option data-id="{{ $value->id }}" value="{{ $value->id }}">
                                                    {{ $value->service }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput10">Vendors.*</label>
                                        <select name="vendor[]" id="selectVendor" value="{{ old('vendors[]') }}"
                                            class="form-control for-height-input">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2" style="padding-top: 50px;">
                                    <div class="form-group">
                                        <span class="btn btn-success addeventmore">
                                            <i class="fa fa-plus-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput10">Groom First Name.*</label>
                                    <input name="groom" class="form-control btn-square" id="exampleFormControlInput10" value="{{ old('groom') }}" type="text" placeholder="Groom">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput10">Groom Last Name.*</label>
                                    <input name="groom_last_name" class="form-control btn-square" id="exampleFormControlInput10" value="{{ old('groom_last_name') }}" type="text" placeholder="Groom last name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput10">Bride First Name.*</label>
                                    <input name="bride" class="form-control btn-square" id="exampleFormControlInput10" value="{{ old('bride') }}" type="text" placeholder="Bride">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput10">Bride Last Name.*</label>
                                    <input name="bride_last_name" class="form-control btn-square" id="exampleFormControlInput10" value="{{ old('bride_last_name') }}" type="text" placeholder="Bride last name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput10">Location.*</label>
                                    <input name="location" class="form-control btn-square" id="exampleFormControlInput10" value="{{ old('location') }}" type="text" placeholder="location">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput10">Date.*</label>
                                    <input name="date" id="txt-appoint_date" class="form-control btn-square" id="exampleFormControlInput10" value="{{ old('date') }}" type="date">
                                </div>
                            </div>
                        </div>
                        <div class="container mt-3 w-100">
                            <div class="card shadow-sm w-100">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="inputImage">Banner Image.*</label>
                                        <input type="file" name="image" class="myfrm form-control">
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="inputImage">Wedding Images.*</label>
                                        <h6 class="mutipleimages">Please select multiple images at once.*</h6>
                                        <input type="file" name="wedding_image[]" class="myfrm form-control" id="wedding_images" multiple
                                        onchange="image_select()">
                                    </div>
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
                                    <textarea name="content" class="ckeditor form-control btn-square" id="exampleFormControlTextarea14" value="{{ old('content') }}" rows="3"></textarea>
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
            <div style="visibility: hidden;">
                <div class="whole_extra_item_add" id="whole_extra_item_add">
                    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                        <div class="" id="form-row">
                            <div class="row">

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput10">Services.*</label>
                                        <select name="service[]" type="text" class="form-select btn-square"
                                            id="validationDefault03" placeholder="Bussiness Category"
                                            onchange="changeMultipleServcesType(this);">
                                            <option selected disabled>Service Category</option>
                                            @foreach ($getServiceNames as $value)
                                                <option data-id="{{ $value->id }}" value="{{ $value->id }}">
                                                    {{ $value->service }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>{{-- End form group --}}
                                {{-- End col md 5 --}}


                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput10">Vendors.*</label>
                                        <select name="vendor[]" id="selectMultipleVendor" class="form-control">

                                        </select>
                                    </div> {{-- End form group --}}
                                </div> {{-- End col md 2 --}}

                                <div class="col-md-2" style="padding-top: 45px;">
                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                </div> {{-- End col md 2 --}}
                            </div>
                        </div>
                    </div>
                </div>
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
                  <img src="` + i.url + `" alt="Image">
                  <span class="position-absolute" onclick="delete_image(` + images.indexOf(i) + `)">&times;</span>
              </div>`;

                });
                return image;

            }
            else{
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
<script>
    $(document).ready(function() {

        $('body').on('change', '#select_box', function() {
            $('#show_only').val(this.value);
        });
    });

    // $(document).ready(function() {
    //     var Email = $("#selectbannerimage").val();
    //     var x = rea.test(Email);
    //     if (!x) {
    //         // alert('Type Your valid Email');
    //         toastr.error('Type Your valid Email');
    //         return false;
    //     }
    // });



    function changeMultipleServcesType(e) {

        MultiplevendorService = [];
        console.log(e)
        var dataid = $(e).find('option:selected').attr('data-id');
        var selectedValue = $(e).find('option:selected').attr('value');

        const TOKEN = $("#token").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": TOKEN
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ route('services_type_engagement') }}",
            dataType: "json",
            data: {
                id: dataid,
                value: selectedValue,
            },
            success: function(response) {

                console.log(response);
                $('#selectMultipleVendor' + localStorage.getItem('count_item')).html("");
                response.data.map((val) => {
                    MultiplevendorService.push(val)
                });
                MultiplevendorService.map((val) => {
                    $('#selectMultipleVendor' + localStorage.getItem('count_item')).append(`<option value="${val.id}">
                ${val.name} </option>`)
                });
            }

        });
        console.log(dataid);
        console.log(selectedValue);
    }

    function changeServiceType(e) {
        vendorService = [];
        console.log(e)
        var dataid = $(e).find('option:selected').attr('data-id');
        var selectedValue = $(e).find('option:selected').attr('value');
        const TOKEN = $("#token").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": TOKEN
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ route('services_type_engagement') }}",
            dataType: "json",
            data: {
                id: dataid,
                value: selectedValue,
            },
            success: function(response) {
                console.log(response);
                $('#selectVendor').html("");
                response.data.map((val) => {
                    vendorService.push(val)

                });
                vendorService.map((val) => {
                    $('#selectVendor').append(`<option value="${val.id}">
                ${val.name} </option>`)
                });
            }

        });
        console.log(dataid);
        console.log(selectedValue);
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addeventmore", function() {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
            $("#selectMultipleVendor").attr("id", "selectMultipleVendor" + counter);
            localStorage.setItem('count_item', counter);
        });
        $(document).on("click", '.removeeventmore', function(event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
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
