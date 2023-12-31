@extends('layouts.simple.master')
@section('title', 'Project List')
@section('title', 'Base Inputs')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Paypal</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Paypal</li>
    <li class="breadcrumb-item active"> Product</li>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-header">
                  <h5>Create Product</h5>
              </div>

              {{-- {{ route("Package_store") }} --}}
                  <form class="form theme-form"id="" action="{{ route("product.store") }}" enctype="multipart/form-data" method="post">
                      @csrf
                  <div class="card-body">
                      <div class="row">
                          <div class="col">
                              <div class="mb-3">
                                  <label for="exampleFormControlInput10">Plan Name.*</label>
                                  <input name="name" class="form-control btn-square" value="{{ old('name') }}"  id="exampleFormControlInput10" type="text" placeholder="Video Streaming Service Plan">
                              </div>
                          </div>
                      </div>
                      {{-- <div class="row">
                          <div class="col">
                              <div class="mb-3">
                                  <label for="exampleFormControlInput10">Plan ID.*</label>
                                  <input name="product_id" class="form-control btn-square" value="{{ old('product_id') }}"  id="exampleFormControlInput10" type="text" placeholder="PROD-XXCD1234QWER65782">
                              </div>
                          </div>
                      </div> --}}
                      <div class="row">
                          <div class="col">
                              <div class="mb-3">
                                  <label for="exampleFormControlInput10">Short Description.*</label>
                                  <input name="description" class="form-control btn-square" value="{{ old('description') }}"  id="exampleFormControlInput10" type="text" placeholder="Video Streaming Service basic plan">
                              </div>
                          </div>
                      </div>
                      {{-- <div class="row">
                          <div class="col">
                              <div class="mb-3">
                                  <label for="exampleFormControlInput10">Type.*</label>
                                  <input name="type" class="form-control btn-square"  id="exampleFormControlInput10" type="text" value="{{ old('type') }}" placeholder="Type">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col">
                              <div class="mb-3">
                                  <label for="exampleFormControlInput10">Category.*</label>
                                  <input name="category" value="usd" class="form-control btn-square"  id="exampleFormControlInput10" type="text" value="{{ old('category') }}" placeholder="category">
                              </div>
                          </div>
                      </div> --}}
                      {{-- <div class="row">
                          <div class="col">
                              <div class="mb-3">
                                  <label for="exampleFormControlInput10">Interval Count.*</label>
                                  <input name="interval_count" class="form-control btn-square"  id="exampleFormControlInput10" type="number" placeholder="Interval Count">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col">
                              <div class="mb-3">
                                  <label for="exampleFormControlInput10">Billing Period.*</label>

                                      <select name="interval_unit" value="{{ old('interval_unit') }}" class="form-control" style="width:200px;">
                                        <option disabled selected>Select Plan</option>
                                        <option value="WEEK">Weekly</option>
                                        <option value="MONTH">Monthly</option>
                                        <option value="YEAR">Yearly</option>
                                      </select>

                              </div>
                          </div>
                      </div> --}}
                  </div>
                  <div class="card-footer">
                      <button class="btn btn-primary" type="submit">Submit</button>
                      {{-- <input class="btn btn-light" type="reset" value="Cancel"> --}}
                  </div>
              </form>
          </div>
      </div>
    </div>
  </div>

  @endsection

  @section('script')
  <script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
  <script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
  <script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
  <script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
  <script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
  <script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
  <script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
  <script src="{{asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
  <script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>
  <script src="{{asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>

  @if($errors->any())

  @foreach($errors->all() as $error)
  <script>
      toastr.error('{{$error}}');
  </script>
  @endforeach
  @endif
  @endsection
