
<style>
    button.ratingButtonYellow {
    width: 35px;
    height: 35px;
    border: none;
    outline: none;
    padding: 4px 8px;
    background-color: #00264d;
    color: #9f6f05;
    font-family: MontserratMedium;
    font-size: 14px;
}
</style>
<div class="row">
    {{-- <form id="upload-form" method="post" action="#" enctype="multipart/form-data">
            @csrf --}}
    <div class="col-lg-11 col-md-11 col-sm-12">
        {{-- <div class="addJob">
                    <button class="addClientButton" data-bs-toggle="modal"
                        data-bs-target="#exampleModalClient">Add
                        Client Information</button>
                </div> --}}
        <table id="exampleTwo" class="table table-striped dataTable" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Client Name</th>
                    <th>Client Number</th>
                    <th>Client Email</th>
                    <th>Client Location</th>
                    <th>Job Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getClientInformation as $key => $clientjob)
                    @php
                    $hasValidGuardCreditPts = false;
                    foreach ($clientjob->guard_credit_pts as $guard_credit_pt) {
                        if (Auth::check() && Auth::id() == $guard_credit_pt['guard_id']) {
                            $hasValidGuardCreditPts = true;
                            break;
                        }
                    }
                @endphp
                @if ($hasValidGuardCreditPts)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $clientjob->client_postjob_details->name ??''}}
                            {{ $clientjob->client_postjob_details->last_name ??''}}</td>
                        <td>{{ $clientjob->client_postjob_details->contact ??''}}</td>
                        <td>{{ $clientjob->client_postjob_details->email ??''}}</td>
                        <td>{{ $clientjob->client_location->location ??''}}</td>
                        <td>{{ $clientjob->get_guardtype->name ??''}}</td>

                        {{-- <td>{{ $job->job_duration }} hours</td>
                    <td>$ {{ $job->per_hour_rate }}</td> --}}
                        {{-- <td>{{ $job->starting_date }}</td>
                    <td>{{ $job->ending_date }}</td>
                    <td>{{ $job->description }}</td> --}}

                        <td>
                            @if ($clientjob->status == 1)
                                <button class="blueActive" onclick="get_client_statusid()"><i class="fa fa-thumbs-up"></i></button>
                            @else
                                <button class="redActive" onclick="get_client_statusid()"><i class="fa fa-thumbs-down"></i></button>
                            @endif

                        </td>
                        <td>
                            <button class="editBubtton" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModalClientEdit" onclick="clientInfoModal({{ $clientjob->id}})"><i class="fas fa-eye"></i></button>
                            @php
                                $checkstatusofrating = App\Models\ClientRatingByGuard::where('client_id', $clientjob->client_postjob_details->id)->where('guard_id', Auth::id())->first();
                                    //  @dd($clientjob->client_postjob_details->id)
                          @endphp
                        @if (isset($checkstatusofrating) && is_object($checkstatusofrating) && $checkstatusofrating->status == 1)
                        <button class="ratingButtonYellow" type="button"><i class="fa fa-star" aria-hidden="true"></i></button>
                         @else
                         <button class="ratingButton" type="button" data-bs-toggle="modal"
                         data-bs-target="#exampleModalRatingClient"
                         onclick="hireCompanyRatingModal({{ $clientjob->client_postjob_details->id ??''}})"><i class="fa fa-star"
                             aria-hidden="true"></i>
                        </button>
                         @endif
                            <button class="ratingButton" type="button" data-bs-toggle="modal" onclick="clientCommentModal({{ $clientjob->id}})"
                                data-bs-target="#exampleModalChat"><i class="fas fa-comments"></i></button>
                            {{-- <button class="deleteButton"><i class="fas fa-trash-alt"></i></button> --}}
                        </td>
                    </tr>
                    @endif
                @endforeach

                {{-- <tr>
                            <td>02</td>
                            <td>John Smith</td>
                            <td>021-111222333</td>
                            <td>john@gmail.com</td>
                            <td>$800</td>
                            <td><a href="#"><button class="blueActive">Active</button></a></td>
                            <td>
                                <button class="editBubtton" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalClient"><i class="fas fa-eye"></i></button>
                                <button class="ratingButton" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalRating"><i class="fa fa-star"
                                        aria-hidden="true"></i></button>
                                <button class="ratingButton" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalChat2"><i class="fas fa-comments"></i></button>
                                <button class="deleteButton"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr> --}}
            </tbody>
        </table>

        {{-- </form> --}}
    </div>
</div>
    <!-- End Modal Edit Client -->

    <!-- Start Modal Add Client -->

    {{-- <div class="modal fade" id="exampleModalClient" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Add Client Information</h1>
                    <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="profileField">
                                <label>Client Name</label>
                                <input type="text" class="inputName" placeholder="Client Name">
                                <label>Client Email</label>
                                <input type="email" class="inputName" placeholder="Client Email">
                                <label>Status</label>
                                <div class="status">
                                    <input class="input" type="checkbox" id="toggle-btn-3">
                                    <label class="label" for="toggle-btn-3"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="profileField">
                                <label>Client Number</label>
                                <input type="tel" class="inputName" placeholder="Client Number">
                                <label>Job Type</label>
                                <input type="text" class="inputName" placeholder="Job Type">
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="addJobButton">Save</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- End Modal Add Client -->
    <!-- Start Modal Chat -->

    <div class="modal fade" id="exampleModalChat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Chat Box</h1>
                    <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    {{-- @if ($getClientInformation->count() > 0) --}}
                    <div id="client_comment_modal">
                        @include('frontend.guard_dashboard.client-comment-modal')
                        </div>
                        {{-- @endif --}}

                </div>
            </div>
        </div>
    </div>

    <!-- End Modal Chat -->
    <!-- Start Modal Edit Client -->

    <div class="modal fade" id="exampleModalClientEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Client Information</h1>
                    <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    @if ($getClientInformation->count() > 0)
                    <div id="client_info_modal">
                        @include('frontend.guard_dashboard.client-info-modal')
                        </div>
                        @endif
                </div>
                {{-- <div class="modal-footer">
                    <button type="submit" class="addJobButton">Update</button>
                </div> --}}
            </div>
        </div>
    </div>
{{-- ============ Guard RATING ================= --}}

<div class="modal fade" id="exampleModalRatingClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modalHeader">
                <h1 class="modalTitle" id="exampleModalLabel">Rating</h1>
                <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div id="hireguard_rating_modal">
                    @include('frontend.guard_dashboard.hired-client-by-guard-rating-modal')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Rating -->
    <!-- End Modal Rating -->
<script type="text/javascript">

function hireCompanyRatingModal(guard_job_id) {
    let id = guard_job_id;
    console.log(guard_job_id);
    document.querySelector('input[name="client_id"]').value = guard_job_id;
    }

    function clientInfoModal(client_info_id){
       let id = client_info_id;
       console.log(client_info_id);
         $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url:"{{ route('client.info.edit') }}",
           method:"POST",
           data:{
               id:id,
           },
           success: function(data) {
           console.log(data);
           $("#client_info_modal").html(data.html);
       }
       });
   }

   function clientCommentModal(client_info_id){
       let id = client_info_id;
       console.log(client_info_id);
         $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url:"{{ route('client.comment.modal') }}",
           method:"POST",
           data:{
               id:id,
           },
           success: function(data) {
           console.log(data);
           $("#client_comment_modal").html(data.html);
       }
       });
   }

   function get_client_statusid() {
        // console.log(old_packageid);
        toastr.info('Your cant change client status');
    }
   </script>
