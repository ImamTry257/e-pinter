<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($questionNo)
    {
        $question_no = [];
        for ( $i = 1; $i <= 30; $i++ ) :
            $question_no [] = $i;
        endfor;

        # question number
        # for left side
        $data['q_no_left'] = [1, 4, 7, 10, 13, 16, 19, 22, 25, 28];

        # for center side
        $data['q_no_center'] = [2, 5, 8, 11, 14, 17,  20, 23, 26, 29];

        # for right side
        $data['q_no_right'] = [3, 6, 9, 12, 15, 18, 21, 24, 27, 30];

        $data['question_no'] = $question_no;

        $data['question_no_selected'] = $questionNo;

        return view('front.page.question.index', $data);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
