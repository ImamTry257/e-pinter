@extends('front.layouts.app')

@section('css')
    <style>
        body {
            background-image: url('{{ asset("assets/e-pinter/images/bg-home.svg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position-y: -60px;
        }

        button.btn-register {
            background-color: #B6E0E8;
        }

        button.btn-register:hover {
            background-color: #416A71;
        }

        div.bg-home div.icon-university img {
            width: 7%;
        }

        div.bg-home div h2 {
            text-shadow: -4px -2px #ffffff, 4px 2px #ffffff, 4px -2px #ffffff, -4px 2px #ffffff;
            font-size: 50px;
            color: #005FCF;
        }

        div.title-about p {
            font-size: 18px;
        }

        div.wrapper-content {
            padding-right: 10%;
            padding-left: 10%;
        }

        a.btn-information {
            background-color: #004972;
        }
    </style>
@endsection

@section('content')
<div class="wrapper-main-content d-flex justify-content-center align-items-center">
    <div class="row p-5 bg-home position-absolute top-50 bottom-0">
        <div class="title text-center align-items-center">
            <a href="">
                <img class="w-100" src="{{ asset('assets/e-pinter/images/button-get-started.svg') }}">
            </a>
        </div>
    </div>
</div>

{{-- footer --}}
{{-- @include('front.component.footer') --}}
@endsection
