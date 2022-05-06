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

            <form class="forms-sample" action="{{url('/merchant/store')}}" method="post" id="form-login" autocomplete="off">

                {{csrf_field()}}
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Merchant Name</label>
                  <input name="name" required  type="text" class="form-control" placeholder="Enter Merchant Name">
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Tin Number</label>
                  <input type="number" required data-validation="required"  data-validation-error-msg-required="Merchant name required" class="form-control" name="tin" id="tin"  placeholder="Enter Tin Number">
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Telephone Number</label>
                  <input type="text" data-validation="required" data-validation-error-msg-required="Merchant name required" class="form-control" name="telephone" id="telephone_number" placeholder="Enter Telephone Number">
                </div>
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-4">
                
                <div class="form-group">
                <label>Region</label>
                <select data-validation="required" data-validation-error-msg-required="Merchant name required" id="mregions" name="region" class="js-example-basic-single w-100">
                    <option selected disabled value="">--select Region--</option>
                    <option value="TX">Texas</option>
                    <option value="NY">New York</option>
                    <option value="FL">Florida</option>
                    <option value="KN">Kansas</option>
                    <option value="HW">Hawaii</option>
                </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">District</label>
                    <select data-validation="required" data-validation-error-msg-required="Merchant name required" name="district"  id="mdistricts" class="js-example-basic-single w-100">
                        <option selected disabled value="">--select District--</option>
                        <option value="TX">Texas</option>
                        <option value="NY">New York</option>
                        <option value="FL">Florida</option>
                        <option value="KN">Kansas</option>
                        <option value="HW">Hawaii</option>
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
                  <label class="control-label">Account</label>
                  <input type="text" required data-validation="required" data-validation-error-msg-required="Merchant name required" class="form-control" name="account" id="account"  placeholder="Enter Account">
                </div>
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Bank Name</label>
                    <select data-validation="required" data-validation-error-msg-required="Merchant name required" name="bank"  id="" class="js-example-basic-single w-100">
                        <option selected disabled value="">--select Bank Name--</option>
                        <option value="TX">Texas</option>
                        <option value="NY">New York</option>
                        <option value="FL">Florida</option>
                        <option value="KN">Kansas</option>
                        <option value="HW">Hawaii</option>
                    </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Bank Branch Name</label>
                  <input type="text" name="branch" id="branch" pattern="[A-Za-z]*" class="form-control" placeholder="Enter Bank Branch Name">
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Merchant Type</label>
                    <select name="merchantType"  id="merchant-type" class="js-example-basic-single w-100">
                        <option selected disabled value="">--select Merchant Type--</option>
                        <option value="TX">Texas</option>
                        <option value="NY">New York</option>
                        <option value="FL">Florida</option>
                        <option value="KN">Kansas</option>
                        <option value="HW">Hawaii</option>
                    </select>
                </div>
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Business License</label>
                  <input type="file"  required data-validation="required" data-validation-error-msg-required="business file required" class="form-control" name="business" id="business">
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Bank Verification License</label>
                  <input type="file" required data-validation="required" data-validation-error-msg-required="bankverification file required" class="form-control" name="bankverification" id="bankverification">
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Tin No Certificate</label>
                  <input type="file" required data-validation="required" data-validation-error-msg-required="tinnocertificate file required" class="form-control" name="tinno_certificate" id="tinno_certificate">
                </div>
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Merchant Group</label>
                    <select class="form-control" name="group_code">
                        <option selected disabled value="">--select group--</option>
                        <option value="TX">Texas</option>
                        <option value="NY">New York</option>
                        <option value="FL">Florida</option>
                        <option value="KN">Kansas</option>
                        <option value="HW">Hawaii</option>
                    </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Viewed on mobile</label>

                    <select class="form-control" name="addMobile">
                        <option selected disabled value="">--select option--</option>
                        <option value="R">Remove</option>

                        <option value="A">Add</option>
                    </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Managed by</label>
                    <select class="form-control" name="managedby"  id="managedby">
                        <option selected disabled value="">--select receipt management type--</option>
                        <option value="TX">Texas</option>
                        <option value="NY">New York</option>
                        <option value="FL">Florida</option>
                        <option value="KN">Kansas</option>
                        <option value="HW">Hawaii</option>
                    </select>
                </div>
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Communication Type</label>
                    <select class="form-control" name="comm_type"  id="comm_type">
                        <option selected disabled value="">--select receipt communication type--</option>
                        <option value="TX">Texas</option>
                        <option value="NY">New York</option>
                        <option value="FL">Florida</option>
                        <option value="KN">Kansas</option>
                        <option value="HW">Hawaii</option>
                    </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                
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