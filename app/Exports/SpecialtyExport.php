<?php

namespace App\Exports;

use App\Models\course;
use App\Models\course_student;
use App\Models\Specialty;
use App\Models\student;
use App\Models\unite_enseignement;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class SpecialtyExport implements FromView
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

    public function view(): View
    {
        $specialty = Specialty::find($this->id);
        $name = $specialty->name;
        $students = student::where('specialty_id', $this->id)->with('course')->get();
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

        return view('export.pvcc', compact('name','students', 'ues', 'courses', 'st_courses'));
    }
}
