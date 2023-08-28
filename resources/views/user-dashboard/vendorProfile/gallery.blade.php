@extends('user-dashboard.layouts.master')
@section('content')
    <style>
        .close-img {
            position: relative;
            width: 120px;
            height: 80px;
            margin-right: 1rem;
            margin-bottom: 1rem;
        }
        .close-img img{
            object-fit: contain;
        }

        .close-img .close-img-btn {
            position: absolute;
            background: transparent;
            right: -4px;
            top: -4px;
            border: none;
            outline: none;
        }

        .close-img .close-img-btn i {
            background: #d82e6b;
            padding: 3px 6px;
            font-size: 14px;
            font-weight: 900;
            color: #fff;
            border-radius: 50px;
        }

        .edit-submit-cstmbtn {
            margin-top: 2rem;
            background-color: #6ED6D3;
            font-family: "Solway-Bold";
            font-weight: 600;
            color: #d82e6b;
            border-radius: 12px;
            padding: 8px 16px;
            font-size: 16px;
        }

        .edit-submit-cstmbtn:hover {
            margin-top: 2rem;
            background-color: #6ED6D3;
            font-family: "Solway-Bold";
            font-weight: 600;
            color: #d82e6b;
        }

        .top-tabt-heading {
            color: #d82e6b;
            font-size: 58px;
            font-family: "JA-Hand-Reg";
        }

        .mySlides {
            display: none
        }

        img {
            vertical-align: middle;

        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 100%;

            position: relative;
            margin: auto;
        }

        .mySlides {
            height: 400px;
        }

        .mySlides img {
            object-fit: contain;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {

            .prev,
            .next,
            .text {
                font-size: 11px
            }
        }

        .pink-submit-cstmbtn {
            margin-top: 2rem;
            background-color: #d82e6b;
            font-family: "Solway-Bold";
            font-weight: 600;
            color: #ffffff;
            border-radius: 12px;
            padding: 8px 16px;
            font-size: 16px;
        }

        .image_container {
            height: 60px;
            width: 100px;
            border-radius: 6px;
            overflow: hidden;
            margin: 10px;
            color: #d82e6b;
        }

        .image_container img {
            height: 100%;
            width: auto;
            object-fit: cover;
        }

        .image_container span {
            top: -14px;
            right: 3px;
            color: red;
            font-size: 26px;
            font-weight: 700;
            cursor: pointer;
        }

        .mutipleimages {
            color: red;
            font-size: 11px;
        }
    </style>
    <div class="for-content-tabs">
        <h2 class="top-tabt-heading">Vendor Gallery</h2>
        <br><br>
        <div class="row">
            <div class="slideshow-container">
                @if ($getvendorimages)
                    @php $wedding_id = $getvendorimages->id; @endphp
                    @foreach (json_decode($getvendorimages->image) as $key => $image)
                        <div class="mySlides">
                            <img src="{{ asset('storage/uploads/cms/' . $image) }}"
                                class="delete-image display_none_{{ $key }}" data-wedding="{{ $wedding_id }}"
                                data-key="{{ $key }}" width="300px;" height="200px;">
                        </div>
                    @endforeach
                @else
                    <div class="mySlides">
                        <img
                            src="{{ !empty($image) ? asset('storage/uploads/cms/' . $image) : asset('storage/uploads/No-gallery.png') }}">
                    </div>
                @endif
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
<br>
        <form action="{{ route('vendor_gallery_update', ['id' => Auth::id()]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="container mt-3 w-100">
                <div class="card shadow-sm w-100">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inputImage">Vendor Images.*</label>
                            <h6 class="mutipleimages">Please select multiple images at once.*</h6>

                            <input type="file" name="wedding_image[]" style="width: 100%;" id="wedding_images" multiple
                                onchange="image_select()">
                            <input type="hidden" name="old_wedding_image"
                                value="{{ $getvendorimages->image ?? '' }}"class="myfrm form-control" multiple>

                        </div>
                        {{-- new work --}}
                        <div class="d-flex flex-wrap">
                            <input type="hidden" name="wedd-img" id="del-img">
                            @if (!empty($getvendorimages->image ?? ''))
                                @php $wedding_id = $getvendorimages->id; @endphp
                                @foreach (json_decode($getvendorimages->image) as $key => $image)
                                    <div class="close-img display_none_{{ $key }}">

                                        <img src="{{ asset('storage/uploads/cms/' . $image) }}" alt="image"
                                            class="delete-image ">
                                        <button type="button"
                                            class="deleteImage close-img-btn display_none_{{ $key }}"
                                            data-wedding="{{ $wedding_id }}" id="del-image{{ $getvendorimages->id }}"
                                            data-key="{{ $key }}" data-id="{{ $getvendorimages->id }}"
                                            data-src="{{ $image }}"><i class="fa fa-times"
                                                aria-hidden="true"></i></button>
                                    </div>
                                @endforeach
                            @else
                                <img src="{{ !empty($getvendorimages->image ?? '')
                                    ? asset('storage/uploads/cms/' . $getvendorimages->image)
                                    : asset('storage/uploads/No-image.jpg') }}"
                                    style="width:80px; height:80px;">
                            @endif

                        </div>
                        {{-- new work --}}
                    </div>
                    <div class=" d-flex flex-wrap justify-content-start" id="wedding_Multiple_Images">

                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn pink-submit-cstmbtn">Update</button>
        </form>
    </div>
@endsection

@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        var images = [];

        function image_select() {

            var image = document.getElementById('wedding_images').files;
            if (image.length > 10) {
                $('#wedding_images').val("");
                toastr.error('You can upload only 10 images!');
                location.reload();
                return false;

            }
            for (i = 0; i < image.length; i++) {

                images.push({

                    "name": image[i].name,
                    "url": URL.createObjectURL(image[i]),
                    "file": image[i],
                })
            }

            document.getElementById('wedding_Multiple_Images').innerHTML = image_show();
        }

        function image_show() {
            var image = "";

            // var imgCount = document.images.length;
            if (images.length < 11) {

                images.forEach((i) => {
                    console.log(images.length);
                    image += `<div class="image_container d-flex justify-content-center position-relative">
              <img src="` + i.url + `" alt="Image">
              <span class="position-absolute" onclick="delete_image(` + images.indexOf(i) + `)">&times;</span>
          </div>`;

                });
                return image;

            } else {
                // var images.length = "";
                toastr.error('Please select 10 images at once!');
                $('#wedding_images').val("");
                location.reload();
                return null;
            }


        }

        function delete_image(e) {
            images.splice(e, 1);
            document.getElementById('wedding_Multiple_Images').innerHTML = image_show();
            const dt = new DataTransfer()
            const input = document.getElementById('wedding_images')
            const {
                files
            } = input

            for (let i = 0; i < files.length; i++) {
                const file = files[i]
                if (e !== i)
                    dt.items.add(file);
            }

            input.files = dt.files;
            console.log(document.getElementById('wedding_images').files);
        }
    </script>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}')
            </script>
        @endforeach
    @endif

    @if (Session::has('user_updated'))
        <script>
            swal('User Profile', '{{ Session::get('user_updated') }}', 'success')
        </script>
    @endif

    @if (Session::has('user_error'))
        <script>
            swal('User Profile', '{{ Session::get('user_error') }}', 'success')
        </script>
    @endif


    <script>
        $(document).ready(function() {


            $('.deleteImage').on('click', function(event) {

                let id = $(this).attr("data-id");
                let img = $(this).attr("data-src");
                let key = $(this).attr("data-key");
                let wedding_id = $(this).attr("data-wedding")
                // console.log(id+"--------"+img)
                // alert(id);
                // var id  = $("#del-img").val(data);
                // alert(append);
                // alert('image clicked');
                $.ajax({
                    type: "GET",
                    url: "{{ route('delete-vendor-img') }}",
                    data: {
                        img: img,
                        id: id,
                        wedding_id: wedding_id
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            location.reload(true);
                            $(".display_none_" + key).addClass("display_none");
                            toastr.success(res.msg)

                        }
                    }
                });
            });
        });
    </script>
@endpush
