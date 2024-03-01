@extends('console.adminlte.layouts.app')

@section('css')
<link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content-wrapper">
    @include('console.components.breadcrumb', ['title' => 'Learning Activity'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header bg-console text-dark">
                            <h3 class="card-title">Tambah Learning Activity</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.learning.activity.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-right pt-2">
                                            <label for="" class=""><small>Judul</small></label>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="">
                                                @error('title')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-right pt-2">
                                            <label for="" class="pt-2"><small>Images</small></label>
                                        </div>
                                        <div class="col-10 pt-2">
                                            <div class="mb-3" id="wrapper-images">
                                                <img src="" alt="" id="img-content" width="250">
                                            </div>
                                            <div class="">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="images" id="images">
                                                            <label class="custom-file-label" for="images">Choose file</label>
                                                        </div>
                                                    </div>
                                                    @error('images')
                                                        <span class="invalid-feedback d-inline" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-right pt-2">
                                            <label for="" class=""><small>Descriptions</small></label>
                                        </div>
                                        <div class="col-10 pt-2">
                                            <div class="form-group">
                                                <textarea id="desc_sains_info" class="form-control" name="descriptions" value="{{ old('descriptions') }}"></textarea>
                                                @error('descriptions')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row d-none">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-right pt-2">
                                            <label for="" class=""><small>Set headline</small></label>
                                        </div>
                                        <div class="col-10 pt-2">
                                            <div class="form-group icheck-primary d-inline">
                                                {{-- <input type="text" class="form-control" name="title" value="{{ old('title') }}" id=""> --}}
                                                <input type="checkbox" id="checkboxPrimary2" name="is_headline">
                                                <div>
                                                    @error('is_headline')
                                                        <span class="invalid-feedback d-inline" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-right pt-2">
                                            <label for="" class=""><small>Status</small></label>
                                        </div>
                                        <div class="col-10 pt-2">
                                            <div class="form-group icheck-primary d-inline">
                                                {{-- <input type="text" class="form-control" name="title" value="{{ old('title') }}" id=""> --}}
                                                <input type="checkbox" id="checkboxPrimary2" name="status">
                                                <div>
                                                    @error('status')
                                                        <span class="invalid-feedback d-inline" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-4 form-display-as-box col-sm-2 control-label text-right"></div>
                                        <div class="col-4">
                                            <div>
                                                <a href="{{ route('admin.learning.activity') }}" class="btn bg-danger text-dark">Kembali</a>
                                                <button type="submit" class="btn bg-primary text-dark">Simpan</button>
                                            </div>
                                        </div>
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
<script>
    console.log('add content Learning Activity')
    $(document).ready(function() {
        $('#desc_sains_info').summernote()
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
