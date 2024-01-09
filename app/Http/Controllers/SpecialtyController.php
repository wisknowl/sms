<?php

namespace App\Http\Controllers;

use App\Models\academic_year;
use Illuminate\View\View;
use App\Models\cycle;
use App\Models\semester;
use App\Models\specialty;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $semesters = semester::all();
        $academic_years = academic_year::all();
        $cycles = cycle::all();
        $specialties = Specialty::with('cycle')->get();
    
        return view('specialties.index', compact('specialties','academic_years','semesters','cycles'));
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
            $specialty = strip_tags($request->input('title'));
            $code = strip_tags($request->input('code'));
            $cycle = strip_tags($request->input('cycle'));
            $description = strip_tags($request->input('descript'));
            $specialty_obj = new specialty();
            $specialty_obj->name=$specialty;
            $specialty_obj->code=$code;
            $specialty_obj->cycle_id=$cycle;
            $specialty_obj->description=$description;
            $specialty_obj->save();
            $name = $specialty_obj->name;
        });
        notify()->success('Specialité . {{$name}} . Creer avec succès');
        return redirect()->back();
        // return redirect()->back()->with('success', 'Specialite Creer avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(specialty $specialty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, specialty $specialty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(specialty $specialty)
    {
        //
    }
}
