<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.js') }}" defer></script>
<script>

    setTimeout(() => {
        $('textarea[name="answer-a"], textarea[name="answer-b"]').summernote()
    }, 500);

</script>
