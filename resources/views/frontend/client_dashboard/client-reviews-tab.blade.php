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
            {{-- ======== Company Reviews ====== --}}
            <div class="col-lg-12">
                <div class="profileName mb-4">
                    <h3>{{ Auth::user()->name ?? '' }} Reviews</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-11 col-md-11 col-sm-12">

                    <table id="exampleFour" class="table table-striped dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Guard Name</th>
                                <th>Company Name</th>
                                {{-- <th>Job Duration</th> --}}
                                {{-- <th>Client Name</th> --}}
                                <th>Guard Message</th>
                                <th> Rating</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientRating as $key => $ratings)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td>{{ Auth::user()->name ?? '' }}</td> --}}
                                    <td>{{ $ratings->get_rated_client_name->name ?? '' }}</td>
                                    <td>{{ $ratings->get_rated_client_name->companyname ?? '' }}</td>
                                    {{-- <td>{{ $ratings->ratings->job_duration ?? '' }} hours</td> --}}
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

    <!-- Start Modal Edit Client -->

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
