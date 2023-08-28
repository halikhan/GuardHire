<style>
    element.style {}

    .for-sidebar-height-scroll {
        height: 300px;
        overflow: auto;
    }

    .for-sidebar-height-scroll ul {
        height: 100%;
    }

    ::-webkit-scrollbar {
        width: 8px;
        background-color: #F5F5F5;
        border-radius: 10px;
    }

    .for-sidebar-height-scroll::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #d82e6b;
    }

    .tabs-side-bar {
        width: 17%;
        position: fixed;
        height: 100vh;
        padding: 2rem 1rem;
        background-color: #d82e6b;
        border-top-right-radius: 30px;
    }

    .main-tabs-card {
        box-shadow: 0 0px 8px #ababab4f;
        padding: 1rem;
        border-radius: 10px;
    }

    .main-tabs-card-img {
        box-shadow: 0 0px 8px #ababab4f;
        border-radius: 50%;
        object-fit: cover;
        width: 140px;
        height: 140px;
        margin: auto;
        margin-bottom: 2rem;
    }

    .main-tabs-card-img img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }

    .tabs-side-bar ul li,
    .for-list-style li {
        list-style: none;
        text-align: left;
        margin-top: 10px;
        font-family: "Solway-Reg";
    }

    .sidenav-open-btn.for-mobile-screen {
        font-size: 44px;
        font-weight: 800;
        color: #d63384;
    }

    .tabs-side-bar ul li a,
    .for-list-style li a {
        font-family: "Solway-Reg";
    }

    .tabs-side-bar ul,
    .for-list-style {
        padding-left: 1rem;
    }

    .logo img {
        width: 100%;
        height: 100%;
        object-position: center;
        object-fit: cover;
    }

    .cstm-ul-li ul {
        list-style: none;
    }

    .tabs-card-name label {
        width: auto;
    }

    .main-tabs-card:hover {
        transform: scale(1.05);
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
    }

    .tabs-card-name {
        text-align: center;
    }

    .tabs-card-name h1 {
        text-align: center;
        font-size: 18px;
        margin-top: 12px;
        margin-bottom: 6px;
        font-family: PlayfairDisplay-Bold;
    }

    .tabs-card-name span {
        text-align: center;
        font-size: 14px;
        font-family: ProximaNova-Regular;
        font-weight: 600;


    }

    .card-profile-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 0 8px 8px rgba(0, 0, 0, 0.2);
        border-radius: 50%;
    }

    img {
        width: 100%;
        height: 100%;
    }

    .tabs-card-content h2 {
        font-size: 18px;
        margin-top: 2rem;
        font-family: PlayfairDisplay-Regular;
    }

    .tabs-card-title-content p {
        font-size: 14px;
        margin-top: 1rem;
        font-family: PlayfairDisplay-Regular;
    }

    .read-more-btn {
        text-decoration: none;
        font-family: PlayfairDisplay-Regular;
    }

    .tabs-card-name i {
        color: #ffe100;
        font-size: 14px;
    }

    .for-icon-btn i {
        padding-left: 1rem;
    }

    .for-icon-btn:focus i {
        transform: rotate(180deg);
        padding-right: 1rem;
    }

    .sidebar-link.active {
        display: block !important;
    }

    .for-cstm-tabs-button {
        text-decoration: none;
    }

    .sidebar-submenu.active {
        display: block !important;
    }

    .sidebar-submenu {
        list-style: none;
    }

    /* .sidebar-submenu {
        display: block !important;
    } */
    .for-mobile-screen {
        display: none;
    }

    .sidenav .closebtn {
        border: none;
        background: transparent;
        color: #fff;
        font-size: 44px;
        font-weight: 800;

    }

    @media only screen and (max-width: 1024px) {
        .tabs-card-name i {
            color: #ffe100;
            font-size: 10px;
        }

        .main-tabs-card {
            padding: 1rem 4px;
        }

        .tabs-card-title-content p {
            font-size: 13px;
        }

        .main-tabs-card .card-profile-img {
            width: 80px;
            height: 80px;
        }

        .padding-left {
            padding-left: 1rem
        }


    }

    @media only screen and (max-width: 820px) {
        .main-tabs-card {
            width: 60%;
            margin: 2.5rem auto;

        }

        .tabs-inner-button {
            width: 90% !important;
            margin: auto;
        }

        .sidenav {
            z-index: 4;

        }

        .for-cstm-height {
            height: 1000px;
            overflow-y: scroll;
        }

        .for-mobile-screen {
            display: block
        }

        .tabs-side-bar-width {
            display: none;
        }

    }

    @media only screen and (max-width: 414px) {
        .main-tabs-card {
            width: 90%;
            margin: 1rem auto;
        }

    }

    .cartImage {
        width: 180px !important;
        height: 180px !important;
        overflow: hidden !important;
        background-color: #ffffff !important;
    }

    .cartImage img {
        object-fit: scale-down !important;
        width: 100% !important;
        height: 100% !important;
    }
</style>

<div id="mySidenav" class="sidenav for-mobile-screen">
    <div class="for-cstm-height">
        <button href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</button>
        <div class="main-tabs-card-img cartImage">
            @if (Auth::user()->image)
                <img class="b-r-10" src="{{ asset('storage/uploads/cms/' . Auth()->user()->image) }}"
                    style="width:100%; height:100%;" alt="">
                <img class="b-r-10"
                    src="{{ !empty($image) ? asset('storage/uploads/logo/' . $image) : asset('storage/uploads/No-image.jpg') }}"
                    style="width:120px; height:80px;" alt="">
            @else
                <img class="b-r-10" src="{{ asset('storage/uploads/No-image.jpg') }}" style="width:100%; height:100%;"
                    alt="">
            @endif
        </div>
        <ul class="for-list-style">
            <li><a class="for-cstm-tabs-button" href="{{ route('home') }}" target="_blank">Website</a></li>
            @if (Auth::user()->type == '3')
                <li><a class="for-cstm-tabs-button" href="{{ route('user-dashboard') }}">Profile</a></li>
                <li><a class="for-cstm-tabs-button" href="{{ route('user-wedding') }}">Wedding</a></li>
                <li><a class="for-cstm-tabs-button" href="{{ route('user-engagement') }}">Engagement</a></li>
                {{-- <li><a class="for-cstm-tabs-button" href="">Image Gallery</a></li> --}}
            @elseif (Auth::user()->type == '2')
                <li><a class="for-cstm-tabs-button" href="{{ route('vendor-dashboard') }}">Profile</a></li>
                <li><a class="for-cstm-tabs-button" href="{{ route('vendor_gallery') }}">Gallery</a></li>
                <li><a class="for-cstm-tabs-button" href="{{ route('about_vendor') }}">About</a></li>
                <li><a class="for-cstm-tabs-button" href="{{ route('vendor_social') }}">Social</a></li>
                <li><a class="for-cstm-tabs-button" href="{{ route('contact_vendor') }}">Contact</a></li>
                <li><a class="for-cstm-tabs-button" href="{{ route('vendor_reviews') }}">Reviews</a></li>
                <li><a class="for-cstm-tabs-button" href="{{ route('vendor_packageUpdate') }}">Package Update</a></li>
            @endif
            <li><a class="for-cstm-tabs-button" href="{{ route('change-password') }}">Change Password</a></li>

        </ul>
    </div>
</div>
<span class="sidenav-open-btn for-mobile-screen padding-left" onclick="openNav()">&#9776;</span>

<div class="tabs-side-bar-width">
    <div class="tabs-side-bar">
        <div class="main-tabs-card-img cartImage">
            @if (Auth::user()->image)
                <img class="b-r-10" src="{{ asset('storage/uploads/cms/' . Auth()->user()->image) }}"
                    style="width:100%; height:100%;" alt="">
            @else
                <img class="b-r-10" src="{{ asset('storage/uploads/No-image.jpg') }}"" style="width:100%; height:100%;"
                    alt="">
            @endif
        </div>
        <div class="nav flex-column nav-pills for-sidebar-height-scroll" id="v-pills-tab" role="tablist"
            aria-orientation="vertical">

            <ul>
                <li><a class="for-cstm-tabs-button" href="{{ route('home') }}" target="_blank">Website</a></li>
                @if (Auth::user()->type == '3')
                    <li><a class="for-cstm-tabs-button" href="{{ route('user-dashboard') }}">Profile</a></li>
                    <li><a class="for-cstm-tabs-button" href="{{ route('user-wedding') }}">Wedding </a></li>
                    <li><a class="for-cstm-tabs-button" href="{{ route('user-engagement') }}">Engagement</a></li>

                    {{-- <li><a class="for-cstm-tabs-button" href="{{route('wedding_gallery')}}">Image Gallery</a></li> --}}
                @elseif (Auth::user()->type == '2')
                    <li><a class="for-cstm-tabs-button" href="{{ route('vendor-dashboard') }}">Profile</a></li>
                    <li><a class="for-cstm-tabs-button" href="{{ route('vendor_gallery') }}">Gallery</a></li>
                    <li><a class="for-cstm-tabs-button" href="{{ route('about_vendor') }}">About</a></li>
                    <li><a class="for-cstm-tabs-button" href="{{ route('vendor_social') }}">Social</a></li>
                    <li><a class="for-cstm-tabs-button" href="{{ route('contact_vendor') }}">Contact</a></li>
                    <li><a class="for-cstm-tabs-button" href="{{ route('vendor_reviews') }}">Reviews</a></li>
                    <li><a class="for-cstm-tabs-button" href="{{ route('vendor_packageUpdate') }}">Package Update</a>
                    </li>
                @endif
                <li><a class="for-cstm-tabs-button" href="{{ route('change-password') }}">Change Password</a></li>

            </ul>
        </div>
    </div>
</div>
