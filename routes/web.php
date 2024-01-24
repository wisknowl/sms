<?php

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
use App\Models\level;
use App\Models\semester;
use App\Models\specialty as ModelsSpecialty;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/dashboard', function () {
    return view('dashboard');
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
    ->only(['index', 'store',])
    ->middleware(['auth', 'verified']);

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
