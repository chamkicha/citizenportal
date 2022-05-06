@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="profile-page tx-13">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="profile-header">
        <div class="cover">
          <div class="gray-shade"></div>
          <figure>
            <img src="{{ url('https://via.placeholder.com/1148x272') }}" class="img-fluid" alt="profile cover">
          </figure>
          <div class="cover-body d-flex justify-content-between align-items-center">
            <div>
              <img class="profile-pic" src="{{ url('https://via.placeholder.com/100x100') }}" alt="profile">
              <span class="profile-name">{{$merchantDetails->FullName}}</span>
            </div>
            <div class="d-none d-md-block">
              <button class="btn btn-primary btn-icon-text btn-edit-profile">
                <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
              </button>
            </div>
          </div>
        </div>
        <div class="header-links">
          <ul class="links d-flex align-items-center mt-3 mt-md-0">
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-5 col-xl-4 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="card-title mb-0">Merchants Details</h6>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
              </button>
              
            </div>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Tin:</label>
            <span class="text-muted">{{$merchantDetails->Tin}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Phone Number:</label>
            <span class="text-muted">{{$merchantDetails->PhoneNumber}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
            <span class="text-muted">{{$merchantDetails->Email}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Region Name:</label>
            <span class="text-muted">{{$merchantDetails->RegionName}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">District Name:</label>
            <span class="text-muted">{{$merchantDetails->DistrictName}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Location:</label>
            <span class="text-muted">{{$merchantDetails->Location}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Location:</label>
            <span class="text-muted">{{$merchantDetails->Location}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Merchant Group Name:</label>
            <span class="text-muted">{{$merchantDetails->MerchantGroupName}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Merchant Type Name:</label>
            <span class="text-muted">{{$merchantDetails->MerchantSourceName}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Contact Full Name:</label>
            <span class="text-muted">{{$merchantDetails->ContactFullName}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Contact Phone No:</label>
            <span class="text-muted">{{$merchantDetails->ContactPhoneNo}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Agreement Type:</label>
            <span class="text-muted">{{$merchantDetails->AgreementType}}</span>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Value In Percent:</label>
            <span class="text-muted">{{$merchantDetails->ValueInPercent}}</span>
          </div>
        </div>
      </div>
    </div>
    <!-- left wrapper end -->
    <!-- middle wrapper start -->
    <div class="col-md-5 col-xl-4 middle-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="card-title mb-0">Merchants Wallet Details</h6>
                    <div class="dropdown">
                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    
                    </div>
                </div>
                <div class="mt-3">
                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Wallet No:</label>
                    <span class="text-muted">{{$merchantWalletDetails->WalletNo}}</span>
                </div>
                <div class="mt-3">
                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Currency:</label>
                    <span class="text-muted">{{$merchantWalletDetails->Currency}}</span>
                </div>
                <div class="mt-3">
                
                </div>

                            
                    <div class="col-12 col-xl-12 stretch-card">
                        <div class="row flex-grow">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Previous Balance</label>
                                </div>
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <p class="mb-2 text-info">{{number_format((float)$merchantWalletDetails->Currency)}} Tsh</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Current Balance</label>
                                </div>
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <p class="mb-2 text-success">{{number_format((float)$merchantWalletDetails->Currency)}} Tsh</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
          </div>
        </div>
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="card-title mb-0">Merchant Bank Info</h6>
                    <div class="dropdown">
                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    
                    </div>
                </div>
                <div class="mt-3">
                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Bank Name:</label>
                    <span class="text-muted">{{$Merchant_Bank_Info->BankName}}</span>
                </div>
                <div class="mt-3">
                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Branch:</label>
                    <span class="text-muted">{{$Merchant_Bank_Info->Branch}}</span>
                </div>
                <div class="mt-3">
                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Bank Account Number:</label>
                    <span class="text-muted">{{$Merchant_Bank_Info->BankAccountNumber}}</span>
                </div>
                <div class="mt-3">
                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Mode Of Payment:</label>
                    <span class="text-muted">{{$Merchant_Bank_Info->ModeOfPayment}}</span>
                </div>
                <div class="mt-3">
                
                </div>
                </div>
          </div>
        </div>
      </div>
      
      
    </div>
    <!-- middle wrapper end -->
    <!-- right wrapper start -->
    <div class="d-none d-xl-block col-xl-4 right-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="card-title mb-0">Merchant Services</h6>
                    <div class="dropdown">
                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">

                            <button onclick="showSwal('custom-html')" type="button" class="btn btn-primary mb-1 mb-md-0">Add New Service</button>
                            

                            <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--  @foreach( $merchants->data as $merchant)  --}}

                                <tr>
                                    {{--  <td class="py-1">{{$loop->iteration}}</td>  --}}
                                    <td class="py-1">1</td>
                                    <td class="py-1">Kuuza mechiza sekondar</td>
                                   
                                </tr>
                                {{--  @endforeach  --}}
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                <div class="mt-3">
                
                </div>

                </div>
          </div>
        </div>
        <div class="col-md-12 grid-margin">
          <div class="card rounded">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="card-title mb-0">Merchant Attachment Info</h6>
                    <div class="dropdown">
                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    
                    </div>
                </div>
                <div class="mt-3">
                    <button type="button" style="width:70%;" class="btn btn-primary btn-icon-text">
                    <a href="{{ url('/merchant/view') }}" style="color:white;"> <i class="btn-icon-prepend" data-feather="download"></i></a>
                    Business Llicense
                    </button>
                </div>
                <div class="mt-3">
                    <button type="button" style="width:70%;" class="btn btn-primary btn-icon-text">
                    <i class="btn-icon-prepend" data-feather="download"></i>
                    Bank Verification
                    </button>
                </div>
                <div class="mt-3">
                    <button type="button" style="width:70%;" class="btn btn-primary btn-icon-text">
                    <i class="btn-icon-prepend" data-feather="download"></i>
                    Tin Certificate
                    </button>
                </div>
                <div class="mt-3">
                
                </div>

                </div>
          </div>
        </div>
      </div>
    </div>
    <!-- right wrapper end -->
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/promise-polyfill/polyfill.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
@endpush