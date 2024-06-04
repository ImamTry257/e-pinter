@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        #progress:after {
            text-align: center
        }

        span {
            font-size: 27px;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 row">

    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11">
        <img src="{{ asset('assets/physics-info.png') }}" alt="" style="width: 100%;">
    </div>

    <div class="card list-topic-content ms-3 mt-4 py-5 px-2 col-lg-11 bg-white">
        <div class="title-list row d-flex justify-content-center px-5">
            <div class="col-lg-12">
                <h1 class="text-center fw-bold py-3">Tracker Video Analysis</h1>
                <span class="text-justify d-block">
                    Tracker Video Analysis adalah aplikasi yang dikembangkan oleh Java Open Source Physics (OSP) yang dapat membantu siswa mempelajari berbagai fenomena gerak dua dimensi. Aplikasi ini memiliki kemampuan untuk melacak gerak suatu objek, yang memungkinkannya mengumpulkan berbagai informasi yang diperlukan untuk analisis gerak dua dimensi. Dalam aktivitas ini, siswa menggunakan perekam video untuk merekam fenomena gerak yang sebenarnya, dan kemudian hasil rekaman tersebut diolah menggunakan aplikasi Analisis Video Tracker. Dengan menggunakan aplikasi ini, siswa dapat memperoleh berbagai informasi seperti posisi benda (x, y) setiap saat (t), yang memudahkan proses analisis gerak.
                </span>
            </div>

            <div class="col-lg-8 col-xl-7 col-sm-12 col-md-10 text-center pt-5">
                <a href="https://physlets.org/tracker/" target="_blank" class="btn btn-information px-5 text-white w-100 fs-4">LINK DOWNLOAD SOFTWARE TRACKER</a>
            </div>

            <div class="col-lg-8 col-xl-7 col-sm-12 col-md-10 text-center pt-2 pb-5">
                <a href="{{ route('info.trakcer') }}" target="_blank" class="btn btn-information px-5 text-white w-100 fs-4">PANDUAN PENGGUNAAN SOFTWARE TRACKER</a>
            </div>
        </div>

    </div>
</div>

@endsection
