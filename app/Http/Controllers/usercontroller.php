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
use App\Traits\HandlesYearAndSemester;


class usercontroller extends Controller
{
    use HandlesYearAndSemester;

    public function index(Request $request): view
    {
        $data = $this->handleYearAndSemester($request);
        $semesters = $data['semesters'];
        $academic_years = $data['academic_years'];

        return view('users.index', compact('academic_years', 'semesters',));
    }
}
