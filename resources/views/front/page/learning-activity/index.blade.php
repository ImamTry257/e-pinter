@extends('front.layouts.app')

@section('css')
    <style>
        div.title-about p {
            font-size: 18px;
        }

        div.wrapper-content {
            padding-right: 10%;
            padding-left: 10%;
        }

        div.wrapper-content ol {
            padding-left: 1rem;
        }

        div.wrapper-content ol li {
            text-align: justify;
        }

        a.btn-save-next {
            background-color: #009D10;
        }

        a.btn-save-next:hover {
            background-color: #05550d;
        }

        a.btn-save {
            padding-top: 18px;
            padding-bottom: 18px;
            background-color: #0D6EFD;
        }

        a.btn-save:hover {
            background-color: #083373;
        }

        .nav-tabs li.custome-link .nav-link {
            color: #495057;
        }

        .nav-tabs li.custome-link .nav-link.active {
            color: #202122;
            font-weight: bold;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        }
    </style>
@endsection

<link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">

@section('content')
<div>
    {{--  content  --}}
    <div class="row pt-5 wrapper-content pb-5 d-flex justify-content-center">
        <div class="col-md-10">
            <div class="wrapper-alert">
                <div class="alert alert-success">
                    Simpan Data berhasil!
                </div>
            </div>

            <div>
                <ul class="nav nav-tabs">
                    @foreach ($list_data as $index => $data)
                    @php
                        $active = '';
                    @endphp
                    @if ($index == 0)
                    @php
                        $active = 'active'
                    @endphp
                    @endif
                    <li class="nav-item custome-link">
                        <a class="nav-link {{ $active }}" id="{{ ( $index + 1 ) }}" aria-current="page" href="javascript:void(0);">{{ $data->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{--  Acitvity 1 --}}
            <div class="pt-3 steps" id="step-1">
                <form action="#" method="post">
                    {{-- STEP 1 --}}
                    <div class="wrapper-step-1 pb-4">
                        <h5 class="pb-2">Langkah 1: Orientasi dan Identifikasi pada Masalah</h5>
                        <h6>Mari Baca artikel dan amati gambar di bawah ini</h6>
                        <h6>
                            <a href="https://kagama.co/2019/12/19/gudeg-dan-lotek-kurang-mengenyangkan-tapi-mengandung-energi-yang-sangat-tinggi" target="_blank">
                                https://kagama.co/2019/12/19/gudeg-dan-lotek-kurang-mengenyangkan-tapi-mengandung-energi-yang-sangat-tinggi
                            </a>
                        </h6>
                        <div>
                            <img src="{{ asset('website/images/learning-activity/activity-1.svg') }}" alt="" class="w-25">
                        </div>
                        <div class="pb-2">
                            <span>Gambar makan tidak kenyang tapi sehat</span><br />
                            <span>Sumber: <a href="www.istockphoto.com" target="_blank">www.istockphoto.com</a></span>
                        </div>
                        <div class="border border-dark desc-step-1">
                            <p class="text-justify px-2 pt-2">Ani sedang berlibur ke kota Yogyakarta Bersama kedua oang tuanya. Menu makan siang hari ini adalah gudeg. Setelah selesai makan Ani merasa kurang kenyang, padahal makan sesuai porsi biasanya. Akhirnya Ani memutuskan untuk mencari tahu kandungan nutrisi apa saja yang ada dalam gudeg dan berapa jumlah kalori dalam gudeg.</p>
                        </div>
                    </div>

                    {{-- STEP 2 --}}
                    <div class="wrapper-step-2 pb-4">
                        <h5 class="pb-2">Langkah 2: Mengatur peserta didik untuk belajar</h5>
                        <div class="question-step-2">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Setelah kamu membaca dan melihat ilustrasi tersebut, permasalahan apa yang dapat kamu ungkapkan? Tuliskan pendapatmu pada kolom di bawah ini ya!</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" class="answer-2" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="question-b pt-4">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Informasi apa yang kalian perlu ketahui untuk menyelesaikan masalah? Tulis juga pendapatmu pada kolom di bawah ini ya!</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="question-b" id="input_answer" class="answer-3" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  STEP 3  --}}
                    <div class="wrapper-step-3 pb-4">
                        <h5 class="pb-2">Langkah 3: Merancang penyelidikan untuk memilih strategi pemecahan masalah</h5>
                        <div class="question-step-3">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">1. Analisislah komponen nutrisi yang terdapat gudeg dari artikel diinternet dan buku! Apabila sudah selesai berdiskusi, tulis jawabanmu pada kolom berikut ini ya!</p>
                                        <ol type="a">
                                            <li class="pb-4">
                                                <a href="https://ditsmp.kemdikbud.go.id/komposisi-zat-dalam-pola-makanan-bergizi-dan-seimbang/">https://ditsmp.kemdikbud.go.id/komposisi-zat-dalam-pola-makanan-bergizi-dan-seimbang/</a>
                                            </li>
                                            <li>
                                                <a href="https://hellosehat.com/nutrisi/fakta-gizi/zat-gizi-makro-vs-mikro">https://hellosehat.com/nutrisi/fakta-gizi/zat-gizi-makro-vs-mikro</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" class="answer-4" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="question-b pt-4">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-b px-2 pt-2">
                                        <p class="text-justify">1. Analisis dan hitunglah jumlah kalori yang terdapat dalam setiap komponen gudeg melalui tabel gizi/tabel komposisi makanan pada link berikut <br />
                                            <a href="https://ahligizi.id/blog/2019/05/01/tabel-komposisi-pangan-indonesia-tkpi-terbaru/">https://ahligizi.id/blog/2019/05/01/tabel-komposisi-pangan-indonesia-tkpi-terbaru/</a> <br />
                                            Setelah itu, hitunglah jumlah kalori dalam gudeg secara keseluruhan melalui link yang sama. <br />
                                            Apabila sudah selesai berdiskusi, silahkan tulis jawabanmu pada kolom berikut ya!</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="question-b" id="input_answer" class="answer-5" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 4--}}
                    <div class="wrapper-step-4 pb-4">
                        <h5 class="pb-2">Langkah 4: Menyajikan data dan presentasi</h5>
                        <div class="question-step-3">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Tuliskanlah hasil analisismu di tahap sebelumnya pada kolom di bawah ini secara ringkas dan jelas!</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" class="answer-6" cols="30" rows="10"></textarea>
                                </div>
                                <div class="border border-dark mb-2 mt-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Silahkan presentasikan hasil diskusi kelompok secara bergantian!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 5--}}
                    <div class="wrapper-step-5 pb-4">
                        <h5 class="pb-2">Langkah 5: Evaluasi dan Refleksi</h5>
                        <div class="question-step-3">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Cek pada menu refleksi untuk melihat kebenaran materi dengan hasil diskusimu! Tuliskanlah kesimpulan dari hasil diskusi dan presentasi bersama kelompokmu, lalu tuliskan pada kolom berikut</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" class="answer-7" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="question-b pt-4">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-b px-2 pt-2">
                                        <p class="text-justify">Jadi, kesimpulannya mengapa ANI tdk kenyang makan gudeg</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="question-b" id="input_answer" class="answer-8" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{--  Acitvity 2 --}}
            <div class="pt-3 steps d-none" id="step-2">
                <form action="#" method="post">
                    {{-- STEP 1 --}}
                    <div class="wrapper-step-1 pb-4">
                        <h5 class="pb-2">Langkah 1: Orientasi dan Identifikasi pada Masalah</h5>
                        <h6>Mari Baca artikel dan amati gambar di bawah ini</h6>
                        <h6>
                            <a href="https://enutrisi.com/kalori-gudeg/" target="_blank">
                                https://enutrisi.com/kalori-gudeg/
                            </a>
                        </h6>
                        <div>
                            <img src="{{ asset('website/images/learning-activity/activity-2.svg') }}" alt="" class="w-25">
                        </div>
                        <div class="pb-2">
                            <span>Gambar kaget melihat berat badan yang naik saat menimbang<br />
                            <span>Sumber: <a href="https://bobo.grid.id" target="_blank">https://bobo.grid.id</a></span>
                        </div>
                        <div class="border border-dark desc-step-1">
                            <p class="text-justify px-2 pt-2">Sarah kaget melihat angka pada timbangan. Sarah mengalami kenaikan berat badan. Hari ini di rumah Sarah ada acara arisan keluarga dengan menu gudeg. Akan tetapi Sarah galau mau makan gudeg atau tidak karena berat badannya yang naik. Jadi Sarah memutuskan untuk tetap memakan gudeg dengan mencari tahu zat aditif yang mungkin bisa diganti agar bisa dimakan olehnya yang sedang diet.</p>
                        </div>
                    </div>

                    {{-- STEP 2 --}}
                    <div class="wrapper-step-2 pb-4">
                        <h5 class="pb-2">Langkah 2: Mengatur peserta didik untuk belajar</h5>
                        <div class="question-step-2">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Setelah kamu membaca dan melihat ilustrasi tersebut, permasalahan apa yang dapat kamu ungkapkan? Tuliskan pendapatmu pada kolom di bawah ini ya!</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" cols="30" class="answer-9" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="question-b pt-4">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Informasi apa yang kalian perlu ketahui untuk menyelesaikan masalah? Tulis juga pendapatmu pada kolom di bawah ini ya!</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="question-b" id="input_answer" cols="30" class="answer-10" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 3--}}
                    <div class="wrapper-step-3 pb-4">
                        <h5 class="pb-2">Langkah 3: Merancang penyelidikan untuk memilih strategi pemecahan masalah</h5>
                        <div class="question-step-3">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">1. Analisislah materi zat aditif yang terkandung dalam gudeg pada link berikut ini</p>
                                        <ol type="a">
                                            <li class="pb-4">
                                                <a href="https://www.ruangguru.com/blog/apa-sih-zat-aditif-itu">https://www.ruangguru.com/blog/apa-sih-zat-aditif-itu</a>
                                            </li>
                                            <li>
                                                <a href="https://hellosehat.com/nutrisi/fakta-gizi/efek-zat-aditif-pada-makanan">https://hellosehat.com/nutrisi/fakta-gizi/efek-zat-aditif-pada-makanan</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" cols="30" class="answer-11" rows="10"></textarea>
                                </div>

                            </div>

                            <div class="question-b pt-4">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-b px-2 pt-2">
                                        <p class="text-justify">Analisislah zat aditif yang aman untuk orang yang diet dan orang yang terkena diabetes. Apabila sudah selesai berdiskusi, silahkan tulis jawabanmu pada kolom berikut ya!</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="question-b" id="input_answer" class="answer-12" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 4--}}
                    <div class="wrapper-step-4 pb-4">
                        <h5 class="pb-2">Langkah 4: Menyajikan data dan presentasi</h5>
                        <div class="question-step-3">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Tuliskanlah hasil analisismu di tahap sebelumnya pada kolom di bawah ini secara ringkas dan jelas!</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" class="answer-13" cols="30" rows="10"></textarea>
                                </div>
                                <div class="border border-dark mb-2 mt-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Silahkan presentasikan hasil diskusi kelompok secara bergantian!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 5--}}
                    <div class="wrapper-step-5 pb-4">
                        <h5 class="pb-2">Langkah 5: Evaluasi dan Refleksi</h5>
                        <div class="question-step-3">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Cek pada menu refleksi untuk melihat kebenaran materi dengan hasil diskusimu! Tuliskanlah kesimpulan dari hasil diskusi dan presentasi bersama kelompokmu, lalu tuliskan pada kolom berikut</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" class="answer-14" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="question-b pt-4">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-b px-2 pt-2">
                                        <p class="text-justify">Jadi, kesimpulannya bagaimana orang diet dan yang terkena diabetes agar dapat makan gudeg</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="question-b" id="input_answer" class="answer-15" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{--  Acitvity 3 --}}
            <div class="pt-3 steps d-none" id="step-3">
                <form action="#" method="post">
                    {{-- STEP 1 --}}
                    <div class="wrapper-step-1 pb-4">
                        <h5 class="pb-2">Langkah 1: Orientasi dan Identifikasi pada Masalah</h5>
                        <h6>Mari Baca artikel dan amati gambar di bawah ini</h6>
                        <h6>
                            <a href="https://travel.kompas.com/read/2016/11/19/131000227/selain.enak.gudeg.juga.baik.untuk.kesehatan" target="_blank">
                                https://travel.kompas.com/read/2016/11/19/131000227/selain.enak.gudeg.juga.baik.untuk.kesehatan
                            </a>
                        </h6>
                        <div>
                            <img src="{{ asset('website/images/learning-activity/activity-3.svg') }}" alt="" class="w-25">
                        </div>
                        <div class="pb-2">

                            <span>Gambar makan dan organ pencernaan</span><br />
                            <span>Sumber: <a href="https://www.ekaikhsanudin.net"> https://www.ekaikhsanudin.net</a></span>

                        </div>
                        <div class="border border-dark desc-step-1">
                            <p class="text-justify px-2 pt-2">Lala dan keluarga sedang makan malam dengan menu gudeg di salah satu tempat makan. Lala sangat bersemangat dan lahap ketika makan, namun di tengah2 makan Lala tersedak karena bercanda dengan kakaknya. Gudeg yang dimakan keluar dari mulut dan ada yang dari hidung. Lala menangis dan bertekad mencari tahu jalu sistem pencernaan yang ada di tubuh agar berhati-hati ketika makan</p>
                        </div>
                    </div>

                    {{-- STEP 2 --}}
                    <div class="wrapper-step-2 pb-4">
                        <h5 class="pb-2">Langkah 2: Mengatur peserta didik untuk belajar</h5>
                        <div class="question-step-2">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Setelah kamu membaca dan melihat ilustrasi tersebut, permasalahan apa yang dapat kamu ungkapkan? Tuliskan pendapatmu pada kolom di bawah ini ya!</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" class="answer-16" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="question-b pt-4">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Materi IPA apa yang kalian perlu ketahui untuk menyelesaikan permasalahan? Tulis juga pendapatmu pada kolom di bawah ini ya!</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="question-b" id="input_answer" class="answer-17" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 3--}}
                    <div class="wrapper-step-3 pb-4">
                        <h5 class="pb-2">Langkah 3: Merancang penyelidikan untuk memilih strategi pemecahan masalah</h5>
                        <div class="question-step-3">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">1. Analisislah bagaimana proses gudeg dalam sistem pencernaan secara berurutan pada link berikut ini <br />
                                        <a href="https://www.ruangguru.com/blog/sistem-pencernaan-manusia">https://www.ruangguru.com/blog/sistem-pencernaan-manusia</a></p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" class="answer-18" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="question-b pt-4">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-b px-2 pt-2">
                                        <p class="text-justify">Analisislah masing-masing fungsi organ tersebut dalam mengolah gudeg sehingga menjadi veses</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="question-b" id="input_answer" class="answer-19" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 4--}}
                    <div class="wrapper-step-4 pb-4">
                        <h5 class="pb-2">Langkah 4: Menyajikan data dan presentasi</h5>
                        <div class="question-step-3">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Tuliskanlah hasil analisismu di tahap sebelumnya pada kolom di bawah ini secara ringkas dan jelas!</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" class="answer-20" cols="30" rows="10"></textarea>
                                </div>
                                <div class="border border-dark mb-2 mt-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Silahkan presentasikan hasil diskusi kelompok secara bergantian!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 5--}}
                    <div class="wrapper-step-5 pb-4">
                        <h5 class="pb-2">Langkah 5: Evaluasi dan Refleksi</h5>
                        <div class="question-step-3">
                            <div class="question-a">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-a px-2 pt-2">
                                        <p class="text-justify">Cek pada menu refleksi untuk melihat kebenaran materi dengan hasil diskusimu! Tuliskanlah kesimpulan dari hasil diskusi dan presentasi bersama kelompokmu, lalu tuliskan pada kolom berikut</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="" id="input_answer" class="answer-21" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="question-b pt-4">
                                <div class="border border-dark mb-2">
                                    <div class="content-question-b px-2 pt-2">
                                        <p class="text-justify">Jadi, kesimpulannya bagaimana lala bisa tersedak saat makan karena bercanda dengan kakaknya?</p>
                                    </div>
                                </div>
                                <div>
                                    <textarea required name="question-b" id="input_answer" class="answer-22" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="pt-3">
                <a href="" class="text-white btn btn-save">Simpan</a>
                <a href="" class="text-white btn btn-save-next">Simpan dan Masuk kegiatan <br/> Pembelajaran Selanjutnya</a>
            </div>
        </div>
    </div>

    {{-- footer --}}
    @include('front.component.footer')
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.js') }}" defer></script>
@include('front.page.learning-activity.script.js-learning-activity')
@endsection
