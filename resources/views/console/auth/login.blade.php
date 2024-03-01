@extends('adminlte.layouts.auth')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ route('home') }}"><b>{{ config('app.name', 'Laravel') }}</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('login.admin.store') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                <div class="col-8 d-none">
                    <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        {{ __('Remember Me') }}
                    </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                </div>
                <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3 d-none">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->
            @if (Route::has('password.request'))
                <p class="mb-1 d-none">
                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                </p>
            @endif
            @if (Route::has('register.admin.index'))
                <p class="mb-0 pt-3">
                    <a href="{{ route('register.admin.index') }}" class="text-center">Klik disini jika belum punya akun.</a>
                </p>
            @endif
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
@endsection
