<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-12">
        <div class="addJob">
            <button class="addJobButton" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">Add
                Listing</button>
        </div>
        <table id="exampleOne" class="table table-striped dataTable" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th class="second">Company Name</th>
                    <th>Job Type</th>
                    <th>Job Duration</th>
                    <th>Location</th>
                    <th class="five">Service</th>
                    <th>Per Hour Rate</th>
                    <th>Status</th>
                    <th class="seven">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    <td>01</td>
                    <td>10</td>
                    <td>10:20 Am</td>
                    <td>$120</td>
                    <td>$320</td>
                    <td>$540</td>
                    <td><a href="#"><button class="blueActive">Active</button></a></td>
                    <td>
                        <button class="editBubtton" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModalEdit"><i
                                class="fas fa-edit"></i></button>
                        <button class="deleteButton"><i class="fas fa-trash-alt"></i></button>
                        <button class="ratingButton" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModalRating"><i class="fa fa-star"
                                aria-hidden="true"></i></button>
                    </td>
                </tr> --}}
                @foreach ($guardJobs as $key => $guardJob)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        {{-- <td class="second">{{ $guardJob->companyname }}</br></td> --}}
                        <td class="second">{{ Auth::user()->companyname}}</br></td>

                        <td>{{ $guardJob->get_guardtype->name }}</td>
                        <td>{{ $guardJob->job_duration ??'N/A'}}</td>
                        <td>{{ $guardJob->guard_location->location ??''}}</td>
                        <td class="five">{{ $guardJob->guard_service->service ??''}}</br></td>
                        <td>{{ $guardJob->per_hour_rate ??'N/A'}}</td>
                        {{-- <td>
                        @if ($guardJob->status == 0)
                        <a href="#"><button class="redActive">Active</button></a>
                        @else
                        <a href="#"><button class="blueActive">Active</button></a>
                        @endif
                    <td> --}}
                        <td>
                            <a href="{{ route('guard.job.status', ['id' => $guardJob->id]) }}">
                                @if ($guardJob->status == 1)
                                    <button class="blueActive"><i class="fa fa-thumbs-up"></i></button>
                                @else
                                    <button class="redActive"><i class="fa fa-thumbs-down"></i></button>
                                @endif
                            </a>
                        </td>
                        <td class="seven">
                            <a href="javascript:void(0)">
                                <button class="editBubtton" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit" onclick="guardJobModal({{ $guardJob->id }})"><i
                                        class="fas fa-edit"></i></button>
                            </a>
                            <a href="{{ route('guard.job.delete', $guardJob->id) }}" id="delete"><button
                                    class="deleteButton" type="button" title=""><i
                                        class="fas fa-trash-alt"></i></button></a>
                            {{-- <button class="ratingButton" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModalRating"><i class="fa fa-star"
                        <a href="{{ route('guard.show', $guardJob->id) }}">View details</a>
                                aria-hidden="true"></i></button> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Start Modal Addz Job -->

<div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Add Listing</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('guard.job.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="profileField">
                                <label>Job Description</label>
                                <div class="select">
                                    <select class="serviceDropdown" aria-label="Default select example" id="job_type"
                                        name="job_type" required>
                                        <option selected="" disabled>Select Job</option>
                                        @foreach ($getGuardType as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <input type="text" class="inputName" placeholder="Job Type"> --}}
                                <label>Location</label>
                                <div class="select">
                                    <select class="serviceDropdown" aria-label="Default select example" id="location"
                                        name="location" required>
                                        {{-- <option selected="" disabled>Location</option> --}}
                                        @foreach ($getlocation as $value)
                                            <option value="{{ $value->id }}"  {{ $value->id == Auth::user()->userlocation ? 'selected' : '' }}>{{ $value->location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Services</label>
                                <div class="select">
                                    <select class="serviceDropdown" aria-label="Default select example" id="services"
                                        name="services" required>
                                        {{-- <option selected="" disabled>Services</option> --}}
                                        @foreach ($getservice as $value)
                                            <option value="{{ $value->id }}">{{ $value->service }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="label">Language</label>
                                <div class="multipleSelect">
                                    <select id="locationSets" multiple="multiple" placeholder="Language"
                                        style="width: 23.2rem" name="languages[]" required>
                                        @foreach ($getLanguage as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <label class="label">Select Image</label> --}}

                                {{-- <label>Status</label>
                                <div class="status">
                                    <input class="input" type="checkbox" id="toggle-btn-1" name="status">
                                    <label class="label" for="toggle-btn-1"></label>
                                </div> --}}
                            </div>
                        </div>
                    {{-- </div> --}}
                    {{-- <div class="row"> --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="profileField">
                                <label>Company Name</label>
                                <input name="companyname" type="text" class="inputName" value="{{Auth::user()->companyname}}" readonly>
                                <label>Job Duration</label>
                                {{-- <input type="text" class="inputName" placeholder="Job Duration" id="job_duration"
                                    name="job_duration" required> --}}
                                    <select class="serviceDropdown" aria-label="Default select example" id="job_duration" name="job_duration" required>
                                        <option selected disabled>Select Duration</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                          <option value="{{ $i }} Month">{{ $i }} Month{{ $i > 1 ? 's' : '' }}</option>
                                        @endfor
                                    </select>
                                <label>Per Hour Rate</label>
                                <input type="number" class="inputName" placeholder="Per Hour Rate" id="per_hour_rate"
                                    name="per_hour_rate">
                                <label class="label">Tags</label>
                                <div class="multipleSelect">
                                    <select id="locationSetsOne" multiple="multiple" placeholder="Tags"
                                        style="width: 23.2rem" name="tags[]" required>
                                        @foreach ($getTags as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                             {{-- @error('image')
                            <p class="help-block" style="color: red">
                                {{ $errors->first('image') }}
                            </p>
                            @enderror --}}

                    </div>
                    <div class="row mt-3 mb-2">
                    <div class="col-md-12">
                                {{-- <label class="col-sm-3 col-form-label">.</label> --}}
                                {{-- <label class="col-sm-3 col-form-label">Upload File</label> --}}
                                <input name="jobimage[]" id="imagesupport" multiple class="form-control" type="file">
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="profileField">
                        <label>Description</label>
                        <textarea name="description" type="text" class="inputMessage" placeholder="Type Here..."></textarea>
                      </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="addJobButton">Save</button>
                    </div>
                </form>
            </div>
            {{-- <button type="submit" class="addJobButton">Save</button> --}}


        </div>
    </div>
</div>

<!-- End Modal Add Job -->

<!-- Start Modal Edit Job -->

<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Edit Listing</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                {{-- @dd(count($guardJobs)) --}}
                @if ($guardJobs->count() > 0)
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div id="guard_job_modal">
                    @include('frontend.guard_dashboard.guard-job-modal')
                </div>
                @endif
            </div>
            {{-- <div class="modal-footer">
                <button type="submit" class="addJobButton">Update</button>
            </div> --}}
        </div>
    </div>
</div>

<!-- End Modal Edit Job -->

<!-- Start Modal Rating -->

<div class="modal fade" id="exampleModalRating" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Rating</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="rating">
                            <h5>Rate</h5>
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="profileField">
                            <label>Message</label>
                            <textarea type="text" class="inputMessage" placeholder="Type Here..."></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="addJobButton">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Call select2() on your element after both scripts have been loaded -->


<!-- End Modal Rating -->
<script type="text/javascript">
    function guardJobModal(guard_id) {
        let id = guard_id;
        console.log(guard_id);
        $('#guard_job_modal').text("");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('guard.job.edit') }}",
            method: "POST",
            data: {
                id: id,
            },
            success: function(data) {
                $("#guard_job_modal").html(data.html);
                console.log(data.html);

            }
        });
    }
</script>
