<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LearningInfoController extends Controller
{
    public function index()
    {
        return view("front.page.learning-info.index");
    }

    public function bookModel()
    {
        return view("front.page.learning-info.book-module");
    }

    public function infoEpinter()
    {
        return view("front.page.learning-info.info-epinter");
    }

    public function infoTracker()
    {
        return view("front.page.learning-info.info-tracker");
    }
}
