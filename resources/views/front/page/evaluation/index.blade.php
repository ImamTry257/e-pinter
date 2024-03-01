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
    <div class="row py-5 wrapper-title text-center">
        <h1>Evaluasi</h1>
        <h6>Silahkan kerjakan soal evaluasi pada  link google dorm di bawah ini!</h6>
        <h6 class="pt-4"><a href="https://forms.gle/mRPEvGHdRRgy4XwK6" target="_blank">https://forms.gle/mRPEvGHdRRgy4XwK6</a></h6>
        <div class="text-center" style="height: 65vh;">
            <img src="{{ asset('website/images/evaluasi.svg') }}" class="w-50" alt="">
            <div class="py-5">
                <span class="fw-bold">Selamat Mengerjakan <br />
                    GOOD LUCK!</span>
            </div>
        </div>
    </div>

    {{-- footer --}}
    @include('front.component.footer')
</div>
@endsection
