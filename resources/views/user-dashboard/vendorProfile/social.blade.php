@extends('user-dashboard.layouts.master')
@section('content')
<style>
     .update-submit-cstmbtn {

        background-color: #d82e6b;
    font-family: "Solway-Bold";
    font-weight: 400;
    color: #ffffff;
        border-radius: 12px;
        /* padding: 8px 16px; */
        font-size: 16px;
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
        <h2 class="top-tabt-heading">Social List</h2>
        <br>
        <div class="row">
        <div class="col-md-10">
            </div>
            @if ($count == 4)
            <div class="col-md-2" align="right">

             </div>
            @else
            <div class="col-md-2" align="right">
                <a type="button"class="btn update-submit-cstmbtn" href="{{ route('vendor_social_create') }}"> Create </a>
             </div>
            @endif
        </div>
        <br>
        <table id="customers">
            <thead>
            <tr>
            <th>#</th>
            <th>Social Type</th>
            <th>Social links</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getVendorSociallinks as $key =>$value)
            <tr>
                <td>{{ $key+1 }}</td>


            <td>
            @if ($value->type == '1')
            Facebook
            @elseif ($value->type == '2')
            Instagram
            @elseif ($value->type == '3')
            Twitter
            @elseif ($value->type == '4')
            Youtube
            @endif</td>


               <td>{{ $value->social_media }}</td>
               <td>  <a href="{{ route('vendor_social_edit',$value->slug) }}"> <button class="btn update-submit-cstmbtn" type="button" data-original-title="btn btn-danger btn-xs" title=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
            </tr>
            @endforeach
        </tbody>
          </table>
    </div>
@endsection

