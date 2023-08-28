@extends('user-dashboard.layouts.master')
@section('content')
    <style>
        .edit-submit-cstmbtn {
            margin-top: 2rem;
            margin-top: 2rem;
            background-color: #d82e6b;
            font-family: "Solway-Bold";
            font-weight: 600;
            color: #ffffff;
            border-radius: 12px;
            padding: 8px 16px;
            font-size: 16px;
        }


        .top-tabt-heading {
            color: #d82e6b;
            font-size: 58px;
            font-family: "JA-Hand-Reg";
        }
.form-check-input:checked {
    background-color: #EC0169 !important;
    border-color: #EC0169 !important;
}
.form-check-input {
    background-color: transparent !important;
    border: 1px solid #918f8f !important;
    cursor: pointer !important;
}
    </style>

    <div class="for-content-tabs">
        <h2 class="top-tabt-heading">User Dashboard</h2>
        <br><br>
        <form action="#" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputName">Groom First Name</label>
                    <input type="text" name="groom_first_name" value="{{ Auth::user()->groom_first_name ?? '' }}"
                        class="form-control" id="inputAddress" placeholder="Name" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputName">Groom Last Name</label>
                    <input type="text" name="groom_last_name" value="{{ Auth::user()->groom_last_name ?? '' }}"
                        class="form-control" id="inputAddress" placeholder="Name" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Groom Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email ?? '' }}" class="form-control"
                        id="inputEmail4" placeholder="Email" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Groom Phone </label>
                    <input type="text" class="form-control" name="groom_phone"
                        value="{{ Auth::user()->groom_phone ?? '' }}" placeholder="State" readonly>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Bride First Name</label>
                    <input type="text" class="form-control" name="bride_first_name"
                        value="{{ Auth::user()->bride_first_name ?? '' }}" id="inputAddress" placeholder="1234 Main St"
                        readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Bride Last Name</label>
                    <input type="text" class="form-control" name="bride_last_name"
                        value="{{ Auth::user()->bride_last_name ?? '' }}" id="inputAddress" placeholder="1234 Main St"
                        readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputCountry">Bride Email</label>
                    <input type="text" class="form-control" name="bride_email"
                        value="{{ Auth::user()->bride_email ?? '' }}" placeholder="Country" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Bride Phone </label>
                    <input type="text" class="form-control" name="bride_phone"
                        value="{{ Auth::user()->bride_phone ?? '' }}" placeholder="State" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" name="city" value="{{ Auth::user()->city ?? '' }}"
                        id="inputCity" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputZip">Wedding date </label>
                    <input type="text" class="form-control" name="date" value="{{ Auth::user()->date ?? '' }}"
                        id="inputZip" readonly>
                </div>

            </div>
            <div class="row container">

                    <label for="inputZip">
                        <p class="form-para">Services </p>
                    </label>
                    @foreach ($getserveices as $item)
                    <div class="col-lg-4">
                        <input type="checkbox" name="services[]"{{ ( is_array(json_decode($getuserserveices->services)) && in_array($item->id , json_decode($getuserserveices->services)) ) ? 'checked ' : '' }}  value="{{ $item->id  }}" class="form-check-input" disabled="disabled">
                        <label for=""  class="pb-2 pr-2">{{ $item->service }}</label>
                    </div>
                @endforeach

            </div>

            <br>

            <div class="d-flex justify-content-end">
                <a href="{{ route('edit-user-profile') }}" class="btn edit-submit-cstmbtn">Edit</a>
            </div>
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
