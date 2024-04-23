<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LearningActivityController extends Controller
{

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        # get data
        $data['list_data'] = DB::table('learning_activities as la')
            ->where('la.parent_id', '=', 0)
            ->get();

        return view('front.page.learning-activity.index', $data);
    }

    public function success()
    {
        return view('front.page.learning-activity.success');
    }

    public function get_answer(Request $request)
    {
        $user_id = Auth::user()->id;

        $data = DB::select("SELECT laa.`step_id`, laa.`question_id`, laa.`answer` FROM learning_activities_detail AS lad
            LEFT JOIN learning_activities_answer AS laa ON laa.`question_id` = lad.`id`
            WHERE laa.`step_id` = $request->step_id
            AND laa.`status` = 1
            AND laa.`created_by` = $user_id");

        return response()->json([
            'data' => $data,
            'status' => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()) :
            return response()->json([
                'status' => false
            ], 500);
        endif;

        $data_answer = json_decode($request['data_collect']);

        DB::beginTransaction();

        try {
            $data_insert = [];

            foreach ($data_answer as $key => $data) {
                $data_insert[] = [
                    'question_id'   => $data->id,
                    'answer'        => $data->answer,
                    'step_id'       => $data->step,
                    'status'        => 1,
                    'created_by'    => Auth::user()->id,
                    'created_at'    => now()
                ];
            }

            # check data
            $check_data = DB::table('learning_activities_answer as laa')
                ->where('laa.step_id', $data_answer[0]->step)
                ->where('laa.created_by', Auth::user()->id)
                ->count();

            if ($check_data != 0) :
                # change status old data
                DB::table('learning_activities_answer as laa')
                    ->where('laa.step_id', $data_answer[0]->step)
                    ->where('laa.created_by', Auth::user()->id)
                    ->update([
                        'status' => 0
                    ]);

            endif;

            # insert new data
            DB::table('learning_activities_answer')->insert($data_insert);

            DB::commit();

            return response()->json([
                'status' => true
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());

            DB::rollBack();
            return response()->json([
                'status' => false
            ], 500);
        }
    }

    public function activity(Request $request, $slug)
    {
        // check slug is existing?

        // list learning activity
        $data['list_activity'] = [
            [
                'title' => 'Gerak Lurus',
                'slug'  => 'gerak-lurus',
                'image' => 'list-kinematika-pemb1.svg'
            ],
            [
                'title' => 'Gerak Parabola',
                'slug'  => 'gerak-parabola',
                'image' => 'list-kinematika-pemb2.svg'
            ],
            [
                'title' => 'Gerak Melingkar',
                'slug'  => 'gerak-melingkar',
                'image' => 'list-kinematika-pemb3.svg'
            ]
        ];

        // return view
        return view('front.page.learning-activity.list_activity', $data);
    }
}
