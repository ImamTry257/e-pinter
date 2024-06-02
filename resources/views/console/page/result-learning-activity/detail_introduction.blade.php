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
                    <a href="{{ route('admin.detail.result.learning.activity.show', ['result_id' => Crypt::encryptString($progress_activity->activity_master_id . '_' . $user_id . '_' . $slug)]) }}" class="btn bg-console text-white"> Kembali</a>
                </div>
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header bg-console">
                            <h3 class="card-title text-white">Detail Hasil Pembelajaran Kinematika untuk {{ ' '. $activity_selected['title'] }}</h3>
                        </div>

                        <div class="card-body">
                            <div class="wrapper-dahboard-page col-lg-10 row">
                                {{-- banner main --}}
                                <div class="main-banner ms-2 col-lg-11 d-none">
                                    <img src="{{ asset('assets/img-pemb1.svg') }}" alt="" style="width: 100%;">
                                </div>

                                <div class="list-topic-content ms-2 py-5 px-2 col-lg-11 bg-white">
                                    <div class="row p-2">
                                        {!! $content !!}

                                        <div class="col-lg-12 text-end">
                                            <a href="{{ route('admin.detail.result.learning.activity.detail.step', ['user_id' => Crypt::encryptString($user_id), 'slug' => Crypt::encryptString($slug), 'step' => Crypt::encryptString(1)]) }}" id="btn-step-1" class="btn btn-information text-white">Selanjutnya Sintak 1.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

