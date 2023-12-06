<?php

namespace App\Livewire;

use App\Models\course;
use App\Models\course_student;
use App\Models\student;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty;
use App\Models\unite_enseignement;
use Illuminate\Http\Request;

use Livewire\Component;

class StudentMarks extends Component
{
    public $specialty;
    public $course;
    public $courses = [];
    public $students;

    public function mount()
    {
        // get the first specialty from the database
        $first_specialty = Specialty::first();

        // set the $specialty property to the first specialty id
        $this->specialty = $first_specialty->id;

        // update the courses based on the first specialty
        $this->updateCourses();

        // get the first course from the courses array
        $first_course = $this->courses[0];

        // set the $course property to the first course id
        $this->course = $first_course->id;

        $this->updateStudents();
    }
    public function updateCourses()
    {
        // query for the courses based on the selected specialty
        // find the specialty by id
        $specialty = Specialty::find($this->specialty);

        // get the ids of the unite_enseignement related to the specialty
        $ue_ids = $specialty->ues->pluck('id')->toArray();

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
    }

    public function updateStudents()
    {
        // query for the students based on the selected course
        $this->students = Student::whereHas('course', function ($query) {
            $query->where('course_id', $this->course);
        })->get();
    }
    public function render(Request $request)
    {
        $courses = course::all();
        $levels = level::all();
        $semesters = semester::all();
        $ues = unite_enseignement::all();
        $specialties = specialty::all();
        // query for the students based on the selected course
        return view('livewire.student-marks', compact('levels', 'semesters', 'ues', 'specialties'));
    }
}
// if ($request->has('specialty_id') && !empty($request->input('specialty_id'))) {
//     $specialty_id = $request->input('specialty_id');
//     $specialty = specialty::find($specialty_id);
//     $ue_ids = $specialty->ues->pluck('id')->toArray();

//     foreach ($ue_ids as $ue_id) {
//         $course_id = course::where('ue_id', $ue_id)->get()->pluck('id')->toArray();
//         // echo '<pre>';
//         // print_r($course_id);
//         // echo '</pre>';

//         // Merge the $course_id array with the $result array
//         $results = array_merge($results, $course_id);
//     }
// }
// // echo '<pre>';
// // print_r($results);
// // echo '</pre>';
// // die();
