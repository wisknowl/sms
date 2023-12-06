<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\course_student;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty;
use App\Models\unite_enseignement;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = course::all();
        $levels = level::all();
        $semesters = semester::all();
        $ues = unite_enseignement::all();
        $specialties = specialty::all();

        return view('notes.index', compact('levels', 'courses', 'semesters', 'ues', 'specialties'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course_student $course_student)
    {
        //
    }
}
