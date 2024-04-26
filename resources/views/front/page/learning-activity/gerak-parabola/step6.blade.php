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
                <h5 class="pb-2 fw-bold">Langkah 6: Refleksi</h5>
                <div class="desc-step mt-3">
                    <p class="text-justify p-3">Silahkan presentasikan hasil proyek dan laporanmu secara bergantian.
                        Jadi, kesimpulannya apakah anda dapat memvisulisasikan gambar 1 tersebut? dan Apakah teknologi yang digunakan bisa digunakan untuk memvisualisasi gerak parabola?</p>
                </div>

                <div class="question-a pb-3">
                    <div>
                        <textarea name="" id="input-form-a-1" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-start">
                <a href="javascript:void(0);" class="btn btn-save text-white">Simpan</a>
                <a href="{{ route('front.activity', ['slug' => $slug]) }}" class="btn btn-information text-white">Evaluasi Kegiatan Pembelajaran </a>
            </div>
        </div>
    </div>
</div>

@endsection