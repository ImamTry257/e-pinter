@extends('front.layouts.app')

@section('css')
    <style>


        div.wrapper-icon,
        button.btn-success,
        a.btn-success  {
            background-color: #002d46;
        }

        h3.title-success {
            font-size: 20px;
        }

        div.wrapper-btn-success {
            background-color: #88DBEA;
            border-bottom-left-radius: .25rem !important;
            border-bottom-right-radius: .25rem !important;
        }

        a.btn-success:hover {
            background-color: #416A71;
        }


    </style>
@endsection

@section('content')
<div style="background-color: #B6E0E8; height: 100vh;">
    <div class="row p-5 d-flex justify-content-center">
        <div class="py-3 col-md-5 text-center">
            <div class="wrapper-icon rounded">
                <div class="py-3">
                    <img src="{{ asset('website/images/icons/icon-success.svg') }}" alt="">
                    <h3 class="text-white title-success">Registration completed successfully</h3 class="text-white title-success">
                </div>

                <div class="wrapper-btn-success py-5">
                    <a href="{{ route('beranda') }}" class="btn btn-success">Continue</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection