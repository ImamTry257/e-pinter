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
    <div class="row pt-5 wrapper-title">
        <h1>Refleksi</h1>
        <h6>Materi Makanan dan Sistem Pencernaan</h6>
        <h6>Materi Esensial</h6>
        <div class="">
            <img src="{{ asset('website/images/new-reflection.svg') }}" class="w-100" alt="">
            <span class="fw-bold">Sumber: primaindisoft.com</span>
        </div>
    </div>

    {{--  content  --}}
    <div class="row pt-5 wrapper-content">
        <div>
            <ol>
                <li>Komponen Makanan: Makanan terdiri dari makro nutrisi (karbohidrat, protein, lemak) dan mikro nutrisi (vitamin, mineral) yang diperlukan oleh tubuh untuk fungsi-fungsi vitalnya.</li>
                <li>
                    Fungsi Makanan: Setiap komponen makanan memiliki fungsi khusus dalam tubuh. Misalnya, karbohidrat adalah sumber energi utama, protein penting untuk pertumbuhan dan perbaikan jaringan tubuh, lemak berperan sebagai cadangan energi, dan vitamin/mineral membantu berbagai proses metabolisme.
                </li>
                <li>
                    Gizi Seimbang: Gizi seimbang adalah prinsip memperoleh makanan yang mengandung semua nutrisi yang diperlukan tubuh dalam proporsi yang tepat. Ini termasuk mengonsumsi variasi makanan dari semua kelompok makanan, seperti biji-bijian, protein nabati/hewani, buah-buahan, sayuran, dan produk susu.
                </li>
                <li>
                    Sistem Pencernaan: Sistem pencernaan adalah serangkaian organ dan proses yang terlibat dalam pencernaan makanan. Ini termasuk mulut, kerongkongan, lambung, usus halus, usus besar, dan anus.
                </li>
                <li>
                    Proses Pencernaan: Proses pencernaan dimulai dari mulut, di mana makanan dihancurkan oleh gigi dan dicampur dengan air liur. Kemudian, makanan melewati kerongkongan menuju lambung, di mana asam lambung dan enzim pencernaan membantu mencerna makanan. Setelah itu, nutrisi diabsorpsi oleh usus halus dan sisa-sisa makanan dikeluarkan melalui usus besar sebagai feses.
                </li>
                <li>
                    Organ Pendukung: Organ pendukung dalam sistem pencernaan termasuk pankreas, hati, dan kantung empedu. Pankreas menghasilkan enzim pencernaan, hati memproduksi empedu untuk membantu mencerna lemak, dan kantung empedu menyimpan empedu yang diproduksi oleh hati.
                </li>
                <li>
                    Kesehatan Pencernaan: Pola makan yang sehat dan gaya hidup aktif penting untuk menjaga kesehatan sistem pencernaan. Ini termasuk mengonsumsi makanan seimbang, mengunyah makanan dengan baik, dan menjaga asupan cairan yang cukup.
                </li>
            </ol>
        </div>

        <div class="title-about py-5 px-2 text-center">
            <p class="fw-bold">CINTAI TUBUHMU, MAKAN DENGAN GIZI SEIMBANG SETIAP HARI!</p>
        </div>

        <div class="title-reference text-start pb-5">
            <h1>Referensi</h1>

            <div>
                <p>Nugroho, S. P., & HD, I. P. H. (2020). Gastronomi makanan khas keraton Yogyakarta sebagai upaya pengembangan wisata kuliner. Jurnal Pariwisata, 7(1), 52-62</p>

                <p>Yudhistira, B. (2022). The development and quality of jackfruit-based ethnic food, gudeg, from Indonesia. Journal of Ethnic Foods, 9(1), 19</p>

                <p>Rusdiana, M. (2020). Pengawasan Mutu Bahan Baku Pada Pengolahan Gudeg Kaleng Bu Tjitro 1925 Yogyakarta.</p>

                <p>Suwarno, S., Salamun, S., Tekobuku, A., & Setiawan, A. B. (2017). Gudeg Manggar. Balai Pelestarian Nilai Budaya DI Yogyakarta</p>

                <p>Pradini, R. D. N. A. (2019). Pengawasan Mutu Pada Produk Makanan Kaleng Gudeg Bu Tjitro 1925 Yogyakarta Laporan Praktek Kerja Lapang.</p>
            </div>
        </div>
    </div>

    {{-- footer --}}
    @include('front.component.footer')
</div>
@endsection
