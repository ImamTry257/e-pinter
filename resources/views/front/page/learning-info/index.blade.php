@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        span, li, ol.atp li.sub-list {
            line-height: 35px;
            font-size: 19px;
        }

        ol.atp li.sub-list {
            list-style-type: disc;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 col-md-12 col-sm-12 col-xl-10 row ps-4">

    <div class="card col-lg-12">
        <h2 class="desc-step mt-5 d-block ps-4 pb-2">Capaian Pembelajaran (CP)</h2>

        <div class="px-4 py-2">
            <span>
                Elemen Pemahaman Fisika <br/>
                Pada akhir fase F, peserta didik mampu: <br/>
            </span>
            <span class="desc-step text-justify d-block">
                <b>Pada akhir fase F, peserta didik mampu menerapkan konsep dan prinsip vektor kedalam kinematika</b> dan dinamika gerak partikel, usaha dan energi, fluida dinamis, getaran harmonis, gelombang bunyi dan gelombang cahaya dalam menyelesaikan masalah, serta menerapkan prinsip dan konsep energi kalor dan termodinamika dengan berbagai perubahannya dalam mesin kalor. Peserta didik mampu menerapkan konsep dan prinsip kelistrikan (baik statis maupun dinamis) dan kemagnetan dalam berbagai penyelesaian masalah dan berbagai produk teknologi, menerapkan konsep dan prinsip gejala gelombang elektromagnetik dalam menyelesaikan masalah. Peserta didik mampu menganalisis keterkaitan antara berbagai besaran fisis pada teori relativitas khusus, gejala kuantum dan menunjukkan penerapan konsep fisika inti dan radioaktivitas dalam kehidupan sehari-hari dan teknologi. Peserta didik mampu memberi penguatan pada aspek fisika sesuai dengan minat untuk ke perguruan tinggi yang berhubungan dengan bidang fisika. Melalui kerja ilmiah juga dibangun sikap ilmiah dan profil pelajar pancasila khususnya mandiri, inovatif, bernalar kritis, kreatif dan bergotong royong.
            </span>
        </div>

        <h2 class="desc-step mt-5 d-block ps-4 py-2">Tujuan Pembelajaran (TP)</h2>

        <div class="px-4 py-2">
            <ol class="border border-primary">
                <li>Memahami konsep gerak lurus melalui percobaan proyek.....</li>
                <li>Menerapkan gerak lurus melalui eksperimen....</li>
                <li>Memahami konsep gerak parabola melalui percobaan proyek</li>
                <li>Menerapakan gerak parabola melalui eksperimen</li>
                <li>Memahami konsep gerak melingkar melalui percobaan proyek.....</li>
                <li>Menerapkan gerak melingkar melalui eksperimen....</li>
            </ol>
        </div>

        <h2 class="desc-step mt-5 d-block ps-4 py-2">Alur Tujuan Pembelajaran (ATP)</h2>

        <div class="px-4 py-2">
            <ol class="border border-primary atp py-3">
                <li> Pengantar :
                    <ul>
                        <li class="sub-list">Memperkenalkan konsep dasar tentang gerak lurus, gerak parabola dan gerak melingkar</li>
                    </ul>
                </li>
                <li> Gerak Lurus :
                    <ul>
                        <li class="sub-list">Mengidentifikasi dan mengkategorikan jenis gerak lurus (gerak lurus beraturan dan gerak lurus berubah beraturan)</li>
                        <li class="sub-list">Menjelaskan besaran fisis meliputi posisi, kecepatan, dan percepatan</li>
                        <li class="sub-list">Menganalisis hukum fisika terkait gerak lurus</li>
                    </ul>
                </li>
                <li> Gerak Parabola
                    <ul>
                        <li class="sub-list">Memahami dan menjelaskan gerak parabola</li>
                        <li class="sub-list">Menjelaskan besaran fisis meliputi posisi, kecepatan, dan percepatan</li>
                        <li class="sub-list">Menganalisis hukum fisika terkait gerak parabola</li>
                    </ul>
                </li>
                <li> Gerak Melingkar
                    <ul>
                        <li class="sub-list">Mengidentifikasi dan mengkategorikan jenis gerak melingkar (gerak melingkar beraturan dan gerak melingkar berubah beraturan)</li>
                        <li class="sub-list">
                            Menjelaskan besaran fisis meliputi posisi, kecepatan, dan percepatan
                        </li>
                        <li class="sub-list">
                            Menganalisis hukum fisika terkait gerak melingkar
                        </li>
                    </ul>
                </li>
                <li> Evaluasi dan Penutup
                    <ul>
                        <li class="sub-list">
                            Melakukan evaluasi untuk mengukur pemahaman peserta didik tentang materi gerak lurus, gerak parabola dan gerak melingkar
                        </li>
                        <li class="sub-list">
                            Menyimpulkan pentingnya pemahaman tentang gerak lurus, gerak parabola dan gerak melingkar dalam kehidupan sehari-hari
                        </li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>

</div>

@endsection
