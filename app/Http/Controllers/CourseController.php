<?php

namespace App\Http\Controllers;

use Session;
use App\Models\academic_year;
use Illuminate\View\View;
use App\Models\semester;
use App\Models\level;
use App\Models\specialty;
use App\Models\unite_enseignement;
use App\Models\course;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Livewire\Features\SupportFormObjects\Form;
use Carbon\Carbon;

class CourseController extends Controller
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
        $courses = course::all();
        $levels = level::all();
        $academic_years = academic_year::all();
        $semesters = semester::all();
        $ues = unite_enseignement::all();
        $specialties = Specialty::with('ues')->get();
        // $dropdown_data = [];
        // foreach ($specialties as $specialty) {
        //     $dropdown_data[$specialty->name] = $specialty->ues->pluck('name', 'id');
        // }
        $dropdown_data = [];
        foreach ($specialties as $specialty) {
            // dd($specialty);
            foreach ($specialty->ues as $ue) {
                $dropdown_data[$ue->id] = $ue->name;
            }
        }
        // dd($dropdown_data);
        return view('cours.index', compact('levels', 'courses', 'academic_years', 'semesters', 'ues', 'dropdown_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $course = strip_tags($request->input('name'));
            $code = strip_tags($request->input('code'));
            $credit_point = strip_tags($request->input('credit_point'));
            $duration = strip_tags($request->input('duration'));
            $cost_per_hour = strip_tags($request->input('cost_per_hour'));
            $course_nature = strip_tags($request->input('course_nature'));
            $ue_id = strip_tags($request->input('ue_id'));
            $level = strip_tags($request->input('level'));
            $semester = strip_tags($request->input('semester'));
            $description = strip_tags($request->input('description'));
            $course_obj = new course();
            $course_obj->name = $course;
            $course_obj->code = $code;
            $course_obj->credit_points = $credit_point;
            $course_obj->duration = $duration;
            $course_obj->cost_per_hour = $cost_per_hour;
            $course_obj->course_nature = $course_nature;
            $course_obj->ue_id = $ue_id;
            $course_obj->level_id = $level;
            $course_obj->semester_id = $semester;
            $course_obj->description = $description;
            $course_obj->save();

            $course_id = $course_obj->id;
            $specialty_ids = unite_enseignement::where('id', $ue_id)->pluck('specialty_id')->toArray();
            $result = array();
            foreach ($specialty_ids as $specialty_id) {
                $student_id = student::where('specialty_id', $specialty_id)->pluck('id')->toArray();
                $result = array_merge($result, $student_id);
            }
            $query = student::whereIn('id', $result);
            $year_session = Session::get('year_name');

            $students = $query->whereHas('levels', function ($query)  use ($level,$year_session) {
                $query->where('academic_year', $year_session)->where('level_id', $level);
            })->get();
            foreach ($students as $student) {
                $timestamp = Carbon::now()->format('Y-m-d H:i:s');
                $student->course()->syncWithoutDetaching($course_id, ['created_at' => $timestamp, 'updated_at' => $timestamp]);
            }
        });
        notify()->success('Cours Creer avec succès');
        return redirect()->back();
        //->with('success', 'Cours Creer avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, course $course)
    // {
    //     //
    // } 
    public function updateCo(Request $request)
    {
        $course_name = strip_tags($request->input('upName'));
        $course_id = strip_tags($request->input('id'));
        $code = strip_tags($request->input('upCode'));
        $credit_point = strip_tags($request->input('upCredit_point'));
        $cost_per_hour = strip_tags($request->input('cost_per_hour'));
        $duration = strip_tags($request->input('duration'));
        $level = strip_tags($request->input('upLevel'));
        $semester = strip_tags($request->input('upSemester'));
        $course_nature = strip_tags($request->input('upCourse_nature'));
        $ue_id = strip_tags($request->input('upue_id'));
        $description = strip_tags($request->input('upDescription'));
        // dd($ue_id);
        // Validate the request data
        $request->validate([
            // Your validation rules here
        ]);

        // Find the model by id
        $course = course::findOrFail($course_id);

        // Update the model
        $updated = $course->update([
            'name' => $course_name,
            'code' => $code,
            'credit_points' => $credit_point,
            'description' => $description,
            'duration' => $duration,
            'cost_per_hour' => $cost_per_hour,
            'course_nature' => $course_nature,
            'level_id' => $level,
            'semester_id' => $semester,
            'ue_id' => $ue_id,
        ]);

        if ($updated) {
            // flash a success message
            notify()->success('Le Cours a été modifier avec succès');
        } else {
            // flash an error message
            notify()->success('Something went wrong', 'Error');
        }
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course $course)
    {
        //
    }
}
