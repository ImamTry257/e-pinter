@extends('front.layouts.app-dashboard')

@section('content')

<div class="wrapper-dahboard-page col-lg-10 row">

    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11">
        <img src="{{ asset('assets/dashboard/fisika-sma-kinematika.svg') }}" alt="" style="width: 100%;">
    </div>

    <div class="list-topic-content ms-2 p-5 col-lg-11 bg-white">
        <div class="title-list row">
            <div class="col-lg-12">
                <h2>Kinematika</h2>
            </div>
        </div>

        <div class="row">
            @foreach ( $list_activity as $key => $activity )
                <div class="col-lg-6 pb-4">
                    <a href="{{ route('front.activity', ['slug' => $activity['slug']]) }}">
                        <img src="{{ asset('assets/dashboard/') .'/'. $activity['image'] }}" alt="" class="w-100">
                        <div class="p-3 shadow-lg bg-body">
                            <span class="text-dark">Kegiatan Pembelajaran {{ $key + 1 }} <br/> {{ $activity['title'] }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
