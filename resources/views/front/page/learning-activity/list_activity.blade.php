@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        #progress:after {
            text-align: center
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 row">

    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11">
        <img src="{{ asset('assets/') . '/' . $image }}" alt="" style="width: 100%;">
    </div>

    <div class="list-topic-content ms-2 p-5 col-lg-11 bg-white">
        <div class="title-list row">
            <div class="col-lg-12">
                <h2>Kinematika</h2>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-lg-6 btn-group">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 p-3">
                        <a href="{{ route('front.activity.introduction', ['slug' => $slug]) }}">
                            <div class="py-1">
                                <h4 class="text-dark">Pengantar Pembelajaran</h4>
                                <span class="text-secondary">Kemajuan Topik </span>
                            </div>
                            <div>
                                <span class="text-center w-100 border border-primary px-1 text-secondary d-block">0%</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 btn-group">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 p-3">
                        <div class="py-1">
                            <h4 class="text-dark">Sintak 1.</h4>
                            <span class="text-secondary">Memberikan pertanyaan esensial dari fenomena sekitar</span>
                        </div>
                        <div>
                            <span class="text-center w-100 border border-primary px-1 text-secondary d-block">0%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-lg-6 btn-group">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 p-3">
                        <div class="py-1">
                            <h4 class="text-dark">Sintak 2.</h4>
                            <span class="text-secondary">Menyusun jadwal dan merancang proyek berkelompok</span>
                        </div>
                        <div>
                            <span class="text-center w-100 border border-primary px-1 text-secondary d-block">0%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 btn-group">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 p-3">
                        <div class="py-1">
                            <h4 class="text-dark">Sintak 3.</h4>
                            <span class="text-secondary">Pembuatan proyek</span>
                        </div>
                        <div>
                            <span class="text-center w-100 border border-primary px-1 text-secondary d-block">0%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-lg-6 btn-group">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 p-3">
                        <div class="py-1">
                            <h4 class="text-dark">Sintak 4.</h4>
                            <span class="text-secondary">Melakukan eksperimen menggunakan teknologi</span>
                        </div>
                        <div>
                            <span class="text-center w-100 border border-primary px-1 text-secondary d-block">0%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 btn-group">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 p-3">
                        <div class="py-1">
                            <h4 class="text-dark">Sintak 5.</h4>
                            <span class="text-secondary">Penyusunan laporan</span>
                        </div>
                        <div>
                            <span class="text-center w-100 border border-primary px-1 text-secondary d-block">0%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-lg-6 btn-group">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 p-3">
                        <div class="py-1">
                            <h4 class="text-dark">Sintak 6.</h4>
                            <span class="text-secondary">Refleksi</span>
                        </div>
                        <div>
                            <span class="text-center w-100 border border-primary px-1 text-secondary d-block">0%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection