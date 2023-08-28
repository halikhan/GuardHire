            {{-- ======== Company Reviews ====== --}}
            <div class="col-lg-12">
                <div class="profileName mb-4">
                    <h3>Company Reviews</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-11 col-md-11 col-sm-12">

                    <table id="exampleThree" class="table table-striped dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Guard Name</th>
                                <th>Company Name</th>
                                {{-- <th>Job Duration</th> --}}
                                <th>Client Name</th>
                                <th>Client Message</th>
                                <th>Client Rating</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guardCompanyRating as $key => $ratings)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Auth::user()->name ?? '' }}</td>
                                    <td>{{ Auth::user()->companyname ?? '' }}</td>
                                    {{-- <td>{{ $ratings->ratings->job_duration ?? '' }} hours</td> --}}
                                    <td>{{ $ratings->get_rated_client_name->name ?? '' }}</td>
                                    <td>{{ $ratings->message ?? '' }}</td>
                                    <td>
                                        @if ($ratings->rate ?? '')
                                        {{-- @dd($review->customer_rating) --}}
                                        <span class="fa fa-star{{ $ratings->rate >= 1 ? ' checked' : '' }}"></span>
                                        <span class="fa fa-star{{ $ratings->rate >= 2 ? ' checked' : '' }}"></span>
                                        <span class="fa fa-star{{ $ratings->rate >= 3 ? ' checked' : '' }}"></span>
                                        <span class="fa fa-star{{ $ratings->rate >= 4 ? ' checked' : '' }}"></span>
                                        <span class="fa fa-star{{ $ratings->rate == 5 ? ' checked' : '' }}"></span>
                                        @else
                                            no rating found
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if ($clientjob->status == 1)
                                            <button class="blueActive"><i class="fa fa-thumbs-up"></i></button>
                                        @else
                                            <button class="redActive"><i class="fa fa-thumbs-down"></i></button>
                                        @endif

                                    </td> --}}

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

 {{-- ======== Job Listing Reviews ====== --}}
        <div class="col-lg-12">
            <div class="profileName mb-4">
                <h3>Job Listing Reviews</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11 col-md-11 col-sm-12">

                <table id="exampleThree" class="table table-striped dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Guard Name</th>
                            <th>Company Name</th>
                            <th>Job Duration</th>
                            <th>Client Name</th>
                            <th>Client Message</th>
                            <th>Client Rating</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guardJobsRating as $key => $ratings)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ Auth::user()->name ?? '' }}</td>
                                <td>{{ $ratings->ratings->companyname ?? '' }}</td>
                                <td>{{ $ratings->ratings->job_duration ?? '' }} hours</td>
                                <td>{{ $ratings->get_rated_client_name->name ?? '' }}</td>
                                <td>{{ $ratings->message ?? '' }}</td>
                                <td>
                                    @if ($ratings->rate ?? '')
                                    {{-- @dd($review->customer_rating) --}}
                                    <span class="fa fa-star{{ $ratings->rate >= 1 ? ' checked' : '' }}"></span>
                                    <span class="fa fa-star{{ $ratings->rate >= 2 ? ' checked' : '' }}"></span>
                                    <span class="fa fa-star{{ $ratings->rate >= 3 ? ' checked' : '' }}"></span>
                                    <span class="fa fa-star{{ $ratings->rate >= 4 ? ' checked' : '' }}"></span>
                                    <span class="fa fa-star{{ $ratings->rate == 5 ? ' checked' : '' }}"></span>
                                    @else
                                        no rating found
                                    @endif
                                </td>
                                {{-- <td>
                                    @if ($clientjob->status == 1)
                                        <button class="blueActive"><i class="fa fa-thumbs-up"></i></button>
                                    @else
                                        <button class="redActive"><i class="fa fa-thumbs-down"></i></button>
                                    @endif

                                </td> --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    <!-- End Modal Edit Client -->
    <div class="modal fade" id="exampleModalChat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Chat Box</h1>
                    <button type="button" class="closeButton" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="profileField">
                                <div class="connectPhone">
                                    <h6>Connect With Call</h6>
                                    <a href="tel:111-222-333" data-bs-dismiss="modal">
                                        <p>{{ $clientjob->client_postjob_details->contact ??''}}
                                            </p>
                                    </a>
                                </div>
                                <div class="connectEmail">
                                    <h6>Connect With Email</h6>
                                    <a href="mailto:john@gmail.com" data-bs-dismiss="modal">
                                        <p>{{ $clientjob->client_postjob_details->email ??''}}</p>
                                    </a>
                                </div>
                                <div class="connectChat">
                                    <h6>Connect With Chat</h6>
                                    <a href="{{ url('/chatify') }}"><button class="blueActive">Chat</button></a>
                                    {{-- <div class="chatOpen" data-bs-dismiss="modal">
                                        <p>Start Chating</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
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

    <!-- End Modal Rating -->
    <script type="text/javascript">
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
   </script>
