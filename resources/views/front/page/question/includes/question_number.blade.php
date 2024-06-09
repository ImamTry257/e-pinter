<div class="row">
    <div class="col-4 mb-2 text-end">
        @foreach ($q_no_left as $key => $val )
        <div class="pb-2">
            <span class="d-none" id="question_url">{{ route('question', ['questionNo' => Crypt::encryptString($val)]) }}</span>
            <a href="javascript:void(0);" onclick="
                var overallTime = $('#overall_time').val()
                return location.href = $(this).prev().text() + '-' + overallTime"
                id="question-no" class="p-2 fw-bold border border-dark btn {{ ($question_no_selected == $val ) ? 'selected-question' : '' }}" style="width: 45px;">
                {{ $val }}
            </a>
        </div>
        @endforeach
    </div>
    <div class="col-4 mb-2 text-center">
        @foreach ($q_no_center as $key => $val )
        <div class="pb-2">
            <span class="d-none" id="question_url">{{ route('question', ['questionNo' => Crypt::encryptString($val)]) }}</span>
            <a href="javascript:void(0);" onclick="
                var overallTime = $('#overall_time').val()
                return location.href = $(this).prev().text() + '-' + overallTime" id="question-no" class="p-2 fw-bold border border-dark btn {{ ($question_no_selected == $val ) ? 'selected-question' : '' }}" style="width: 45px;">
                {{ $val }}
            </a>
        </div>
        @endforeach
    </div>
    <div class="col-4 mb-2 text-start">
        @foreach ($q_no_right as $key => $val )
        <div class="pb-2">
            <a href="javascript:void(0);" onclick="
                var overallTime = $('#overall_time').val()
                return location.href = $(this).prev().text() + '-' + overallTime" id="question-no" class="p-2 fw-bold border border-dark btn {{ ($question_no_selected == $val ) ? 'selected-question' : '' }}" style="width: 45px;">
                {{ $val }}
            </a>
        </div>
        @endforeach
    </div>
</div>
