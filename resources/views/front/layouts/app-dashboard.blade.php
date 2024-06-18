<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Pinter') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @include('front.include.layouts-dashboard.css-head')

    <style>
        .btn-save {
            background-color: #00BC29;
        }

        a#active-menu {
            background-color: rgba(255,255,255,.1);
        }

        .bg-popup {
            background-color: #004972;
        }
    </style>

    <!-- include summernote css/js-->
    <script type="text/javascript" src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('website/js/jquery-3.6.0.min.js') }}"></script>
</head>
<body>
    <div id="app" class="h-100">
        <div class="wrapper-main-header">
            @include('front.component.header-dashboard')
        </div>

        <div class="wrapper-main-content my-3 row">
            @include('front.component.sidebar-dashboard')

            @yield('content')
        </div>

        <div class="wrapper-footer p-4">
            @include('front.component.footer')
        </div>
    </div>

    <!-- Button trigger modal -->
    <div class="d-none">
        <button type="button" class="btn btn-primary" id="trigger_intro_test" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Launch static backdrop modal
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-popup">
                <h5 class="modal-title text-white" id="staticBackdropLabel">Info Kuisioner</h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <span class="pb-3" style="font-size: 18px;">Silakan pilih Sesi untuk mengerjakan kuisioner berikut :</span>
                </div>

                <div class="d-flex justify-content-evenly mt-3">
                    <a href="{{ route('front.dashboard') }}" class="btn bg-popup text-white">Pre Test</a>
                    <a href="{{ route('front.dashboard') }}" class="btn bg-popup text-white">Post Test</a>
                </div>
            </div>
            {{-- <div class="modal-footer d-flex justify-content-center">
                <a href="{{ route('front.dashboard') }}" class="btn bg-popup text-white">Pre Test</a>
                <a href="{{ route('front.dashboard') }}" class="btn bg-popup text-white">Post Test</a>
            </div> --}}
            </div>
        </div>
    </div>

    <script>

        function triggerIntroTest(){
            $('button#trigger_intro_test').click()
        }

        // search-box open close js code
        let navbar = document.querySelector(".navbar");
        let searchBox = document.querySelector(".search-box .bx-search");
        // let searchBoxCancel = document.querySelector(".search-box .bx-x");

        searchBox.addEventListener("click", ()=>{
        navbar.classList.toggle("showInput");
        if(navbar.classList.contains("showInput")){
            searchBox.classList.replace("bx-search" ,"bx-x");
        }else {
            searchBox.classList.replace("bx-x" ,"bx-search");
        }
        });

        // sidebar open close js code
        let navLinks = document.querySelector(".nav-links");
        console.log(navLinks)
        let menuOpenBtn = document.querySelector(".navbar .bx-menu");
        let menuCloseBtn = document.querySelector(".nav-links .bx-x");
        menuOpenBtn.onclick = function() {
        navLinks.style.left = "0";
        }
        menuCloseBtn.onclick = function() {
        navLinks.style.left = "-100%";
        }


        // sidebar submenu open close js code
        $(".htmlcss-arrow, #parent-menu").on('click', function() {
            navLinks.classList.toggle("show1");
        })

        if ( '{{ Auth::user() }}' == 'undefined' ) {
            localStorage.removeItem('speaking_counter');
            localStorage.clear()
        }
    </script>

    @yield('script')
</body>
</html>
