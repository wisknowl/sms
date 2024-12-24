<?php

namespace App\Http\Controllers;

use App\Models\paper;
use Session;
use App\Models\academic_year;
use Illuminate\View\View;
use App\Models\semester;
use App\Models\level;
use App\Models\specialty;
use App\Models\unite_enseignement;
use App\Models\course;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Livewire\Features\SupportFormObjects\Form;
use Carbon\Carbon;
use App\Traits\HandlesYearAndSemester;

class PaperController extends Controller
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

        $courses = course::all();
        $levels = level::all();
        
        $ues = unite_enseignement::all();
        $specialties = Specialty::with('ues')->get();
        return view('bts_blanc.index', compact('levels', 'courses', 'academic_years', 'semesters', 'ues'));
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
            $paper = strip_tags($request->input('name'));
            $credit_point = strip_tags($request->input('credit_point'));
            $level_id = strip_tags($request->input('level'));
            $semester_id = strip_tags($request->input('semester'));
            $specialty_id = strip_tags($request->input('specialty'));
            // dd($paper, $credit_point, $level, $semester, $specialty);

            $paper_obj = new paper();
            $paper_obj->name = $paper;
            $paper_obj->credit_points = $credit_point;
            $paper_obj->level_id = $level_id;
            $paper_obj->semester_id = $semester_id;
            $paper_obj->specialty_id = $specialty_id;
            $paper_obj->save();
            $paper_id = $paper_obj->id;
            
            $year_session = Session::get('year_name');
            $query = student::where('specialty_id', $specialty_id);
            $students = $query->whereHas('levels', function ($query)  use ($level_id, $year_session) {
                $query->where('academic_year', $year_session)->where('level_id', $level_id);
            })->get();
            foreach ($students as $student) {
                $timestamp = Carbon::now()->format('Y-m-d H:i:s');
                $student->paper()->syncWithoutDetaching($paper_id, ['created_at' => $timestamp, 'updated_at' => $timestamp]);
            }
        });
        notify()->success('Epreuve de BTS Blanc Creer avec succès');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(paper $paper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(paper $paper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, paper $paper)
    // {
    //     //
    // } 
    public function updateCo(Request $request)
    {
        $course_name = strip_tags($request->input('upName'));
        $course_id = strip_tags($request->input('id'));
        $code = strip_tags($request->input('upCode'));
        $credit_point = strip_tags($request->input('upCredit_point'));
        $cost_per_hour = strip_tags($request->input('cost_per_hour'));
        $duration = strip_tags($request->input('duration'));
        $level = strip_tags($request->input('upLevel'));
        $semester = strip_tags($request->input('upSemester'));
        $course_nature = strip_tags($request->input('upCourse_nature'));
        $ue_id = strip_tags($request->input('upue_id'));
        $description = strip_tags($request->input('upDescription'));
        // dd($ue_id);
        // Validate the request data
        $request->validate([
            // Your validation rules here
        ]);

        // Find the model by id
        $course = course::findOrFail($course_id);

        // Update the model
        $updated = $course->update([
            'name' => $course_name,
            'code' => $code,
            'credit_points' => $credit_point,
            'description' => $description,
            'duration' => $duration,
            'cost_per_hour' => $cost_per_hour,
            'course_nature' => $course_nature,
            'level_id' => $level,
            'semester_id' => $semester,
            'ue_id' => $ue_id,
        ]);

        if ($updated) {
            // flash a success message
            notify()->success('Le Cours a été modifier avec succès');
        } else {
            // flash an error message
            notify()->success('Something went wrong', 'Error');
        }
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course $course)
    {
        //
    }
}
