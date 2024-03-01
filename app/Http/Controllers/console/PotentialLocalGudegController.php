<?php

namespace App\Http\Controllers\console;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PotentialLocalGudegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('console.page.potential.index');
    }

    public function getPotential(Request $request)
    {
        if ($request->ajax()) :
            $data = Content::where('content_type', 'potential')
                ->where('status', '=', 1)
                ->orderByDesc('created_at')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.potential.edit', ['id' => $row->id]) . '" class="edit btn bg-console text-dark btn-sm">Ubah</a> <a href="" class="delete btn btn-danger btn-sm delete-content" id="' . $row->id . '">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'descriptions'])
                ->make(true);
        endif;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('console.page.potential.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'images'        => 'required',
            'descriptions'  => 'required'
        ]);

        try {
            # set destination for upload image
            $dest_path = public_path('website/images/upload/');
            $file = $request->file('images');

            $file_new = 'default.png';

            # check file
            if ($file != null) :
                # set name file image
                $file_new = date('YmdHis') . '_' . $file->getClientOriginalName();
                $file->move($dest_path, date('YmdHis') . '_' . $file->getClientOriginalName());
            endif;

            $set_slug = explode(' ', strtolower($request->title));
            $slug = implode('-', $set_slug);

            $param_insert = [
                'title'         => $request->title,
                'content_type'  => 'potential',
                'slug'          => $slug,
                'is_headline'   => 0,
                'status'        => 1,
                'images'        => $file_new,
                'descriptions'  => $request->descriptions,
                'count_readed'  => 0,
                'created_by'    => Auth::user()->id,
                'created_at'    => now()
            ];

            Content::create($param_insert);

            $data = 'Data Potensial Gudeg Lokal Berhasil ditambahkan';
            $type_with = 'success';

            return redirect()->route('admin.potential')->with($type_with, $data);
        } catch (\Throwable $th) {
            //throw $th;
            # dd($th->getMessage());
            $data = 'Gagal simpan Potensial Gudeg Lokal';
            $type_with = 'error';

            return redirect()->route('admin.potential.add');
        }
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
        # get content
        $data_potential = Content::where([
            'id'            => $id,
            'content_type'  => 'potential'
        ])->first();

        $data['potential'] = null;
        if (!empty($data_potential)) :
            $data['potential'] = $data_potential;
        endif;

        return view('console.page.potential.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        # dd($request->all());
        $request->validate([
            'title'         => 'required|string|max:255',
            'descriptions'  => 'required'
        ]);

        try {
            # get content
            $data_sains_info = Content::where([
                'id'            => $id,
                'content_type'  => 'potential'
            ])->first();

            $file_new = $data_sains_info->images; # old file images

            # set destination for upload image
            $dest_path = public_path('website/images/upload/');
            $file = $request->file('images');

            # check file
            if ($file != null) :
                # set name file image
                $file_new = date('YmdHis') . '_' . $file->getClientOriginalName();
                $file->move($dest_path, date('YmdHis') . '_' . $file->getClientOriginalName());
            endif;

            $set_slug = explode(' ', strtolower($request->title));
            $slug = implode('-', $set_slug);

            $status = 0;
            if ($request->status != null) :
                $status = ($request->status == 'on') ? 1 : 0;

            endif;

            $param_updates = [
                'title'         => $request->title,
                'content_type'  => 'potential',
                'slug'          => $slug,
                'is_headline'   => 0,
                'status'        => 1,
                'images'        => $file_new,
                'descriptions'  => $request->descriptions,
                'count_readed'  => 0,
                'created_by'    => Auth::user()->id,
                'updated_at'    => now()
            ];

            DB::table('contents')
                ->where('id', $id)
                ->update($param_updates);

            $data = 'Data Potensial Gudeg Lokal Berhasil diubah';
            $type_with = 'success';

            return redirect()->route('admin.potential')->with($type_with, $data);
        } catch (\Throwable $th) {
            //throw $th;
            # dd($th->getMessage());
            $data = 'Gagal ubah Potensial Gudeg Lokal';
            $type_with = 'error';

            return redirect()->route('admin.potential.edit', ['id' => $id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        DB::table('contents as c')
            ->where('c.id', '=', $id)
            ->update([
                'c.status' => 0
            ]);

        $data = 'Data Potensial Gudeg Lokal Berhasil dihapus';
        $type_with = 'success';

        return redirect(route('admin.potential'))->with($type_with, $data);
    }
}
