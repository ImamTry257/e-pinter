@extends('front.layouts.app-login')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet"/>
    <style>
        button.btn-login {
            background-color: #4CE780;
        }

        button.btn-login:hover {
            background-color: #2a7443;
        }

        .wrapper-form input.form-control, button.btn-login {
            border-radius: 10px;
        }

        .wrapper-form input {
            font-family: Arial, FontAwesome;
        }

        form {
            width: 400px;
        }

        span.title-forgot-pass, span.title-register {
            font-size: 12px;
        }

        span.title-register span.child-title{
            color: #4CE780;
        }
    </style>
@endsection

@section('content')
<div style="height: 100vh;" class="d-flex justify-content-center">
    <div class="row p-5">
        <div class="wrapper-form col-12 py-3 rounded">
            <div class="pb-3 text-center">
                {{-- <h3>Login</h3> --}}
                <img src="{{ asset('assets/login-title.svg') }}" width="120" alt="">
            </div>
            <form action="{{ route('login.login') }}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-3 py-2">
                    <input type="text" class="form-control py-2 @error('name') is-invalid @enderror" name="name" id="name" placeholder="&#61447 Email or Username" autofocus value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 py-2">
                    <input type="password" class="form-control py-2 @error('password') is-invalid @enderror" name="password" id="password" placeholder="&#61475 Password" value="{{ old('email') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="py-2">
                    <button type="submit" class="btn w-100 py-2 btn-login text-white">LOGIN</button>
                </div>

                <div class="row">
                    <div class="col-4">
                        <span class="text-white title-forgot-pass">
                            <a href="{{ route('password.request') }}" class="text-white">Lupa Password?</a>
                        </span>
                    </div>

                    <div class="col-8 text-end">
                        <span class="text-white title-register">
                            <span class="child-title">Belum memiliki akun?</span>
                            <a href="{{ route('register') }}" class="text-white">Daftar di sini</a>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('front.page.login.script.js-login')
@endsection
