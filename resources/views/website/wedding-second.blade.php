@extends('website.layout.master')
@section('title', 'South-Dakota-Bride | Wedding')
@section('content')
@foreach ($result as $value)
<div class="col-lg-4 col-sm-6 mt-4 wow animated bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="card">
        <a href="{{ route('wedding-details', $value->id) }}">
            <div class="cstm-card-height">
                <img src="{{ asset('storage/uploads/cms/'. $value->image) }}" class="card-img-top"
                    alt="...">
            </div>
        </a>
        <div class="card-body">
            <h6 class="card-text">{{ $value->groom }}</h6>
            <h6 class="card-text">And</h6>
            <h6 class="card-text">{{ $value->bride }}</h6>
        </div>
    </div>
</div>
@endforeach
@endsection
