@extends('front.layouts.app')

@section('css')
    <style>
        button.btn-register {
            background-color: #B6E0E8;
        }

        button.btn-register:hover {
            background-color: #416A71;
        }

        div.wrapper-bg {
            background-color: #0B2039E5;
            padding: 30px;
        }

        div.wrapper-bg div h2 {
            text-shadow: 2px 2px 20px #2d2a2a;
            font-size: 40px;
        }

        div.title-about p {
            font-size: 18px;
        }

        div.content-about ol li {
            font-size: 18px;
        }

        div.wrapper-content {
            padding-right: 20%;
            padding-left: 20%;
            height: 100vh;
        }
    </style>
@endsection

@section('content')
<div>
    <div class="row p-5 d-flex justify-content-center wrapper-bg">
        <div class="title text-center pb-3">
            <h2 class="text-light fw-bold">Petunjuk Penggunaan Website</h2>
        </div>
    </div>

    {{--  content  --}}
    <div class="row pt-5 d-flex justify-content-center wrapper-content align-items-center">
        <div class="content-about">
            <ol>
                <li>Berdo’a terlebih dahulu sebelum menggunakan website IPA</li>
                <li>Buat akun pada bagian “daftar”</li>
                <li>Setelah itu masukkan username berupa nama lengkap dan password</li>
                <li>Kemudian apabila telah berhasil daftar, masuk ke menu login dengan masukkan nama lengkap dan password masing-masing</li>
                <li>Setelah itu, masuk menu klik satu persatu dari mulai CP, TP & ATP, Topik/Materi, Potensi Lokal Gudeg, Kegiatan Pembelajaran, Evaluasi serta Refleksi</li>
                <li>Lakukan kegiatan pembelajaran secara urut</li>
                <li>Pastikan semua kolom jawaban terisi</li>
                <li>Setelah selesai menggunakan website, jangan lupa untuk logout</li>
            </ol>

            <div class="d-flex align-items-center justify-content-end">
                <div class="text-end">
                    <span>Terimakasih dan selamat belajar !</span>
                    <img class="w-25" src="{{ asset('website/images/key.svg') }}" alt="">
                </div>
            </div>
        </div>

        <div class="row pt-5 wrapper-qoute"></div>

        <div class="row py-5 wrapper-info-step"></div>
    </div>

    {{-- footer --}}
    @include('front.component.footer')
</div>
@endsection
