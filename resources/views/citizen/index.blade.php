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
    <li class="breadcrumb-item"><a href="#">Citizen</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profiler</li>
  </ol>
</nav>



<div class="row">

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Citizen Search</h4>
        <p class="card-description">Please fill one of the field for search.</p>
                    @include('partial.flash_error')

        <form class="forms-sample" action="{{url('/Citizen/search')}}" method="post" id="form-login" autocomplete="off">

                {{csrf_field()}}
            
            <div class="form-group row pt-0">
                <div class="col">
                    <label>NIDA Number</label>
                    <div id="the-basics">
                    <input type="text" data-validation="required" pattern="[0-9]*"  data-validation-error-msg-required="Merchant name required" class="typeahead" name="nida" id="nida" placeholder="19901006-12116-00001-21">
                    </div>
                </div>
                <div class="col">
                    <label>Phone Number</label>
                    <div id="bloodhound">
                    <input class="typeahead" type="text" placeholder="(071) 234 567">
                    </div>
                </div>
                <div class="col">
                    <label>Name</label>
                    <div id="bloodhound">
                    <input class="typeahead" type="text" placeholder="Ally Juma">
                    </div>
                </div>
                <div class="col">
                    <label>TIN Number</label>
                    <div id="bloodhound">
                    <input class="typeahead" type="text" placeholder="123-456-789">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
      </div>
      


        @if ($hasCitizen == '0')
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search Result</h4>
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>NIDA</th>
                        <th>TIN</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $citizens as $citizen)
                    <tr>
                        <td class="py-1">{{$loop->iteration}}</td>
                        <td class="py-1">{{$citizen->full_name}}</td>
                        <td class="py-1">{{$citizen->phone_no}}</td>
                        <td class="py-1">{{$citizen->nida}}</td>
                        <td class="py-1">{{$citizen->tin}}</td>
                        <td class="py-1">
                            {{--  <button  type="button" class="btn btn-primary btn-icon">
                            <a href="{{ url('/merchant/create') }}" style="color:white;"><i data-feather="edit"></i></a>
                            </button>  --}}

                            <button type="button" class="btn btn-success btn-icon">
                            <a href="{{ url('/Citizen/view', $citizen->id) }}" style="color:white;"><i data-feather="eye"></i></a>
                            </button>
{{--  
                            <button type="button" class="btn btn-info btn-icon">
                            <a href="{{ url('/merchant/create') }}" style="color:white;"><i data-feather="check-square"></i></a>
                            </button>

                            <button type="button" class="btn btn-danger btn-icon">
                            <a href="{{ url('/merchant/create') }}" style="color:white;"><i data-feather="delete"></i></a>
                            </button>  --}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>
        @endif

    </div>
  </div>
</div>


<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Recent Search</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  User
                </th>
                <th>
                  Name
                </th>
                <th>
                  Progress
                </th>
                <th>
                  Salary
                </th>
                <th>
                  Start date
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="py-1">
                  <img src="{{ url('https://via.placeholder.com/36x36') }}" alt="image">
                </td>
                <td>
                  Cedric Kelly
                </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td>
                  $206,850
                </td>
                <td>
                  June 21, 2010
                </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('https://via.placeholder.com/36x36') }}" alt="image">
                </td>
                <td>
                  Haley Kennedy
                </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td>
                  $313,500
                </td>
                <td>
                  May 15, 2013
                </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('https://via.placeholder.com/36x36') }}" alt="image">
                </td>
                <td>
                  Bradley Greer
                </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td>
                  $132,000
                </td>
                <td>
                  Apr 12, 2014
                </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('https://via.placeholder.com/36x36') }}" alt="image">
                </td>
                <td>
                  Brenden Wagner
                </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td>
                  $206,850
                </td>
                <td>
                  June 21, 2010
                </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('https://via.placeholder.com/36x36') }}" alt="image">
                </td>
                <td>
                  Bruno Nash
                </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td>
                  $163,500
                </td>
                <td>
                  January 01, 2016
                </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('https://via.placeholder.com/36x36') }}" alt="image">
                </td>
                <td>
                  Sonya Frost
                </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td>
                  $103,600
                </td>
                <td>
                  July 18, 2011
                </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ url('https://via.placeholder.com/36x36') }}" alt="image">
                </td>
                <td>
                  Zenaida Frank
                </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td>
                  $313,500
                </td>
                <td>
                  March 22, 2013
                </td>
              </tr>
            </tbody>
          </table>
        </div>
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