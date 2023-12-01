<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\semester;
use App\Models\level;
use App\Models\unite_enseignement;
use App\Models\course;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(): view
    {
        $courses = course::all();
        $levels = level::all();
        $semesters = semester::all();
        $ues = unite_enseignement::all();
        
        return view('cours.index', compact('levels','courses','semesters','ues'));
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
            $course_obj->name=$course;
            $course_obj->code=$code;
            $course_obj->credit_points=$credit_point;
            $course_obj->duration=$duration;
            $course_obj->cost_per_hour=$cost_per_hour;
            $course_obj->course_nature=$course_nature;
            $course_obj->ue_id=$ue_id;
            $course_obj->level_id=$level;
            $course_obj->semester_id=$semester;
            $course_obj->description=$description;
            $course_obj->save();
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
    public function update(Request $request, course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course $course)
    {
        //
    }
}
