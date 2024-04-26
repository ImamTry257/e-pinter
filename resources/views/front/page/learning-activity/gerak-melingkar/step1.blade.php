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

<div class="wrapper-dahboard-page col-lg-10 row">
    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11 d-none">
        <img src="{{ asset('assets/img-pemb1.svg') }}" alt="" style="width: 100%;">
    </div>

    <div class="list-topic-content ms-2 p-5 col-lg-11 bg-white">
        <div class="row p-2 px-5">
            <div class="wrapper-step-1 pb-4">
                <h5 class="pb-2 fw-bold">Langkah 1: Memberikan pertanyaan esensial dari fenomena sekitar</h5>
                <h6>Mari Baca artikel dan amati gambar di bawah ini</h6>
                <div>
                    <img src="{{ asset('assets/pemb2-question-img.svg') }}" alt="" class="w-25">
                </div>
                <div class="desc-step mt-3">
                    <p class="text-justify p-3">Ilustrasi pada gambar tersebut merupakan tembakan kearah jaring olehseorang pemain basket. Akibatnya lintasan bola berbentuk parabolik. Secara fisika ada besaran fisika yang terlibat didalamnya. Bagaimana kita bisamengetahui visualisasi materi fisika yang ada di gambar tersebut ya?</p>
                </div>

                <div class="question-a pb-3">
                    <div class="content-question-a desc-step">
                        <p class="text-justify p-3">Pertanyaan 1. Dari ilustrasi tersebut, materi fisika dan besaran fisika apa yang terlibat dalam peristiwa tersebut!</p>
                    </div>
                    <div>
                        <textarea name="" id="input-form-a-1" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <div class="question-a">
                    <div class="content-question-a desc-step">
                        <p class="text-justify p-3">Pertanyaan 2. Tuliskan persamaan fisika yang terkait dengan gambar tersebut pada kotak jawaban di bawah ini ya</p>
                    </div>
                    <div>
                        <textarea name="" id="input-form-a-1" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-start">
                <a href="javascript:void(0);" class="btn btn-save text-white">Simpan</a>
                <a href="{{ route('front.activity.step', ['slug' => $slug, 'step' => 2]) }}" class="btn btn-information text-white">Selanjutnya Sintak 2.</a>
            </div>
        </div>
    </div>
</div>

@endsection
