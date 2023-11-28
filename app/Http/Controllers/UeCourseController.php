<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\unite_enseignement;
use App\Models\course;
use App\Models\ue_course;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UeCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $ue_courses = ue_course::with('ue', 'course')->get();
        $ues = unite_enseignement::all();
        $courses = course::all();
        return view('ue_cours.index', compact('ue_courses','ues', 'courses'));
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
            $id = strip_tags($request->input('ue'));
            $ue_course = $request->input('ue_course');
            $ue_course = array_map('strip_tags', $ue_course);
            // dd ($request->all ());
            $first_item = array_shift ($ue_course);
            // echo '<pre>';
            // print_r($ue_course);
            // echo '</pre>';
            // die ();
            
            $timestamp = Carbon::now()->format('Y-m-d H:i:s');
            $unite_enseignement = unite_enseignement::find($id);
            $unite_enseignement->course()->attach($ue_course,['created_at' => $timestamp, 'updated_at' => $timestamp]);
        });
        notify()->success('Affectation terminer');
        return redirect()->back();
        // return redirect()->back()->with('success', 'Specialite Creer avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(ue_course $ue_course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ue_course $ue_course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ue_course $ue_course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ue_course $ue_course)
    {
        //
    }
}
