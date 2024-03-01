<?php

namespace App\Http\Controllers\console;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SainsInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('console.page.sains-info.index');
    }

    public function getSainsInfo(Request $request)
    {
        if ($request->ajax()) :
            $data = Content::where('content_type', 'sains_info')
                ->where('status', '=', 1)
                ->orderByDesc('created_at')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.sains-info.edit', ['id' => $row->id]) . '" class="edit btn bg-console text-dark btn-sm">Ubah</a> <a href="" class="delete btn btn-danger btn-sm delete-content" id="' . $row->id . '">Hapus</a>';
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
        return view('console.page.sains-info.add');
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
                'content_type'  => 'sains_info',
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

            $data = 'Data Sains Info Berhasil ditambahkan';
            $type_with = 'success';

            return redirect()->route('admin.sains-info')->with($type_with, $data);
        } catch (\Throwable $th) {
            //throw $th;
            # dd($th->getMessage());
            $data = 'Gagal simpan sains info';
            $type_with = 'error';

            return redirect()->route('admin.sains-info.add');
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
        $data_sains_info = Content::where([
            'id'            => $id,
            'content_type'  => 'sains_info'
        ])->first();

        $data['sains_info'] = null;
        if (!empty($data_sains_info)) :
            $data['sains_info'] = $data_sains_info;
        endif;

        return view('console.page.sains-info.edit', $data);
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
                'content_type'  => 'sains_info'
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
                'content_type'  => 'sains_info',
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

            $data = 'Data Sains Info Berhasil diubah';
            $type_with = 'success';

            return redirect()->route('admin.sains-info')->with($type_with, $data);
        } catch (\Throwable $th) {
            //throw $th;
            # dd($th->getMessage());
            $data = 'Gagal ubah sains info';
            $type_with = 'error';

            return redirect()->route('admin.sains-info.edit', ['id' => $id]);
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
                'status' => 0
            ]);

        $data = 'Data Sains Info Berhasil dihapus';
        $type_with = 'success';

        return redirect(route('admin.sains-info'))->with($type_with, $data);
    }
}
