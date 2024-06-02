@extends('console.adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
    @include('console.components.breadcrumb', ['title' => 'Detail Hasil Kegiatan Pembelajaran' . $activity_selected['title']])
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
                            <h3 class="card-title text-white">Detail Hasil Pembelajaran {{ ' '. $activity_selected['title'] }}</h3>
                        </div>

                        <div class="card-body d-none">
                            <div class="row">
                                <p class="col-sm-1 col-form-label text-start card-title"><b>Nama</b></p>
                                <div class="col-sm-11">
                                    <p class="col-sm-12 col-form-label card-title">: {{ $user_activity->name }}</p>
                                </div>
                                <p class="col-sm-1 col-form-label text-start card-title"><b>Sekolah</b></p>
                                <div class="col-sm-11">
                                    <p class="col-sm-12 col-form-label card-title">: {{ $user_activity->school }}</p>
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

                                @endif
                            </div>
                        </div>

                        <div class="card-body d-none">
                            <div class="row">
                                <p class="col-sm-1 col-form-label text-start card-title"><b>Nama</b></p>
                                <div class="col-sm-11">
                                    <p class="col-sm-12 col-form-label card-title">: {{ $user_activity->name }}</p>
                                </div>
                                <p class="col-sm-1 col-form-label text-start card-title"><b>Sekolah</b></p>
                                <div class="col-sm-11">
                                    <p class="col-sm-12 col-form-label card-title">: {{ $user_activity->school }}</p>
                                </div>
                            </div>
                            <div>
                                @if ( count ( $detail_result ) == 0 )
                                    <div class="alert alert-warning">
                                        <span>Data tidak ditemukan.</span>
                                    </div>
                                @else
                                <div class="">
                                    @if ( $data_activity->id == 1 )
                                        <hr><h3 class="pt-3">Langkah 1: Orientasi dan Identifikasi pada Masalah</h3><hr>
                                    <h6>Mari Baca artikel dan amati gambar di bawah ini</h6>
                                    <h6>
                                        <a href="https://kagama.co/2019/12/19/gudeg-dan-lotek-kurang-mengenyangkan-tapi-mengandung-energi-yang-sangat-tinggi" target="_blank">
                                            https://kagama.co/2019/12/19/gudeg-dan-lotek-kurang-mengenyangkan-tapi-mengandung-energi-yang-sangat-tinggi
                                        </a>
                                    </h6>
                                    <div>
                                        <img src="http://devkarya.my.id:8288/website-ipa-dev/website/images/learning-activity/activity-1.svg" alt="" class="w-25">
                                    </div>
                                    <div class="pb-2">
                                        <span>Gambar makan tidak kenyang tapi sehat</span><br>
                                        <span>Sumber: <a href="www.istockphoto.com" target="_blank">www.istockphoto.com</a></span>
                                    </div>
                                    <div class="desc-step-1">
                                        <p class="text-justify px-2 pt-2">Ani sedang berlibur ke kota Yogyakarta Bersama kedua oang tuanya. Menu makan siang hari ini adalah gudeg. Setelah selesai makan Ani merasa kurang kenyang, padahal makan sesuai porsi biasanya. Akhirnya Ani memutuskan untuk mencari tahu kandungan nutrisi apa saja yang ada dalam gudeg dan berapa jumlah kalori dalam gudeg.</p>
                                    </div>
                                    @elseif ( $data_activity->id == 2 )
                                    <hr><h3 class="pb-2">Langkah 1: Orientasi dan Identifikasi pada Masalah</h3><hr>
                                    <h6>Mari Baca artikel dan amati gambar di bawah ini</h6>
                                    <h6>
                                        <a href="https://enutrisi.com/kalori-gudeg/" target="_blank">
                                            https://enutrisi.com/kalori-gudeg/
                                        </a>
                                    </h6>
                                    <div>
                                        <img src="http://devkarya.my.id:8288/website-ipa-dev/website/images/learning-activity/activity-2.svg" alt="" class="w-25">
                                    </div>
                                    <div class="pb-2">
                                        <span>Gambar kaget melihat berat badan yang naik saat menimbang<br>
                                        <span>Sumber: <a href="https://bobo.grid.id" target="_blank">https://bobo.grid.id</a></span>
                                    </span></div>
                                    <div class="border border-dark desc-step-1">
                                        <p class="text-justify px-2 pt-2">Sarah kaget melihat angka pada timbangan. Sarah mengalami kenaikan berat badan. Hari ini di rumah Sarah ada acara arisan keluarga dengan menu gudeg. Akan tetapi Sarah galau mau makan gudeg atau tidak karena berat badannya yang naik. Jadi Sarah memutuskan untuk tetap memakan gudeg dengan mencari tahu zat aditif yang mungkin bisa diganti agar bisa dimakan olehnya yang sedang diet.</p>
                                    </div>
                                    @else
                                    <hr><h3 class="pb-2">Langkah 1: Orientasi dan Identifikasi pada Masalah</h3><hr>
                                    <h6>Mari Baca artikel dan amati gambar di bawah ini</h6>
                                    <h6>
                                        <a href="https://travel.kompas.com/read/2016/11/19/131000227/selain.enak.gudeg.juga.baik.untuk.kesehatan" target="_blank">
                                            https://travel.kompas.com/read/2016/11/19/131000227/selain.enak.gudeg.juga.baik.untuk.kesehatan
                                        </a>
                                    </h6>
                                    <div>
                                        <img src="http://devkarya.my.id:8288/website-ipa-dev/website/images/learning-activity/activity-3.svg" alt="" class="w-25">
                                    </div>
                                    <div class="pb-2">

                                        <span>Gambar makan dan organ pencernaan</span><br>
                                        <span>Sumber: <a href="https://www.ekaikhsanudin.net"> https://www.ekaikhsanudin.net</a></span>

                                    </div>
                                    <div class="border border-dark desc-step-1">
                                        <p class="text-justify px-2 pt-2">Lala dan keluarga sedang makan malam dengan menu gudeg di salah satu tempat makan. Lala sangat bersemangat dan lahap ketika makan, namun di tengah2 makan Lala tersedak karena bercanda dengan kakaknya. Gudeg yang dimakan keluar dari mulut dan ada yang dari hidung. Lala menangis dan bertekad mencari tahu jalu sistem pencernaan yang ada di tubuh agar berhati-hati ketika makan</p>
                                    </div>
                                    @endif

                                </div>
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach ( $detail_result as $index => $data )
                                    @php
                                    if ( ( $index - 1 ) > 0 ) {
                                        if ($detail_result[$index]->learning_activities_id != $detail_result[$index - 1]->learning_activities_id) {
                                            $counter++;

                                            echo '<hr><h3 class="pt-3">Langkah ' . ($counter + 2) .': '. $data->title . '</h3><hr>';

                                        }
                                    } elseif ( $index == 0 ) {
                                        echo '<hr><h3 class="pt-3">Langkah 2: '. $data->title . '</h3><hr>';
                                    }
                                    @endphp
                                        <div class="row">
                                            <p class="col-sm-2 col-form-label text-start"><b>Pertanyaan</b></p>
                                            <div class="col-sm-10">
                                                <div class="col-sm-12 col-form-label">
                                                    : {!! $data->question !!}
                                                </div>
                                            </div>
                                            <hr>
                                            <p class="col-sm-2 col-form-label text-start"><b>Jawaban</b></p>
                                            <div class="col-sm-10">
                                                <p class="col-sm-12 col-form-label fw-bold">: {!! $data->answer !!}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
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

        var param = {
            "user_id"               : "{{ 1 }}",
            "user_group_id"         : "{{ 1 }}",
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
