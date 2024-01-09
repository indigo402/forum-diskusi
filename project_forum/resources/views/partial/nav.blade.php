<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right Navbat -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link user-panel" data-toggle="dropdown" href="#">
        <img src="{{asset('/template/dist/img/user2-160x160.jpg')}}" class="img-circle img-bordered-sm" alt="User Image">
        @auth
        <b>{{ Auth::user()->username }}</b>
        @endauth
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          @auth
          <a href="/profile" class="dropdown-item">
           <b>Profile</b> 
          </a>
          @endauth
          @auth
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endauth
      </li>
    </ul>
     <!-- End Right Navbat -->
  </nav>