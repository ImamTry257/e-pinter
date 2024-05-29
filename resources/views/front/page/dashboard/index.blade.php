@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        .disable-project {
            cursor: auto;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 row">

    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11">
        <img src="{{ asset('assets/dashboard/fisika-sma-kinematika-new.png') }}" alt="" style="width: 100%;">
    </div>

    <div class="list-topic-content ms-2 py-5 px-2 col-lg-11 bg-white">
        <div class="title-list row">
            <div class="col-lg-12">
                <h2>Kinematika</h2>
            </div>
        </div>

        <div class="row">
            @foreach ( $list_activity as $key => $activity )
                <div class="col-lg-6 pb-4">
                    <a href="javascript:void(0);" id="project-{{ $activity['user_group_id'] }}" onclick="startProject('{{ $activity['user_group_id'] }}', '{{ route('front.activity', ['slug' => $activity['slug']]) }}')">
                        <img src="{{ asset('assets/dashboard/') .'/'. $activity['image'] }}" alt="" class="w-100">
                        <div class="p-3 shadow-lg bg-body">
                            <span class="text-dark">Kegiatan Pembelajaran {{ $key + 1 }} <br/> {{ $activity['title'] }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>


<script>

    // when click materi, set data activty
    function startProject(id, urlRedirect){
        var element = $('#project-' + id)
        // console.log(element, url)

        var param = {
            "user_id"               : "{{ $user->id }}",
            "user_group_id"         : id,
            "activity_master_id"    : id,
            "activity_step_id"      : 1,
        }

        setProject(param, urlRedirect)
    }

    function setProject(param, urlRedirect) {
        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('front.start.project') }}",
            dataType: 'json',
            data: param,
            timeout: 2000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(xhr, obj) {

            },
            success: function(response) {
                // console.log(response)
                if ( response.status ) {
                    location.href = urlRedirect
                }

            },
            error: function(error) {
                // if(error.status == 419 || error.status == 500) {
                //     location.href = '{{ route("login") }}'
                // }

                if (error.statusText == 'timeout') {
                    setProject(param)
                }
            }
        })
    }
</script>

@endsection
