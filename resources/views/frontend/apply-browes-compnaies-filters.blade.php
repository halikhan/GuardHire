<form method="GET" action="{{ route('apply.companies.search') }}">
    @csrf
    <div class="accordion" id="accordionExample">

        <div class="accordion-item accordionItem">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button accordionButton collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Search By Services
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body accordionBodyScroll">
                    <div class="side_menu">
                        <ul>
                            <li>
                                @foreach ($getservice as $value)
                                    <div class="form-check">
                                        <input name="serachservices[]" class="form-check-input" type="checkbox"
                                            value="{{ $value->id }}">

                                        <label class="form-check-label">
                                            <a href="#">{{ $value->service }}</a>
                                        </label>
                                    </div>
                                @endforeach
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item accordionItem">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button accordionButton collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Security Type : <span>({{ count($getGuardType) }} Available)</span>
                    {{-- Guard Type : <span>({{ count($getGuardType) }} Selected)</span> --}}
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body accordionBodyScroll">
                    <div class="side_menu">
                        <ul>
                            <li>
                                @foreach ($getGuardType as $value)
                                    <div class="form-check">
                                        <input name="serachguardtype[]" class="form-check-input" type="checkbox"
                                            value="{{ $value->id }}">
                                        <label class="form-check-label">
                                            <a href="#">{{ $value->name }}</a>
                                        </label>
                                    </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item accordionItem">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button accordionButton collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Budget Rate
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body accordionBodyScroll">
                    <div class="side_menu">
                        <select class="serviceDropdown form-select" id="services" placeholder="Select Hourly Rate"
                            style="width: 12.2rem" name="hourlyrate" required>
                            <option disabled selected>Select Budget Rate</option>
                            <option value="1">$00 - $50</option>
                            <option value="2">$50 - $300</option>
                            <option value="3">$300 - $500</option>
                            <option value="4">$500 and Above</option>
                        </select>
                    </div>

                    {{-- <div class="side_menu">
                    <ul>
                        <li>
                            <div class="form-check">
                                <input name="serachhourlyrate" class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label">
                                    <a href="#">$5 and Blow</a>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label">
                                    <a href="#">$5 - $10</a>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label">
                                    <a href="#">$10 - $20</a>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label">
                                    <a href="#">$20 - $30</a>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label">
                                    <a href="#">$30 - $40</a>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div> --}}
                </div>
            </div>
        </div>
        <div class="accordion-item accordionItem">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button accordionButton collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Search By Location
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                data-bs-parent="#accordionExample">
                <div class="accordion-body accordionBodyScroll">

                    <div class="side_menu">
                        {{-- <input name="" type="search" class="searchInput"
                        placeholder="Search Location" value="{{$value->location }}" > --}}
                        <ul>
                            @foreach ($getlocation as $value)
                                <li>
                                    <div class="form-check">
                                        <input name="serachlocation[]"class="form-check-input" type="checkbox"
                                            value="{{ $value->id }}">
                                        <label class="form-check-label">{{ $value->location }}
                                            {{-- <a href="#">US</a> --}}
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item accordionItem">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button accordionButton collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Search By Language
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                data-bs-parent="#accordionExample">
                <div class="accordion-body accordionBodyScroll">
                    <div class="side_menu">
                        {{-- <input name="" type="search" class="searchInput" placeholder="Search Language"> --}}
                        <ul>
                            @foreach ($getLanguage as $Languagevalue)
                                <li>
                                    <div class="form-check">
                                        <input name="serachlanguage[]" class="form-check-input" type="checkbox"
                                            value="{{ $Languagevalue->id }}">
                                        <label class="form-check-label">{{ $Languagevalue->name }}
                                            {{-- <a href="#">US</a> --}}
                                        </label>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item accordionItem">
            <h2 class="accordion-header" id="ratingheadingThree">
                <button class="accordion-button accordionButton collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Rating
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="ratingheadingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body accordionBodyScroll">
                    <div class="side_menu">
                        <select class="serviceDropdown" id="guardrating" placeholder="Select Rating"
                            style="width: 12.2rem" name="guardrating">
                            <option value="" disabled selected>Select Rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item accordionItem">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button accordionButton collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Search By Tags
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                data-bs-parent="#accordionExample">
                <div class="accordion-body accordionBodyScroll">
                    <div class="side_menu">
                        <ul>

                            {{-- <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        <a href="#">Armed Security</a>
                                    </label>
                                </div>
                            </li> --}}

                            @foreach ($getAlltag as $tagsvalue)
                                <li>
                                    <div class="form-check">
                                        <input name="serachtags[]" class="form-check-input" type="checkbox"
                                            value="{{ $tagsvalue->id }}">
                                        <label class="form-check-label">{{ $tagsvalue->name }}
                                            {{-- <a href="#">US</a> --}}
                                        </label>
                                    </div>
                                </li>
                            @endforeach

                            {{-- <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        <a href="#">Law Enforcement</a>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        <a href="#">CPR</a>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        <a href="#">24/7</a>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        <a href="#">Kids Security</a>
                                    </label>
                                </div>
                            </li> --}}
                            {{-- <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        <a href="#">Other</a>
                                    </label>
                                </div>
                            </li>
                        --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="applyFilter">
        <p>Click “Apply Filter” to apply
            latest changes made by you</p>
        <a href="#"><button type="submit" class="exploreButton">Apply Filter</button></a>
    </div>
</form>
