@extends('layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center" style="  background-position: center;  background-repeat: no-repeat;  background-size: cover;background-image: url({{ asset('/images/login_user_bg.jpg') }})">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
    </div>

    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url({{ asset('/images/login_bg.png') }})">

            </div>
          </div>
          <div class="col-md-8 pl-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2"><span>Login</span></a>
              <h5 class="text-muted font-weight-normal mb-4"></h5>
                        @include('partial.flash_error')

              <form class="forms-sample" action="{{url('/login')}}" method="post" id="form-login" autocomplete="off">

                  {{csrf_field()}}

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="username" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password" name="password">
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    Remember me
                  </label>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="check-square"></i>
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection