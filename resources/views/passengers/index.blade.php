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
            <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title mb-0">Passengers</h6>
                        
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                        <h3 class="mb-2">{{ number_format($passengers->count()) }}</h3>
                            <div class="row">
                            <div class="col-6 col-md-6 col-xl-6">
                                <p class="text-success"><span>Male</span></p>
                                <p class="text-success"><span>{{ $passengers->where('gender','male')->count() }}</span></p>
                            </div>
                            
                            <div class="col-6 col-md-6 col-xl-6">
                                <p class="text-primary"><span>Female</span></p>
                                <p class="text-primary"><span>{{ $passengers->where('gender','female')->count() }}</span></p>
                            </div>
        
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

            </div>
            </div>
        </div> <!-- row -->
      
            <form class="forms-sample" action="{{url('/passengers/search')}}" method="post" id="form-login" autocomplete="off">

                {{csrf_field()}}
                <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label"><strong>From:</strong> 
                            
                            @if($today == '0')
                            {{ date('d-M-y')}}</p>
                            @else
                            {{ \Carbon\Carbon::parse($request->from)->format('d-M-y H:m') ?? ''}}
                           @endif
                        </label>
                        <input name="from" required  type="datetime-local" class="form-control" placeholder="Enter Role Name">
                    </div>
                </div><!-- Col -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label">
                            <strong>To:</strong>
                            @if($today == '0')
                            {{ date('d-M-y')}}</p>
                            @else
                            {{ \Carbon\Carbon::parse($request->to)->format('d-M-y H:m') ?? ''}}
                           @endif
                        </label>
                        <input name="to" required  type="datetime-local" class="form-control" placeholder="Enter Role Name">
                    </div>
                </div><!-- Col -->

                <div class="col-sm-3">
                
                    <div class="form-group">
                        <label class="control-label"><strong>Name:</strong> 
                          
                        </label>
                        <input id="full_name" name="full_name" type="text" class="form-control" placeholder="Search Name">
                    </div>

                </div><!-- Col -->
                
                <div class="col-sm-3">
                
                    <div class="form-group">
                        <label class="control-label"><strong>Phone Number:</strong> 
                          
                        </label>
                        <input id="mobile_phone" name="mobile_phone" type="text" class="form-control" placeholder="Search Phone No">
                    </div>

                </div><!-- Col -->
                
                <div class="col-sm-3">
                
                    <div class="form-group">
                        <label class="control-label"><strong>Ticket NO:</strong> 
                          
                        </label>
                        <input id="ticket_id" name="ticket_id" type="text" class="form-control" placeholder="Search Ticket NO">
                    </div>

                </div><!-- Col -->
                </div><!-- Row -->

                <button type="submit" class="btn btn-primary submit">Submit</button>

            </form>
        </div>
      

        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                 @include('partial.flash_error')
                    <div id="data">
                        <table class="table table-striped" id="events-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Phone Number</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Bus Plate No</th>
                                <th>Ticket NO</th>
                                <th>Date</th>
                                <th>Seat No</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach( $passengers as $passenger)
                            <tr>
                                
                                <td>{!! $loop->iteration !!}</td>
                                <td>{!! $passenger->full_name !!}</td>
                                <td>{!! $passenger->gender !!}</td>
                                <td>{!! $passenger->mobile_phone !!}</td>
                                <td>{!! $passenger->origin !!}</td>
                                <td>{!! $passenger->destination !!}</td>
                                <td>{!! $passenger->bus_plate_number !!}</td>
                                <td>{!! $passenger->ticket_id !!}</td>
                                <td>{!! \Carbon\Carbon::parse($passenger->departure_time)->format('d-M-y H:m') ?? '' !!}</td>
                                <td>{!! $passenger->seat_number !!}</td>

                                
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

        
        
        <script>
        $('#full_name').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                
                type : 'get',
                url:'{!!URL::to('passengers/search_java')!!}',
                data:{'full_name':$value},
                success:function(data){
                    console.log(data);
                 $('#data').empty().append(data);
                }
            });
        })

        
        $('#mobile_phone').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                
                type : 'get',
                url:'{!!URL::to('passengers/search_java')!!}',
                data:{'mobile_phone':$value},
                success:function(data){
                    console.log(data);
                 $('#data').empty().append(data);
                }
            });
        })

        
        $('#ticket_id').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                
                type : 'get',
                url:'{!!URL::to('passengers/search_java')!!}',
                data:{'ticket_id':$value},
                success:function(data){
                    console.log(data);
                 $('#data').empty().append(data);
                }
            });
        })

    </script>

@endpush

