<script>
    var editorComment;
    setTimeout(() => {
        editorComment = new RichTextEditor("textarea#comment");

        getComment()
       // https://jsfiddle.net/onigetoc/mu6j5k61/
    }, 500);

    function getComment(){
        var htmlLoader = `<div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden"></span>
                </div>
                <div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden"></span>
                </div>
                <div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden"></span>
                </div>`

        console.log('{{ $user_id_enc }}', '{{ $progress_id }}')
        var paramGetContent = {
            "user_id" : "{{ $user_id_enc }}",
            "progress_id" : "{{ $progress_id }}",
            "is_from_front" : 0
        }

        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('comment.list') }}",
            dataType: 'json',
            data: paramGetContent,
            timeout: 3000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Access-Control-Allow-Origin': '*'
            },
            beforeSend: function(xhr, obj) {
                $('#loading').html(htmlLoader)
            },
            success: function(response) {
                console.log(response)
                if ( response.status ) {
                    $('#wrapper-list-comment').html(response.data)

                    setTimeout(() => {
                        // console.log(response.list_id)
                        var editorCommentReplay = new RichTextEditor("textarea#input-replay-comment");

                        var listID = response.list_id
                        listID.map( ( data, index ) => {
                            // console.log(data)
                            if ( data != "" ) {
                                var editorCommentReplayChild = new RichTextEditor("textarea#"+data);
                            }
                        } )

                    }, 1000);
                }

                $('#loading').empty()
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

    function submitCommentMaster(){
        var htmlLoader = `<div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden"></span>
                </div>
                <div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden"></span>
                </div>
                <div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden"></span>
                </div>`

        var userLogin = $('input[name="user_login"]').val()
        var progressID = '{{ $progress_id }}'
        var comment = editorComment.getText()

        // set param comment
        var paramComment = {
            "user_login"  : userLogin,
            "progress_id" : progressID,
            "content"     : comment
        }
        console.log(paramComment)
        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('comment.store.master') }}",
            dataType: 'json',
            data: paramComment,
            timeout: 3000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Access-Control-Allow-Origin': '*'
            },
            beforeSend: function(xhr, obj) {
                $('#wrapper-list-comment').empty()
                $('#loading').html(htmlLoader)
            },
            success: function(response) {
                console.log(response)
                if ( response.status ) {
                    $('#wrapper-list-comment').html(response.data)

                    setTimeout(() => {
                        // console.log(response.list_id)
                        var editorCommentReplay = new RichTextEditor("textarea#input-replay-comment");

                        var listID = response.list_id
                        listID.map( ( data, index ) => {
                            // console.log(data)
                            if ( data != "" ) {
                                var editorCommentReplayChild = new RichTextEditor("textarea#"+data);
                            }
                        } )

                    }, 1000);
                }

                $('#loading').empty()
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

</script>
