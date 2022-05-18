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

<div class="row">

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Events</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ url('/management/events/create') }}">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Add Event
            </button>
            </a>
        </div>
        </div>
      </div>
      

        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                 @include('partial.flash_error')
                <table class="table table-striped" id="events-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th> Event Name</th>
                        <th>Merchant Name</th>
                        <th>EventCode</th>
                        <th>MerchantServCode</th>
                        <th>Created Date</th>
                        <th>EventDate</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $events['result'] as $event)
                    <tr>
                        <td class="py-1">{{$loop->iteration}}</td>
                        <td class="py-1">{{$event['EventName']}}</td>
                        <td class="py-1">{{$event['ServiceProviderName']}}</td>
                        <td class="py-1">{{$event['EventCode']}}</td>
                        <td class="py-1">{{$event['MerchantServiceCode']}}</td>
                        <td class="py-1">{{ \Carbon\Carbon::parse($event['CreatedDate'])->format('d-M-y H:m') }}</td>
                        <td class="py-1">{{ \Carbon\Carbon::parse($event['EventDate'])->format('d-M-y H:m') }}</td>

                        <td class="py-1">

                            <button type="button" class="btn btn-success btn-icon">
                            <a href="{{ url('/management/events/view', ['EventCode'=>$event['EventCode'],'EventName'=>$event['EventName']]) }}" style="color:white;"><i data-feather="eye"></i></a>
                            </button> 
{{--  
                            <button type="button" class="btn btn-success btn-icon">
                            <a href="{{ url('/management/events/view', $event['EventCode']) }}" style="color:white;"><i data-feather="eye"></i></a>
                            </button>   --}}


                            <button type="button" class="btn btn-primary btn-icon">
                            <a href="{{ url('/management/events/edit', $event['EventCode']) }}" style="color:white;"><i data-feather="edit"></i></a>
                            </button> 

                            <button type="button" class="btn btn-danger btn-icon">
                            <a href="{{ url('/management/events/delete', $event['EventCode']) }}" style="color:white;"><i data-feather="delete"></i></a>
                            </button> 

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


    

    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css') }}">

    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js') }}" ></script>

    <script>
                    $('#events-table').DataTable({
                        responsive: true,
                        pageLength: 10,
                        dom: 'Bfrtip',
                        lengthMenu: [
                                        [ 10, 25, 50, -1 ],
                                        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                                    ],
                        buttons: [
                                {
                                    extend: 'excelHtml5',
                                    title: 'events List'
                                },
                                {
                                    extend: 'pdfHtml5',
                                    title: 'events List'
                                }
                                ,'pageLength'
                        ]
                    });
                    $('#events-table').on( 'page.dt', function () {
                        setTimeout(function(){
                            $('.livicon').updateLivicon();
                        },500);
                    } );
                    $('#events-table').on( 'length.dt', function ( e, settings, len ) {
                        setTimeout(function(){
                            $('.livicon').updateLivicon();
                        },500);
                    } );

        </script>

@endpush

