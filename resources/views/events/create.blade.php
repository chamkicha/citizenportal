@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/management/events/index') }}">Services</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>


<div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Create Service</h6>
                    @include('partial.flash_error')

            <form class="forms-sample" action="{{url('/management/events/store')}}" method="post" id="form-login" autocomplete="off">

                {{csrf_field()}}
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Event Name</label>
                  <input name="ServiceProviderName" required  type="text" class="form-control" placeholder="Enter Event Name">
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Merchants</label>
                    <select class="form-control mb-3" name="status">
                        <option disabled selected="">Select Status</option>
                        @foreach($merchants['result'] as $row)
                            <option value="{{$row['TinNo']}}">{{$row['ServiceProviderName']}}</option>
                        @endforeach
                    </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Event Code</label>
                 <input type="text" readonly value="{{old('EventCode',$eventCode->EventCode)}}" class="form-control" required  name="EventCode" placeholder="EventCode">

                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">MerchantServCode</label>
                    <select id="MerchantServCode" class="form-control mb-3" name="status">

                    </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Owner</label>
                    <select class="form-control mb-3" name="status">
                        <option disabled selected="">Select Status</option>

                        @foreach($owners as $row)
                            <option value="{{$row->OwnerCode}}">{{$row->EventOwner}}</option>
                        @endforeach

                    </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">EventDate</label>
                    <input type="datetime-local" value="{{old('EventDate')}}" class="form-control" required  name="EventDate" placeholder="EventDate">

                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
              </div><!-- Col -->
            </div><!-- Row -->


          <button type="submit" class="btn btn-primary submit">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/form-validation.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
  <script src="{{ asset('assets/js/inputmask.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/tags-input.js') }}"></script>
  <script src="{{ asset('assets/js/dropzone.js') }}"></script>
  <script src="{{ asset('assets/js/dropify.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-colorpicker.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
  <script src="{{ asset('assets/js/timepicker.js') }}"></script>
@endpush