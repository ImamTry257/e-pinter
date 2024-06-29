<?php

namespace App\Http\Controllers\console\question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ManageController extends Controller
{
    public function index()
    {
        return view('console.page.question.manage.index');
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) :
            $data = DB::table('question_master as qm')
                        ->leftJoin('question_answer_key as qak', 'qak.question_master_id', '=', 'qm.id')
                        ->where('qm.deleted_at', NULL)
                        ->orderBy('qm.id', 'asc')
                        ->get(['qm.id as question_id', 'qm.*', 'qak.*']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('description', function($row) {
                    return '<div>' . $row->description . '</div>';
                })
                ->addColumn('key_answer', function($row) {
                    return $row->key_answer;
                })
                ->addColumn('key_answer_w_r', function($row) {
                    return $row->key_answer_with_reason;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.question.manage.show', ['id' => Crypt::encryptString($row->question_id)]) . '" class="edit btn bg-console text-dark btn-sm">Ubah</a> <a href="" class="delete btn btn-danger btn-sm delete-user" id="' . $row->question_id . '">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'description'])
                ->make(true);
        endif;
    }

    public function create()
    {
        return view('console.page.question.manage.add');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') :
            //validate form
            $this->validate($request, [
                'descriptions'      => 'required',
                'A'      => 'required',
                'B'      => 'required',
                'C'      => 'required',
                'D'      => 'required',
                'E'      => 'required',
                'key_answer'      => 'required',
                'A_with_reason'      => 'required',
                'B_with_reason'      => 'required',
                'C_with_reason'      => 'required',
                'D_with_reason'      => 'required',
                'E_with_reason'      => 'required',
                'key_answer_w_reason'      => 'required'
            ]);

            try {

                # set param option
                $param_option = [
                    [
                        "value_key"     => "A",
                        "value_text"    => $request->A
                    ],
                    [
                        "value_key"     => "B",
                        "value_text"    => $request->B
                    ],
                    [
                        "value_key"     => "C",
                        "value_text"    => $request->C
                    ],
                    [
                        "value_key"     => "D",
                        "value_text"    => $request->D
                    ],
                    [
                        "value_key"     => "E",
                        "value_text"    => $request->E
                    ]
                ];

                # set param option with reason
                $param_option_w_r = [
                    [
                        "value_key"     => "A",
                        "value_text"    => $request->A_with_reason
                    ],
                    [
                        "value_key"     => "B",
                        "value_text"    => $request->B_with_reason
                    ],
                    [
                        "value_key"     => "C",
                        "value_text"    => $request->C_with_reason
                    ],
                    [
                        "value_key"     => "D",
                        "value_text"    => $request->D_with_reason
                    ],
                    [
                        "value_key"     => "E",
                        "value_text"    => $request->E_with_reason
                    ]
                ];

                dd(Session::get('data_user_login'));

                # param all
                $paramAdd = [
                    'number'        => $request->number,
                    'description'   => $request->descriptions,
                    'options'       => json_encode($param_option),
                    'options_with_reason' => json_encode($param_option_w_r),
                    'created_by'    => Session::get('data_user_login')->id,
                    'updated_by'    => 0,
                    'created_at'    => now()
                ];

                # dd($request->all(), $param_option, $param_option_w_r, $paramAdd);
                $question_master_id_new = DB::table('question_master')->insertGetId($paramAdd);

                DB::table('question_answer_key')->insert([
                    'question_master_id' => $question_master_id_new,
                    'key_answer'        => $request->key_answer,
                    'key_answer_with_reason' => $request->key_answer_w_reason,
                    'created_by'    => Session::get('data_user_login')->id,
                    'updated_by'    => 0,
                    'created_at'    => now()
                ]);

                if ( array_key_exists('create', $request->all()) ) :
                    return redirect()->route('admin.question.manage')->with('success', 'Soal berhasil ditambahkan');
                else :
                    return redirect()->route('admin.question.manage.add')->with('success', 'Soal berhasil ditambahkan');
                endif ;
            } catch (\Throwable $th) {
                dd($th->getMessage());
                return redirect()->route('admin.question.manage')->with('error', 'Soal gagal ditambahkan');
            }
        else :
            return redirect()->route('admin.question.manage');
        endif;
    }

    public function show($id)
    {
        $dec_id = Crypt::decryptString($id);

        $data['id'] = $id;

        $data['question'] = DB::table('question_master as u')
            ->leftJoin('question_answer_key as qak', 'qak.question_master_id', '=', 'u.id')
            ->where('u.id', '=', $dec_id)
            ->first();

        return view('console.page.question.manage.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') :
            DB::beginTransaction();

            $questionId = Crypt::decryptString($id);
            # dd($questionId, $request->all());

            # validate form
            $this->validate($request, [
                'descriptions'      => 'required',
                'A'      => 'required',
                'B'      => 'required',
                'C'      => 'required',
                'D'      => 'required',
                'E'      => 'required',
                'key_answer'      => 'required',
                'A_with_reason'      => 'required',
                'B_with_reason'      => 'required',
                'C_with_reason'      => 'required',
                'D_with_reason'      => 'required',
                'E_with_reason'      => 'required',
                'key_answer_w_reason'      => 'required'
            ]);

            try {

                # set param option
                $param_option = [
                    [
                        "value_key"     => "A",
                        "value_text"    => $request->A
                    ],
                    [
                        "value_key"     => "B",
                        "value_text"    => $request->B
                    ],
                    [
                        "value_key"     => "C",
                        "value_text"    => $request->C
                    ],
                    [
                        "value_key"     => "D",
                        "value_text"    => $request->D
                    ],
                    [
                        "value_key"     => "E",
                        "value_text"    => $request->E
                    ]
                ];

                # set param option with reason
                $param_option_w_r = [
                    [
                        "value_key"     => "A",
                        "value_text"    => $request->A_with_reason
                    ],
                    [
                        "value_key"     => "B",
                        "value_text"    => $request->B_with_reason
                    ],
                    [
                        "value_key"     => "C",
                        "value_text"    => $request->C_with_reason
                    ],
                    [
                        "value_key"     => "D",
                        "value_text"    => $request->D_with_reason
                    ],
                    [
                        "value_key"     => "E",
                        "value_text"    => $request->E_with_reason
                    ]
                ];

                # dd($request->all());

                # param all
                $parameter = [
                    'number'        => $request->number,
                    'description'   => $request->descriptions,
                    'options'       => json_encode($param_option),
                    'options_with_reason' => json_encode($param_option_w_r),
                    'updated_by'    => Session::get('data_user_login')->id,
                    'updated_at'    => now()
                ];

                DB::table('question_master')
                    ->where('id', $questionId)
                    ->update($parameter);

                DB::table('question_answer_key')
                    ->where('question_master_id', $questionId)
                    ->update([
                        'key_answer' => $request->key_answer,
                        'key_answer_with_reason' => $request->key_answer_w_reason,
                        'updated_by'    => Session::get('data_user_login')->id,
                        'updated_at'    => now()
                    ]);

                DB::commit();

                # dd($request->all(), $param_option, $param_option_w_r, $parameter);

                return redirect()->route('admin.question.manage')->with('success', 'Soal berhasil diubah');
            } catch (\Throwable $th) {

                DB::rollBack();
                # dd($th->getMessage());
                return redirect()->route('admin.question.manage')->with('error', 'Soal gagal diubah');
            }
        else :
            return redirect()->route('admin.question.manage');
        endif;
    }

    public function destroy($id)
    {
        $clean_id = str_replace("del_", "", $id);

        DB::table('question_master as u')
            ->where('u.id', '=', $clean_id)
            ->update([
                'u.deleted_at' => now()
            ]);

        $data = 'Data Soal Berhasil dihapus';
        $type_with = 'success';

        return redirect(route('admin.question.manage'))->with($type_with, $data);
    }

    public function convertToSecond($time_duration)
    {
        $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $time_duration);

        sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

        return $hours * 3600 + $minutes * 60 + $seconds;
    }

    public function time(Request $request)
    {
        # userId
        $user_id = Session::get('data_user_login')->id;

        $data['setting_duration'] = [];
        if ( $request->isMethod('POST') ) :

            //validate form
            $this->validate($request, [
                'duration'  => 'required'
            ]);

            try {
                # check data question setting
                $query_question_setting = DB::table('question_setting');
                $setting = $query_question_setting->first();

                # param to insert or update data
                $param['duration']              = $this->convertToSecond($request->duration);
                # dd($param, $setting);

                if ( empty ( $setting ) ) :
                    $param['created_by']            = $user_id;
                    $param['updated_by']            = 0;
                    $param['created_at']            = now();

                    // insert data
                    DB::table('question_setting')->insert($param);
                else :
                    $param['updated_by']            = $user_id;
                    $param['updated_at']            = now();

                    # dd($param, $setting);
                    $query_question_setting->update($param);
                endif ;

                $data = 'Setting Waktu Pengerjaan berhasil diubah';
                $type_with = 'success';

                return redirect()->route('admin.question.manage.time')->with($type_with, $data);
            } catch (\Throwable $th) {
                dd($th->getMessage());
                return redirect()->route('admin.question.manage.time')->with('error', 'Setting Waktu Pengerjaan gagal diubah');
            }

        else :
            $data['setting_duration'] = DB::table('question_setting')->first();
        endif ;

        return view('console.page.question.manage.time', $data);
    }

    public function getMaxNumber()
    {
        try {
            $getMaxNumber = DB::table('question_master')->where('deleted_at', NULL)->max('number');

            return response()->json([
                'status'=> true,
                'data'  => $getMaxNumber
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status'=> false,
                'data'  => 0
            ]);
        }
    }
}
