<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-12">
        <div class="addJob">
            <button class="addJobButton" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">Post a Request</button>
        </div>
        <table id="exampleOne" class="table table-striped dataTable" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Job Description</th>
                    <th>Job Duration</th>
                    <th>Location</th>
                    <th>Service</th>
                    <th>Budget (Allow for a range or hourly rate)</th>
                    {{-- <th>Starting Date</th>
                    <th>Ending Date</th>
                    <th>Description</th> --}}
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($clientJobs as $key => $clientJob)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $clientJob->get_guardtype->name ?? '' }}</td>
                        <td>{{ $clientJob->job_duration ?? 'N/A' }}</td>
                        <td>{{ $clientJob->client_location->location ?? '' }}</td>
                        <td>{{ $clientJob->client_service->service ?? '' }}</td>
                        <td>$ {{ $clientJob->per_hour_rate ?? '0.00' }}</td>
                        {{-- <td>{{ $clientJob->starting_date }}</td>
                    <td>{{ $clientJob->ending_date }}</td>
                    <td>{{ $clientJob->description }}</td> --}}
                        <td>
                            {{-- <a href="{{ route('guard.job.status', ['id' => $job->id]) }}"> --}}
                            <a href="{{ route('client.job.status', ['id' => $clientJob->id]) }}">
                                @if ($clientJob->status == 1)
                                    <button class="blueActive"><i class="fa fa-thumbs-up"></i></button>
                                @else
                                    <button class="redActive"><i class="fa fa-thumbs-down"></i></button>
                                @endif
                            </a>
                        </td>
                        <td>

                            <a href="javascript:void(0)">
                                <button class="editBubtton" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit" onclick="clientJobEdit({{ $clientJob->id }})"><i
                                        class="fas fa-edit"></i></button>
                            </a>
                            <a href="{{ route('client.job.delete', $clientJob->id) }}" type="button" id="delete"> <button
                                    class="deleteButton"><i class="fas fa-trash-alt"></i></button></a>
                            {{-- <button class="deleteButton"><i class="fas fa-trash-alt"></i></button> --}}
                            {{-- <button class="ratingButton" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModalRating"><i class="fa fa-star" aria-hidden="true"></i></button> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
</div>
<!-- Start Modal Add Job -->

<div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Post a Request</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('client.post.job') }}" enctype="multipart/form-data">
                    @csrf

                    <input name="clientjob_id" type="hidden" value="">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="profileField">
                                <label>Guard Type</label>
                                <div class="select">
                                    <select class="serviceDropdown" aria-label="Default select example" id="job_type"
                                        name="job_type" required>
                                        <option selected disabled>Select Guard Type</option>
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
                                        <option selected="" disabled>Location</option>
                                        @foreach ($getlocation as $value)
                                            <option value="{{ $value->id }}">{{ $value->location }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label>Starting Date</label>
                                <input type="date" name="starting_date" class="inputName" placeholder="Starting Date"
                                    required>
                                    <label>Job Duration</label>
                                    <div class="select">
                                        <select class="serviceDropdown" aria-label="Default select example" id="job_duration" name="job_duration" required>
                                            <option selected disabled>Select Duration</option>
                                            <option value="recurring">Recurring</option>
                                            <option value="onetime">One Time</option>
                                            {{-- @for ($i = 1; $i <= 12; $i++)
                                              <option value="{{ $i }} Month">{{ $i }} Month{{ $i > 1 ? 's' : '' }}</option>
                                            @endfor --}}
                                          </select>
                                    </div>

                                    {{-- <input type="text" class="inputName" placeholder="Job Duration" id="job_duration"
                                        name="job_duration" required> --}}
                                <label class="label">Language</label>
                                <div class="multipleSelect">
                                    <select id="locationSetsOne" multiple="multiple" placeholder="Language"
                                        style="width: 23.2rem" name="languages[]" required>
                                        @foreach ($getLanguage as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="profileField">

                                    <label>Job Type</label>
                                    <div class="select">
                                        <select class="serviceDropdown" aria-label="Default select example" id="services"
                                            name="services" required>
                                            <option selected disabled>Job Type</option>
                                            @foreach ($getservice as $value)
                                                <option value="{{ $value->id }}">{{ $value->service }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <label>Budget (Allow for a range or hourly rate)</label>
                                <input type="text" class="inputName"
                                    placeholder="Budget (Allow for a range or hourly rate)" id="per_hour_rate"
                                    name="per_hour_rate">
                                <label>Ending Date</label>
                                <input type="date" name="ending_date" class="inputName" placeholder="Ending Date">
                                <label class="label">Tags</label>
                                <div class="multipleSelect">
                                    <select id="locationSets" class="multipleSelectWidth" multiple="multiple" placeholder="Tags"
                                        style="width: 23.2rem" name="tags[]" required>
                                        @foreach ($getTags as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 row">
                                    <div class="col-sm-12">
                                        <input name="jobimage[]" id="imagesupport" multiple class="form-control"
                                            type="file">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="profileField">
                                <label>Description</label>
                                <textarea type="text" name="description" class="inputMessage" placeholder="Type Here..." required></textarea>
                                {{-- <label>Status</label>
                            <div class="status">
                                <input name="status" value="" class="input" type="checkbox" id="toggle-btn-1">
                                <label class="label" for="toggle-btn-1"></label>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="addJobButton">Save</button>
                    </div>
                </form>
            </div>
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
                <h1 class="modalTitle" id="exampleModalLabel">Edit Post a Request</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                @if ($clientJobs->count() > 0)
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div id="client_job_modal">
                        @include('frontend.client_dashboard.client-job-edit')
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- End Modal Edit Job -->



<!-- End Modal Rating -->
<script type="text/javascript">
    function clientJobEdit(client_id) {
        let id = client_id;
        console.log(client_id);
        // $('#client_job_modal').text("");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('client.job.edit') }}",
            method: "POST",
            data: {
                id: id,
            },
            success: function(data) {
                $("#client_job_modal").html(data.html);
                console.log(data.html);

            }
        });
    }
</script>
