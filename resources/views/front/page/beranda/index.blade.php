@extends('front.layouts.app')

@section('css')
    <style>
        body {
            background-image: url('{{ asset("assets/e-pinter/images/bg-home-new.png") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position-y: -60px;
        }

        button.btn-register {
            background-color: #B6E0E8;
        }

        button.btn-register:hover {
            background-color: #416A71;
        }

        div.bg-home div.icon-university img {
            width: 7%;
        }

        div.bg-home div h2 {
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

        .bg-popup {
            background-color: #004972;
        }

        #staticBackdropLabel{
            font-size: 30px;
        }
    </style>
@endsection

@section('content')
<div class="wrapper-main-content d-flex justify-content-center align-items-center">
    <div class="row p-5 bg-home position-absolute top-50 bottom-0 w-auto">
        <div class="text-center align-items-center">
            <a href="{{ route('login') }}">
                <img class="w-100" src="{{ asset('assets/e-pinter/images/button-get-started.svg') }}">
            </a>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<div class="d-none">
    <button type="button" class="btn btn-primary" id="trigger_show" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-popup">
            <span class="modal-title text-white" id="staticBackdropLabel">Video Panduan</span>
        </div>
        <div class="modal-body text-center">
            <iframe width="750" height="400" src="https://www.youtube.com/embed/rZ3bkzD2qys?si=Mt5ibd528-SuBF4R" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button class="btn bg-popup text-white" data-bs-dismiss="modal">Kembali</button>
        </div>
        </div>
    </div>
</div>

{{-- footer --}}
{{-- @include('front.component.footer') --}}

<script>
    function showVideo(){
        console.log('show', $('div#modal-yt-panduan'))
        console.log($('button#trigger_show'))
        $('button#trigger_show').click()
    }
</script>
@endsection
