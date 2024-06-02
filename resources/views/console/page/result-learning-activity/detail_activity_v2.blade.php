@extends('console.adminlte.layouts.app')

@section('css')
    <style>
        .border-console {
            border-color: #7BB7C2 !important;
        }

        #progress:after {
            text-align: center
        }

        .disable-step {
            cursor: auto;
        }
    </style>
@endsection

@section('content')
<div class="content-wrapper">
    @include('console.components.breadcrumb', ['title' => 'Detail Hasil Kegiatan Pembelajaran Kinematika untuk ' . $activity_selected['title']])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 pb-2">
                    <a href="{{ route('admin.result.learning.activity.show', ['user_id' => Crypt::encryptString($user_id_enc)]) }}" class="btn bg-console text-white"> Kembali</a>
                </div>
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header bg-console">
                            <h3 class="card-title text-white">Detail Hasil Pembelajaran Kinematika untuk {{ ' '. $activity_selected['title'] }}</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <p class="col-sm-1 col-form-label text-start card-title"><b>Nama</b></p>
                                <div class="col-sm-11">
                                    <p class="col-sm-12 col-form-label card-title">: {{ $user_activity->name }}</p>
                                </div>
                                <p class="col-sm-1 col-form-label text-start card-title"><b>Kelompok</b></p>
                                <div class="col-sm-11">
                                    <p class="col-sm-12 col-form-label card-title">: {{ $group->name }}</p>
                                </div>
                            </div>
                            <div>
                                <div class="list-topic-content ms-2 py-5 px-2 col-lg-11 bg-white">
                                    <div class="title-list row">
                                        <div class="col-lg-12">
                                            <h2>Kinematika</h2>
                                        </div>
                                    </div>

                                    <div class="row p-2">
                                        <div class="col-lg-6 btn-group my-3" id="step-0">
                                            <div class="row px-4 border border-console w-100">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                                                    <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                                                    <a href="javascript:void(0);" onclick="detailStep(0)">
                                                        <div class="py-1">
                                                            <h4 class="text-dark">Pengantar Pembelajaran</h4>
                                                            <span class="text-secondary">Kemajuan Topik </span>
                                                        </div>
                                                        <div class="bg-white border border-console">
                                                            <span class="text-end d-block bar-presentase" style="width: 5%;">0%</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 btn-group my-3" id="step-1">
                                            <div class="row px-4 border border-console w-100">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                                                    <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                                                    <a href="javascript:void(0);" onclick="detailStep(1)" class="disable-step link-step" id="disable-next">
                                                        <div class="py-1">
                                                            <h4 class="text-dark">Sintak 1.</h4>
                                                            <span class="text-secondary">Memberikan pertanyaan esensial dari fenomena sekitar</span>
                                                        </div>
                                                        <div class="bg-white border border-console">
                                                            <span class="text-end d-block bar-presentase" style="width: 5%;">0%</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-lg-6 btn-group my-3" id="step-2">
                                            <div class="row px-4 border border-console w-100">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                                                    <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                                                    <a href="javascript:void(0);" onclick="detailStep(2)" class="disable-step link-step" id="disable-next">
                                                        <div class="py-1">
                                                            <h4 class="text-dark">Sintak 2.</h4>
                                                            <span class="text-secondary">Menyusun jadwal dan merancang proyek berkelompok</span>
                                                        </div>
                                                        <div class="bg-white border border-console">
                                                            <span class="text-end d-block bar-presentase" style="width: 5%;">0%</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 btn-group my-3" id="step-3">
                                            <div class="row px-4 border border-console w-100">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                                                    <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                                                    <a href="javascript:void(0);" onclick="detailStep(3)" class="disable-step link-step" id="disable-next">
                                                        <div class="py-1">
                                                            <h4 class="text-dark">Sintak 3.</h4>
                                                            <span class="text-secondary">Pembuatan proyek</span>
                                                        </div>
                                                        <div class="bg-white border border-console">
                                                            <span class="text-end d-block bar-presentase" style="width: 5%;">0%</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-2">
                                        <div class="col-lg-6 btn-group my-3" id="step-4">
                                            <div class="row px-4 border border-console w-100">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                                                    <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                                                    <a href="javascript:void(0);" onclick="detailStep(4)" class="disable-step link-step" id="disable-next">
                                                        <div class="py-1">
                                                            <h4 class="text-dark">Sintak 4.</h4>
                                                            <span class="text-secondary">Melakukan eksperimen menggunakan teknologi</span>
                                                        </div>
                                                        <div class="bg-white border border-console">
                                                            <span class="text-end d-block bar-presentase" style="width: 5%;">0%</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 btn-group my-3" id="step-5">
                                            <div class="row px-4 border border-console w-100">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                                                    <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                                                    <a href="javascript:void(0);" onclick="detailStep(5)" class="disable-step link-step" id="disable-next">
                                                        <div class="py-1">
                                                            <h4 class="text-dark">Sintak 5.</h4>
                                                            <span class="text-secondary">Penyusunan laporan</span>
                                                        </div>
                                                        <div class="bg-white border border-console">
                                                            <span class="text-end d-block bar-presentase" style="width: 5%;">0%</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-2">
                                        <div class="col-lg-6 btn-group my-3" id="step-6">
                                            <div class="row px-4 border border-console w-100">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                                                    <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                                                    <a href="javascript:void(0);" onclick="detailStep(6)" class="disable-step link-step" id="disable-next">
                                                        <div class="py-1">
                                                            <h4 class="text-dark">Sintak 6.</h4>
                                                            <span class="text-secondary">Refleksi</span>
                                                        </div>
                                                        <div class="bg-white border border-console">
                                                            <span class="text-end d-block bar-presentase" style="width: 5%;">0%</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    dump($step_progress);
@endphp
<script>
    @foreach ($step_progress as $progress)
        var step_element = $('div#step-' + '{{ $progress->step_id }}')
        var bar_presentase = step_element.find('span').last()

        // binding value presentase
        bar_presentase.attr('style', 'width:{{ ( $progress->detail_progress == 0 ) ? "5" : $progress->detail_progress }}%; text-align: end;').addClass('{{ ( $progress->detail_progress == 0 ) ? "" : "bg-console" }}').text('{{ $progress->detail_progress }}%')

        @if ( $progress->step_id == 0 )
            // link for introduction step
            var introduction_step = $('div#step-0')
            introduction_step.find('a').attr('id', "{{ route('admin.detail.result.learning.activity.detail.introduction', ['user_id' => Crypt::encryptString($user_id_enc), 'slug' => Crypt::encryptString($activity_selected['slug']) ]) }}").removeClass('disable-step')
        @else
            // enable next step
            var next_step = $('div#step-' + '{{ $progress->step_id }}')
            var link_next_step = "{{ route('admin.detail.result.learning.activity.detail.step', ['user_id' => Crypt::encryptString($user_id_enc), 'slug' => Crypt::encryptString($activity_selected['slug']), 'step' => Crypt::encryptString($progress->step_id)]) }}";
            next_step.find('a').attr('id', link_next_step).removeClass('disable-step')
        @endif
    @endforeach


    // function to redirect detail result step
    function detailStep(id){
        var element = $('#step-' + id)
        var urlRedirect = element.find('a').attr('id')

        // check is_disabled step
        var isDisableStep = element.find('a').hasClass('disable-step link-step')
        if ( isDisableStep ) {
            return false
        }

        location.href = urlRedirect
    }
</script>
@endsection
