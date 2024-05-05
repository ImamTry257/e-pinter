<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.js') }}" defer></script>
<script>

    setTimeout(() => {
        // console.log($('textarea[name="answer-a"], textarea[name="answer-b"]'))
        $('textarea[name="answer-a"], textarea[name="answer-b"]').summernote()
    }, 500);


    function setAnswers(){
        console.log($('textarea#step-1'))
        // set value answer
        let input = $('textarea#step-1')

        // get count question
        let count_question = input.length

        // get count answer
        let count_answer = 0;
        input.map( ( index, data ) => {
            if ( $(data).val() == '' )
            console.log(index, data, $(data).val() == '')
        } )

        return false
        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('front.activity.next-progress') }}",
            dataType: 'json',
            data: {
                "user_group_id"         : "{{ $user->user_group_id }}",
                "activity_master_id"    : "{{ $user->user_group_id }}",
                "activity_step_id"      : 0,
                "detail_progress"       : 0,
                "intro"                 : false
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
