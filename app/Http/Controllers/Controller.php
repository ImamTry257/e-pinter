<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // $data['link_sains_info'] = DB::table('contents')->where('status', '=', 1)
        //     ->where('content_type', 'sains_info')
        //     ->orderByDesc('created_at')
        //     ->first();

        // View::share('link_sains_info', $data['link_sains_info']);
    }
}
