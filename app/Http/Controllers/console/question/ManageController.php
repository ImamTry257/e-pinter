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
                        ->join('question_answer_key as qak', 'qak.question_master_id', '=', 'qm.id')
                        ->orderBy('qm.id', 'asc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('description', function($row) {
                    return '<div>' . $row->description . '</div>';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.question.manage.show', ['id' => Crypt::encryptString($row->id)]) . '" class="edit btn bg-console text-dark btn-sm">Ubah</a> <a href="" class="delete btn btn-danger btn-sm delete-user" id="' . $row->id . '">Hapus</a>';
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
                'number'            => 'required',
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

                # dd(Session::get('data_user_login'));

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

                return redirect()->route('admin.question.manage')->with('success', 'Soal berhasil ditambahkan');
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
            ->join('question_answer_key as qak', 'qak.question_master_id', '=', 'u.id')
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
                'number'            => 'required',
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

                return redirect()->route('admin.question.manage')->with('success', 'Soal berhasil ditambahkan');
            } catch (\Throwable $th) {

                DB::rollBack();
                dd($th->getMessage());
                return redirect()->route('admin.question.manage')->with('error', 'Soal gagal ditambahkan');
            }
        else :
            return redirect()->route('admin.question.manage');
        endif;
    }

    public function destroy($id)
    {
        DB::table('users as u')
            ->where('u.id', '=', $id)
            ->update([
                'u.status' => 0
            ]);

        $data = 'Data Siswa Berhasil dihapus';
        $type_with = 'success';

        return redirect(route('admin.question.manage'))->with($type_with, $data);
    }
}
