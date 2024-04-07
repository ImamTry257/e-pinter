<nav>
    <div class="navbar">
        <i class='bx bx-menu text-white'></i>
        <div class="logo">
            <a href="#" class="d-flex align-items-center">
                <img class="icon-header" src="{{ asset('assets/e-pinter/icon/icon-header.svg') }}" alt="" width="30">
                <span class="text-white title-header ps-3">Universitas Negeri Yogyakarta</span>
            </a>
        </div>
        <div class="nav-links">
            <div class="sidebar-logo">
                <span class="logo-name text-white">
                    E-Pinter
                </span>
                <i class='bx bx-x text-white'></i>
            </div>
            <ul class="links ps-0">
                <li><a href="{{ url('beranda') }}" class="text-white">Home</a></li>
                <li>
                    <a href="javascript:void(0);" class="text-white" id="parent-menu">Perangkat Pembelajaran</a>
                    <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
                    <ul class="htmlCss-sub-menu sub-menu ps-0" id="wrapper-sub-menu">
                        <li><a href="{{ route('learning') }}" class="" id="list-sub-menu">CP, TP & ATP</a></li>
                        <li><a href="{{ route('topic.index') }}" class="" id="list-sub-menu">Topik/Materi</a></li>
                        <li><a href="{{ route('potential.index') }}" class="" id="list-sub-menu">Potensi Lokal Gudeg</a></li>
                        @if ( Auth::user() != null )
                        <li><a href="{{ route('learning-activity.index') }}" class="" id="list-sub-menu">Kegiatan Pembelajaran</a></li>
                        <li><a href="{{ route('evaluation') }}" class="" id="list-sub-menu">Evaluasi</a></li>
                        @endif
                        <li><a href="{{ route('reflection') }}" class="" id="list-sub-menu">Refleksi</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('beranda') }}" class="text-white">Web Guide</a></li>
                @if ( Auth::user() != null )
                <li><span class="text-dark fw-bold d-flex align-items-center h-50 d-flex align-items-center h-50">{{ Auth::user()->name; }}</span></li>
                {{-- <li><img src="{{ asset('assets/user-icon.svg') }}" width="20" alt="" data-bs-toggle="dropdown" aria-expanded="false"></li> --}}
                <div class="dropdown">
                    {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown button
                    </button> --}}
                    <img src="{{ asset('assets/user-icon.svg') }}" width="20" alt="" data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                      <li style="line-height: 20px;"><a class="dropdown-item active" href="#">Action</a></li>
                      <li style="line-height: 20px;"><a class="dropdown-item" href="#">Another action</a></li>
                      <li style="line-height: 20px;"><a class="dropdown-item" href="#">Something else here</a></li>
                      <li style="line-height: 20px;"><hr class="dropdown-divider"></li>
                      <li style="line-height: 20px;"><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </div>
                {{-- <li><a class="btn btn-outline-secondary d-flex align-items-center h-50" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </li> --}}
                @else
                <li><a href="{{ url('login') }}">Login</a></li>
                <li><a href="{{ url('register') }}">Register</a></li>
                @endif

            </ul>
        </div>
        <div class="search-box d-none">
            <i class='bx bx-search'></i>
            <div class="input-box">
                <input type="text" placeholder="Search...">
            </div>
        </div>
    </div>
</nav>
