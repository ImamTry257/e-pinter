<!-- Main Sidebar Container -->
<div class="main-sidebar sidebar-dark-primary position-relative col-lg-2" id="sidebar-dashboard" style="z-index: -2; position: relative;">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link d-none">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">x
      <span class="brand-text font-weight-light">{{ $title ?? "Laradminlte" }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar pt-4">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center d-none">
            <div class="image d-none">
            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info text-center">
            <a href="#" class="d-block">Website IPA</a>
            </div>
        </div> --}}

        <!-- SidebarSearch Form -->
        <div class="form-inline d-none">
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
        <nav class="pt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="" class="nav-link text-white @if (Route::current()->uri == 'dashboard') {{ 'active-menu' }} @endif">
                        {{-- <i class="nav-icon fas fa-home"></i> --}}
                        <img src="{{ asset('assets/sidebar/sidebar-dashboard.svg') }}" width="25" alt="Dashboard">
                        <p class="ps-3">Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link text-white @if (Route::current()->uri == 'admin/learning-activity') {{ 'active-menu' }} @endif">
                        {{-- <i class="nav-icon fas fa-book"></i> --}}
                        <img src="{{ asset('assets/sidebar/sidebar-site-home.svg') }}" width="25" alt="Site Home">
                        <p class="ps-3">Site Home</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link text-white @if (Route::current()->uri == 'admin/result-learning-activity') {{ 'active-menu' }} @endif">
                        {{-- <i class="nav-icon fas fa-table"></i> --}}
                        <img src="{{ asset('assets/sidebar/sidebar-physics-info.svg') }}" width="25" alt="Physics Info">
                        <p class="ps-3">Physics Info</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-white @if (Route::current()->uri == 'admin/sains-info') {{ 'active-menu' }} @endif">
                        {{-- <i class="nav-icon fas fa-info"></i> --}}
                        <img src="{{ asset('assets/sidebar/sidebar-diskusi.svg') }}" width="25" alt="Site Home">
                        <p class="ps-3">Diskusi</p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="" class="nav-link text-white @if (Route::current()->uri == 'admin/potential') {{ 'active-menu' }} @endif">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>Potensial Gudeg Lokal</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link text-white @if (Route::current()->uri == 'admin/user') {{ 'active-menu' }} @endif">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Data Siswa</p>
                    </a>
                </li> --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </div>