@extends('frontend.layouts.master')
@section('title','Sign Up')
@section('content')

    <!-- Start Sign Up -->
    <?php
    $logo_add = App\Models\LogoManager::where('title','logo')->first();
    // dd($logo_add);
    ?>

    <section class="signUp">
        <div class="container">
            <div class="signUpBox">
                <div class="signInImage">
                    <a href="{{ route('home') }}"><img src="{{ (!empty($logo_add->image))?
                        asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}" alt=""></a>
                </div>
                <form action="{{route('user.signup')}}" id="regiterForm" method="POST" class="validatedForm" enctype="multipart/form-data">
                    @csrf
                    <div class="signInDetail">
                        <h4>It's Free to Sign Up and Get Started.</h4>
                        <p>Already have account?<a href="{{ route('frontend.signin') }}">Sign In</a></p>
                        <div class="radioBox">
                            <p>I am:</p>
                            <input type="radio" id="radioOne" name="type" value="2" class="form-check-input" checked>
                             <label for="radioOne">Security Company</label>
                             &nbsp; <input type="radio" id="radioTwo" name="type" value="3" class="form-check-input">
                            <label for="radioTwo">Hiring Security Services</label>
                        </div>
                        <br>
                        {{-- <div class="inputBox"> --}}
                            <div id="securityCompanyFields">
                                <div class="dFlex">
                                <div class="inputField">
                                    <input type="text" class="searchInput" placeholder="Company Name" name="companyname" value="{{ old('companyname') }}">
                                    @error('companyname')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('companyname') }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="inputField">
                                    <input type="file" class="searchInput" placeholder="Upload Profile Image" name="image">
                                </div>
                            </div>

                            </div>
                        {{-- </div> --}}

                        <div class="inputBox">
                            <div class="inputField">
                                <input type="text" class="searchInput" placeholder="First Name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <p class="help-block" style="color: red">
                                    {{ $errors->first('name') }}
                                </p>
                                @enderror
                            </div>
                            <div class="inputField">
                                <input type="text" class="searchInput" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
                                @error('last_name')
                                <p class="help-block" style="color: red">
                                    {{ $errors->first('last_name') }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="inputBox">
                            <div class="inputField">
                                <input type="text" class="searchInput" placeholder="Type Username" name="username" value="{{ old('username') }}">
                                 @error('username')
                                <p class="help-block" style="color: red">
                                    {{ $errors->first('username') }}
                                </p>
                                @enderror
                            </div>
                            <div class="inputField">
                                <input type="tel" class="searchInput" placeholder="Phone No" name="contact" value="{{ old('contact') }}">
                                 @error('contact')
                                <p class="help-block" style="color: red">
                                    {{ $errors->first('contact') }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="inputBox">
                            <div class="inputField">
                                <input type="email" class="searchInput" placeholder="Email" name="email" value="{{ old('email ') }}">
                                 @error('email')
                                <p class="help-block" style="color: red">
                                    {{ $errors->first('email') }}
                                </p>
                                @enderror
                            </div>
                            <div class="inputField">
                                <div class="password-container">
                                    <input type="password" class="searchInput" placeholder="Password" id="password" name="password" value="{{ old('password') }}">
                                    <i class="fa fa-eye" aria-hidden="true" id="eye"></i>
                                     @error('password')
                                <p class="help-block" style="color: red">
                                    {{ $errors->first('password') }}
                                </p>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="inputBox">
                            {{-- <div class="inputField">
                                <input type="text" class="searchInput" placeholder="Location" name="userlocation" value="{{ old('userlocation') }}">
                            </div>
                           --}}

                            <div class="inputField">
                                <div class="select">
                                    <select name="userlocation" class="serviceDropdown" aria-label="Default select example">
                                        <option selected disabled>Locations</option>
                                        @foreach ($getlocation as $value)
                                        <option value="{{ $value->id }}">{{ $value->location }}</option>
                                        @endforeach
                                        {{-- <option value="2">Service Two</option>
                                        <option value="3">Service Three</option> --}}
                                    </select>
                                </div>
                                 @error('user_location')
                                <p class="help-block" style="color: red">
                                    {{ $errors->first('user_location') }}
                                </p>
                                @enderror
                            </div>
                            {{-- <div id="securityCompanyFields">
                                <div class="inputField">
                                    <input type="file" class="inputName" placeholder="Upload Profile Image" name="image">
                                </div>
                                <div class="inputField">
                                    <input type="text" class="searchInput" placeholder="Company Name" name="companyname" value="{{ old('companyname') }}">
                                    @error('companyname')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('companyname') }}
                                    </p>
                                    @enderror
                                </div>
                            </div> --}}

                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="1" name="subscribe" checked>
                            <label class="form-check-label">
                                Terms & Conditions
                            </label>
                        </div>
                        <a href="#"><button class="signInButton" type="submit">Sign Up Now</button></a>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>

<br><br><br><br>

    <!-- End Sign Up -->
    <script>
        const radioOne = document.getElementById('radioOne');
        const radioTwo = document.getElementById('radioTwo');
        const securityCompanyFields = document.getElementById('securityCompanyFields');
        // const securityCompanyFields = document.getElementById('securityCompanyFields');

        radioOne.addEventListener('change', function() {
            if (radioOne.checked) {
                securityCompanyFields.style.display = 'block';
            } else {
                securityCompanyFields.style.display = 'none';
            }
        });

        radioTwo.addEventListener('change', function() {
            if (radioTwo.checked) {
                securityCompanyFields.style.display = 'none';
            } else {
                securityCompanyFields.style.display = 'block';
            }
        });
    </script>
    @endsection

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @endsection
