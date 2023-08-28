<div class="container">
    <div class="howItWorkSearchBox">
        <div class="searchwrapper howItWorkSearch wow animate__animated animate__bounceIn" data-wow-duration="1.5s">
            <div class="searchbox">
                <form method="GET" action="{{ route('apply.howitworks.search') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6"><input name="usersearch" class="form-control inputSearchField"
                                placeholder="Type Here..."></div>
                        <div class="col-md-2">
                            <select class="form-control categories" id="services" name="serachservices">
                                <option disabled selected>Select Service</option>
                                @foreach ($getservice as $value)
                                    <option value="{{ $value->id }}">{{ $value->service }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control categories" id="location" name="serachlocation">
                                <option disabled selected>Select Location</option>

                                @foreach ($getlocation as $value)
                                    <option value="{{ $value->id }}">{{ $value->location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1"><input type="submit" class="btn searchButton" value="Search"></div>
                    </div>
                </form>
            </div>
            {{-- <div class="hireGuardsButton mt-4">
                <a href="{{ route('browse.quotes') }}"><button class="quoteButton">Request a Quote</button></a>
                <a href="{{ route('browse.services') }}"><button class="hireButton">Get Hired as Guard</button></a>
              </div> --}}
        </div>
    </div>
</div>
