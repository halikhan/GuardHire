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

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #d82e6b;
            color: white;
        }
    </style>
    <div class="for-content-tabs">
        <h2 class="top-tabt-heading">Contact List</h2>
        <br><br>

        <table id="customers">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            @foreach ($getVendorContact as $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->message }}</td>
                    <td>{{ $value->phone_number }}</td>
                    <td>
                        <a href="{{ route('contact_delete', $value->id) }}" id="delete"><button
                                class="btn btn-danger btn-xs for-font-color" type="button"
                                data-original-title="btn btn-danger btn-xs" title=""><i class="fa fa-trash"
                                    aria-hidden="true"></i></button></a>
                    </td>
                </tr>
            @endforeach

        </table>
        <div class="d-flex justify-content-around align-item-center mt-5 mb-5">
            {{ $getVendorContact->links() }}
        </div>

    </div>
@endsection

@push('scripts')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}')
            </script>
        @endforeach
    @endif

    @if (Session::has('user_updated'))
        <script>
            swal('User Profile', '{{ Session::get('user_updated') }}', 'success')
        </script>
    @endif

    @if (Session::has('user_error'))
        <script>
            swal('User Profile', '{{ Session::get('user_error') }}', 'success')
        </script>
    @endif

@endpush
