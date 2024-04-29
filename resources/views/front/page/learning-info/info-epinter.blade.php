@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        a.btn-information {
            background-color: #004972;
        }

        .desc-step {
            background-color: #D7EDF9;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 col-md-12 col-sm-12 col-xl-10 row ps-4">
    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11 d-none">
        <img src="{{ asset('assets/img-pemb1.svg') }}" alt="" style="width: 100%;">
    </div>

    <div class="card list-topic-content p-5 col-12">
        <div class="row p-2 px-5">
            <div class="wrapper-step-1 pb-4 text-center">
                <h2>PETUNJUK PENGGUNAAN E-LEARNING</h2>
                <div class="text-center">
                    <img src="{{ asset('assets/peta_konsep.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

@include('front.page.learning-activity.gerak-lurus.script.js-gm')
@endsection
