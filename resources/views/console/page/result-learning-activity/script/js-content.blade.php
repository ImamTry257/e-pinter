<script>
    var editorComment;
    var editorCommentReplay;
    setTimeout(() => {
        editorComment = new RichTextEditor("textarea#comment");

        getComment()
       // https://jsfiddle.net/onigetoc/mu6j5k61/
    }, 500);

    function getComment(){
        let paramGetContent = {
            "user_id" : "{{ $user_id_enc }}",
            "progress_id" : "{{ $progress_id }}",
            "is_from_front" : 0,
            "user_id_login" : $('input[name="user_login"]').val()
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
                $('#loading').html(getHTMLloader())
            },
            success: function(response) {
                console.log(response)
                if ( response.status ) {
                    $('#wrapper-list-comment').html(response.data)

                    setTimeout(() => {
                        // console.log(response.list_id)
                        editorCommentReplay = new RichTextEditor("textarea#input-replay-comment");

                        var listID = response.list_id
                        listID.map( ( data, index ) => {
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
        let userLogin = $('input[name="user_login"]').val()
        let progressID = '{{ $progress_id }}'
        let isFromBO = '{{ $is_from_bo }}'
        let comment = editorComment.getHTMLCode()

        // set param comment
        let paramComment = {
            "user_login"  : userLogin,
            "progress_id" : progressID,
            "content"     : comment,
            "is_from_bo"  : isFromBO
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
                $('#loading').html(getHTMLloader())
            },
            success: function(response) {
                // reset data
                editorComment.setHTMLCode("<p></p>")

                console.log(response)
                if ( response.status ) {
                    $('#wrapper-list-comment').html(response.data)

                    setTimeout(() => {
                        // console.log(response.list_id)
                        editorCommentReplay = new RichTextEditor("textarea#input-replay-comment");

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

    function submitCommentChild(){
        let isFromBO = '{{ $is_from_bo }}'
        let progressID = '{{ $progress_id }}'
        let comment = editorCommentReplay.getHTMLCode()
        let userLogin = $('input[name="user_id_login"]').val()
        let commentMasterID = $('input[name="comment_master_id"]').val()

        // set param comment
        let paramComment = {
            "user_login"  : userLogin,
            "comment_master_id" : commentMasterID,
            "content"     : comment,
            "is_from_bo"  : isFromBO,
            "progress_id" : progressID,
        }

        console.log(paramComment)
        // return false
        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('comment.store.child') }}",
            dataType: 'json',
            data: paramComment,
            timeout: 3000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Access-Control-Allow-Origin': '*'
            },
            beforeSend: function(xhr, obj) {
                $('#wrapper-list-comment').empty()
                $('#loading').html(getHTMLloader())
            },
            success: function(response) {
                // reset data
                editorCommentReplay.setHTMLCode("<p></p>")

                console.log(response)
                if ( response.status ) {
                    $('#wrapper-list-comment').html(response.data)

                    setTimeout(() => {
                        // console.log(response.list_id)
                        editorCommentReplay = new RichTextEditor("textarea#input-replay-comment");

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

    function getHTMLloader(){
        return `<div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden"></span>
                </div>
                <div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden"></span>
                </div>
                <div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden"></span>
                </div>`
    }

</script>
