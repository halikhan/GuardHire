
<form id="upload-form" method="post" action="{{ route('store.guard.companies.rating') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <input name="guardCompanyid" type="hidden">
                <div class="rating">
                    <h5>Rate</h5>
                    <div class="rate">
                        <input type="radio" id="companystar5" name="rate" value="5" />
                        <label for="companystar5" title="text">5 stars</label>
                        <input type="radio" id="companystar4" name="rate" value="4" />
                        <label for="companystar4" title="text">4 stars</label>
                        <input type="radio" id="companystar3" name="rate" value="3" />
                        <label for="companystar3" title="text">3 stars</label>
                        <input type="radio" id="companystar2" name="rate" value="2" />
                        <label for="companystar2" title="text">2 stars</label>
                        <input type="radio" id="companystar1" name="rate" value="1" />
                        <label for="companystar1" title="text">1 star</label>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="profileField">
                    <label>Message</label>
                    <textarea type="text" name="message" class="inputMessage" placeholder="Type Here..." required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="addJobButton">Save</button>
        </div>
</form>

