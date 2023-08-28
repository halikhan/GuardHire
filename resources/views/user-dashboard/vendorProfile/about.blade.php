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
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    <div class="for-content-tabs">
        <h2 class="top-tabt-heading">About Vendor</h2>
        <br><br>

        <form action="{{ route('about_vendor_profile', ['id' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea14">About Vendor</label>
                    <textarea name="aboutvendor" class="ckeditor form-control btn-square" id="editor" rows="3">{{ $getvendorabout->aboutvendor ??''}}</textarea>
                </div>
            </div>
            <div class="row">
                    {{-- <div class="form-group col-md-12">
                        <label for="inputState">Vendor Stoplight</label>
                        <input type="text" class="form-control" name="stoplight" value="{{ $getvendorabout->stoplight ??'' }}"
                            placeholder="stoplight" >
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputImage"> Select File</label>
                        <input type="file" name="image" class="form-control" id="inputImage" placeholder="Name">
                    </div> --}}

                <div class="form-group col-md-12">
                    <label for="inputState">Vendor Reviews </label>
                    <input type="text" class="form-control" name="reviews" value="{{ $getvendorabout->reviews ?? '' }}"
                        placeholder="Vendor reviews">
                </div>

                    <div class="form-group col-md-12">
                        <label for="inputImage"> Select File</label>
                        <input type="file" name="image2" class="form-control" id="inputImage" placeholder="Name">
                    </div>

            </div>

            <br>
            <button type="submit" class="btn edit-submit-cstmbtn">Update</button>
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


<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@endpush
