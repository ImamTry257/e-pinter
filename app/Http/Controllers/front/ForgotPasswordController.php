<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\SendEmailForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $email_to = $request->email;
        if ( $email_to == null ) :
            return redirect(route('forgot-password-student'))->with('error', 'Silakan isi email anda!');
        endif ;

        // check email is exists
        $user_exists = DB::table('users')->where(['email' => $email_to])->first();

        if ( empty ( $user_exists) ) :
            return redirect(route('forgot-password-student'))->with('error', 'Email anda tidak terdaftar');
        endif ;

        $enc_email = Crypt::encryptString($email_to);
        // dd($email_to);
        Mail::to('imemuhiu@gmail.com')->send(new SendEmailForgotPassword($email_to, $enc_email));

        return redirect(route('forgot-password-student'))->with('success', 'Link Lupa Password berhasil dikirim. Silakan check email Anda');
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
