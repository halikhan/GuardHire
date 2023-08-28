@extends('layouts.simple.master')
@section('title', 'Project List')
@section('title', 'Base Inputs')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Vendor</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Vendor </li>
    <li class="breadcrumb-item active">list</li>
@endsection

@section('content')
    <style>
        .gallery-section .active {
            border-bottom: none;
            color: #EC0169;
        }

        div.dataTables_wrapper {
            /* width: 800px; */
            margin: 2rem auto;
        }

        .bookbtn {
            border: none;
            border-radius: 5px;
            background-color: #f6921e;
            color: #ffffff;
            padding: 14px 40px;
            font-size: 12px;
            font-family: MontBold;
            margin-top: 1.5rem;
        }

        .rating i {
            color: #ebd004;
        }

        .gold_star {
            color: #ebd004 !important;
            font-size: 14px;
        }

        .rating .black_star {
            color: #2c2c2c !important;
            font-size: 14px;
        }

        .for-margin-main-top {
            margin-top: 4rem
        }

        .for-margin-top {
            margin-top: 1rem
        }

        .gallery-section .gallery-image {
            width: 100%;
            height: 400px;
        }

        .gallery-section .gallery-image img {
            width: 100%;
            height: 100%;
        }

        .reviewSendSection {
            background-color: #F2F2F2;
            padding-bottom: 1rem;
        }

        .profileDetail {
            display: flex;
            padding: 5px 0px;
            width: 100%;
        }

        .profileimg {
            background-color: gray;
            border-radius: 15px;
            margin-right: 10px;
            width: 80px;
            height: 80px;
            overflow: hidden;
        }

        .detailSection .tabsSection .profileimg {
            background-color: gray;
            border-radius: 15px;
            margin-right: 10px;
            width: 80px;
            height: 80px;
            overflow: hidden;
        }

        .profileName {
            margin-top: 8px;

        }

        .profileName input {
            border: none;
            border-bottom: 1px solid black;
            background: transparent;
            margin-bottom: 12px;
            padding-left: 8;
        }

        .ratingSection {
            display: flex;
        }

        .rating {
            display: flex;
            /* width: 100%; */
            justify-content: center;
            overflow: hidden;
            flex-direction: row-reverse;
            /* height: 150px; */
            position: relative;
        }

        .rating>label {
            cursor: pointer;
            width: 26px;
            height: 26px;
            margin-top: auto;
            background-image: url(data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 76%;
            transition: .3s;
        }

        .reviewPara input {
            width: 100%;
            border: none;
            border-bottom: 1px solid;
            font-family: 'MontRegular';
            padding: 5px 1px;
            margin: 5px 1px;
            background-color: transparent;
            outline: none;
        }

        .reviewPara {
            font-family: 'MontRegular';
            margin-top: 0.5rem;
            font-size: 12px;
        }

        .rating i {
            color: #ebd004;
        }

        .cstm-width.contact-from {
            width: 56%;
            margin: auto
        }

        .details .dspt h4,
        h5 {
            font-family: 'Cinzel-Medium';
            color: #000;
            font-weight: bold;
            padding-left: 10px;
        }

        .sign-btn:hover {
            background-color: #EC0169;
            color: #FFF;
        }

        .sign-btn {
            text-decoration: none;
            color: #4D4D4D;
            border: 1px solid #EC0169;
            font-size: 12px;
            padding: 8px 30px;
            transition: 0.5s all ease-in-out;
            background-color: #FFF;
        }

        .tabs-btn-btn.active {
            text-decoration: none;
            background-color: #000;
            color: #FFF;
            font-size: 12px;
            border: none;
            padding: 9px 30px;
            transition: 0.5s all ease-in-out;
        }

        .con-inf-links-location a {
            font-family: 'Poppins-Light';
            color: #000;
            text-decoration: none;
            font-weight: bold;
        }

        .art-inner-para {
            color: #808080;
            font-family: 'Poppins-Light';
        }

        .tabs-btn-btn {
            text-decoration: none;
            background-color: transparent;
            color: #FFF;
            font-size: 12px;
            border: none;
            margin-right: 10px;
            padding: 9px 30px;
            transition: 0.5s all ease-in-out;
        }

        .cstm-color {
            display: flex;
            align-items: center;
            width: 100%;
            margin: auto;
        }

        .for-background-color {
            background-color: #d82e6b;
            padding: 0px;
        }

        .swiper-container {
            ov erflow: hidden;
        }

        .cstm-tab-dashboard .nav-tabs .nav-link {
            color: #2c323f;
            padding: 10px 40px;
        }

        .cstm-tab-dashboard .nav-tabs .nav-link.active,
        .cstm-tab-dashboard .nav-tabs .nav-item.show .nav-link {
            background-color: #e91e6338 !important;
            color: #EC0169 !important;
            border-color: #EC0169 #EC0169 #fff;
            border-left: 2px solid;
            border-right: 2px solid;
            border-top: 2px solid;
        }

        .nav-tabs {
            border-bottom: 2px solid #EC0169;
        }

        .nav-tabs .nav-link {
            border-bottom: 2px solid #EC0169;
            margin-bottom: -2px;
        }

        .nav-tabs .nav-link:hover,
        .nav-tabs .nav-link:focus {
            border-color: #EC0169 #EC0169 #EC0169;

            /* border-bottom: 2px solid #EC0169; */
        }

        .close-img {
            position: relative;
            width: 120px;
            height: 80px;
            margin-right: 1rem;
            margin-bottom: 1rem;
        }

        .close-img img {
            object-fit: contain;
        }

        .close-img .close-img-btn {
            position: absolute;
            background: transparent;
            right: -4px;
            top: -4px;
            border: none;
            outline: none;
        }

        .close-img .close-img-btn i {
            background: #d82e6b;
            padding: 3px 6px;
            font-size: 14px;
            font-weight: 900;
            color: #fff;
            border-radius: 50px;
        }

        .for-ctm-height {
            max-height: 200px !important;
            min-height: 200px !important;
        }

        .cke_contents.cke_reset {
            max-height: 200px !important;
            min-height: 200px !important;
        }

        .mutipleimages {
            color: red;
            font-size: 11px;
        }

        .image_container {
            height: 60px;
            width: 100px;
            border-radius: 6px;
            overflow: hidden;
            margin: 10px;
            color: #d82e6b;
        }

        .image_container img {
            height: 100%;
            width: auto;
            object-fit: cover;
        }

        .image_container span {
            top: -14px;
            right: 3px;
            color: red;
            font-size: 26px;
            font-weight: 700;
            cursor: pointer;
        }

        .display_none {
            display: none !important;
        }
    </style>
    <link rel="stylesheet" href="https://project.designprosusa.com/South_Dakota_Bride/public/website/css/choices.min.css">
    <?php
    $getlocation = new App\Models\location();
    // dd($getlocation);
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container mt-4 CSTM cstm-tab-dashboard">
                            <!-- <div class="nav nav-pills cstm-color" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="tabs-btn-btn" id="v-pills-review-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-review" type="button" role="tab" aria-controls="v-pills-review"
                                            aria-selected="false">Cities</button>
                                        <button class="tabs-btn-btn" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                            aria-selected="false">Photos</button>
                                        <button class="tabs-btn-btn active" id="v-pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-profile" type="button" role="tab"
                                            aria-controls="v-pills-profile" aria-selected="true">About</button>
                                        <button class="tabs-btn-btn" id="v-pills-settings-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-settings" type="button" role="tab"
                                            aria-controls="v-pills-settings" aria-selected="false">Contact</button>
                                    </div> -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link" id="user-profile" data-bs-toggle="tab"
                                        data-bs-target="#v-user-profile" type="button" role="tab"
                                        aria-controls="v-pills-review" aria-selected="true">Profile</button>
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#v-pills-review" type="button" role="tab"
                                        aria-controls="v-pills-review" aria-selected="true">Cities</button>
                                        <button class="nav-link" id="user-busniess" data-bs-toggle="tab"
                                        data-bs-target="#v-user-busniess" type="button" role="tab"
                                        aria-controls="v-pills-review" aria-selected="true">Business Category</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#v-pills-home" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">Photos</button>
                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-profile" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="true">About</button>
                                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#v-pills-settings" type="button" role="tab"
                                        aria-controls="nav-contact" aria-selected="false">Contact</button>
                                </div>
                            </nav>
                        </div>
                        <div class="gallery-section">
                            <div class="container">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <h5 class="couple-text pt-5"><span></span></h5>
                                        <div class="d-flex flex-wrap mt-6">
                                      <input type="hidden" name="wedd-img" id="del-img"
                                        data-bs-original-title="" title="">
                                            @if (!empty($getvendorimages->image))
                                                {{-- {{ dd() }} --}}
                                                @if (json_decode($getvendorimages->image))
                                                    @foreach (json_decode($getvendorimages->image) as $key => $image)
                                                        {{-- {{ dd( $image)}} --}}
                                                        @php $wedding_id = $getvendorimages->id; @endphp
                                                        <div class="close-img display_none_{{ $key }}">
                                                            <img src="{{ asset('storage/uploads/cms/' . $image) }}"
                                                                alt="image" style="width:120px; height:80px;"
                                                                class="delete-image">
                                                            <button type="button"
                                                                class="deleteImage close-img-btn display_none_{{ $key }}"
                                                                data-wedding="{{ $wedding_id }}"
                                                                id="del-image{{ $edit_data->id }}"
                                                                data-key="{{ $key }}"
                                                                data-id="{{ $edit_data->id }}"
                                                                data-src="{{ $image }}"><i class="fa fa fa-times"
                                                                    aria-hidden="true"></i></button>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <img src="{{ asset('storage/uploads/No-image.jpg') }}"
                                                        style="width:120px; height:120px;">
                                                @endif
                                            @else
                                                <img src="{{ !empty($getvendorimages->image ?? '')
                                                    ? asset('storage/uploads/cms/' . $getvendorimages->image)
                                                    : asset('storage/uploads/No-image.jpg') }}"
                                                    style="width:80px; height:80px;">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <div>
                                            <div class="art-inner-para" data-wow-duration="1s" data-wow-delay="0.5s">
                                                <h5 class="couple-text pt-5"><span></span></h5>
                                                <h1 class="couple-text" data-wow-duration="1s" data-wow-delay="0.5s">
                                                    About {{ $edit_data->name ??''}} {{ $edit_data->last_name ??''}} </h1>

                                                <div class="art-inner-para">
                                                    @if ($getvendorabout)
                                                    <p class="art-inner-para" data-wow-duration="1s"
                                                    data-wow-delay="0.5s">
                                                    {!! strip_tags($getvendorabout->aboutvendor ?? '') !!}
                                                    </p>
                                                    @else
                                                    <p class="art-inner-para" data-wow-duration="1s"
                                                    data-wow-delay="0.5s">
                                                    No data available
                                                    </p>
                                                    @endif

                                                </div>

                                                <div class="" data-wow-duration="1s" data-wow-delay="0.5s">

                                                    <h4 class="pt-5">{{ $edit_data->name ??''}} {{ $edit_data->last_name ??''}}
                                                        reviews</h4>
                                                    <p></p>
                                                </div>
                                                <div class="">
                                                    <a href="{{ !empty($getvendorabout->image2)
                                                        ? asset('storage/uploads/cms/' . $getvendorabout->image2 ?? '')
                                                        : asset('storage/uploads/No-image.jpg') }}"
                                                        download><button class="sign-btn">Register to
                                                            reviews</button>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-user-profile" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        {{-- <form class="form theme-form" action="{{ route('adminVendor-Update', $edit_data->id) }}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf --}}
                                        <h5 class="couple-text pt-5"><span>   @if ($edit_data->image != null)
                                            <img src="{{ asset('storage/uploads/cms/' . $edit_data->image) }}" alt="image"
                                                style="width:120px; height:80px;">
                                        @else
                                            <img src="{{ !empty($edit_data->image)
                                                ? asset('storage/uploads/cms/' . $edit_data->image)
                                                : asset('storage/uploads/No-image.jpg') }}"
                                                style="width:80px; height:80px;">
                                        @endif</span></h5>
                                        {{-- <div class="col-md-12">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Upload Profile Image.*</label>
                                                <div class="col-sm-9">
                                                    <input name="image" id="subEmail" value="{{ old('image') }}"
                                                        class="form-control" type="file">
                                                    <input name="old_image" class="form-control btn-square"
                                                        id="exampleFormControlInput10" type="hidden"
                                                        value="{{ $edit_data->image }}" placeholder="Name">
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="card-footer">
                                            <button class="btn btn-primary mailregister" type="submit">update</button>
                                        </div>
                                    </form> --}}
                                    </div>
                                    <div class="tab-pane fade" id="v-user-busniess" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <div class="d-flex justify-content-around mt-5 con-inf-links-location">
                                            <div class="d-flex justify-content-center">
                                                <div class="p-2"><a href="">Bussiness Category</a></div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="p-2">
                                                    {{-- <h4 class="pt-5"></h4> --}}

                                                    <span>{{ $getvendorDetailsService->get_vednorbusinesscategory->service ?? '' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                        aria-labelledby="v-pills-messages-tab">
                                        <div class="row for-margin-main-top">
                                            <div class="col-lg-12 mt1 mb1 reviewSendSection">

                                                <form action=" http://localhost/south_dakota_bride/user-rating/11"
                                                    enctype="multipart/form-data" method="post">
                                                    <input type="hidden" name="_token"
                                                        value="d47g0MC0bHgl7IE5K0zIHQkC3OwRSlXGhAG1IUqW">
                                                    <div class="profileDetail">
                                                        <div class="profileimg">
                                                            <img src="https://venu2go.com/public/assets/public/img/SVG/user.png"
                                                                alt="avatar" width="80" style="border-radius: 50%">
                                                        </div>

                                                        <div class="profileName">
                                                            <input type="text" placeholder="Name" name="userName">
                                                            <div class="ratingSection">
                                                                <div class="feedback">
                                                                    <div class="rate">
                                                                        <input type="radio" id="star5"
                                                                            name="stars_rating" value="5">
                                                                        <label for="star5" title="text">5
                                                                            stars</label>
                                                                        <input type="radio" id="star4"
                                                                            name="stars_rating" value="4">
                                                                        <label for="star4" title="text">4
                                                                            stars</label>
                                                                        <input type="radio" id="star3"
                                                                            name="stars_rating" value="3">
                                                                        <label for="star3" title="text">3
                                                                            stars</label>
                                                                        <input type="radio" id="star2"
                                                                            name="stars_rating" value="2">
                                                                        <label for="star2" title="text">2
                                                                            stars</label>
                                                                        <input type="radio" id="star1"
                                                                            name="stars_rating" value="1">
                                                                        <label for="star1" title="text">1
                                                                            star</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="reviewPara">
                                                        <input type="text" placeholder="Write a Review..."
                                                            name="review">
                                                        <div class="reviewSendbtn text-end mt1">
                                                            <button type="submit" class="reg-btn"> Send</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                        aria-labelledby="v-pills-settings-tab">
                                        <table id="example" class="display nowrap mt-4" style="width:100%">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th>Contact</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                            @forelse ($getVendorContact as $value)
                                                <tr>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    <td>{{ $value->message }}</td>
                                                    <td>{{ $value->phone_number }}</td>
                                                    {{-- <td>
                                                    <a href="{{ route('contact_delete', $value->id) }}" id="delete"><button
                                                            class="btn btn-danger btn-xs for-font-color" type="button"
                                                            data-original-title="btn btn-danger btn-xs" title=""><i class="fa fa-trash"
                                                                aria-hidden="true"></i></button></a>
                                                </td> --}}
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>No records found</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endforelse
                                        </table>
                                    </div>
                                    <div class="tab-pane fade active show" id="v-pills-review" role="tabpanel"
                                        aria-labelledby="v-pills-review-tab">
                                        <div class="d-flex justify-content-around mt-5 con-inf-links-location">
                                            <div class="d-flex justify-content-center">
                                                <div class="p-2"><a href="">Cities</a></div>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-center">
                                                    <div class="p-2">
                                                        {{-- <a href="">
                                                            <span>Chamberlain |</span>
                                                            <span>No Cities available </span>
                                                        </a> --}}
                                                        @if (!empty($getVendorlocations->locations))
                                                            @php
                                                                $data = $getlocation->whereIn('id', json_decode($getVendorlocations->locations))->get();
                                                                //  dd($data);
                                                            @endphp
                                                            <span>
                                                                @foreach ($data as $items)
                                                                    {{ $items->location ?? '' }} |
                                                                @endforeach
                                                            </span>
                                                        @else
                                                            <span>No Cities available </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="pt-5">Edit Vednor</h5>
                    </div>
                    {{-- <form class="form theme-form"> --}}
                    <form class="form theme-form" action="{{ route('adminVendor-Update', $edit_data->id) }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" value="{{ $edit_data->password }}" name="prevpassword">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Vendor First Name.*</label>
                                        <input name="name" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="text" value="{{ $edit_data->name }}"
                                            placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Vendor Last Name.*</label>
                                        <input name="last_name" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="text"
                                            value="{{ $edit_data->last_name }}" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Email.*</label>
                                        <input name="email" class="form-control btn-square"
                                            value="{{ $edit_data->email }}" id="exampleFormControlInput10"
                                            type="email" placeholder="Email" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Company.*</label>
                                        <input name="company" class="form-control btn-square"
                                            id="exampleFormControlInput10" type="text"
                                            value="{{ $edit_data->company }}" placeholder="company">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Contact.*</label>
                                        <input id="phonebride" class="form-control btn-square" type="tel"
                                            placeholder="Phone No." name="contact" maxlength="14"
                                            value="{{ $edit_data->contact }}" pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlInput10">Select Cities.*</label>
                                    @php
                                        $data = $getlocation->whereIn('id', json_decode($getVendorlocations->locations))->get();
                                        //  dd($data);
                                    @endphp
                                    <select name="locations[]" id="choices-multiple-remove-button" placeholder="Location"
                                        style="width: 86px; " multiple>
                                        @foreach ($getLocationNames as $value)
                                            @foreach ($data as $user_location)
                                                @if ($user_location->id == $value->id)
                                                    <option value="{{ $user_location->id }}"
                                                        {{ $user_location->id == $value->id ? 'selected' : '' }}>
                                                        {{ $user_location->location }}</option>
                                                @endif
                                            @endforeach
                                            @if ($user_location->id != $value->id)
                                                <option value="{{ $value->id }}">{{ $value->location ?? '' }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Bussiness Category.*</label>
                                        <select name="bussinessCategory" class="form-select" size="1">
                                            <option selected disabled>Bussiness Category</option>
                                            @foreach ($getServiceNames as $value)
                                                <option value="{{ $value->id }}"
                                                    {{ $value->id == $edit_data->bussinessCategory ? 'selected' : '' }}>
                                                    {{ $value->service }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- <div class="col-md-12">
                                    @if ($edit_data->image != null)
                                        <img src="{{ asset('storage/uploads/cms/' . $edit_data->image) }}" alt="image"
                                            style="width:120px; height:80px;">
                                    @else
                                        <img src="{{ !empty($edit_data->image)
                                            ? asset('storage/uploads/cms/' . $edit_data->image)
                                            : asset('storage/uploads/No-image.jpg') }}"
                                            style="width:80px; height:80px;">
                                    @endif
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Upload Profile Image.*</label>
                                        <div class="col-sm-9">
                                            <input name="image" id="subEmail" value="{{ old('image') }}"
                                                class="form-control" type="file">
                                            <input name="old_image" class="form-control btn-square"
                                                id="exampleFormControlInput10" type="hidden"
                                                value="{{ $edit_data->image }}" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            {{-- <div class="d-flex flex-wrap">
                                <input type="hidden" name="wedd-img" id="del-img">

                                @if (!empty($getvendorimages->image))

                                    @if (json_decode($getvendorimages->image))
                                        @foreach (json_decode($getvendorimages->image) as $key => $image)

                                            @php $wedding_id = $getvendorimages->id; @endphp
                                            <div class="close-img display_none_{{ $key }}">
                                                <img src="{{ asset('storage/uploads/cms/' . $image) }}" alt="image"
                                                    style="width:120px; height:80px;" class="delete-image">
                                                <button type="button"
                                                    class="deleteImage close-img-btn display_none_{{ $key }}"
                                                    data-wedding="{{ $wedding_id }}"
                                                    id="del-image{{ $edit_data->id }}" data-key="{{ $key }}"
                                                    data-id="{{ $edit_data->id }}" data-src="{{ $image }}"><i
                                                        class="fa fa fa-times" aria-hidden="true"></i></button>
                                            </div>
                                        @endforeach
                                    @else
                                        <img src="{{ asset('storage/uploads/No-image.jpg') }}"
                                            style="width:120px; height:120px;">
                                    @endif
                                @else
                                    <img src="{{ !empty($getvendorimages->image ?? '')
                                        ? asset('storage/uploads/cms/' . $getvendorimages->image)
                                        : asset('storage/uploads/No-image.jpg') }}"
                                        style="width:80px; height:80px;">
                                @endif
                            </div> --}}
                            {{-- <br> --}}
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label for="inputImage">Upload Wedding Images.*</label>
                                        <h6 class="mutipleimages">Please select multiple images at once.*</h6>

                                        <input type="file" name="wedding_image[]" class="myfrm form-control"
                                            id="wedding_images" multiple onchange="image_select()">
                                        {{-- @foreach (json_decode($getUserWeddingimages->image) as $image) --}}
                                        <input name="old_wedding_image" class="form-control" type="hidden"
                                            value="{{ $getvendorimages->image ?? '' }}">

                                        {{-- @endforeach --}}

                                        {{-- </div> --}}
                                    </div>
                                    <div class=" d-flex flex-wrap justify-content-start" id="wedding_Multiple_Images">

                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlTextarea14">About Vendor</label>
                                    <textarea name="aboutvendor" class="ckeditor form-control btn-square" id="editor" rows="3">{{ $getvendorabout->aboutvendor ?? '' }}</textarea>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                {{-- <div class="form-group col-md-12">
                                        <label for="inputState">Vendor Stoplight</label>
                                        <input type="text" class="form-control" name="stoplight" value="{{ $getvendorabout->stoplight ??'' }}"
                                            placeholder="stoplight" >
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputImage"> Select File</label>
                                        <input type="file" name="image" class="form-control" id="inputImage" placeholder="Name">
                                    </div> --}}

                                <div class="form-group col-md-12">
                                    <label for="inputState">Vendor Reviews </label>
                                    <br />
                                    <input type="text" class="form-control" name="reviews"
                                        value="{{ $getvendorabout->reviews ?? '' }}" placeholder="Vendor reviews">
                                </div>
                                <br />
                                <div class="form-group col-md-12">
                                    <label for="inputImage"> Select Reviews File</label>
                                    <br />
                                    <input type="file" name="image2" class="form-control" id="inputImage"
                                        placeholder="Name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Password.*</label>
                                        <input name="password" class="form-control btn-square" value=""
                                            id="exampleFormControlInput10" type="password" placeholder="Password">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput10">Confirm Password.*</label>
                                        <input name="confirm_password" class="form-control btn-square" value=""
                                            id="exampleFormControlInput10" type="password"
                                            placeholder="Confirm Password">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary mailregister" type="submit">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@section('script')
    <script>
        var images = [];

        function image_select() {

            var image = document.getElementById('wedding_images').files;
            if (image.length > 10) {
                $('#wedding_images').val("");
                toastr.error('You can upload only 5 images!');
                location.reload();
                return false;

            }
            for (i = 0; i < image.length; i++) {

                images.push({

                    "name": image[i].name,
                    "url": URL.createObjectURL(image[i]),
                    "file": image[i],
                })
            }

            document.getElementById('wedding_Multiple_Images').innerHTML = image_show();
        }

        function image_show() {
            var image = "";

            // var imgCount = document.images.length;
            if (images.length < 11) {

                images.forEach((i) => {
                    console.log(images.length);
                    image += `<div class="image_container d-flex justify-content-center position-relative">
          <img src="` + i.url + `" alt="Image" style="width:80px; height:60px;">
          <span class="position-absolute" onclick="delete_image(` + images.indexOf(i) + `)">&times;</span>
      </div>`;

                });
                return image;

            } else {
                // var images.length = "";
                toastr.error('Please select 10 images at once!');
                $('#wedding_images').val("");
                location.reload();
                return null;
            }


        }

        function delete_image(e) {
            images.splice(e, 1);
            document.getElementById('wedding_Multiple_Images').innerHTML = image_show();
            const dt = new DataTransfer()
            const input = document.getElementById('wedding_images')
            const {
                files
            } = input

            for (let i = 0; i < files.length; i++) {
                const file = files[i]
                if (e !== i)
                    dt.items.add(file);
            }

            input.files = dt.files;
            console.log(document.getElementById('wedding_images').files);
        }
    </script>

    <script>
        $(document).ready(function() {


            $('.deleteImage').on('click', function(event) {

                let id = $(this).attr("data-id");
                let img = $(this).attr("data-src");
                let key = $(this).attr("data-key");
                let wedding_id = $(this).attr("data-wedding")
                // console.log(id+"--------"+img)
                // alert(id);
                // var id  = $("#del-img").val(data);
                // alert(append);
                // alert('image clicked');
                $.ajax({
                    type: "GET",
                    url: "{{ route('delete-wedd-img') }}",
                    data: {
                        img: img,
                        id: id,
                        wedding_id: wedding_id
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            location.reload(true);
                            $(".display_none_" + key).addClass("display_none");
                            toastr.success(res.msg)

                        }
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        document.getElementById('phonebride').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>

{{-- <script src="https://project.designprosusa.com/South_Dakota_Bride/public/website/js/choices.min.js"></script> --}}
     <script src="{{ asset('website/js/choices.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 35,
                searchResultLimit: 35,
                renderChoiceLimit: 35
            });


        });
        $(document).ready(function() {
            $('#example').DataTable({
                scrollY: 400,
            });
        });
    </script>

    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
@endsection
