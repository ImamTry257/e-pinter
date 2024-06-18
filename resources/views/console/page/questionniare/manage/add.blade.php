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
                <div class="col-md-12 pb-2">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif

                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                            @php
                                Session::forget('error');
                            @endphp
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header bg-console text-dark">
                            <h3 class="card-title">Tambah Soal</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.questionniare.manage.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">Halaman ke</span>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="page" value="{{ old('page') }}" id="">
                                                @error('page')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">No Soal</span>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="number" value="{{ old('number') }}" id="" readonly>
                                                @error('number')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text- pt-2">
                                            <span for="" class="">Tipe Pernyataan</span>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <select name="statement_type" id="" class="form-control">
                                                    <option value="positive">Positive</option>
                                                    <option value="negative">Negative</option>
                                                </select>
                                                @error('statement_type')
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

                                    <div class="row pt-2">
                                        <div class="col-4 form-display-as-box col-sm-2 control-label text-"></div>
                                        <div class="col-4">
                                            <div>
                                                <a href="{{ route('admin.questionniare.manage') }}" class="btn bg-danger text-dark">Kembali</a>
                                                <button type="submit" name="create" class="btn bg-primary text-dark">Simpan</button>
                                                <button type="submit" name="create_again" class="btn bg-primary text-dark">Simpan dan buat soal kembali</button>
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

    $(document).ready(function() {
        getMaxNumber()
    })

    function getMaxNumber() {
        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('admin.questionniare.get.max_number') }}",
            dataType: 'json',
            timeout: 3000,
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
                if ( response.status ) {
                    $('input[name="number"]').val( ( response.data + 1 ) )
                }
                console.log(response)
            },
            error: function(error) {
                if (error.statusText == 'timeout') {
                }
            }
        })
    }
</script>
@endsection
