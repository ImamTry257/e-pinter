@extends('console.adminlte.layouts.app')

@section('css')
    <link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/froala_editor.pkgd.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/froala_style.min.css') }}">
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
                            <form action="{{ route('admin.user.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-right pt-2">
                                            <label for="" class=""><small>No Soal</small></label>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="">
                                                @error('name')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-right pt-2">
                                            <label for="" class=""><small>Soal</small></label>
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

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-right pt-2">
                                            <label for="" class=""><small>Password</small></label>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="">
                                                @error('password')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-right pt-2">
                                            <label for="" class=""><small>Ulangi Password</small></label>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" id="">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-4 form-display-as-box col-sm-2 control-label text-right"></div>
                                        <div class="col-4">
                                            <div>
                                                <a href="{{ route('admin.user') }}" class="btn bg-danger text-dark">Kembali</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
<script src="{{ asset('assets/js/froala_editor.pkgd.min.js') }}"></script>

<script>
    console.log('add content Potensial Gudeg Local')
    $(document).ready(function() {
        // $('#descriptions').summernote()
        setTimeout(() => {
            console.log($('#froala-editor').froalaEditor())
            // $('#froala-editor').froalaEditor({
            //     toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'emoticons', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'help', 'html', '|', 'undo', 'redo']
            // })
        }, 1000);
    });

    $('input#images').on('change', (e) => {
        console.log($(e.target).val())
        if ( $(e.target).attr('id') == 'images' ) {
            $('div#wrapper-images').show()
            $('img#img-content').attr('src', URL.createObjectURL(e.target.files[0]))
        }
    })
</script>
@endsection
