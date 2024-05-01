<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- include libraries(jQuery, bootstrap) -->
<link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}" />

<!-- Styles -->
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">

@include('front.include.layouts-home.css-custom')

<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">

<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">

<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/css/docs.theme.min.css">

@yield('css')

<!-- include summernote css/js-->
<script type="text/javascript" src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('website/js/jquery-3.6.0.min.js') }}"></script>
