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

class StudentMarks extends Component
{
    use WithPagination;
    // protected $listeners = ['specialtyUpdated' => 'updateCourse'];
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

    public function mount()
    {
        // $this->a_year = $a_year;
        // $this->studentId = $studentId;
        // $this->academic_year = $this->getAcademicYear();
        // $first_a_year = academic_year::first();
        // $this->academic_year = $first_a_year->name;
        // if (session()->has('semester_id')) {
        //     $semester_session = session('semester_id');
        // }
        // if (session()->has('year_name')) {
        //     $year_session = session('year_name');
        // }
        $first_cycle = cycle::first();
        $this->cycle = $first_cycle->id;
        $this->updateSpecialties();

        $first_specialty = $this->specialties[0];
        $this->specialty = $first_specialty->id;
        $this->updateLevels();

        $first_specialty = $this->specialties[0];
        $this->specialty = $first_specialty->id;
        $first_level = $this->levels[0];
        $this->level = $first_level->id;
        $this->updateCourses();
        // dump($this->specialty, $this->level, $semester_session, $year_session);
        $first_course = $this->courses[0];
        $this->coursemod = $first_course->id;
        $this->updateStudents();
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
        if (session()->has('semester_id')) {
            $this->semester = session('semester_id');
        }
        // get the ids of the unite_enseignement related to the specialty
        $ue_ids = unite_enseignement::where('specialty_id', $this->specialty)
            ->where('level_id', $this->level)
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
        $this->courses = Course::whereIn('id', $result)->orderBy('code', 'asc')->get();

        // $this->emit('specialtyUpdated');
    }
    public function updatingCoursemod()
    {
        $this->resetPage();
    }

    public function updateStudents()
    {
        // query for the students based on the selected course
        $academic_year = $this->getAcademicYear();
        // dd($this->coursemod);
        $this->students = Student::whereHas('course', function ($query) {
            $query->where('course_id', $this->coursemod);
        })->get();
        if (session()->has('year_name')) {
            $this->academic_year = session('year_name');
        }
        // $this->course_students = course_student::with('student', 'course')->where('course_id', $this->course)->get();
        $this->course_students = course_student::with('student', 'course')
            ->where('course_id', $this->coursemod)
            ->whereHas('student', function ($query) {
                // Assuming you have a function to get the current academic year
                $current_year = $this->getAcademicYear();
                $query->where('specialty_id', $this->specialty)
                // Assuming the student model has a level relation
                ->whereHas('levels', function ($query) use ($current_year) {
                    // Assuming the level model has a year column
                    $query->where('academic_year', $this->academic_year)->where('level_id', $this->level);
                });
            })
            ->get();

        foreach ($this->course_students as $course_student) {
            $le = $course_student->student->currentLevel()->name;
            // dd($le);
        }
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
            $i = 154;
            $indexes = array(); // Initialize an empty array
            if (!empty($this->ca_marks)) {
                // Merge the keys of $this->ca_marks with the $indexes array
                $indexes = array_merge($indexes, array_keys($this->ca_marks));
            }
            if (!empty($this->exam_mark)) {
                // Merge the keys of $this->exam_mark with the $indexes array
                $indexes = array_merge($indexes, array_keys($this->exam_mark));
            }
            if (!empty($this->reseat_mark)) {
                // Merge the keys of $this->reseat_mark with the $indexes array
                $indexes = array_merge($indexes, array_keys($this->reseat_mark));
            }
            $indexes = array_unique($indexes);
            // dd($this->ca_marks, $this->exam_mark, $this->reseat_mark, $indexes);

            // die();
            // initialize a variable to store the update status
            $updated = true;
            // loop through the indexes
            foreach ($indexes as $index) {
                // dd($index);
                // find the course_student record by the index
                $course_student = course_student::find($index);

                // if ($this->exam_mark[$index] < $this->reseat_mark[$index]) {
                //     $this->average = (((((($this->ca_marks[$index]) / 20) * 30) + ((($this->reseat_mark[$index]) / 20) * 70)) / 100) * 20);
                // } else {
                //     $this->average = (((((($this->ca_marks[$index]) / 20) * 30) + ((($this->exam_mark[$index]) / 20) * 70)) / 100) * 20);
                // }
                // // update the record with the ca_mark and exam_mark values

                if (array_key_exists($index, $this->ca_marks) && !empty($this->ca_marks[$index])) {
                    $updated = $updated && $course_student->update(['ca_marks' => $this->ca_marks[$index]]);
                }
                if (array_key_exists($index, $this->exam_mark) && !empty($this->exam_mark[$index])) {
                    $updated = $updated && $course_student->update(['exam_marks' => $this->exam_mark[$index]]);
                }
                if (array_key_exists($index, $this->reseat_mark) && !empty($this->reseat_mark[$index])) {
                    $updated = $updated && $course_student->update(['reseat_mark' => $this->reseat_mark[$index]]);
                }
                // $updated = $updated && $course_student->update([
                //     'ca_marks' => $this->ca_marks[$index],
                //     'exam_marks' => $this->exam_mark[$index],
                //     'reseat_mark' => $this->reseat_mark[$index],
                // ]);

            }
            DB::commit();
            // check if the update was successful
            $this->updateStudents();
            if ($updated) {
                // flash a success message
                session()->flash('message', 'Les Notes ont été mises à jour avec succès');
                // notify()->success('Les Notes ont été mises à jour avec succès');
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
            $count = 0;
            foreach ($st_courses as $st_course) {
                if ($st_course->course->ue_id == $st_ue->ue->id) {
                    if ($st_course->exam_marks < $st_course->reseat_mark) {
                        $course_mark = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->reseat_mark) / 20) * 70)) / 100) * 20);
                    } else {
                        $course_mark = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->exam_marks) / 20) * 70)) / 100) * 20);
                    }
                    $sum = $sum + $course_mark;
                    if ($course_mark >= 10) {
                        $c = $c + $st_course->course->credit_points;
                    }
                    $count = $count + 1;
                }
            }

            $sum = $sum / $count;
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
        return view('livewire.student-marks', compact('ues', 'cycles', 'academic_years', 'semesters'));
    }
}
