<nav class="navbar navbar-expand-lg navbar-light" id="topnav" style="background: #152e4d;">
  <div class="container">

    <!-- Toggler -->
    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="background-image: url('@yield('nav-icon')')!important;"></span>
    </button>

    <!-- User -->
    <div class="navbar-user">

      <!-- Dropdown -->
      <div class="dropdown">

        <!-- Toggle -->
        <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div style="border-radius: 50%; width: 2.5rem; height: 2.5rem; padding: 0.6rem; background: #B8B8B8; text-align: center;">CO</div>
        </a>

        <!-- Menu -->
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>

      </div>

    </div>

    <!-- Collapse -->
    <div class="collapse navbar-collapse mr-lg-auto order-lg-first" id="navbar">

      <!-- Form -->
      <form class="mt-4 mb-3 d-md-none">
        <input type="search" class="form-control form-control-rounded" placeholder="Search" aria-label="Search">
      </form>

      <!-- Navigation -->
      <ul class="navbar-nav mr-lg-auto">
        <li class="nav-item">
          <a style="color: white;" class="nav-link @yield('dash')" href="{{route('companies.home')}}" id="topnavDashboards" role="button" aria-haspopup="true" aria-expanded="false">
            Companies
          </a>
        </li>
        <li class="nav-item">
          <a style="color: white;" class="nav-link @yield('survey')" href="{{route('employees.home')}}">
            Employees
          </a>
        </li>
      </ul>

    </div>

  </div> <!-- / .container -->
</nav>