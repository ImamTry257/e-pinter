@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        a.btn-information {
            background-color: #004972;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 row">
    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11 d-none">
        <img src="{{ asset('assets/img-pemb1.svg') }}" alt="" style="width: 100%;">
    </div>

    <div class="list-topic-content ms-2 p-5 col-lg-11 bg-white">
        <div class="row p-2 px-5">
            {!! $content !!}

            <div class="col-lg-12 text-end">
                <a href="{{ route('front.activity.step', ['slug' => $slug, 'step' => 1]) }}" class="btn btn-information text-white">Selanjutnya Sintak 1.</a>
            </div>
        </div>
    </div>
</div>

@endsection
