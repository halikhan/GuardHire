@extends('user-dashboard.layouts.master')
@section('content')
    <link rel="stylesheet" href="https://project.designprosusa.com/South_Dakota_Bride/public/website/css/choices.min.css">
    <?php
    $getlocation = new App\Models\location();
    // $getVendorlocations =  App\Models::UserLocation;
    // dd($getlocation);
    ?>
    <style>
        .edit-submit-cstmbtn {
            margin-top: 2rem;
            background-color: #d82e6b;
            font-family: "Solway-Bold";
            font-weight: 600;
            color: #ffffff;
            border-radius: 12px;
            padding: 8px 16px;
            font-size: 16px;
        }

        .edit-submit-cstmbtn:hover {
            margin-top: 2rem;
            background-color: #d82e6b;
            font-family: "Solway-Bold";
            font-weight: 600;
            color: #fbf7f8;
        }

        .top-tabt-heading {
            color: #d82e6b;
            font-size: 58px;
            font-family: "JA-Hand-Reg";
        }

        .choices__list--multiple .choices__item {
            background-color: #EC0169;
            border: 0px;
        }
    </style>



    <div class="for-content-tabs">
        <h2 class="top-tabt-heading">Change Profile</h2>
        <br><br>

        <form action="{{ route('vendor_profile_update', ['id' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="inputImage">Profile Image</label>
                    <input type="file" name="image" class="form-control" id="inputImage" placeholder="Name">
                    <input name="old_image" class="form-control btn-square"
                    id="exampleFormControlInput10" type="hidden"
                    value="{{ Auth::user()->image ?? '' }}" placeholder="Name">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputName">Vendor First Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name ?? '' }}" class="form-control"
                        id="inputAddress" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputName">Vendor Last Name</label>
                    <input type="text" name="last_name" value="{{ Auth::user()->last_name ?? '' }}" class="form-control"
                        id="inputAddress" placeholder="last name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Vendor Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email ?? '' }}" class="form-control"
                        id="inputEmail4" placeholder="Email" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Vendor Phone </label>
                    {{-- <input type="text" class="form-control" name="contact" value="{{ Auth::user()->contact ?? '' }}"
                        placeholder="Vendor Phone" > --}}
                    <input id="phone12" class="form-control" type="tel" placeholder="Phone No." name="contact"
                        value="{{ Auth::user()->contact ?? '' }}" maxlength="14" pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                </div>
            </div>
            <div class="row">

                <div class="form-group col-md-12">
                    <label for="inputState">Vendor Company Address</label>
                    <input type="text" class="form-control" name="company" value="{{ Auth::user()->company ?? '' }}"
                        placeholder="street 56, XYZ Block">
                </div>

                @if (!empty($getVendorlocations->locations))
                    @php
                        $data = $getlocation->whereIn('id', json_decode($getVendorlocations->locations ))->get();
                        //  dd($data);
                    @endphp
                    <div class="form-group">
                        <label for="inputState">Vendor Current Cities.*</label>
                    </div>
                    @foreach ($data as $items)
                        <div class="form-group col-md-6">
                            <input value="{{ $items->location ?? '' }}" class="form-control btn-square" type="text" readonly>
                            {{-- <select id="choices-multiple-remove-button"
                                placeholder="Location">
                                @foreach ($data as $items)
                                <option value="{{ $items->id ?? ''}}">{{ $items->location }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    @endforeach
                @else
                    <input name="date" value="No Cities available" class="form-control btn-square"
                        id="exampleFormControlInput10" type="text" readonly>
                @endif
                {{-- <div class="form-group col-md-6"> --}}
                <div class="form-group">
                    <label for="inputState">You can select multiple Cities to update.*</label>
                </div>

                {{-- <select name="locations[]" id="choices-multiple-remove-button" placeholder="Select upto 5 tags" multiple>
                        @foreach ($getLocationNames as $value)
                        <option value="{{ $value->id }}">{{ $value->location }}</option>
                        @endforeach
                    </select> --}}
                    {{-- {{ dd($getLocationNames) }} --}}


                <div class="col-lg-12 mb-4 wow animate__delay-1s animated fadeInRight comeForward">
                    <select name="locations[]" id="choices-multiple-remove-button" placeholder="Location" multiple required>
                        @foreach ($getLocationNames as $value)
                            @foreach ($data as $user_location)
                            @if ($user_location->id == $value->id)
                            <option value="{{ $user_location->id }}" {{ $user_location->id == $value->id ? 'selected' : '' }}>{{ $user_location->location }}</option>
                            @endif
                            @endforeach
                            @if ($user_location->id != $value->id)
                            <option value="{{ $value->id }}">{{ $value->location ?? '' }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                {{-- </div> --}}
            </div>
            <br>
            <button type="submit" class="btn edit-submit-cstmbtn">Update</button>
        </form>
    </div>
@endsection

@push('scripts')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}')
            </script>
        @endforeach
    @endif

    @if (Session::has('user_updated'))
        <script>
            swal('User Profile', '{{ Session::get('user_updated') }}', 'success')
        </script>
    @endif

    @if (Session::has('user_error'))
        <script>
            swal('User Profile', '{{ Session::get('user_error') }}', 'success')
        </script>
    @endif
@endpush
@push('scripts')
    <script type="text/javascript">
        document.getElementById('phone12').addEventListener('input', function(e) {
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
@endpush
