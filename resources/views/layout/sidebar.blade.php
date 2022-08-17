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
      <li class="nav-item {{ active_class(['dashboard']) }}">
        <a href="{{ url('/dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      
      <li class="nav-item {{ active_class(['products/*']) }}">
        <a href="{{ url('/products/index') }}" class="nav-link">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Products</span>
        </a>
      </li>

      
      <li class="nav-item {{ active_class(['categories/*']) }}">
        <a href="{{ url('/categories/index') }}" class="nav-link">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Categories</span>
        </a>
      </li>
      
      <li class="nav-item {{ active_class(['users/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#users" role="button" aria-expanded="{{ is_active_route(['users/*']) }}" aria-controls="users">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Users</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['users/*']) }}" id="users">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('users/users/index') }}" class="nav-link {{ active_class(['users/users/*']) }}">Users</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('users/role/index') }}" class="nav-link {{ active_class(['users/role/*']) }}">Role</a>
            </li>
          </ul>
        </div>
      </li>



    </ul>
  </div>
</nav>
