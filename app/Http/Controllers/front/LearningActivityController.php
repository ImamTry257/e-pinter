<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LearningActivityController extends Controller
{

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        # get data
        $data['list_data'] = DB::table('learning_activities as la')
            ->where('la.parent_id', '=', 0)
            ->get();

        return view('front.page.learning-activity.index', $data);
    }

    public function success()
    {
        return view('front.page.learning-activity.success');
    }

    public function get_answer(Request $request)
    {
        $user_id = Auth::user()->id;

        $data = DB::select("SELECT laa.`step_id`, laa.`question_id`, laa.`answer` FROM learning_activities_detail AS lad
            LEFT JOIN learning_activities_answer AS laa ON laa.`question_id` = lad.`id`
            WHERE laa.`step_id` = $request->step_id
            AND laa.`status` = 1
            AND laa.`created_by` = $user_id");

        return response()->json([
            'data' => $data,
            'status' => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()) :
            return response()->json([
                'status' => false
            ], 500);
        endif;

        $data_answer = json_decode($request['data_collect']);

        DB::beginTransaction();

        try {
            $data_insert = [];

            foreach ($data_answer as $key => $data) {
                $data_insert[] = [
                    'question_id'   => $data->id,
                    'answer'        => $data->answer,
                    'step_id'       => $data->step,
                    'status'        => 1,
                    'created_by'    => Auth::user()->id,
                    'created_at'    => now()
                ];
            }

            # check data
            $check_data = DB::table('learning_activities_answer as laa')
                ->where('laa.step_id', $data_answer[0]->step)
                ->where('laa.created_by', Auth::user()->id)
                ->count();

            if ($check_data != 0) :
                # change status old data
                DB::table('learning_activities_answer as laa')
                    ->where('laa.step_id', $data_answer[0]->step)
                    ->where('laa.created_by', Auth::user()->id)
                    ->update([
                        'status' => 0
                    ]);

            endif;

            # insert new data
            DB::table('learning_activities_answer')->insert($data_insert);

            DB::commit();

            return response()->json([
                'status' => true
            ], 200);
        } catch (\Throwable $th) {
            #throw $th;
            dd($th->getMessage());

            DB::rollBack();
            return response()->json([
                'status' => false
            ], 500);
        }
    }

    public function activity(Request $request, $slug)
    {
        # check slug is existing?
        $data['slug'] = $slug;

        # list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity($slug);

        $data['user'] = Auth::user();

        $parameter = [
            'user_id'               => Auth::user()->id,
            'user_group_id'         => $data['activity_selected']['user_group_id'],
            'activity_master_id'    => $data['activity_selected']['user_group_id'],
        ];

        # get data progress step detail
        $data['step_progress'] = DB::table('activity_step_progress as sp')
                                        ->join('activity_step as s', 's.id', '=', 'sp.activity_step_id')
                                        ->join('activity_step_detail as sd', 'sd.activity_progress_id', '=', 'sp.id')
                                        ->where($parameter)
                                        ->orderBy('activity_step_id', 'desc')
                                        ->get(['*']);

        # data user
        $data['activity_master_id'] = $parameter['activity_master_id'];
        # dd($data);

        # return view
        return view('front.page.learning-activity.list_activity', $data);
    }

    public function start(Request $request)
    {
        try {
            # dd($request->all());

            # param
            $parameter = [
                'user_id'           => $request['user_id'],
                'user_group_id'     => $request['user_group_id'],
                'activity_master_id'=> $request['activity_master_id'],
                'activity_step_id'  => $request['activity_step_id']
            ];

            # check data by param
            $data_step_progress = DB::table('activity_step_progress')
                                ->where($parameter)->first();

            if ( empty ( $data_step_progress ) ) :
                # new record
                $parameter['created_at'] = now();

                DB::table('activity_step_progress')
                    ->insert($parameter);
            else :
                # data update

                # update data into step progress
                DB::table('activity_step_progress')
                    ->where($parameter)
                    ->update(['updated_at' => now()]);

            endif ;

            $response = [
                'status'    => true,
                'message'   => 'Progress Berhasil disimpan!'
            ];

            $code = 200;
        } catch (\Throwable $th) {
            # throw $th;
            # dd($th->getMessage());
            $response = [
                'status'    => false,
                'message'   => 'Progress Gagal disimpan!'
            ];

            $code = 500;
        }

        return response()->json($response, $code);
    }


    public function introduction (Request $request, $slug)
    {
        $data['slug'] = $slug;

        # list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity(Auth::user()->user_group_id);

        # check validate url parameter slug dengan user_group_id
        if ( $slug != $data['activity_selected']['slug'] ) :
            return redirect(route('front.dashboard'));
        endif;

        $data['content'] = $this->getContentIntro($slug);

        $data['user'] = Auth::user();

        # return view
        return view('front.page.learning-activity.introduction_activity', $data);
    }

    public function nextProgress(Request $request)
    {
        try {
            # dd($request->all(), json_decode($request->answers));

            # set presentase
            $count_question = $request->count_question;
            $count_answer = 0;
            $data_answers = json_decode($request->answers);
            foreach ( $data_answers as  $answer) :
                if ( $answer->value_text != '' ) :
                    $count_answer++;
                endif ;
            endforeach ;

            # set presentase
            $detail_progress = ( $count_answer == $count_question ) ? 100 : ( ( $count_answer / $count_question ) * 100 );

            # dd($ins_answers);

            # update progress on step detail
            $parameter = [
                'activity_progress_id'  => $request->progress_id,
                'is_intro'              => $request->intro,
                'detail_progress'       => $detail_progress
            ];

            # set structure for string json to parameter answer
            if ( $request->intro ) : # for step introduction
                $sjson['type'] = 'intro';
                $sjson['presentase'] = 100;
                $sjson['value'] = $parameter['answers'];

                $parameter['answers'] = json_encode($sjson);

                $parameter['detail_progress'] = $sjson['presentase'];
            else :
                # set format answer for inserting data
                $ins_answers = [
                    'type'          => ( $request->intro == 0 ) ? 'non-intro' : 'intro',
                    'presentase'    => $detail_progress,
                    'value'         => $request->answers
                ];

                $parameter['answers'] = ( $request->intro ) ? 'intro_step' : json_encode($ins_answers);
            endif ;

            # check data
            $query_step_detail = DB::table('activity_step_detail as sd')
                                ->join('activity_step_progress as sp', 'sp.id', '=', 'sd.activity_progress_id')
                                ->join('activity_step as s', 's.id', '=', 'sp.activity_step_id')
                                ->where([
                                    'sd.activity_progress_id' => $request->progress_id,
                                    's.step_id' => $request->step_id
                                ]);
            $data_step_detail = $query_step_detail->first();

            # dd($data_step_detail, $request->all(),$parameter);

            if ( empty ( $data_step_detail ) ) :
                # new record
                $parameter['created_by'] = Auth::user()->id;
                $parameter['created_at'] = now();
                $parameter['updated_by'] = 0;

                // dd($parameter);
                DB::table('activity_step_detail')
                    ->insert($parameter);
            else :
                # data update
                $parameter['sd.updated_by'] = Auth::user()->id;
                $parameter['sd.updated_at'] = now();
                // dd($parameter);
                $query_step_detail->update($parameter);

            endif ;

            $response = [
                'status'    => true,
                'message'   => 'Progress Berhasil disimpan!'
            ];

            $code = 200;
        } catch (\Throwable $th) {
            #throw $th;
            dd($th->getMessage());
            $response = [
                'status'    => false,
                'message'   => 'Progress Gagal disimpan!'
            ];

            $code = 500;
        }

        # dd($parameter, $data_step_detail);
        return response()->json($response, $code);
    }

    public function step(Request $request, $slug, $step)
    {
        $data['slug'] = $slug;
        $data['step'] = $step;

        # list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity($slug);

        $path_view = 'front.page.learning-activity.gerak-lurus.step' . $step;

        if ( $slug == 'gerak-melingkar' ) :
            $path_view = 'front.page.learning-activity.gerak-melingkar.step' . $step;
        elseif ( $slug == 'gerak-parabola' ) :
            $path_view = 'front.page.learning-activity.gerak-parabola.step' . $step;
        endif ;

        $data['user'] = Auth::user();

        # get data progress activity
        $parameter = [
            'b.user_id'               => $data['user']->id,
            'b.user_group_id'         => $data['user']->user_group_id,
            'b.activity_master_id'    => $data['activity_selected']['user_group_id'],
        ];

        $progress_activity = DB::table('activity_step_progress as b')
                            ->join('activity_step as s', 's.id', '=', 'b.activity_step_id')
                            ->where($parameter)
                            ->where('s.step_id', '=', $step)
                            ->first(['b.id']);
        # dd($step);
        # check data
        if ( empty( $progress_activity ) ) :
            # new record to progress detail for new step

            # param
            $parameter = [
                'user_id'           => $data['user']->id,
                'user_group_id'     => $data['user']->user_group_id,
                'activity_master_id'=> $data['activity_selected']['user_group_id']
            ];

            # get step_id
            $data_step = DB::table('activity_step as s')
                        ->where('s.step_id', '=', $step)
                        ->first(['s.id']);

            $parameter['activity_step_id'] = $data_step->id;

            # check data by param
            $data_step_progress = DB::table('activity_step_progress')
                                ->where($parameter)->first();

            if ( empty ( $data_step_progress ) ) :
                # new record
                $parameter['created_at'] = now();

                $progress_id = DB::table('activity_step_progress')
                    ->insertGetId($parameter);

                $data['progress_id'] = $progress_id;
            else :
                # update data into step progress
                DB::table('activity_step_progress')
                    ->where($parameter)
                    ->update(['updated_at' => now()]);

                $data['progress_id'] = $data_step_progress->id;

            endif ;
        else :
            # set progress_id
            $data['progress_id'] = $progress_activity->id;
        endif ;

        # dd($data, $parameter, $progress_activity);

        return view($path_view, $data);
    }

    public function getContentIntro($slug)
    {
        $content = '<div class="col-lg-12 pb-3">
                            <h2 class="text-dark fw-bold">Pengantar Pembelajaran 1<br/>
                                Gerak Lurus</h2>
                        </div>

                        <div class="col-lg-12 pb-1">
                            <span>Pada kegiatan pembelajaran 1, kita akan:</span>
                            <ol>
                                <li>Materi Fisika yang akan dibahas adalah GLB dan GLBB</li>
                                <li>Menggunakan model pembelajaran E-PINTER yang telah dikembangkan</li>
                                <li>Menggunakan software Tracker untuk mendukung kegiatan pembelajaran</li>
                                <li>Membuat proyek secara kelompok</li>
                                <li>Membuat laporan kegiatan fisika</li>
                            </ol>
                        </div>

                        <div class="col-lg-12">
                            <span>Sehingga tagihan yang harus diunggah pada kegiatan ini adalah:</span>
                            <ol>
                                <li>Video proyek gerak lurus</li>
                                <li>Foto langkah-langkah eksperimen menggunakan software Tracker beserta keterangannya</li>
                                <li>Laporan</li>
                            </ol>
                        </div>';

        if (  $slug == 'gerak-parabola' ) :
           $content = '
                <div class="col-lg-12 pb-3">
                    <h2 class="text-dark fw-bold">Pengantar Pembelajaran 2<br/>
                        Gerak Parabola</h2>
                </div>

                <div class="col-lg-12 pb-1">
                    <span>Pada kegiatan pembelajaran 2, kita akan:</span>
                    <ol>
                        <li>Materi Fisika yang akan dibahas adalah Gerak Parabola</li>
                        <li>Menggunakan model pembelajaran E-PINTER yang telah dikembangkan</li>
                        <li>Menggunakan software Tracker untuk mendukung kegiatan pembelajaran</li>
                        <li>Membuat proyek secara kelompok</li>
                        <li>Membuat laporan kegiatan fisika</li>
                    </ol>
                </div>

                <div class="col-lg-12">
                    <span>Sehingga tagihan yang harus diunggah pada kegiatan ini adalah:</span>
                    <ol>
                        <li>Video proyek gerak parabola</li>
                        <li>Foto langkah-langkah eksperimen menggunakan software Tracker beserta keterangannya</li>
                        <li>Laporan</li>
                    </ol>
                </div>
            ';
        elseif (  $slug == 'gerak-melingkar' ) :
           $content = '
                <div class="col-lg-12 pb-3">
                    <h2 class="text-dark fw-bold">Pengantar Pembelajaran 3<br/>
                        Gerak Melingkar</h2>
                </div>

                <div class="col-lg-12 pb-1">
                    <span>Pada kegiatan pembelajaran 3, kita akan:</span>
                    <ol>
                        <li>Materi Fisika yang akan dibahas adalah Gerak Melingkar</li>
                        <li>Menggunakan model pembelajaran E-PINTER yang telah dikembangkan</li>
                        <li>Menggunakan software Tracker untuk mendukung kegiatan pembelajaran</li>
                        <li>Membuat proyek secara kelompok</li>
                        <li>Membuat laporan kegiatan fisika</li>
                    </ol>
                </div>

                <div class="col-lg-12">
                    <span>Sehingga tagihan yang harus diunggah pada kegiatan ini adalah:</span>
                    <ol>
                        <li>Video proyek gerak melingkar</li>
                        <li>Foto langkah-langkah eksperimen menggunakan software Tracker beserta keterangannya</li>
                        <li>Laporan</li>
                    </ol>
                </div>
            ';
        endif ;
        return $content;
    }
}
