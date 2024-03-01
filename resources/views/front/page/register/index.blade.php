@extends('front.layouts.app')

@section('css')
    <style>
        button.btn-register {
            background-color: #B6E0E8;
        }

        button.btn-register:hover {
            background-color: #416A71;
        }
    </style>
@endsection

@section('content')
<div style="background-color: #B6E0E8; height: 100vh;">
    <div class="row p-5 d-flex justify-content-center">
        <div class="wrapper-form col-md-4 py-3 rounded" style="background-color: #7BB7C2;">
            <div class="pb-3">
                <h3>Register</h3>
                <hr>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                {{ session('success') }}
            </div>
            @endif

            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible">
                {{ session('error') }}
            </div>
            @endif
            <form action="{{ route('register.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label text-dark">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" id="username" placeholder="Tulis Username/email anda..." autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="school" class="form-label text-dark">Asal Sekolah</label>
                    <input type="text" class="form-control @error('school') is-invalid @enderror" value="{{ old('school') }}" name="school" id="school" placeholder="Tulis asal sekolah anda">
                    @error('school')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-dark">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" id="password" placeholder="Tulis Password anda...">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label text-dark">Ulangi Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" name="password_confirmation" id="password_confirmation" placeholder="Ulangi Password anda...">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn w-100 btn-register">Register Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
