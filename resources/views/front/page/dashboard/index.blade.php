@extends('front.layouts.app-dashboard')

@section('content')

<div class="wrapper-dahboard-page col-lg-10 row">

    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11">
        <img src="{{ asset('assets/dashboard/fisika-sma-kinematika.svg') }}" alt="" style="width: 100%;">
    </div>

    <div class="list-topic-content ms-2 p-5 col-lg-11 bg-white">
        <div class="title-list row">
            <div class="col-lg-1"></div>
            <div class="col-lg-11">
                <h2>Kinematika</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-5 mb-3">
                <a href="">
                    <img src="{{ asset('assets/dashboard/list-kinematika-pemb1.svg') }}" alt="" class="w-100">
                    <div class="p-3 shadow-lg bg-body">
                        <span class="text-dark">Kegiatan Pembelajaran 1 <br/> Gerak Lurus</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-5 mb-3">
                <a href="">
                    <img src="{{ asset('assets/dashboard/list-kinematika-pemb2.svg') }}" alt="" class="w-100">
                    <div class="p-3 shadow-lg bg-body">
                        <span class="text-dark">Kegiatan Pembelajaran 2 <br/> Gerak Parabola</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5 mb-3">
                <a href="">
                    <img src="{{ asset('assets/dashboard/list-kinematika-pemb3.svg') }}" alt="" class="w-100">
                    <div class="p-3 shadow-lg bg-body">
                        <span class="text-dark">Kegiatan Pembelajaran 3 <br/> Gerak Melingkar</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
