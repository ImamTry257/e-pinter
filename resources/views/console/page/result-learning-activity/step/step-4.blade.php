@extends('console.adminlte.layouts.app')

@section('css')
    <style>
        .border-console {
            border-color: #7BB7C2 !important;
        }

        a.btn-information {
            background-color: #004972;
        }

        .desc-step {
            background-color: #D7EDF9;
        }
    </style>
@endsection

@section('content')
<div class="content-wrapper">
    @include('console.components.breadcrumb', ['title' => 'Detail Hasil Kegiatan Pembelajaran Kinematika untuk ' . $activity_selected['title']])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 pb-2">
                    <a href="{{ route('admin.detail.result.learning.activity.show', ['result_id' => Crypt::encryptString($progress_activity->activity_master_id . '_' . $user_id_next_step . '_' . $slug_next_step)]) }}" class="btn bg-console text-white"> Kembali</a>
                </div>
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header bg-console">
                            <h3 class="card-title text-white">Detail Hasil Pembelajaran Kinematika untuk {{ ' '. $activity_selected['title'] }}</h3>
                        </div>

                        <div class="card-body">
                            <div class="wrapper-dahboard-page col-lg-12 col-md-12 col-sm-12 col-xl-12 row ps-4">
                                {{-- banner main --}}
                                <div class="main-banner ms-2 col-lg-11 d-none">
                                    <img src="{{ asset('assets/img-pemb1.svg') }}" alt="" style="width: 100%;">
                                </div>

                                {{-- https://codepen.io/fadzrinmadu/pen/VwpzEYL --}}

                                <div class="list-topic-content pt-4 pb-5 px-2 col-12">
                                    <div class="row">
                                        <div class="col-12 wrapper-step-1 pb-4">
                                            {!! $content !!}
                                        </div>

                                        <div class="col-12 text-start">
                                            <a href="{{ route('admin.detail.result.learning.activity.detail.step', ['user_id' => Crypt::encryptString($user_id_next_step), 'slug' => Crypt::encryptString($slug_next_step), 'step' => Crypt::encryptString(($next_step - 1))]) }}" id="btn-step-2" class="btn btn-information text-white">Kembali ke Sintak 3.</a>

                                            @if ( $is_enable_to_next_step )
                                            <a href="{{ route('admin.detail.result.learning.activity.detail.step', ['user_id' => Crypt::encryptString($user_id_next_step), 'slug' => Crypt::encryptString($slug_next_step), 'step' => Crypt::encryptString(($next_step + 1))]) }}" id="btn-step-4" class="btn btn-information text-white">Selanjutnya Sintak 5.</a>
                                            @endif

                                            <input type="hidden" id="is_disabled" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('console.components.comment')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //selecting all required elements
    const dropArea = document.querySelector(".drag-area"),
    dragText = dropArea.querySelector(".title-header"),
    button = dropArea.querySelector("a"),
    input = dropArea.querySelector("input");
    let file; //this is a global variable and we'll use it inside multiple functions

    button.onclick = ()=>{
        input.click(); //if user click on the button then the input also clicked
    }

    input.addEventListener("change", function(){
        //getting user select file and [0] this means if user select multiple files then we'll select only the first one
        file = this.files[0];
        dropArea.classList.add("active");
            showFile(); //calling function
        });


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
                // UNCOMMENT THIS BELOW LINE. I GOT AN ERROR WHILE UPLOADING THIS POST SO I COMMENTED IT
                let imgTag = `<img src="${fileURL}" alt="image" width="400">`; //creating an img tag and passing user selected file source inside src attribute
                $('div.render-file').html(imgTag); //adding that created img tag inside dropArea container
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
@php
    // dd($detail_step);
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
                var imgTag = `<img src="{{ asset('assets/activity/step/') . '/' . $val }}" alt="image" width="400">`; //creating an img tag and passing user selected file source inside src attribute
                $('div#render-{{ $key }}').html(imgTag); //adding that created img tag inside dropArea container
            @endforeach
        @endforeach
    @endif
</script>
@include('console.page.result-learning-activity.script.js-step')
@endsection
