@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        a.btn-information {
            background-color: #004972;
        }

        .desc-step {
            background-color: #D7EDF9;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 col-md-12 col-sm-12 col-xl-10 row ps-4">
    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11 d-none">
        <img src="{{ asset('assets/img-pemb1.svg') }}" alt="" style="width: 100%;">
    </div>

    {{-- https://codepen.io/fadzrinmadu/pen/VwpzEYL --}}

    <div class="card list-topic-content py-5 px-2 col-12">
        <div class="row p-2 px-5">
            <div class="wrapper-step-1 pb-4">
                {!! $content !!}
            </div>

            <div class="text-start">
                <a href="javascript:void(0);" onclick="setAnswers('{{ $step }}',false)" class="btn btn-save text-white">Simpan</a>
                <a href="javascript:void(0);" onclick="setAnswers('{{ $step }}',true)" id="btn-step-4" class="btn btn-information text-white">Selanjutnya Sintak 5.</a>

                <input type="hidden" id="is_disabled" value="1">
            </div>
        </div>

        <div class="row p-2 px-5 pt-5">
            @include('console.components.comment')
        </div>
    </div>
</div>

@php
    // dd($detail_step);
    // dd(json_decode(json_decode($detail_step->answers)->value));
    if ( $detail_step != null ) :
        $value_answers = json_decode($detail_step->answers)->value;
    endif
@endphp
<script>
    @if ( $detail_step != null )
        $('input#is_disabled').val(0)
        @if ($detail_step->detail_progress != 100 )
            $('input#is_disabled').val(1)
        @endif

        @foreach (json_decode($value_answers) as $value)
            @foreach ($value->value_html as $key => $val)
                @if ( $val != '' )
                    var imgTag = `<img src="{{ asset('assets/activity/step/') . '/' . $val }}" alt="image" width="400">`; //creating an img tag and passing user selected file source inside src attribute
                    $('div#render-{{ $key }}').html(imgTag); //adding that created img tag inside dropArea container
                @endif
            @endforeach
        @endforeach
    @endif
</script>
<script>
    //selecting all required elements
    const dropArea = document.querySelector("div#step-tracker"),
    dragText = dropArea.querySelector(".title-header"),
    button = dropArea.querySelector("a#select_file")

    let file; //this is a global variable and we'll use it inside multiple functions
    var listAnswer = $('div.wrapper-render-file')
    var countAnswer = 0;
    listAnswer.map( ( index, data ) => {
        if ( $(data).children().length != 0 ) {
            countAnswer++
        }
    } )
    console.log(countAnswer)

    // jika sudah ada gambar, maka dimulai dari gambar yang kosong
    let clickUpload = countAnswer

    var input;
    button.onclick = ()=>{
        clickUpload++
        input = dropArea.querySelector("input#step-4-" + ( clickUpload ))
        input.click(); //if user click on the button then the input also clicked
    }

    function handleInput(e) {
        //getting user select file and [0] this means if user select multiple files then we'll select only the first one
        file = e.files[0];
        dropArea.classList.add("active");
        showFile(); //calling function
    }


    //If user Drag File Over DropArea
    dropArea.addEventListener("dragover", (event)=>{
        event.preventDefault(); //preventing from default behaviour
        dropArea.classList.add("active");
        dragText.textContent = "Release to Upload File";
    });

    //If user leave dragged File from DropArea
    dropArea.addEventListener("dragleave", ()=>{
        dropArea.classList.remove("active");
        dragText.textContent = "Drag & Drop to Upload File";
    });

    //If user drop File on DropArea
    dropArea.addEventListener("drop", (event)=>{
        event.preventDefault(); //preventing from default behaviour
        //getting user select file and [0] this means if user select multiple files then we'll select only the first one
        file = event.dataTransfer.files[0];
        showFile(); //calling function
    });

    function showFile(){
        let fileType = file.type; //getting selected file type
        let validExtensions = ["image/jpeg", "image/jpg", "image/png"]; //adding some valid image extensions in array
        if(validExtensions.includes(fileType)){ //if user selected file is an image file
            let fileReader = new FileReader(); //creating new FileReader object
            fileReader.onload = ()=>{
                let fileURL = fileReader.result; //passing user file source in fileURL variable
                console.log(fileURL)
                // UNCOMMENT THIS BELOW LINE. I GOT AN ERROR WHILE UPLOADING THIS POST SO I COMMENTED IT
                let imgTag = `<img src="${fileURL}" alt="image" width="400">`; //creating an img tag and passing user selected file source inside src attribute
                $('div.render-file-p' + clickUpload).html(imgTag).addClass("py-2 pb-4"); //adding that created img tag inside dropArea container
                $('div#render-file_' + clickUpload).empty()
            }
            fileReader.readAsDataURL(file);
        }else{
            alert("This is not an Image File!");
            dropArea.classList.remove("active");
            dragText.textContent = "Drag & Drop to Upload File";
        }
    }

    // set disable for next step
    $('input#is_disabled').val(1)

    var fileElement = $('input.upload-file')
    fileElement.on('change', (e) => {
        // check file
        const fileUpload = fileElement.prop('files')[0];

        if ( fileUpload != '' ) {
            $('input#is_disabled').val(0)
        }
    })
</script>
@include('front.page.learning-activity.script.js-step')
@endsection


