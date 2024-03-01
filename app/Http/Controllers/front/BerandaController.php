<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $data['user'] = '';

        if (Auth::user() != null) :
            $data['user'] = Auth::user();
        endif;

        return view('front.page.beranda.index', $data);
    }

    public function information()
    {
        return view('front.page.information.index');
    }
}
