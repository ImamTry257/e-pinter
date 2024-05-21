<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.js') }}" defer></script>
<script>

    setTimeout(() => {
        // console.log($('textarea[name="answer-a"], textarea[name="answer-b"]'))
        $('textarea[name="answer-a"], textarea[name="answer-b"]').summernote()
    }, 500);


    function setAnswers(stepId, isNext){

        let progressId = '{{ $progress_id }}'
        var list_question = $('textarea#step-' + stepId)

        // binding data progress_id and intro
        $('input[name="progress_id"]').val(progressId)
        $('input[name="intro"]').val(0)

        var answers = ''
        if ( stepId == 1 ) {
            answers = handleStepOne()
        }

        var formData = new FormData()
        formData.append('progress_id', progressId)
        formData.append('intro', 0)
        formData.append('answers', JSON.stringify(answers))
        formData.append('count_question', list_question.length)
        formData.append('step_id', stepId)

        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('front.activity.next-progress') }}",
            // dataType: 'json',
            data: formData,
            timeout: 2000,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(xhr, obj) {

            },
            success: function(response) {
                if ( response.status ) {
                    if ( isNext ) {
                        location.href = `{{ route("front.activity.step", ["slug" => $slug, "step" => ( $step + 1 )]) }}`
                    } else {
                        // show alert
                        var className = 'btn-save'
                        showAlert(className, response.message)
                    }
                } else {
                    // show alert
                    var className = 'alert-danger'
                    showAlert(className, response.message)
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

    function showAlert(className, message){
        $('div.alert-notif').show()
        $('div.alert-notif').addClass('alert').addClass(className).html(`<span class="text-white">${message}</span>`)

        $("html, body").animate({
            scrollTop: 0
        }, 10);

        setTimeout(() => {
            $('div.alert-notif').hide('slow').removeClass('alert').removeClass(className)
        }, 3000);
    }

    function handleStepOne(){
        return [
            {
                'id' : 'answer-a',
                'value_text' :  $($('textarea[name="answer-a"]').summernote('code')).text(),
                'value_html' :  $('textarea[name="answer-a"]').summernote('code')
            },
            {
                'id' : 'answer-b',
                'value_text' :  $($('textarea[name="answer-b"]').summernote('code')).text(),
                'value_html' :  $('textarea[name="answer-b"]').summernote('code')
            }
        ]
    }



</script>
