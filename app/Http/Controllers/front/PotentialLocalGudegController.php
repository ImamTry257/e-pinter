<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class PotentialLocalGudegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        # get all data potensital gudeg lokal
        $data['gudeg_local'] = Content::where('status', 1)
            ->where('content_type', 'potential')
            ->get();

        return view('front.page.potential.index', $data);
    }

    public function detail($slug)
    {
        # get all data potensital gudeg lokal
        $data['all_gudeg_local'] = Content::where('status', 1)
            ->where('content_type', 'potential')
            ->get();

        # get specific data potensital gudeg lokal
        $data['gudeg_local'] = Content::where('status', 1)
            ->where('content_type', 'potential')
            ->where('slug', 'LIKE', '%' . $slug . '%')
            ->first();

        if (empty($data['gudeg_local'])) :
            return redirect(route('potential.index'));
        endif;

        # get other sains info
        $id_current = $data['gudeg_local']->id;
        $data['other_gudeg_local'] = $this->check_existing_data(($id_current + 1), count ( $data['all_gudeg_local'] ));

        return view('front.page.potential.detail', $data);
    }

    public function check_existing_data($id, $count)
    {
        $content = Content::where('status', '=', 1)
            ->where('id', $id)
            ->where('content_type', 'potential')
            ->first(['slug', 'title', 'images', 'descriptions']);

        if (empty($content)) :

            $content = Content::where('status', '=', 1)
                ->orderBy('id', 'asc')
                ->where('content_type', 'potential')
                ->get(['slug', 'title', 'images', 'descriptions'])[3];
        endif;

        return $content;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
