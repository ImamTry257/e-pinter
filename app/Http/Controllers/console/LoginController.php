<?php

namespace App\Http\Controllers\console;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('console.auth.login');
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
        try {
            $this->validate($request, [
                'email'     => 'required',
                'password'  => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            $data_body = [
                'email'     => $credentials['email'],
                'password'  => hash('sha256', $credentials['password'])
            ];

            $url = route('api.login');

            $request = Http::post($url, $data_body);
            $d_response = $request->body();
            // $status = $request->status();

            dd($d_response);

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }

        dd($credentials, $url);

        # step that running
        if (Auth::getProvider()->retrieveByCredentials($credentials)) {
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            dd($user);
            # check password
            $check_pass = Hash::check($request->password, $user->password);
            if ($check_pass) :
                try {
                    Auth::login($user);
                    $request->session()->regenerate();
                } catch (\Throwable $th) {
                    //throw $th;

                    dd($th->getMessage());
                }

                return redirect(url('dashboard'))
                    ->withSuccess('Signed in');
            endif;
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
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

    public function logout()
    {
        Auth::logout();
        return redirect(route('beranda'));
    }
}
