@extends('frontend.layouts.master')
@section('title','Sign In')
@section('content')


    <!-- Start Sign In -->
    <?php
    $logo_add = App\Models\LogoManager::where('title','logo')->first();
    // dd($logo_add);
    ?>
    <section class="signIn">
        <div class="container">
            <div class="signInBox">
                <div class="signInImage">
                    <a href="{{ route('home') }}"><img src="{{ (!empty($logo_add->image))?
                        asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}" alt=""></a>
                </div>

                <form action="{{route('user.login')}}" id="regiterForm" method="POST" class="validatedForm">
                    @csrf
                <div class="signInDetail">
                    <h4>Sign In Now</h4>
                    <p>Don’t have an account?<a href="{{ route('frontend.signup') }}">Sign Up</a></p>
                    <input type="email" name="email" class="searchInput" placeholder="Type Your Email">
                    <div class="password-container">
                       <input type="password" name="password" class="searchInput" placeholder="Password" id="password">
                         <i class="fa fa-eye" aria-hidden="true" id="eye"></i>
                     </div>
                      {{-- <div class="form-check">
                         <input class="form-check-input" type="checkbox" value="">
                             <label class="form-check-label">
                               Keep me logged in
                             </label>
                       </div> --}}
                       <a href="#"><button class="signInButton" type="submit">Sign In Now</button></a>
                       {{-- <p><a href="{{ route('password.request') }}">Reset Password?</a></p> --}}
                            {{-- <p>
                                @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            </p> --}}
                            <p> <a href="{{route('forget-password')}}" class="a">Forgot your password?</p>


                    </div>
                </form>
                </div>
        </div>
        </div>
     </section>

    <!-- End Sign In -->

    @endsection

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @endsection

