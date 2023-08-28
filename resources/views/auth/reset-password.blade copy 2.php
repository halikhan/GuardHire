@extends('Frontend.Layout.master')
@section('content')
<?php
$getCopyrights = App\Models\Config::where('email_type','Copyrights')->get();

// dd($logo_add);
?>
<div class="main-div instructor-img">
    <div class="">
        <div class="top-home-section">
            @include('Frontend.Layout.body.navbar')
        </div>
            <div class="container">
                <div data-wow-delay="0.30s" class="first-section card-type-back-color">
        <form class="theme-form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="login-box box-grey-backcolor">
                <div class="login-content wow bounceIn">
                    <h2>Password Reset</h2>
                            <span>Please enter your new password</span>
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->

            {{-- :value="old('email', $request->email)" --}}
            <input type="email" name="email" id="" placeholder="Email" value="{{ $request->email}}">
            @error('email')
            <p class="help-block" style="color: red">
                {{ $errors->first('email') }}
            </p>
            @enderror
            <!-- Password -->

            <input type="password" name="password" id="password" placeholder="Password">
            @error('password')
            <p class="help-block" style="color: red">
                {{ $errors->first('password') }}
            </p>
            @enderror
            <!-- Confirm Password -->

             <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" />

            <button type="submit" class="for-button-width mt3 color-trans-button button-back-color wow bounceIn">{{ __('Reset Password') }}</button>

        </div>
    </div>
        </form>
    </div>
</div>
{{-- @include('Frontend.Layout.body.footer') --}}

<footer class="for-transparent-color mt2 for-mac-marging">
    <div class="container">
        <div class="footer">
            <div class="d-flex justify-content-between footer-mobile-styling">
                <div class="d-flex footer-social-logo">
                    <div class="footer-img"><a href="https://www.facebook.com/" target="_blank"><img
                                src="{{ asset('frontend/assets/image/1x/face.png') }}" alt=""></a>
                    </div>
                    <div class="footer-img"><a href="https://www.instagram.com/" target="_blank"><img
                                src="{{ asset('frontend/assets/image/1x/insta.png') }}" alt=""></a>
                    </div>
                    <div class="footer-img"><a href="https://www.linkedin.com/" target="_blank"><img
                                src="{{ asset('frontend/assets/image/1x/in.png') }}" alt=""></a></div>
                </div>
                @if ($getCopyrights)
                @foreach ($getCopyrights as $Copyright )
                <div class="footer-content">
                    <span>{{ $Copyright->email_one }}</span>
                    <span>Design & Development by
                        <a href="https://designprosusa.com/" target="_blank"> Design Pros
                            USA</a></span>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
</footer>
</div>
</div>

@endsection

