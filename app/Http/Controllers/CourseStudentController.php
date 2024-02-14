<?php

namespace App\Http\Controllers;

use Session;
use App\Models\academic_year;
use App\Models\course;
use App\Models\course_student;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty;
use App\Models\unite_enseignement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CourseStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
        $semesters = semester::all();
        $academic_years = academic_year::all();
        $a_year = $request->input('select_input');
        // dd($a_year);
        // die();
        $ues = unite_enseignement::all();
        $specialties = specialty::all();

        return view('notes.index', compact('levels', 'courses', 'academic_years', 'a_year',  'semesters', 'ues', 'specialties'));
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
    public function store(Request $request)
    {
        $a_year = academic_year::find($request->input('select_input'));
        dd($a_year);
        die();
        return view('notes.index', compact('a_year'));
    }

    /**
     * Display the specified resource.
     */
    public function show(course_student $course_student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(course_student $course_student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, course_student $course_student)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course_student $course_student)
    {
        //
    }
}
