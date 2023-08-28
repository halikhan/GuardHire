@extends('frontend.layouts.master')
@section('title','Blogs')
@section('content')

    <!-- Start Header -->

  <header class="blogHeaderImage"  style="background-image: url('{{(!empty($banners->image)) ? asset('storage/uploads/cms/'.$banners->image):asset('storage/uploads/No-gallery.jpg') }}')">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                     <div class="blogHeaderHeading">
                        <h2>{{ $sectionBlogs->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <!-- End Header -->


  <!-- Start Blogs -->

  <section class="featured">
          <div class="container">
           <div class="howItWorksHeading">
             <span class="strokeText">{{ $sectionBlogs->title }}</span>
             <h3>{{ $sectionBlogs->title }}</h3>
           </div>


           <div class="row">
            @foreach ($blogsection as $value )
            <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
              <div class="blogCard">
                <a href="{{ route('inner.blog',$value->slug) }}">
                    {{-- <a href="{{ route('inner.blog',$value->slug) }}"> --}}
                <div class="securityCardImage">
                    <img src="{{ (!empty($value->image))?
                        asset('storage/uploads/cms/'.$value->image):asset('storage/uploads/No-image.jpg') }}">
                </div>
                <div class="securityCardDetail">
                    <div class="blogCardHeading">
                        <h5>{{$value->groom}}</h5>
                            <p>{!! Str::limit($value->content, 100) ?? null !!}
                          </p>
                          </div>
                </div>
              </a>
              </div>
             </div>
             @endforeach

             {{-- <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
              <div class="blogCard">
              <a href="{{ route('inner.blog') }}">
                <div class="securityCardImage">
                  <img src="{{ asset('frontend/assets/images/securityTwo.png') }}" alt="">
                </div>
                <div class="securityCardDetail">
                  <div class="blogCardHeading">
                  <h5>Neighborhood Service Center
                    Director</h5>
                      <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis undesieu omnis iste natus error</p>
                    </div>
                </div>
              </a>
              </div>
             </div>
             <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
              <div class="blogCard">
              <a href="{{ route('inner.blog') }}">
                <div class="securityCardImage">
                  <img src="{{ asset('frontend/assets/images/securityCompanyOne.png') }}" alt="">
                </div>
                <div class="securityCardDetail">
                  <div class="blogCardHeading">
                  <h5>Certified Abuse and Drug Addiction
                    Counselor</h5>
                      <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis undesieu omnis iste natus error</p>
                    </div>
                </div>
              </a>
              </div>
             </div>
             <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
              <div class="blogCard">
              <a href="{{ route('inner.blog') }}">
                <div class="securityCardImage">
                  <img src="{{ asset('frontend/assets/images/securityCompanyThree.png') }}" alt="">
                </div>
                <div class="securityCardDetail">
                  <div class="blogCardHeading">
                  <h5>Who Else Wants To Be Successful
                    With Business</h5>
                      <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis undesieu omnis iste natus error</p>
                    </div>
                </div>
              </a>
              </div>
             </div>
             <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
              <div class="blogCard">
              <a href="{{ route('inner.blog') }}">
                <div class="securityCardImage">
                  <img src="{{ asset('frontend/assets/images/securityTwo.png') }}" alt="">
                </div>
                <div class="securityCardDetail">
                  <div class="blogCardHeading">
                  <h5>Neighborhood Service Center
                    Director</h5>
                      <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis undesieu omnis iste natus error</p>
                    </div>
                </div>
              </a>
              </div>
             </div>
             <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
              <div class="blogCard">
              <a href="{{ route('inner.blog') }}">
                <div class="securityCardImage">
                  <img src="{{ asset('frontend/assets/images/securityCompanyOne.png') }}" alt="">
                </div>
                <div class="securityCardDetail">
                  <div class="blogCardHeading">
                  <h5>Certified Abuse and Drug Addiction
                    Counselor</h5>
                      <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis undesieu omnis iste natus error</p>
                    </div>
                </div>
              </a>
              </div>
             </div>
             <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
              <div class="blogCard">
              <a href="{{ route('inner.blog') }}">
                <div class="securityCardImage">
                  <img src="{{ asset('frontend/assets/images/securityCompanyThree.png') }}" alt="">
                </div>
                <div class="securityCardDetail">
                  <div class="blogCardHeading">
                  <h5>Who Else Wants To Be Successful
                    With Business</h5>
                      <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis undesieu omnis iste natus error</p>
                    </div>
                </div>
              </a>
              </div>
             </div>
             <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
              <div class="blogCard">
              <a href="{{ route('inner.blog') }}">
                <div class="securityCardImage">
                  <img src="{{ asset('frontend/assets/images/securityTwo.png') }}" alt="">
                </div>
                <div class="securityCardDetail">
                  <div class="blogCardHeading">
                  <h5>Neighborhood Service Center
                    Director</h5>
                      <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis undesieu omnis iste natus error</p>
                    </div>
                </div>
              </a>
              </div>
             </div>
             <div class="col-lg-4 col-md-6 col-sm-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
              <div class="blogCard">
              <a href="{{ route('inner.blog') }}">
                <div class="securityCardImage">
                  <img src="{{ asset('frontend/assets/images/securityCompanyOne.png') }}" alt="">
                </div>
                <div class="securityCardDetail">
                  <div class="blogCardHeading">
                  <h5>Certified Abuse and Drug Addiction
                    Counselor</h5>
                      <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis undesieu omnis iste natus error</p>
                    </div>
                </div>
              </a>
              </div>
             </div> --}}

           </div>


          </div>
    </section>

    <!-- End Blogs -->


    @endsection

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @endsection

