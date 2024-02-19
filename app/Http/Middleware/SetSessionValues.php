<?php

namespace App\Http\Middleware;

use App\Models\academic_year;
use App\Models\semester;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

use function App\Http\Controllers\getAcademicYear;

class SetSessionValues
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    function getAcademicYear()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        if ($currentMonth > 7) { // If the month is above July
            $nextYear = $currentYear + 1;
            return "$currentYear-$nextYear";
        } else { // If the month is July or below
            $previousYear = $currentYear - 1;
            return "$previousYear-$currentYear";
        }
    }
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the session values are null
        if (Session::get('year_id') == null || Session::get('semester_id') == null || Session::get('year_name') == null) {
            // Set the default values
            $year = academic_year::first();
            $year_id = $year->id;
            $year_name = getAcademicYear();
            Session::put('year_name', $year_name);
            Session::put('year_id', $year_id);

            $semester = semester::first();
            $semester_id = $semester->id;
            $semester_name = $semester->name;
            Session::put('semester_name', $semester_name);
            Session::put('semester_id', $semester_id);
        }

        return $next($request);
    }
}
