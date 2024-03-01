<?php

namespace App\Http\Controllers\console;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ResultLearningActivityController extends Controller
{
    public $user_id_selected;
    public $is_progress;
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
            $data = DB::select("SELECT u.name as nama_siswa, u.`school` as sekolah, u.id as user_id FROM users AS u
            WHERE u.`id` IN (
                SELECT DISTINCT  las.`created_by` 
                FROM learning_activities_answer AS las
            )
            AND u.`type` = 'siswa'
            AND u.`status` = 1");

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

        $data = DB::select("SELECT la.id, la.`title` FROM learning_activities AS la
                        WHERE la.`parent_id` = 0
                        ORDER BY la.`id` ASC");

        $this->user_id_selected = $request->user_id;
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                $status = 'Belum dikerjakan';
                $class = 'btn-warning';

                $check_answer = DB::table('learning_activities_answer as laa')
                    ->where('laa.step_id', '=', $row->id)
                    ->where('laa.created_by', '=', $this->user_id_selected)
                    ->where('laa.status', '=', 1)
                    ->get();

                $counter_progress = 0;
                if (count($check_answer) != 0) :

                    # flaq process
                    $count_question = count($check_answer);
                    foreach ($check_answer as $key => $data) {

                        if (!in_array($data->answer, ['', '<p><br></p>'])) {
                            $counter_progress++;
                        }
                    }

                    $this->is_progress = true;
                    if ($count_question == 0 || $counter_progress == 0) :
                        $status = 'Belum dikerjakan';
                        $class = 'btn-warning';
                        $this->is_progress = false;
                    elseif ($counter_progress > 0) :
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

                if ($this->is_progress == true) {
                    $actionBtn = '<a href="' . route('admin.detail.result.learning.activity.show', ['result_id' => Crypt::encryptString($row->id . '_' . $this->user_id_selected)]) . '" class="edit btn bg-console text-dark btn-sm">Lihat Detail</a>';
                }

                return $actionBtn;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
        // endif;
    }

    public function detail_result($result_id)
    {
        $result_id_dec = Crypt::decryptString($result_id);

        $data_result = explode('_', $result_id_dec);
        $step_id = $data_result[0];
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
}
