@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        div.banner-site-home {
            background-image: url("{{ asset('assets/about.svg') }}");
            background-size: cover;
            height: 380px;
            padding-left: 150px;
        }

        div.banner-site-home h2 {
            font-size: 60px;
        }

        span {
            font-size: 25px;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 row">

    {{-- banner main --}}
    <div class="main-banner banner-site-home ms-2 col-lg-11 d-flex align-items-center">
        <h2 class="text-white fw-bold">Tentang E-PINTER</h2>
    </div>

    <div class="card list-topic-content ms-2 mt-4 py-5 px-2 col-lg-11 bg-white">
        <div class="title-list row">
            <div class="col-lg-12">
                <h2 class="text-center fw-bold pt-3 pb-5">Tentang E-PINTER</h2>
                <span class="text-justify d-block px-5">
                    <b>E-Learning Project Inkuiri Terbimbing (E-PINTER), merupakan E-Learning yang digunakan untuk siswa SMA pada mata pelajaran Fisika dengan tujuan mempermudah pemahaman siswa terkait project dan percobaan ilmiah mata pelajaran fisika. E-learning ini juga mempermudah guru dalam pembelajaran di kelas. E-learning ini dikembangkan oleh Aditya Yoga Purnama, Prof. Dr Ariswan, M.Si, Prof. Dr Edi Istiyono, M.Si dan team.</b>
                </span>

                <span class="text-justify d-block p-5">
                    <b>Semoga bermanfaat dan selamat belajar!</b>
                </span>

                <span class="text-justify d-block px-5">
                    <b>
                        Salam hangat dari kami, <br/>
                        Aditya Yoga Purnama, Prof. Dr. Ariswan, M.Si & Prof. Dr. Edi Istiyono, M.Si
                    </b>
                </span>
            </div>
        </div>
    </div>
</div>

@endsection
