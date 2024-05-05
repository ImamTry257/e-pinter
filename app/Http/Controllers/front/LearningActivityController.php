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
            //throw $th;
            dd($th->getMessage());

            DB::rollBack();
            return response()->json([
                'status' => false
            ], 500);
        }
    }

    public function activity(Request $request, $slug)
    {
        // check slug is existing?
        $data['slug'] = $slug;

        // list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity(Auth::user()->user_group_id);

        // check validate url parameter slug dengan user_group_id
        if ( $slug != $data['activity_selected']['slug'] ) :
            return redirect(route('front.dashboard'));
        endif;

        $data['user'] = Auth::user();

        // get data progress step detail
        $data['step_progress_detail'] = DB::table('activity_step_detail')
                                        ->where('user_group_id', $data['user']->user_group_id)
                                        ->get();

        // dd($data);

        // return view
        return view('front.page.learning-activity.list_activity', $data);
    }


    public function introduction (Request $request, $slug)
    {
        $data['slug'] = $slug;

        // list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity(Auth::user()->user_group_id);

        // check validate url parameter slug dengan user_group_id
        if ( $slug != $data['activity_selected']['slug'] ) :
            return redirect(route('front.dashboard'));
        endif;

        $data['content'] = $this->getContentIntro($slug);

        $data['user'] = Auth::user();

        // return view
        return view('front.page.learning-activity.introduction_activity', $data);
    }

    public function nextProgress(Request $request)
    {
        // dd($request->all());

        // update progress on step detail
        $parameter = [
            'user_group_id'         => $request->user_group_id,
            'activity_master_id'    => $request->activity_master_id,
            'activity_step_id'      => ( $request->intro ) ? 1 : $request->activity_step_id,
            'answers'               => ( $request->intro ) ? 'intro_step' : $request->answer,
            'detail_progress'       => $request->detail_progress,
            'created_by'            => Auth::user()->id,
            'created_at'            => now()
        ];

        // set structure for string json to parameter answer
        if ( $request->intro ) :
            $sjson['type'] = 'intro';
            $sjson['presentase'] = 100;
            $sjson['value'] = $parameter['answers'];

            $parameter['answers'] = json_encode($sjson);

            $parameter['detail_progress'] = $sjson['presentase'];
        else :

        endif ;

        // check data
        $data_step_detail = DB::table('activity_step_detail')
                            ->where([
                                'user_group_id' => $parameter['user_group_id'],
                                'activity_master_id' => $parameter['activity_master_id'],
                                'activity_step_id' => $parameter['activity_step_id']
                            ])->first();

        try {
            if ( empty ( $data_step_detail ) ) :
                // new record
                $parameter['updated_by'] = 0;

                DB::table('activity_step_detail')
                    ->insert($parameter);
            else :
                // data update
                $parameter['updated_by'] = Auth::user()->id;
                $parameter['updated_at'] = now();

                DB::table('activity_step_detail')
                    ->where([
                        'user_group_id' => $parameter['user_group_id'],
                        'activity_master_id' => $parameter['activity_master_id'],
                        'activity_step_id' => $parameter['activity_step_id']
                    ])
                    ->update($parameter);

            endif ;

            $response = [
                'status'    => true,
                'message'   => 'Progress Berhasil disimpan!'
            ];

            $code = 200;
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            $response = [
                'status'    => false,
                'message'   => 'Progress Gagal disimpan!'
            ];

            $code = 500;
        }

        // dd($parameter, $data_step_detail);
        return response()->json($response, $code);
    }

    public function step(Request $request, $slug, $step)
    {
        $data['slug'] = $slug;
        $data['step'] = $step;

        // list learning activity selected
        $data['activity_selected'] = $this->getContentListActivity(Auth::user()->user_group_id);

        // check validate url parameter slug dengan user_group_id
        if ( $slug != $data['activity_selected']['slug'] ) :
            return redirect(route('front.dashboard'));
        endif;

        $path_view = 'front.page.learning-activity.gerak-lurus.step' . $step;

        if ( $slug == 'gerak-melingkar' ) :
            $path_view = 'front.page.learning-activity.gerak-melingkar.step' . $step;
        elseif ( $slug == 'gerak-parabola' ) :
            $path_view = 'front.page.learning-activity.gerak-parabola.step' . $step;
        endif ;

        $data['user'] = Auth::user();

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
