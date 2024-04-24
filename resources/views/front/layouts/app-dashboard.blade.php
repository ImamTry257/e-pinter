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

    @include('front.include.css-head')

    <style>
        .btn-save {
            background-color: #00BC29;
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

    <script>
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
        console.log($(".htmlcss-arrow"))
        $(".htmlcss-arrow, #parent-menu").on('click', function() {
            navLinks.classList.toggle("show1");
        })
    </script>
</body>
</html>
