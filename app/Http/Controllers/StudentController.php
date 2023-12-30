<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\specialty;
use App\Models\unite_enseignement;
use App\Models\course;
use App\Models\course_student;
use App\Models\cycle;
use App\Models\level;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $specialties = specialty::all();
        $cycles = cycle::all();
        $levels = level::all();
        $students = student::orderBy('id', 'desc')->get();
        return view('students.index', compact('levels', 'cycles', 'specialties', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validate the request data
        // $request->validate([
        //     'name' => 'required|string',
        //     'specialty' => 'required|int',
        // ]);
        // Get the name and specialty from the request
        $name = strip_tags($request->input('name'));
        $email = strip_tags($request->input('email'));
        $mobile = strip_tags($request->input('mobile'));
        $dob = date('Y-m-d', strtotime(str_replace('/', '-', strip_tags($request->input('dob')))));
        $gender = strip_tags($request->input('gender'));
        $pob = strip_tags($request->input('pob'));
        $cycle_id = strip_tags($request->input('cycle_id'));
        $specialty_id = $request->input('specialty_id');
        $level_id = strip_tags($request->input('level_id'));
        // dd ($request->all (), $dob);
        // Call the generateMatricule function without any arguments
        $matricule = $this->generateMatricule();
        // Create a new student with the name, specialty, and matricule
        $student_obj = new Student();
        $student_obj->name = $name;
        $student_obj->email = $email;
        $student_obj->mobile = $mobile;
        $student_obj->dob = $dob;
        $student_obj->gender = $gender;
        $student_obj->pob = $pob;
        $student_obj->cycle_id = $cycle_id;
        $student_obj->specialty_id = $specialty_id;
        $student_obj->matricule = $matricule;
        // Save the student to the database
        $student_obj->save();
        // Get the id of the student
        $student_id = $student_obj->id;

        // Get courses of the specialty
        $level = level::find($level_id);
        $id = $level->id;
        $specialty = specialty::find($specialty_id);
        // die($specialty);

        $ue_ids = $specialty->ues->pluck('id')->toArray();
        // echo '<pre>';
        // print_r($ue_ids);
        // echo '</pre>';

        // Initialize an empty array to store the final result
        $result = array();
        foreach ($ue_ids as $ue_id) {
            $course_id = course::where('ue_id', $ue_id)->get()->pluck('id')->toArray();
            // echo '<pre>';
            // print_r($course_id);
            // echo '</pre>';

            // Merge the $course_id array with the $result array
            $result = array_merge($result, $course_id);
        }
        // Print the final result
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        // die();

        // $courses = Course::whereIn('id', $courseIds)->get();
        // $course_id = $courses->pluck('id')->toArray();
        // echo '<pre>';
        // print_r($course_id);
        // echo '</pre>';
        $ayear = $this->getAcademicYear();

        $timestamp = Carbon::now()->format('Y-m-d H:i:s');
        $student = student::find($student_id);
        $student->course()->attach($result, ['created_at' => $timestamp, 'updated_at' => $timestamp]);

        $student->levels()->attach($level, [
            'academic_year' => $ayear,
            'pass_mark' => 50
        ]);
        // Return a response with the student data and a success message
        notify()->success('Etudiant inscrire avec succès');
        return redirect()->back();
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


    // Define the constants for the school name, the sequence length, and the starting number
    const SCHOOL_NAME = 'ISIG';
    const SEQUENCE_LENGTH = 4;
    const STARTING_NUMBER = 1000;

    // Define the generateMatricule function
    function generateMatricule()
    {
        // Get the last two digits of the current year
        $year = date('y');
        // Get the count of the students in the database, or zero if none exists
        $count = Student::count();
        // Add the count to the starting number to get the sequence number
        $sequence = StudentController::STARTING_NUMBER + $count;
        // Pad the sequence number with zeros to match the sequence length
        $sequence = str_pad($sequence, StudentController::SEQUENCE_LENGTH, '0', STR_PAD_LEFT);
        // Concatenate the year, school name, and sequence to form the matricule
        $matricule = $year . StudentController::SCHOOL_NAME . $sequence;
        // Return the matricule
        return $matricule;
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //
    }
}
