<div class="row packageBottom">
    <div class="col-lg-12">
        <div class="profileName">
            <h3>Package Details</h3>
        </div>
    </div>
</div>
@if ($guardPaymentDetail && is_object($guardPaymentDetail))
<div class="row packageBottom">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Package : <span>{{$guardPaymentDetail->package_title ??'No data found'}}</span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Type : <span>{{$guardPaymentDetail->package_type ??'No data found'}} Credits/ ${{$guardPaymentDetail->package_amount ??'No data found'}}</span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Amount : <span>${{$guardPaymentDetail->package_amount ??'No data found'}}</span></h5>
        </div>
    </div>
</div>
<div class="row packageBottom">

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>New Message Pts :<span>{{$guardPaymentDetail->msg_points ??'No data found'}}</span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Service Listing Pts : <span>{{$guardPaymentDetail->listing_points ??'No data found'}}</span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Total Credit : <span>{{$totalCreditsPurchased ??'No data found'}}</span></h5>
        </div>
    </div>
</div>
<div class="row packageBottom">

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Used Message Pts :<span>{{$totalCreditPoints ??'No data found'}}</span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Used Service Listing Pts : <span>{{$listingCount ??'No data found'}}</span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="packageText">
            <h5>Remaining Credits : <span>{{$remainingCredits ??'No data found'}}</span></h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        {{-- <button type="submit" class="savePasswordButton">Save Password</button> --}}
    </div>
    {{-- @dd($remainingCredits) --}}
    @if ($remainingCredits < 2)
    <div class="col-lg-4 col-md-6 col-sm-12"><a href="{{route('our.packages')}}">
        <button type="submit" class="savePasswordButton">Update Package</button></a>
    </div>
    @endif

</div>
@else
<div class="packageText">
    <h5> <p>No Package found.</p></h5>
</div>
<div class="col-lg-4 col-md-6 col-sm-12"><a href="{{route('our.packages')}}">
    <button type="submit" class="savePasswordButton">Update Package</button></a>
</div>
@endif
