<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LearningInfoController extends Controller
{
    public function index()
    {
        // dd('okeee');
        return view("front.page.learning-info.index");
    }
}
