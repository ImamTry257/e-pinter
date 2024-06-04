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
            #throw $th;
            dd($th->getMessage());

            DB::rollBack();
            return response()->json([
                'status' => false
            ], 500);
        }
    }

    public function activity(Request $request, $slug)
    {
        # check slug is existing?
        $data['slug'] = $slug;

        # list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity($slug);

        $data['user'] = Auth::user();

        $parameter = [
            'user_id'               => Auth::user()->id,
            'user_group_id'         => ( $data['user']->user_group_id == null ) ? $data['activity_selected']['user_group_id'] : $data['user']->user_group_id,
            'activity_master_id'    => $data['activity_selected']['user_group_id'],
        ];

        # get data progress step detail
        $data['step_progress'] = DB::table('activity_step_progress as sp')
                                        ->join('activity_step as s', 's.id', '=', 'sp.activity_step_id')
                                        ->join('activity_step_detail as sd', 'sd.activity_progress_id', '=', 'sp.id')
                                        ->where($parameter)
                                        ->orderBy('activity_step_id', 'desc')
                                        ->get(['*']);

        # data user
        $data['activity_master_id'] = $parameter['activity_master_id'];
        # ($data, $parameter);

        # return view
        return view('front.page.learning-activity.list_activity', $data);
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


    public function introduction(Request $request, $slug)
    {
        $data['slug'] = $slug;

        # list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity($slug);

        $data['content'] = $this->getContentIntro($slug);

        $data['user'] = Auth::user();

        # get data progress
        $data['progress'] = DB::table('activity_step_progress')
                            ->where([
                                'user_id'               => $data['user']->id,
                                'user_group_id'         => $data['user']->user_group_id,
                                'activity_master_id'    => $data['activity_selected']['user_group_id'],
                                'activity_step_id'      => 1
                            ])->first();

        # if null, new journey for this project
        if ( empty( $data['progress'] ) ) :
            # new record
            $data['progress'] = DB::table('activity_step_progress')
            ->insertGetId([
                'user_id'               => $data['user']->id,
                'user_group_id'         => $data['user']->user_group_id,
                'activity_master_id'    => $data['activity_selected']['user_group_id'],
                'activity_step_id'      => 1,
                'created_at'            => now()
            ]);

            $data['progress_id'] = $data['progress'];
        else :
            $data['progress_id'] = $data['progress']->id;
        endif ;

        # return view
        return view('front.page.learning-activity.introduction_activity', $data);
    }

    public function nextProgress(Request $request)
    {
        try {
            # dd($request->all(), json_decode($request->answers));

            # check is_intro
            if ( $request->intro == 0 ) :
                # set presentase
                $count_question = $request->count_question;
                $count_answer = 0;
                $data_answers = json_decode($request->answers);
                foreach ( $data_answers as  $answer) :
                    if ( $answer->value_text != '' ) :
                        $count_answer++;
                    endif ;
                endforeach ;

                # set presentase
                $detail_progress = ( $count_answer == $count_question ) ? 100 : ( ( $count_answer / $count_question ) * 100 );
            else :
                $detail_progress = 100;
            endif ;

            # update progress on step detail
            $parameter = [
                'activity_progress_id'  => $request->progress_id,
                'is_intro'              => $request->intro,
                'detail_progress'       => $detail_progress
            ];

            # set structure for string json to parameter answer
            if ( $request->intro == 1 ) : # for step introduction
                $sjson['type'] = 'intro';
                $sjson['presentase'] = 100;
                $sjson['value'] = 'intro_step';

                $parameter['answers'] = json_encode($sjson);

                $parameter['detail_progress'] = $sjson['presentase'];
            else :
                # set format answer for inserting data
                $ins_answers = [
                    'type'          => ( $request->intro == 0 ) ? 'non-intro' : 'intro',
                    'presentase'    => $detail_progress,
                    'value'         => $request->answers
                ];

                $parameter['answers'] = ( $request->intro ) ? 'intro_step' : json_encode($ins_answers);

                // handle key value for step 3 , 4 and 5
                if ( in_array($request->step_id, [3, 4, 5]) ) :

                    $fileName = '';
                    if ( $request->is_upload_file == 1 ) :
                        // check request file is exist
                        if ( $request->file_1 != null || $request->file_2 != null || $request->file_3 != null ) :

                            $filename_arr = [];
                            if ( $request->file_1 != null ) :
                                // upload file
                                $fileNameA = date('YmdHis'). '_a_' . $request->file_1->getClientOriginalName();

                                $fileNameA_valHtml = $request->file_1->getClientOriginalName();

                                $request->file_1->move(public_path('assets/activity/step/'), $fileNameA);
                            endif ;

                            if ( $request->file_2 != null ) :
                                // upload file
                                $fileNameB = date('YmdHis'). '_b_' . $request->file_2->getClientOriginalName();

                                $fileNameB_valHtml = $request->file_2->getClientOriginalName();

                                $request->file_2->move(public_path('assets/activity/step/'), $fileNameB);
                            endif ;

                            if ( $request->file_3 != null ) :
                                // upload file
                                $fileNameC = date('YmdHis'). '_c_' . $request->file_3->getClientOriginalName();

                                $fileNameC_valHtml = $request->file_3->getClientOriginalName();

                                $request->file_3->move(public_path('assets/activity/step/'), $fileNameC);
                            endif ;

                            $value_filename_arr = [
                                'file_1' => ( $fileNameA != null ) ? $fileNameA : "",
                                'file_2' => ( $fileNameB != null ) ? $fileNameB : "",
                                'file_3' => ( $fileNameC != null ) ? $fileNameC : ""
                            ];

                            $value_html_filename_arr = [
                                'file_1' => ( $fileNameA_valHtml != null ) ? $fileNameA_valHtml : "",
                                'file_2' => ( $fileNameB_valHtml != null ) ? $fileNameB_valHtml : "",
                                'file_3' => ( $fileNameC_valHtml != null ) ? $fileNameC_valHtml : ""
                            ];

                            $ins_answers = [
                                'type'          => 'non-intro',
                                'presentase'    => $detail_progress,
                                'value'         => json_encode([['id' => 'file', 'value_text' => $value_html_filename_arr, 'value_html'    => $value_filename_arr]])
                            ];

                            $parameter['answers'] = ( $request->intro ) ? 'intro_step' : json_encode($ins_answers);

                        else :
                            // check is update or new record
                            $check_data_step_upload = $this->checkDataProgress($request->progress_id, $request->step_id);

                            if ( empty($check_data_step_upload) ) :
                                $ins_answers = [
                                    'type'          => 'non-intro',
                                    'presentase'    => $detail_progress,
                                    'value'         => json_encode([['id' => 'file', 'value_text' => $fileName, 'value_html' => $fileName]])
                                ];
                                $parameter['answers'] = ( $request->intro ) ? 'intro_step' : json_encode($ins_answers);

                            endif ;
                        endif ;
                    endif ;
                endif ;

                # dd($request->answers, json_encode([['id' => 'file', 'value_string' => 'sadasd.png']]), $parameter);
            endif ;

            # dd($request->all(), $parameter);
            # check data
            $query_step_detail = $this->checkDataProgress($request->progress_id, $request->step_id);

            $data_step_detail = $query_step_detail->first();

            # dd($data_step_detail, $request->all(), $parameter, $query_step_detail->toSql());

            $user_id = Auth::user()->id;
            $date_now = now();
            if ( empty ( $data_step_detail ) ) :
                # new record
                $parameter['created_by'] = $user_id;
                $parameter['created_at'] = $date_now;
                $parameter['updated_by'] = 0;

                DB::table('activity_step_detail')
                    ->insert($parameter);
            else :
                # data update
                $parameter['sd.updated_by'] = $user_id;
                $parameter['sd.updated_at'] = $date_now;

                $query_step_detail->update($parameter);

            endif ;

            # check is last step
            if ( $request->step_id == 6 ) :
                # get master_id
                $data_p = DB::table('activity_step_progress as p')
                            ->where('p.id', '=', $request->progress_id)
                            ->first('activity_master_id');

                # check detail progress on this project
                $check_detail_p = DB::table('activity_step_progress as p')
                                    ->join('activity_step_detail as d', 'd.activity_progress_id', '=', 'p.id')
                                    ->where([
                                        'p.user_id'             => $user_id,
                                        'p.activity_master_id'  => $data_p->activity_master_id
                                    ])
                                    ->where('d.detail_progress', '!=', 100)
                                    ->first(['d.id as detail_id']);

                # check data on activity summary
                $parameter_summary = [
                    'user_id'             => $user_id,
                    'activity_master_id'  => $data_p->activity_master_id,
                ];

                # update to activity summary
                $summary_is_exist = DB::table('activity_summary')
                        ->where([
                            'user_id' => $user_id,
                            'activity_master_id'  => $data_p->activity_master_id
                        ])->first('id as summary_id');

                $parameter_summary['is_completed'] = ( empty ( $check_detail_p ) ? 1 : 0 );
                if ( empty ( $summary_is_exist ) ) :
                    # new record
                    $parameter_summary['created_at'] = $date_now;

                    DB::table('activity_summary')
                        ->insert($parameter_summary);
                else :
                    # update
                    $parameter_summary['updated_at'] = $date_now;

                    $summary_is_exist->update($parameter_summary);
                endif ;

            endif;

            $response = [
                'status'            => true,
                'message'           => 'Progress Berhasil disimpan!',
                'detail_progress'   => $parameter['detail_progress']
            ];

            $code = 200;
        } catch (\Throwable $th) {
            #throw $th;
            dd($th);
            $response = [
                'status'    => false,
                'message'   => 'Progress Gagal disimpan!'
            ];

            $code = 500;
        }

        # dd($parameter, $data_step_detail);
        return response()->json($response, $code);
    }

    public function checkDataProgress($progress_id, $step_id)
    {
        return DB::table('activity_step_detail as sd')
            ->join('activity_step_progress as sp', 'sp.id', '=', 'sd.activity_progress_id')
            ->join('activity_step as s', 's.id', '=', 'sp.activity_step_id')
            ->where([
                'sd.activity_progress_id' => $progress_id,
                's.step_id' => $step_id
            ]);
    }

    public function step(Request $request, $slug, $step)
    {
        $data['slug'] = $slug;
        $data['step'] = $step;

        # list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity($slug);

        $path_view = 'front.page.learning-activity.step' . $step;

        # get content
        $data['content'] = $this->selectContentStep($data['activity_selected']['user_group_id'], $step, false);

        $data['user'] = Auth::user();

        # get data progress activity
        $parameter = [
            'b.user_id'               => $data['user']->id,
            'b.user_group_id'         => $data['user']->user_group_id,
            'b.activity_master_id'    => $data['activity_selected']['user_group_id'],
        ];

        $progress_activity = DB::table('activity_step_progress as b')
                            ->join('activity_step as s', 's.id', '=', 'b.activity_step_id')
                            ->where($parameter)
                            ->where('s.step_id', '=', $step)
                            ->first(['b.id']);
        # dd($step);
        # check data
        if ( empty( $progress_activity ) ) :
            # new record to progress detail for new step

            # param
            $parameter = [
                'user_id'           => $data['user']->id,
                'user_group_id'     => $data['user']->user_group_id,
                'activity_master_id'=> $data['activity_selected']['user_group_id']
            ];

            # get step_id
            $data_step = DB::table('activity_step as s')
                        ->where('s.step_id', '=', $step)
                        ->first(['s.id']);

            $parameter['activity_step_id'] = $data_step->id;

            # check data by param
            $data_step_progress = DB::table('activity_step_progress')
                                ->where($parameter)->first();

            if ( empty ( $data_step_progress ) ) :
                # new record
                $parameter['created_at'] = now();

                $progress_id = DB::table('activity_step_progress')
                    ->insertGetId($parameter);

                $data['progress_id'] = $progress_id;
            else :
                # update data into step progress
                DB::table('activity_step_progress')
                    ->where($parameter)
                    ->update(['updated_at' => now()]);

                $data['progress_id'] = $data_step_progress->id;

            endif ;
        else :
            # set progress_id
            $data['progress_id'] = $progress_activity->id;
        endif ;

        # get data detail step
        $data['detail_step'] = DB::table('activity_step_detail as sd')
                                ->where('activity_progress_id', '=', $data['progress_id'])
                                ->first();

        # dd($data, $parameter, $progress_activity);

        return view($path_view, $data);
    }
}
