<?php

namespace App\Livewire;

use Session;

use App\Models\academic_year;
use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\Facade as PDF;

use App\Models\course;
use App\Models\course_nature;
use App\Models\course_student;
use App\Models\cycle;
use App\Models\student;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty;
use App\Models\student_ue;
use App\Models\unite_enseignement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class Relever extends Component
{
    use WithPagination;
    public $progress = 0;
    public $cycle;
    public $level;
    public $semester;
    public $specialty;
    public $coursemod;
    public $levels = [];
    // public $semesters = [];
    public $specialties = [];
    public $courses = [];
    public $course_students;
    public $students;
    public $ca_marks = [];
    public $exam_mark = [];
    public $reseat_mark = [];
    public $course_student_id;
    public $name;
    public $average;
    public $studentId;
    public $academic_year;
    public $a_year;
    public $level_id;
    public $greeting = [];
    public $noteDeliberation;
    public $tdr;
    public $academic_year_mod;
    public $semester_mod;
    public $moyenne_semestriel = [];


    public function mount()
    {
        $first_cycle = cycle::first();
        $this->cycle = $first_cycle->id;
        $this->updateSpecialties();

        $first_specialty = $this->specialties[0];
        $this->specialty = $first_specialty->id;
        $this->updateLevels();

        // $first_specialty = $this->specialties[0];
        // $this->specialty = $first_specialty->id;
        // $first_level = $this->levels[0];
        // $this->level = $first_level->id;
        // $this->updateCourses();
        // dump($this->specialty, $this->level, $semester_session, $year_session);
        $first_level = $this->levels[0];
        $this->level = $first_level->id;
        $this->updateStudents();
        $this->tdr = 1;
        if (session()->has('semester_id')) {
            $semester_session = session('semester_id');
        }
        if (session()->has('year_name')) {
            $year_session = session('year_name');
        }
        // dd($semester_session, $year_session);
        $this->academic_year_mod = $year_session;
        $this->semester_mod = $semester_session;
    }
    public function academicYear()
    {
        dd($this->academic_year);
    }

    public function getCourseProperty()
    {
        // get the first course from the courses array
        $first_course = $this->courses[0];

        // return the first course id
        return $first_course->id;
    }
    public function updateSpecialties()
    {
        $this->specialties = specialty::where('cycle_id', $this->cycle)->get();
    }
    public function updateLevels()
    {
        $this->levels = level::whereHas('specialties', function ($query) {
            $query->where('specialty_id', $this->specialty);
        })->get();
    }
    public function type()
    {
        dd($this->tdr);
    }

    public function updatingCoursemod()
    {
        $this->resetPage();
    }

    public function updateStudents()
    {
        if (session()->has('year_name')) {
            $this->academic_year = session('year_name');
        }
        $this->students = Student::where('cycle_id', $this->cycle)->where('specialty_id', $this->specialty)
            ->whereHas('levels', function ($query) {
                $query->where('academic_year', $this->academic_year)->where('level_id', $this->level);
            })->get();
        foreach ($this->students as $student) {
            $student_id = $student->id;
            $year_session = Session::get('year_name');
            $level = $student->levelByYear($year_session); // get the level object or null
            if ($level) { // if the level is not null
                $level_id = $level->id; // get the level id
                $session = Session::get('semester_id');
                $st_ues = student_ue::with('ue')
                    ->where('student_id', $student_id)
                    ->whereHas('ue', function ($query) use ($level_id, $session) {
                        $query->where('level_id', $level_id)->where('semester_id', $session);
                    })->get();
                $courses = course_student::with('course')
                    ->where('student_id', $student_id)
                    ->whereHas('course', function ($query) use ($level_id) {
                        $query->where('level_id', $level_id);
                    })->get();
            } else {
                $st_ues = null;
            }
            $ue_credit_sum = 0;
            $ue_sum = 0;
            $credit_obtained = 0;

            if ($st_ues) {
                foreach ($st_ues as $st_ue) {
                    $course_sum = 0;
                    $course_credit_sum = 0;
                    foreach ($courses as $course) {
                        if ($course->course->ue_id == $st_ue->ue->id) {
                            $check_credit_sum = 0;

                            if ($course->exam_marks < $course->reseat_mark) {
                                $course_mark = (((((($course->ca_marks) / 20) * 30) + ((($course->reseat_mark) / 20) * 70)) / 100) * 20);
                            } else {
                                $course_mark = (((((($course->ca_marks) / 20) * 30) + ((($course->exam_marks) / 20) * 70)) / 100) * 20);
                            }
                            if ($course_mark >= 10) {
                                $check_credit_sum = $check_credit_sum + $course->course->credit_points;
                            }
                            $course_credit_multiply = $course_mark * $course->course->credit_points;
                            $course_sum = $course_sum + $course_credit_multiply;
                            $course_credit_sum = $course_credit_sum + $course->course->credit_points;
                        }
                    }
                    $ue_mark = $course_sum / $course_credit_sum;
                    if ($ue_mark < 10) {
                        $not_validated_ue[] = $ue_mark;
                    } else {
                        $validated_ue[] = $ue_mark;
                    }
                    $ue_credit_multiply = $ue_mark * $st_ue->ue->credit_points;
                    $ue_sum = $ue_sum + $ue_credit_multiply;
                    $ue_credit_sum = $ue_credit_sum + $st_ue->ue->credit_points;
                    $credit_obtained = $credit_obtained + $check_credit_sum;
                }
                $std_avg = $ue_sum / $ue_credit_sum;
                $this->moyenne_semestriel[$student_id] = $std_avg;
            }
        }
    }
    public function transcript_list($student_list, $academic_year_mod, $tdr, $semester_mod)
    {
        $studentArray = unserialize($student_list);
        // dump($studentArray);
        foreach ($studentArray as $id) {
            $transcriptArray[] = $this->unit_transcript($id, $academic_year_mod, $tdr, $semester_mod);
            // dump($transcriptArray);
        }
        // dd(1);
        $pdf = Pdf::loadView('pdf.transcript_list', compact('transcriptArray'));
        return $pdf->stream('transcript_list.pdf');
    }
    public function unit_transcript($id, $academic_year_mod, $tdr, $semester_mod)
    {
        $semester_mod = semester::find($semester_mod)->name;
        // dd($tdr, $academic_year_mod, $semester_mod);

        $academic_year = $academic_year_mod;
        $studentId = $id;
        $credential = student::find($id);

        $level = $credential->levelByYear($academic_year)->name;
        $specialty_id = $credential->specialty_id;
        $level_id = $credential->levelByYear($academic_year)->id;
        $this->level_id = $level_id;
        // dd($level, $level_id);

        $semesters = semester::whereHas('levels', function ($query) use ($level_id) {
            $query->where('level_id', $level_id);
        })->get();
        $course_natures = course_nature::all();
        $specialty = Specialty::find($specialty_id);

        $st_ues = student_ue::with('ue')->where('student_id', $id)->whereHas('ue', function ($query) use ($level_id) {
            // Add a constraint on the level_id column of the ues table
            $query->where('level_id', $level_id);
        })->get();
        $st_courses = course_student::with('course')->where('student_id', $id)->get();

        foreach ($st_ues as $st_ue) {
            $sum = 0;
            $c = 0;
            $c_credit_sum = 0;
            foreach ($st_courses as $st_course) {
                if ($st_course->course->ue_id == $st_ue->ue->id) {
                    if ($st_course->exam_marks < $st_course->reseat_mark) {
                        $course_mark = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->reseat_mark) / 20) * 70)) / 100) * 20);
                    } else {
                        $course_mark = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->exam_marks) / 20) * 70)) / 100) * 20);
                    }
                    if ($course_mark >= 10) {
                        $c = $c + $st_course->course->credit_points;
                    }
                    $course_credit_multiply = number_format(ceil($course_mark * 100) / 100, 2, '.', '') * $st_course->course->credit_points;
                    $sum = $sum + $course_credit_multiply;
                    $c_credit_sum = $c_credit_sum + $st_course->course->credit_points;
                }
            }

            $sum = $sum / $c_credit_sum;
            $updated = $st_ue->update([
                'average' => $sum,
                'credit'  => $c,
            ]);
            $st_ue = $st_ue->fresh();
        }
        return [
            'level' => $level,
            'academic_year' => $academic_year,
            'credential' => $credential,
            'semesters' => $semesters,
            'course_natures' => $course_natures,
            'st_ues' => $st_ues,
            'st_courses' => $st_courses,
            'tdr' => $tdr,
            'semester_mod' => $semester_mod
        ];
    }

    public function generateTranscript($id, $academic_year_mod, $tdr, $semester_mod)
    {
        $semester_mod = semester::find($semester_mod)->name;
        // dd($tdr, $academic_year_mod, $semester_mod);

        $academic_year = $academic_year_mod;
        $studentId = $id;
        $credential = student::find($id);
        // $level = $credential->currentLevel()->name;
        // $level = preg_replace("/^Niveau/", "", $level);
        $level = $credential->levelByYear($academic_year)->name;


        $specialty_id = $credential->specialty_id;
        $level_id = $credential->levelByYear($academic_year)->id;
        $this->level_id = $level_id;
        // dd($level, $level_id);

        $semesters = semester::whereHas('levels', function ($query) use ($level_id) {
            $query->where('level_id', $level_id);
        })->get();
        $course_natures = course_nature::all();
        $specialty = Specialty::find($specialty_id);
        // dd($specialty, $level_id, $semester_id);

        // get the ids of the unite_enseignement related to the specialty
        $ues = $specialty->ues->where('level_id', $level_id)
            ->all();
        $ue_ids = $specialty->ues->where('level_id', $level_id)
            ->pluck('id')->toArray();
        // dd($specialty ,$ues);
        $result = array();
        // loop through the ue_ids and get the course ids related to each one
        foreach ($ue_ids as $ue_id) {
            $course_id = Course::where('ue_id', $ue_id)->get()->pluck('id')->toArray();
            // merge the course ids into the result array
            $result = array_merge($result, $course_id);
        }
        // $st_courses = course_student::with('course')->whereIn('course_id', $result)->get();

        $st_ues = student_ue::with('ue')->where('student_id', $id)->whereHas('ue', function ($query) use ($level_id) {
            // Add a constraint on the level_id column of the ues table
            $query->where('level_id', $level_id);
        })->get();
        $st_courses = course_student::with('course')->where('student_id', $id)->get();

        foreach ($st_ues as $st_ue) {
            $sum = 0;
            $c = 0;
            $c_credit_sum = 0;
            foreach ($st_courses as $st_course) {
                if ($st_course->course->ue_id == $st_ue->ue->id) {
                    if ($st_course->exam_marks < $st_course->reseat_mark) {
                        $course_mark = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->reseat_mark) / 20) * 70)) / 100) * 20);
                    } else {
                        $course_mark = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->exam_marks) / 20) * 70)) / 100) * 20);
                    }
                    if ($course_mark >= 10) {
                        $c = $c + $st_course->course->credit_points;
                    }
                    $course_credit_multiply = number_format(ceil($course_mark * 100) / 100, 2, '.', '') * $st_course->course->credit_points;
                    $sum = $sum + $course_credit_multiply;
                    $c_credit_sum = $c_credit_sum + $st_course->course->credit_points;
                }
            }

            $sum = $sum / $c_credit_sum;
            $updated = $st_ue->update([
                'average' => $sum,
                'credit'  => $c,
            ]);
            $st_ue = $st_ue->fresh();
        }


        $pdf = Pdf::loadView('pdf.index', compact('studentId', 'level', 'academic_year', 'credential', 'semesters', 'course_natures', 'st_ues', 'st_courses', 'tdr', 'semester_mod'));
        // $headers = [
        //     'Content-Disposition' => 'inline; filename="new.pdf"',
        // ];
        // return $pdf->stream('new.pdf', $headers);
        $pdfOutput = $pdf->output();
        $response = response($pdfOutput, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="new.pdf"'
        ]);

        return $response;
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

    public function render(Request $request)
    {
        $courses = course::all();
        // $levels = level::all();
        $semesters = semester::all();
        $ues = unite_enseignement::all();
        // $specialties = specialty::all();
        $cycles = cycle::all();
        $academic_years = academic_year::all();
        config(['app.name' => 'Notes']);
        // query for the students based on the selected course
        return view('livewire.relever', compact('ues', 'cycles', 'academic_years', 'semesters'));
    }
}
