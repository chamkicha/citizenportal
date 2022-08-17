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
            <form class="forms-sample" action="{{url('/transactions/search')}}" method="post" id="form-login" autocomplete="off">

                {{csrf_field()}}
                <h4 class="mb-3 mb-md-0">Transactions By Date</h4><br>
                <div class="row">
                <div class="col-sm-4">
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
                <div class="col-sm-4">
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
                <div class="col-sm-4">
                
                </div><!-- Col -->
                </div><!-- Row -->

                <button type="submit" class="btn btn-primary submit">Submit</button>

            </form>
        </div>
      
        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title mb-0">Transactions</h6>
                        
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                        <h3 class="mb-2">{{ number_format($transactions->count()) }}</h3>
                            <div class="row">
                            <div class="col-6 col-md-6 col-xl-6">
                                <p class="text-success"><span>Online</span></p>
                                <p class="text-success"><span>{{ $transactions->where('payment_channel','online')->count() }}</span></p>
                            </div>
                            
                            <div class="col-6 col-md-6 col-xl-6">
                                <p class="text-primary"><span>Cash</span></p>
                                <p class="text-primary"><span>{{ $transactions->where('payment_channel','cash')->count() }}</span></p>
                            </div>
        
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title mb-0">Transactions Amount(Tsh)</h6>
                        
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                        <h3 class="mb-2">{{ number_format($transactions->sum('amount'),2) }}</h3>
                        
                        <div class="row">
                            <div class="col-6 col-md-6 col-xl-6">
                            <p class="text-success"><span>Online</span></p>
                            <p class="text-success"><span>{{ number_format($transactions->where('payment_channel','online')->sum('amount'),2) }}</span></p>
                            </div>
                            
                            <div class="col-6 col-md-6 col-xl-6">
                            <p class="text-primary"><span>Cash</span></p>
                            <p class="text-primary"><span>{{ number_format($transactions->where('payment_channel','cash')->sum('amount'),2) }}</span></p>
                            </div>
        
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">LATRA LEVY (Tsh)</h6>
                        
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                        <h3 class="mb-2">{{ number_format($transactions->sum('bill_amount')*0.005,2) }}</h3>
                        
                        <div class="row">
                            <div class="col-6 col-md-6 col-xl-6">
                            <p class="text-success"><span>Paid</span></p>
                            <p class="text-success"><span>{{ number_format($transactions->where('payment_channel','online')->sum('bill_amount')*0.005,2) }}</span></p>
                            </div>
                            
                            <div class="col-6 col-md-6 col-xl-6">
                            <p class="text-danger"><span>Debt</span></p>
                            <p class="text-danger"><span>{{ number_format($transactions->where('payment_channel','cash')->sum('bill_amount')*0.005,2) }}</span></p>
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
      

        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                 @include('partial.flash_error')
                <table class="table table-striped" id="events-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Finance <br>Name</th>
                        <th>A/C No</th>
                        <th>A/C Name</th>
                        <th>Ticket No</th>
                        <th>Bill Ref</th>
                        <th>TRA Code</th>
                        <th>Ticket <br>Amount (Tsh)</th>
                        <th>Settlement <br>Amount (Tsh)</th>
                        <th>Settlement <br>Status</th>
                     </tr>

                    </thead>
                    <tbody>
                    @foreach( $transactions as $transaction)
                    <tr>
                        
                        <td>{!! $loop->iteration !!}</td>
                        <td>{!! $transaction->beneficiary_fi_name !!}</td>
                        <td>{!! $transaction->beneficiary_account_number !!}</td>
                        <td>{!! $transaction->beneficiary_account_name !!}</td>
                        <td>{!! $transaction->ticket_id !!}</td>
                        <td>{!! $transaction->bill_reference !!}</td>
                        <td>{!! $transaction->tra_code !!}</td>
                        <td>{!! number_format($transaction->bill_amount,2) !!}</td>
                        <td>{!! number_format($transaction->amount,2) !!}</td>
                        
                        <td>
                        
                            @if($transaction->beneficiary_fi_transaction_status == 'completed')
                            <span class="badge badge-success">Completed</span>
                            @elseif($transaction->beneficiary_fi_transaction_status == 'processing')
                            <span class="badge badge-info-muted">Processing</span>
                            @elseif($transaction->beneficiary_fi_transaction_status == 'suspended')
                            <span class="badge badge-danger-muted text-white">Suspended</span>
                            @endif
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

