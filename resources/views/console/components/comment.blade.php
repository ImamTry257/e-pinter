<div class="card-body">
    <div class="row row-sm col-6">
        <div class="col-12 py-2">
            <h3>
                Komentar
                (<span id="count_comment"></span>)
            </h3>
        </div>
        <div class="col-12" id="content-comment">
            <input type="hidden" name="user_login" value="{{ $user_login }}">
            <input type="hidden" name="progress_id" value="{{ $progress_id }}">
            <textarea name="comment" class="form-control" id="comment" cols="30" rows="4" placeholder="Tulis komentar Anda"></textarea>

            <div class="text-left mt-3">
                <a href="javascript:void(0);" id="submit-comment" onclick="submitCommentMaster()" class="btn btn-information text-white px-5">Kirim</a>
            </div>
        </div>
    </div>

    <div class="col-7">
        <hr>
    </div>

    <div class="col-7">
        <div class="d-flex justify-content-center" id="loading">
            {{-- <div class="spinner-grow text-secondary" role="status">
                <span class="visually-hidden"></span>
            </div>
            <div class="spinner-grow text-secondary" role="status">
                <span class="visually-hidden"></span>
            </div>
            <div class="spinner-grow text-secondary" role="status">
                <span class="visually-hidden"></span>
            </div> --}}
        </div>
    </div>

    <div class="col-7 row" id="wrapper-list-comment">
        {{-- <div class="col-1">
            <div class="d-flex justify-content-center" style="">
                <div style="">
                    <svg xmlns="http://www.w3.org/2000/svg" style="background: #004972;padding: 10px;border-radius: 30px;width: 34px;" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                </div>
            </div>
        </div>
        <div class="col-11" id="wrapper-data-comment">
            <div class="content-comment">
                <div id="created_by-comment" class=""><b>Freeman</b></div>
                <div id="crated_at-comment" class="pb-1" style="font-size: 10px;">15 Menit yang lalu</div>
                <div id="desc-comment" class="pb-3">Ini koment pertama saya</div>

                <div class="col-12 row" id="replay-child-comment">
                    <div class="col-1">
                        <div class="d-flex justify-content-center" style="">
                            <div style="">
                                <svg xmlns="http://www.w3.org/2000/svg" style="background: #004972;padding: 10px;border-radius: 30px;width: 34px;" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-11" id="wrapper-data-comment">
                        <div class="content-comment">
                            <div id="created_by-comment" class=""><b>Freeman</b></div>
                            <div id="crated_at-comment" class="pb-1" style="font-size: 10px;">15 Menit yang lalu</div>
                            <div id="desc-comment" class="pb-3">Ini koment dari koment utama pertama saya</div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="replay-comment" class="pt-3">
                <div class="" id="">
                    <textarea name="input-replay-comment" class="form-control" id="" cols="30" rows="2" placeholder="Tulis komentar Balasa Anda"></textarea>
                </div>
                <div class="text-right col-12 mt-3">
                    <a href="javascript:void(0);" id="submit-comment" class="btn btn-information text-white px-5">Kirim</a>
                </div>
            </div>
        </div> --}}
    </div>

    <div class="col-7">
        <div id="replay-comment" class="pt-3">
            <div class="" id="">
                <input type="hidden" name="user_login" value="{{ $user_login }}">
                <input type="hidden" name="progress_id" value="{{ $progress_id }}">
                <textarea name="comment" class="form-control" id="comment" cols="30" rows="2" placeholder="Tulis komentar Balasa Anda"></textarea>
            </div>
            <div class="text-left col-12 mt-3">
                <a href="javascript:void(0);" id="submit-comment" onclick="submitCommentMaster()" class="btn btn-information text-white px-5">Kirim</a>
            </div>
        </div>
    </div>
</div>
