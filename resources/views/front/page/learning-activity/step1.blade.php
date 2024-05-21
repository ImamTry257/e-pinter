@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        a.btn-information {
            background-color: #004972;
        }

        .desc-step {
            background-color: #D7EDF9;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 col-md-12 col-sm-12 col-xl-10 row ps-4">
    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11 d-none">
        <img src="{{ asset('assets/img-pemb1.svg') }}" alt="" style="width: 100%;">
    </div>
    <div class="card list-topic-content p-5 col-12">
        <div class="row p-2 px-5">
            <form action="javascript:void();" id="form-step-1">
                <div class="wrapper-step-1 pb-4">
                    {!! $content; !!}
                </div>

                <div class="col-lg-12 text-start">
                    <a href="javascript:void(0);" onclick="setAnswers('{{ $step }}',false)" class="btn btn-save text-white">Simpan</a>
                    <a href="javascript:void(0);" onclick="setAnswers('{{ $step }}',true)" id="btn-step-1" class="btn btn-information text-white">Selanjutnya Sintak 2.</a>
                </div>
            </form>
        </div>
    </div>
</div>
@php
    if ( $detail_step != null ) :
        $value_answers = json_decode($detail_step->answers)->value;
    endif
@endphp
<script>
    @if ( $detail_step != null )
        @foreach (json_decode($value_answers) as $value)
            $('textarea[name="{{ $value->id }}"]').html('{{ $value->value_html }}')
        @endforeach
    @endif
</script>
@include('front.page.learning-activity.script.js-step')
@endsection
