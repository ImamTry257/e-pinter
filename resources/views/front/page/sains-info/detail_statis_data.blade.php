@extends('front.layouts.app')

@section('css')
    <style>
        div.desc-content p {
            text-align: justify;
        }

        div span.title-other-main-content {
            font-size: 18px;
        }

        div span.title-other-content {
            font-size: 14px;
        }

        div.next-prev-content a span:hover {
            color: #000000;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
<div>
    <div class="wrapper-content-detail row p-5">
        {{-- main content --}}
        <div class="col-md-8">
            <div class="title-content pb-3">
                <h2>{{ $latest_sains_info->title }}</h2>
            </div>
            <div class="image-content pb-3">
                <img class="w-100" src="{{ asset('website/images/gudeg-potential/detail/detail-content-1.svg') }}" alt="">
            </div>
            <div class="desc-content pb-3">
                <p>
                    Pohon nangka (Artocarpus heterophyllus) adalah pohon tropis yang tumbuh di berbagai daerah termasuk Jogjakarta. Berikut adalah beberapa karakteristik pohon nangka sebagai bahan baku gudeg di Jogja:
                </p>

                <p>
                    Ukuran dan Bentuk Pohon: Pohon nangka dapat tumbuh cukup besar, dengan tinggi mencapai 10-20 meter. Batangnya kuat dan berkulit kasar. Daunnya berbentuk oval dengan ujung meruncing, dan biasanya memiliki panjang sekitar 10-20 cm.</p>

                <p>
                    Buah Nangka: Buah nangka adalah bagian yang paling berharga dari pohon ini sebagai bahan baku gudeg. Buahnya memiliki kulit kasar yang berduri dan berwarna hijau ketika masih muda.  Ketika matang, kulitnya berubah menjadi kuning dengan daging buah yang lembut dan berwarna kuning-oranye. Buah nangka memiliki aroma yang khas dan manis.</p>

                <p>
                    Nangka Muda sebagai Bahan Utama: Untuk membuat gudeg, nangka yang digunakan adalah nangka muda, yaitu buah yang belum sepenuhnya matang. Nangka muda memiliki daging yang masih padat dan tidak terlalu manis. Konsistensi daging buah yang khas membuatnya cocok untuk dimasak dalam santan dan bumbu gudeg.</p>

                <p>
                    Tanaman yang Tahan Lama: Pohon nangka memiliki daya tahan yang baik terhadap kondisi iklim tropis, termasuk di Jogjakarta. Pohon ini dapat bertahan lama dan menghasilkan buah dalam jumlah yang melimpah. Ini membuatnya menjadi sumber bahan baku yang dapat diandalkan untuk industri gudeg di Jogja.</p>

                <p>
                    Budidaya yang Relatif Mudah: Nangka dapat ditanam dan diperbanyak dengan biji atau stek. Pohon ini dapat tumbuh dengan baik di tanah yang subur dan mendapatkan sinar matahari yang cukup. Budidaya nangka di Jogja relatif mudah dilakukan, dan banyak petani lokal yang mengelola kebun nangka untuk memasok pasokan bahan baku gudeg
                </p>
            </div>

            <div class="next-prev-content d-flex justify-content-end">
                <div class="pe-3">
                    <a href="{{ route('sains-info.detail', ['slug' => 'zxczxc-wqeqwe']) }}" class="text-decoration-none text-dark">
                        <span>Sebelumnya</span>
                    </a>
                </div>

                <div>
                    <a href="{{ route('sains-info.detail', ['slug' => 'zxczxc-wqeqwe']) }}" class="text-decoration-none text-dark">
                        <span>Selanjutnya</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- other content --}}
        <div class="col-md-4">
            <div class="wrapper-detail-content border p-4">
                <div class="other-main-content row">
                    <div class="col-md-12 text-center">
                        <h4>Sains Info Lainnya</h4>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('sains-info.detail', ['slug' => 'zxczxc-wqeqwe']) }}" class="text-decoration-none text-dark">
                            <img class="w-100" src="{{ asset('website/images/gudeg-potential/detail/detail-other-main-content.svg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 text-center">
                        <a href="{{ route('sains-info.detail', ['slug' => 'zxczxc-wqeqwe']) }}" class="text-decoration-none text-dark">
                            <span class="title-other-main-content">Mengapa Gudeg Populer di Jogja?</span>
                        </a>
                    </div>
                </div>

                <hr>

                <div class="other-content">
                    <a href="{{ route('sains-info.detail', ['slug' => 'zxczxc-wqeqwe']) }}" class="text-decoration-none text-dark">
                        <div class="d-flex justify-content-start align-items-center pb-1 px-4">
                            <div class="w-50">
                                <img src="{{ asset('website/images/gudeg-potential/detail/detail-other-content-1.svg') }}" alt="" class="w-100">
                            </div>
                            <div class="ps-2 d-flex align-items-center w-100">
                                <span class="title-other-content">Jenis Pohon Nangka di jogja</span>
                            </div>
                        </div>
                    </a>

                    <div class="d-flex justify-content-center px-4 pb-3">
                        <hr class="w-100">
                    </div>

                    <a href="{{ route('sains-info.detail', ['slug' => 'zxczxc-wqeqwe']) }}" class="text-decoration-none text-dark">
                        <div class="d-flex justify-content-start align-items-center pb-1 px-4">
                            <div class="w-50">
                                <img src="{{ asset('website/images/gudeg-potential/detail/detail-other-content-1.svg') }}" alt="" class="w-100">
                            </div>
                            <div class="ps-2 d-flex align-items-center w-100">
                                <span class="title-other-content">Daerah yang banyak pohon nangka</span>
                            </div>
                        </div>
                    </a>

                    <div class="d-flex justify-content-center px-4 pb-3">
                        <hr class="w-100">
                    </div>

                    <a href="{{ route('sains-info.detail', ['slug' => 'zxczxc-wqeqwe']) }}" class="text-decoration-none text-dark">
                        <div class="d-flex justify-content-start align-items-center pb-1 px-4">
                            <div class="w-50">
                                <img src="{{ asset('website/images/gudeg-potential/detail/detail-other-content-1.svg') }}" alt="" class="w-100">
                            </div>
                            <div class="ps-2 d-flex align-items-center w-100">
                                <span class="title-other-content">Pohon nangka di Jogja</span>
                            </div>
                        </div>
                    </a>

                    <div class="d-flex justify-content-center px-4 pb-3">
                        <hr class="w-100">
                    </div>

                    <a href="{{ route('sains-info.detail', ['slug' => 'zxczxc-wqeqwe']) }}" class="text-decoration-none text-dark">
                        <div class="d-flex justify-content-start align-items-center pb-1 px-4">
                            <div class="w-50">
                                <img src="{{ asset('website/images/gudeg-potential/detail/detail-other-content-1.svg') }}" alt="" class="w-100">
                            </div>
                            <div class="ps-2 d-flex align-items-center w-100">
                                <span class="title-other-content">Daun jati yang baik utk gudeg</span>
                            </div>
                        </div>
                    </a>

                    <div class="d-flex justify-content-center px-4 pb-3">
                        <hr class="w-100">
                    </div>

                    <a href="{{ route('sains-info.detail', ['slug' => 'zxczxc-wqeqwe']) }}" class="text-decoration-none text-dark">
                        <div class="d-flex justify-content-start align-items-center pb-1 px-4">
                            <div class="w-50">
                                <img src="{{ asset('website/images/gudeg-potential/detail/detail-other-content-1.svg') }}" alt="" class="w-100">
                            </div>
                            <div class="ps-2 d-flex align-items-center w-100">
                                <span class="title-other-content">Cara memilih pohon nangka yang baik gudeg</span>
                            </div>
                        </div>
                    

                    <div class="d-flex justify-content-center px-4 pb-3">
                        <hr class="w-100">
                    </div>

                    <a href="{{ route('sains-info.detail', ['slug' => 'zxczxc-wqeqwe']) }}" class="text-decoration-none text-dark">
                        <div class="d-flex justify-content-start align-items-center pb-1 px-4">
                            <div class="w-50">
                                <img src="{{ asset('website/images/gudeg-potential/detail/detail-other-content-1.svg') }}" alt="" class="w-100">
                            </div>
                            <div class="ps-2 d-flex align-items-center w-100">
                                <span class="title-other-content">Peran gula jawa dalam pembuatan gudeg</span>
                            </div>
                        </div>
                    </a>

                    <div class="d-flex justify-content-center px-4 pb-3">
                        <hr class="w-100">
                    </div>
                </div>
            </div>

        </div>

    </div>

    @include('front.component.footer')
</div>
@endsection
