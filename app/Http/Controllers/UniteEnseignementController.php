<?php

namespace App\Http\Controllers;

use App\Exports\Ues;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\academic_year;
use App\Models\course_nature;
use Illuminate\View\View;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty;
use App\Models\unite_enseignement;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class UniteEnseignementController extends Controller
{
    public function export()
    {
        return Excel::download(new Ues, 'ues.xlsx');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): view
    {
        $academic_years = academic_year::all();
        $ues = unite_enseignement::orderBy('id', 'desc')
            ->when($request->input('level'), function ($query) use ($request) {
                return $query->where('level_id', $request->input('level'));
            })
            ->when($request->input('specialty'), function ($query) use ($request) {
                return $query->where('specialty_id', $request->input('specialty'));
            })
            ->get();
        $levels = level::all();
        $course_natures = course_nature::all();
        $specialties = specialty::all();
        $semesters = semester::all();

        return view('uniteEseignements.index', compact('ues', 'levels', 'academic_years', 'semesters', 'specialties', 'course_natures'));
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
            $course_nature = strip_tags($request->input('course_nature'));
            $specialty = strip_tags($request->input('specialty'));
            $description = strip_tags($request->input('description'));
            $ue_obj = new unite_enseignement();
            $ue_obj->name = $ue;
            $ue_obj->code = $code;
            $ue_obj->credit_points = $credit_point;
            $ue_obj->level_id = $level;
            $ue_obj->semester_id = $semester;
            $ue_obj->course_nature_id = $course_nature;
            $ue_obj->specialty_id = $specialty;
            $ue_obj->description = $description;
            $ue_obj->save();
        });
        notify()->success('Unite Denseignement Creer avec succès');
        return redirect()->back();
        // return redirect()->back()->with('success', 'Unite Denseignement Creer avec succès');
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
    public function updateo(Request $request)
{
    // Validate the input data
    $validatedData = $request->validate([
        'id' => 'required|exists:ues,id',
        'name' => 'required',
        'email' => 'required|email',
    ]);

    // Find the model by id
    $ue = Ue::find($validatedData['id']);
    // Update the model with the input data
    $ue->update($validatedData);

    // Return a JSON response with a message
    return response()->json([
        'message' => 'Model updated successfully'
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(unite_enseignement $unite_enseignement)
    {
        //
    }
}
