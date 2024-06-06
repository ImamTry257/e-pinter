@extends('front.layouts.app-dashboard')

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
            border-radius: 50px !important;
            background-color: #4CE780;
            font-size: 35px;
        }

        a.link-evalution:hover{
            background-color: #1D773B;
        }
    </style>
@endsection

@section('content')
<div class="wrapper-dahboard-page col-lg-10 row">
    <div class="card list-topic-content ms-3 py-5 px-2 col-lg-11 bg-white" style="height: 1000px;">
        <div class="title-list row d-flex justify-content-center">
            <div class="col-lg-8 d-flex justify-content-center">
                <div class="wrapper-form col-12 px-2 mt-5 text-center">
                    <h1 class="pb-5 fw-bold">EVALUASI PEMBELAJARAN</h1>
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSerfY8aU433LCEi7fsOk0tbRqNvRrbpwxUgQNGM9sN-v_AHlQ/viewform" target="_blank" class="btn w-50 fw-bold px-5 py-3 text-white link-evalution">Klik Disini</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
