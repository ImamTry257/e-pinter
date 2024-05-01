@extends('front.layouts.app-evaluation')

@section('css')
    <style>
        .bg-evaluation {
            background-image: url('{{ asset("assets/bg-evaluation.svg") }}');
            background-size: contain;
            background-repeat: no-repeat;
        }

        div.title-form-register span {
            font-size: 35px;
        }

        label, span.title-register {
            font-size: 12px;
        }

        a.link-evalution {
            border-radius: 2.25rem !important;
            background-color: #4CE780;
            font-size: 40px;
        }
    </style>
@endsection

@section('content')
<div style="height: 100vh; margin-top: 250px;" class="bg-evaluation pt-5">
    <div class="row p-5 d-flex justify-content-center">
        <div class="wrapper-form col-xl-6 col-lg-6 col-md-12 col-sm-12 py-5 mt-5">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSerfY8aU433LCEi7fsOk0tbRqNvRrbpwxUgQNGM9sN-v_AHlQ/viewform" target="_blank" class="btn btn-success w-100 fw-bold px-5 py-3 rounded link-evalution">Klik Disini</a>
        </div>
    </div>
</div>
@endsection
