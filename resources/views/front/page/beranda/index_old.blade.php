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
            background-image: url('{{ asset("website/images/bg-home-new.png") }}');
            background-size: cover;
            background-repeat: no-repeat;
            padding: 30px;
        }

        div.wrapper-title div.icon-university img {
            width: 7%;
        }

        div.wrapper-title div h2 {
            text-shadow: -4px -2px #ffffff, 4px 2px #ffffff, 4px -2px #ffffff, -4px 2px #ffffff;
            font-size: 50px;
            color: #005FCF;
        }

        div.title-about p {
            font-size: 18px;
        }

        div.wrapper-content {
            padding-right: 10%;
            padding-left: 10%;
        }

        a.btn-information {
            background-color: #004972;
        }
    </style>
@endsection

@section('content')
<div>
    <div class="row p-5 d-flex justify-content-center wrapper-title">
        <div class="icon-university">
            <img src="{{ asset('website/images/logo-uny.svg') }}" alt="">
        </div>
        <div class="title text-center pb-3">
            <h2 class="fw-bold"><i>Website</i> IPA Model PBL <br/>Terintegrasi Potensi Lokal Gudeg</h2>
        </div>
    </div>

    {{--  content  --}}
    <div class="row pt-5 wrapper-content">
        <div>
            <div class="title-about pb-4 text-center">
                <p class="fw-bold">Tentang Website IPA <br/>Model PBL Terintegrasi Potensi Lokal Gudeg</p>
            </div>

            <div class="content-about">
                <p class="text-justify">Website IPA Model PBL Terintegrasi Potensi Lokal Gudeg merupakan sebuah bahan ajar yang dikembangkan untuk membuat IPA lebih menarik dan dekat denganmu. Website IPA yang dikembangkan menggunakan model pembelajaran Problem Based Learning (PBL) yang bisa memfasilitasi untuk merangsang proses pemecahan masalah. </p>

                <p class="text-justify">Selain itu, website IPA yang dikembangkan juga terintegrasi potensi lokal gudeg loh! Ada yang pernah makan gudeg khas Yogyakarta belum nih? Tujuan dimasukkannya potensi lokal gudeg dalam webiste IPA ini adalah untuk membuat pembelajaran IPA yang berlangsung menjadi lebih kontekstual karena disajikan dengan permasalahan yang dekat denganmu sehingga rasa ingin tahu dalam belajar IPA makin tinggi. </p>

                <p class="text-justify">Webiste IPA Model PBL Terintegrasi Potensi Lokal Gudeg dikembangkan untuk mempelajari topik pada makanan dan sistem pencernaan di kelas 8 semester 1. Website IPA yang dikembangkan juga dilengkapi dengan sains info yang berisi informasi menarik seputar IPA yang mungkin belum kamu tau lho. </p>

                <p class="text-justify">Semoga bermanfaat dan selamat belajar! </p>

                <p class="text-justify">Salam hangat dari kami, <br/>Ragil Saputri & Prof. Dr. Insih Wilujeng, M.Pd </p><br/>
            </div>

        </div>

        <div class="row pt-5 wrapper-qoute">
            <div class="col-md-5">
                <img src="{{ asset('website/images/qoute.svg') }}" alt="">
            </div>

            <div class="col-md-7 pt-5">
                <p>“Satu-satunya cara untuk melakukan pekerjaan luar biasa adalah dengan mencintai apa yang Anda lakukan. Jika Anda belum menemukannya, teruslah mencari. Jangan puas”.
                </p><br/>

                <p><span class="fw-bold">Steve Jobs</span> (Pendiri Apple)</p>
            </div>
        </div>

        <div class="row py-5 wrapper-info-step">
            <div class="col-md-12 text-center">
                <p class="fw-bold">Petunjuk penggunaan website bisa kamu klik link di bawah ini ya!</p>
            </div>

            <div class="col-md-12 d-flex justify-content-center">
                <a href="{{ route('information') }}" class="btn btn-information text-white px-5">Link</a>
            </div>
        </div>
    </div>

    {{-- footer --}}
    @include('front.component.footer')
</div>
@endsection
