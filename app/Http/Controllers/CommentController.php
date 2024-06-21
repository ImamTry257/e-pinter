<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function list(Request $request)
    {
        # check is access via front page
        // $where = ['cm.user_id' => $request->user_id];
        // if ( $request->is_from_front == 0 ) :
        //     $where = ['cm.created_by' => Session::get('data_user_login')->id];
        // endif ;

        # get data list comment
        $res_json = $this->getComment($request->progress_id, $request->user_id_login, false);

        return $res_json;
    }

    public function getComment($progress_id, $user_id_login, $is_after_submit)
    {
        $get_list_comment = DB::table('comment_master as cm')
            ->where('cm.activity_progress_id', '=', $progress_id)
            ->orderBy('cm.created_at', 'asc')
            ->get();

        # set response
        $res_json = [
            'status'    => false,
            'data'      => [],
            'list_id'   => [],
            'count'     => 0
        ];
        if ( count ( $get_list_comment ) != 0 ) :
            # binding data to html
            $id_list = [];
            $last_comment = 0;

            $html_list_comment = '<div id="parent-list-comment"></div><div id="list-comment" style="height: 400px; width: 100%; overflow: scroll;">';
            foreach ( $get_list_comment as $index => $comment ) :
                # get created name
                if ( $comment->commented_from == 'backoffice' ) :
                    $data_created = DB::table('teachers')->where('id', '=', $comment->created_by)->first(['name']);
                    $color_icon = '#00BC29';
                    $is_left = true;
                    $is_right = false;
                    $is_class_end = '';
                else :
                    $data_created = DB::table('users')->where('id', '=', $comment->created_by)->first(['name']);
                    $color_icon = '#004972';
                    $is_left = true;
                    $is_right = false;
                    $is_class_end = '';
                endif;

                # get data comment child
                $html_list_comment .= '<div class="col-12 row">';

                if ( $is_left ) :
                $html_list_comment .= '<div class="col-1">
                                            <div class="d-flex justify-content-center" style="">
                                                <div style="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" style="background: ' . $color_icon . ';padding: 10px;border-radius: 30px;width: 34px;" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                                </div>
                                            </div>
                                        </div>';
                endif;
                $html_list_comment .= '<div class="col-11 '. $is_class_end .'" id="wrapper-data-comment">
                                                <div class="content-comment2">
                                                    <div id="created_by-comment" class=""><b>' . $data_created->name . '</b></div>
                                                    <div id="crated_at-comment" class="pb-1" style="font-size: 10px;">'. $this->convertToTimeAgo($comment->created_at) .'</div>
                                                    <div id="desc-comment" class="pb-3">' . $comment->content . '</div>

                                                    <div class="d-none">'. $this->getChildComment($comment->id, $index, $user_id_login)['html'] .'</div>
                                                </div>
                                            </div>';

                if ( $is_right ) :
                $html_list_comment .= '<div class="col-1">
                                            <div class="d-flex justify-content-center" style="">
                                                <div style="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" style="background: ' . $color_icon . ';padding: 10px;border-radius: 30px;width: 34px;" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                                </div>
                                            </div>
                                        </div>';
                endif;
                $html_list_comment .= '</div>';
                $id_list [] = $this->getChildComment($comment->id, $index, $user_id_login)['list_id'];

                $last_comment = $comment->id;
            endforeach ;

            $html_list_comment .= '</div>';
            if ( !$is_after_submit ) :
                // $html_list_comment .= '<div class="col-12 row">
                //                 <div class="col-11">
                //                     <div id="replay-comment" class="pt-3">
                //                         <div class="" id="">
                //                             <input type="hidden" name="user_id_login" value="' . $user_id_login . '">
                //                             <input type="hidden" name="comment_master_id" value="'. $last_comment .'">
                //                             <input type="hidden" name="progress_id" value="'. $progress_id .'">
                //                             <textarea name="comment" class="form-control" id="comment" cols="30" rows="2" placeholder="Tulis komentar Balasa Anda"></textarea>
                //                         </div>
                //                         <div class="text-left col-12 mt-3">
                //                             <a href="javascript:void(0);" id="submit-comment" onclick="submitCommentMaster()" class="btn btn-information text-white px-5">Kirim</a>
                //                         </div>
                //                     </div>
                //                 </div>
                //             </div>';

            endif ;

            $res_json = [
                'status'    => true,
                'data'      => $html_list_comment,
                'list_id'   => $id_list,
                'count'     => count ( $get_list_comment ),
                'is_after_submit' => $is_after_submit
            ];
        endif ;

        return $res_json;
    }

    public function getChildComment($content_master_id, $index, $user_id_login)
    {
        $html_cc = '';
        $list_id_text = [];
        if ( $content_master_id != 0 ) :
            $child_comments = DB::table('comment_detail as cd')
            ->where('cd.content_master_id', '=', $content_master_id)
            ->orderBy('cd.created_at', 'asc')
            ->get();

            if ( count ( $child_comments ) !=  0 ) :

                foreach ( $child_comments as $cc ) :
                    $html_cc .= '<div class="col-12 row" id="replay-child-comment">
                                    <div class="col-1">
                                        <div class="d-flex justify-content-center" style="">
                                            <div style="">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="background: #004972;padding: 10px;border-radius: 30px;width: 34px;" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11" id="wrapper-data-comment">
                                        <div class="content-comment1">
                                            <div id="created_by-comment" class=""><b>' . $cc->created_by . '</b></div>
                                            <div id="crated_at-comment" class="pb-1" style="font-size: 10px;">'. $this->convertToTimeAgo($cc->created_at) .'</div>
                                            <div id="desc-comment" class="pb-3">' . $cc->content . '</div>
                                        </div>
                                    </div>
                                </div>';
                endforeach ;

                $html_cc .= '<div class="col-12 row">
                                <div class="col-1"></div>
                                <div class="col-11">
                                    <div id="replay-comment" class="pt-3">
                                        <div class="" id="">
                                            <input type="hidden" name="user_id_login" value="' . $user_id_login . '">
                                            <input type="hidden" name="comment_master_id" value="'. $content_master_id .'">
                                            <textarea name="input-replay-comment-child-' . $index . '" class="form-control" id="input-replay-comment-child-' . $index . '" cols="30" rows="2" placeholder="Tulis komentar Balasa Anda"></textarea>
                                        </div>
                                        <div class="text-left col-12 mt-3">
                                            <a href="javascript:void(0);" id="submit-comment" onclick="submitCommentChild()" class="btn btn-information text-white px-5">Kirim</a>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                $list_id_text [] = 'input-replay-comment-child-' . $index;

            endif ;
        endif ;

        return [
            'html'      => $html_cc,
            'list_id'   => $list_id_text
        ];
    }

    public function store_master(Request $request)
    {
        try {
            # set param comment
            $param_comment = [
                'activity_progress_id'  => $request->progress_id,
                'content'               => $request->content,
                'user_id'               => 0,
                'teacher_id'            => 0,
                'commented_from'        => ( $request->is_from_bo == 1 ) ? 'backoffice' : 'frontoffice',
                'created_by'            => $request->user_login,
                'created_at'            => now()
            ];

            DB::table('comment_master')
            ->insert($param_comment);

            # get new list data
            $res_json = $this->getComment($request->progress_id, $request->user_login, true);

            return response()->json($res_json);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status'    => false,
                'data'      => [],
                'error_m'   => $th->getMessage()
            ]);
        }
    }

    public function store_child(Request $request)
    {
        try {
            $content_master_id = $request->comment_master_id;

            # check parent id
            $check_parent = DB::table('comment_detail')
            ->where('content_master_id', '=', $content_master_id)
            ->orderByDesc('created_by')
            ->first();

            # set param comment
            $param_comment = [
                'content_master_id'     => $content_master_id,
                'parent_id'             => ( $check_parent == null ) ? 0 : $check_parent->id,
                'content'               => $request->content,
                'replayed_by'           => $request->user_login,
                'created_by'            => $request->user_login,
                'created_at'            => now()
            ];

            # dd($param_comment);
            DB::table('comment_detail')
            ->insert($param_comment);

            # get new list data
            $res_json = $this->getComment($request->progress_id, $request->user_login, true);

            return response()->json($res_json);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status'    => false,
                'data'      => [],
                'error_m'   => $th->getMessage()
            ]);
        }
    }

    public function convertToTimeAgo($date)
    {
        $timestamp = strtotime($date);

        $strTime = array("detik", "menit", "jam", "hari", "bulan", "tahun");
        $length = array("60","60","24","30","12","10");

        $currentTime = time();
        if($currentTime >= $timestamp) {
            $diff     = time() - $timestamp;
            for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                $diff = $diff / $length[$i];
            }

            // dd($i);
            $diff = round($diff);
            return $diff . " " . $strTime[$i] . " yang lalu ";
        }
    }

    public function detail(Request $request)
    {
        dd($request->all());
    }
}
