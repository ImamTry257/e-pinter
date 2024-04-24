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
                <h5 class="pb-2 fw-bold">Langkah 2: Menyusun jadwal dan merancang proyek berkelompok</h5>
                <div class="desc-step mt-3">
                    <p class="text-justify p-3">Buatlah jadwal dan rancangan untuk menyelesaikan ilustrasi tersebut yang bisa dilakukan untuk mengerjakan</p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5>Jadwal dan Rancang Proyek</h5>
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
                                <textarea name="descriptions" id="desc" class="form-control" cols="30" rows="10"></textarea>
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
                <a href="" class="btn btn-information text-white">Selanjutnya Sintak 2.</a>
            </div>
        </div>
    </div>
</div>

@endsection
