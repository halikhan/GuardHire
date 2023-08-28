{{-- {{ route('guard.portfolio.store') }} --}}
<form id="upload-form" method="post" action="#" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="profileField">
                    <label>Client Name</label>
                    <input type="text" value="{{ $clientjob->client_postjob_details->name ??''}}" class="inputName"
                        placeholder="Client Name" readonly>
                    <label>Client Email</label>
                    <input type="email" value="{{ $clientjob->client_postjob_details->email ??''}}"
                        class="inputName" placeholder="Client Email" readonly>
                    {{-- <label>Status</label>
                    <div class="status">
                        <input class="input" type="checkbox" id="toggle-btn-4">
                        <label class="label" for="toggle-btn-4"></label>
                    </div> --}}
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="profileField">
                    <label>Contact</label>
                        <input type="text" value="{{ $clientjob->client_postjob_details->contact ??''}}"
                            class="inputName" placeholder="Client Number" readonly>
                    <label>Client Location</label>
                    <input type="text" value="{{ $clientjob->client_location->location ??''}}"
                        class="inputName" placeholder="Client Number" readonly>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="profileField">
                    <label>Client Per Hour Rate</label>
                    <input type="text" value="{{ $clientjob->per_hour_rate ??''}}"
                        class="inputName" placeholder="Client Number" readonly>
                        <label>Job Duration</label>
                        <input type="text" value="{{ $clientjob->job_duration ??''}}" class="inputName"
                            placeholder="Job Type" readonly>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="profileField">
                    <label>Starting Date</label>
                    <input type="text" value="{{ $clientjob->starting_date ??''}}" class="inputName"
                        placeholder="Job Type" readonly>
                    <label>Ending Date</label>
                    <input type="text" value="{{ $clientjob->ending_date ??''}}"
                    class="inputName" placeholder="Client Number" readonly>

                    {{-- <label>Starting Date</label>
                    <input type="text" value="{{ $clientjob->starting_date }}" class="inputName"
                        placeholder="Job Type" readonly> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="profileField">
                    <label>Description</label>
                        <textarea name="description" type="text" class="inputMessage" placeholder="Type Here..." readonly>{{ $clientjob->description ??''}}</textarea>
                    {{-- <label>Status</label>
                    <div class="status">
                        <input class="input" type="checkbox" id="toggle-btn-4">
                        <label class="label" for="toggle-btn-4"></label>
                    </div> --}}
                </div>
            </div>
        </div>


</form>

