<nav>
    <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo">
            <a href="#" class="d-flex align-items-center">
                <img class="icon-header" src="{{ asset('assets/e-pinter/icon/icon-header.svg') }}" alt="" width="30">
                <span class="title-header ps-3">Universitas Negeri Yogyakarta</span>
            </a>
        </div>
        <div class="nav-links d-flex align-items-center">
            <div class="sidebar-logo">
                <span class="logo-name">Logo</span>
                <i class='bx bx-x' ></i>
            </div>
            <ul class="links pt-4">
                <li><a href="{{ url('beranda') }}" class="d-flex align-items-center h-50">Home</a></li>
                <li><a href="{{ url('about-us') }}" class="d-flex align-items-center h-50">About Us</a></li>
                <li><a href="{{ url('beranda') }}" class="d-flex align-items-center h-50">Web Guide</a></li>
                @if ( Auth::user() != null )
                <li><span class="text-dark fw-bold d-flex align-items-center h-50 d-flex align-items-center h-50">{{ Auth::user()->name; }}</span></li>
                <li><i class="fa-regular fa-user"></i></li>
                <li><a class="btn btn-outline-secondary d-flex align-items-center h-50" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form></li>
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
