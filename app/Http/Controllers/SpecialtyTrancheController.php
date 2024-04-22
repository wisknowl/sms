<?php

namespace App\Http\Controllers;

use App\Models\level;
use App\Models\specialty;
use App\Models\specialty_tranche;
use App\Models\tranche;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Database\QueryException;



class SpecialtyTrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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

        // DB::transaction(function () use ($request) {
            $specialty_id = strip_tags($request->input('id'));
            $tranche_id = strip_tags($request->input('tranche_id'));
            $level_id = strip_tags($request->input('level_id'));
            $period = strip_tags($request->input('period'));
            $montant = strip_tags($request->input('montant'));

            $tranche_name = tranche::find($tranche_id)->name;
            $specialty_name = specialty::find($specialty_id)->name;
            $level_name = level::find($level_id)->name;
            try {
                $specialty_tranchey_obj = new specialty_tranche();
                $specialty_tranchey_obj->specialty_id = $specialty_id;
                $specialty_tranchey_obj->tranche_id = $tranche_id;
                $specialty_tranchey_obj->tranche_amount = $montant;
                $specialty_tranchey_obj->period = $period;
                $specialty_tranchey_obj->level_id = $level_id;
                $specialty_tranchey_obj->save();
            } catch (QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode ==  1062) {
                    if ($tranche_name == 'inscription') {
                        $tranche_name = 'Inscription';
                    } 
                    if ($tranche_name == 'first') {
                        $tranche_name = '1ere Tranche';
                    } 
                    if ($tranche_name == 'second') {
                        $tranche_name = '2eme Tranche';
                    } 
                    if ($tranche_name == 'third') {
                        $tranche_name = '3eme Tranche';
                    } 
                    notify()->error('Vous avez déjà créé' . ' ' . $tranche_name . ' ' . 'pour' . ' ' . $specialty_name . ' ' . 'Niveau' . ' ' . $level_name . ' ' . 'Cour du ' . $period);
                    return redirect()->back();
                }
            }
            
        // });
        
        notify()->success('Tranche Creer avec succès');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(specialty_tranche $specialty_tranche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(specialty_tranche $specialty_tranche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, specialty_tranche $specialty_tranche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(specialty_tranche $specialty_tranche)
    {
        //
    }
}
