<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="profileField">
            <label>Guard Name</label>
            <input type="text" value="{{ $info->guard_job_details->name ??''}}" class="inputName"
                placeholder="Client Name" readonly>
            {{-- <label>Job Type</label>
            <input type="text" value="{{ $info->get_guardtype->name ?? '' }}" class="inputName" placeholder="Job Type" readonly> --}}
            <label>Guard Location</label>
            <input type="text" value="{{ $info->guard_location->location ??''}}"
                class="inputName" placeholder="Client Number" readonly>
            <label>Guard Email</label>
            <input type="email" value="{{ $info->guard_job_details->email ??''}}"
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
            <label>Company Name</label>
            <input type="text" value="{{ $info->companyname ??''}}" class="inputName" placeholder="Job Type" readonly>
            <label>Job Duration</label>
            <input type="text" value="{{ $info->job_duration ??''}}" class="inputName"
            placeholder="Job Type" readonly>
            <label>Guard Per Hour Rate</label>
            <input type="text" value="{{ $info->per_hour_rate ??''}}"
                class="inputName" placeholder="Client Number" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="profileField">
            <label>Description</label>
                <textarea name="description" type="text" class="inputMessage" placeholder="Type Here..." readonly>{{ $info->description ??''}}</textarea>

        </div>
    </div>
</div>
