<script>
    // change name input username, based on input user
    $('button.btn-login').on('mouseenter', function(){
        // get value input username
        let input_username = $('input#name').val()

        // check name or email
        let check_data = input_username.split('@')

        if ( check_data.length > 1 ) {
            // change name input to email
            $('input#name').attr('name','email')
        }
    })
</script>