<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h6 class="card-title mb-0">Todays Transaction</h6>
              
            <div class="row">
              <div class="col-12 col-md-12 col-xl-12">
                <h3 class="mb-2">{{ number_format($transactions->count()) }}</h3>
                  <div class="row">
                    <div class="col-6 col-md-6 col-xl-6">
                      <p class="text-success"><span>Online</span></p>
                      <p class="text-success"><span>{{ number_format($transactions->where('payment_channel','online')->count()) }}</span></p>
                    </div>
                    
                    <div class="col-6 col-md-6 col-xl-6">
                      <p class="text-primary"><span>Cash</span></p>
                      <p class="text-primary"><span>{{ number_format($transactions->where('payment_channel','cash')->count()) }}</span></p>
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
              <h6 class="card-title mb-0">Todays Total Amount (Tsh)</h6>
              
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
  <div class="col-lg-12 col-xl-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">Today 100 Transaction List</h6>
          
        </div>
        <div class="table-responsive" >
          <table class="table table-hover mb-0" id="events-table">
            <thead>
              <tr>
                <tr>
                    <th>#</th>
                    <th>Finance Name</th>
                    <th>TRX Status</th>
                    <th>Ticket No</th>
                    <th>TRA Code</th>
                    <th>Amount(Tsh)</th>
                </tr>
            </thead>
            <tbody>
              @foreach( $transactions_lists as $transactions_list)
                    <tr>

                      <td>{!! $loop->iteration !!}</td>
                      <td>{!! $transactions_list->beneficiary_fi_name !!}</td>
                      <td>
                      @if($transactions_list->beneficiary_fi_transaction_status == 'completed')
                      <span class="badge badge-success">Completed</span>
                      @elseif($transactions_list->beneficiary_fi_transaction_status == 'processing')
                      <span class="badge badge-info-muted">Processing</span>
                      @elseif($transactions_list->beneficiary_fi_transaction_status == 'suspended')
                      <span class="badge badge-warning">Suspended</span>
                      @endif
                      </td>
                      <td>{!! $transactions_list->ticket_id !!}</td>
                      <td>{!! $transactions_list->tra_code !!}</td>
                      <td>{!! $transactions_list->amount !!}</td>


                        
                    </tr>
                    @endforeach
            </tbody>
          </table>
        </div>
      </div> 
    </div>
  </div>
</div> <!-- row -->