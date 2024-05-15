@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        #progress:after {
            text-align: center
        }

        .disable-step {
            cursor: auto;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 row">

    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11">
        <img src="{{ asset('assets/') . '/' . $activity_selected['image'] }}" alt="" style="width: 100%;">
    </div>

    <div class="list-topic-content ms-2 p-5 col-lg-11 bg-white">
        <div class="title-list row">
            <div class="col-lg-12">
                <h2>Kinematika</h2>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-lg-6 btn-group my-3" id="step-0">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                        <a href="{{ route('front.activity.introduction', ['slug' => $activity_selected["slug"]]) }}">
                            <div class="py-1">
                                <h4 class="text-dark">Pengantar Pembelajaran</h4>
                                <span class="text-secondary">Kemajuan Topik </span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-end px-1 text-secondary d-block" style="width: 0%;">0%</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 btn-group my-3" id="step-1">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                        <a href="javascript:void(0);" class="disable-step link-step">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 1.</h4>
                                <span class="text-secondary">Memberikan pertanyaan esensial dari fenomena sekitar</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-start px-1 text-secondary d-block bar-presentase" style="width: 50%;">0%</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-lg-6 btn-group my-3" id="step-2">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                        <a href="javascript:void(0);" class="disable-step link-step">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 2.</h4>
                                <span class="text-secondary">Menyusun jadwal dan merancang proyek berkelompok</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-start px-1 text-secondary d-block bar-presentase" style="width: 50%;">0%</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 btn-group my-3" id="step-3">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                        <a href="javascript:void(0);" class="disable-step link-step">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 3.</h4>
                                <span class="text-secondary">Pembuatan proyek</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-start px-1 text-secondary d-block bar-presentase" style="width: 50%;">0%</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-lg-6 btn-group my-3" id="step-4">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                        <a href="javascript:void(0);" class="disable-step link-step">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 4.</h4>
                                <span class="text-secondary">Melakukan eksperimen menggunakan teknologi</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-start px-1 text-secondary d-block bar-presentase" style="width: 50%;">0%</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 btn-group my-3" id="step-5">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                        <a href="javascript:void(0);" class="disable-step link-step">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 5.</h4>
                                <span class="text-secondary">Penyusunan laporan</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-start px-1 text-secondary d-block bar-presentase" style="width: 50%;">0%</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-lg-6 btn-group my-3" id="step-6">
                <div class="row px-4 border border-primary w-100">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 d-flex align-items-center">
                        <img src="{{ asset('assets/progress-icon.svg') }}" width="100" alt="" class="w-100">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xl-10 p-3">
                        <a href="javascript:void(0);" class="disable-step link-step">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 6.</h4>
                                <span class="text-secondary">Refleksi</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-start px-1 text-secondary d-block bar-presentase" style="width: 50%;">0%</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    @foreach ($step_progress as $progress)
        var step_element = $('div#step-' + '{{ $progress->step_id }}')
        var bar_presentase = step_element.find('span').last()

        // binding value presentase
        bar_presentase.attr('style', 'width:{{ $progress->detail_progress }}%').addClass('bg-primary').text('{{ $progress->detail_progress }}%')

        // enable next step
        var next_step = $('div#step-' + '{{ $progress->step_id + 1 }}')
        next_step.find('a').attr('href', "{{ route('front.activity.step', ['slug' => $activity_selected['slug'], 'step' => $progress->step_id + 1]) }}").removeClass('disable-step')
    @endforeach
</script>

@endsection
