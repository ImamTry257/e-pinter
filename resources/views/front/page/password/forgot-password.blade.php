@extends('front.layouts.app-login')

@section('css')
    <style>
        body {
            background-color: #FFFF;
        }

        div.title-form-forgot-password span {
            font-size: 35px;
        }

        label, span.title-forgot-password {
            font-size: 12px;
        }

        button.btn-forgot-password {
            background-color: #00488A;
        }

        button.btn-forgot-password:hover {
            background-color: #013463;
        }

        .title-forgot-password a {
            color: #0D9EEF;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
<div style="height: 100vh;">
    <div class="row p-5 d-flex justify-content-center align-items-center h-100">
        <div class="wrapper-form col-xl-4 col-md-12 col-lg-6 py-3 rounded">
            <div class="pb-3 text-center title-form-forgot-password">
                <span>Lupa Password</span>
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
            <form action="{{ route('forgot-password-student.token') }}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label text-dark">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Tulisa email Anda">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="py-2">
                    <button type="submit" class="btn w-100 btn-forgot-password text-white rounded">SUBMIT</button>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <span class="title-forgot-password">
                            <a href="{{ route('login') }}" class="">Kembali ke halaman login</a>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
