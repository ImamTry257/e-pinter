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

    public function getContentListActivity($user_group_id)
    {
        // list learning activity
        $list_activity = [
            [
                'title'         => 'Gerak Lurus',
                'slug'          => 'gerak-lurus',
                'image'         => 'img-pemb1.svg',
                'user_group_id' => 1
            ],
            [
                'title'         => 'Gerak Parabola',
                'slug'          => 'gerak-parabola',
                'image'         => 'img-pemb2.svg',
                'user_group_id' => 2
            ],
            [
                'title'         => 'Gerak Melingkar',
                'slug'          => 'gerak-melingkar',
                'image'         => 'img-pemb3.svg',
                'user_group_id' => 3
            ]
        ];

        $data_activity = [];
        foreach ( $list_activity as $activity ) :
            if ( $activity['user_group_id'] == $user_group_id ) :
                $data_activity = $activity;
            endif ;
        endforeach;

        return $data_activity;
    }
}
