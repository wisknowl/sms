<?php

namespace App\Exports;

use App\Models\academic_year;
use App\Models\course;
use App\Models\course_student;
use App\Models\level;
use App\Models\semester;
use App\Models\Specialty;
use App\Models\student;
use App\Models\unite_enseignement;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Sheet;

Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});
class pvsn implements FromView, WithEvents
{
    protected $id;
    protected $level_id;
    protected $semester_id;
    protected $a_year;

    public function __construct($id, $level_id, $semester_id, $a_year)
    {
        $this->id = $id;
        $this->level_id = $level_id;
        $this->semester_id = $semester_id;
        $this->a_year = $a_year;
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $specialty = Specialty::find($this->id);
                $name = $specialty->name;
                $specialty = $this->id;

                $level = level::find($this->level_id);
                $level_name = $level->name;
                $level = $this->level_id;

                $semester = semester::find($this->semester_id);
                $semester_name = $semester->name;
                // $semester = $this->semester_id;
                // dd($this->a_year);
                $academic_year = academic_year::where('name', $this->a_year)->pluck('name')->toArray();
                foreach ($academic_year as $ay) {
                    $academic_year = $ay;
                }
                // dd($semester, $academic_year);
                // $ay = $academic_year->name;

                // Get the worksheet instance
                $sheet = $event->sheet->getDelegate();
                $highestColumn = $sheet->getHighestColumn();
                $highestRow = $sheet->getHighestRow();


                // foreach (range('A', "{$highestColumn}") as $column) {
                //     // Get the column dimension object for each column
                //     $columnDimension = $sheet->getColumnDimension($column);
                //     // Auto size the column
                //     if ($column == 'A' || $column == 'B') {
                //         $sheet->getStyle("{$column}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                //         $sheet->getStyle("{$column}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                //     }
                //     $columnDimension->setAutoSize(true);
                // }

                foreach (range('D', "{$highestColumn}") as $column) {
                    $sheet->getStyle("{$column}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle("{$column}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                }
                $event->sheet->styleCells(
                    "A1:{$highestColumn}{$highestRow}",
                    [
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '00000000'],
                            ],
                        ],
                        'alignment' => [
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                        'font' => [
                            'size' => 11
                        ],
                    ]
                );
                // $event->sheet->styleCells(
                //     "A3:{$highestColumn}3",
                //     [
                //         'font' => [
                //             'size' => 8
                //         ],
                //         'autoSize' => true
                //     ]
                // );
                // Get the cell style object for a specific cell
                $cellStyle = $event->sheet->getStyle('1:1');
                $cellStyle->getAlignment()->setWrapText(true);
                $cellStyle->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                $cellStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getRowDimension(1)->setRowHeight(50);

                $cellStyle1 = $event->sheet->getStyle('2:2');
                $cellStyle1->getAlignment()->setWrapText(true);
                $cellStyle1->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                $cellStyle1->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getRowDimension(2)->setRowHeight(50);

                // $cellStyle2 = $event->sheet->getStyle("D4:{$highestColumn}4");
                foreach (range('A', "{$highestColumn}") as $column) {
                    // Get the column dimension object for each column
                    $columnDimension = $sheet->getColumnDimension($column);

                    // Set the column width to 20
                    $columnDimension->setAutoSize(true);
                }
                // $sheet->getRowDimension(1)->setRowHeight(50);

                // Define the highest column index

                // Insert a new row before the first row
                $sheet->insertNewRowBefore(1);
                $sheet->getRowDimension(1)->setRowHeight(110);

                $sheet->mergeCells("A1:K1");
                // $sheet->mergeCells("A1:{$highestColumn}1");
                // Create a new RichText object
                $text = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                // Add the first part of the text without underline
                $text->createText("PROCES VERBAL SESSION NORMALE\n");
                $underline = $text->createTextRun("Annee academique:");
                $underline->getFont()->setUnderline(true);

                $text->createText(" {$academic_year} \n");
                // Add the second part of the text with underline
                $underline = $text->createTextRun("Specialite:");
                $underline->getFont()->setUnderline(true);

                $text->createText(" {$name} ");

                // Add the rest of the text without underline
                $text->createText("Niveau: {$level_name} Semestre: {$semester_name}");
                // Set the value of the cell A1 to the RichText object
                $sheet->setCellValue("A1", $text);

                // Set the value of A1 cell as the header text
                // $sheet->setCellValue("A1", "PROCES VERBAL CONTROLE CONTINU" . PHP_EOL . "Annee academique: {$academic_year}" . PHP_EOL . "Specialite: {$name} Niveau: {$level_name} Semestre: {$semester_name}");
                $style = $event->sheet->getStyle('A1');
                $style->getFont()->setBold(true);
                $style->getFont()->setSize(16);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A1')->getAlignment()->setVertical(Alignment::VERTICAL_TOP);


                // $sheet->setCellValue("A1", "{$specialty} {$level} {$semester}");

                // Set the alignment of A1 cell as center
                // $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // Inserting Image
                $drawing = new Drawing();
                $drawing->setPath(public_path('/images/isig.png'));
                $drawing->setCoordinates('A1');
                $drawing->setHeight(90);
                $drawing->setWidth(90);
                $drawing->setOffsetX(5);
                $drawing->setOffsetY(5);
                $drawing->setWorksheet($sheet);
            },
        ];
    }

    public function view(): View
    {
        $specialty = Specialty::find($this->id);
        $name = $specialty->name;
        $level_id = $this->level_id;
        $semester = $this->semester_id;
        $students = student::where('specialty_id', $this->id)->with('levels')->get();
        // foreach($students as $student){
        // foreach ($student->levels as $level) {
        // $id = $level->id;
        // if ($id == $level_id) {
        //     echo '<pre>';
        //     print_r($id);
        //     // dd($id);
        //     echo '</pre>';
        // }

        // }
        // }
        // dd($students);
        $ues = unite_enseignement::orderBy('code', 'asc')->where('specialty_id', $this->id)->where('level_id', $this->level_id)->where('semester_id', $this->semester_id)->get();

        $ue_ids = unite_enseignement::where('specialty_id', $this->id)->where('level_id', $this->level_id)->where('semester_id', $this->semester_id)->pluck('id')->toArray();
        // dd($this->level_id,$ue_ids, $students);
        $result = array();
        foreach ($ue_ids as $ue_id) {
            $course_id = course::where('ue_id', $ue_id)->get()->pluck('id')->toArray();
            $result = array_merge($result, $course_id);
        }
        $courses = Course::orderBy('code', 'asc')->whereIn('id', $result)->get();
        // dd($result);
        $res = array();
        foreach ($result as $i) {
            $stc_id = course_student::with('student')->where('course_id', $i)->pluck('id')->toArray();
            $res = array_merge($res, $stc_id);
            // dd($st_courses);
            // dump($i, $stc_id, $res);
        }
        $st_courses = course_student::with('student', 'course')->whereIn('id', $res)->get();
        return view('export.pvsn', compact('name', 'level_id', 'semester', 'students', 'ues', 'courses', 'st_courses'));
    }
}
