@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        a.btn-information {
            background-color: #004972;
        }

        .desc-step {
            background-color: #D7EDF9;
        }

        .title {
            font-size: 30px;
        }

        .paragraf span {
            text-align: justify;
            display: block;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 col-md-12 col-sm-12 col-xl-10 row ps-4" style="height: 1500px;">
    <div class="card list-topic-content py-5 px-2 col-12">
        <div class="row p-2 px-5">
            <div class="wrapper-step-1 pb-4 text-center">
                <h2 class="fw-bold py-2">Peta Konsep</h2>
                <div class="text-center">
                    <img src="{{ asset('assets/peta_konsep_new.png') }}" alt="">
                </div>
            </div>

            <div class="content py-5">
                <div class="title fw-bold text-center">Materi Pembelajaran</div>

                <div class="paragraf pt-4">
                    <span><b>Gerak Lurus</b> mengacu pada pergerakan benda sepanjang lintasan lurus dengan kecepatan yang bisa tetap atau berubah. Dalam gerak lurus, kita mempelajari konsep seperti jarak, kecepatan, dan percepatan. Jarak merupakan perpindahan benda dari posisi awal ke posisi akhir, sementara kecepatan adalah perubahan jarak terhadap waktu, yang dapat dinyatakan sebagai kecepatan rata-rata atau kecepatan saat titik waktu tertentu. Percepatan, di sisi lain, mengacu pada perubahan kecepatan terhadap waktu, yang bisa positif (percepatan) atau negatif (perlambatan).</span>
                </div>

                <div class="paragraf pt-4">
                    <span>
                        <b>Gerak parabola</b> membentuk lintasan parabola. Dalam gerak parabola, penting untuk memahami konsep jarak horizontal dan vertikal, waktu (waktu yang diperlukan benda untuk mencapai tanah setelah dilepaskan), serta jangkauan horizontal maksimum yang dapat ditempuh oleh benda tersebut sebelum mencapai permukaan. Gerak parabola juga melibatkan konsep-konsep matematis yang mencakup waktu, percepatan gravitasi, dan kecepatan awal. Penerapan gerak parabola sangat relevan dalam bidang ilmu pengetahuan dan teknologi, terutama dalam perhitungan peluncuran roket, desain proyektil dalam militer, dan simulasi fisika dalam perangkat lunak komputer. Dengan memahami gerak parabola, kita dapat merancang dan memprediksi pergerakan benda dalam berbagai skenario yang melibatkan gravitasi dan perubahan kecepatan.
                    </span>
                </div>

                <div class="paragraf pt-4">
                    <span>
                        <b>Gerak Melingkar</b> terjadi ketika sebuah benda bergerak mengelilingi suatu titik pusat dengan lintasan berbentuk lingkaran atau sebagian lingkaran. Dalam gerak melingkar, kita memperhatikan kecepatan sudut (perubahan sudut terhadap waktu), kecepatan linear (kecepatan benda dalam arah tangensial pada lintasan lingkaran), dan percepatan sentripetal (percepatan yang mengarah menuju pusat lingkaran). Konsep-konsep ini membantu menjelaskan bagaimana benda-benda bergerak dalam berbagai pola gerak dan digunakan dalam berbagai aplikasi seperti mekanika, navigasi, dan teknik rekayasa.
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
