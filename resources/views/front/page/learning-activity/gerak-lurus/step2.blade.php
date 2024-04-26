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
        <img src="{{ asset('assets/img-pemb2.svg') }}" alt="" style="width: 100%;">
    </div>

    <div class="list-topic-content ms-2 p-5 col-lg-11 bg-white">
        <div class="row p-2 px-5">
            <div class="wrapper-step-1 pb-4">
                <h5 class="pb-2 fw-bold">Langkah 2: Menyusun jadwal dan merancang proyek berkelompok</h5>
                <div class="desc-step mt-3">
                    <p class="text-justify p-3">Buatlah jadwal dan rancangan untuk menyelesaikan ilustrasi tersebut yang bisa dilakukan untuk mengerjakan</p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="">
                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="23" height="23" fill="url(#pattern0_198_237)" fill-opacity="0.5"/>
                                <defs>
                                <pattern id="pattern0_198_237" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_198_237" transform="translate(-0.003125) scale(0.003125)"/>
                                </pattern>
                                <image id="image0_198_237" width="322" height="320" xlink:href="data:image/png;base64,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"/>
                                </defs>
                                </svg>

                            <span class="pt-1">Jadwal dan Rancang Proyek</span></h5>
                        <hr>

                        <div class="py-3 row">
                            <label for="date" class="col-sm-2 col-form-label">Tanggal <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="date">
                            </div>
                        </div>

                        <div class="py-3 row">
                            <label for="hour" class="col-sm-2 col-form-label">Jam <span class="text-danger">*</span></label>
                            <div class="col-sm-2">
                                <input type="time" class="form-control" id="start_time">
                            </div>
                            <div class="col-sm-2">
                                <input type="time" class="form-control" id="end_time">
                            </div>
                        </div>

                        <div class="py-3 row">
                            <label for="title" class="col-sm-2 col-form-label">Judul <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title">
                            </div>
                        </div>

                        <div class="py-3 row">
                            <label for="desc" class="col-sm-2 col-form-label">Descriptions <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="answer-a" id="step-2" class="form-control" cols="30" rows="30"></textarea>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="javascript:void(0);" class="btn btn-information text-white">Create</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-start">
                <a href="javascript:void(0);" class="btn btn-save text-white">Simpan</a>
                <a href="{{ route('front.activity.step', ['slug' => $slug, 'step' => 3]) }}" class="btn btn-information text-white">Selanjutnya Sintak 3.</a>
            </div>
        </div>
    </div>
</div>

@include('front.page.learning-activity.gerak-lurus.script.js-gm')
@endsection
