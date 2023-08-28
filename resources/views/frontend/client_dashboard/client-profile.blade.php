<?php
$getclientTagsData = new App\Models\Tag();
$getclientLanData = new App\Models\Language();
// dd($getlocation);
?>

<form action="{{ route('client.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12">

            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload">
                        <i class="fas fa-edit"></i>
                    </label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview"
                        style="background-image: url('{{ !empty(Auth::user()->image) ? asset('storage/uploads/cms/' . Auth::user()->image) : asset('storage/uploads/No-image.jpg') }}')">
                    </div>
                </div>
            </div>
            <div class="profileName">
                <h3>{{ Auth::user()->name ?? '' }} </h3>
            </div>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="profileField">
                <label>First Name</label>
                <input name="name" type="text" class="inputName" placeholder="First Name"
                    value="{{ Auth::user()->name ?? '' }}">
                <label>Phone Number</label>
                <input name="contact" type="text" min="0" class="inputName"
                    placeholder="Phone Number"value="{{ Auth::user()->contact ?? '' }}">
                <label>Location</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="location"
                        name="userlocation">
                        <option selected="" disabled>Location</option>
                        @foreach ($getlocation as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == optional(Auth::user())->userlocation ? 'selected' : '' }}>
                                {{ $value->location }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <label class="label">Language.</label>
                <div class="multipleSelect">
                    <select id="locationSetsOne" multiple="multiple" placeholder="Language" style="width: 23.2rem"
                        name="languages[]">
                        @foreach ($getLanguage as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == optional(Auth::user())->language_id ? 'selected' : '' }}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if (!empty(Auth::user()->language_id))
                    @php
                        $data = $getclientLanData->whereIn('id', json_decode(Auth::user()->language_id ?? ''))->get();
                        //  dd($data);
                    @endphp
                    <input name="date" value="@foreach ($data as $items){{ $items->name ?? '' }} | @endforeach"
                        class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
                @else
                    <input name="date" value="No language available" class="form-control btn-square"
                        id="exampleFormControlInput10" type="text" readonly>
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="profileField">
                <label>Last Name</label>
                <input name="last_name" type="text" class="inputName"
                    placeholder="Last Name"value="{{ Auth::user()->last_name ?? '' }}">
                <label>Email</label>
                <input name="email" type="email" class="inputName"
                    placeholder="Email"value="{{ Auth::user()->email ?? '' }}" readonly>
                <label>Services</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="services" name="services"
                        required>
                        <option selected disabled>Services</option>
                        @foreach ($getservice as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == optional(Auth::user())->services ? 'selected' : '' }}>
                                {{ $value->service }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <label class="label">Tags.</label>
                <div class="multipleSelect selectize-control multi plugin-remove_button">
                    <select id="locationSets" multiple="multiple" placeholder="Tags" style="width: 23.2rem"
                        name="tags[]">
                        @foreach ($getTags as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == optional(Auth::user())->tag_id ? 'selected' : '' }}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @if (!empty(Auth::user()->tag_id))
                    @php
                        $data = $getclientTagsData->whereIn('id', json_decode(Auth::user()->tag_id ?? ''))->get();
                        //  dd($data);
                    @endphp
                    <input name="oldtags" value="@foreach ($data as $items){{ $items->name ?? '' }} | @endforeach"
                        class="form-control btn-square" id="exampleFormControlInput10" type="text" readonly>
                @else
                    <input name="date" value="No tags available" class="form-control btn-square"
                        id="exampleFormControlInput10" type="text" readonly>
                @endif

            </div>
        </div>

        <div class="offset-lg-3 offset-md-3 col-lg-8 col-md-12 col-sm-12">
            <div class="profileField">
                <label>Description</label>
                <textarea name="description" type="text" class="inputMessage" placeholder="Type Here...">{{ Auth::user()->description ?? '' }}</textarea>
                <div class="sendBtn">
                    <button type="submit" class="sendButton">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
