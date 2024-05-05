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

    <div class="card list-topic-content p-5 col-12">
        <div class="row p-2 px-5">
            <div class="wrapper-step-1 pb-4">
                <h5 class="pb-2 fw-bold">Langkah 3: Pembuatan proyek</h5>
                <div class="desc-step mt-3">
                    <p class="text-justify p-3">Upload video proyek kelompok dengan tema “gerak lurus”</p>
                </div>

                <div class="" style="border-style: dashed;">
                    <div class="card-body">
                        <div class="py-3 row">
                            <div class="col-lg-12 text-center">
                                <div class="drag-area">
                                    <div class="title-header text-secondary">Drag & Drop to Upload File</div>
                                    <div class="text-secondary py-3">or</div>
                                    <a href="javascript:void(0);" class="btn btn-primary text-white">Select File</a>
                                    <input type="file" class="upload-file" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-start">
                <a href="javascript:void(0);" class="btn btn-save text-white">Simpan</a>
                <a href="{{ route('front.activity.step', ['slug' => $slug, 'step' => 4]) }}" id="btn-step-3" class="btn btn-information text-white">Selanjutnya Sintak 4.</a>
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
            // let imgTag = `<img src="${fileURL}" alt="image">`; //creating an img tag and passing user selected file source inside src attribute
            dropArea.innerHTML = imgTag; //adding that created img tag inside dropArea container
            }
            fileReader.readAsDataURL(file);
        }else{
            alert("This is not an Image File!");
            dropArea.classList.remove("active");
            dragText.textContent = "Drag & Drop to Upload File";
        }
    }
</script>
@endsection


