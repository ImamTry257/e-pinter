<?php

namespace App\Http\Controllers\console\question;

use App\Exports\ExportResultQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ResultController extends Controller
{
    public function __construct() {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('console.page.question.result.index');
    }

    public function getStudentQuestion(Request $request)
    {
        if ($request->ajax()) :
            $where_search = '';
            $keyword = '';
            if ( $request->search['value'] != '' ) :
                $keyword = $request->search['value'];
                $where_search = 'WHERE UPPER(u.`name`) LIKE "%'. strtoupper($keyword) . '%" || UPPER(u.`school_name`) LIKE "%'. strtoupper($keyword) . '%" || UPPER(ug.`name`) LIKE "%'. strtoupper($keyword) . '%" || UPPER(u.`email`)LIKE "%'. strtoupper($keyword) . '%" || UPPER(u.`id`) LIKE "%'. strtoupper($keyword) . '%"';
            endif ;

            $data = DB::select("SELECT u.`name` AS nama_siswa, u.`school_name` AS nama_sekolah, u.`school_name_capital` AS nama_sekolah_kapital, ug.`name` AS nama_kelompok, u.`email` AS email_siswa, u.`id` AS user_id FROM `users` AS u LEFT JOIN user_group AS ug ON u.`user_group_id` = ug.`id`" . $where_search);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $get_status = $this->check_status($row->user_id);

                    $status = $get_status['status'];
                    $class = $get_status['class'];

                    return '<span class="btn ' . $class . '">' . $status . '</span>';
                })
                ->addColumn('action__', function ($row) {
                    $actionBtn = '';

                    $get_status = $this->check_status($row->user_id);
                    $class = $get_status['class'];

                    if ( $row->nama_kelompok != '' && $class != 'btn-warning' ) :
                        $actionBtn = '<a href="'. route('admin.question.result.download') .'" class="edit btn bg-console text-white btn-sm" id="download">Download Hasil</a>';
                    endif ;
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        endif;
    }

    public function check_status($user_id)
    {
        $check_answer = DB::table('question_answer_user as qau')
                        ->where('qau.user_id', '=', $user_id)
                        ->get();

        # get count step, for count question
        $count_question = DB::table("question_master")->count();

        # set default status
        $status = 'Incompleted';
        $class = 'btn-warning';

        if (count($check_answer) != 0) :

            # flaq progress
            $count_answer = count($check_answer);

            if ($count_answer == 0) :
                $status = 'Incompleted';
                $class = 'btn-warning';
            elseif ($count_answer > 0 && ( $count_answer != $count_question )) :
                $status = 'In Progress';
                $class = 'btn-primary';
            elseif ($count_answer == $count_question) : # tidak ada yang kosong
                $status = 'Completed';
                $class = 'btn-success';
            endif;
        endif;

        return [
            'status' => $status,
            'class' => $class,
        ];
    }

    public function download(Request $request)
    {
        # dd($request->all());
        return Excel::download(new ExportResultQuestion(), 'Hasil_Pengerjaan_Siswa_2024_' . date('YmdHis'). '.xlsx');
    }
}
