@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        .selected-question {
            background-color: #93FFC4;
        }

        #question-no:hover {
            background-color: #93FFC4;
        }

        .bg-popup {
            background-color: #004972;
        }

        span {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 px-2 row">

    <div class="card list-topic-content col-8 mx-3 bg-white">
        <div class="title-list row d-flex justify-content-center">
            <div class="col-lg-11">
                <form action="{{ route('question.store.type', ['type' => $type_selected,'questionNo' => Crypt::encryptString($question_no_selected)]) . '-'.Session::get('current_duration') }}" method="POST">
                @csrf
                    <div class="wrapper-countdown text-center pt-3 fw-bold" style="font-size: 30px;">
                        {{-- <span style="font-size: 30px;" id="countdown" class="fw-bold">Sisa waktu: 00:30:00</span> --}}
                        Sisa Waktu: <input type="text" name="countdown" id="overall_times" class="fw-bold col-2" value="--:--:--" style="font-size: 30px; border: none;" readonly>
                        <input type="hidden" name="countdown_str" id="overall_time" value="">
                    </div>

                    <div class="wrapper-question-title py-4">
                        <span class="question-title fw-bold" style="font-size: 22px;">Soal No {{ $question_no_selected }}</span>
                    </div>

                    <div class="border border-dark p-3">
                        <div class="wrapper-question-content">
                            <div class="question-content pb-3">
                                <span class="text-justify d-block" style="">{!! $question_selected->description !!}.</span>
                            </div>
                        </div>

                        <div class="wrapper-answer-by-choose">
                            @php
                                $d_options = $question_selected->options;
                                $options = json_decode($d_options, true);
                            @endphp

                            @foreach ( $options as $op)
                            <div class="d-flex justify-content-start pb-2">
                                <div>
                                    @php
                                        $answer = '';
                                        if ( $user_answer != null ) :
                                            $answer = ( property_exists($user_answer, 'answer') ? $user_answer->answer : '' );
                                        endif ;
                                    @endphp
                                    <input type="radio" name="answer" value="{{ $op['value_key'] }}" id="{{ $op['value_key'] }}" class="me-3" {{ ( $op['value_key'] == $answer ) ? 'checked' : '' }}>
                                </div>
                                <div>
                                    <span>
                                        <label for="{{ $op['value_key'] }}" class="fw-normal">{!! $op['value_key'] . '. ' . $op['value_text'] !!}</label>
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="wrapper-btn-reason px-3 pt-5 pb-3 col-12">
                            <span class="btn btn-success text-white rounded">Alasan Menjawab</span>
                        </div>

                        <div class="wrapper-answer-by-reason py-3">
                            @php
                                $d_options = $question_selected->options_with_reason;
                                $options_w_r = json_decode($d_options, true);
                            @endphp

                            @foreach ( $options as $op)
                            <div class="d-flex justify-content-start pb-2">
                                <div>
                                    @php
                                        $answer_w_reason = '';
                                        if ( $user_answer != null ) :
                                            $answer_w_reason = ( property_exists($user_answer, 'answer_with_reason') ? $user_answer->answer_with_reason : '' );
                                        endif ;
                                    @endphp
                                    <input type="radio" name="answer_reason" value="{{ $op['value_key'] }}" id="{{ $op['value_key'] . '_wr' }}" class="me-3" {{ ( $op['value_key'] == $answer_w_reason ) ? 'checked' : '' }}>
                                </div>
                                <div>
                                    <span>
                                        <label for="{{ $op['value_key'] . '_wr' }}" class="fw-normal">{!! $op['value_key'] . '. ' . $op['value_text'] !!}</label>
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="wrapper-btn d-flex justify-content-evenly pb-4">
                            @if ( $question_no_selected != 1 )
                            <div>
                                <button type="submit" name="action_user" value="before" class="btn text-white rounded" style="background-color: #004972;">
                                    <i class="fa-solid fa-chevron-left"></i>
                                    Soal Sebelumnya
                                </button>
                            </div>
                            @endif

                            @if ( $question_no_selected != 30 )
                                <div>
                                    <button type="submit" name="action_user" value="next" class="btn text-white rounded" style="background-color: #004972;">
                                        Soal Selanjutnya
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </button>
                                </div>
                                @endif
                        </div>
                    </div>
                    <input type="hidden" name="question_number" value="{{ $question_no_selected }}">
                    <input type="hidden" name="type_selected" value="{{ $type_selected }}">
                </form>
            </div>
        </div>
    </div>

    <div class="card list-topic-content col-2 bg-white">
        <div class="title-list row d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="wrapper-countdown text-center pt-3">
                    <span style="font-size: 30px;" id="countdown" class="fw-bold"></span>
                </div>

                <div class="wrapper-question-title pt-4 pb-2 text-center" style="margin-top: 45px;">
                    <span class="question-title fw-bold" style="font-size: 22px;">Nomor Soal</span>
                    <hr>
                </div>

                <div class="wrapper-list-question">
                    {{-- add question number --}}
                    @include('front.page.question.includes.question_number_type')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<div class="d-none">
    <button type="button" class="btn btn-primary" id="trigger_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-popup">
            <h5 class="modal-title text-white" id="staticBackdropLabel">Notifikasi Waktu</h5>
        </div>
        <div class="modal-body text-center">
            <span style="font-size: 45px;">SELESAI</span>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <a href="{{ route('front.dashboard') }}" class="btn bg-popup text-white">Kembali ke Halaman Dashboard</a>
        </div>
        </div>
    </div>
</div>


@endsection

@section('script')
    <script>
        // example for coutdown
        // minute, seconds, bisa simpan ke local storage, dan nanti bisa diatur ke input html, buat value dipost saat submit
        // https://jsfiddle.net/d62o98wh/

        // only seconds
        // https://jsfiddle.net/satyasrinivaschekuri/y03m54Le/

        var calculatedTime = new Date(null);
        var sessionSetData = ( '{{ $type_selected }}' == 'pre-test' ) ? '{{ Session::get("current_duration_pre_test") }}' : '{{ Session::get("current_duration_post_test") }}'
        calculatedTime.setSeconds( ( $('#overall_time').val() == 0 ) ? sessionSetData : $('#overall_time').val() ); //setting value in seconds
        var newTime = calculatedTime.toISOString().substr(11, 8);

        var speaking_ms = newTime;
        var speaking_ms_arr = speaking_ms.split(":");
        var speaking_time_min_sec = (+speaking_ms_arr[0]) * 60 * 60 + (+speaking_ms_arr[1]) * 60 + (+speaking_ms_arr[2]);
        var speaking_time_min_sec = parseInt(speaking_time_min_sec) + 1;
        var speaking_value;

        var getLocalStorage = ( '{{ $type_selected }}' == 'pre-test' ) ? localStorage.getItem("speaking_counter_pre_test") : localStorage.getItem("speaking_counter_post_test")
        var keySetLocalStorage = ( '{{ $type_selected }}' == 'pre-test' ) ? "speaking_counter_pre_test" : "speaking_counter_post_test"

        if (getLocalStorage) {
            if (getLocalStorage <= 0) {
                speaking_value = speaking_time_min_sec;
            } else {
                speaking_value = getLocalStorage;
            }
        } else {
            speaking_value = speaking_time_min_sec;
        }

        document.getElementById('overall_time').value = speaking_value;

        var speaking_counter = function() {
            if (speaking_value <= 0) {
                localStorage.setItem(keySetLocalStorage, speaking_time_min_sec);

                checkCurrentDuration()
            } else {
                speaking_value = parseInt(speaking_value) - 1;
                localStorage.setItem(keySetLocalStorage, speaking_value);
            }
            document.getElementById('overall_time').value = speaking_value;
            if (speaking_value == 0) {
                localStorage.setItem(keySetLocalStorage, speaking_value);
                setTimeout(function() {
                    clearInterval(interval);
                }, 1000);
            }

            var hours = Math.floor(speaking_value / 3600);
            hours = ( hours < 10 ) ? '0' + hours : hours

            var minutes = Math.floor(speaking_value % 3600 / 60);
            minutes = ( minutes < 10 ) ? '0' + minutes : minutes

            var seconds = Math.floor(speaking_value % 3600 % 60);
            seconds = ( seconds < 10 ) ? '0' + seconds : seconds

            var red_time = hours + ':' + minutes + ':' + seconds;
            document.getElementById('overall_times').value = red_time;
        };

        var interval = setInterval(function() {
            speaking_counter();
        }, 1000);


        var Clock = {
            pause: function() {
                    clearInterval(interval);
                    delete interval;
            },

            resume: function() {

                    interval = setInterval(function() {
                        speaking_counter();
                    }, 1000);

            }
        };

        function checkCurrentDuration(){
            // show popup after current duration == 0
            $('button#trigger_btn').click()
        }

        window.addEventListener("beforeunload", function(event) {
            // myFunction();
            console.log('{{ \Request::get("questionNo") }}')
            return false
        });

    </script>
@endsection
