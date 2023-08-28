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

    .edit-submit-cstmbtn:hover {
        margin-top: 2rem;
        background-color: #d82e6b;
        font-family: "Solway-Bold";
        font-weight: 600;
        color: #ffffff;
    }
    .top-tabt-heading {
        color: #d82e6b;
        font-size: 58px;
        font-family: "JA-Hand-Reg";
    }

</style>
    <div class="for-content-tabs">
        <h2  class="top-tabt-heading">Change Profile</h2>
        <br><br>

        <form action="{{ route('guard.profile.update', ['id' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="inputImage">Profile Image</label>
                    <input type="file" name="image" class="form-control" id="inputImage" placeholder="Name">
                    <input name="old_image" class="form-control btn-square"
                    id="exampleFormControlInput10" type="hidden"
                    value="{{ Auth::user()->image ?? '' }}}}" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputName">Groom First Name</label>
                    <input type="text" name="groom_first_name" value="{{ Auth::user()->groom_first_name ?? '' }}" class="form-control"
                        id="inputAddress" placeholder="Name" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputName">Groom Last Name</label>
                    <input type="text" name="groom_last_name" value="{{ Auth::user()->groom_last_name ?? '' }}" class="form-control"
                        id="inputAddress" placeholder="Name" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Groom Email</label>
                    <input type="email" name="groom_email" value="{{ Auth::user()->email }}" class="form-control" id="inputEmail4" placeholder="Email" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Groom Phone</label>
                    <input type="text" class="form-control" name="groom_phone" value="{{ Auth::user()->groom_phone == '' ? old('groom_phone') : Auth::user()->groom_phone }}" id="inputAddress" placeholder="Phone">
                </div>
            </div>

            <div class="row">


                <div class="form-group col-md-6">
                    <label for="inputCountry">City</label>
                    <input type="text" class="form-control" name="city" value="{{ Auth::user()->city == '' ? old('city') : Auth::user()->city }}" placeholder="city" id="ship-address">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Bride First Name</label>
                    <input type="text" class="form-control" name="bride_first_name"
                        value="{{ Auth::user()->bride_first_name ?? '' }}" id="inputAddress" placeholder="1234 Main St"
                        >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Bride Last Name</label>
                    <input type="text" class="form-control" name="bride_last_name"
                        value="{{ Auth::user()->bride_last_name ?? '' }}" id="inputAddress" placeholder="1234 Main St"
                        >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">Bride Email</label>
                    <input type="text" class="form-control" name="bride_email" value="{{ Auth::user()->bride_email == '' ? old('bride_email') : Auth::user()->bride_email }}" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputZip">Bride Phone</label>

                    <input id="phone12" class="form-control" type="tel" placeholder="Phone No." name="bride_phone" value="{{ Auth::user()->bride_phone ?? '' }}"  maxlength="14"  pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputZip">Wedding Date</label>
                    <input type="date" class="form-control" id="txt-appoint_date" name="date" value="{{ Auth::user()->date }}" id="inputZip">
                </div>
            </div>
            <div class="row">

                <label for="inputZip">
                    <p class="form-para">Services </p>
                </label>
                @foreach ($getserveices as $item)
                <div class="col-lg-4">
                    <input type="checkbox" name="services[]"{{ ( is_array(json_decode($getuserserveices->services)) && in_array($item->id , json_decode($getuserserveices->services)) ) ? 'checked ' : '' }}  value="{{ $item->id  }}" class="checkbox">
                    <label for=""  class="pb-2 pr-2">{{ $item->service }}</label>
                </div>
            @endforeach

        </div>
            <br>
            <button type="submit" class="btn edit-submit-cstmbtn">Update</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection

@push('scripts')

@if ($errors->any())
@foreach ($errors->all() as $error)
    <script>toastr.error('{{ $error }}')</script>
@endforeach
@endif

@if (Session::has('user_updated'))
    <script>swal('User Profile','{{ Session::get('user_updated') }}','success')</script>
@endif

@if (Session::has('user_error'))
    <script>swal('User Profile','{{ Session::get('user_error') }}','success')</script>
@endif

@endpush
@push('scripts')
<script type="text/javascript">
    document.getElementById('phone12').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
</script>
<script>
    $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
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
@endpush
