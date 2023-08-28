@extends('frontend.layouts.master')
@section('title','Inner-Blogs')
@section('content')

    <!-- Start Header -->

    <header class="browseSecurityHeaderImage"  style="background-image: url('{{(!empty($banners->image)) ? asset('storage/uploads/cms/'.$banners->image):asset('storage/uploads/No-gallery.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                     <div class="innerBlogHeaderHeading">
                        <h2>{{ $blogdetails->groom }}</h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
     </header>

    <!-- End Header -->

    <!-- Start Inner Blog -->

    <section class="innerBlog">
        <div class="container">
        <div class="row">
            <div class="col-lg-12 wow animate__animated animate__bounceIn" data-wow-duration="1.6s">
                <div class="innerBlogText">
                    <p>{!! $blogdetails->content !!}</p>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- End Inner Blog -->



    @endsection

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @endsection
