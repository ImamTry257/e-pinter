<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionnaireController extends Controller
{
    public function index($page)
    {
        $user_id = Auth::user()->id;

        # get page
        $data['current_page'] = $page;

        # get data by page and user_id
        $data['data_questionniare'] = DB::table('questionniare_master as qm')
            ->where('qm.page', '=', $page)
            ->orderBy('qm.number', 'asc')
            ->get(['qm.number', 'qm.number_string', 'qm.description', 'qm.id']);

        # check data
        $count_questionniare = count ( $data['data_questionniare'] );

        $data['user_answer'] = DB::table('questionniare_master as qm')
        ->leftJoin('questionniare_user_answer as qua', 'qua.questionniare_master_id', '=', 'qm.id')
        ->where('qm.page', '=', $page)
        ->where('qua.user_id', '=', $user_id)
        ->orderBy('qm.number', 'asc')
        ->get(['qm.number', 'qua.answer']);

        # get user answer
        $list_answer = [];
        if ( count ( $data['user_answer'] ) != 0 ) :
            foreach ( $data['user_answer'] as $ua ) :
                $list_answer [$ua->number] = $ua->answer;
            endforeach ;
        endif ;
        $data['list_answer'] = $list_answer;

        # get max page
        $data['max_page'] = DB::table('questionniare_master as qm')
        ->max('qm.page');

        # check page is valid
        if ( $page > $data['max_page'] && $count_questionniare != 0 ) :
            return redirect(route('questionnaire', ['page' => 1]));
        endif;

        # check is valid for kuisioner
        $data['is_valid'] = $count_questionniare;

        # dd($data);

        return view('front.page.questionnaire.index', $data);
    }

    public function store(Request $request)
    {
        try {
            # dd($request->all());

            # get questionniare master id
            $q_m_id = DB::table('questionniare_master')
            ->where([
                'page'      => $request->current_page,
                'number'    => $request->number
            ])->first(['id']);

            # check data user answer
            $user_answer = DB::table('questionniare_user_answer');
            $query_check = $user_answer->where([
                'user_id'                   => Auth::user()->id,
                'questionniare_master_id'   => $q_m_id->id
            ])->first();

            # set param
            $param = [
                'user_id'                   => Auth::user()->id,
                'questionniare_master_id'   => $q_m_id->id,
                'answer'                    => $request->answer,
                'answer_code'               => $request->answer_code,
                'is_answered'               => 1,
            ];

            $res_json = [];
            if ( empty ( $query_check ) ) :
                # new record
                $param['created_by']            = Auth::user()->id;
                $param['updated_by']            = 0;
                $param['created_at']            = now();

                DB::table('questionniare_user_answer')->insert($param);

                $message = 'Jawaban kuisioner berhasil disimpan';
            else :
                # update data
                $param['updated_by']            = Auth::user()->id;
                $param['updated_at']            = now();

                $user_answer->update($param);

                $message = 'Jawaban kuisioner berhasil diubah';
            endif ;

            $res_json = [
                'status'    => true,
                'message'   => $message
            ];
        } catch (\Throwable $th) {
            # dd($th->getMessage());
            $res_json = [
                'status'    => false,
                'message'   => 'Internal Server Error'
            ];
        }
        # dd($param);

        return response()->json($res_json);
    }
}
