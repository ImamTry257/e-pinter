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

        $data['question_no'] = $question_no;

        $data['question_no_selected'] = $questionNo;

        return view('front.page.question.index', $data);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
