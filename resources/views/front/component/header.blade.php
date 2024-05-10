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
                <li><a class="d-flex align-items-center" href="{{ url('beranda') }}">Home</a></li>
                <li><a class="d-flex align-items-center" href="{{ url('about-us') }}">About Us</a></li>
                {{-- <li><a class="d-flex align-items-center d-none" href="{{ url('info-learning') }}">Web Guide</a></li> --}}
                @if ( Auth::user() != null )
                <li>
                    <img src="{{ asset('assets/user-icon.svg') }}" id="profile-icon" class="bg-white profile-arrow" width="30" alt="" style="border-radius: 19px;padding: 5px 5px 5px 5px;">
                    <ul class="profile-sub-menu sub-menu ps-0" id="wrapper-sub-menu" style="left: -60px;">
                        <li>
                            <span class="text-white d-flex align-items-center h-50">{{ Auth::user()->name; }}</span>
                        </li>
                        <li>
                            <span class="text-white" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="cursor: pointer;">Logout
                            </span>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
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
