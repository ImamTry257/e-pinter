@extends('front.layouts.app')

@section('css')
    <style>
        button.btn-register {
            background-color: #B6E0E8;
        }

        button.btn-register:hover {
            background-color: #416A71;
        }

        div.wrapper-title {
            padding-right: 10%;
            padding-left: 10%;
        }

        div.wrapper-title div.icon-university img {
            width: 7%;
        }

        div.wrapper-title div h2 {
            text-shadow: 2px 2px 20px #2d2a2a;
            font-size: 40px;
            color: #005FCF;
        }

        div.title-about p {
            font-size: 18px;
        }

        div.wrapper-content {
            padding-right: 10%;
            padding-left: 10%;
        }

        div.wrapper-content ol {
            padding-left: 1rem;
        }

        div.wrapper-content ol li {
            text-align: justify;
        }

        a.btn-information {
            background-color: #004972;
        }
    </style>
@endsection

@section('content')
<div>
    {{--  content  --}}
    <div class="row pt-5 wrapper-content pb-5">
        <h3 class="pb-3">Capaian Pembelajaran (CP)</h3>
        <div class="border border-dark">
            <span>Elemen Pemahaman IPA <br/>
            Pada akhir fase D, peserta didik mampu:</span>
            <ol>
                <li>Menjelaskan konsep dasar tentang makanan dan kalori dalam tubuh.</li>
                <li>
                    Mengidentifikasi berbagai jenis makanan dan kelompok nutrisi yang terkandung dalam makanan
                </li>
                <li>
                    Memahami dan menjelaskan jumlah kalori yang seimbang dalam tubuh
                </li>
                <li>
                    Memahami proses pencernaan makanan di dalam tubuh.
                </li>
                <li>
                    Menggambarkan struktur dan fungsi organ-organ utama dalam sistem pencernaan
                </li>
            </ol>
        </div>

        <h3 class="py-3">Tujuan Pembelajaran (TP)</h3>
        <div class="border border-dark">
            <ol>
                <li>Menjelaskan pentingnya makanan dan kalori yang seimbang dalam tubuh</li>
                <li>Menjelaskan berbagai jenis nutrisi yang terkandung dalam makanan serta peranannya bagi tubuh</li>
                <li>Menjelaskan organ-organ pencernaan dalam tubuh</li>
                <li>Mengetahui komponen nutrisi dalam makanan dan fungsinya bagi tubuh</li>
                <li>Memahami proses pencernaan makanan dan peran organ-organ dalam sistem pencernaan</li>
                <li>Mengaplikasikan pengetahuan tentang makanan sehat dalam pemilihan dan penyajian makanan sehari-hari terkait zat aditif makanan</li>
                <li>Mengembangkan kesadaran akan pentingnya pola makan seimbang dan gaya hidup sehat</li>
            </ol>
        </div>

        <h3 class="py-3">Alur Tujuan Pembelajaran (ATP)</h3>
        <div class="border border-dark">
            <ol>
                <li> Pengantar:
                    <ul>
                        <li>Menjelaskan pentingnya makanan dan kalori yang seimbang dalam tubuh</li>
                    </ul>
                </li>
                <li>Jenis-jenis Makanan:
                    <ul>
                        <li>Mengidentifikasi dan mengkategorikan berbagai jenis makanan, seperti karbohidrat, protein, lemak, vitamin, dan mineral.</li>
                        <li>Menjelaskan peran zat aditif pada makanan untuk menjaga pentingnya makan seimbang dan gaya hidup sehat</li>
                        <li>Menjelaskan fungsi dan sumber nutrisi dari setiap jenis makanan.</li>
                    </ul>
                </li>
                <li>Sistem Pencernaan:
                    <ul>
                        <li>Menjelaskan secara umum tentang sistem pencernaan manusia.</li>
                        <li>Menggambarkan proses pencernaan makanan dari mulut hingga usus besar.</li>
                        <li>Menganalisis peran setiap organ dalam sistem pencernaan, seperti mulut, kerongkongan, lambung, usus halus, dan usus besar.</li>
                    </ul>
                </li>
                <li>Evaluasi dan Penutup:
                    <ul>
                        <li>Melakukan evaluasi untuk mengukur pemahaman peserta didik tentang materi makanan dan sistem pencernaan.</li>
                        <li>Menyimpulkan pentingnya pemahaman tentang makanan dan sistem pencernaan dalam menjaga kesehatan dan kesejahteraan tubuh.</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>

    {{-- footer --}}
    @include('front.component.footer')
</div>
@endsection
