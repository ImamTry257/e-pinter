<nav>
    <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo">
            <a href="#" class="d-flex align-items-center">
                <img class="icon-header" src="{{ asset('assets/e-pinter/icon/icon-header.svg') }}" alt="" width="30">
                <span class="title-header ps-3 text-white">Universitas Negeri Yogyakarta</span>
            </a>
        </div>
        <div class="nav-links d-flex align-items-center">
            <div class="sidebar-logo">
                <span class="logo-name">Logo</span>
                <i class='bx bx-x' ></i>
            </div>
            <ul class="links pt-4">
                <li><a href="{{ url('beranda') }}" class="d-flex align-items-center h-50 text-white">Home</a></li>
                <li><a href="{{ url('about-us') }}" class="d-flex align-items-center h-50 text-white">About Us</a></li>
                <li>
                    <a href="javascript:void(0);" class="text-white" id="parent-menu">Perangkat Pembelajaran</a>
                    <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
                    <ul class="htmlCss-sub-menu sub-menu ps-0" id="wrapper-sub-menu">
                        <li><a href="{{ route('front.learning-info') }}" class="" id="list-sub-menu">CP, TP & ATP</a></li>
                        <li><a href="{{ route('potential.index') }}" class="" id="list-sub-menu">Buku Model</a></li>
                        <li><a href="{{ route('topic.index') }}" class="" id="list-sub-menu">Topik/Materi</a></li>
                        @if ( Auth::user() != null )
                        <li><a href="{{ route('front.learning.activity') }}" class="" id="list-sub-menu">Kegiatan Pembelajaran</a></li>
                        <li><a href="{{ route('evaluation') }}" class="" id="list-sub-menu">Evaluasi</a></li>
                        @endif
                        <li><a href="{{ route('reflection') }}" class="" id="list-sub-menu">Refleksi</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('beranda') }}" class="text-white d-flex align-items-center h-50">Web Guide</a></li>
                @if ( Auth::user() != null )
                <li>
                    <img src="{{ asset('assets/user-icon.svg') }}" id="profile-icon" class="bg-white profile-arrow" width="30" alt="" style="border-radius: 19px;padding: 5px 5px 5px 5px;">
                    {{-- <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i> --}}
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
