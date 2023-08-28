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
    <h3>Featured</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Featured </li>
    <li class="breadcrumb-item active">list</li>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit</h5>
                    </div>
                    {{-- <form class="form theme-form"> --}}
                    <form class="form theme-form" action="{{ route('featured_update', $edit_data->id) }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10"> First Name.*</label>
                                        <input name="type" class="form-control" value="{{ $edit_data->type }}" type="hidden">
                                        <input name="name" class="form-control btn-square"
                                            id="exampleFormControlInput10"  value="{{ $edit_data->name }}" type="text" placeholder="First Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Last Name.*</label>
                                        <input name="last_name" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="text" value="{{ $edit_data->last_name }}" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Email.*</label>
                                        <input name="email" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="email" value="{{ $edit_data->email }}" placeholder="Email" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="inputState">Phone.*</label>

                                        <input id="phone1" class="form-control btn-square" type="tel"
                                            placeholder="Phone No." name="contact" value="{{ $edit_data->contact }}" maxlength="14"
                                            pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Upload Image.*</label>
                                        <div class="col-sm-12">
                                            <input name="image" class="form-control" type="file">
                                            <input name="oldimage" class="form-control" value="{{ $edit_data->image }}" type="hidden">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3" style="display: none;">
                                        <select name="type" class="form-select" size="1">
                                            <option selected disabled>Type</option>
                                            <option value="4"{{ $edit_data->id == 4 ? 'selected' : '' }}>Featured Guard Listing</option>
                                            <option value="5" {{ $edit_data->id == 5 ? 'selected' : '' }}>Featured Client Listing</option>
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
                                        <label for="exampleFormControlInput10">Location.*</label>
                                        <div class="col-sm-12">
                                        <select class="serviceDropdown form-control" aria-label="Default select example" id="location"
                                            name="location" required>
                                            @foreach ($getlocation as $value)
                                                <option value="{{ $value->id }}"
                                                    {{ $value->id == $edit_data->featured_clientjobs->location_id ? 'selected' : '' }}>
                                                    {{ $value->location ??''}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="col-sm-12">
                                        <label>Job Description</label>
                                        <div class="select">
                                            <select class="serviceDropdown form-control" aria-label="Default select example"
                                                id="job_type" name="job_type" required>
                                                <option selected="" disabled>Select Job</option>
                                                @foreach ($getGuardType as $value)
                                                <option value="{{ $value->id }}"
                                                    {{ $value->id == $edit_data->featured_clientjobs->job_type ? 'selected' : '' }}>
                                                    {{ $value->name }}</option>
                                                    {{-- <option value="{{ $value->id }}">{{ $value->name }}</option> --}}
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Services</label>
                                            <div class="col-sm-12">
                                            <div class="select">
                                                <select class="form-control" aria-label="Default select example"
                                                    id="services" name="services" required>
                                                    @foreach ($getservice as $value)
                                                   <option value="{{ $value->id }}"
                                                    {{ $value->id == $edit_data->featured_clientjobs->services ? 'selected' : '' }}>
                                                    {{ $value->service }}</option>
                                                        {{-- <option value="{{ $value->id }}">{{ $value->service }}
                                                        </option> --}}
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="label">Language</label>
                                            <div class="col-sm-12">
                                            <div class="multipleSelect">
                                                <select id="adminlocationSets" multiple="multiple" placeholder="Language"
                                                    style="width: 23.2rem" name="languages[]" required>
                                                    @foreach ($getLanguage as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Company Name</label>
                                            <div class="col-sm-12">
                                            <input name="companyname" value="{{ $edit_data->featured_clientjobs->companyname ??''}}" type="text" class="form-control"
                                                placeholder="Company Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Job Duration</label>
                                            <div class="col-sm-12">
                                            <input type="text"value="{{ $edit_data->featured_clientjobs->job_duration ??''}}"  class="form-control" placeholder="Job Duration"
                                                id="job_duration" name="job_duration" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Per Hour Rate</label>
                                            <div class="col-sm-12">
                                            <input type="text"value="{{ $edit_data->featured_clientjobs->per_hour_rate ??''}}"  class="form-control" placeholder="Per Hour Rate"
                                                id="per_hour_rate" name="per_hour_rate" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="label">Tags</label>
                                            <div class="col-sm-12">
                                            <div class="multipleSelect">
                                                <select id="adminlocationSetsOne" multiple="multiple" placeholder="Tags"
                                                    style="width: 23.2rem" name="tags[]" required>
                                                    @foreach ($getTags as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <div class="col-sm-12">
                                            <textarea name="description" type="text" class="form-control" placeholder="Type Here...">{{ $edit_data->featured_clientjobs->description ??''}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Password.*</label>
                                        <input name="password" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="password" value="{{ old('password') }}" placeholder="Password">
                                            <input name="oldpassword" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="hidden" value="{{ $edit_data->password }}" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                        </div>
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
