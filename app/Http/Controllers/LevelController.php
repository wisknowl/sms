<?php

namespace App\Http\Controllers;

use App\Models\academic_year;
use Illuminate\View\View;
use App\Models\level;
use App\Models\semester;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $levels = level::all();
        $academic_years = academic_year::all();
        $semesters = semester::all();
        config(['app.name' => 'Niveau']);

        return view('levels.index', compact('levels','academic_years','semesters'));
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
            $level = strip_tags($request->input('level'));
            $description = strip_tags($request->input('description'));
            $level_obj = new level();
            $level_obj->name=$level;
            $level_obj->description=$description;
            $level_obj->save();
        });
        notify()->success('Niveau Creer avec succès');
        return redirect()->back();
        //return redirect()->back()->with('success', 'Niveau Creer avec succès');
        // return redirect()->back()->with('success', 'Operation completed');
    }

    /**
     * Display the specified resource.
     */
    public function show(level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, level $level)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(level $level)
    {
        //
    }
}
