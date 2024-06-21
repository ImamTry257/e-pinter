<script>
    var editorComment;
    var editorCommentReplay;
    setTimeout(() => {
        // set up
        editorComment = new RichTextEditor("textarea#comment")

        // hide menu replay
        $('#replay-comment').hide()

        // get list comment
        getComment(false)

       // https://jsfiddle.net/onigetoc/mu6j5k61/
    }, 500);

    setInterval(() => {
        getComment(true)
    }, 5000);

    function getComment(is_auto_get){
        let paramGetContent = {
            "user_id" : "{{ $user_id_enc }}",
            "progress_id" : "{{ $progress_id }}",
            "is_from_front" : 0,
            "user_id_login" : $('input[name="user_login"]').val()
        }
        console.log(paramGetContent)
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
                if ( !is_auto_get ) {
                    $('#loading').html(getHTMLloader())
                }
            },
            success: function(response) {
                // console.log(response)
                if ( response.status ) {
                    setTimeout(() => {
                        $('#loading').empty()

                        if ( $('#count_comment').text() != response.count ) {
                            $('#wrapper-list-comment').html(response.data)

                            if ( response.count > 0 ) {
                                $('#content-comment').empty()
                                $('#count_comment').text(`${response.count}`)
                                $('#replay-comment').show()

                                if ( !is_auto_get ) {
                                    editorComment = new RichTextEditor("textarea#comment")
                                }
                            }

                            $("#list-comment").scroll()
                            $("#list-comment").animate({ scrollTop: 50000 }, 2000);
                        }

                        setTimeout(() => {
                            // console.log(response.list_id)
                            // editorCommentReplay = new RichTextEditor("textarea#input-replay-comment");

                            var listID = response.list_id
                            listID.map( ( data, index ) => {
                                if ( data != "" ) {
                                    var editorCommentReplayChild = new RichTextEditor("textarea#"+data);
                                }
                            } )

                        }, 1000);
                    }, 1000);
                } else {
                    $('#loading').empty()
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

    function submitCommentMaster(){
        let userLogin = '{{ $user_login }}'
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

        console.log(editorComment, paramComment, editorComment.getHTMLCode())
        // return false

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
                    setTimeout(() => {
                        $('#loading').empty()
                        $('#content-comment').empty()
                        $('#count_comment').text(`(${response.count})`)

                        $('#wrapper-list-comment').html(response.data)
                        // editorComment = new RichTextEditor("textarea#comment");

                        // setTimeout(() => {
                        //     // console.log(response.list_id)
                        //     editorCommentReplay = new RichTextEditor("textarea#input-replay-comment");

                        //     var listID = response.list_id
                        //     listID.map( ( data, index ) => {
                        //         // console.log(data)
                        //         if ( data != "" ) {
                        //             var editorCommentReplayChild = new RichTextEditor("textarea#"+data);
                        //         }
                        //     } )

                        // }, 1000);

                        $('#replay-comment').show()
                        $("#list-comment").scroll()
                        $("#list-comment").animate({ scrollTop: 50000 }, 2000);
                    }, 1000);
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
