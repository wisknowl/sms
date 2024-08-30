<?php

namespace App\Http\Controllers;

use Session;
use App\Exports\Ues;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\academic_year;
use App\Models\course_nature;
use Illuminate\View\View;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty;
use App\Models\student;
use App\Models\unite_enseignement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class usercontroller extends Controller
{
    public function index(Request $request): view
    {
        if ($request->has('year_id') && !empty($request->input('year_id'))) {
            $year_id = $request->input('year_id');
            $year_name = academic_year::where('id', $year_id)->value('name');
            Session::put('year_name', $year_name);
            Session::put('year_id', $year_id);
        } else {
            // Use the session value as the default value
            $year_id = Session::get('year_id');
            $year_name = Session::get('year_name');
        }
        if ($request->has('semester_id') && !empty($request->input('semester_id'))) {
            $semester_id = $request->input('semester_id');
            $semester_name = semester::where('id', $semester_id)->value('name');
            Session::put('semester_name', $semester_name);
            Session::put('semester_id', $semester_id);
        } else {
            // Use the session value as the default value
            $semester_id = Session::get('semester_id');
            $semester_name = Session::get('semester_name');
        }
        $academic_years = academic_year::all();
        $semesters = semester::all();

        return view('users.index', compact('academic_years', 'semesters',));
    }
}
