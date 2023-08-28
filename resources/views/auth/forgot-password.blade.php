@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('content')

<?php
$logo_add = App\Models\LogoManager::where('title','logo')->first();

// dd($logo_add);
?>
<div class="container-fluid p-0">
    <div class="row m-0">
       <div class="col-12 p-0">
          <div class="login-card">
             <div>

        <div class="login-main">
        <form class="theme-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div><a class="logo" href="{{ route('login') }}"><img class="img-fluid for-light" src="{{ (!empty($logo_add->image))?
                asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}" alt="looginpage" style="width:120px; height:100px;"><img class="img-fluid for-dark" src="{{ (!empty($logo_add->image))?
                asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}" alt="looginpage"></a></div>

            <h4>Reset Your Password</h4>
            <div class="form-group">
                <label class="col-form-label">Email Address</label>
                <input class="form-control" type="email" id="email" :value="old('email')"  name="email" required="" placeholder="Test@gmail.com">
             </div>
             <button class="btn btn-primary btn-block" type="submit">Email Password Reset Link</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
@section('script')
@endsection
