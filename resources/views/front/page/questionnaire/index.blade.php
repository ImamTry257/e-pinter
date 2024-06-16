@extends('front.layouts.app-dashboard')

@section('content')
<div class="wrapper-dahboard-page col-lg-10 px-2 row">

    <div class="card list-topic-content col-12 mx-3 bg-white">
        <div class="title-list row d-flex justify-content-center">
            <div class="col-lg-11 py-5">

                {{-- Say Welcome and Detial Informasi --}}
                <div class="wrapper-detail-info">
                    <span>Selamat Datang, {{ Auth::user()->name; }} </span>
                </div>

                <div class="wrapper-adjust-info">
                    <span>Mohon kuisioner ini diisi dengan sungguh-sungguh untuk umpan balik dalam perbaikan pelayanan bagi mahasiswa dan tidak akan mempengaruhi nilai dalam perkuliahan</span>
                </div>

                <div class="wrapper-info">
                    <table>
                        <tr>
                            <td width="30%">TP</td>
                            <td width="10%">:</td>
                            <td width="70%">Tidak Puas</td>
                        </tr>
                        <tr>
                            <td width="30%">KP</td>
                            <td width="10%">:</td>
                            <td width="70%">Kurang Puas</td>
                        </tr>
                        <tr>
                            <td width="30%">P</td>
                            <td width="10%">:</td>
                            <td width="70%">Puas</td>
                        </tr>
                        <tr>
                            <td width="30%">SP</td>
                            <td width="10%">:</td>
                            <td width="70%">Sangat Puas</td>
                        </tr>
                    </table>
                </div>

                <div class="wrapper-autosave">
                    <span>Kuisioner ini </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
