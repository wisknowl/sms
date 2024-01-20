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
    public function mount()
    {
        $this->academic_year = $this->getAcademicYear();
        // $first_a_year = academic_year::first();
        // $this->academic_year = $first_a_year->name;
        // $first_level = level::first();
        // $this->level=$first_level->id;
        // dd($this->level);
    }
    public function nf(){
        // dd($this->level);
    }
    public function updatingSearch(){
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
        $students->when($this->search, function ($query) {
            return $query->where(function ($query){
                $query->where('name','like', '%' . $this->search . '%')
                    ->orwhere('matricule','like', '%' . $this->search . '%')
                    ->orwhere('id','like', '%' .$this->search . '%');
            });
        })->get();
        $students = $students->paginate(10);
        config(['app.name' => 'Etudiant']);
        return view('livewire.student-lw', compact('levels', 'cycles', 'specialties', 'students', 'academic_years'));
    }
}
