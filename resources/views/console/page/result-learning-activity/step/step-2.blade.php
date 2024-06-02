@extends('console.adminlte.layouts.app')

@section('css')
    <style>
        .border-console {
            border-color: #7BB7C2 !important;
        }

        a.btn-information {
            background-color: #004972;
        }

        .desc-step {
            background-color: #D7EDF9;
        }
    </style>
@endsection

@section('content')
<div class="content-wrapper">
    @include('console.components.breadcrumb', ['title' => 'Detail Hasil Kegiatan Pembelajaran Kinematika untuk ' . $activity_selected['title']])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 pb-2">
                    <a href="{{ route('admin.detail.result.learning.activity.show', ['result_id' => Crypt::encryptString($progress_activity->activity_master_id . '_' . $user_id_next_step . '_' . $slug_next_step)]) }}" class="btn bg-console text-white"> Kembali</a>
                </div>
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header bg-console">
                            <h3 class="card-title text-white">Detail Hasil Pembelajaran Kinematika untuk {{ ' '. $activity_selected['title'] }}</h3>
                        </div>

                        <div class="card-body">
                            <div class="wrapper-dahboard-page col-lg-12 col-md-12 col-sm-12 col-xl-12 row ps-4">
                                {{-- banner main --}}
                                <div class="main-banner ms-2 col-lg-11 d-none">
                                    <img src="{{ asset('assets/img-pemb2.svg') }}" alt="" style="width: 100%;">
                                </div>

                                <div class="list-topic-content pt-4 pb-5 px-2 col-12">
                                    <div class="row">
                                        <div class="wrapper-step-1 pb-4 col-12">
                                            {!! $content !!}
                                        </div>

                                        <div class="col-lg-12 text-start">
                                            <a href="{{ route('admin.detail.result.learning.activity.detail.step', ['user_id' => Crypt::encryptString($user_id_next_step), 'slug' => Crypt::encryptString($slug_next_step), 'step' => Crypt::encryptString(($next_step - 1))]) }}" id="btn-step-2" class="btn btn-information text-white">Kembali ke Sintak 1.</a>

                                            @if ( $is_enable_to_next_step )
                                            <a href="{{ route('admin.detail.result.learning.activity.detail.step', ['user_id' => Crypt::encryptString($user_id_next_step), 'slug' => Crypt::encryptString($slug_next_step), 'step' => Crypt::encryptString(($next_step + 1))]) }}" id="btn-step-2" class="btn btn-information text-white">Selanjutnya Sintak 3.</a>
                                            @endif

                                            <input type="hidden" id="is_disabled" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('console.components.comment')
                    </div>
                </div>
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
                $('div[id="{{ $value->id }}"]').html('{!! $value->value_html !!}')
            @endif
        @endforeach
    @endif
</script>
@include('console.page.result-learning-activity.script.js-step')
@endsection
