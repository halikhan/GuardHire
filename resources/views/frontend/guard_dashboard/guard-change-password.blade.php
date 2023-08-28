{{-- {{ route('guard.portfolio.store') }} --}}
<form id="upload-form" method="post" action="{{ route('user.update.password') }}" enctype="multipart/form-data">
    @csrf
    <div class="portfolioHeading">
        <div class="row packageBottom passwordTop">
            <div class="col-lg-12">
                <div class="profileName mb-4">
                    <h3>Change Password</h3>
                </div>
            </div>

                <div class="changePassword">
                <div class="profileField">
                    {{-- <input type="password" class="inputName" placeholder="Old Password" value="{{ old('password') }}"> --}}
                    <input type="password" name="password" class="inputName" placeholder="New Password" value="{{ old('password') }}">
                    <input type="password" name="confirm_password" class="inputName" placeholder="Confirm Password" value="{{ old('confirm_password') }}">
                </div>
                <button type="submit" class="savePasswordButton">Save Password</button>
            </div>
        </div>
    </div>
</form>
