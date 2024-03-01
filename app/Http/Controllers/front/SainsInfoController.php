<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SainsInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('front.page.sains-info.index');
    }

    public function detail($slug)
    {
        # get all content sains info
        $data['all_sains_info'] = Content::where('status', '=', 1)
            ->where('content_type', 'sains_info')
            ->orderByDesc('created_at')
            ->get();

        # get specific sains info
        $data['latest_sains_info'] = Content::where('status', '=', 1)
            ->where('slug', 'LIKE', '%' . $slug . '%')
            ->orderByDesc('created_at')
            ->first();

        if (empty($data['latest_sains_info'])) :
            return redirect(route('sains-info.index'));
        endif;

        $id_current = $data['latest_sains_info']->id;

        # prev content
        $data['prev'] = $this->check_existing_data(($id_current - 1), 'based_id');

        # get other sains info
        $data['other_sains_info'] = $this->check_existing_data(($id_current + 2), 'based_id');

        # next content
        $data['next'] = $this->check_existing_data(($id_current + 1), 'based_id');

        return view('front.page.sains-info.detail', $data);
    }

    public function check_existing_data($id, $type)
    {
        $content = Content::where('status', '=', 1)
            ->where('id', $id)
            ->first(['slug', 'title', 'images', 'descriptions']);

        if (empty($content)) :

            $content = Content::where('status', '=', 1)
                ->orderBy('id', 'asc')
                ->first(['slug', 'title', 'images', 'descriptions']);
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
