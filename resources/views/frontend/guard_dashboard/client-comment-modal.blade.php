
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="profileField">
            <div class="connectPhone">
                <h6>Connect With Call</h6>
                <a href="tel:111-222-333" data-bs-dismiss="modal">
                    <p>{{ $clientjob->client_postjob_details->contact ??''}} </p>
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
                @php
                    $id = $clientjob->client_postjob_details->id;
                @endphp
                <a href="{{ url('/chatify',$id) }}"><button class="blueActive chatWidth">Chat</button></a>
            </div>
        </div>
    </div>
</div>
