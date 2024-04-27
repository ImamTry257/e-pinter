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
        <img src="{{ asset('assets/physics-info.svg') }}" alt="" style="width: 100%;">
    </div>

    <div class="card list-topic-content ms-3 mt-4 p-5 col-lg-11 bg-white">
        <div class="title-list row">
            <div class="col-lg-12">
                <h1 class="text-center fw-bold py-3">Tracker Video Analysis</h1>
                <span class="text-justify d-block">
                    <b>Pada akhir fase F, peserta didik mampu menerapkan konsep dan prinsip vektor kedalam kinematika</b> dan dinamika gerak partikel, usaha dan energi, fluida dinamis, getaran harmonis, gelombang bunyi dan gelombang cahaya dalam menyelesaikan masalah, serta menerapkan prinsip dan konsep energi kalor dan termodinamika dengan berbagai perubahannya dalam mesin kalor. Peserta didik mampu menerapkan konsep dan prinsip kelistrikan (baik statis maupun dinamis) dan kemagnetan dalam berbagai penyelesaian masalah dan berbagai produk teknologi, menerapkan konsep dan prinsip gejala gelombang elektromagnetik dalam menyelesaikan masalah. Peserta didik mampu menganalisis keterkaitan antara berbagai besaran fisis pada teori relativitas khusus, gejala kuantum dan menunjukkan penerapan konsep fisika inti dan radioaktivitas dalam kehidupan sehari-hari dan teknologi. Peserta didik mampu memberi penguatan pada aspek fisika sesuai dengan minat untuk ke perguruan tinggi yang berhubungan dengan bidang fisika. Melalui kerja ilmiah juga dibangun sikap ilmiah dan profil pelajar pancasila khususnya mandiri, inovatif, bernalar kritis, kreatif dan bergotong royong.
                </span>
            </div>

            <div class="col-lg-12 text-center pt-5">
                <a href="https://physlets.org/tracker/" target="_blank" class="btn btn-information px-5 text-white w-50 fs-4">LINK DOWNLOAD SOFTWARE TRACKER</a>
            </div>

            <div class="col-lg-12 text-center pt-2 pb-5">
                <a href="" target="_blank" class="btn btn-information px-5 text-white w-50 fs-4">PANDUAN PENGGUNAAN SOFTWARE TRACKER</a>
            </div>
        </div>

    </div>
</div>

@endsection
