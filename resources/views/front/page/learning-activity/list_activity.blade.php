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
                        <a href="javascript:void(0);" onclick="startStep(1)" class="disable-step link-step" id="disable-next">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 1.</h4>
                                <span class="text-secondary">Memberikan pertanyaan esensial dari fenomena sekitar</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-end px-1 text-secondary d-block bar-presentase" style="width: 0%;">0%</span>
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
                        <a href="javascript:void(0);" onclick="startStep(2)" class="disable-step link-step" id="disable-next">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 2.</h4>
                                <span class="text-secondary">Menyusun jadwal dan merancang proyek berkelompok</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-end px-1 text-secondary d-block bar-presentase" style="width: 0%;">0%</span>
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
                        <a href="javascript:void(0);" onclick="startStep(3)" class="disable-step link-step" id="disable-next">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 3.</h4>
                                <span class="text-secondary">Pembuatan proyek</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-end px-1 text-secondary d-block bar-presentase" style="width: 0%;">0%</span>
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
                        <a href="javascript:void(0);" onclick="startStep(4)" class="disable-step link-step" id="disable-next">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 4.</h4>
                                <span class="text-secondary">Melakukan eksperimen menggunakan teknologi</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-end px-1 text-secondary d-block bar-presentase" style="width: 0%;">0%</span>
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
                        <a href="javascript:void(0);" onclick="startStep(5)" class="disable-step link-step" id="disable-next">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 5.</h4>
                                <span class="text-secondary">Penyusunan laporan</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-end px-1 text-secondary d-block bar-presentase" style="width: 0%;">0%</span>
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
                        <a href="javascript:void(0);" onclick="startStep(6)" class="disable-step link-step" id="disable-next">
                            <div class="py-1">
                                <h4 class="text-dark">Sintak 6.</h4>
                                <span class="text-secondary">Refleksi</span>
                            </div>
                            <div class="bg-white border border-primary">
                                <span class="text-end px-1 text-secondary d-block bar-presentase" style="width: 0%;">0%</span>
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
        next_step.find('a').attr('id', "{{ route('front.activity.step', ['slug' => $activity_selected['slug'], 'step' => $progress->step_id + 1]) }}").removeClass('disable-step')
    @endforeach


    // when click materi, set data activty
    function startStep(id){
        var element = $('#step-' + id)
        var urlRedirect = element.find('a').attr('id')

        // check is_disabled step
        var isDisableStep = element.find('a').hasClass('disable-step link-step')
        if ( isDisableStep ) {
            return false
        }
        // console.log(element, urlRedirect, isDisableStep)

        return false

        var param = {
            "user_id"               : "{{ $user->id }}",
            "user_group_id"         : "{{ $user->user_group_id }}",
            "activity_master_id"    : "{{ $activity_master_id }}",
            "activity_step_id"      : ( id + 1 ),
        }

        setStep(param, urlRedirect)
    }

    function setStep(param, urlRedirect) {
        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('front.start.step') }}",
            dataType: 'json',
            data: param,
            timeout: 2000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(xhr, obj) {

            },
            success: function(response) {

                if ( response.status ) {
                    location.href = urlRedirect
                }

            },
            error: function(error) {
                // if(error.status == 419 || error.status == 500) {
                //     location.href = '{{ route("login") }}'
                // }

                if (error.statusText == 'timeout') {
                    setProject(param)
                }
            }
        })
    }
</script>

@endsection
