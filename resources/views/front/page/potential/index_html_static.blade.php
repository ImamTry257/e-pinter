@extends('front.layouts.app')

@section('css')
<style>
    div h6.content-potential-title {
        color: #A30075;
        font-size: 12px;
    }

    div span.content-potential-title-item {
        font-size: 25px;
    }
</style>
@endsection

@section('content')
<div>
    <div class="row p-5">
        {{-- Title --}}
        <div class="col-md-12 potential-title text-center py-4">
            <h1 class="fw-bold">Potensi Lokal Gudeg</h1>
        </div>

        {{-- Bg Main --}}
        <div class="col-md-12 potential-bg-main text-center">
            <div class="row">
                <img src="{{ asset('website/images/gudeg-potential/gudeg-bg.svg') }}" alt="">
            </div>
        </div>

        {{-- List content --}}
        <div class="col-md-12 potential-list-content pt-5">
            <div class="row pb-3">
                <div class="col-md-4 text-end">
                    <img src="{{ asset('website/images/gudeg-potential/gudeg-1.svg') }}" alt="" class="w-50">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div>
                        <h6 class="content-potential-title">Potensi Lokal Gudeg</h6>
                        <span class="content-potential-title-item fw-bold"><a href="{{ route('potential.detail') }}" class="text-decoration-none text-dark">Jogja Kota Gudeg</a></span>
                    </div>
                </div>
            </div>

            <div class="row pb-3">
                <div class="col-md-4 text-end">
                    <img src="{{ asset('website/images/gudeg-potential/gudeg-2.svg') }}" alt="" class="w-50">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div>
                        <h6 class="content-potential-title">Potensi Lokal Gudeg</h6>
                        <span class="content-potential-title-item fw-bold"><a href="{{ url('') }}" class="text-decoration-none text-dark">Karaktristik Pohon Nangka</a></span>
                    </div>
                </div>
            </div>

            <div class="row pb-3">
                <div class="col-md-4 text-end">
                    <img src="{{ asset('website/images/gudeg-potential/gudeg-3.svg') }}" alt="" class="w-50">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div>
                        <h6 class="content-potential-title">Potensi Lokal Gudeg</h6>
                        <span class="content-potential-title-item fw-bold"><a href="{{ url('') }}" class="text-decoration-none text-dark">Gudeg Popular di Jogja</a></span>
                    </div>
                </div>
            </div>

            <div class="row pb-3">
                <div class="col-md-4 text-end">
                    <img src="{{ asset('website/images/gudeg-potential/gudeg-4.svg') }}" alt="" class="w-50">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div>
                        <h6 class="content-potential-title">Potensi Lokal Gudeg</h6>
                        <span class="content-potential-title-item fw-bold"><a href="{{ url('') }}" class="text-decoration-none text-dark">Jenis Pohon Nangka di jogja</a></span>
                    </div>
                </div>
            </div>

            <div class="row pb-3">
                <div class="col-md-4 text-end">
                    <img src="{{ asset('website/images/gudeg-potential/gudeg-5.svg') }}" alt="" class="w-50">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div>
                        <h6 class="content-potential-title">Potensi Lokal Gudeg</h6>
                        <span class="content-potential-title-item fw-bold"><a href="{{ url('') }}" class="text-decoration-none text-dark">Artikel Gudeg Mendunia</a></span>
                    </div>
                </div>
            </div>

            <div class="row pb-3">
                <div class="col-md-4 text-end">
                    <img src="{{ asset('website/images/gudeg-potential/gudeg-6.svg') }}" alt="" class="w-50">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div>
                        <h6 class="content-potential-title">Potensi Lokal Gudeg</h6>
                        <span class="content-potential-title-item fw-bold"><a href="{{ url('') }}" class="text-decoration-none text-dark">Taksonomi Pohon Nangka</a></span>
                    </div>
                </div>
            </div>

            <div class="row pb-3">
                <div class="col-md-4 text-end">
                    <img src="{{ asset('website/images/gudeg-potential/gudeg-7.svg') }}" alt="" class="w-50">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div>
                        <h6 class="content-potential-title">Potensi Lokal Gudeg</h6>
                        <span class="content-potential-title-item fw-bold">Peran Gudeg Sebagai Potensi Lokal Yogyakarta</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front.component.footer')
</div>
@endsection
