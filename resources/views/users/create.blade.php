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
    <li class="breadcrumb-item"><a href="{{ url('/merchant/merchant') }}">Merchant</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>


<div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Create Merchant</h6>
                    @include('partial.flash_error')

            <form class="forms-sample" action="{{url('/users/store')}}" method="post" id="form-login" autocomplete="off">

                {{csrf_field()}}
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">First Name</label>
                  <input name="first_name" required  type="text" class="form-control" placeholder="Enter First Name">
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Last Name</label>
                  <input type="text" required data-validation="required"  data-validation-error-msg-required="Last name required" class="form-control" name="last_name" id="last_name"  placeholder="Enter Last Name">
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Telephone Number</label>
                  <input type="text" data-validation="required" data-validation-error-msg-required="Phone Number required" class="form-control" name="phone_no" id="phone_no" placeholder="Enter Telephone Number">
                </div>
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-4">
                
                <div class="form-group">
                <label>Gender</label>
                <select data-validation="required" data-validation-error-msg-required="Gender required" id="gender" name="gender" class="js-example-basic-single w-100">
                    <option selected disabled value="">--select Gender--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Role</label>
                    <select data-validation="required" data-validation-error-msg-required="Merchant name required" name="role"  id="role" class="js-example-basic-single w-100">
                        <option selected disabled value="">--select Role--</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Location</label>
                  <input type="text"  required data-validation="required" pattern="[A-Za-z]*"  data-validation-error-msg-required="Merchant name required" class="form-control" name="location" id="location" placeholder="Enter Location">
                </div>
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input type="email" required data-validation="required" data-validation-error-msg-required="Merchant name required" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>
              </div><!-- Col -->
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <input type="password" required data-validation="required" data-validation-error-msg-required="Merchant name required" class="form-control" name="password" id="password"  placeholder="Enter Password">
                </div>
              </div><!-- Col -->
            </div><!-- Row -->

          <button type="submit" class="btn btn-primary submit">Submit form</button>
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