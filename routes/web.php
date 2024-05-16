<?php

namespace App\Http\Controllers;

use App\Exports\SpecialtyExport;
use App\Exports\pvsn;
use App\Livewire\StudentLw;
use Session;

use App\Http\Middleware\localization;
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
use App\Livewire\ProcesVerbal;
use App\Livewire\Relever as LivewireRelever;
use App\Models\academic_year;
use App\Models\course;
use App\Models\course_student;
use App\Models\level;
use App\Models\relever;
use App\Models\semester;
use App\Models\specialty as ModelsSpecialty;
use App\Models\student;
use App\Models\student_ue;
use App\Models\unite_enseignement;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


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

// Route::get('/', function () {
//     return redirect(app()->getLocale());
// });

// Route::prefix('{locale}')
//     ->middleware(Localization::class)
//     ->group(function () {--v
//     });
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
Route::get('/admin', function (Request $request) {
    if ($request->has('year_id') && !empty($request->input('year_id'))) {
        $year_id = $request->input('year_id');
        $year_name = academic_year::where('id', $year_id)->value('name');
        Session::put('year_name', $year_name);
        Session::put('year_id', $year_id);
    } else {
        // Use the session value as the default value
        $year_id = Session::get('year_id');
        $year_name = Session::get('year_name');
        $semester_name = Session::get('semester_name');
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
    $students = student::orderBy('id', 'desc')->get();
    $data = array();
    $validated_ue = array();
    $not_validated_ue = array();

    $studentValidatedCount = 0;
    $studentNotValidatedCount = 0;

    foreach ($students as $student) {
        $student_id = $student->id;
        $year_session = Session::get('year_name');
        $level = $student->levelByYear($year_session); // get the level object or null
        if ($level) { // if the level is not null
            $level_id = $level->id; // get the level id
            $session = Session::get('semester_id');
            $st_ues = student_ue::with('ue')
                ->where('student_id', $student_id)
                ->whereHas('ue', function ($query) use ($level_id, $session) {
                    $query->where('level_id', $level_id)->where('semester_id', $session);
                })->get();
            $courses = course_student::with('course')
                ->where('student_id', $student_id)
                ->whereHas('course', function ($query) use ($level_id) {
                    $query->where('level_id', $level_id);
                })->get();
        } else {
            $st_ues = null;
        }


        $ue_credit_sum = 0;
        $ue_sum = 0;
        $credit_obtained = 0;

        if ($st_ues) {
            foreach ($st_ues as $st_ue) {
                $course_sum = 0;
                $course_credit_sum = 0;
                foreach ($courses as $course) {
                    if ($course->course->ue_id == $st_ue->ue->id) {
                        $check_credit_sum = 0;

                        if ($course->exam_marks < $course->reseat_mark) {
                            $course_mark = (((((($course->ca_marks) / 20) * 30) + ((($course->reseat_mark) / 20) * 70)) / 100) * 20);
                        } else {
                            $course_mark = (((((($course->ca_marks) / 20) * 30) + ((($course->exam_marks) / 20) * 70)) / 100) * 20);
                        }
                        if ($course_mark >= 10) {
                            $check_credit_sum = $check_credit_sum + $course->course->credit_points;
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
                $credit_obtained = $credit_obtained + $check_credit_sum;
            }
            $std_avg = $ue_sum / $ue_credit_sum;
            $data[] = number_format(ceil($std_avg * 100) / 100, 2, '.', '');
            // dump($data);
            if ($credit_obtained >= 30) {
                $studentValidatedCount = $studentValidatedCount + 1;
            } else {
                $studentNotValidatedCount = $studentNotValidatedCount + 1;
            }
        } else {
            $validated_ue_count[] = null;
            $not_validated_ue_count[] = null;
        }
    }


    $validated_ue_count = count($validated_ue);
    $not_validated_ue_count = count($not_validated_ue);
    if ($validated_ue_count != 0 || $not_validated_ue_count != 0) {
        $validated_ue_percent = ($validated_ue_count / ($validated_ue_count + $not_validated_ue_count)) * 100;
        $not_validated_ue_percent = ($not_validated_ue_count / ($validated_ue_count + $not_validated_ue_count)) * 100;
    } else {
        $validated_ue_percent = 0;
        $not_validated_ue_percent = 0;
    }
    // if($studentValidatedCount != 0 || $studentNotValidatedCount != 0){

    // }

    $academic_years = academic_year::all();
    $semesters = semester::all();
    $user_count = User::count();
    $count = student::count();
    $specialty_count = ModelsSpecialty::count();
    $ue_count = unite_enseignement::count();
    $course_count = course::count();
    config(['app.name' => 'Dashboard']);
    // notify()->warning('Etudiant inscrire avec succès');

    return view('admin', compact('academic_years', 'semesters', 'user_count', 'count', 'specialty_count', 'ue_count', 'course_count', 'validated_ue_percent', 'not_validated_ue_percent', 'studentValidatedCount', 'studentNotValidatedCount'));
})->middleware(['auth', 'verified', 'set_session_values', 'localization'])->name('admin');

Route::get('/dashboard', function (Request $request) {
    if ($request->has('year_id') && !empty($request->input('year_id'))) {
        $year_id = $request->input('year_id');
        $year_name = academic_year::where('id', $year_id)->value('name');
        Session::put('year_name', $year_name);
        Session::put('year_id', $year_id);
    } else {
        // Use the session value as the default value
        $year_id = Session::get('year_id');
        $year_name = Session::get('year_name');
        $semester_name = Session::get('semester_name');
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
    $students = student::orderBy('id', 'desc')->get();
    $data = array();
    $validated_ue = array();
    $not_validated_ue = array();
    foreach ($students as $student) {
        $student_id = $student->id;
        $year_session = Session::get('year_name');
        $level = $student->levelByYear($year_session); // get the level object or null
        if ($level) { // if the level is not null
            $level_id = $level->id; // get the level id
            $session = Session::get('semester_id');
            $st_ues = student_ue::with('ue')
                ->where('student_id', $student_id)
                ->whereHas('ue', function ($query) use ($level_id, $session) {
                    $query->where('level_id', $level_id)->where('semester_id', $session);
                })->get();
            $courses = course_student::with('course')
                ->where('student_id', $student_id)
                ->whereHas('course', function ($query) use ($level_id) {
                    $query->where('level_id', $level_id);
                })->get();
        } else {
            $st_ues = null;
        }


        $ue_credit_sum = 0;
        $ue_sum = 0;
        if ($st_ues) {
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
        } else {
            $validated_ue_count[] = null;
            $not_validated_ue_count[] = null;
        }
    }
    $validated_ue_count = count($validated_ue);
    $not_validated_ue_count = count($not_validated_ue);
    if ($validated_ue_count != 0 || $not_validated_ue_count != 0) {
        $validated_ue_percent = ($validated_ue_count / ($validated_ue_count + $not_validated_ue_count)) * 100;
        $not_validated_ue_percent = ($not_validated_ue_count / ($validated_ue_count + $not_validated_ue_count)) * 100;
    } else {
        $validated_ue_percent = 0;
        $not_validated_ue_percent = 0;
    }

    $academic_years = academic_year::all();
    $semesters = semester::all();
    $user_count = User::count();
    $count = student::count();
    $specialty_count = ModelsSpecialty::count();
    $ue_count = unite_enseignement::count();
    $course_count = course::count();
    config(['app.name' => 'Dashboard']);
    notify()->success('Etudiant inscrire avec succès');

    return view('dashboard', compact('academic_years', 'semesters', 'user_count', 'count', 'specialty_count', 'ue_count', 'course_count', 'validated_ue_percent', 'not_validated_ue_percent'));
})->middleware(['auth', 'verified', 'set_session_values', 'localization'])->name('dashboard');

Route::get('transcript_list/{student_list}/{academic_year_mod}/{tdr}/{semester_mod}', [LivewireRelever::class, 'transcript_list'])
    ->middleware(['auth', 'verified', 'set_session_values', 'localization'])
    ->name('Transcript_list');
Route::get('generateTranscript/{id}/{academic_year_mod}/{tdr}/{semester_mod}', [LivewireRelever::class, 'generateTranscript'])
    ->middleware(['auth', 'verified', 'set_session_values', 'localization'])
    ->name('Transcript');
Route::get('generatePV/{id}', [Specialty::class, 'generatePV'])->name('PV');
Route::get('/student_marks', StudentMarks::class);
// Route::get('proces_verbal', ProcesVerbal::class)->name('proces_verbal')->middleware(['auth', 'verified', 'set_session_values', 'localization']);
Route::get('ues', [UniteEnseignementController::class, 'export']);
// Route::get('pvxls', [Specialty::class, 'export']);
// Route::get('export/{id}', function ($id) {
//     return Excel::download(new SpecialtyExport($id), 'students.xlsx');
// });
Route::get('exportpvcc/{id}/{level_id}/{semester_id}/{a_year}', function ($id, $level_id, $semester_id, $a_year) {
    // Get the models by their ids
    $specialty = ModelsSpecialty::find($id);
    $level = level::find($level_id);
    $semester = semester::find($semester_id);
    // Create the file name using the model attributes
    $file_name = $specialty->code . '_N' . $level->name . '_S' . $semester->name . '_' . $a_year . '.xlsx';
    // return Excel::download(new SpecialtyExport($id, $level_id, $semester_id, $a_year), '$file_name.xlsx');
    return Excel::download(new SpecialtyExport($id, $level_id, $semester_id, $a_year), $file_name);
});
Route::get('exportpvsn/{id}/{level_id}/{semester_id}/{a_year}', function ($id, $level_id, $semester_id, $a_year) {
    // Get the models by their ids
    $specialty = ModelsSpecialty::find($id);
    $level = level::find($level_id);
    $semester = semester::find($semester_id);
    // Create the file name using the model attributes
    $file_name = $specialty->code . '_N' . $level->name . '_S' . $semester->name . '_' . $a_year . '.xlsx';
    // return Excel::download(new SpecialtyExport($id, $level_id, $semester_id, $a_year), '$file_name.xlsx');
    return Excel::download(new pvsn($id, $level_id, $semester_id, $a_year), $file_name);
});

Route::get('/switch/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

// Route::get('/welcome/{locale}', function (string $locale) {
//     if (!in_array($locale, ['en', 'fr'])) {
//         abort(400);

//     }
//     App::setlocale($locale);
//     return view('welcome');
// });

Route::resource('students', StudentController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified', 'set_session_values', 'localization']);
Route::get('/chart-data', [StudentController::class, 'getChartData']);
Route::get('/semesterSession', [StudentController::class, 'getChartData'])->name('semesterSession');
Route::put('/students/updateStudent', [StudentController::class, 'updateStudent'])->name('students.updateStudent');
Route::get('/students/pdf', [StudentLw::class, 'student_list'])->name('students.pdf');

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
    // ->only(['index', 'store'])
    ->middleware(['auth', 'verified', 'set_session_values', 'localization']);
Route::put('/specialties/updateSpec', [SpecialtyController::class, 'updateSpec'])->name('specialties.updateSpec');

Route::resource('specialty_tranche', SpecialtyTrancheController::class)->only(['store']);

Route::resource('uniteEseignements', UniteEnseignementController::class)
    ->only(['index', 'store', 'update'])
    ->middleware(['auth', 'verified', 'set_session_values', 'localization']);

Route::put('/uniteEnseignements/updateUe', [UniteEnseignementController::class, 'updateUe'])->name('uniteEnseignements.updateUe');
Route::put('/cours/updateCo', [CourseController::class, 'updateCo'])->name('cours.updateCo');
Route::put('/facture/updateFacture', [FacturationController::class, 'updateFacture'])->name('facture.updateFacture');

Route::resource('cours', CourseController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified', 'set_session_values', 'localization']);
Route::resource('bts_blanc', PaperController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified', 'set_session_values', 'localization']);


Route::resource('specialty_ue', SpecialtyUeController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('ue_cours', UeCourseController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);
Route::resource('notes', CourseStudentController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified', 'set_session_values', 'localization']);
Route::resource('proces_verbal', ProcesVerbalController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified', 'set_session_values', 'localization']);

Route::resource('facture', FacturationController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified', 'set_session_values', 'localization']);
Route::resource('relever', ReleverController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified', 'set_session_values', 'localization']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
