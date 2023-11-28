<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\specialty;
use App\Models\unite_enseignement;
use App\Models\specialty_ue;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SpecialtyUeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $specialty_ues = specialty_ue::with('specialty', 'ue')->get();
        $specialties = specialty::all();
        $ues = unite_enseignement::all();
        return view('specialty_ue.index', compact('specialty_ues','specialties', 'ues'));
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
            $id = strip_tags($request->input('specialty'));
            $specialty_ue = $request->input('specialty_ue');
            $specialty_ue = array_map('strip_tags', $specialty_ue);
            // dd ($request->all ());
            $first_item = array_shift ($specialty_ue);
            // echo '<pre>';
            // print_r($specialty_ue);
            // echo '</pre>';
            // die ();
            $specialty_ue_obj = new specialty();
            $timestamp = Carbon::now()->format('Y-m-d H:i:s');
            $specialty = specialty::find($id);
            $specialty->ues()->attach($specialty_ue,['created_at' => $timestamp, 'updated_at' => $timestamp]);
        });
        notify()->success('Affectation terminer');
        return redirect()->back();
        // return redirect()->back()->with('success', 'Specialite Creer avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(specialty_ue $specialty_ue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(specialty_ue $specialty_ue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, specialty_ue $specialty_ue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(specialty_ue $specialty_ue)
    {
        //
    }
}
