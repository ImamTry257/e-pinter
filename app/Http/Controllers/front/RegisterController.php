<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('front.page.register.index');
    }

    public function store(Request $request)
    {

        if ($request->method() == 'POST') :
            //validate form
            $this->validate($request, [
                'username'              => 'required|unique:users,name',
                'password'              => 'required|confirmed',
                'password_confirmation' => 'required',
                // 'school'                => 'required'
            ]);

            try {
                DB::table('users')
                    ->insert([
                        'name' => $request->username,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        // 'school' => $request->school,
                        // 'type'  => 'siswa',
                        // 'status' => 1,
                        // 'created_by' => 0
                    ]);

                return redirect()->route('register.success');
            } catch (\Throwable $th) {
                # dd($th->getMessage());
                return redirect()->route('register')->with('error', 'Create Data Rows fail!');
            }
        else :
            return redirect()->route('register');
        endif;
    }

    public function success()
    {
        $data['title'] = 'Registration completed successfully';

        return view('front.page.register.success_v2', $data);
    }
}
