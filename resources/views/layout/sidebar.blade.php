<nav class="sidebar">
  <div class="sidebar-header">
    <a href="{{ url('/dashboard') }}" class="sidebar-brand">
      
        <div class="figure">
          <img src="{{ asset('/images/logo_white.png') }}" alt="userr" style="width:100px;">
        </div>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['/']) }}">
        <a href="{{ url('/dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      
      <li class="nav-item nav-category">web apps</li>

      <li class="nav-item {{ active_class(['management/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#management" role="button" aria-expanded="{{ is_active_route(['management/*']) }}" aria-controls="management">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Management</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['management/*']) }}" id="management">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/management/services/index') }}" class="nav-link {{ active_class(['management/services/*']) }}">Services</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/management/services_provider/index') }}" class="nav-link {{ active_class(['management/services_provider/*']) }}">Service Provider</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/management/events/index') }}" class="nav-link {{ active_class(['management/events/*']) }}">Events</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/management/users/index') }}" class="nav-link {{ active_class(['/management/users/*']) }}">Users</a>
            </li>
            {{--  <li class="nav-item">
              <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['merchant/compose']) }}">Consumers</a>
            </li>  --}}
          </ul>
        </div>
      </li>

      <li class="nav-item {{ active_class(['validation/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#validation" role="button" aria-expanded="{{ is_active_route(['validation/*']) }}" aria-controls="validation">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Validation</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['validation/*']) }}" id="validation">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/validation/index') }}" class="nav-link {{ active_class(['validation/index']) }}">Validate Ticket By Ref</a>
            </li>
          </ul>
        </div>
      </li>


      

      <li class="nav-item {{ active_class(['tickets/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#tickets" role="button" aria-expanded="{{ is_active_route(['tickets/*']) }}" aria-controls="tickets">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Ticket</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['tickets/*']) }}" id="tickets">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/tickets/searchBydate') }}" class="nav-link {{ active_class(['tickets/searchBydate']) }}">Tickets by Date</a>
            </li>
          </ul>
        </div>
      </li>



      <li class="nav-item nav-category">Citizen</li>
      <li class="nav-item {{ active_class(['Citizen/*']) }}">
        <a href="{{ url('/Citizen/index') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Profiler</span>
        </a>
      </li>

      <li class="nav-item nav-category">Setting</li>
      <li class="nav-item {{ active_class(['users/*']) }}">
        <a href="{{ url('/users/index') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Users</span>
        </a>
      </li>
      {{--  <li class="nav-item {{ active_class(['apps/calendar']) }}">
        <a href="{{ url('/apps/calendar') }}" class="nav-link">
          <i class="link-icon" data-feather="calendar"></i>
          <span class="link-title">Calendar</span>
        </a>
      </li>  --}}


    </ul>
  </div>
</nav>
