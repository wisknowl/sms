<?php

namespace App\Http\Controllers;
use Session;

use App\Models\proces_verbal;
use App\Models\academic_year;
use App\Models\course;
use App\Models\course_student;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty;
use App\Models\unite_enseignement;
use Illuminate\Support\Facades\DB;
use App\Models\relever;
use Illuminate\Http\Request;
use App\Traits\HandlesYearAndSemester;


class ReleverController extends Controller
{
    use HandlesYearAndSemester;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->handleYearAndSemester($request);
        $semesters = $data['semesters'];
        $academic_years = $data['academic_years'];

        $courses = course::all();
        $levels = level::all();
        $semesters = semester::all();
        $academic_years = academic_year::all();
        $a_year = $request->input('select_input');
        // dd($a_year);
        // die();
        $ues = unite_enseignement::all();
        $specialties = specialty::all();

        return view('relever.index', compact('levels', 'courses', 'academic_years', 'a_year',  'semesters', 'ues', 'specialties'));
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
    public function show(relever $relever)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(relever $relever)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, relever $relever)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(relever $relever)
    {
        //
    }
}
