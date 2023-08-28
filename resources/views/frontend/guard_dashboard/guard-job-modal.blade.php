<form action="{{ route('guard.job.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="profileField">
                <input name="guardjob_id" type="hidden" value="{{ $guardJob->id ?? '' }}">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <label>Job Description</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="job_type"
                        name="job_type" required>
                        <option disabled selected>Select Job</option>
                        @foreach ($getGuardType as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == @$guardJob->job_type ? 'selected' : '' }}>
                                {{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <label>Location</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="location"
                        name="location" required>
                        <option disabled selected>Location</option>
                        @foreach ($getlocation as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == $guardJob->location_id ? 'selected' : '' }}>
                                {{ $value->location }}</option>
                        @endforeach
                    </select>
                </div>
                <label>Services</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="serviceName"
                        name="services" required>
                        <option selected disabled>Services</option>
                        @foreach ($getservice as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == $guardJob->services ? 'selected' : '' }}>
                                {{ $value->service }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="label">Language</label>
                <div class="multipleSelect">
                    <select id="editlocationSets" multiple="multiple" placeholder="Language" style="width: 23.2rem" name="languages[]" required>
                        @foreach ($getLanguage as $value)
                            <option value="{{ $value->id }}" {{ in_array($value->id, $userLanguage->pluck('language_id')->toArray()) ? 'selected' : '' }}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="profileField">
                <label>Company Name</label>
                <input name="companyname" type="text" class="inputName" value="{{ Auth::user()->companyname }}" readonly>

                <label>Job Duration</label>
                {{-- <select class="serviceDropdown" aria-label="Default select example" id="job_duration" name="job_duration" required>
                      <option value="recurring">Recurring</option>
                      <option value="onetime">One Time</option>
                </select> --}}
                <select class="serviceDropdown" aria-label="Default select example" id="job_duration" name="job_duration">
                    @for ($i = 1; $i <= 12; $i++)
                      <option value="{{ $i }} Month" {{ $i == $guardJob->job_duration ? 'selected' : '' }}>
                        {{ $i }} Month{{ $i > 1 ? 's' : '' }}
                      </option>
                    @endfor
                </select>
                <label>Per Hour Rate</label>
                <input type="text" class="inputName" placeholder="Per Hour Rate" id="per_hour_rate"
                    name="per_hour_rate" value="{{ $guardJob->per_hour_rate }}">
                <label class="label">Tags</label>
                <div class="multipleSelect">
                    <select id="locationSetsOneedit" multiple="multiple" placeholder="Tags" style="width: 23.2rem" name="tags[]" required>
                        @foreach ($getTags as $value)
                            <option value="{{ $value->id }}" {{ in_array($value->id, $userTag->pluck('tag_id')->toArray()) ? 'selected' : '' }}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php
        $userJobsImage = App\Models\ImageGallery::where('user_id', Auth::id())
            ->where('guard_job_id', $guardJob->id)
            ->get();
        ?>
        @foreach ($userJobsImage as $value)
            <div class="col-lg-2 col-md-3 col-sm-3">
                <div class="container containerOne">
                    <div class="card" style="width:100px; height:100px;">
                        <div class="card-image">
                            <a href="#" data-fancybox="gallery{{ $value->image }}">
                                <img src="{{ !empty($value->image) ? asset('storage/uploads/cms/' . $value->image) : asset('storage/uploads/No-image.jpg') }}"
                                    alt="Image Gallery" style="width:100px; height:100px;">
                            </a>
                        </div>
                        <div class="hoverClose">
                            <div class="hoverCloseIcon">
                                <a id="delete" href="{{ route('guard.jobimage.delete', $value->id) }}"><i
                                        class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-md-12">
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <input name="jobimage[]" id="imagesupport" multiple class="form-control" type="file">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="profileField">
                <label>Description</label>
                <textarea name="description" type="text" class="inputMessage" placeholder="Type Here...">{{ $guardJob->description }}</textarea>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="addJobButton">Update</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#editlocationSets, #locationSetsOneedit').selectize({
            plugins: ['remove_button']
        });
    });


</script>
