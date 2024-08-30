<?php

namespace App\Http\Controllers;

use App\Models\academic_year;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function startNewAcademicYear()
    {
        // dd(1);
        $currentYear = date('Y');
        $currentMonth = date('m');

        $nextYear = $currentYear + 1;
        if ($currentMonth == 8) {
            academic_year::create([
                'name' => $currentYear . '-' . $nextYear,
                'start_date' => $currentYear . '-08-01',
                'end_date' => $nextYear . '-07-31',
            ]);
            notify()->success('Nouvelle Annee academique Creer avec succès');
            return redirect()->back();
        }
        else{
            notify()->success('Vous ne pouvez pas creer une nouvelle annee presentement');
            return redirect()->back();
        }
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
            $academic_year = strip_tags($request->input('name'));
            $start_date = date('Y-m-d', strtotime(strip_tags($request->input('start_date'))));
            // $start_date = strip_tags($request->input('start_date'));
            $end_date = date('Y-m-d', strtotime(strip_tags($request->input('start_date'))));
            // $end_date = strip_tags($request->input('end_date'));
            $academic_year_obj = new academic_year();
            $academic_year_obj->name = $academic_year;
            $academic_year_obj->start_date = $start_date;
            $academic_year_obj->end_date = $end_date;
            $academic_year_obj->save();
        });
        notify()->success('Annee academique Creer avec succès');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(academic_year $academic_year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(academic_year $academic_year)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, academic_year $academic_year)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(academic_year $academic_year)
    {
        //
    }
}
