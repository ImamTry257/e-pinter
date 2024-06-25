<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // render forgot-password page
        return view('front.page.password.forgot-password');
    }

    public function generate_token_link(Request $request)
    {
        // check input email
        if ( $request->email == null ) :
            return redirect(route('forgot-password-student'))->with('error', 'Tolong isi email anda!');
        endif ;

        // check email is exists

    }

    public function success_send_link()
    {
        $data['title'] = 'Reset Password Successfully';

        return view('front.page.password.send-link-reset-password', $data);
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
