<?php

namespace App\Http\Controllers;
use Session;
use App\Models\academic_year;
use Illuminate\View\View;
use App\Models\cycle;
use App\Models\semester;
use App\Models\specialty;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Traits\HandlesYearAndSemester;

class SpecialtyController extends Controller
{
    use HandlesYearAndSemester;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): view
    {
        $data = $this->handleYearAndSemester($request);
        $semesters = $data['semesters'];
        $academic_years = $data['academic_years'];
        
        $cycles = cycle::all();
        $specialties = Specialty::with('cycle')->get();

        return view('specialties.index', compact('specialties', 'academic_years', 'semesters', 'cycles'));
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
            $specialty_obj->name = $specialty;
            $specialty_obj->code = $code;
            $specialty_obj->cycle_id = $cycle;
            $specialty_obj->description = $description;
            $specialty_obj->save();
            $name = $specialty_obj->name;
        });
        notify()->success('Specialité Creer avec succès');
        return redirect()->back();
        // return redirect()->back()->with('success', 'Specialite Creer avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $specialty)
    {
        $data = $this->handleYearAndSemester($request);
        $semesters = $data['semesters'];
        $academic_years = $data['academic_years'];
        $specialty = Specialty::findOrFail($specialty);
        return view('specialties.show', compact('specialty','academic_years', 'semesters',));
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
    // public function update(Request $request, specialty $specialty)
    // {
    //     //
    // }

    public function updateSpec(Request $request)
    {
        $specialty_id = strip_tags($request->input('id'));
        $specialty_name = strip_tags($request->input('upName'));
        $code = strip_tags($request->input('upCode'));
        $cycle_id = strip_tags($request->input('cycle_id'));
        $description = strip_tags($request->input('upDescription'));
        // dd($ue_id);
        // Validate the request data
        $request->validate([
            // Your validation rules here
        ]);

        // Get the id from the hidden field
        // $id = $request->input('id');

        // Find the model by id
        $specialty = specialty::findOrFail($specialty_id);

        // Update the model
        $updated = $specialty->update([
            'name' => $specialty_name,
            'description' => $description,
            'code' => $code,
            'cycle_id' => $cycle_id,
        ]); 

        if ($updated) {
            // flash a success message
            notify()->success('Spécialité a été modifier avec succès');
        } else {
            // flash an error message
            notify()->success('Something went wrong', 'Error');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(specialty $specialty)
    {
        //
    }
}
