<?php

namespace App\Http\Controllers;

use Session;

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UniteEnseignementController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\SpecialtyUeController;
use App\Http\Controllers\UeCourseController;
use App\Livewire\Specialty;
use App\Livewire\StudentMarks;
use Illuminate\Support\Facades\Route;
use App\Exports\SpecialtyExport;
use App\Livewire\ProcesVerbal;
use App\Models\academic_year;
use App\Models\course;
use App\Models\course_student;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty as ModelsSpecialty;
use App\Models\student;
use App\Models\student_ue;
use App\Models\unite_enseignement;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
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

Route::get('/dashboard', function (Request $request) {
    if ($request->has('year_id') && !empty($request->input('year_id'))) {
        $year_id = $request->input('year_id');
        $year_name = academic_year::where('id', $year_id)->value('name');
        Session::put('year_name', $year_name);
        Session::put('year_id', $year_id);
    } else {
        $year = academic_year::first();
        $year_id = $year->id;
        $year_name = getAcademicYear();
        // $year_name = $year->name;
        Session::put('year_name', $year_name);
        Session::put('year_id', $year_id);
    }
    if ($request->has('semester_id') && !empty($request->input('semester_id'))) {
        $semester_id = $request->input('semester_id');
        $semester_name = semester::where('id', $semester_id)->value('name');
        Session::put('semester_name', $semester_name);
        Session::put('semester_id', $semester_id);
    } else {
        $semester = semester::first();
        $semester_id = $semester->id;
        $semester_name = $semester->name;
        Session::put('semester_name', $semester_name);
        Session::put('semester_id', $semester_id);
    }
    $students = student::orderBy('id', 'desc')->get();
    $data = array();
    $validated_ue = array();
    $not_validated_ue = array();
    foreach ($students as $student) {
        $student_id = $student->id;
        $st_ues = student_ue::with('ue')
            ->where('student_id', $student_id)
            ->whereHas('ue', function ($query) use ($student) {
                $level_id = $student->currentLevel()->id;
                $session = Session::get('semester_id');
                // dump($session);
                $query->where('level_id', $level_id)->where('semester_id', $session);
            })->get();
        $courses = course_student::with('course')
            ->where('student_id', $student_id)
            ->whereHas('course', function ($query) use ($student) {
                $level_id = $student->currentLevel()->id;
                $query->where('level_id', $level_id);
            })->get();
        $ue_credit_sum = 0;
        $ue_sum = 0;
        foreach ($st_ues as $st_ue) {
            $course_sum = 0;
            $course_credit_sum = 0;
            foreach ($courses as $course) {
                if ($course->course->ue_id == $st_ue->ue->id) {

                    if ($course->exam_marks < $course->reseat_mark) {
                        $course_mark = (((((($course->ca_marks) / 20) * 30) + ((($course->reseat_mark) / 20) * 70)) / 100) * 20);
                    } else {
                        $course_mark = (((((($course->ca_marks) / 20) * 30) + ((($course->exam_marks) / 20) * 70)) / 100) * 20);
                    }
                    $course_credit_multiply = $course_mark * $course->course->credit_points;
                    $course_sum = $course_sum + $course_credit_multiply;
                    $course_credit_sum = $course_credit_sum + $course->course->credit_points;
                }
            }
            $ue_mark = $course_sum / $course_credit_sum;
            if ($ue_mark < 10) {
                $not_validated_ue[] = $ue_mark;
            } else {
                $validated_ue[] = $ue_mark;
            }
            $ue_credit_multiply = $ue_mark * $st_ue->ue->credit_points;
            $ue_sum = $ue_sum + $ue_credit_multiply;
            $ue_credit_sum = $ue_credit_sum + $st_ue->ue->credit_points;
        }
        $std_avg = $ue_sum / $ue_credit_sum;
        $data[] = $std_avg;
    }
    $validated_ue_count = count($validated_ue);
    $not_validated_ue_count = count($not_validated_ue);
    $validated_ue_percent = ($validated_ue_count / ($validated_ue_count + $not_validated_ue_count)) * 100;
    $not_validated_ue_percent = ($not_validated_ue_count / ($validated_ue_count + $not_validated_ue_count)) * 100;

    $academic_years = academic_year::all();
    $semesters = semester::all();
    $user_count = User::count();
    $count = student::count();
    $specialty_count = ModelsSpecialty::count();
    $ue_count = unite_enseignement::count();
    $course_count = course::count();
    config(['app.name' => 'Dashboard']);
    return view('dashboard', compact('academic_years', 'semesters', 'user_count', 'count', 'specialty_count', 'ue_count', 'course_count', 'validated_ue_percent', 'not_validated_ue_percent'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('generateTranscript/{id}', [StudentMarks::class, 'generateTranscript'])->name('Transcript');
Route::get('generatePV/{id}', [Specialty::class, 'generatePV'])->name('PV');
Route::get('/student_marks', StudentMarks::class);
Route::get('proces_verbal', ProcesVerbal::class)->name('proces_verbal');
Route::get('ues', [UniteEnseignementController::class, 'export']);
// Route::get('pvxls', [Specialty::class, 'export']);
// Route::get('export/{id}', function ($id) {
//     return Excel::download(new SpecialtyExport($id), 'students.xlsx');
// });
Route::get('export/{id}/{level_id}/{semester_id}/{a_year}', function ($id, $level_id, $semester_id, $a_year) {
    // Get the models by their ids
    $specialty = ModelsSpecialty::find($id);
    $level = level::find($level_id);
    $semester = semester::find($semester_id);

    // Create the file name using the model attributes
    $file_name = $specialty->code . '_N' . $level->name . '_S' . $semester->name . '_' . $a_year . '.xlsx';
    // return Excel::download(new SpecialtyExport($id, $level_id, $semester_id, $a_year), '$file_name.xlsx');
    return Excel::download(new SpecialtyExport($id, $level_id, $semester_id, $a_year), $file_name);
});


Route::resource('students', StudentController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);
Route::get('/chart-data', [StudentController::class, 'getChartData']);
Route::get('/semesterSession', [StudentController::class, 'getChartData'])->name('semesterSession');

Route::resource('academic_years', AcademicYearController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('semesters', SemesterController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('levels', LevelController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('specialties', SpecialtyController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('uniteEseignements', UniteEnseignementController::class)
    ->only(['index', 'store', 'update'])
    ->middleware(['auth', 'verified']);

Route::put('/uniteEnseignements/updateUe', [UniteEnseignementController::class, 'updateUe'])->name('uniteEnseignements.updateUe');

Route::resource('cours', CourseController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('specialty_ue', SpecialtyUeController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('ue_cours', UeCourseController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);
Route::resource('notes', CourseStudentController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
