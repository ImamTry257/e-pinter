@extends('front.layouts.app')

@section('css')
    <style>
        body {
            background-image: url('{{ asset("assets/pemgembang/bg-pengembang.svg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position-y: -60px;
        }

        #content-profile {
            color: white;
        }

        @media (min-width: 770px) {
            #content-profile #profile-title {
                font-size: 20px;
                font-weight: lighter;
            }

            #content-profile #profile-name {
                font-size: 26px;
                font-weight: bold;
            }

            #content-profile #profile-job {
                font-size: 19px;
                font-weight: bold;
            }

            #content-profile #university {
                font-size: 11px;
                font-weight: lighter;
            }
        }

        @media ( max-width: 769px ) and (min-width: 690px) {
            #content-profile #profile-title {
                font-size: 17px;
                font-weight: lighter;
            }

            #content-profile #profile-name {
                font-size: 23px;
                font-weight: bold;
            }

            #content-profile #profile-job {
                font-size: 15px;
                font-weight: bold;
            }

            #content-profile #university {
                font-size: 9px;
                font-weight: lighter;
            }
        }

        @media ( max-width: 689px ) and (min-width: 600px) {
            #content-profile #profile-title {
                font-size: 15px;
                font-weight: lighter;
            }

            #content-profile #profile-name {
                font-size: 19px;
                font-weight: bold;
            }

            #content-profile #profile-job {
                font-size: 13px;
                font-weight: bold;
            }

            #content-profile #university {
                font-size: 9px;
                font-weight: lighter;
            }
        }
    </style>
@endsection

@section('content')
    <div class="wrapper-main-content d-flex align-items-center justify-content-center pt-5">
        <div class="owl-carousel owl-theme">
            {{-- Pengembang 1 --}}
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-5" id="content-profile">
                    <div>
                        <span id="profile-title">Profile Pengembang Website</span>
                    </div>
                    <div>
                        <span id="profile-name">Aditya Yoga Purnama</span>
                    </div>
                    <div>
                        <span id="profile-job">Mahasiwa s3 Ilmu Pendidikan</span>
                    </div>
                    <div>
                        <span id="university">Universitas Negeri Yogyakarta</span>
                    </div>
                </div>

                <div class="col-3">
                    <img src="{{ asset('assets/pemgembang/pengembang1.svg') }}" class="rounded" width="100" alt="">
                </div>
            </div>


            {{-- Pengembang 2 --}}
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-5" id="content-profile">
                    <div>
                        <span id="profile-title">Profile Pengembang Website</span>
                    </div>
                    <div>
                        <span id="profile-name">Prof. Dr. Ariswan, M.Si</span>
                    </div>
                    <div>
                        <span id="profile-job">Guru Besar UNY</span>
                    </div>
                    <div>
                        <span id="university">Universitas Negeri Yogyakarta</span>
                    </div>
                </div>

                <div class="col-3">
                    <img src="{{ asset('assets/pemgembang/pengembang2.svg') }}" class="rounded" width="100" alt="">
                </div>
            </div>

            {{-- Pengembang 3 --}}
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-5" id="content-profile">
                    <div>
                        <span id="profile-title">Profile Pengembang Website</span>
                    </div>
                    <div>
                        <span id="profile-name">Prof. Dr. Edi Istiyono, M.Si.</span>
                    </div>
                    <div>
                        <span id="profile-job">Guru Besar UNY</span>
                    </div>
                    <div>
                        <span id="university">Universitas Negeri Yogyakarta</span>
                    </div>
                </div>

                <div class="col-3">
                    <img src="{{ asset('assets/pemgembang/pengembang3.svg') }}" class="rounded" width="100" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0:{
                    items:1
                }
                // ,
                // 600:{
                //     items:3
                // },
                // 1000:{
                //     items:5
                // }
            }
        })
    </script>
@endsection
