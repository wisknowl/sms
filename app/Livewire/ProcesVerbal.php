<?php

namespace App\Livewire;

use Session;
use Illuminate\Http\Request;
use App\Models\academic_year;
use App\Models\cycle;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty;
use App\Models\student;
use App\Models\unite_enseignement;
use App\Models\course;
use App\Models\course_student;
use App\Models\paper;
use App\Models\student_paper;
use Livewire\Component;
use Livewire\WithPagination;


class ProcesVerbal extends Component
{
    use WithPagination;
    public $academic_year_mod;
    public $semestermod;
    public $specialty;
    public $specialties = [];
    public $levels = [];
    public $levelmod;
    public $pvmod;
    public $cycle;
    public $students;
    public $ues;
    public $courses;
    public $st_courses;
    public $papers;
    public $student_papers;

    public function mount(Request $request)
    {
        if ($request->has('year_id') && !empty($request->input('year_id'))) {
            $year_id = $request->input('year_id');
            $year_name = academic_year::where('id', $year_id)->value('name');
            Session::put('year_name', $year_name);
            Session::put('year_id', $year_id);
        } else {
            // Use the session value as the default value
            $year_id = Session::get('year_id');
            $year_name = Session::get('year_name');
        }
        if ($request->has('semester_id') && !empty($request->input('semester_id'))) {
            $semester_id = $request->input('semester_id');
            $semester_name = semester::where('id', $semester_id)->value('name');
            Session::put('semester_name', $semester_name);
            Session::put('semester_id', $semester_id);
        } else {
            // Use the session value as the default value
            $semester_id = Session::get('semester_id');
            $semester_name = Session::get('semester_name');
        }
        if (session()->has('semester_id')) {
            $semester_session = session('semester_id');
        }
        if (session()->has('year_name')) {
            $year_session = session('year_name');
        }
        // dump($semester_session, $year_session);
        $this->academic_year_mod = $year_session;
        // dd($this->academic_year);
        // $first_level = level::first();
        // $this->levelmod = $first_level->id;
        $this->semestermod = $semester_session;

        $first_cycle = cycle::first();
        $this->cycle = $first_cycle->id;
        $this->updateSpecialties();

        $first_specialty = $this->specialties[0];
        $this->specialty = $first_specialty->id;
        $this->updateLevels();

        $first_level = $this->levels[0];
        $this->levelmod = $first_level->id;

        $this->pvmod = 2;
        $this->students = student::where('specialty_id', $this->specialty)->with('levels')
            ->whereHas('levels', function ($query) {
                $query->where('academic_year', $this->academic_year_mod)->where('level_id', $this->levelmod);
            })->get();
        $this->ues = unite_enseignement::orderBy('code', 'asc')->where('specialty_id', $this->specialty)->where('level_id', $this->levelmod)->where('semester_id', $this->semestermod)->get();

        $ue_ids = unite_enseignement::where('specialty_id', $this->specialty)->where('level_id', $this->levelmod)->where('semester_id', $this->semestermod)->pluck('id')->toArray();
        // dd($this->level_id,$ue_ids, $students);
        $result = array();
        foreach ($ue_ids as $ue_id) {
            $course_id = course::where('ue_id', $ue_id)->get()->pluck('id')->toArray();
            $result = array_merge($result, $course_id);
        }
        $this->courses = Course::orderBy('code', 'asc')->whereIn('id', $result)->get();
        // dd($result);
        $res = array();
        foreach ($result as $i) {
            $stc_id = course_student::with('student')->where('course_id', $i)->pluck('id')->toArray();
            $res = array_merge($res, $stc_id);
            // dd($st_courses);
            // dump($i, $stc_id, $res);
        }
        $this->st_courses = course_student::with('student', 'course')->whereIn('id', $res)->get();

        $this->papers = paper::where('specialty_id', $this->specialty)->get();
        $this->student_papers = student_paper::with('student', 'paper')
            ->whereHas('paper', function ($query) {
                $query->where('specialty_id', $this->specialty);
            })->get();
        // dd($this->papers, $this->student_papers);
    }
    public function updateSpecialties()
    {
        $this->specialties = specialty::where('cycle_id', $this->cycle)->get();
    }
    public function updateLevels()
    {
        // $this->levels = level::whereHas('specialties', function ($query) {
        //     $query->where('specialty_id', $this->specialty);
        // })->get();
        $this->levels = level::all();
    }
    public function pv()
    {
    }
    public function updatePV()
    {
        // dd($this->pvmod);
        $specialty = Specialty::find($this->specialty);
        $name = $specialty->name;
        $level_id = $this->levelmod;
        $semester = $this->semestermod;
        $this->students = student::where('specialty_id', $this->specialty)->with('levels')
            ->whereHas('levels', function ($query) {
                $query->where('academic_year', $this->academic_year_mod)->where('level_id', $this->levelmod);
            })->get();
        $this->ues = unite_enseignement::orderBy('code', 'asc')->where('specialty_id', $this->specialty)->where('level_id', $this->levelmod)->where('semester_id', $this->semestermod)->get();

        $ue_ids = unite_enseignement::where('specialty_id', $this->specialty)->where('level_id', $this->levelmod)->where('semester_id', $this->semestermod)->pluck('id')->toArray();
        // dd($this->level_id,$ue_ids, $students);
        $result = array();
        foreach ($ue_ids as $ue_id) {
            $course_id = course::where('ue_id', $ue_id)->get()->pluck('id')->toArray();
            $result = array_merge($result, $course_id);
        }
        $this->courses = Course::orderBy('code', 'asc')->whereIn('id', $result)->get();
        // dd($result);
        $res = array();
        foreach ($result as $i) {
            $stc_id = course_student::with('student')->where('course_id', $i)->pluck('id')->toArray();
            $res = array_merge($res, $stc_id);
            // dd($st_courses);
            // dump($i, $stc_id, $res);
        }
        $this->st_courses = course_student::with('student', 'course')->whereIn('id', $res)->get();

        $this->papers = paper::where('specialty_id', $this->specialty)->get();
        $this->student_papers = student_paper::with('student', 'paper')
            ->whereHas('paper', function ($query) {
                $query->where('specialty_id', $this->specialty);
            })->get();
    }
    public function updatePVSN()
    {
        dd($this->pvmod);
    }
    function getAcademicYear()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        if ($currentMonth > 7) { // If the month is above July
            $nextYear = $currentYear + 1;
            return "$currentYear-$nextYear";
        } else { // If the month is July or below
            $previousYear = $currentYear - 1;
            return "$previousYear-$currentYear";
        }
    }
    public function render()
    {
        // $levels = level::all();
        $cycles = cycle::all();
        $semesters = semester::all();
        $specialties = specialty::with('cycle');
        $specialtys = $specialties->paginate(3);
        $academic_years = academic_year::all();
        config(['app.name' => 'Proces Verbal']);
        return view('livewire.proces-verbal', compact('academic_years', 'semesters', 'specialtys', 'cycles'));
    }
}
