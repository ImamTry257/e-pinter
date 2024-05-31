<?php

namespace App\Http\Controllers\console;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('console.auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        # return redirect()->route('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name'                  => 'required|unique:teachers,name',
            'email'                 => 'required',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        try {
            DB::table('teachers')
                ->insert([
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'password'  => Hash('sha256', $request->password),
                    'token'     => Hash('sha256', $request->name . '_' . $request->email),
                    'status' => 1,
                    'created_at' => now()
                ]);

            return redirect()->route('login.admin.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->route('register.admin.index')->with('error', 'Create Data Admin fail!');
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
