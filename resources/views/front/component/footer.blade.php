<div class="row">
    <div class="col-md-4 d-flex justify-content-evenly align-items-center">
        <div class="icon-university">
            <img src="{{ asset('website/images/logo-uny.svg') }}" alt="">
        </div>
        <div>
            <h2 class="title-content-footer text-white">Website IPA</h2>
            <p class="desc-content-footer text-white">Jl. Colombo Yogyakarta No.1, Karang Malang, <br />
                Caturtunggal, Kec. Depok, Kabupaten Sleman, <br />
                Daerah Istimewa Yogyakarta 55281</p>
        </div>
    </div>

    <div class="col-md-3 d-flex justify-content-evenly align-items-center">
        <div>
            <h2 class="title-content-footer text-white">Tentang Kami</h2>
            <ul class="list-unstyled text-white">
                <li>
                    <a href="{{ route('learning-activity.index') }}" class="text-decoration-none text-white">Kegiatan Pembelajaran</a>
                </li>
                <li>
                    <a href="{{ route('evaluation') }}" class="text-decoration-none text-white">Evaluasi</a>
                </li>
                <li>
                    <a href="{{ route('reflection') }}" class="text-decoration-none text-white">Refleksi</a>
                </li>
                <li>
                    <a href="{{ route('sains-info.detail', ['slug' => ( !empty ( $link_sains_info ) ) ? $link_sains_info->slug : 'not-found']) }}" class="text-decoration-none text-white">Sains Info</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-md-3 d-flex justify-content-evenly">
        <div>
            <h2 class="title-content-footer text-white">Hubungi Kami</h2>
            <p class="desc-content-footer text-white">E-mail: <br/>ragilsaputri.2022@student.uny.ac.id</p>
        </div>
    </div>

    <div class="col-md-2 d-flex justify-content-evenly">
        <div>
            <h2 class="title-content-footer text-white">Ikuti Kami</h2>
            <div class="d-flex justify-content-start align-items-center">
                <div>
                    <img src="{{ asset('website/images/icons/icon-ig.svg') }}" class="w-100" alt="">
                </div>
                <div class="px-2">
                    <img src="{{ asset('website/images/icons/icon-fb.svg') }}" class="w-100" alt="">
                </div>
                <div>
                    <img src="{{ asset('website/images/icons/icon-ytb.svg') }}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
