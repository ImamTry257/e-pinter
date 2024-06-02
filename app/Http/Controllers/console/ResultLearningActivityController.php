<?php

namespace App\Http\Controllers\console;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ResultLearningActivityController extends Controller
{
    public $user_id_selected;
    public $is_progress;

    public function __construct() {
        $this->is_progress = false;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('console.page.result-learning-activity.index');
    }

    public function getStudentLearningActivity(Request $request)
    {
        if ($request->ajax()) :
            $data = DB::select("SELECT u.`name` AS nama_siswa, ug.`name` AS nama_kelompok, u.`email` AS email_siswa, u.`id` AS user_id
            FROM `users` AS u,
            user_group AS ug
            WHERE u.`user_group_id` = ug.`id`
            AND u.`id` IN (
                SELECT DISTINCT(sp.`user_id`) FROM `activity_step_progress` AS sp
            )");

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.result.learning.activity.show', ['user_id' => Crypt::encryptString($row->user_id)]) . '" class="edit btn bg-console text-dark btn-sm">Lihat Detail</a>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        endif;
    }

    public function show($user_id)
    {
        $data['dec_id'] = Crypt::decryptString($user_id);

        $data['student'] = DB::table('users as u')
            ->where('u.id', '=', $data['dec_id'])
            ->first(['u.name', 'u.id']);

        return view('console.page.result-learning-activity.show_by_user_id', $data);
    }

    public function getResultLearningActivity(Request $request)
    {
        // if ($request->ajax()) :

        $data = DB::select("SELECT la.`id`, la.`name`, la.`descriptions` FROM activity_master AS la
                        ORDER BY la.`id` ASC");

        $this->user_id_selected = $request->user_id;
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                $status = 'Belum dikerjakan';
                $class = 'btn-warning';

                $check_answer = DB::table('activity_step_progress as asp')
                    ->join('activity_step_detail as asd', 'asd.activity_progress_id', '=', 'asp.id')
                    ->where('asp.activity_master_id', '=', $row->id)
                    ->where('asp.user_id', '=', $this->user_id_selected)
                    ->get();

                $counter_progress = 0;
                if (count($check_answer) != 0) :

                    # flaq process
                    $count_question = count($check_answer);
                    foreach ($check_answer as $key => $data) {
                        if ( $data->detail_progress == 100 ) {
                            $counter_progress++;
                        }
                    }

                    if ($count_question == 0 || $counter_progress == 0) :
                        $status = 'Belum dikerjakan';
                        $class = 'btn-warning';
                    elseif ($counter_progress > 0 && ( $counter_progress != count($check_answer))) :
                        $status = 'Sedang dikerjakan';
                        $class = 'btn-primary';
                    elseif ($counter_progress == count($check_answer)) : # tidak ada yang kosong
                        $status = 'Sudah dikerjakan';
                        $class = 'btn-success';
                    endif;
                endif;

                return '<span class="btn ' . $class . '">' . $status . '</span>';
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '';

                $check_answer = DB::table('activity_step_progress as asp')
                    ->join('activity_step_detail as asd', 'asd.activity_progress_id', '=', 'asp.id')
                    ->where('asp.activity_master_id', '=', $row->id)
                    ->where('asp.user_id', '=', $this->user_id_selected)
                    ->get();

                $this->is_progress = false;
                $counter_progress = 0;
                if (count($check_answer) != 0) :

                    # flaq process
                    $count_question = count($check_answer);
                    foreach ($check_answer as $key => $data) {
                        if ( $data->detail_progress == 100 ) {
                            $counter_progress++;
                        }
                    }

                    if ($count_question == 0 || $counter_progress == 0) :
                        $this->is_progress = false;
                    elseif ($counter_progress > 0 && ( $counter_progress != count($check_answer))) :
                        $this->is_progress = true;
                    elseif ($counter_progress == count($check_answer)) : # tidak ada yang kosong
                        $this->is_progress = true;
                    endif;
                endif;

                $p_slug = $row->descriptions;
                $slug = str_replace(" ", "-", strtolower($p_slug));
                if ($this->is_progress == true) {
                    $actionBtn = '<a href="' . route('admin.detail.result.learning.activity.show', ['result_id' => Crypt::encryptString($row->id . '_' . $this->user_id_selected . '_' . $slug)]) . '" class="edit btn bg-console text-dark btn-sm">Lihat Detail</a>';
                }

                return $actionBtn;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
        // endif;
    }

    public function detail_result_old($result_id)
    {
        $result_id_dec = Crypt::decryptString($result_id);

        $data_result = explode('_', $result_id_dec);
        $master_id = $data_result[0];
        $user_id = $data_result[1];
        $data['data_activity'] = DB::table('learning_activities as la')
            ->where('la.parent_id', '=', 0)
            ->where('la.id', '=', $step_id)
            ->first();

        $data['user_activity'] = DB::table('users as u')
            ->where('u.id', '=', $user_id)
            ->first();

        $data['user_id_enc'] = $user_id;

        $data['detail_result'] = DB::table('learning_activities_answer as laa')
            ->join('learning_activities_detail as lad', 'lad.id', '=', 'laa.question_id')
            ->join('learning_activities as la2', 'la2.id', '=', 'lad.learning_activities_id')
            ->where('laa.created_by', '=', $user_id)
            ->where('laa.status', '=', 1)
            ->where('laa.step_id', '=', $step_id)
            ->get();

        # dd($data);
        // echo '<pre>';
        // print_r($data);
        // die;
        return view('console.page.result-learning-activity.detail_result', $data);
    }

    public function detail_result($result_id)
    {
        $result_id_dec = Crypt::decryptString($result_id);

        $data_result = explode('_', $result_id_dec);
        $master_id = $data_result[0];
        $user_id = $data_result[1];
        $slug = $data_result[2];

        # check slug is existing?
        $data['slug'] = $slug;

        # list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity($slug);

        $data['user_activity'] = User::where(['id' => $user_id])->first();
        $data['user_id_enc'] = $user_id;

        $parameter = [
            'user_id'               => $user_id,
            'activity_master_id'    => $master_id,
        ];

        # get data progress step detail
        $data['step_progress'] = DB::table('activity_step_progress as sp')
                                        ->join('activity_step as s', 's.id', '=', 'sp.activity_step_id')
                                        ->join('activity_step_detail as sd', 'sd.activity_progress_id', '=', 'sp.id')
                                        ->join('user_group as ug', 'ug.id', '=', 'sp.user_id')
                                        ->where($parameter)
                                        ->orderBy('activity_step_id', 'asc')
                                        ->get(['*']);

        # data user
        $data['activity_master_id'] = $parameter['activity_master_id'];

        # return view
        return view('console.page.result-learning-activity.detail_activity_v2', $data);
    }

    public function detail_introduction($user_id, $slug)
    {
        $data['slug'] = Crypt::decryptString($slug);
        $data['user_id'] = Crypt::decryptString($user_id);

        # list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity($data['slug']);

        $data['content'] = $this->getContentIntro($data['slug']);

        $data['user'] = User::where(['id' => Crypt::decryptString($user_id)])->first();

        # get data progress
        $data['progress'] = DB::table('activity_step_progress')
                            ->where([
                                'user_id'               => $data['user']->id,
                                'user_group_id'         => $data['user']->user_group_id,
                                'activity_master_id'    => $data['activity_selected']['user_group_id'],
                                'activity_step_id'      => 1
                            ])->first();

        $data['progress_id'] = $data['progress']->id;
        $data['progress_activity'] = $data['progress'];

        # return view
        return view('console.page.result-learning-activity.detail_introduction', $data);
    }

    public function detail_step($user_id, $slug, $step)
    {
        $data['slug'] = Crypt::decryptString($slug);
        $data['step'] = Crypt::decryptString($step);

        # list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity($data['slug']);
        $path_view = 'console.page.result-learning-activity.step.step-' . $data['step'];

        # get content
        $data['content'] = $this->selectContentStep($data['activity_selected']['user_group_id'], $data['step'], true);

        $data['user'] = User::where(['id' => Crypt::decryptString($user_id)])->first();
        $data['user_id_enc'] = $data['user']->id;

        # get data progress activity
        $parameter = [
            'b.user_id'               => $data['user']->id,
            'b.activity_master_id'    => $data['activity_selected']['user_group_id'],
        ];

        $progress_activity = DB::table('activity_step_progress as b')
                            ->join('activity_step as s', 's.id', '=', 'b.activity_step_id')
                            ->where($parameter)
                            ->where('s.step_id', '=', $data['step'])
                            ->first(['b.id', 'b.activity_master_id']);

        # set data progress
        $data['progress_activity'] = $progress_activity;

        # set progress_id
        $data['progress_id'] = $progress_activity->id;

        # get data detail step
        $data['detail_step'] = DB::table('activity_step_detail as sd')
                                ->where('activity_progress_id', '=', $data['progress_id'])
                                ->first();

        # check for next step is enable
        $data['is_enable_to_next_step'] = $this->is_enable_next_step($data['user']->id, $data['activity_selected']['user_group_id'], $data['step']);

        # parameter for next step
        $data['user_id_next_step'] = Crypt::decryptString($user_id);
        $data['slug_next_step'] = $data['slug'];
        $data['next_step'] = $data['step'];

        # dd($data, $parameter, $progress_activity);

        return view($path_view, $data);
    }

    public function is_enable_next_step($user_id, $master_id, $current_step)
    {
        # get data next progress activity
        $parameter = [
            'b.user_id'             => $user_id,
            'b.activity_master_id'  => $master_id
        ];

        $next_progress_activity = DB::table('activity_step_progress as b')
                            ->join('activity_step as s', 's.id', '=', 'b.activity_step_id')
                            ->join('activity_step_detail as asd', 'asd.activity_progress_id', '=', 'b.id')
                            ->where($parameter)
                            ->where('s.step_id', '=', ( $current_step + 1 ))
                            ->first(['b.id']);

        return empty ($next_progress_activity) ? false : true;
    }
}
