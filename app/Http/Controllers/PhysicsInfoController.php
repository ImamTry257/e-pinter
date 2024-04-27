<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhysicsInfoController extends Controller
{
    public function index()
    {
        return view('front.page.physics-info.index');
    }
}
