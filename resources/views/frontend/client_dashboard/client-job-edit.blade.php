<form method="post" action="{{ route('client.post.job.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="profileField">
                <input name="clientjob_id" type="hidden" value="{{ $clientJob->id }}">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <label>Guard Type</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="job_type" name="job_type"
                        required>
                        <option selected="" disabled>Select Guard Type</option>
                        @foreach ($getGuardType as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == $clientJob->job_type ? 'selected' : '' }}>
                                {{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>

                <label>Location</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="location" name="location"
                        required>
                        {{-- <option selected="" disabled>Location</option> --}}
                        @foreach ($getlocation as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == $clientJob->location ? 'selected' : '' }}>
                                {{ $value->location }}</option>
                        @endforeach
                    </select>
                </div>

                <label>Starting Date</label>
                <input type="date" class="form-control" id="starting_date" name="starting_date"
                    value="{{ $clientJob->starting_date ?? '' }}" required>
                <label>Job Duration</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="job_duration"
                        name="job_duration" required>
                        {{-- <option selected disabled>Select Duration</option> --}}
                        <option value="recurring">Recurring</option>
                        <option value="onetime">One Time</option>
                        {{-- @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }} Month"
                                {{ $i == $clientJob->job_duration ? 'selected' : '' }}>
                                {{ $i }} Month{{ $i > 1 ? 's' : '' }}
                            </option>
                        @endfor --}}
                    </select>

                </div>
                {{-- <input type="text" class="inputName" placeholder="Job Duration" id="job_duration"
                name="job_duration" value="{{ $clientJob->job_duration }}" required> --}}

                <label class="label">Language</label>
                <div class="multipleSelect">
                    <select id="editlocationSets" multiple="multiple" placeholder="Language" style="width: 23.2rem"
                        name="languages[]">
                        @foreach ($getLanguage as $value)
                            <option value="{{ $value->id }}"
                                {{ in_array($value->id, $userLanguage->pluck('language_id')->toArray()) ? 'selected' : '' }}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>


                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="profileField">
                <label>Job Type</label>
                <div class="select">
                    <select class="serviceDropdown" aria-label="Default select example" id="serviceName" name="services"
                        required>
                        <option selected="">Services</option>
                        @foreach ($getservice as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == $clientJob->services ? 'selected' : '' }}>{{ $value->service }}
                            </option>
                            {{-- {{ $value->id == $clientJob->services ? 'selected' : '' }}>
                                    {{ $value->service }}</option> --}}
                        @endforeach
                    </select>
                </div>
                <label>Budget (Allow for a range or hourly rate)</label>
                <input type="text" class="inputName" placeholder="Budget (Allow for a range or hourly rate)"
                    id="per_hour_rate" name="per_hour_rate" value="{{ $clientJob->per_hour_rate }}"required>
                <label>Ending Date</label>
                <input type="date" class="form-control" id="ending_date" name="ending_date"
                    value="{{ $clientJob->ending_date }}">
                <label class="label">Tags</label>
                <div class="multipleSelect">
                    <select id="SetsOneedit" class="multipleSelectWidth" multiple="multiple" placeholder="Tags" style="width: 23.2rem"
                        name="tags[]">
                        @foreach ($getTags as $value)
                            <option value="{{ $value->id }}"
                                {{ in_array($value->id, $userTag->pluck('tag_id')->toArray()) ? 'selected' : '' }}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $userJobsImage = App\Models\ImageGallery::where('user_id', Auth::id())
                ->where('client_job_id', $clientJob->id)
                ->get();
            // dd($getlocation);
            ?>
            @foreach ($userJobsImage as $value)
                {{-- <div class="col-lg-3 col-md-3 col-sm-3">
         </div> --}}
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
                                    <a id="delete" href="{{ route('client.jobimage.delete', $value->id) }}"><i
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
                        {{-- <label class="col-sm-3 col-form-label">.</label> --}}
                        {{-- <label class="col-sm-3 col-form-label">Upload File</label> --}}
                        <input name="jobimage[]" id="imagesupport" multiple class="form-control" type="file">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="profileField">
                <label>Description</label>
                <textarea class="inputMessage" id="description" name="description" placeholder="Type Here..." required>{{ $clientJob->description }}</textarea>
                {{-- <label>Status</label>
            <div class="status">
                <input class="input" type="checkbox" id="toggle-btn-2">
                <label class="label" for="toggle-btn-2"></label>
            </div> --}}
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="addJobButton">Update</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        var selector = $('#editlocationSets, #SetsOneedit');
        selector.selectize({
            plugins: ['remove_button']
        });
    });
</script>
<script>
    $(".mailregister").click(function() {
        var rea = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        var Email = $("#subEmail").val();
        var x = rea.test(Email);
        if (!x) {
            // alert('Type Your valid Email');
            toastr.error('please select a tag');
            return false;
        }
    });

    function validateFm() {

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
