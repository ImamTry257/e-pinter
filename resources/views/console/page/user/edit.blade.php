@extends('console.adminlte.layouts.app')

@section('css')
<link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content-wrapper">
    @include('console.components.breadcrumb', ['title' => 'Siswa'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header bg-console text-dark">
                            <h3 class="card-title">Ubah Siswa</h3>
                        </div>
                        @php
                            // dd($user);
                        @endphp
                        <div class="card-body">
                            <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-start pt-2">
                                            <label for="" class=""><small>Username</small></label>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="">
                                                @error('name')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-start pt-2">
                                            <label for="" class=""><small>Asal Sekolah</small></label>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="school" value="{{ $user->school }}" id="">
                                                @error('school')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-start pt-2">
                                            <label for="" class=""><small>Password</small></label>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" value="" id="">
                                                @error('password')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 form-display-as-box col-sm-2 control-label text-start pt-2">
                                            <label for="" class=""><small>Ulangi Password</small></label>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" id="" value="">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback d-inline" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-4 form-display-as-box col-sm-2 control-label text-start"></div>
                                        <div class="col-4">
                                            <div>
                                                <a href="{{ route('admin.user') }}" class="btn bg-danger text-dark">Kembali</a>
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
    console.log('add content Potensial Gudeg Local')
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
