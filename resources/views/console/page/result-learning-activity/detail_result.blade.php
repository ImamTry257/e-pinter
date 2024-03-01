@extends('console.adminlte.layouts.app')

@section('content')
    <div class="content-wrapper">
        @include('console.components.breadcrumb', ['title' => 'Detail Hasil Kegiatan Pembelajaran' . $data_activity->title])
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
                                <h3 class="card-title text-white">Detail Hasil Pembelajaran {{ ' '. $data_activity->title }}</h3>
                            </div>

                            <div class="card-body">
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
@endsection