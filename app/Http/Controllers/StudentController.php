<?php

namespace App\Http\Controllers;

use App\Models\academic_year;
use Session;

use Illuminate\View\View;
use App\Models\specialty;
use App\Models\unite_enseignement;
use App\Models\course;
use App\Models\course_student;
use App\Models\cycle;
use App\Models\level;
use App\Models\semester;
use App\Models\student;
use App\Models\student_level;
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
        $specialties = specialty::all();
        $cycles = cycle::all();
        $semesters = semester::all();
        $academic_years = academic_year::all();
        $levels = level::all();
        $students = student::orderBy('id', 'desc')->get();
        $labels = $students->pluck('matricule')->toArray();
        $data = $students->pluck('id')->toArray();
        return view('students.index', compact('levels', 'cycles', 'academic_years', 'semesters', 'specialties', 'students', 'labels'));
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
        $matricule = $this->generateMatricule($dob);
        //check if the cycle_id corresponds to the specialty_cycle_id
        $specialty = specialty::find($specialty_id);
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
        // dd($result);
        

// dd($dob, $year, $month);
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
            return "$previousYear-$currentYear";
        }
    }


    // Define the constants for the school name, the sequence length, and the starting number
    const SCHOOL_NAME = 'ISIG';
    const SEQUENCE_LENGTH = 4;
    const STARTING_NUMBER = 1000;

    // Define the generateMatricule function
    function generateMatricule($dob)
    {
        $year = date('y');
        $count = Student::count();
        $sequence = StudentController::STARTING_NUMBER + $count;
        $sequence = str_pad($sequence, StudentController::SEQUENCE_LENGTH, '0', STR_PAD_LEFT);
        $date = Carbon::parse($dob);
        $sequence = $date->format('my');
        $matricule = $year . StudentController::SCHOOL_NAME . $sequence;
        // dd($matricule);
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
    // public function update(Request $request, student $student)
    // {
    //     //
    // }
    public function updateStudent(Request $request)
    {
        $student_id = strip_tags($request->input('id'));
        $upMatricule = strip_tags($request->input('upMatricule'));
        $name = strip_tags($request->input('upName'));
        $email = strip_tags($request->input('upEmail'));
        $mobile = strip_tags($request->input('upMobile'));
        $dob = date('Y-m-d', strtotime(str_replace('/', '-', strip_tags($request->input('upDob')))));
        $gender = strip_tags($request->input('upGender'));
        $pob = strip_tags($request->input('upPob'));
        $cycle_id = strip_tags($request->input('upCycle_id'));

// dd($dob);
        // Validate the request data
        $request->validate([
            // Your validation rules here
        ]);


        // Find the model by id
        $student = student::findOrFail($student_id);
        // Get the old and new specialty and level ids
        // $old_specialty_id = $student->specialty_id;
        $new_specialty_id = $request->input('upSpecialty_id');
        // $old_level_id = $student->levels()->wherePivot('academic_year', $this->getAcademicYear())->first()->id;
        // $new_level_id = strip_tags($request->input('upLevel_id'));

        // Update the model
        $updated = $student->update([
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
            'dob' => $dob,
            'mobile' => $mobile,
            'matricule' => $upMatricule,
            'specialty_id' => $new_specialty_id,
            'pob' => $pob,
            'cycle_id' => $cycle_id,
        ]);

        // If the specialty has changed, delete the old ues and courses and attach the new ones
        // if ($old_specialty_id != $new_specialty_id || $old_level_id != $new_level_id) {
        //     // Delete the old ues
        //     // $student->ues()->whereHas('ue', function ($query) use ($old_specialty_id) {
        //     //     $query->where('specialty_id', $old_specialty_id);
        //     // })->detach();
        //     $re = student_ue::where('student_id', $student_id)->whereHas('ue', function ($query) use ($old_specialty_id) {
        //         $query->where('specialty_id', $old_specialty_id);
        //     })->delete();
        //     $tes = student_ue::where('student_id', $student_id)->whereHas('ue', function ($query) use ($old_specialty_id) {
        //         $query->where('specialty_id', $old_specialty_id);
        //     })->pluck('id')->toArray();
        //     // Delete the old courses
        //     $test = course_student::where('student_id', $student_id)->delete();
        //     // Get the new ues and courses ids
        //     $ue_ids = unite_enseignement::where('specialty_id', $new_specialty_id)->where('level_id', $new_level_id)->pluck('id')->toArray();
        //     $course_ids = course::whereIn('ue_id', $ue_ids)->pluck('id')->toArray();
        //     // dd($ue_ids, $course_ids);

        //     // Attach the new ues and courses
        //     $timestamp = Carbon::now()->format('Y-m-d H:i:s');
        //     $student->ues()->sync($ue_ids, ['created_at' => $timestamp, 'updated_at' => $timestamp]);
        //     $student->course()->sync($course_ids, ['created_at' => $timestamp, 'updated_at' => $timestamp]);
        // }

        // // If the level has changed, update the student's level
        // if ($old_level_id != $new_level_id) {
        //     // dd($old_level_id, $new_level_id);
        //     $student->levels()->updateExistingPivot($old_level_id, ['level_id' => $new_level_id, 'academic_year' => $this->getAcademicYear(), 'pass_mark' => 50]);
        // }

        // $st_ues = student_ue::where('student_id', $student_id);
        // $deleted = $st_ues->whereHas('ue', function ($query) use ($specialty_id) {
        //     $query->where('specialty_id', '!=', $specialty_id);
        // })->delete();

        // if ($deleted > 0) {
        //     // dd($deleted);
        //     $st_courses = course_student::where('student_id', $student_id);
        //     $st_courses->delete();
        //     dd($deleted,  $st_courses->delete());
        // } else {
        //     // deletion failed or no records matched the condition
        // }


        // $level = level::find($level_id);
        // $id = $level->id;
        // $ue_ids =  unite_enseignement::where('specialty_id', $specialty_id)->where('level_id', $id)->pluck('id')->toArray();
        // $result = array();
        // foreach ($ue_ids as $ue_id) {
        //     $course_id = course::where('ue_id', $ue_id)->get()->pluck('id')->toArray();
        //     $result = array_merge($result, $course_id);
        // }
        // $ayear = $this->getAcademicYear();
        // try {
        //     $timestamp = Carbon::now()->format('Y-m-d H:i:s');
        //     $student = student::find($student_id);
        //     $student->ues()->attach($ue_ids, ['created_at' => $timestamp, 'updated_at' => $timestamp]);
        //     $student->course()->attach($result, ['created_at' => $timestamp, 'updated_at' => $timestamp]);
        // } catch (\Carbon\Exceptions\InvalidFormatException $e) {
        //     echo $e->getMessage();
        // }
        // $st_level = student_level::where('student_id', $student_id)->where('academi_year', $ayear);
        // $st_level->where('academi_year', $ayear)->delete();
        // $updlev = $student->levels()->updateExistingPivot($level, ['academic_year' => $ayear, 'pass_mark' => 50]);
        // if ($updlev) {
        //     dd(1);
        // }
        if ($updated) {
            // flash a success message
            notify()->success('L\'information sur L\'Etudiant a été modifier avec succès');
        } else {
            // flash an error message
            notify()->success('Something went wrong', 'Error');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //
    }
}
