@extends('front.layouts.app-dashboard')

@section('content')
<div class="wrapper-dahboard-page col-lg-10 px-2 row">

    <div class="card list-topic-content col-11 mx-3 bg-white">
        <div class="title-list row d-flex justify-content-center">
            <div class="col-lg-12 p-4">

                <div class="prolog pb-3 mb-3 px-3" style="background-color: #e3e7ea !important;">
                    {{-- Say Welcome and Detial Informasi --}}
                    <div class="wrapper-detail-info pb-4 pt-3">
                        <span>Selamat Datang, <b>{{ Auth::user()->name; }}</b> </span>
                    </div>

                    <div class="wrapper-adjust-info pb-2">
                        <span>Mohon kuisioner ini diisi dengan sungguh-sungguh untuk umpan balik dalam perbaikan pelayanan bagi mahasiswa dan tidak akan mempengaruhi nilai dalam perkuliahan</span>
                    </div>

                    <div class="wrapper-info pb-3">
                        <table>
                            <tr>
                                <td width="30%">SI</td>
                                <td width="10%">:</td>
                                <td width="70%">Selalu</td>
                            </tr>
                            <tr>
                                <td width="30%">SR</td>
                                <td width="10%">:</td>
                                <td width="70%">Sering</td>
                            </tr>
                            <tr>
                                <td width="30%">KD</td>
                                <td width="10%">:</td>
                                <td width="70%">Kadang-kadang</td>
                            </tr>
                            <tr>
                                <td width="30%">TP</td>
                                <td width="10%">:</td>
                                <td width="70%">Tidak Pernah</td>
                            </tr>
                        </table>
                    </div>

                    <div class="wrapper-autosave">
                        <span>Kuisioner ini terdapat fitur <b>auto save</b> yang memudahkan Anda untuk meneruskan di lain waktu</span>
                    </div>

                    <div class="wrapper-info-color">
                        <small>Ketarangan warna :
                            <ul>
                                <li><i class="fas fa-circle text-warning"></i> Belum diisi</li>
                                <li><i class="fas fa-circle text-success"></i> Sudah diisi</li>
                            </ul>
                        </small>
                    </div>
                </div>

                <div class="wrapper-content">

                    <div class="title-navigation d-flex justify-content-between pb-3">
                        <div class="prev">
                            @if ( ( $current_page - 1 ) > 0 )
                            <a href="{{ route('questionnaire', ['page' => ( $current_page - 1 )]) }}" class="btn btn-primary" title="Menuju ke halaman sebelumnya">
                                <i class="fas fa-circle-left"></i>
                            </a>
                            @endif
                        </div>
                        <div class="title">
                            <span class="fw-bold" style="font-size: 26px;">Instrumen Kemandirian Belajar Kelas Eksperimen</span>
                        </div>

                        <div class="next">
                            @if ( $current_page < $max_page )
                            <a href="{{ route('questionnaire', ['page' => ( $current_page + 1 ) ]) }}" class="btn btn-primary" title="Menuju ke halaman selanjutnya">
                                <i class="fas fa-circle-right"></i>
                            </a>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <div class="wrapper-questionnaire">
                        <table class="table table-bordered w-100">
                            <tr>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;" width="5%">No</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;" width="75%">Pernyataan</th>
                                <th colspan="4" style="text-align: center;" width="20%">Jawaban</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">SI</th>
                                <th style="text-align: center;">SR</th>
                                <th style="text-align: center;">KD</th>
                                <th style="text-align: center;">TP</th>
                            </tr>

                            @foreach ( $data_questionniare as $data )
                            <tr class="bg-light">
                                <td style="text-align: center;">{{ $data->number }}.</td>
                                <td>{{ $data->description }}</td>
                                <td align="center">
                                    <input type="radio" class="SI" name="{{ $data->number_string }}" id="{{ $data->number }}" @if ( property_exists($data, 'answer') ) @if( $data->answer == 4 ) checked @endif @endif value="4" onchange="return saveAnswer(this)">
                                </td>
                                <td align="center">
                                    <input type="radio" class="SR" name="{{ $data->number_string }}" id="{{ $data->number }}" @if ( property_exists($data, 'answer') ) @if( $data->answer == 3 ) checked @endif @endif value="3" onchange="return saveAnswer(this)">
                                </td>
                                <td align="center">
                                    <input type="radio" class="KD" name="{{ $data->number_string }}" id="{{ $data->number }}" @if ( property_exists($data, 'answer') ) @if( $data->answer == 2 ) checked @endif @endif value="2" onchange="return saveAnswer(this)">
                                </td>
                                <td align="center">
                                    <input type="radio" class="TP" name="{{ $data->number_string }}" id="{{ $data->number }}" @if ( property_exists($data, 'answer') ) @if( $data->answer == 1 ) checked @endif @endif value="1" onchange="return saveAnswer(this)">
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="title-navigation d-flex justify-content-between pt-3">
                        <div class="prev">
                            @if ( ( $current_page - 1 ) > 0 )
                            <a href="{{ route('questionnaire', ['page' => ( $current_page - 1 )]) }}" class="btn btn-primary" title="Menuju ke halaman sebelumnya">
                                <i class="fas fa-circle-left"></i>
                            </a>
                            @endif
                        </div>

                        <div class="next">
                            @if ( $current_page < $max_page )
                            <a href="{{ route('questionnaire', ['page' => ( $current_page + 1 ) ]) }}" class="btn btn-primary" title="Menuju ke halaman selanjutnya">
                                <i class="fas fa-circle-right"></i>
                            </a>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function saveAnswer(e){

        var formData = new FormData()
        formData.append('current_page', '{{ $current_page }}')
        formData.append('number', $(e).attr('id'))
        formData.append('answer', $(e).val())
        formData.append('answer_code', $(e).attr('class'))

        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('questionnaire.store') }}",
            dataType: 'json',
            data: formData,
            timeout: 30000,
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Access-Control-Allow-Origin': '*'
            },
            beforeSend: function(xhr, obj) {

            },
            success: function(response) {
                // console.log(response)

            },
            error: function(error) {
                // console.log(error.status, error)
                // if(error.status == 419 || error.status == 500) {
                //     location.href = '{{ route("login") }}'
                // }

                if (error.statusText == 'timeout') {
                    // setAnswers(stepId, isNext)
                }
            }
        })
    }
</script>
@endsection
