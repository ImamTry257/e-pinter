@extends('console.adminlte.layouts.app')

@section('css')
    {{-- <link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('assets/res/style.css') }}">

    <!--Include the JS & CSS-->
	<link rel="stylesheet" href="{{ asset('assets/richtexteditor/rte_theme_default.css') }}" />
	<script type="text/javascript" src="{{ asset('assets/richtexteditor/rte.js') }}"></script>
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
                            <h3 class="card-title">Tambah Soal</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.question.manage.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">No Soal</span>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="number" value="{{ old('number') }}" id="">
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
                                                <textarea id="descriptions" class="form-control" name="descriptions" value="{{ old('descriptions') }}"></textarea>
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
                                        <div class="col-10">
                                            <div class="form-group pt-2">
                                                <span class="pe-3">A.</span>
                                                <textarea id="option_A" class="form-control" name="A" value="{{ old('A') }}"></textarea>
                                                @error('A')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group pt-2">
                                                <span class="pe-3">B.</span>
                                                <textarea id="option_B" class="form-control" name="B" value="{{ old('B') }}"></textarea>
                                                @error('A')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group pt-2">
                                                <span class="pe-3">C.</span>
                                                <textarea id="option_C" class="form-control" name="C" value="{{ old('C') }}"></textarea>
                                                @error('A')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group pt-2">
                                                <span class="pe-3">D.</span>
                                                <textarea id="option_D" class="form-control" name="D" value="{{ old('D') }}"></textarea>
                                                @error('A')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group pt-2">
                                                <span class="pe-3">E.</span>
                                                <textarea id="option_E" class="form-control" name="E" value="{{ old('E') }}"></textarea>
                                                @error('A')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">Kunci Jawaban</span>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="key_answer" value="{{ old('key_answer') }}" id="">
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
                                            <div class="form-group pt-2">
                                                <span class="pe-3">A.</span>
                                                <textarea id="option_A_with_reason" class="form-control" name="A_with_reason" value="{{ old('A_with_reason') }}"></textarea>
                                                @error('A')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group pt-2">
                                                <span class="pe-3">B.</span>
                                                <textarea id="option_B_with_reason" class="form-control" name="B_with_reason" value="{{ old('B_with_reason') }}"></textarea>
                                                @error('A')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group pt-2">
                                                <span class="pe-3">C.</span>
                                                <textarea id="option_C_with_reason" class="form-control" name="C_with_reason" value="{{ old('C_with_reason') }}"></textarea>
                                                @error('A')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group pt-2">
                                                <span class="pe-3">D.</span>
                                                <textarea id="option_D_with_reason" class="form-control" name="D_with_reason" value="{{ old('D_with_reason') }}"></textarea>
                                                @error('A')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group pt-2">
                                                <span class="pe-3">E.</span>
                                                <textarea id="option_E_with_reason" class="form-control" name="E_with_reason" value="{{ old('E_with_reason') }}"></textarea>
                                                @error('A')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">Kunci Jawaban 2</span>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="key_answer_w_reason" value="{{ old('key_answer_w_reason') }}" id="">
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
{{-- <script src="{{ asset('assets/plugins/summernote/summernote-bs4.js') }}" defer></script> --}}
<script src="{{ asset('assets/res/patch.js') }}"></script>

<script>
    var editorDesc = new RichTextEditor("#descriptions");

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
    console.log('add content Potensial Gudeg Local');

    $('input#images').on('change', (e) => {
        if ( $(e.target).attr('id') == 'images' ) {
            $('div#wrapper-images').show()
            $('img#img-content').attr('src', URL.createObjectURL(e.target.files[0]))
        }
    })
</script>
@endsection
