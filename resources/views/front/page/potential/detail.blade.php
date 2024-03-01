@extends('front.layouts.app')

@section('css')
    <style>
        div.desc-content p {
            text-align: justify;
        }

        div span.title-other-main-content {
            font-size: 18px;
        }

        div span.title-other-content {
            font-size: 14px;
        }
    </style>
@endsection

@section('content')
<div>
    <div class="wrapper-content-detail row p-5">
        {{-- main content --}}
        <div class="col-md-8">
            <div class="title-content pb-3">
                <h2>{{ $gudeg_local->title }}</h2>
            </div>
            <div class="image-content pb-3">
                <img class="w-100" src="{{ asset('website/images/upload') . '/' . $gudeg_local->images }}" alt="">
            </div>
            <div class="desc-content">
                {!! $gudeg_local->descriptions !!}
            </div>
        </div>

        {{-- other content --}}
        <div class="col-md-4">
            <div class="wrapper-detail-content border p-4">
                <div class="other-main-content row">
                    <div class="col-md-12 text-center">
                        <h4>Potensi Lokal Gudeg Lainnya</h4>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('potential.detail', ['slug' => $other_gudeg_local->slug]) }}" class="text-decoration-none text-dark">
                            <img class="w-100" src="{{ asset('website/images/upload') . '/' . $other_gudeg_local->images }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 text-center">
                        <a href="{{ route('potential.detail', ['slug' => $other_gudeg_local->slug]) }}" class="text-decoration-none text-dark">
                            <span class="title-other-main-content">{{ $other_gudeg_local->title }}</span>
                        </a>
                    </div>
                </div>

                <hr>

                <div class="other-content">
                    @foreach ($all_gudeg_local as $item)
                    <a href="{{ route('potential.detail', ['slug' => $item->slug]) }}" class="text-decoration-none text-dark">
                        <div class="d-flex justify-content-start align-items-center pb-1 px-4">
                            <div class="w-50">
                                <img src="{{ asset('website/images/upload') . '/' . $item->images }}" alt="" class="w-100">
                            </div>
                            <div class="ps-2 d-flex align-items-center w-100">
                                <span class="title-other-content">{{ $item->title }}</span>
                            </div>
                        </div>
                    </a>

                    <div class="d-flex justify-content-center px-4 pb-3">
                        <hr class="w-100">
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

    @include('front.component.footer')
</div>
@endsection
