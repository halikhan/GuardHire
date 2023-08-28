@extends('user-dashboard.layouts.master')
@section('content')
<?php
$getservice = new App\Models\service;
$getvendor = new App\Models\User;
// dd($getvendor);
?>
<style>

.edit-submit-cstmbtn {
        margin-top: 2rem;
        margin-top: 2rem;
        background-color: #d82e6b;
    font-family: "Solway-Bold";
    font-weight: 600;
    color: #ffffff;
        border-radius: 12px;
        padding: 8px 16px;
        font-size: 16px;
    }

    .edit-submit-cstmbtn:hover {
        margin-top: 2rem;
        background-color: #d82e6b;
        font-family: "Solway-Bold";
        font-weight: 600;
        color: #ffffff;
    }
        .top-tabt-heading {
            color: #d82e6b;
            font-size: 58px;
            font-family: "JA-Hand-Reg";
        }


.mySlides {display: none}
img {
    vertical-align: middle;

}

/* Slideshow container */
.slideshow-container {
  max-width: 600px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
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
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
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

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
    <div class="for-content-tabs">
        <h2 class="top-tabt-heading">Wedding Details</h2>
        <br><br>
        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="slideshow-container">
                    @if ($getUserWeddingimages)
                    @foreach(json_decode($getUserWeddingimages->image) as $image)
                    <div class="mySlides">
                        <img src="{{ asset('storage/uploads/cms/'.$image)}}" width="300px;" height="200px;">
                    </div>
                    @endforeach
                    @else
                        <div class="mySlides">
                            <img src="{{ (!empty($image))?
                                asset('storage/uploads/cms/'.$image):asset('storage/uploads/No-gallery.png') }}">
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
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput10">Groom Name.*</label>
                    <input name="groom" value="{{ $edit_data->groom }}"class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Groom">
                </div>

                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput10">Groom Last Name.*</label>
                    <input name="groom_last_name" value="{{ $edit_data->groom_last_name }}"class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Groom Last Name" readonly>
                </div>
            </div>
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput10">Bride Name.*</label>
                    <input name="bride" value="{{ $edit_data->bride }}"class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Bride" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput10">Bride Last Name.*</label>
                    <input name="bride_last_name" value="{{ $edit_data->bride_last_name }}"class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="Bride Last Name" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput10">Location.*</label>
                                <input name="location" value="{{ $edit_data->location }}"class="form-control btn-square" id="exampleFormControlInput10" type="text" placeholder="location" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput10">Wedding Date.*</label>
                    <input name="date" value="{{ $edit_data->date }}"class="form-control btn-square" id="exampleFormControlInput10" type="date" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput10">Services.*</label>
                    @foreach(json_decode($edit_data->service  ?? '') as $service)
                    @php
                       $data = $getservice->findOrFail($service);
                    @endphp
                    <input name="date" value="{{ $data->service }}" class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
                    @endforeach
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput10">Vendors.*</label>
                    @foreach(json_decode($edit_data->vendor  ?? '') as $vendor)
                    @php
                         $dataVendor = $getvendor->findOrFail($vendor);
                    @endphp
                    <input name="date" value="{{ $dataVendor->name }}" class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
                    @endforeach
                </div>
                <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea14">Description</label>
                <textarea name="content" class="ckeditor form-control btn-square" id="exampleFormControlTextarea14" rows="3" readonly>{!! strip_tags($edit_data->content) !!}</textarea>
                </div>
            </div>
            <br>

        </form>
    </div>
@endsection

@push('scripts')
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
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
    }
    </script>
@if ($errors->any())
@foreach ($errors->all() as $error)
    <script>toastr.error('{{ $error }}')</script>
@endforeach
@endif

@if (Session::has('user_updated'))
    <script>swal('User Profile','{{ Session::get('user_updated') }}','success')</script>
@endif

@if (Session::has('user_error'))
    <script>swal('User Profile','{{ Session::get('user_error') }}','success')</script>
@endif

@endpush
