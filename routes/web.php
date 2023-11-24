<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UniteEnseignementController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SpecialtyUeController;
use App\Http\Controllers\UeCourseController;
use Illuminate\Support\Facades\Route;

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
    ->only(['index', 'store'])
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
