<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // list learning activity
        $data['list_activity'] = [
            [
                'title'         => 'Gerak Lurus',
                'slug'          => 'gerak-lurus',
                'image'         => 'list-kinematika-pemb1-new.png',
                'user_group_id' => 1
            ],
            [
                'title'         => 'Gerak Parabola',
                'slug'          => 'gerak-parabola',
                'image'         => 'list-kinematika-pemb2-new.png',
                'user_group_id' => 2
            ],
            [
                'title'         => 'Gerak Melingkar',
                'slug'          => 'gerak-melingkar',
                'image'         => 'list-kinematika-pemb3-new.png',
                'user_group_id' => 3
            ]
        ];

        $data['user'] = Auth::user();

        return view('front.page.dashboard.index', $data);
    }

    public function start(Request $request)
    {
        try {
            # dd($request->all());

            # param
            $parameter = [
                'user_id'           => $request['user_id'],
                'user_group_id'     => $request['user_group_id'],
                'activity_master_id'=> $request['activity_master_id'],
                'activity_step_id'  => $request['activity_step_id']
            ];

            # check data user_group di step progress
            $data_user_group_id = DB::table('activity_step_progress')
                                    ->where(['user_id' => $request['user_id']])
                                    ->first();

            # is exist
            if ( !empty($data_user_group_id) ) :
                $user_group_id = $data_user_group_id->user_group_id;
            else :
                $user_group_id = $parameter['user_group_id'];

                # update data user_group_id to users table by user_id
                DB::table('users')->where('id', '=', $request['user_id'])
                                ->update(['user_group_id' => $user_group_id]);
            endif ;

            # check data by param
            $data_step_progress = DB::table('activity_step_progress')
                                ->where($parameter)->first();

            if ( empty ( $data_step_progress ) ) :
                # new record
                $parameter['created_at'] = now();

                DB::table('activity_step_progress')
                    ->insert($parameter);
            else :
                # data update

                # update data into step progress
                DB::table('activity_step_progress')
                    ->where($parameter)
                    ->update(['updated_at' => now()]);

            endif ;

            $response = [
                'status'    => true,
                'message'   => 'Progress Berhasil disimpan!'
            ];

            $code = 200;
        } catch (\Throwable $th) {
            # throw $th;
            # dd($th->getMessage());
            $response = [
                'status'    => false,
                'message'   => 'Progress Gagal disimpan!'
            ];

            $code = 500;
        }

        return response()->json($response, $code);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
