@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        a.btn-information {
            background-color: #004972;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 col-md-12 col-sm-12 col-xl-10 row ps-4">
    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11 d-none">
        <img src="{{ asset('assets/img-pemb1.svg') }}" alt="" style="width: 100%;">
    </div>

    <div class="card list-topic-content py-5 px-2 col-12">
        <div class="row p-2 px-5">
            {!! $content !!}

            <div class="col-lg-12 text-end">
                <a href="javascript:void(0);" onclick="nextProgress()" class="btn btn-information text-white">Selanjutnya Sintak 1.</a>
            </div>
        </div>
    </div>
</div>

<script>
    function nextProgress() {
        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('front.activity.next-progress') }}",
            dataType: 'json',
            data: {
                "progress_id"  : "{{ $progress_id }}",
                "step_id"               : 0,
                "detail_progress"       : 100,
                "intro"                 : 1
            },
            timeout: 2000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(xhr, obj) {

            },
            success: function(response) {
                console.log(response)
                if ( response.status ) {
                    location.href = '{{ route("front.activity.step", ["slug" => $slug, "step" => 1]) }}'
                }

            },
            error: function(error) {
                // if(error.status == 419 || error.status == 500) {
                //     location.href = '{{ route("login") }}'
                // }

                if (error.statusText == 'timeout') {
                    // save_data();
                }
            }
        })
    }
</script>

@endsection
