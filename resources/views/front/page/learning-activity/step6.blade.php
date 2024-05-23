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
            <div class="wrapper-step-1 pb-4">
                {!! $content !!}
            </div>

            <div class="col-lg-12 text-start">
                <a href="javascript:void(0);" onclick="setAnswers('{{ $step }}',false)" class="btn btn-save text-white">Simpan</a>
                <a href="javascript:void(0);" onclick="setAnswers('{{ $step }}',true)" id="btn-step-6" class="btn btn-information text-white">Evaluasi Kegiatan Pembelajaran</a>

                <input type="hidden" id="is_disabled" value="1">
            </div>
        </div>
    </div>
</div>

@include('front.page.learning-activity.script.js-step')
@endsection
