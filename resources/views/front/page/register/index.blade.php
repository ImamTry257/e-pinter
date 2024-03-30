@extends('front.layouts.app-login')

@section('css')
    <style>
        body {
            background-image: url('{{ asset("assets/bg-register.svg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position-y: -250px;
            background-color: #9BECDA;
        }

        div.title-form-register span {
            font-size: 35px;
        }

        label, span.title-register {
            font-size: 12px;
        }

        button.btn-register {
            background-color: #00488A;
        }

        button.btn-register:hover {
            background-color: #013463;
        }
    </style>
@endsection

@section('content')
<div style="height: 100vh;">
    <div class="row p-5 d-flex justify-content-center">
        <div class="wrapper-form col-xl-4 col-md-12 col-lg-6 py-3 rounded">
            <div class="pb-3 text-center title-form-register">
                <span>Sign up as a Student</span>
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
                    <label for="username" class="form-label text-dark">Nama Lengkap</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" id="username" placeholder="Username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-dark">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-dark">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" id="password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label text-dark">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="py-2">
                    <button type="submit" class="btn w-100 btn-register text-white rounded">DAFTAR</button>
                </div>

                <div class="row">
                    <div class="col-4"></div>

                    <div class="col-8 text-end">
                        <span class="title-register">
                            <span class="child-title">Sudah memiliki akun?</span>
                            <a href="{{ route('login') }}" class="text-dark">Daftar di sini</a>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
