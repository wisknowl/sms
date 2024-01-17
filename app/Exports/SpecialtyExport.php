<?php

namespace App\Exports;

use App\Models\course;
use App\Models\course_student;
use App\Models\Specialty;
use App\Models\student;
use App\Models\unite_enseignement;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class SpecialtyExport implements FromView, WithEvents
{
    protected $id;
    protected $level_id;
    protected $semester_id;

    public function __construct($id, $level_id, $semester_id)
    {
        $this->id = $id;
        $this->level_id = $level_id;
        $this->semester_id = $semester_id;
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $specialty = $this->id;
                $level = $this->level_id;
                $semester = $this->semester_id;

                // Get the worksheet instance
                $sheet = $event->sheet->getDelegate();

                // Define the highest column index
                $highestColumn = $sheet->getHighestColumn();

                // Insert a new row before the first row
                $sheet->insertNewRowBefore(1);
                $sheet->getRowDimension(1)->setRowHeight(50);
                // Merge the cells from A1 to the highest column
                $sheet->mergeCells("A1:{$highestColumn}1");

                // Set the value of A1 cell as the header text
                // $sheet->setCellValue('A1', 'This is the header text');
                $sheet->setCellValue("A1", "{$specialty} {$level} {$semester}");

                // Set the alignment of A1 cell as center
                $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // Create a new drawing object
                $drawing = new Drawing();

                // Set the path of the logo image
                $drawing->setPath(public_path('/images/isig.png'));

                // Set the coordinates of the logo image
                $drawing->setCoordinates('A1');

                // Set the height and width of the logo image
                $drawing->setHeight(50);
                $drawing->setWidth(50);

                // Set the offset of the logo image
                $drawing->setOffsetX(5);
                $drawing->setOffsetY(5);

                // Set the worksheet as the parent of the drawing object
                $drawing->setWorksheet($sheet);
            },
        ];
    }

    public function view(): View
    {
        $specialty = Specialty::find($this->id);
        $name = $specialty->name;
        $level = $this->level_id;
        $semester = $this->semester_id;
        $students = student::where('specialty_id', $this->id)->with('levels')->get();
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

        return view('export.pvcc', compact('name','level','semester', 'students', 'ues', 'courses', 'st_courses'));
    }
}
