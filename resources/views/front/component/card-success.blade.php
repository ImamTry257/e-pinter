<div class="row p-5 d-flex justify-content-center align-items-center h-100">
    <div class="wrapper-form col-xl-5 col-md-12 col-lg-6 py-3 rounded">
        <div class="wrapper-success-content shadow-lg p-3 mb-5 bg-body rounded">
            <div class="mb-3 px-5 py-3">
                <div class="bg-icon-success text-center py-3 rounded px-3">
                    <img src="{{ asset('assets/icon-success.svg') }}" alt="" width="100">

                    <div>
                        <span class="text-white">{{ $title }}</span>
                    </div>
                </div>
            </div>

            <div class="py-2 text-center">
                <a href="{{ route('login') }}" class="btn btn-forgot-password text-white rounded py-2 px-3">Continue</a>
            </div>
        </div>
    </div>
</div>
