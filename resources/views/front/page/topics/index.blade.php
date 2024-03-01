@extends('front.layouts.app')

@section('css')
    <style>
        div.title-matrix-content h2 {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
@endsection


@section('content')
<div>
    <div class="row p-5 wrapper-topic-content">
        <div class="col-md-12 topic-content pb-4">
            <div class="title-topic-content d-none">
                <h2>PETA KONSEP</h2>
            </div>

            <div class="main-topic-content text-center">
                <img src="{{ asset('website/images/topics/peta-konsep-new.svg') }}" alt="" class="w-75">
            </div>
        </div>

        <div class="col-md-12 matrix-content">
            <div class="title-matrix-content text-center pb-4">
                <h2>MATRIKS MATERI</h2>
            </div>

            <div class="main-matrix-content text-center">
                <img src="{{ asset('website/images/topics/matriks-materi.svg') }}" alt="" class="w-75">
            </div>
        </div>
    </div>

    @include('front.component.footer')
</div>
@endsection
