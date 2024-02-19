<?php

namespace App\Livewire;

use App\Models\specialty;
use App\Models\unite_enseignement;
use App\Models\course;
use App\Models\course_student;
use App\Models\cycle;
use App\Models\level;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Models\academic_year;

use Livewire\Component;
use Livewire\WithPagination;

class StudentLw extends Component
{

    use WithPagination;

    public $academic_year;
    public $search;
    public $delete_id;
    public $cycle;
    public $specialty;
    public $level;
    public function mount()
    {
        $this->academic_year = $this->getAcademicYear();
        // $first_a_year = academic_year::first();
        // $this->academic_year = $first_a_year->name;
        // $first_level = level::first();
        // $this->level=$first_level->id;
        // dd($this->level);
    }
    public function nf()
    {
        // dd($this->level);
    }
    public function fs()
    {
    }
    public function setDeleteId($id)
    {
        $this->delete_id = $id;
    }
    public function deleteStudent()
    {
        $student = student::where('id', $this->delete_id)->first();
        $student->delete();
        notify()->success('L\'Etudiant a été supprimée avec succès');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
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

    public function render()
    {
        $academic_years = academic_year::all();
        $specialties = specialty::all();
        $cycles = cycle::all();
        $levels = level::all();
        $students = student::with('specialty', 'levels', 'cycle')->orderBy('id', 'desc');
        $students->when($this->cycle, function ($query) {
            return $query->where('cycle_id', $this->cycle);
        })
            ->when($this->level, function ($query) {
                $query->whereHas('levels', function ($query) {
                    if (session()->has('year_name')) {
                        $year_session = session('year_name');
                    }
                    return $query->where('academic_year', $year_session)->where('level_id', $this->level);
                });
            })
            ->when($this->specialty, function ($query) {
                return $query->where('specialty_id', $this->specialty);
            })
            ->when($this->search, function ($query) {
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orwhere('matricule', 'like', '%' . $this->search . '%')
                        ->orwhere('id', 'like', '%' . $this->search . '%');
                });
            })->get();
        $sql = $students->toSql();
        $students = $students->paginate(10);
        config(['app.name' => 'Etudiant']);
        return view('livewire.student-lw', compact('levels', 'cycles', 'specialties', 'students', 'academic_years','sql'));
    }
}
