<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class QuestionController extends Controller
{
    public function index($questionNo)
    {
        $duration = 30 * 60;
        $ex = [
                [
                    "value_key"     => "A",
                    "value_text"    => "perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan"
                ],
                [
                    "value_key"     => "B",
                    "value_text"    => "Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya"
                ],
                [
                    "value_key"     => "C",
                    "value_text"    => "Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja"
                ],
                [
                    "value_key"     => "D",
                    "value_text"    => "Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula"
                ],
                [
                    "value_key"     => "E",
                    "value_text"    => "Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda"
                ]
        ];

        # get data selected question and question of user answer
        $data['question_and_answer'] = DB::table('question_master as qm')
                            ->leftJoin('question_answer_user as qau', 'qau.question_master_id', '=', 'qm.id')
                            ->where('qm.number', '=', $questionNo)->first();

        if ( empty( $data['question_and_answer'] ) ) :
            return redirect(route('front.dashboard'));
        endif ;

        # dd($data);

        # # inject data
        # DB::table('question_master')->insert($this->getListParam());
        # # dd($this->getListParam());
        # dd(gmdate('H:i:s', $duration), $duration);

        # $question_no = [];
        # for ( $i = 1; $i <= 30; $i++ ) :
        #     $question_no [] = $i;
        # endfor;

        # question number
        # for left side
        $data['q_no_left'] = [1, 4, 7, 10, 13, 16, 19, 22, 25, 28];

        # for center side
        $data['q_no_center'] = [2, 5, 8, 11, 14, 17,  20, 23, 26, 29];

        # for right side
        $data['q_no_right'] = [3, 6, 9, 12, 15, 18, 21, 24, 27, 30];

        $data['question_no_selected'] = $questionNo;

        return view('front.page.question.index', $data);
    }

    public function getListParam()
    {
        $paramater = [
            [
                'number'        => 4,
                'description'  => 'Suatu objek bermassa 500 gram dilemparkan pada sebuah lubang tambang. Objek tersebut dilemparkan ke dalam dengan kecepatan awal 6 m/s. Objek mampu mencapai dasar lubang setelah waktu 3 detik. <br/> Pernyataan berikut yang sesuai dengan deskripsi objek tersebut adalah ….',
                'options'       => json_encode([
                    [
                        "value_key"     => "A",
                        "value_text"    => "kecepatan objek saat mencapai dasar lubang sebesar 36 m/s"
                    ],
                    [
                        "value_key"     => "B",
                        "value_text"    => "objek mengalami kecepatan yang konstan selama perjalanan menuju dasar lubang"
                    ],
                    [
                        "value_key"     => "C",
                        "value_text"    => "kecepatan objek saat mencapai dasar lubang sebesar 30 m/s"
                    ],
                    [
                        "value_key"     => "D",
                        "value_text"    => "kecepatan objek semakin berkurang selama perjalanan menuju dasar lubang"
                    ],
                    [
                        "value_key"     => "E",
                        "value_text"    => "objek tidak mengalami percepatan"
                    ]
                ]),
                'options_with_reason'   => json_encode([
                    [
                        "value_key"     => "A",
                        "value_text"    => "kecepatan awal tidak mempengaruhi kecepatan akhir saat mencapai dasar"
                    ],
                    [
                        "value_key"     => "B",
                        "value_text"    => "percepatan gravitasi berubah-ubah sehingga kecepatan akhir saat mencapai dasar tidak dapat ditentukan"
                    ],
                    [
                        "value_key"     => "C",
                        "value_text"    => "percepatan gravitasi menyebabkan benda yang bergerak vertikal ke bawah mengalami pertambahan kecepatan"
                    ],
                    [
                        "value_key"     => "D",
                        "value_text"    => "percepatan gravitasi tidak mempengaruhi dalam penentuan kecepatan akhir saat mencapai dasar"
                    ],
                    [
                        "value_key"     => "E",
                        "value_text"    => "kecepatan awal semakin besar ketika benda bergerak vertical ke bawah ke bawah"
                    ]
                ]),
                'status'        => 1,
                'created_by'    => 1,
                'updated_by'    => 0,
                'created_at'    => now()
            ],
            # 5
            [
                'number'        => 5,
                'description'  => 'Sebuah partikel bergerak dengan kecepatan konstan 12 m/s, kemudian partikel diperlambat sampai berhenti. Setelah 1,5 detik semenjak diperlambat partikel kecepatannya berkurang menjadi 7,5 m/s dan partikel berhenti tepat 4 detik semenjak diperlambat. <br/> Pernyataan berikut yang sesuai dengan deskripsi partikel tersebut adalah ….',
                'options'       => json_encode([
                    [
                        "value_key"     => "A",
                        "value_text"    => "partikel menempuh jarak 12 m semenjak diperlambat sampai berhenti"
                    ],
                    [
                        "value_key"     => "B",
                        "value_text"    => "partikel menempuh jarak 12 m setelah 1,5 detik semenjak diperlambat"
                    ],
                    [
                        "value_key"     => "C",
                        "value_text"    => "partikel menempuh jarak 18 m setelah 1,5 detik semenjak diperlambat"
                    ],
                    [
                        "value_key"     => "D",
                        "value_text"    => "partikel menempuh jarak 24 m setelah 1,5 detik semenjak diperlambat"
                    ],
                    [
                        "value_key"     => "E",
                        "value_text"    => "partikel menempuh jarak 24 m semenjak diperlambat sampai berhenti"
                    ]
                ]),
                'options_with_reason'   => json_encode([
                    [
                        "value_key"     => "A",
                        "value_text"    => "perlambatan pada gerak partikel tersebut bernilai konstan yaitu 6 m/s2"
                    ],
                    [
                        "value_key"     => "B",
                        "value_text"    => "perlambatan pada gerak partikel tersebut nilainya tidak stabil"
                    ],
                    [
                        "value_key"     => "C",
                        "value_text"    => "perlambatan pada gerak partikel tersebut nilainya tidak stabil dan memiliki rata-rata perlambatan sebesar 6 m/s2"
                    ],
                    [
                        "value_key"     => "D",
                        "value_text"    => "perlambatan pada gerak partikel tersebut nilainya tidak stabil dan memiliki rata-rata perlambatan sebesar 4,5 m/s2"
                    ],
                    [
                        "value_key"     => "E",
                        "value_text"    => "perlambatan pada gerak partikel tersebut bernilai konstan yaitu 3 m/s2"
                    ]
                ]),
                'status'        => 1,
                'created_by'    => 1,
                'updated_by'    => 0,
                'created_at'    => now()
            ],
            // # 6,
            // [
            //     'number'        => 6,
            //     'descriptions'  => '',
            //     'image' => '',
            //     'options'       => json_encode([
            //         [
            //             "value_key"     => "A",
            //             "value_text"    => "perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan"
            //         ],
            //         [
            //             "value_key"     => "B",
            //             "value_text"    => "Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya"
            //         ],
            //         [
            //             "value_key"     => "C",
            //             "value_text"    => "Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja"
            //         ],
            //         [
            //             "value_key"     => "D",
            //             "value_text"    => "Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula"
            //         ],
            //         [
            //             "value_key"     => "E",
            //             "value_text"    => "Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda"
            //         ]
            //     ]),
            //     'options_with_reason'   => json_encode([
            //         [
            //             "value_key"     => "A",
            //             "value_text"    => "perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan"
            //         ],
            //         [
            //             "value_key"     => "B",
            //             "value_text"    => "Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya"
            //         ],
            //         [
            //             "value_key"     => "C",
            //             "value_text"    => "Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja"
            //         ],
            //         [
            //             "value_key"     => "D",
            //             "value_text"    => "Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula"
            //         ],
            //         [
            //             "value_key"     => "E",
            //             "value_text"    => "Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda"
            //         ]
            //     ]),
            //     'status'        => 1,
            //     'created_by'    => 1,
            //     'udpated_by'    => 0,
            //     'created_at'    => now()
            // ],
            // # 7
            // [
            //     'number'        => 7,
            //     'descriptions'  => '',
            //     'options'       => json_encode([
            //         [
            //             "value_key"     => "A",
            //             "value_text"    => "perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan"
            //         ],
            //         [
            //             "value_key"     => "B",
            //             "value_text"    => "Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya"
            //         ],
            //         [
            //             "value_key"     => "C",
            //             "value_text"    => "Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja"
            //         ],
            //         [
            //             "value_key"     => "D",
            //             "value_text"    => "Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula"
            //         ],
            //         [
            //             "value_key"     => "E",
            //             "value_text"    => "Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda"
            //         ]
            //     ]),
            //     'options_with_reason'   => json_encode([
            //         [
            //             "value_key"     => "A",
            //             "value_text"    => "perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan"
            //         ],
            //         [
            //             "value_key"     => "B",
            //             "value_text"    => "Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya"
            //         ],
            //         [
            //             "value_key"     => "C",
            //             "value_text"    => "Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja"
            //         ],
            //         [
            //             "value_key"     => "D",
            //             "value_text"    => "Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula"
            //         ],
            //         [
            //             "value_key"     => "E",
            //             "value_text"    => "Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda"
            //         ]
            //     ]),
            //     'status'        => 1,
            //     'created_by'    => 1,
            //     'udpated_by'    => 0,
            //     'created_at'    => now()
            // ],
            // # 8
            // [
            //     'number'        => 8,
            //     'descriptions'  => '',
            //     'options'       => json_encode([
            //         [
            //             "value_key"     => "A",
            //             "value_text"    => "perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan"
            //         ],
            //         [
            //             "value_key"     => "B",
            //             "value_text"    => "Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya"
            //         ],
            //         [
            //             "value_key"     => "C",
            //             "value_text"    => "Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja"
            //         ],
            //         [
            //             "value_key"     => "D",
            //             "value_text"    => "Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula"
            //         ],
            //         [
            //             "value_key"     => "E",
            //             "value_text"    => "Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda"
            //         ]
            //     ]),
            //     'options_with_reason'   => json_encode([
            //         [
            //             "value_key"     => "A",
            //             "value_text"    => "perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan"
            //         ],
            //         [
            //             "value_key"     => "B",
            //             "value_text"    => "Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya"
            //         ],
            //         [
            //             "value_key"     => "C",
            //             "value_text"    => "Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja"
            //         ],
            //         [
            //             "value_key"     => "D",
            //             "value_text"    => "Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula"
            //         ],
            //         [
            //             "value_key"     => "E",
            //             "value_text"    => "Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda"
            //         ]
            //     ]),
            //     'status'        => 1,
            //     'created_by'    => 1,
            //     'udpated_by'    => 0,
            //     'created_at'    => now()
            // ],
            // # 9
            // [
            //     'number'        => 9,
            //     'descriptions'  => '',
            //     'options'       => json_encode([
            //         [
            //             "value_key"     => "A",
            //             "value_text"    => "perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan"
            //         ],
            //         [
            //             "value_key"     => "B",
            //             "value_text"    => "Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya"
            //         ],
            //         [
            //             "value_key"     => "C",
            //             "value_text"    => "Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja"
            //         ],
            //         [
            //             "value_key"     => "D",
            //             "value_text"    => "Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula"
            //         ],
            //         [
            //             "value_key"     => "E",
            //             "value_text"    => "Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda"
            //         ]
            //     ]),
            //     'options_with_reason'   => json_encode([
            //         [
            //             "value_key"     => "A",
            //             "value_text"    => "perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan"
            //         ],
            //         [
            //             "value_key"     => "B",
            //             "value_text"    => "Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya"
            //         ],
            //         [
            //             "value_key"     => "C",
            //             "value_text"    => "Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja"
            //         ],
            //         [
            //             "value_key"     => "D",
            //             "value_text"    => "Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula"
            //         ],
            //         [
            //             "value_key"     => "E",
            //             "value_text"    => "Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda"
            //         ]
            //     ]),
            //     'status'        => 1,
            //     'created_by'    => 1,
            //     'udpated_by'    => 0,
            //     'created_at'    => now()
            // ],
            // # 10
            // [
            //     'number'        => 10,
            //     'descriptions'  => '',
            //     'options'       => json_encode([
            //         [
            //             "value_key"     => "A",
            //             "value_text"    => "perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan"
            //         ],
            //         [
            //             "value_key"     => "B",
            //             "value_text"    => "Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya"
            //         ],
            //         [
            //             "value_key"     => "C",
            //             "value_text"    => "Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja"
            //         ],
            //         [
            //             "value_key"     => "D",
            //             "value_text"    => "Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula"
            //         ],
            //         [
            //             "value_key"     => "E",
            //             "value_text"    => "Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda"
            //         ]
            //     ]),
            //     'options_with_reason'   => json_encode([
            //         [
            //             "value_key"     => "A",
            //             "value_text"    => "perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan"
            //         ],
            //         [
            //             "value_key"     => "B",
            //             "value_text"    => "Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya"
            //         ],
            //         [
            //             "value_key"     => "C",
            //             "value_text"    => "Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja"
            //         ],
            //         [
            //             "value_key"     => "D",
            //             "value_text"    => "Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula"
            //         ],
            //         [
            //             "value_key"     => "E",
            //             "value_text"    => "Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda"
            //         ]
            //     ]),
            //     'status'        => 1,
            //     'created_by'    => 1,
            //     'udpated_by'    => 0,
            //     'created_at'    => now()
            // ],
        ];

        return $paramater;
    }

    public function store(Request $request)
    {
        $question_after_action = 1;
        try {

            # get data question master id
            $question_number = $request->question_number;
            $question = DB::table('question_master')->where('number', $question_number)->first();

            # set param to check data
            $param = [
                'user_id'               => Auth::user()->id,
                'question_master_id'    => $question->id
            ];

            # dd($param, $request->all());

            # check data answer by user
            $query_answer_by_u = DB::table('question_answer_user')->where($param);

            $answer_by_u = $query_answer_by_u->first();

            # param to insert or update data
            $param['answer']                = $request->answer;
            $param['answer_with_reason']    = $request->answer_reason;
            $param['is_answered']           = 1;
            $param['score']                 = $this->calculated_score($request->answer, $request->answer_reason, $question->id);

            if ( empty ( $answer_by_u ) ) :
                $param['created_by']            = Auth::user()->id;
                $param['updated_by']            = 0;
                $param['created_at']            = now();

                // insert data
                DB::table('question_answer_user')->insert($param);
            else :
                $param['updated_by']            = Auth::user()->id;
                $param['updated_at']            = now();

                $query_answer_by_u->update($param);
            endif ;

            // check value action user for redirect to next or before question
            $question_after_action = ( $request->action_user == 'next' ) ? ( $question_number + 1 ) : ( $question_number - 1 );

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return redirect(route('front.dashboard'));
        }

        return redirect(route('question', ['questionNo' => $question_after_action]));
    }

    public function calculated_score($answer, $ranswer_reason, $question_master_id)
    {
        # get answer key
        $key_ans = DB::table('question_answer_key')->where('question_master_id', $question_master_id)->first();
        # dump($key_ans);

        if ( !empty ( $key_ans ) ) :
            # compare answer by user with answer key
            if ( $answer == $key_ans->key_answer && $ranswer_reason == $key_ans->key_answer_with_reason ) :
                return 4;

            elseif ( $answer == $key_ans->key_answer && $ranswer_reason != $key_ans->key_answer_with_reason ) :
                return 3;

            elseif ( $answer != $key_ans->key_answer && $ranswer_reason == $key_ans->key_answer_with_reason ) :
                return 2;

            elseif ( $answer != $key_ans->key_answer && $ranswer_reason != $key_ans->key_answer_with_reason ) :
                return 1;

            elseif ( $answer == $key_ans->key_answer && $ranswer_reason == '-' ) :
                return 2;

            elseif ( $answer != $key_ans->key_answer && $ranswer_reason == '-' ) :
                return 1;

            elseif ( $answer == '-' && $ranswer_reason == $key_ans->key_answer_with_reason ) :
                return 1;

            elseif ( $answer == '-' && $ranswer_reason == '-' ) :
                return 0;
            endif;
        endif ;
    }
}
