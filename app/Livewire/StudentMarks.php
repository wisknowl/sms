<?php

namespace App\Livewire;

use App\Models\course;
use App\Models\course_student;
use App\Models\cycle;
use App\Models\student;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty;
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

    protected $rules = [
        'name' => 'required|max:2',
        'ca_marks' => 'required|array|min:1',
        'ca_marks.*' => 'required|integer|max:2',

    ];

    public function mount()
    {
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
    // public function updateCourses(){
    //     $query = course::all();
    //     $this->courses = course::where('level_id', $this->level)
    //                             ->Where('semester_id', $this->semester)
    //                             ->get();
    //     // $this->courses = course::where('semester_id', $this->semester)->get();
    // }
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
    // public function updated($propertyName)
    // {
    //     // dump($this->$propertyName);

    //     $this->validateOnly($propertyName);
    // }


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
        $this->validate();
        // enable the query log for the default connection
        DB::connection()->enableQueryLog();
        // // enable the query log
        DB::enableQueryLog();

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
                // update the record with the ca_mark and exam_mark values
                $updated = $updated && $course_student->update([
                    'ca_marks' => $this->ca_marks[$index],
                    'exam_marks' => $this->exam_mark[$index],
                    'reseat_mark' => $this->reseat_mark[$index],
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
