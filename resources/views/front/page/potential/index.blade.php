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
                <img src="{{ asset('website/images/gudeg-potential/gudeg-bg-new.svg') }}" alt="">
            </div>
        </div>

        {{-- List content --}}
        <div class="col-md-12 potential-list-content pt-5">
            @foreach ($gudeg_local as $item)
            <div class="row pb-3">
                <div class="col-md-4 text-end">
                    <img src="{{ asset('website/images/upload/') . '/' . $item->images }}" alt="" class="w-50">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div>
                        <h6 class="content-potential-title">Potensi Lokal Gudeg</h6>
                        <span class="content-potential-title-item fw-bold"><a href="{{ route('potential.detail', ['slug' => $item->slug]) }}" class="text-decoration-none text-dark">{{ $item->title }}</a></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('front.component.footer')
</div>
@endsection
