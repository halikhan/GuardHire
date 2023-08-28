@extends('website.layout.master')
@section('title','South-Dakota-Bride | Forget-Password')
@section('content')
<body class="body">
<section class="forget-password-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 pt-4 mx-auto">
             <h1 class="forget-password-text pt-5 text wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">forget password</h1>
             <form method="POST" action="{{route('update_password')}}">
                @csrf
             <div class="col-lg-8 mb-4 mt-5 mx-auto pt-3  wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <input type="hidden" name="token" value="{{ $token }}">
                 <input class="Artical-input" type="email" name="email" placeholder="Email">

              </div>
              <div class="col-lg-8 mb-4 mt-5 mx-auto pt-3  wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <input class="Artical-input" type="password" name="password" placeholder="Password">

             </div>
             <div class="col-lg-8 mb-4 mt-5 mx-auto pt-3  wow  animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <input class="Artical-input" type="password" name="password_confirmation" placeholder="Confirm Password">

             </div>
              <div class="col-lg-8 mx-auto mt-5 text-center">
                 <button type="submit" class="change-pwd wow  animated bounceIn">Update</button>
              </div>
             </form>
            </div>
        </div>
    </div>
</section>
</body>
@endsection
