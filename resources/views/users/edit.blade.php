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
    <h3>Users</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Users </li>
    <li class="breadcrumb-item active">list</li>
@endsection

@section('content')

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
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
                    <form class="form theme-form" action="{{ route('user_update', $edit_data->id) }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10"> First Name.*</label>
                                        <input name="name" class="form-control btn-square" id="exampleFormControlInput10"
                                            value="{{ $edit_data->name }}" type="text" placeholder="First Name">
                                            <input name="type" value="{{ $edit_data->type }}" type="hidden" placeholder="First Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Last Name.*</label>
                                        <input name="last_name" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="text"
                                            value="{{ $edit_data->last_name }}" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Email.*</label>
                                        <input name="email" class="form-control btn-square" id="exampleFormControlInput10"
                                            type="email" value="{{ $edit_data->email }}" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="inputState">Phone.*</label>
                                        <input id="phone1" class="form-control btn-square" type="tel"
                                            placeholder="Phone No." name="contact" value="{{ $edit_data->contact }}"
                                            maxlength="14" pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Location.*</label>
                                        <select name="userlocation" class="form-select" size="1">
                                            {{-- @dd($edit_data->userlocation) --}}
                                            {{-- <option selected disabled>Select Location</option> --}}
                                            @foreach ($getlocation as $value)
                                                <option value="{{ $value->id }}" {{ $value->id == $edit_data->userlocation ? 'selected' : '' }}>
                                                    {{ $value->location ?? '' }}</option>
                                            @endforeach
                                        </select>

                                        {{-- <input name="userlocation" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="text" value="{{ $edit_data->userlocation }}" placeholder="Location"
                                            id="ship-address"> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Upload Image.*</label>
                                        <div class="col-sm-12">
                                            <input name="image" class="form-control" type="file">
                                            <input name="oldimage" class="form-control" value="{{ $edit_data->image }}"
                                                type="hidden">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3" style="display: none;">
                                        <select name="type" class="form-select" size="1">
                                            <option selected disabled>Type</option>
                                            <option value="2"{{ $edit_data->type == 2 ? 'selected' : '' }}>Security
                                                Company</option>
                                            <option value="3" {{ $edit_data->type == 3 ? 'selected' : '' }}>Hire
                                                Security Services</option>
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
                                    <label for="exampleFormControlInput10">Status.*</label>
                                    <div class="mb-3">
                                        <label class="switch">
                                            @if ($edit_data->status == 1)
                                            <input name="status" type="checkbox" checked>
                                            @else
                                            <input name="status" type="checkbox">
                                            @endif
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlInput10">Featured Status.*</label>
                                    <div class="mb-3">
                                        <label class="switch">
                                            @if ($edit_data->featured_status == 1)
                                            <input name="featured_status" type="checkbox" checked>
                                            @else
                                            <input name="featured_status" type="checkbox">
                                            @endif
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Password.*</label>
                                        <input name="password" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="password" value="{{ old('password') }}"
                                            placeholder="Password">
                                        <input name="oldpassword" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="hidden"
                                            value="{{ $edit_data->password }}" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Confirm Password.*</label>
                                        <input name="confirm_password" class="form-control btn-square"
                                            id="exampleFormControlInput10" value="{{ old('confirm_password') }}" type="password"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div> --}}

                        </div>

                        {{-- <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Groom First Name.*</label>
                                       <label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Groom Last Name.*</label>
                                        <input name="groom_last_name" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="text"
                                            value="{{ $edit_data->groom_last_name }}" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Groom Email.*</label>
                                        <input name="groom_email" value="{{ $edit_data->groom_email }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="email"
                                            placeholder="Email" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="inputState">Groom Phone </label>

                                        <input id="phone1" class="form-control btn-square" type="tel"
                                            placeholder="Phone No." name="groom_phone" value="{{ $edit_data->groom_phone }}"
                                            maxlength="14" pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Bride First Name.*</label>
                                        <input name="bride_first_name" value="{{ $edit_data->bride_first_name }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="text"
                                            placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Bride Last Name.*</label>
                                        <input name="bride_last_name" value="{{ $edit_data->bride_last_name }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="text"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Bride Email.*</label>
                                        <input name="bride_email" value="{{ $edit_data->bride_email }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="email"
                                            placeholder="Bride Email" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Bride Phone.*</label>
                                        <input id="phone13" class="form-control btn-square" type="tel"
                                            placeholder="Phone No." value="{{ $edit_data->bride_phone }}"
                                            name="bride_phone" maxlength="14" pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <p class="form-para">Which services are you still looking to hire or research for
                                            your wedding?(please check all that apply)</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                @foreach ($getserveices as $item)
                                    <div class="col-lg-4">
                                        <input type="checkbox" name="services[]"{{ ( is_array(json_decode($getuserserveices->services)) && in_array($item->id , json_decode($getuserserveices->services)) ) ? 'checked ' : '' }}  value="{{ $item->id  }}" class="checkbox">
                                        <label for=""  class="pb-2 pr-2">{{ $item->service }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Wedding Date.*</label>
                                        <input name="date" value="{{ $edit_data->date }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="date"
                                            placeholder="date" id="ship-address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">City.*</label>
                                        <input name="city" value="{{ $edit_data->city }}"
                                            class="form-control btn-square" id="exampleFormControlInput10" type="text"
                                            placeholder="city" id="ship-address">
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
                                        <label class="col-sm-3 col-form-label">Upload Image.*</label>
                                        <div class="col-sm-9">
                                            <input name="image" class="form-control" type="file">
                                               <input name="old_image" class="form-control btn-square"
                                                id="exampleFormControlInput10" type="hidden"
                                                value="{{ $edit_data->image }}" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Password.*</label>
                                        <input name="password" class="form-control btn-square" value=""
                                            id="exampleFormControlInput10" type="password" placeholder="Password">
                                        <input type="hidden" value="{{ $edit_data->password }}" name="prevpassword">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Confirm Password.*</label>
                                        <input name="confirm_password" class="form-control btn-square" value=""
                                            id="exampleFormControlInput10" type="password"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>

                        </div> --}}
                        <div class="card-footer">
                            <button class="btn btn-primary mailregister" type="submit">Submit</button>
                            {{-- <input class="btn btn-light" type="reset" value="Cancel"> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- <script>
    $(".mailregister").click(function(){

        var image = $("#subEmail").val();
        // var x = rea.test(Email);
        if (!image) {
            // alert('Type Your valid Email');
            toastr.error('please select image');
            return false;
        }
    });


    </script> --}}
    <script>
        let autocomplete;
        let address1Field;
        let postalField;

        function initAutocomplete() {
            address1Field = document.querySelector("#ship-address");
            postalField = document.querySelector("#postcode");
            // addresses in the US and Canada.
            autocomplete = new google.maps.places.Autocomplete(address1Field, {
                componentRestrictions: {
                    country: ["us"]
                },
                fields: ["address_components", "geometry"],
                types: ["address"],
            });
            address1Field.focus();
            autocomplete.addListener("place_changed", fillInAddress);
        }

        function fillInAddress() {
            const place = autocomplete.getPlace();
            let address1 = "";
            let postcode = "";
            document.getElementById('latitude_input').value = place.geometry.location.lat();
            document.getElementById('longitude_input').value = place.geometry.location.lng();
            for (const component of place.address_components) {
                const componentType = component.types[0];
                // console
                switch (componentType) {
                    case "street_number": {
                        address1 = `${component.long_name} ${address1}`;
                        break;
                    }

                    case "route": {
                        address1 += component.short_name;
                        break;
                    }

                    case "postal_code": {
                        postcode = `${component.long_name}${postcode}`;
                        break;
                    }
                    case "locality":
                        document.querySelector("#locality").value = component.long_name;
                        break;
                    case "administrative_area_level_1": {
                        document.querySelector("#state").value = component.short_name;
                        break;
                    }
                }
            }

            address1Field.value = address1;
            postalField.value = postcode;
        }
    </script>
    <script type="text/javascript">
        $("#regiterForm").submit(function() {
            $("#pageloader").fadeIn();
        });
    </script>
    <script>
        $(document).ready(function() {
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
    <script type="text/javascript">
        document.getElementById('phone1').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
        document.getElementById('phone13').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
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
@endsection
