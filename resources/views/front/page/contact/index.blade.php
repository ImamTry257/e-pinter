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

        div.content-about p {
            font-size: 20px;
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
            <h2 class="text-light fw-bold">Kontak Pengembang</h2>
        </div>
    </div>

    {{--  content  --}}
    <div class="row pt-5 d-flex justify-content-center wrapper-content align-items-center">
        <div class="content-about">
            <p>Ragil Saputri. <br />
                Mahasiswa S2 IPA Universitas Negeri Yogyakarta <br />
                E-mail: ragilsaputri.2022@student.uny.ac.id <br />
                No HP: 089-603-409-042
            </p>
        </div>

        <div class="row pt-5 wrapper-qoute"></div>

        <div class="row py-5 wrapper-info-step"></div>
    </div>

    {{-- footer --}}
    @include('front.component.footer')
</div>
@endsection
