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
                <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse" type="button"><span class="icon"><i data-feather="chevron-down"></i></span></button><span class="title">Hamis Juma</span>
                <p class="description">0713 123 456</p>
              </div>
              <div class="aside-compose"><a class="btn btn-primary btn-block" href="{{ url('/email/compose') }}">Save Result</a></div>
            </div>


          <div class="nav nav-tabs nav-tabs-vertical" id="v-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" style="color:#71748d;" id="v-contacts-tab" data-toggle="pill" href="#v-contacts" role="tab" aria-controls="v-contacts" aria-selected="true"><span class="icon"><i style="height:18px;"data-feather="home"></i></span>Contact Address</a>
            <a class="nav-link" style="color:#71748d;" id="v-birth_death-tab" data-toggle="pill" href="#v-birth_death" role="tab" aria-controls="v-birth_death" aria-selected="false"><span class="icon"><i style="height:18px;"data-feather="user"></i></span>Birth & Death</a>
            <a class="nav-link" style="color:#71748d;" id="v-education-tab" data-toggle="pill" href="#v-education" role="tab" aria-controls="v-education" aria-selected="false"><span class="icon"><i style="height:18px;"data-feather="book"></i></span>Education</a>
            <a class="nav-link" style="color:#71748d;"  id="v-loan-tab" data-toggle="pill" href="#v-loan" role="tab" aria-controls="v-loan" aria-selected="false"><span class="icon"><i style="height:18px;"data-feather="money"></i></span>Loan</a>
            <a class="nav-link" style="color:#71748d;"  id="v-health-tab" data-toggle="pill" href="#v-health" role="tab" aria-controls="v-health" aria-selected="false"><span class="icon"><i style="height:18px;"data-feather="git-branch"></i></span>Health</a>
            <a class="nav-link" style="color:#71748d;"  id="v-employment-tab" data-toggle="pill" href="#v-employment" role="tab" aria-controls="v-employment" aria-selected="false"><span class="icon"><i style="height:18px;"data-feather="feather-file-plus"></i></span>Employment</a>
            <a class="nav-link" style="color:#71748d;"  id="v-travel-tab" data-toggle="pill" href="#v-travel" role="tab" aria-controls="v-travel" aria-selected="false"><span class="icon"><i style="height:18px;"data-feather="trash"></i></span>Travel</a>
            <a class="nav-link" style="color:#71748d;"  id="v-properties-tab" data-toggle="pill" href="#v-properties" role="tab" aria-controls="v-properties" aria-selected="false"><span class="icon"><i style="height:18px;"data-feather="trash"></i></span>Properties</a>
            <a class="nav-link" style="color:#71748d;"  id="v-sports-tab" data-toggle="pill" href="#v-sports" role="tab" aria-controls="v-sports" aria-selected="false"><span class="icon"><i style="height:18px;"data-feather="trash"></i></span>Sports</a>
          </div>
        </div>
        <div class="col-7 col-md-9">
          <div class="tab-content tab-content-vertical border p-3" id="v-tabContent">
            <div class="tab-pane fade show active" id="v-contacts" role="tabpanel" aria-labelledby="v-contacts-tab">
              @include('citizen.contacts')
            </div>
            <div class="tab-pane fade" id="v-birth_death" role="tabpanel" aria-labelledby="v-birth_death-tab">
              @include('citizen.birth_death')
            </div>
            <div class="tab-pane fade" id="v-education" role="tabpanel" aria-labelledby="v-education-tab">
              @include('citizen.education')
            </div>
            <div class="tab-pane fade" id="v-loan" role="tabpanel" aria-labelledby="v-loan-tab">
              @include('citizen.loan')
            </div>
            <div class="tab-pane fade" id="v-health" role="tabpanel" aria-labelledby="v-health-tab">
              @include('citizen.health')
            </div>
            <div class="tab-pane fade" id="v-employment" role="tabpanel" aria-labelledby="v-employment-tab">
              @include('citizen.employment')
            </div>
            <div class="tab-pane fade" id="v-travel" role="tabpanel" aria-labelledby="v-travel-tab">
              @include('citizen.travel')
            </div>
            <div class="tab-pane fade" id="v-properties" role="tabpanel" aria-labelledby="v-properties-tab">
              @include('citizen.loan')
            </div>
            <div class="tab-pane fade" id="v-sports" role="tabpanel" aria-labelledby="v-sports-tab">
              @include('citizen.sports')
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