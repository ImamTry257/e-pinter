<?php

namespace App\Http\Controllers\console\questionniare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ManageController extends Controller
{
    public function index()
    {
        return view('console.page.questionniare.manage.index');
    }

    public function getQuestionniare(Request $request)
    {
        if ($request->ajax()) :
            $data = DB::table('questionniare_master as qm')
                        ->orderBy('qm.id', 'asc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('description', function($row) {
                    return '<div>' . $row->description . '</div>';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.questionniare.manage.show', ['id' => Crypt::encryptString($row->id)]) . '" class="edit btn bg-console text-dark btn-sm">Ubah</a> <a href="" class="delete btn btn-danger btn-sm delete-user" id="' . $row->id . '">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'description'])
                ->make(true);
        endif;
    }

    public function create()
    {
        return view('console.page.questionniare.manage.add');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') :

            //validate form
            $this->validate($request, [
                'page'            => 'required',
                'number'            => 'required',
                'descriptions'      => 'required'
            ]);

            try {
                # param all
                $paramAdd = [
                    'page'          => $request->page,
                    'number'        => $request->number,
                    'number_string' => '-',
                    'description'   => $request->descriptions,

                    'created_by'    => Session::get('data_user_login')->id,
                    'updated_by'    => 0,
                    'created_at'    => now()
                ];

                # dd($request->all(), $param_option, $param_option_w_r, $paramAdd);
                DB::table('questionniare_master')->insert($paramAdd);

                return redirect()->route('admin.questionniare.manage')->with('success', 'Soal Kuisioner berhasil ditambahkan');
            } catch (\Throwable $th) {
                dd($th->getMessage());
                return redirect()->route('admin.questionniare.manage')->with('error', 'Soal Kuisioner gagal ditambahkan');
            }
        else :
            return redirect()->route('admin.questionniare.manage');
        endif;
    }

    public function show($id)
    {
        $dec_id = Crypt::decryptString($id);

        $data['id'] = $id;

        $data['questionniare'] = DB::table('questionniare_master as u')
            ->where('u.id', '=', $dec_id)
            ->first();

        return view('console.page.questionniare.manage.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') :
            DB::beginTransaction();

            $questionId = Crypt::decryptString($id);
            # dd($questionId, $request->all());

            # validate form
            $this->validate($request, [
                'page'            => 'required',
                'number'            => 'required',
                'descriptions'      => 'required'
            ]);

            try {
                # dd($request->all());

                # param all
                $parameter = [
                    'page'          => $request->page,
                    'number'        => $request->number,
                    'description'   => $request->descriptions,
                    'updated_by'    => Session::get('data_user_login')->id,
                    'updated_at'    => now()
                ];

                DB::table('questionniare_master')
                    ->where('id', $questionId)
                    ->update($parameter);

                DB::commit();

                return redirect()->route('admin.questionniare.manage')->with('success', 'Soal Kuisioner berhasil diubah');
            } catch (\Throwable $th) {

                DB::rollBack();
                # dd($th->getMessage());
                return redirect()->route('admin.questionniare.manage')->with('error', 'Soal Kuisioner gagal diubah');
            }
        else :
            return redirect()->route('admin.questionniare.manage');
        endif;
    }
}
