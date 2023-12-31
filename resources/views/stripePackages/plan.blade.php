@extends('layouts.simple.master')
@section('title', 'Project List')
@section('title', 'Base Inputs')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Document</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
        <style>
            @import url(https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic);

            body {
                background: #292a2b;
                color: #111;
                min-width: 320px;
                font-size: 16px;
                font-weight: 300;
                line-height: 1.6;
                -webkit-font-smoothing: antialiased;
                -webkit-backface-visibility: hidden;
                position: relative;
                padding: 50px 20px;
            }

            .pricing {
                text-align: center;
                border: 1px solid #f0f0f0;
                color: #777;
                font-size: 14px;
                padding-left: 0;
                margin-bottom: 30px;
                font-family: 'Lato';
            }

            .pricing img {
                display: block;
                margin: auto;
                width: 32px;
            }

            .pricing li:first-child,
            .pricing li:last-child {
                padding: 20px 13px;
            }

            .pricing li {
                list-style: none;
                padding: 13px;
            }

            .pricing li+li {
                border-top: 1px solid #f0f0f0;
            }

            .pricing big {
                font-size: 32px;
            }

            .pricing h3 {
                margin-bottom: 0;
                font-size: 36px;
            }

            .pricing span {
                font-size: 12px;
                color: #999;
                font-weight: normal;
            }

            .pricing li:nth-last-child(2) {
                padding: 30px 13px;
            }

            .pricing button {
                width: auto;
                margin: auto;
                font-size: 15px;
                font-weight: bold;
                border-radius: 50px;
                color: #fff;
                padding: 9px 24px;
                background: #aaa;
                opacity: 1;
                transition: opacity .2s ease;
                border: none;
                outline: none;
            }

            .pricing button:hover {
                opacity: .9;
            }

            .pricing button:active {
                box-shadow: inset 0px 2px 2px rgba(0, 0, 0, 0.1);
            }

            /* pricing color */
            .p-green big,
            .p-green h3 {
                color: #4c7737;
            }

            .p-green button {
                background: #4c7737;
            }

            .p-yel big,
            .p-yel h3 {
                color: #ffbb42;
            }
            h5 {
                color: #f0ede8;
            }
            .p-yel button {
                background: #ffbb42;
            }

            .p-red big,
            .p-red h3 {
                color: #e13c4c;
            }

            .p-red button {
                background: #e13c4c;
            }

            .p-blue big,
            .p-blue h3 {
                color: #3f4bb8;
            }

            .p-blue button {
                background: #3f4bb8;
            }
        </style>
    </head>

    <body>
        <section class="container">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('subscribe'))
<div class="alert alert-success" role="alert">
    {{ session('subscribe') }}
</div>
@endif
            <div class="row white">
                <div class="block">
                    {{-- @forelse ( as )

                    @empty

                    @endforelse --}}
                    @forelse ($getCMS as $key => $value)
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul class="pricing p-green">
                                <li>
                                    {{-- <img src="http://bread.pp.ua/n/settings_g.svg" alt=""> --}}
                                    <big>{{ $value->name }}</big>
                                </li>
                                <li><h5>{{ $value->billing_payment }}</h5></li>
                                <li>Color Customization</li>
                                <li>HTML5 & CSS3</li>
                                <li>Styled elements</li>
                                <li>
                                    <h3>$ {{ $value->price }}</h3>
                                    <span>per/{{ $value->interval_count }} {{ $value->billing_payment }}</span>
                                </li>
                                <li>
                                    <a href="{{ route('plans.checkout', $value->slug) }}"><button type="button"title="">
                                            subscribe</button></a>
                                </li>
                            </ul>
                        </div>
                        @empty
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <h2 style="text-align: center; color: #ffff">No Plans Available</h2>

                        </div>
                    @endforelse
                </div><!-- /block -->
            </div><!-- /row -->
        </section>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection
