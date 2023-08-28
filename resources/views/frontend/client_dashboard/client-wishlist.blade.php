<div class="row">
    @if(count($clientwishlists) == 0 && count($companyWishlists) == 0)
    <div class="col-lg-12">
        <div class="profileName mb-4">
            <h3> no wishlist available</h3>
        </div>
    </div>
    @endif

    @if(count($clientwishlists) > 0)
    <div class="profileName mb-4">
        <h3>Listing Wishlist</h3>
    </div>
        @forelse ($clientwishlists as $wishlist)
        <div class="col-lg-11 col-md-11 col-sm-12">
            <div class="wishlistDetailBox">
                <div class="wishlistDetail">
                    <div class="wishlistImage">
                        <img src="{{ !empty($wishlist->guard_job_details->image ?? '') ? asset('storage/uploads/cms/' . $wishlist->guard_job_details->image ?? '') : asset('storage/uploads/No-image.jpg') }}"
                            alt="">
                    </div>
                    <div class="wishlistName">
                        <h6>{{ $wishlist->guard_job_details->name ?? '' }} |  {{ $wishlist->guard_job->companyname ?? 'no company found' }}</h6>
                        <p>
                            {!! substr($wishlist->guard_job->description ?? 'no description found', 0, 170) !!}
                        </p>
                        <h6>${{ $wishlist->guard_job->per_hour_rate ?? '0.00' }}</h6>
                    </div>
                </div>

                <div class="wishlistHireDelete">
                    @php
                        $id = $wishlist->job_id;
                    @endphp
                    {{-- <a href="{{ route('company',$id ) }}"><button class="hireNowBtn">Hire Now</button></a> --}}
                    {{-- <button class="hireNowBtn " type="button" data-bs-toggle="modal" data-bs-target="#exampleModalChat">
                        Hire Now</button> --}}
                        <button class="hireNowBtn ListinghiredInfo" id="1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalChat" data-job-id="{{ $wishlist->job_id ??'' }}">
                            Hire Now
                        </button>
                    {{-- <a href="{{ route('company',$id ) }}"><button class="hireNowBtn">Hire Now</button></a> --}}
                    {{-- <button class="deleteButton"><i class="fas fa-trash-alt"></i></button> --}}
                    <a href="{{ route('client.wishlist.delete', $wishlist->id) }}" type="button" id="delete"> <button
                            class="deleteButton"><i class="fas fa-trash-alt"></i></button></a>
                    @php
                        $id = $wishlist->id;
                    @endphp

                    <a href="{{ url('/chatify', $id) }}" type="button"> <button class="deleteButton"><i
                                class="fas fa-comments"></i></button></a>

                </div>
            </div>
        </div>
            @empty
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profileName mb-4">
                            <h3> no wishlist available</h3>
                        </div>
                    </div>
                </div>
            @endforelse
    @endif
            {{-- @dd($companyWishlists) --}}
    @if(count($companyWishlists) > 0)
        <div class="profileName mb-4">
            <h3>Company Wishlist</h3>
        </div>
        @forelse ($companyWishlists as $comp_data)
        <div class="col-lg-11 col-md-11 col-sm-12">
            <div class="wishlistDetailBox">
                <div class="wishlistDetail">
                    <div class="wishlistImage">
                        <img src="{{ !empty($comp_data->guard_job_details->image ?? '') ? asset('storage/uploads/cms/' . $comp_data->guard_job_details->image ?? '') : asset('storage/uploads/No-image.jpg') }}"
                            alt="">
                    </div>
                    <div class="wishlistName">
                        <h6>{{ $comp_data->guard_job_details->companyname ?? 'Company Name Not Found' }}</h6>
                        <p>
                            {!! substr($comp_data->guard_job_details->description ?? 'no description found', 0, 170) !!}
                        </p>
                        <h6>${{ $comp_data->guard_job_details->starting_rate ?? '0.00' }}</h6>
                    </div>
                </div>
                <div class="wishlistHireDelete">

                        <button class="hireNowBtn companyhiredInfo" id="1" type="button" data-bs-toggle="modal" data-bs-target="#compnayModalChat" data-company-id="{{ $comp_data->guard_id }}">
                            Hire Now
                        </button>

                    <a href="{{ route('compnay.wishlist.delete', $comp_data->id) }}" type="button" id="delete"> <button
                            class="deleteButton"><i class="fas fa-trash-alt"></i></button></a>
                    @php
                        $id = $comp_data->id;
                    @endphp
                    <a href="{{ url('/chatify', $id) }}" type="button"> <button class="deleteButton"><i
                                class="fas fa-comments"></i></button></a>
                </div>
            </div>
        </div>
        @empty
            <div class="row">
                <div class="col-lg-12">
                    <div class="profileName mb-4">
                        <h3> no wishlist available</h3>
                    </div>
                </div>
            </div>
        @endforelse

    @endif

</div>







 {{-- ============= this is Listing modal ==================== --}}

    <div class="modal fade" id="exampleModalChat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Chat Box</h1>
                    <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="profileField">
                                <div class="connectPhone">
                                    <h6>Connect With Call</h6>
                                    <a href="tel:{{ $wishlist->guard_job_details->contact ?? '' }}" data-bs-dismiss="modal">
                                        <p>{{ $wishlist->guard_job_details->contact ?? '' }}
                                        </p>
                                    </a>
                                </div>
                                <div class="connectEmail">
                                    <h6>Connect With Email</h6>
                                    <a href="mailto:{{ $wishlist->guard_job_details->email ?? '' }}" data-bs-dismiss="modal">
                                        <p>{{ $wishlist->guard_job_details->email ?? '' }}</p>
                                    </a>
                                </div>
                                {{-- @php
                                $id = $wishlist->guard_job_details->id;
                                @endphp
                                <div class="connectChat">
                                    <h6>Connect With Chat</h6>
                                    <a href="{{ url('/chatify',$id) }}"><button class="blueActive">Chat</button></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============= this is Compnay modal ==================== --}}

    <div class="modal fade" id="compnayModalChat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md moadalLarge modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modalHeader">
                    <h1 class="modalTitle" id="exampleModalLabel">Chat Box</h1>
                    <button type="button" class="closeButton" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="profileField">
                                <div class="connectPhone">
                                    <h6>Connect With Call</h6>
                                    <a href="tel:{{ $comp_data->guard_job_details->contact ?? '' }}" data-bs-dismiss="modal">
                                        <p>{{ $comp_data->guard_job_details->contact ?? '' }}
                                        </p>
                                    </a>
                                </div>
                                <div class="connectEmail">
                                    <h6>Connect With Email</h6>
                                    <a href="mailto:{{ $comp_data->guard_job_details->email ?? '' }}" data-bs-dismiss="modal">
                                        <p>{{ $comp_data->guard_job_details->email ?? '' }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".ListinghiredInfo").on("click", function() {
                console.log("Hire action executed successfully.");
                const listing_data_id = $(this).data("job-id");
                const csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('listing.wishlist.hire') }}",
                    type: "POST",
                    data: {
                        _token: csrfToken,
                        listing_data_id: listing_data_id
                    },
                    success: function(response) {
                            toastr.success('Added to Hired Listing successfully!');
                            // console.log("Hire action executed successfully.");
                        },
                        error: function(xhr) {
                            console.error("Something went wronge!:", xhr.statusText);
                        }
                });
            });
        });
    </script>
<script>
    $(document).ready(function() {
        $(".companyhiredInfo").on("click", function() {
            console.log("Hire action executed successfully.");
            const comp_data_id = $(this).data("company-id");
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('compnay.wishlist.hire') }}",
                type: "POST",
                data: {
                    _token: csrfToken,
                    comp_data_id: comp_data_id
                },
                success: function(response) {
                        toastr.success('Added to Hired Guard successfully!');
                        // console.log("Hire action executed successfully.");
                    },
                    error: function(xhr) {
                        console.error("Something went wronge!:", xhr.statusText);
                    }
            });
        });
    });
</script>
