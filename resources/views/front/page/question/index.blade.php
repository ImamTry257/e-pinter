@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        .selected-question {
            background-color: #93FFC4;
        }

        #question-no:hover {
            background-color: #93FFC4;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 px-2 row">

    <div class="card list-topic-content col-8 mx-3 bg-white">
        <div class="title-list row d-flex justify-content-center">
            <div class="col-lg-11">
                <form action="{{ route('question.store', ['questionNo' => Crypt::encryptString($question_no_selected)]) . '-'.Session::get('current_duration') }}" method="POST">
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
                                <span class="text-justify d-block">{!! $question_and_answer->description !!}.</span>
                            </div>
                        </div>

                        <div class="wrapper-answer-by-choose">
                            @php
                                $d_options = $question_and_answer->options;
                                $options = json_decode($d_options, true);
                            @endphp

                            @foreach ( $options as $op)
                            <div class="d-flex justify-content-start pb-2">
                                <div>
                                    <input type="radio" name="answer" value="{{ $op['value_key'] }}" id="{{ $op['value_key'] }}" class="me-3" {{ ( $op['value_key'] == ( property_exists($question_and_answer, 'answer') ? $question_and_answer->answer : '' ) ) ? 'checked' : '' }}>
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
                                $d_options = $question_and_answer->options_with_reason;
                                $options_w_r = json_decode($d_options, true);
                            @endphp

                            @foreach ( $options as $op)
                            <div class="d-flex justify-content-start pb-2">
                                <div>
                                    <input type="radio" name="answer_reason" value="{{ $op['value_key'] }}" id="{{ $op['value_key'] . '_wr' }}" class="me-3" {{ ( $op['value_key'] == ( property_exists($question_and_answer, 'answer_with_reason') ? $question_and_answer->answer_with_reason : '' ) ) ? 'checked' : '' }}>
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
                    @include('front.page.question.includes.question_number')
                </div>
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
        calculatedTime.setSeconds( ( $('#overall_time').val() == 0 ) ? '{{ Session::get("current_duration") }}' : $('#overall_time').val() ); //setting value in seconds
        var newTime = calculatedTime.toISOString().substr(11, 8);

        var speaking_ms = newTime;
        var speaking_ms_arr = speaking_ms.split(":");
        var speaking_time_min_sec = (+speaking_ms_arr[0]) * 60 * 60 + (+speaking_ms_arr[1]) * 60 + (+speaking_ms_arr[2]);
        var speaking_time_min_sec = parseInt(speaking_time_min_sec) + 1;
        console.log(speaking_ms);
        var speaking_value;

        if (localStorage.getItem("speaking_counter")) {
            if (localStorage.getItem("speaking_counter") <= 0) {
                speaking_value = speaking_time_min_sec;
            } else {
                speaking_value = localStorage.getItem("speaking_counter");
            }
        } else {
            speaking_value = speaking_time_min_sec;
        }

        document.getElementById('overall_time').value = speaking_value;

        var speaking_counter = function() {
            if (speaking_value <= 0) {
                localStorage.setItem("speaking_counter", speaking_time_min_sec);
            } else {
                speaking_value = parseInt(speaking_value) - 1;
                localStorage.setItem("speaking_counter", speaking_value);
            }
            document.getElementById('overall_time').value = speaking_value;
            if (speaking_value == 0) {
                localStorage.setItem("speaking_counter", speaking_value);
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

        window.addEventListener("beforeunload", function(event) {
            // myFunction();
            console.log('{{ \Request::get("questionNo") }}')
            return false
        });

    </script>
@endsection
