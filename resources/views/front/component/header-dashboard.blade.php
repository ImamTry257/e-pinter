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
                <li><a href="{{ route('book.model') }}" class="text-white">Buku Model</a></li>
                <li>
                    <a href="javascript:void(0);" class="text-white" id="parent-menu">Perangkat Pembelajaran</a>
                    <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
                    <ul class="htmlCss-sub-menu sub-menu ps-0" id="wrapper-sub-menu">
                        <li><a href="{{ route('front.learning-info') }}" class="" id="list-sub-menu">CP, TP & ATP</a></li>
                        <li><a href="{{ route('topic.index') }}" class="" id="list-sub-menu">Topik/Materi</a></li>
                        <li><a href="{{ asset('assets/e-pinter/ebook/MODUL AJAR KINEMATIKA.docx') }}" class="" id="list-sub-menu">Modul Ajar</a></li>
                        @if ( Auth::user() != null )
                        <li><a href="{{ route('front.dashboard') }}" class="" id="list-sub-menu">Kegiatan Pembelajaran</a></li>
                        <li><a href="{{ route('evaluation') }}" class="" id="list-sub-menu">Evaluasi</a></li>
                        @endif
                    </ul>
                </li>
                <li><a href="{{ url('info-epinter') }}" class="text-white d-flex align-items-center h-50">Web Guide</a></li>
                @if ( Auth::user() != null )
                <li>
                    <img src="{{ asset('assets/user-icon.svg') }}" id="profile-icon" class="bg-white profile-arrow" width="30" alt="" style="border-radius: 19px;padding: 5px 5px 5px 5px;">
                    <ul class="profile-sub-menu sub-menu ps-0" id="wrapper-sub-menu" style="left: -60px;">
                        <li>
                            <span class="text-white d-flex align-items-center h-50">{{ Auth::user()->name; }}</span>
                        </li>
                        <li onclick="
                        event.preventDefault();
                        localStorage.removeItem('speaking_counter');

                        setTimeout(function(){
                            document.getElementById('logout-form').submit();
                        }, 200)" style="cursor: pointer;">
                            <span class="text-white">Logout</span>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                {{-- <li><a class="btn btn-outline-secondary d-flex align-items-center h-50" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </li> --}}
                {{-- <li><img src="{{ asset('assets/user-icon.svg') }}" width="20" alt="" data-bs-toggle="dropdown" aria-expanded="false"></li> --}}
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
