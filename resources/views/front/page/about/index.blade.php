@extends('front.layouts.app')

@section('css')
    <style>
        body {
            background-image: url('{{ asset("assets/pemgembang/bg-pengembang.svg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position-y: -60px;
        }
    </style>
@endsection

@section('content')
    <h1>About Us Page</h1>
@endsection
