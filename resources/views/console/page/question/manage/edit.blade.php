@extends('console.adminlte.layouts.app')

@section('css')
    <link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('assets/res/style.css') }}"> --}}

    <!--Include the JS & CSS-->
	<link rel="stylesheet" href="{{ asset('assets/richtexteditor/rte_theme_default.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source%20Sans%20Pro">
	<script type="text/javascript" src="{{ asset('assets/richtexteditor/rte.js') }}"></script>
    <script>RTE_DefaultConfig.url_base='richtexteditor'</script>
	<script type="text/javascript" src='{{ asset('assets/richtexteditor/plugins/all_plugins.js') }}'></script>
@endsection

@section('content')
<div class="content-wrapper">
    @include('console.components.breadcrumb', ['title' => 'Soal'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header bg-console text-dark">
                            <h3 class="card-title">Ubah Soal</h3>
                        </div>
                        @php
                            # dd($question);
                        @endphp
                        <div class="card-body">
                            <form action="{{ route('admin.question.manage.update', ['id' => $id]) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">No Soal</span>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="number" value="{{ $question->number }}" id="" readonly>
                                                @error('number')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">Soal</span>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <textarea id="descriptions" class="form-control" name="descriptions" value="">
                                                    {{ $question->description }}
                                                </textarea>
                                                @error('descriptions')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">Pilihan Ganda</span>
                                        </div>
                                        @php
                                            # dd($question);
                                            $options = json_decode($question->options, true);
                                        @endphp
                                        <div class="col-10">
                                            @foreach ($options as $key => $opt )
                                            <div class="form-group pt-2">
                                                <span class="pe-3">{{ $opt['value_key'] }}.</span>
                                                <textarea id="option_{{ $opt['value_key'] }}" class="form-control" name="{{ $opt['value_key'] }}">{{ $opt['value_text'] }}</textarea>
                                                @error('value_key')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">Kunci Jawaban</span>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="key_answer" value="{{ $question->key_answer }}" id="">
                                                @error('key_answer')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">Pilihan Ganda dengan alasan</span>
                                        </div>
                                        <div class="col-10">
                                            @php
                                                # dd($question);
                                                $options = json_decode($question->options_with_reason, true);
                                            @endphp
                                            @foreach ( $options as $key => $opt )

                                            <div class="form-group pt-2">
                                                <span class="pe-3">{{ $opt['value_key'] }}.</span>
                                                <textarea id="option_{{ $opt['value_key'] }}_with_reason" class="form-control" name="{{ $opt['value_key'] }}_with_reason">{{ $opt['value_text'] }}</textarea>
                                                @error('options_' . $opt['value_key'] .'_with_reason')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">Kunci Jawaban 2</span>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="key_answer_w_reason" value="{{ $question->key_answer_with_reason }}" id="">
                                                @error('key_answer_w_reason')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-4 form-display-as-box col-sm-2 control-label text-"></div>
                                        <div class="col-4">
                                            <div>
                                                <a href="{{ route('admin.question.manage') }}" class="btn bg-danger text-dark">Kembali</a>
                                                <button type="submit" class="btn bg-primary text-dark">Simpan</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="froala-editor">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.js') }}" defer></script>
<script src="{{ asset('assets/res/patch.js') }}"></script>

<script>
    var editorCong = {}
    editorCong.fontNameItems = 'Arial,Arial Black,Comic Sans MS, Courier New,Tahoma, Georgia, Helvetica, Poppins, Segoe UI, Source Sans Pro, Sans-Serif, Impact, Times New Roman,Verdana'
    var editorDesc = new RichTextEditor("#descriptions", editorCong);

    var editorOptionA = new RichTextEditor("#option_A");
    var editorOptionB = new RichTextEditor("#option_B");
    var editorOptionC = new RichTextEditor("#option_C");
    var editorOptionD = new RichTextEditor("#option_D");
    var editorOptionE = new RichTextEditor("#option_E");

    var editorOptionAWithReason = new RichTextEditor("#option_A_with_reason");
    var editorOptionBWithReason = new RichTextEditor("#option_B_with_reason");
    var editorOptionCWithReason = new RichTextEditor("#option_C_with_reason");
    var editorOptionDWithReason = new RichTextEditor("#option_D_with_reason");
    var editorOptionEWithReason = new RichTextEditor("#option_E_with_reason");

    $('input#images').on('change', (e) => {
        if ( $(e.target).attr('id') == 'images' ) {
            $('div#wrapper-images').show()
            $('img#img-content').attr('src', URL.createObjectURL(e.target.files[0]))
        }
    })
</script>
@endsection
