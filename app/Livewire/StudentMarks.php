<?php

namespace App\Livewire;

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



use Livewire\Component;

class StudentMarks extends Component
{
    // protected $listeners = ['specialtyUpdated' => 'updateCourse'];
    public $cycle;
    public $level;
    public $semester;
    public $specialty;
    public $course;
    public $levels = [];
    public $semesters = [];
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
    public $a_year;
    public $level_id;



    public function mount($a_year)
    {
        $this->a_year = $a_year;
        // $this->studentId = $studentId;
        $first_cycle = cycle::first();
        $this->cycle = $first_cycle->id;
        $this->updateSpecialties();

        $first_specialty = $this->specialties[0];
        $this->specialty = $first_specialty->id;
        $this->updateLevels();

        $first_level = $this->levels[0];
        $this->level = $first_level->id;
        $this->updateSemesters();

        $first_specialty = $this->specialties[0];
        $this->specialty = $first_specialty->id;
        $first_level = $this->levels[0];
        $this->level = $first_level->id;
        $first_semester = $this->semesters[0];
        $this->semester = $first_semester->id;
        $this->updateCourses();

        $first_course = $this->courses[0];
        $this->course = $first_course->id;
        $this->updateStudents();
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
    public function updateSemesters()
    {
        $this->semesters = semester::whereHas('levels', function ($query) {
            $query->where('level_id', $this->level);
        })->get();
    }

    public function updateCourses()
    {
        // query for the courses based on the selected specialty
        // find the specialty by id
        // $ues = unite_enseignement::where(spec)
        $specialty = Specialty::find($this->specialty);

        // get the ids of the unite_enseignement related to the specialty
        $ue_ids = $specialty->ues->where('level_id', $this->level)
            ->where('semester_id', $this->semester)
            ->pluck('id')->toArray();

        // initialize an empty array to store the course ids
        $result = array();

        // loop through the ue_ids and get the course ids related to each one
        foreach ($ue_ids as $ue_id) {
            $course_id = Course::where('ue_id', $ue_id)->get()->pluck('id')->toArray();
            // merge the course ids into the result array
            $result = array_merge($result, $course_id);
        }

        // query for the courses based on the result array
        $this->courses = Course::whereIn('id', $result)->get();

        // $this->emit('specialtyUpdated');
    }

    public function updateStudents()
    {
        // query for the students based on the selected course
        $this->students = Student::whereHas('course', function ($query) {
            $query->where('course_id', $this->course);
        })->get();
        $this->course_students = course_student::with('student', 'course')->where('course_id', $this->course)->get();
    }

    public function updateMarks(Request $request)
    {
        // $this->validate();
        // enable the query log for the default connection
        // DB::connection()->enableQueryLog();
        // // // enable the query log
        // DB::enableQueryLog();

        // update the marks using the update method
        DB::transaction(function () use ($request) {
            // get the indexes of the ca_marks and exam_mark arrays
            $indexes = array_keys($this->ca_marks);
            // dd($this->ca_marks, $this->exam_mark, $this->reseat_mark, $indexes);
            // die();
            // initialize a variable to store the update status
            $updated = true;
            // loop through the indexes
            foreach ($indexes as $index) {
                // find the course_student record by the index
                $course_student = course_student::find($index);

                if ($this->exam_mark[$index] < $this->reseat_mark[$index]) {
                    $this->average = (((((($this->ca_marks[$index]) / 20) * 30) + ((($this->reseat_mark[$index]) / 20) * 70)) / 100) * 20);
                } else {
                    $this->average = (((((($this->ca_marks[$index]) / 20) * 30) + ((($this->exam_mark[$index]) / 20) * 70)) / 100) * 20);
                }
                // update the record with the ca_mark and exam_mark values
                $updated = $updated && $course_student->update([
                    'ca_marks' => $this->ca_marks[$index],
                    'exam_marks' => $this->exam_mark[$index],
                    'reseat_mark' => $this->reseat_mark[$index],
                    'average' => $this->average,

                ]);
            }
            DB::commit();
            // check if the update was successful
            if ($updated) {
                // flash a success message
                session()->flash('message', 'Les Notes ont été mises à jour avec succès');
                notify()->success('Les Notes ont été mises à jour avec succès');
            } else {
                // flash an error message
                session()->flash('error', 'Something went wrong.');
            }
        });

        // get the query log
        $queryLog = DB::getQueryLog();
        // dump the query log
        // dump($queryLog);
    }

    public function generateTranscript($id)
    {
        $academic_year = $this->getAcademicYear();
        $studentId = $id;
        $credential = student::find($id);
        $level = $credential->currentLevel()->name;
        $level = preg_replace("/^Niveau/", "", $level);
        $specialty_id = $credential->specialty_id;
        $level_id = $credential->currentLevel()->id;
        $this->level_id = $level_id;
        $semesters = semester::whereHas('levels', function ($query) {
            $query->where('level_id', $this->level_id);
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

        $st_ues = student_ue::with('ue')->where('student_id', $id)->whereHas('ue', function ($query) {
            // Add a constraint on the level_id column of the ues table
            $query->where('level_id', $this->level_id);
        })->get();
        $st_courses = course_student::with('course')->where('student_id', $id)->get();

        foreach ($st_ues as $st_ue) {
            $sum = 0;
            $c = 0;
            $count = 0;
            foreach($st_courses as $st_course){
                if($st_course->course->ue_id == $st_ue->ue->id){
                    $sum = $sum + $st_course->average;
                    if($st_course->average >= 10){
                        $c = $c + $st_course->course->credit_points;
                    }
                    $count = $count + 1;
                }
            }

            $sum = $sum/$count;
            $updated = $st_ue->update([
                'average' => $sum,
                'credit'  => $c,
            ]);
            $st_ue = $st_ue->fresh();

        }
        
       
        // query for the courses based on the result array
        $courses = Course::whereIn('id', $result)->get();

        // dd($ue_ids, $result, $st_courses);
        // do some logic here
        $pdf = Pdf::loadView('pdf.index', compact('studentId', 'level', 'academic_year', 'credential', 'semesters', 'course_natures', 'st_ues', 'courses', 'st_courses'));
        return $pdf->stream();
    }
    function getAcademicYear()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        if ($currentMonth > 7) { // If the month is above July
            $nextYear = $currentYear + 1;
            return "$currentYear/$nextYear";
        } else { // If the month is July or below
            $previousYear = $currentYear - 1;
            return "$previousYear/$currentYear";
        }
    }

    public function render(Request $request)
    {
        $courses = course::all();
        // $levels = level::all();
        // $semesters = semester::all();
        $ues = unite_enseignement::all();
        // $specialties = specialty::all();
        $cycles = cycle::all();
        // query for the students based on the selected course
        return view('livewire.student-marks', compact('ues', 'cycles'));
    }
}
