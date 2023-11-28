<?php

namespace App\Http\Controllers;

use App\Models\semester;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('semesters.index');
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
            $semester = strip_tags($request->input('semester'));
            $start_date = date('Y-m-d', strtotime(strip_tags($request->input('start_date'))));
            // $start_date = strip_tags($request->input('start_date'));
            $end_date = date('Y-m-d', strtotime(strip_tags($request->input('start_date'))));
            // $end_date = strip_tags($request->input('end_date'));
            $semester_obj = new semester();
            $semester_obj->name=$semester;
            $semester_obj->start_date=$start_date;
            $semester_obj->end_date=$end_date;
            $semester_obj->save();
        });
        notify()->success('Semestre Creer avec succès');
        return redirect()->back();
        // return redirect()->route('levels.index');
        //return redirect()->back()->with('success', 'Semestre Creer avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(semester $semester)
    {
        //
    }
}
