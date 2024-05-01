<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Pinter') }}</title>

    @include('front.include.layouts-evaluation.css-head')
</head>
<body>
    <div id="app" class="h-100">
        <div class="wrapper-main-header" style="z-index: 1000;">
            @include('front.component.header')
        </div>

        <div class="h-100">
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
        let menuOpenBtn = document.querySelector(".navbar .bx-menu");
        let menuCloseBtn = document.querySelector(".nav-links .bx-x");
        menuOpenBtn.onclick = function() {
        navLinks.style.left = "0";
        }
        menuCloseBtn.onclick = function() {
        navLinks.style.left = "-100%";
        }


        // sidebar submenu open close js code
        let htmlcssArrow = document.querySelector(".htmlcss-arrow");
            htmlcssArrow.onclick = function() {
            navLinks.classList.toggle("show1");
        }
        // let moreArrow = document.querySelector(".more-arrow");
        //     moreArrow.onclick = function() {
        //     navLinks.classList.toggle("show2");
        // }
        // let jsArrow = document.querySelector(".js-arrow");
        //     jsArrow.onclick = function() {
        //     navLinks.classList.toggle("show3");
        // }
    </script>

    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>

    @yield('script')
</body>
</html>
