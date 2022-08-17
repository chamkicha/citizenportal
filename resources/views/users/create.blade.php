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
    <li class="breadcrumb-item"><a href="{{ url('/management/users/index') }}">Services</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>


<div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Create Service</h6>
                    @include('partial.flash_error')

            <form class="forms-sample" action="{{url('/users/users/store')}}" method="post" id="form-login" autocomplete="off">

                {{csrf_field()}}
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">

                  <label class="control-label">FullName</label>
                  <input type="text"    value="{{old('password')}}"  class="form-control" required name="full_name" placeholder="FullName">

                
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                    
                    <label class="control-label">Password</label>
                    <input type="text" value="{{old('password')}}" class="form-control" required  name="password" placeholder="Password">

                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">

                  <label class="control-label">PhoneNumber</label>
                  <input type="text" value="{{old('phone_no')}}" class="form-control" required  name="phone_no" placeholder="PhoneNumber">

                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input type="email" value="{{old('email')}}" class="form-control" required  name="email" placeholder="Email">

                </div>
                
              </div><!-- Col -->
              <div class="col-sm-4">
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Role</label>
                  <select type="text"  class="form-control" required  name="role" id="role" >
                      <option selected disabled>--select role--</option>
                      @foreach($roles as $role)
                          <option value="{{$role->id}}">{{$role->name}}</option>
                      @endforeach
                  </select>
              </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                
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

  
  <script>  
    

    function change_role() 
    {
        var selectBox = document.getElementById("role");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        if (selectedValue=="2")
            {
            $('#tin_no').show(200);
            }
        else{
            $('#tin_no').hide(200);
            }
    }

</script>
@endpush