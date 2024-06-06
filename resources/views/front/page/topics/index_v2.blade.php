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

<div class="wrapper-dahboard-page col-lg-10 col-md-12 col-sm-12 col-xl-10 row ps-4" style="height: 1000px;">
    <div class="card list-topic-content py-5 px-2 col-12">
        <div class="row p-2 px-5">
            <div class="wrapper-step-1 pb-4">
                <h2 class="ps-5 fw-bold">Peta Konsep</h2>
                <div class="text-center">
                    <img src="{{ asset('assets/peta_konsep_new.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
