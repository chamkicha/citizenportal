@extends('layout.master')

@section('content')



<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Merchant</h4>

        <a href="{{ url('/users/create') }}" class="nav-link">
         <button type="button" class="btn btn-primary mb-1 mb-md-0">New User</button>
        </a>

        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Location</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach( $users as $user)

              <tr>
                <td class="py-1">{{$loop->iteration}}</td>
                <td class="py-1">{{$user->full_name}}</td>
                <td class="py-1">{{$user->phone_no}}</td>
                <td class="py-1">{{$user->email}}</td>
                <td class="py-1">{{$user->location}}</td>
                <td class="py-1">
                <button  type="button" class="btn btn-primary btn-icon">
                <a href="{{ url('/user/create') }}" style="color:white;"><i data-feather="edit"></i></a>
                </button>

                <button type="button" class="btn btn-success btn-icon">
                <a href="{{ url('/user/view', $user->id) }}" style="color:white;"><i data-feather="eye"></i></a>
                </button>

                <button type="button" class="btn btn-info btn-icon">
                <a href="{{ url('/user/create') }}" style="color:white;"><i data-feather="check-square"></i></a>
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