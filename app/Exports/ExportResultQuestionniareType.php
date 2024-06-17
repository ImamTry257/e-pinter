<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ExportResultQuestionniareType implements FromView, WithEvents, WithStyles, WithColumnWidths
{
    public $type;
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function view(): View
    {
        # get data hasil soal
        $get_detail_user = DB::table('users as u')
        ->orderBy('u.name', 'asc')
        ->get(['u.id', 'u.name as student_name', 'u.school_name', 'u.created_at']);

        # generate number questionniare
        $number_questionniare = [];
        for ( $i = 1; $i <= 30; $i++ ) :
            $number_questionniare [$i] = $i;
        endfor ;
        $data['number_questionniare'] = $number_questionniare;

        # set to new format
        $data['detail_user_answer'] = [];
        if ( count ( $get_detail_user ) != 0 ) :
            foreach ( $get_detail_user as $key => $val ) :

                # get data user answer
                $data_user_answer = DB::table('questionniare_user_answer as qua')
                                    ->leftJoin('questionniare_master as qm', 'qm.id', '=', 'qua.questionniare_master_id')
                                    ->where([
                                        'qua.user_id'   => $val->id,
                                        'qua.type'      => $this->type
                                    ])
                                    ->orderBy('qm.number', 'asc')
                                    ->get(['qm.number', 'qua.answer'])
                                    ->toArray();

                # set to new array
                $data_selected = [];
                foreach ( $data_user_answer as $dd ) :
                    $data_selected [$dd->number] = $dd->answer;
                endforeach;

                # set to new array
                $number_selected = [];
                foreach ( $data_user_answer as $duans ) :
                    $number_selected [] = $duans->number;
                endforeach;

                # set new format for collect user answer
                $d_user_answer = [];
                foreach ( $number_questionniare as $number ) :
                    if ( in_array( $number, $number_selected ) ) :
                        $d_user_answer[] = [
                            'number' => $number,
                            'answer' => $data_selected[$number]
                        ];
                    else :
                        $d_user_answer[] = [
                            'number' => $number,
                            'answer' => ''
                        ];
                    endif ;
                endforeach ;

                # dd($d_user_answer);
                $data['detail_user_answer'] [] = [
                    'user_id'       => $val->id,
                    'student_name'  => $val->student_name,
                    'school_name'   => $val->school_name,
                    'progress_date' => $val->created_at,
                    'result'        => $d_user_answer
                ];

                $data['type'] = ucwords(str_replace('-', ' ', $this->type));
            endforeach;
        endif;

        # dd($data);
        return view('console.page.questionniare.result.export', $data);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }

    /* public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('assets/pemgembang/icon-selected.svg'));
        $drawing->setHeight(80);
        $drawing->setWidth(80);
        $drawing->setCoordinates('B1');

        return $drawing;
    } */

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 50,
            'C' => 30
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                // $rightBorder=array(
                //     'borders' => [
                //         'bottom' => [
                //             'borderStyle' => Border::BORDER_DOUBLE,
                //             'color' => ['argb' => '000000'],
                //         ],
                //     ],
                // );

                // $allBordres=array(
                //     'borders' => [
                //         'allBorders' => [
                //             'borderStyle' => Border::BORDER_THIN,
                //             'color' => ['argb' => '000000'],
                //         ],
                //     ],
                // );

                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial');
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(16);
                $event->sheet->getDelegate()->getStyle($cellRange)
                                ->getAlignment()
                                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $cellRange = 'A2:W2'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial')->setBold(true);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

                $cellRange = 'A3:W3'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial');
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);

                $cellRange = 'A4:K4'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial');
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12)->setBold(true);
                // $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($rightBorder);

                $cellRange = 'D7'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                // $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial')->setBold(true);

                $cellRange = 'D8'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                // $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial')->setBold(true);

                $cellRange = 'A16:K17'; // All headers
                // $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($allBordres);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial')->setBold(true);
                $event->sheet->getDelegate()->getStyle($cellRange)
                                ->getAlignment()
                                ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                $cellRange = 'A18:K18'; // All headers
                // $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($allBordres);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial')->setBold(true);
                $event->sheet->getDelegate()->getStyle($cellRange)
                                ->getAlignment()
                                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $cellRange = 'A19:K24'; // All headers
                // $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($allBordres);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(10);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial');
                $event->sheet->getDelegate()->getStyle($cellRange)
                                ->getAlignment()
                                ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
            }
        ];
    }
}
