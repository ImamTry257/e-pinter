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
                <div class="text-center file-pdf" id="info-tracker" aria-label="info-tracker"></div>
            </div>

            <div class="text-center">
                <a href="{{ asset('assets/e-pinter/ebook/Panduan E-PINTER.pdf') }}" class="btn bg-white fw-bold" style="font-size: 30px;" download="">DOWNLOAD</a>
            </div>
        </div>
    </div>
</div>

@include('front.page.learning-info.script.js')
@endsection
