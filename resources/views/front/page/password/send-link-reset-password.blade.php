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

        a.btn-forgot-password, .bg-icon-success {
            background-color: #00488A;
        }

        a.btn-forgot-password:hover {
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
    @include('front.component.card-success');
</div>
@endsection
