<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('/template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @auth
             <a href="#" class="d-block"> {{Auth::user()->profile->name}}</a>
        @endauth
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
      
             <li class="nav-item">
            <a href="/pertanyaan" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pertanyaan
              </p>
            </a>
          </li>
          @auth
          <li class="nav-item">
            <a href="/kategori" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Kategori Pertanyaan
              </p>
            </a>
          </li>
          @endauth
        
         
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>