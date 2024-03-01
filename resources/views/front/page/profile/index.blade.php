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
        }
    </style>
@endsection

@section('content')
<div>
    <div class="row p-5 d-flex justify-content-center wrapper-bg">
        <div class="title text-center pb-3">
            <h2 class="text-light fw-bold">Profil Pengembang</h2>
        </div>
    </div>

    {{--  content  --}}
    <div class="row pt-5 d-flex justify-content-center wrapper-content">
        <div class="content-about row pb-3">
            <div class="col-md-4 text-center d-flex align-items-center justify-content-center">
                <img src="{{ asset('website/images/mhs.svg') }}" alt="">
            </div>
            <div class="col-md-8 d-flex align-items-center">
                <p>Ragil Saputri <br />
                    Mahasiswa S2 IPA Universitas Negeri Yogyakarta
                </p>
            </div>
        </div>

        <div class="content-about row pb-3">
            <div class="col-md-4 text-center d-flex align-items-center justify-content-center">
                <img src="{{ asset('website/images/prof.svg') }}" alt="">
            </div>
            <div class="col-md-8 d-flex align-items-center">
                <p>Prof. Dr. Insih Wilujeng, M.Pd <br />
                    Guru Besar Universitas Negeri Yogyakarta
                </p>
            </div>
        </div>

        <div class="content-about row pb-3">
            <div class="col-md-4 text-center d-flex align-items-center justify-content-center">
                {{-- <img src="{{ asset('website/images/prof.svg') }}" alt=""> --}}
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <p>Programmer : <br />
                    Imam Try Wibowo
                </p>
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <p>Desain UI/UX : <br />
                    Aditya Yoga Purnama
                </p>
            </div>
        </div>

        <div class="row pt-5 wrapper-qoute"></div>

        <div class="row py-5 wrapper-info-step"></div>
    </div>

    {{-- footer --}}
    @include('front.component.footer')
</div>
@endsection
