<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // list learning activity
        $data['list_activity'] = [
            [
                'title' => 'Gerak Lurus',
                'slug'  => 'gerak-lurus',
                'image' => 'list-kinematika-pemb1.svg'
            ],
            [
                'title' => 'Gerak Parabola',
                'slug'  => 'gerak-parabola',
                'image' => 'list-kinematika-pemb2.svg'
            ],
            [
                'title' => 'Gerak Melingkar',
                'slug'  => 'gerak-melingkar',
                'image' => 'list-kinematika-pemb3.svg'
            ]
        ];

        return view('front.page.dashboard.index', $data);
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
