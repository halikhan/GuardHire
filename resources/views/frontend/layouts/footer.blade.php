
<?php
// $logo_add = App\Models\LogoManager::where('title','favicon')->first();
$logo_main = App\Models\LogoManager::where('title','logo')->first();
$contact_details = App\Models\ContactManagement::first();
$copyright = App\Models\Config::where('id','1')->first();
// dd($copyright);
?>
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"  />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="footerImage">
            <a href="{{ route('home') }}"><img src="{{ (!empty($logo_main->image))?
                asset('storage/uploads/logo/'.$logo_main->image):asset('storage/uploads/No-image.jpg') }}" alt=""></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="pages">
            <div class="pageHeading">
              <h5>Pages</h5>
            </div>
            <div class="pageLinks">
              <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('how.it.works') }}">How It Works</a></li>
                <li><a href="{{ route('browse.services') }}">Browse Services</a></li>
                <li><a href="{{ route('browse.quotes') }}">Browse Requests</a></li>
                <li><a href="{{ route('browse.companies') }}">Browse Companies</a></li>
                <li><a href="{{ route('terms.conditions') }}">Terms and Conditions </a></li>
                <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('site.blogs') }}">Blog</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="contactBox">
            <div class="contactHeading">
              <h5>{{$contact_details->title}}</h5>
            </div>
            <div class="followLinks">
              <div class="contactLink d-flex">
                <div class="phoneIcon">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <div class="locationText">
                  <a href=#">
                    <p>{{$contact_details->phone_number}}</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="followLinks">
              <div class="contactLink d-flex">
                <div class="emailIcon">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="locationText">
                  <a href="#">
                    <p>{{$contact_details->email}}</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="followLinks">
              <div class="contactLinks">
                <div class="locationIcon">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="locationText">
                  <a href="http://maps.google.com/maps?={{$contact_details->location}}" target="_blank">
                    <p>{{$contact_details->location}}</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="follow">
              <div class="followHeading">
                <h5>Subscribe Our Newsletter</h5>
              </div>
              <div class="subscribeBox">


                 <form class="form theme-form register " id="regiterForm" action="{{ route("user_subcription") }}"  method="post">
                    @csrf
                    <input type="text" name="email" class="emailInput" id="subEmail" placeholder="Email Address">
                    {{-- <input class="form-control" id="subEmail" type="email" name="email" placeholder="name@service.xx"> --}}
                    {{-- <a href="#"><button class="submitButton mailregister" onClick="validateFm();">Submit</button></a> --}}
                    <a href="javascript:void(0)"><button
                        class="submitButton mailregister" onClick="validateFm();">Subscribe</button></a>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="copyRight">
      <p> {{$copyright->configuration}}<br>
        DESIGNED AND DEVELOPED BY <a href="https://designprosusa.com/" target="_blank">DESIGN PROS USA</a></p>
    </div>
    </footer>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(".mailregister").click(function(){
            var rea = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
            var Email = $("#subEmail").val();
            var x = rea.test(Email);
            if (!x) {
                // alert('Type Your valid Email');
                toastr.error('Please enter a valid email');
                return false;
            }
        });
        function validateFm(){

          $(".register").validate({
          rules: {
            email: {
            required: true,
            email: true
            // fadeOut();
            }
        }
          });
        }
        </script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
</script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break;
    }
    @endif
    </script>
