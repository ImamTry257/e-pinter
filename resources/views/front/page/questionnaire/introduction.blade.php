@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        .text-filled {
            color: #9fe6af;
        }

        .bg-filled {
            background-color: #9fe6af !important;
        }

        .text-unfilled {
            color: #ffdd79;
        }

        .bg-unfilled {
            background-color: #ffdd79 !important;
        }

        .bg-popup {
            background-color: #004972;
        }
    </style>
@endsection

@section('content')
<div class="wrapper-dahboard-page col-lg-10 px-2 row" style="height: 1000px;">
    <div class="card list-topic-content col-11 mx-3 bg-white">
        <div class="title-list row d-flex justify-content-center pt-5">
            <div class="col-lg-12 p-4">
                {{-- <div class="content-intro text-center">
                    <span class="pb-3" style="font-size: 26px;">Silakan pilih Sesi berikut untuk mengerjakan kuisioner</span>
                </div>

                <div class="d-flex justify-content-evenly mt-3">
                    <a href="{{ route('questionnaire.type', ['type' => 'pre-test', 'page' => 1]) }}" class="btn bg-popup text-white w-25 py-3" style="font-size: 20px">PRE TEST</a>
                    <a href="{{ route('questionnaire.type', ['type' => 'post-test', 'page' => 1]) }}" class="btn bg-popup text-white w-25 py-3" style="font-size: 20px">POST TEST</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<div class="d-none">
    <button type="button" class="btn btn-primary" id="trigger_intro_test" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-popup">
                <h5 class="modal-title text-white" id="staticBackdropLabel">Info Kuisioner</h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <span class="pb-3" style="font-size: 18px;">Silakan pilih Sesi berikut untuk mengerjakan kuisioner</span>
                </div>

                <div class="d-flex justify-content-evenly mt-3">
                    <a href="{{ route('questionnaire.type', ['type' => 'pre-test', 'page' => 1]) }}" class="btn bg-popup text-white">Pre Test</a>
                    <a href="{{ route('questionnaire.type', ['type' => 'post-test', 'page' => 1]) }}" class="btn bg-popup text-white">Post Test</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('button#trigger_intro_test').click()
    })
</script>
@endsection
