<?php

namespace App\Http\Controllers;

use App\Models\specialty_ue;
use Illuminate\Http\Request;

class SpecialtyUeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('specialty_ue.index');
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
