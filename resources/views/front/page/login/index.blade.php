@extends('front.layouts.app')

@section('css')
    <style>
        button.btn-login {
            background-color: #B6E0E8;
        }

        button.btn-login:hover {
            background-color: #416A71;
        }
    </style>
@endsection

@section('content')
<div style="background-color: #B6E0E8; height: 100vh;">
    <div class="row p-5 d-flex justify-content-center">
        <div class="wrapper-form col-md-4 py-3 rounded" style="background-color: #7BB7C2;">
            <div class="pb-3">
                <h3>Login</h3>
                <hr>
            </div>
            <form action="{{ route('login.login') }}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label text-dark">Username</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Tulis Username/email anda..." value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-dark">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Tulis Password anda..." value="{{ old('email') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn w-100 btn-login">Login</button>
            </form>
        </div>
    </div>
</div>

@include('front.page.login.script.js-login')
@endsection
