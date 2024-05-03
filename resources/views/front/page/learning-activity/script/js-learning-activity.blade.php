<script>

    $('div.wrapper-alert').hide()
    // handle active tab on event click
    $('li a.nav-link').on('click', function (){
        select_tab(this, false, 0)
    })

    function select_tab(element, is_next, id_dest){
        var id_selected = ( !is_next ) ? $(element).attr('id') : id_dest

        $('a.nav-link').map( ( index, data ) => {

            if ( $(data).attr('id') != id_selected ) {
                // console.log($(data).attr('id'), 'bkn tujuan', $(data).hasClass('active'))

                $(data).removeClass('active')
                $('div#step-' + ( index + 1 ) ).addClass('d-none')
            } else {

                $('div#step-' + ( index + 1 ) ).removeClass('d-none')

                // tab active
                var list_input = $('div#step-' + ( index + 1 )).find('textarea#input_answer')

                get_answer(( index + 1 ), list_input)
            }
        } )

        $(element).addClass('active')
    }



    $('a.btn-save').on('click', function(e){
        e.preventDefault()

        $('div.steps').map( (index, data) => {
            if ( !$(data).hasClass('d-none') ) {
                var activity_selected = $(data)
                var step_no = ( ( activity_selected.attr('id') ).split('-')[1] * 1)

                var data_collect = []
                var list_answer = activity_selected.find('textarea#input_answer')
                list_answer.map( (index, data) => {
                    data_collect.push({
                        "id" : ( $(data).attr('class') ).split('answer-')[1],
                        "answer" : $(data).val(),
                        "step" : step_no
                    })
                } )

                save_data(data_collect, false, step_no)
            }
        } )
    })

    $('a.btn-save-next').on('click', function(e){
        e.preventDefault()

        $('div.steps').map( (index, data) => {
            if ( !$(data).hasClass('d-none') ) {
                var activity_selected = $(data)
                var step_no = ( ( activity_selected.attr('id') ).split('-')[1] * 1) + 1

                var data_collect = []
                var list_answer = activity_selected.find('textarea#input_answer')
                list_answer.map( (index, data) => {
                    data_collect.push({
                        "id" : ( $(data).attr('class') ).split('answer-')[1],
                        "answer" : $(data).val(),
                        "step" : ( step_no - 1 )
                    })
                } )

                save_data(data_collect, true, step_no)
            }
        } )
    })

    function save_data(data, is_next, current_step)
    {
        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('learning-activity.store') }}",
            dataType: 'json',
            data: {
                "data_collect" : JSON.stringify(data)
            },
            timeout: 2000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(xhr, obj) {

            },
            success: function(response) {
                console.log(response)
                if(response.status) {

                    // check is last step
                    if ( current_step > 3 || ( is_next == false && current_step == 3 )) {
                        window.location.href = "{{ route('learning-activity.success') }}"
                        return false
                    }

                    $('div.wrapper-alert').show()
                    $("html, body").animate({
                        scrollTop: 0
                    }, 10);

                    setTimeout(() => {
                        $('div.wrapper-alert').hide()
                    }, 2000);

                    if ( is_next ) {
                        select_tab($('a#' + ( current_step )), true, current_step)
                    }

                    return false;
                } else {
                    location.reload()
                }
            },
            error: function(error) {
                // if(error.status == 419 || error.status == 500) {
                //     location.href = '{{ route("login") }}'
                // }

                if (error.statusText == 'timeout') {
                    save_data();
                }
            }
        })
    }

    $(document).ready(function() {
        var list_input = $('div#step-1').find('textarea#input_answer')

        get_answer(1, list_input)
    });

    function get_answer(step_id, list_input){

        $.ajax({
            type: "POST", // send ajax with post
            url: "{{ route('learning-activity.get_answer') }}",
            dataType: 'json',
            data: {
                "step_id" : step_id
            },
            timeout: 5000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(xhr, obj) {

            },
            success: function(response) {
                if(response.status) {

                    list_input.map( ( index, data ) => {

                        if ( (response.data).length != 0 ) {
                            $(data).val(response.data[index].answer)
                        }

                        $(data).summernote()
                    } )
                } else {
                    location.reload()
                }
            },
            error: function(error) {
                // if(error.status == 419 || error.status == 500) {
                //     location.href = '{{ route("login") }}'
                // }

                if (error.statusText == 'timeout') {
                    get_answer();
                }
            }
        })
    }
</script>
