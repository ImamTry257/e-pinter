<?php

namespace App\Http\Controllers\console\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __construct() {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // check data on table teachers
        $check_teacher = DB::table('teachers')
                        ->where('email', '=', $email)
                        ->where('password', '=', $password)
                        ->first();

        if ( empty($check_teacher) ) :
            $data = [
                'status'    => false,
                'data'      => '-',
                'message'   => 'Data not found'
            ];
        else :
            $data = [
                'status'    => false,
                'data'      => $check_teacher,
                'message'   => 'Success'
            ];
        endif ;

        return response()->json($data, 200);
    }

    public function register(Request $request)
    {
        try {
            // param
            $param = [
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => $request->password,
                'token'     => hash('sha256', $request->name.'-'.$request->email.'-'.date('YmdHis')),
                'status'    => 1,
                'created_at'=> now()
            ];

            // check email, prevent duplicate
            $check_email = DB::table('teachers')->where('email', '=', $request->email)->first();

            if ( !empty ( $check_email ) ) :
                $data = [
                    'status'    => false,
                    'data'      => '-',
                    'message'   => 'Email already registered'
                ];

                return response()->json($data, 200);
            else :

                // insert data on table teachers
                $insert_teacher = DB::table('teachers')
                                ->insert($param);

                if ( $insert_teacher ) :
                    $data = [
                        'status'    => true,
                        'data'      => $insert_teacher,
                        'message'   => 'Success'
                    ];
                else :
                    $data = [
                        'status'    => false,
                        'data'      => '-',
                        'message'   => 'Error'
                    ];
                endif ;
            endif ;
        } catch (\Throwable $th) {
            //throw $th;
            $data = [
                'status'    => false,
                'data'      => '-',
                'message'   => 'Error'
            ];
        }

        return response()->json($data, 200);
    }
}
