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
                <div class="wrapper-countdown text-center pt-3">
                    <span style="font-size: 30px;" id="countdown" class="fw-bold">Sisa waktu: 00:30:00</span>
                </div>

                <div class="wrapper-question-title py-4">
                    <span class="question-title fw-bold" style="font-size: 22px;">Soal No 1</span>
                </div>

                <div class="border border-dark p-3">
                    <div class="wrapper-question-content">
                        <div class="question-content pb-3">
                            <span class="text-justify d-block">Indonesia pada bulan Juni tahun 2024 akan menjalani pertandingan kualifikasi Piala Dunia, guna menjaga kebugaran fisiknya salah satu punggawa tim nasional yaitu Ricky Kambuaya menjalani latihan dengan berlari. Ricky memulai dengan titik awal di halaman rumahnya.Ricky mengawali lari dengan jarak 1200 m ke arah utara dan di lanjutkan 300 m ke arah barat, setelahnya Ricky menambah lagi dengan berlari 700 m ke arah utara menuju suatu Tugu. Sesampainya di Tugu, Ricky kemudian kembali lagi ke rumahnya. Rutinitas dalam satu kali sesi latihan Ricky melakukan minimal lima kali bolak balik dari rumahnya ke Tugu dan maksimal sepuluh kali bolak balik. Berdasarkan narasi tersebut dapat diketahui bahwa ...</span>
                        </div>
                    </div>

                    <div class="wrapper-answer-by-choose">
                        <div class="d-flex justify-content-start pb-2">
                            <div>
                                <input type="radio" name="answer-reason" id="" class="me-3">
                            </div>
                            <div>
                                <span>Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 22000 m dan jarak maksimal yang ditempuhnya adalah 44000 m.</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start pb-2">
                            <div>
                                <input type="radio" name="answer-reason" id="" class="me-3">
                            </div>
                            <div>
                                <span>
                                    Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 4400 m dan jarak maksimal yang ditempuhnya adalah 22000 m.
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start pb-2">
                            <div>
                                <input type="radio" name="answer-reason" id="" class="me-3">
                            </div>
                            <div>
                                <span>
                                    Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 4400 m dan jarak maksimal yang ditempuhnya adalah 44000 m.
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start pb-2">
                            <div>
                                <input type="radio" name="answer-reason" id="" class="me-3">
                            </div>
                            <div>
                                <span>
                                    Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 2200 m dan jarak maksimal yang ditempuhnya adalah 4400 m.
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start pb-2">
                            <div>
                                <input type="radio" name="answer-reason" id="" class="me-3">
                            </div>
                            <div>
                                <span>
                                    Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 2200 m dan jarak maksimal yang ditempuhnya adalah 22000 m.
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="wrapper-btn-reason px-3 pt-5 pb-3 col-12">
                        <span class="btn btn-success text-white rounded">Alasan Menjawab</span>
                    </div>

                    <div class="wrapper-answer-by-reason py-3">
                        <div class="d-flex justify-content-start pb-2">
                            <div>
                                <input type="radio" name="answer-reason" id="" class="me-3">
                            </div>
                            <div>
                                <span>
                                    Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 22000 m dan jarak maksimal yang ditempuhnya adalah 44000 m
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start pb-2">
                            <div>
                                <input type="radio" name="answer-reason" id="" class="me-3">
                            </div>
                            <div>
                                <span>
                                    jarak diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start pb-2">
                            <div>
                                <input type="radio" name="answer-reason" id="" class="me-3">
                            </div>
                            <div>
                                <span>
                                    jarak adalah panjang lintasan yang ditempuh tanpa pengulangan rute
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start pb-2">
                            <div>
                                <input type="radio" name="answer-reason" id="" class="me-3">
                            </div>
                            <div>
                                <span>
                                    jarak merupakan total panjang lintasan yang berada dalam arah yang sama saja
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start pb-2">
                            <div>
                                <input type="radio" name="answer-reason" id="" class="me-3">
                            </div>
                            <div>
                                <span>
                                    Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 2200 m dan jarak maksimal yang ditempuhnya adalah 22000 m.
                                </span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start pb-2">
                            <div>
                                <input type="radio" name="answer-reason" id="" class="me-3">
                            </div>
                            <div>
                                <span>
                                    jarak adalah besaran vector sehingga tidak perlu menyebutkan arah pada total jarak yang ditempuh
                                </span>
                            </div>
                        </div>


                    </div>

                    <div class="wrapper-btn d-flex justify-content-evenly pb-4">
                        <div>
                            <a href="" class="btn text-white rounded" style="background-color: #004972;">Soal Sebelumnya</a>
                        </div>

                        <div>
                            <a href="" class="btn text-white rounded" style="background-color: #004972;">Soal Selanjutnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card list-topic-content col-2 bg-white">
        <div class="title-list row d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="wrapper-countdown text-center pt-3">
                    <span style="font-size: 30px;" id="countdown" class="fw-bold"></span>
                </div>

                <div class="wrapper-question-title pt-4 pb-2 text-start" style="margin-top: 45px;">
                    <span class="question-title fw-bold" style="font-size: 22px;">Nomor Soal</span>
                    <hr>
                </div>

                <div class="wrapper-list-question row">
                    <div class="row">
                        @foreach ( $question_no as $key => $q)
                            @php
                                $selection_q = ''
                            @endphp
                            @if ( ( $key + 1 ) == 1 )
                                @php
                                    $selection_q = 'selected-question'
                                @endphp
                            @endif

                            <div class="col-4 mb-2 text-center">
                                <a href="" id="question-no" class="p-2 fw-bold border border-dark btn {{ $selection_q }}" style="width: 45px;">
                                    {{ $q }}
                                </a>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        var templateStart = '<div class="chat-row"><div class="chat-wrapper clearfix"><div class="chat-user-pic"></div><div class="chat-message">';
        var templateEnd = '</div></div></div>';
        var count = 0;

        $(".chat").each(function(index, item) {
            console.log(index, item)
            $(".chat-textarea").on("keydown", function(e) {
                if (e.keyCode == "13") {
                    $(".chat-rows").append(templateStart + $(this).val() + templateEnd);
                    count += $(item).find(".chat-row").last().height();
                    console.log(count)
                    // count = 250
                    $(".chat-rows").animate({
                        "height": count + "px"
                    });

                    // setInterval(() => {
                    //     $(".chat-rows").attr('style', 'height: 100px;')
                    // }, 1000);
                    $(this).val("");

                    return false;
                }
            })

        })

    </script>
@endsection
