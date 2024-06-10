<?php

namespace App\Http\Controllers\console\question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
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
            $data = DB::table('question_master')->orderByDesc('id')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.user.show', ['id' => Crypt::encryptString($row->id)]) . '" class="edit btn bg-console text-dark btn-sm">Ubah</a> <a href="" class="delete btn btn-danger btn-sm delete-user" id="' . $row->id . '">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'descriptions'])
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
                'name'                  => 'required|unique:users,name',
                'password'              => 'required|confirmed',
                'password_confirmation' => 'required',
                'school'                => 'required'
            ]);
            dd('xczxc');
            // $name = $request->name;
            // $email = str::random(10) . '@example.com';

            // try {
            //     DB::table('users')
            //         ->insert([
            //             'name' => $name,
            //             'email' => $email,
            //             'password' => Hash::make($request->password),
            //             'school' => $request->school,
            //             'type'  => 'siswa',
            //             'status' => 1,
            //             'created_by' => Auth::user()->id
            //         ]);

            //     return redirect()->route('admin.user')->with('success', 'User berhasil ditambahkan');
            // } catch (\Throwable $th) {
            //     # dd($th->getMessage());
            //     return redirect()->route('admin.user')->with('error', 'Create Data Rows fail!');
            // }
        else :
            return redirect()->route('admin.user');
        endif;
    }

    public function show($id)
    {
        $dec_id = Crypt::decryptString($id);

        $data['user'] = DB::table('users as u')
            ->where('status', '=', 1)
            ->where('id', '=', $dec_id)
            ->first();

        return view('console.page.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') :

            //validate form
            $this->validate($request, [
                'name'                  => 'required|unique:users,name',
                'school'                => 'required'
            ]);

            try {
                # get user
                $data_user = User::where([
                    'id'            => $id
                ])->first();

                $param_updates = [
                    'name'          => $request->name,
                    'school'        => $request->school,
                    'password'      => Hash::make($request->password),
                    'updated_at'    => now()
                ];

                DB::table('users')
                    ->where('id', $id)
                    ->update($param_updates);

                $data = 'Data Siswa Berhasil diubah';
                $type_with = 'success';

                return redirect()->route('admin.user')->with($type_with, $data);
            } catch (\Throwable $th) {
                # dd($th->getMessage());
                return redirect()->route('admin.user')->with('error', 'Data Siswa gagal diubah');
            }
        else :
            return redirect()->route('admin.user');
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

        return redirect(route('admin.user'))->with($type_with, $data);
    }
}
