

@extends('layouts.authentication.master')
@section('title', 'Login')

@section('content')
<style>
    div.login-card .login-main .theme-form h4 {
    color: #fff;
}
div.login-card .login-main .theme-form label {
    font-size: 14px;
    color: #fff;
}
button.logInButton {
    background-color: #00264d !important;
    border-color: #00264d !important;
    color: #ffffff;
}
.loginCard .loginMain {
    border-radius: 10px;
    background: linear-gradient(180deg, #00264d, #00264d, #000000eb);
}

.login-card .login-main .theme-form p {
    color: #fff !important;
}


</style>
<div class="container-fluid p-0">
    <div class="row m-0">
       <div class="col-12 p-0">
          <div class="login-card loginCard">
             <div>

        <div class="login-main loginMain">
            {{-- @if(Session::has('message'))
            <p class="alert
            {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('message') }}</p>
            @endif --}}
        <form class="theme-form" method="POST" action="{{ route('login') }}">
            @csrf
            {{-- <div><a class="logo" href="{{ route('login') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div> --}}
            <h4 class="align-center">Guard Hire</h4>
            {{-- <h7>Login to account</h7> --}}
                     <p>Enter your email & password to login</p>
            <!-- Email Address -->

            <div class="form-group">
                <label class="col-form-label">Email Address</label>
                <input class="form-control" type="email" id="email" name="email"  placeholder="Test@gmail.com">
                @error('email')
                <p class="help-block" style="color: red">
                    {{ $errors->first('email') }}
                </p>
                @enderror
             </div>

            <!-- Password -->
            <div class="form-group">
                <label class="col-form-label">Password</label>
                <input class="form-control" type="password" id="password" name="password"  placeholder="*********">
                @error('password')
                <p class="help-block" style="color: red">
                    {{ $errors->first('password') }}
                </p>
                @enderror
             </div>

            <!-- Remember Me -->
            <div class="form-group mb-0">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                @if (Route::has('register'))

                {{-- <p class="mt-4 mb-0">Don't have an account?<a class="ms-2" href="{{ route('register') }}">register</a></p> --}}
            @endif
            <button class="btn btn-primary btn-block logInButton" type="submit">Log In</button>

            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection

