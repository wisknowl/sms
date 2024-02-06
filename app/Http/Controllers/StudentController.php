<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\View\View;
use App\Models\specialty;
use App\Models\unite_enseignement;
use App\Models\course;
use App\Models\course_student;
use App\Models\cycle;
use App\Models\level;
use App\Models\student;
use App\Models\student_ue;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): view
    {
        $specialties = specialty::all();
        $cycles = cycle::all();
        $levels = level::all();
        $students = student::orderBy('id', 'desc')->get();
        $labels = $students->pluck('matricule')->toArray();
        $data = $students->pluck('id')->toArray();
        return view('students.index', compact('levels', 'cycles', 'specialties', 'students', 'labels'));
    }
    public function getChartData(Request $request)
    {
        $students = student::orderBy('id', 'desc')->get();
        $data = array();
        foreach ($students as $student) {
            $student_id = $student->id;
            $st_ues = student_ue::with('ue')
                ->where('student_id', $student_id)
                ->whereHas('ue', function ($query) use ($student) {
                    $level_id = $student->currentLevel()->id;
                    $query->where('level_id', $level_id)->where('semester_id', Session::get('semester_id'));
                })->get();
            $courses = course_student::with('course')
                ->where('student_id', $student_id)
                ->whereHas('course', function ($query) use ($student) {
                    $level_id = $student->currentLevel()->id;
                    $query->where('level_id', $level_id);
                })->get();
            $ue_credit_sum = 0;
            $ue_sum = 0;
            foreach ($st_ues as $st_ue) {
                $course_sum = 0;
                $course_credit_sum = 0;
                foreach ($courses as $course) {
                    if ($course->course->ue_id == $st_ue->ue->id) {

                        if ($course->exam_marks < $course->reseat_mark) {
                            $course_mark = (((((($course->ca_marks) / 20) * 30) + ((($course->reseat_mark) / 20) * 70)) / 100) * 20);
                        } else {
                            $course_mark = (((((($course->ca_marks) / 20) * 30) + ((($course->exam_marks) / 20) * 70)) / 100) * 20);
                        }
                        $course_credit_multiply = $course_mark * $course->course->credit_points;
                        $course_sum = $course_sum + $course_credit_multiply;
                        $course_credit_sum = $course_credit_sum + $course->course->credit_points;
                    }
                }
                $ue_mark = $course_sum / $course_credit_sum;
                $ue_credit_multiply = $ue_mark * $st_ue->ue->credit_points;
                $ue_sum = $ue_sum + $ue_credit_multiply;
                $ue_credit_sum = $ue_credit_sum + $st_ue->ue->credit_points;
            }
            $std_avg = $ue_sum / $ue_credit_sum;
            $data[] = $std_avg;
        }
        $labels = $students->pluck('matricule')->toArray();
        $student_name = $students->pluck('name')->toArray();
        // $data = $students->pluck('id')->toArray();

        // Return the data as a JSON response
        return response()->json([
            'student_name' => $student_name,
            'labels' => $labels,
            'data' => $data,
        ]);
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

        // $ue_ids = $specialty->ues->pluck('id')->toArray();
        $ue_ids =  unite_enseignement::where('specialty_id', $specialty_id)->where('level_id', $id)->pluck('id')->toArray();
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
        // $ue_ids =  unite_enseignement::where('specialty_id', $specialty_id)->where('level_id',$id)->pluck('name')->toArray();
        // echo '<pre>';
        // print_r($ue_ids);
        // echo '</pre>';
        // die();

        $ayear = $this->getAcademicYear();


        try {
            $timestamp = Carbon::now()->format('Y-m-d H:i:s');
            $student = student::find($student_id);
            $student->ues()->attach($ue_ids, ['created_at' => $timestamp, 'updated_at' => $timestamp]);
            $student->course()->attach($result, ['created_at' => $timestamp, 'updated_at' => $timestamp]);
        } catch (\Carbon\Exceptions\InvalidFormatException $e) {
            echo $e->getMessage();
        }

        $student->levels()->attach($level, ['academic_year' => $ayear, 'pass_mark' => 50]);
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
