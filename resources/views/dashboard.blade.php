@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />

  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

@endpush

@section('content')
  @include('partial.flash_error')
  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Welcome {{ Auth::user()->full_name }}</h4>
    <div class="spinner-grow spinner-grow-sm" role="status"></div>
  </div>

</div>

<div id="trx">
  <div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h6 class="card-title mb-0">Categories</h6>
              
            <div class="row">
              <div class="col-12 col-md-12 col-xl-12">
                <h3 class="mb-2">10</h3>
                  {{--  <div class="row">
                    <div class="col-6 col-md-6 col-xl-6">
                      <p class="text-success"><span>Online</span></p>
                      <p class="text-success"><span>{{ number_format($transactions->where('payment_channel','online')->count()) }}</span></p>
                    </div>
                    
                    <div class="col-6 col-md-6 col-xl-6">
                      <p class="text-primary"><span>Cash</span></p>
                      <p class="text-primary"><span>{{ number_format($transactions->where('payment_channel','cash')->count()) }}</span></p>
                    </div>

                  </div>  --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h6 class="card-title mb-0">Product</h6>
              
            <div class="row">
              <div class="col-12 col-md-12 col-xl-12">
                <h3 class="mb-2">30</h3>
{{--                  
                <div class="row">
                  <div class="col-6 col-md-6 col-xl-6">
                    <p class="text-success"><span>Online</span></p>
                    <p class="text-success"><span>{{ number_format($transactions->where('payment_channel','online')->sum('amount'),2) }}</span></p>
                  </div>
                  
                  <div class="col-6 col-md-6 col-xl-6">
                    <p class="text-primary"><span>Cash</span></p>
                    <p class="text-primary"><span>{{ number_format($transactions->where('payment_channel','cash')->sum('amount'),2) }}</span></p>
                  </div>

                </div>  --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div> <!-- row -->


</div>




@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>


    

    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css') }}">

    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js') }}" ></script>
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

  {{--  <script>

    setInterval(function(){      
      $.ajax({
            type : 'get',
            url:'{!!URL::to('dashboard/reload')!!}',
            success:function(data){
            $('#trx').empty().append(data);
            }
        });
      console.log('data');
    }, 10000);
    </script>  --}}


  })


@endpush