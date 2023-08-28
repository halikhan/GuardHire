@extends('user-dashboard.layouts.master')
@section('content')
<style>
     .edit-submit-cstmbtn {
        margin-top: 2rem;
        margin-top: 2rem;
        background-color: #d82e6b;
    font-family: "Solway-Bold";
    font-weight: 600;
    color: #ffffff;
        border-radius: 12px;
        padding: 8px 16px;
        font-size: 16px;
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
    .edit-submit-cstmbtn:hover {
        margin-top: 2rem;
        background-color: #d82e6b;
        font-family: "Solway-Bold";
        font-weight: 600;
        color: #ffffff;
    }
    .top-tabt-heading {
        color: #d82e6b;
        font-size: 58px;
        font-family: "JA-Hand-Reg";
    }


        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #d82e6b;
        color: white;
        }
</style>
    <div class="for-content-tabs">
        <h2 class="top-tabt-heading">Reviews List</h2>
        <br><br>

        <table id="customers">
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>Review</th>
            <th>Stars</th>
            </tr>
            @foreach ($getVendorRating as $key=> $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->userName }}</td>
                <td>{{ $value->review }}</td>
                <td>
                    @if (!empty($value->stars_rating))
                    @for($i=1; $i <= 5; $i++)
                    @if($value->stars_rating >= $i)
                        <i class="fa fa-star gold_star"></i>
                    @else
                        <i class="fa fa-star black_star"></i>
                    @endif
                @endfor
                @else
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                @endif
                </td>
            </tr>
            @endforeach

          </table>
          <div class="d-flex justify-content-around align-item-center mt-5 mb-5">
            {{ $getVendorRating->links() }}
          </div>
    </div>
@endsection

@push('scripts')

@if ($errors->any())
@foreach ($errors->all() as $error)
    <script>toastr.error('{{ $error }}')</script>
@endforeach
@endif

@if (Session::has('user_updated'))
    <script>swal('User Profile','{{ Session::get('user_updated') }}','success')</script>
@endif

@if (Session::has('user_error'))
    <script>swal('User Profile','{{ Session::get('user_error') }}','success')</script>
@endif

@endpush
