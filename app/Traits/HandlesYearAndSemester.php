<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\academic_year;
use App\Models\Semester;

trait HandlesYearAndSemester
{
    public function handleYearAndSemester(Request $request)
    {
        // Handle year logic
        if ($request->has('year_id') && !empty($request->input('year_id'))) {
            $year_id = $request->input('year_id');
            $year_name = academic_year::where('id', $year_id)->value('name');
            Session::put('year_name', $year_name);
            Session::put('year_id', $year_id);
        } else {
            $year_id = Session::get('year_id');
            $year_name = Session::get('year_name');
        }

        // Handle semester logic
        if ($request->has('semester_id') && !empty($request->input('semester_id'))) {
            $semester_id = $request->input('semester_id');
            $semester_name = Semester::where('id', $semester_id)->value('name');
            Session::put('semester_name', $semester_name);
            Session::put('semester_id', $semester_id);
        } else {
            $semester_id = Session::get('semester_id');
            $semester_name = Session::get('semester_name');
        }

        // Get all semesters and academic years
        $semesters = Semester::all();
        $academic_years = academic_year::orderby('name')->get();

        // Return values as an array for use in the controller
        return compact('year_id', 'year_name', 'semester_id', 'semester_name', 'semesters', 'academic_years');
    }
}

?>