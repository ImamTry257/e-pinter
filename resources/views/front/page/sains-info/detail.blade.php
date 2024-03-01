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

        div.next-prev-content a span:hover {
            color: #000000;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
<div>
    <div class="wrapper-content-detail row p-5">
        {{-- main content --}}
        <div class="col-md-8">
            <div class="title-content pb-3">
                <h2>{{ $latest_sains_info->title }}</h2>
            </div>
            <div class="image-content pb-3">
                <img class="w-100" src="{{ asset('website/images/upload') . '/' . $latest_sains_info->images }}" alt="">
            </div>
            <div class="desc-content pb-3">
                {!! $latest_sains_info->descriptions !!}
            </div>

            <div class="next-prev-content d-flex justify-content-end">
                <div class="pe-3">
                    <a href="{{ route('sains-info.detail', ['slug' => $prev->slug]) }}" class="text-decoration-none text-dark">
                        <span>Sebelumnya</span>
                    </a>
                </div>

                <div>
                    <a href="{{ route('sains-info.detail', ['slug' => $next->slug]) }}" class="text-decoration-none text-dark">
                        <span>Selanjutnya</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- other content --}}
        <div class="col-md-4">
            <div class="wrapper-detail-content border p-4">
                <div class="other-main-content row">
                    <div class="col-md-12 text-center">
                        <h4>Sains Info Lainnya</h4>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('sains-info.detail', ['slug' => $other_sains_info->slug]) }}" class="text-decoration-none text-dark">
                            <img class="w-100" src="{{ asset('website/images/upload/') . '/' . $other_sains_info->images }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 text-center">
                        <a href="{{ route('sains-info.detail', ['slug' => $other_sains_info->slug]) }}" class="text-decoration-none text-dark">
                            <span class="title-other-main-content">{{ $other_sains_info->title }}</span>
                        </a>
                    </div>
                </div>

                <hr>

                <div class="other-content">
                    @foreach ($all_sains_info as $si)
                    <a href="{{ route('sains-info.detail', ['slug' => $si->slug]) }}" class="text-decoration-none text-dark">
                        <div class="d-flex justify-content-start align-items-center pb-1 px-4">
                            <div class="w-50">
                                <img src="{{ asset('website/images/upload/') . '/' . $si->images }}" alt="" class="w-100">
                            </div>
                            <div class="ps-2 d-flex align-items-center w-100">
                                <span class="title-other-content">{{ $si->title }}</span>
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
