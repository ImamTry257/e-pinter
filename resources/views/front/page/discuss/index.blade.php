@extends('front.layouts.app-dashboard')

@section('css')
    <style>
        .chat {
            width: 300px;
            border-radius: 5px;
            overflow: hidden;
        }

        .chat-header {
            background: #2a79ff;
            height: 35px;
            line-height: 35px;
            padding: 0px 10px;
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }

        .chat-rows {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 0;
        }

        .chat-row:nth-child(odd) .chat-user-pic {
            float: left;
        }

        .chat-row:nth-child(odd) .chat-message {
            float: left;
        }

        .chat-row:nth-child(even) .chat-user-pic {
            float: right;
        }

        .chat-row:nth-child(even) .chat-message {
            float: right;
        }

        .chat-user-name {
            color: white;
            display: inline-block;
        }

            .chat-window {
            background: #fff;
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .chat-textarea {
            width: 100%;
            box-sizing: border-box;
            resize: none;
            outline: none;
        }

        .chat-user-pic {
            background: url(https://thumb7.shutterstock.com/display_pic_with_logo/1699708/679497559/stock-photo-smiling-girl-with-black-braid-avatar-userpic-dark-forelock-blue-hat-portrait-of-nice-female-679497559.jpg);
            background-size: 125%;
            background-position: 50% 40%;
            width: 30px;
            height: 30px;
        }

        .chat-message {
            vertical-align: top;
            background: #f3f3f3;
            padding: 5px 10px;
            border-radius: 0px 15px 15px 15px;
            max-width: 80%;
            margin-left: 5px;
            word-wrap: break-word;
            font-family: Arial;
        }

            .chat-wrapper {
            padding: 10px 10px;
        }

        .chat-child-window {
            height: 300px;
        }

        span {
            font-size: 27px;
        }

        .bg-input-text {
            background-color: #e0e1e1 !important;
        }
    </style>
@endsection

@section('content')

<div class="wrapper-dahboard-page col-lg-10 row">

    {{-- banner main --}}
    <div class="main-banner ms-2 col-lg-11">
        <img src="{{ asset('assets/discuss.png') }}" alt="" style="width: 100%;">
    </div>

    <div class="card list-topic-content ms-3 mt-4 p-5 col-lg-11 bg-white">
        <div class="title-list row d-flex justify-content-center">
            <div class="col-lg-8 d-flex justify-content-center">
                <div class="w-100 chat">
                    <div class="chat-window">
                        <div class="chat-rows overflow-scroll"></div>
                    </div>
                    <div class="border-0 d-flex justify-content-between align-items-center py-2 px-3 rounded bg-input-text">
                        <input type="text" class="chat-textarea border-0 py-3 ps-2 bg-input-text" placeholder="Tuliskan pesan anda di sini">
                        <a href="" class="btn btn-primary text-white fw-bold" style="border-radius: 10px;">KIRIM</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script')
    <script>
        var templateStart = '<div class="chat-row"><div class="chat-wrapper clearfix"><div class="chat-user-pic"></div><div class="chat-message">';
        var templateEnd = '</div></div></div>';
        var count = 0;

        $(".chat").each(function(index, item) {
            console.log(index, item)
            $(".chat-textarea").on("keydown", function(e) {
                if (e.keyCode == "13") {
                    $(".chat-rows").append(templateStart + $(this).val() + templateEnd);
                    count += $(item).find(".chat-row").last().height();
                    console.log(count)
                    // count = 250
                    $(".chat-rows").animate({
                        "height": count + "px"
                    });

                    // setInterval(() => {
                    //     $(".chat-rows").attr('style', 'height: 100px;')
                    // }, 1000);
                    $(this).val("");

                    return false;
                }
            })

        })

    </script>
@endsection
