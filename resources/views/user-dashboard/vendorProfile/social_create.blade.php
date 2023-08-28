@extends('user-dashboard.layouts.master')
@section('content')
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

</style>
    <div class="for-content-tabs">
        <h2 class="top-tabt-heading">Update Social Media</h2>
        <br><br>

        <form action="{{ route("vendor_social_store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="inputName">Social Type</label>
                    <select name="type" class="form-select" size="1">
                        <option selected disabled>Select type</option>
                        <option value="1">Facebook</option>
                        <option value="2">Instagram</option>
                        <option value="3">Twitter</option>
                        <option value="4">Youtube</option>
                     </select>

            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlInput10">Social Links.*</label>
                <input name="social_media" class="form-control btn-square"  type="text" placeholder="Social Links">
            </div>
            </div>
            <br>
            <button type="submit" class="btn edit-submit-cstmbtn">create</button>
        </form>
    </div>

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
@endpush
