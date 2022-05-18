@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="row inbox-wrapper">
  <div class="col-lg-12">

   <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-5 col-md-3 email-aside border-lg-right">

            <div class="aside-content">
              <div class="aside-header">
                <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse" type="button"><span class="icon"><i data-feather="chevron-down"></i></span></button><span class="title">{{$tinNo}}</span>
                <p class="description">{{$tinNo}}</p>
              </div>
              <div class="aside-compose"><a class="btn btn-primary btn-block" href="{{ url('/email/compose') }}">Save Result</a></div>
            </div>


          <div class="nav nav-tabs nav-tabs-vertical" id="v-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" style="color:#71748d;" id="v-service-tab" data-toggle="pill" href="#v-service" role="tab" aria-controls="v-service" aria-selected="true"><span class="icon"><i style="height:18px;"data-feather="home"></i></span>Services</a>
            <a class="nav-link" style="color:#71748d;" id="v-events-tab" data-toggle="pill" href="#v-events" role="tab" aria-controls="v-events" aria-selected="false"><span class="icon"><i style="height:18px;"data-feather="user"></i></span>Events</a>
            <a class="nav-link" style="color:#71748d;" id="v-event_owner-tab" data-toggle="pill" href="#v-event_owner" role="tab" aria-controls="v-event_owner" aria-selected="false"><span class="icon"><i style="height:18px;"data-feather="book"></i></span>Events Owner</a>
          </div>
        </div>
        <div class="col-7 col-md-9">
          <div class="tab-content tab-content-vertical border p-3" id="v-tabContent">
            <div class="tab-pane fade show active" id="v-service" role="tabpanel" aria-labelledby="v-service-tab">
              @include('servicesProvider.service')
            </div>
            <div class="tab-pane fade" id="v-events" role="tabpanel" aria-labelledby="v-events-tab">
              @include('servicesProvider.events')
            </div>
            <div class="tab-pane fade" id="v-event_owner" role="tabpanel" aria-labelledby="v-event_owner-tab">
              @include('servicesProvider.events-owners')
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
  <script src="{{ asset('assets/plugins/prismjs/prism.js') }}"></script>
  <script src="{{ asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
@endpush