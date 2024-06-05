<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $question_no = [];
        for ( $i = 1; $i <= 30; $i++ ) :
            $question_no [] = $i;
        endfor;

        $data['question_no'] = $question_no;

        return view('front.page.question.index', $data);
    }
}
