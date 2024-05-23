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
        <img src="{{ asset('assets/img-pemb2.svg') }}" alt="" style="width: 100%;">
    </div>

    <div class="card list-topic-content p-5 col-12">
        <div class="row p-2 px-5">
            <div class="wrapper-step-1 pb-4">
                {!! $content !!}
            </div>

            <div class="col-lg-12 text-start">
                <a href="javascript:void(0);" onclick="setAnswers('{{ $step }}',false)" class="btn btn-save text-white">Simpan</a>
                <a href="javascript:void(0);" onclick="setAnswers('{{ $step }}',true)" id="btn-step-2" class="btn btn-information text-white">Selanjutnya Sintak 3.</a>

                <input type="hidden" id="is_disabled" value="1">
            </div>
        </div>
    </div>
</div>
@php
    // dd($detail_step);
    if ( $detail_step != null ) :
        $value_answers = json_decode($detail_step->answers)->value;
    endif
@endphp
<script>
    @if ( $detail_step != null )
        @if ($detail_step->detail_progress != 100 )
            $('input#is_disabled').val(1)
        @endif

        @foreach (json_decode($value_answers) as $value)
            @if ( $value->id != 'descriptions' )
                $('input[name="{{ $value->id }}"]').val('{{ $value->value_html }}')
            @else
                $('textarea[name="{{ $value->id }}"]').html('{{ $value->value_html }}')
            @endif
        @endforeach
    @endif
</script>
@include('front.page.learning-activity.script.js-step')
@endsection
