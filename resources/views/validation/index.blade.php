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
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />

@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/services/index') }}">Services</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>


<div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Create Service</h6>
                    @include('partial.flash_error')

            <form class="forms-sample" action="{{url('/validation/search')}}" method="post" id="form-login" autocomplete="off">

                {{csrf_field()}}
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label"> Payment reference Number</label>
                  <input name="payRef" required  type="text" class="form-control" placeholder="Enter  Payment reference Number">
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
              </div><!-- Col -->
              <div class="col-sm-4">
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Event</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="EventCode">
                    <option selected disabled>Select Event</option>
                    <option value="1234">SIMBA SC VS ORLANDO PIRETS</option>
                    <option value="1234">SIMBA SC vs USGN</option>
                    <option value="1234">Yanga Vs Mbuna FC</option>
                    <option value="1234">TAIFA STAR VS UGANDA</option>
                    <option value="1234">YANGA vs. RIVERS UNITED</option>
                    </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
  {{--  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body d-flex flex-column align-items-center">
        <p class="card-description">A title with a text under</p>
        <button class="btn btn-primary" onclick="showSwal('title-and-text')">Click here!</button>
      </div>
    </div>
  </div>  --}}
              </div><!-- Col -->
              <div class="col-sm-4">
              </div><!-- Col -->
            </div><!-- Row -->


          {{--  <button class="btn btn-primary" onclick="showSwal('title-and-text')">Search</button>  --}}
          <button type="submit" class="btn btn-primary submit">Search</button>
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
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/promise-polyfill/polyfill.min.js') }}"></script>
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
  <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
@endpush
