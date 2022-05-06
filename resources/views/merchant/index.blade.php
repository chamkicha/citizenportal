@extends('layout.master')

@section('content')



<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Merchant</h4>

        <a href="{{ url('/merchant/create') }}" class="nav-link">
         <button type="button" class="btn btn-primary mb-1 mb-md-0">New Merchant</button>
        </a>

        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Tin Number</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Location</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach( $merchants->data as $merchant)

              <tr>
                <td class="py-1">{{$loop->iteration}}</td>
                <td class="py-1">{{$merchant->FullName}}</td>
                <td class="py-1">{{$merchant->Tin}}</td>
                <td class="py-1">{{$merchant->PhoneNumber}}</td>
                <td class="py-1">{{$merchant->Email}}</td>
                <td class="py-1">{{$merchant->Location}}</td>
                <td class="py-1">
                <button  type="button" class="btn btn-primary btn-icon">
                <a href="{{ url('/merchant/create') }}" style="color:white;"><i data-feather="edit"></i></a>
                </button>

                <button type="button" class="btn btn-success btn-icon">
                <a href="{{ url('/merchant/view', $merchant->Tin) }}" style="color:white;"><i data-feather="eye"></i></a>
                </button>

                <button type="button" class="btn btn-info btn-icon">
                <a href="{{ url('/merchant/create') }}" style="color:white;"><i data-feather="check-square"></i></a>
                </button>

                <button type="button" class="btn btn-danger btn-icon">
                <a href="{{ url('/merchant/create') }}" style="color:white;"><i data-feather="delete"></i></a>
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


@endsection