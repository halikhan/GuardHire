@extends('frontend.layouts.master')
@section('title','Reset Password')
@section('content')

    <!-- Start Reset Password -->
    <?php
    $logo_add = App\Models\LogoManager::where('title','logo')->first();
    // dd($logo_add);
    ?>
    <section class="reset">
        <div class="container">
            <div class="signInBox">
                <div class="signInImage">
                    <a href="{{ route('home') }}"><img src="{{ (!empty($logo_add->image))?
                        asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}" alt=""></a>
                </div>
                <form method="POST" action="{{route('forget_password_process')}}" id="regiterForm">
                    @csrf
                <div class="signInDetail">
                    <h4>Reset Password</h4>
                    <input class="searchInput" type="email" name="email" placeholder="Type Email">
                       <a href="#"><button class="signInButton resetTop" type="submit">Send Now</button></a>
                    </div>
                </form>
                </div>
        </div>
        </div>
     </section>

    <!-- End Reset Password -->

    @endsection

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @endsection
