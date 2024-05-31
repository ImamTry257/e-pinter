<nav style="background-color: #fff">
    <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo">
            <a href="#" class="d-flex align-items-center">
                <img class="icon-header" src="{{ asset('assets/e-pinter/icon/icon-header.svg') }}" alt="" width="30">
                <span class="title-header">Universitas Negeri Yogyakarta</span>
            </a>
        </div>
        <div class="nav-links d-none">
            <div class="sidebar-logo">
                <span class="logo-name">Logo</span>
                <i class='bx bx-x' ></i>
            </div>
            <ul class="links">
                <li><a href="{{ url('home') }}">HOME</a></li>
                <li>
                    <a href="#">MENU</a>
                    <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
                    <ul class="htmlCss-sub-menu sub-menu">
                        <li><a href="{{ route('learning') }}">CP, TP & ATP</a></li>
                        <li><a href="{{ route('topic.index') }}">Topik/Materi</a></li>
                        <li><a href="{{ route('potential.index') }}">Potensi Lokal Gudeg</a></li>
                        @if ( \Session::get('data_user_login') != null )
                        <li><a href="{{ route('learning-activity.index') }}">Kegiatan Pembelajaran</a></li>
                        <li><a href="{{ route('evaluation') }}">Evaluasi</a></li>
                        @endif
                        <li><a href="{{ route('reflection') }}">Refleksi</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('sains-info.detail', ['slug' => ( !empty ( $link_sains_info ) ) ? $link_sains_info->slug : 'not-found']) }}">SAINS INFO</a></li>
                <li><a href="{{ route('contact') }}">KONTAK</a></li>
                <li><a href="{{ route('profile') }}">PROFILE</a></li>
                @if ( \Session::get('data_user_login') != null )
                <li><span class="text-dark fw-bold d-flex align-items-center h-50 d-flex align-items-center h-50">{{ \Session::get('data_user_login')->name }}</span></li>
                <li><a class="btn btn-outline-secondary d-flex align-items-center h-50" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form></li>
                @else
                <li><a class="btn btn-dark-register text-white d-flex align-items-center h-50 d-flex align-items-center h-50" href="{{ url('register') }}">DAFTAR</a></li>
                <li><a class="btn btn-outline-secondary d-flex align-items-center h-50" href="{{ url('login') }}">LOGIN</a></li>
                @endif

            </ul>
        </div>
        <div class="search-box">
            <i class='bx bx-search'></i>
            <div class="input-box">
                <input type="text" placeholder="Search...">
            </div>
        </div>
    </div>
</nav>
