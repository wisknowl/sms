<?php

namespace App\Livewire;

use Barryvdh\DomPDF\Facade\Pdf;


use App\Models\academic_year;
use App\Models\course;
use App\Models\course_nature;
use App\Models\course_student;
use App\Models\cycle;
use App\Models\semester;
use App\Models\specialty as ModelsSpecialty;
use App\Models\student;
use App\Models\unite_enseignement;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Specialty extends Component
{
    public $academic_year;

    public function mount()
    {
        $first_a_year = academic_year::first();
        $this->academic_year = $first_a_year->name;
        // $first_level = level::first();
        // $this->level=$first_level->id;
        // dd($this->level);
    }
    public function generatePV($id)
    {
        $students = student::where('specialty_id', $id)->with('course')->get();
        // dd($students);
        $ues = unite_enseignement::where('specialty_id', $id)->where('level_id', 11)->where('semester_id', 1)->get();

        $ue_ids = unite_enseignement::where('specialty_id', $id)
            ->pluck('id')->toArray();
        // dd($ue_ids);
        $result = array();
        foreach ($ue_ids as $ue_id) {
            $course_id = Course::where('ue_id', $ue_id)->get()->pluck('id')->toArray();
            $result = array_merge($result, $course_id);
        }
        $courses = Course::orderBy('code','asc')->whereIn('id', $result)->get();
        // dd($result);
        $res = array();
        foreach ($result as $i) {
            $stc_id = course_student::with('student')->where('course_id', $i)->pluck('id')->toArray();
            $res = array_merge($res, $stc_id);
            // dd($st_courses);
            // dump($i, $stc_id, $res);
        }
        $st_courses = course_student::with('student','course')->whereIn('id', $res)->get();
        $pdf = Pdf::loadView('pdf.pv', compact('id', 'students', 'ues', 'courses','st_courses'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
    public function render()
    {
        $semesters = semester::all();
        $academic_years = academic_year::all();
        $cycles = cycle::all();
        $specialties = ModelsSpecialty::with('cycle')->get();
        return view('livewire.specialty', compact('specialties', 'academic_years', 'semesters', 'cycles'));
    }
}
