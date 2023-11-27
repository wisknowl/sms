<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\level;
use App\Models\semester;
use App\Models\unite_enseignement;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class UniteEnseignementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $ues = unite_enseignement::all();
        $levels = level::all();
        $semesters = semester::all();
        
        return view('uniteEseignements.index', compact('ues','levels','semesters'));
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
            $ue = strip_tags($request->input('name'));
            $code = strip_tags($request->input('code'));
            $credit_point = strip_tags($request->input('credit_point'));
            $level = strip_tags($request->input('level'));
            $semester = strip_tags($request->input('semester'));
            $description = strip_tags($request->input('description'));
            $ue_obj = new unite_enseignement();
            $ue_obj->name=$ue;
            $ue_obj->code=$code;
            $ue_obj->credit_points=$credit_point;
            $ue_obj->level_id=$level;
            $ue_obj->semester_id=$semester;
            $ue_obj->description=$description;
            $ue_obj->save();
        });
        
        return redirect()->back()->with('success', 'Unite Denseignement Creer avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(unite_enseignement $unite_enseignement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(unite_enseignement $unite_enseignement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, unite_enseignement $unite_enseignement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(unite_enseignement $unite_enseignement)
    {
        //
    }
}
