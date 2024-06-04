<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.js') }}" defer></script>
<script>

    setTimeout(() => {
        // check validation for btn next step
        checkInputStepTwo()

        // console.log($('textarea[name="answer-a"], textarea[name="answer-b"]'))
        $('textarea[name="answer-a"], textarea[name="answer-b"], textarea[name="descriptions"]').summernote()
    }, 500);


    function setAnswers(stepId, isNext){

        // check is completed on current step when click btn save and next step ( on new record state )
        if ( stepId != 2 ) {
            if ( $('input#is_disabled').val() == 1 ) {
                return false
            }
        }

        // binding data progress_id and intro
        let progressId = '{{ $progress_id }}'
        $('input[name="progress_id"]').val(progressId)
        $('input[name="intro"]').val(0)

        var answers = ''
        var list_question = ''
        if ( stepId == 1 ) {
            answers = handleObjAnswer(1)
            list_question = $('textarea#step-' + stepId).length
        } else  if ( stepId == 2 ) {
            // check validation for btn next step
            checkInputStepTwo()

            answers = handleObjAnswer(2)
            var list_question1 = $('div.card-body').find('input#step-' + stepId).length
            var list_question2 = $('div.card-body').find('textarea#step-' + stepId).length

            list_question = list_question1 + list_question2
        } else  if ( [3, 4, 5].includes(Number (stepId)) ) {
            answers = handleObjAnswer(stepId)
            list_question = 1
        } else {
            answers = handleObjAnswer(6)
            list_question = 1
        }

        // console.log(answers, list_question)
        // return false

        // set form data for data ajax
        var formData = new FormData()
        formData.append('progress_id', progressId)
        formData.append('intro', 0)
        formData.append('answers', JSON.stringify(answers))
        formData.append('count_question', list_question)
        formData.append('step_id', stepId)
        formData.append('is_upload_file', 0)
        formData.append('is_multiple_upload', 0)

        // parsing file upload for step 3, 4, 5
        if ( [3, 4, 5].includes(Number (stepId)) ) {
            if ( stepId == 4 ) {
                // check answer by user
                var countAnswer = 0;
                var listAnswer = $('div#wrapper-render-file')
                listAnswer.map( ( index, data ) => {
                    if ( $(data).children().length != 0 ) {
                        countAnswer++
                    }
                } )

                var fileUploadA = $('input[name="file_1"]').prop('files')[0]
                var fileUploadB = $('input[name="file_2"]').prop('files')[0]
                var fileUploadC = $('input[name="file_3"]').prop('files')[0]

                formData.append('file_1', ( fileUploadA != undefined ) ? fileUploadA : '')
                formData.append('file_2', ( fileUploadB != undefined ) ? fileUploadB : '')
                formData.append('file_3', ( fileUploadC != undefined ) ? fileUploadC : '')
                formData.append('is_upload_file', 1)
                formData.append('is_multiple_upload', 1)
                formData.append('count_answer_multiple', countAnswer)
                // console.log('handle multi image in here', formData, fileUploadA, fileUploadB, fileUploadC)
                // return false

            } else {
                var fileUpload = $('input[name="file"]').prop('files')[0]
                formData.append('file', ( fileUpload != undefined ) ? fileUpload : '')
                formData.append('is_upload_file', 1)
                formData.append('is_multiple_upload', 0)
            }
        }

        // console.log(formData)
        // return false
        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('front.activity.next-progress') }}",
            dataType: 'json',
            data: formData,
            timeout: 30000,
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Access-Control-Allow-Origin': '*'
            },
            beforeSend: function(xhr, obj) {

            },
            success: function(response) {
                if ( response.status ) {
                    if ( isNext ) {
                        if ( stepId == 6 ) {
                            location.href = `{{ route("evaluation") }}`
                            return false
                        }
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
                console.log(error.status, error)
                // if(error.status == 419 || error.status == 500) {
                //     location.href = '{{ route("login") }}'
                // }

                if (error.statusText == 'timeout') {
                    // setAnswers(stepId, isNext)
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

    function handleObjAnswer(stepId){
        if ( stepId == 1 ) {
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
        } else if ( stepId == 2 ) {
            return [
                {
                    'id' : 'date',
                    'value_text' :  $('input[name="date"]').val(),
                    'value_html' :  $('input[name="date"]').val()
                },
                {
                    'id' : 'start_time',
                    'value_text' :  $('input[name="start_time"]').val(),
                    'value_html' :  $('input[name="start_time"]').val()
                },
                {
                    'id' : 'end_time',
                    'value_text' :  $('input[name="end_time"]').val(),
                    'value_html' :  $('input[name="end_time"]').val()
                },
                {
                    'id' : 'title',
                    'value_text' :  $('input[name="title"]').val(),
                    'value_html' :  $('input[name="title"]').val()
                },
                {
                    'id' : 'descriptions',
                    'value_text' :  $($('textarea[name="descriptions"]').summernote('code')).text(),
                    'value_html' :  $('textarea[name="descriptions"]').summernote('code')
                }
            ]
        } else if ( [3, 4, 5].includes(Number (stepId)) ) {
            var fileUpload = $('input[name="file"]').prop('files')[0]
            return [
                {
                    'id' : 'file',
                    'value_text' :  ( fileUpload == undefined ) ? '' : fileUpload,
                    'value_html' :  ( fileUpload == undefined ) ? '' : fileUpload
                }
            ]
        } else if ( stepId == 6 ) {
            return [
                {
                    'id' : 'answer',
                    'value_text' :  $('textarea[name="answer"]').summernote('code'),
                    'value_html' :  $('textarea[name="answer"]').summernote('code')
                }
            ]
        }


    }
    function checkInputStepTwo(){
        // form completed to fill
        if ( $('input[name="date"]').length != 0 ) {
                if ( $('input[name="date"]').val() != '' &&  $('input[name="start_time"]').val() != '' && $('input[name="end_time"]').val() != '' && $('input[name="title"]').val() != '' && $('textarea[name="descriptions"]').val() != '' ){
                $('input#is_disabled').val(0)
                return true
            }

            // new record
            $('input#is_disabled').val(1)
            return false
        }
    }



</script>
