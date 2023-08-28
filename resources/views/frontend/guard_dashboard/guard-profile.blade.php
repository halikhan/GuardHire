<?php
$getguardtagsData = new App\Models\Tag();
$getguardLanData = new App\Models\Language();
// $getguardtagsData = App\Models\Tag::all();
// $getguardLanData = App\Models\Language::all();

// Now you can use $getguardtagsData and $getguardLanData to access the data retrieved from the database

// dd($getguardtagsData);
?>

<form action="{{ route('guard.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row">
    <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="avatar-upload">
            <div class="avatar-edit">
                <input name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                <input name="old_image" type="hidden" class="inputName" value="{{ Auth::user()->image ?? '' }}">
                <label for="imageUpload">
                    <i class="fas fa-edit"></i>
                </label>
            </div>
            <div class="avatar-preview">
                <div id="imagePreview"
                    style="background-image: url('{{(!empty(Auth::user()->image)) ? asset('storage/uploads/cms/'. Auth::user()->image):asset('storage/uploads/No-image.jpg') }}')">
                </div>
            </div>
        </div>
        <div class="profileName">
            <h3>{{ Auth::user()->name ?? '' }} </h3>
        </div>
        <div class="sloganText">
            <p>{{ Auth::user()->slogan ?? '' }}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="profileField">
            <label>First Name.*</label>
            <input name="name" type="text" class="inputName" placeholder="First Name" value="{{ Auth::user()->name ?? '' }}">
            <label>Phone Number .*</label>
            <input id="usercontact" class="inputName" data-wow-delay="0.30s" type="tel"
            name="contact" maxlength="14" value="{{ Auth::user()->contact ?? '' }}"
           pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
            {{-- <input name="contact" type="number" min="0" class="inputName"
                placeholder="Phone Number"value="{{ Auth::user()->contact ?? '' }}"> --}}
            <label>Location.*</label>
            <div class="select">
                <select class="serviceDropdown" aria-label="Default select example"
                    id="location" name="userlocation" required>
                    <option selected="" disabled>Location</option>
                    {{-- @dd(Auth::user()->userlocation) --}}
                    @foreach ($getlocation as $value)
                        <option value="{{ $value->id }}"
                            {{ $value->id == Auth::user()->userlocation ? 'selected' : '' }}>
                            {{ $value->location }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <input name="userlocation" type="text" class="inputName" placeholder="Location"value="{{ Auth::user()->userlocation ?? '' }}"> --}}
            <label>License No.*</label>
            <input name="license_no" type="text" class="inputName" placeholder="License No"value="{{ Auth::user()->license_no ?? '' }}">
            <label class="label">Tags.</label>
            <div multi plugin-remove_buttonv class="multipleSelect" style="width:80%">
                <select id="locationSets" multiple="multiple" placeholder="Tags"
                    style="width: 23.2rem" name="tags[]">
                    @foreach ($getTags as $value)
                    <option value="{{ $value->id }}" {{ $value->id == Auth::user()->tag_id ? 'selected' : '' }}>{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            @if (!empty(Auth::user()->tag_id))
            @php
                $data = $getguardtagsData->whereIn('id', json_decode(Auth::user()->tag_id ??''))->get();
                //  dd($data);
            @endphp
                    <input name="oldtags"
                    value="@foreach ($data as $items){{ $items->name ?? '' }} | @endforeach"
                    class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
            @else
            <input name="date" value="No tags available" class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
            @endif
            <label>Starting Rate.*</label>
            <input name="starting_rate" type="number" class="inputName" placeholder="Starting Rate"
            value="{{ Auth::user()->starting_rate ?? '' }}">

            {{-- @if (!empty($userTag))
            @foreach($userTag as $tag)
                <span>{{ $tag->guard_tags_details->name }} |</span>
            @endforeach
            @else
            <span>no tags vailable</span>
            @endif --}}

        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="profileField">
            <label>Last Name.*</label>
            <input name="last_name" type="text" class="inputName" placeholder="Last Name"value="{{ Auth::user()->last_name ?? '' }}">
            <label>Email.*</label>
            <input name="email" type="email" class="inputName" placeholder="Email"value="{{ Auth::user()->email ?? '' }}" readonly>
            <label>Slogan</label>
            <input name="slogan" type="text" class="inputName" placeholder="Slogan" value="{{ Auth::user()->slogan ?? '' }}">
            <label>Company Name.*</label>
            <input name="companyname" type="text" class="inputName" placeholder="Company Name"
            value="{{ Auth::user()->companyname ?? '' }}">
            <label class="label">Language.</label>
            <div class="multipleSelect">
                <select id="locationSetsOne" multiple="multiple" placeholder="Language"
                    style="width: 23.2rem" name="languages[]">
                    @foreach ($getLanguage as $value)
                    <option value="{{ $value->id }}" {{ $value->id == Auth::user()->language_id ? 'selected' : '' }}>{{ $value->name }}</option>
                    @endforeach
                    {{-- @foreach ($getLanguage as $value)
                    @foreach ($userLanguage as $mylang)
                        <option value="{{ $value->id }}"
                            {{ $value->id == json_decode(Auth::user()->language_id ??'') ? 'selected' : '' }}>
                            {{ $value->name }}</option>
                    @endforeach
                @endforeach --}}
                </select>
            </div>
            @if (!empty(Auth::user()->language_id))
            @php
                $data = $getguardLanData->whereIn('id', json_decode(Auth::user()->language_id ??''))->get();
                //  dd($data);
            @endphp
            <input name="date"
            value="@foreach ($data as $items){{ $items->name ?? '' }} | @endforeach"
            class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
            @else
            <input name="date" value="No language available" class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
            @endif
        </div>
    </div>
    <div class="offset-lg-3 offset-md-3 col-lg-8 col-md-12 col-sm-12">
        <div class="profileField">
            <label>Description.*</label>
            <textarea name="description" type="text" class="inputMessage" placeholder="Type Here...">{{ Auth::user()->description ?? '' }}</textarea>
            <div class="sendBtn">
                <button type="submit" class="sendButton">Update</button>
            </div>
        </div>
    </div>
</div>
</form>

 {{-- =========== this is user portfolio  data =========== --}}

            @include('frontend.guard_dashboard.guard-portfolio')

 {{-- =========== this is user portfolio  data =========== --}}


<script type="text/javascript">
    document.getElementById('usercontact').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
    document.getElementById('phone13').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
</script>
