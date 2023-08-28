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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Create</h5>
                    </div>
                    {{-- <form class="form theme-form"> --}}
                    <form class="form theme-form"id="" action="{{ route('user_store') }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10"> First Name.*</label>
                                        <input name="name" class="form-control btn-square"
                                            id="exampleFormControlInput10"  value="{{ old('name') }}" type="text" placeholder="First Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Last Name.*</label>
                                        <input name="last_name" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="text" value="{{ old('last_name') }}" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Email.*</label>
                                        <input name="email" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="email" value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="inputState">Phone.*</label>

                                        <input id="phone1" class="form-control btn-square" type="tel"
                                            placeholder="Phone No." name="contact" value="{{ old('contact') }}" maxlength="14"
                                            pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Location.*</label>
                                        <select name="userlocation" class="form-select" size="1">
                                            <option selected disabled>Select Location</option>
                                            @foreach ($getlocation as $value)
                                                <option
                                                    value="{{ $value->id }}">
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
                                            <input name="image" class="form-control" value="{{ old('image') }}" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <select name="type" class="form-select" size="1">
                                            <option selected disabled>Type</option>
                                            <option value="2">Security Company</option>
                                            <option value="3">Hire Security Services</option>
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
                                        <label for="exampleFormControlInput10">Password.*</label>
                                        <input name="password" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="password" value="{{ old('password') }}" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Confirm Password.*</label>
                                        <input name="confirm_password" class="form-control btn-square"
                                            id="exampleFormControlInput10" value="{{ old('confirm_password') }}" type="password"
                                            placeholder="Confirm Password">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
