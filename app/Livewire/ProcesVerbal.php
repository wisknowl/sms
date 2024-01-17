<?php

namespace App\Livewire;

use App\Models\academic_year;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty;
use Livewire\Component;
use Livewire\WithPagination;


class ProcesVerbal extends Component
{
    use WithPagination;
    public $academic_year;
    public $levelmod;
    public $semestermod;

    public function mount()
    {
        $this->academic_year = $this->getAcademicYear();
        $first_level = level::first();
        $this->levelmod = $first_level->id;
        $first_semester = semester::first();
        $this->semestermod = $first_semester->id;
    }
    function getAcademicYear()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        if ($currentMonth > 7) { // If the month is above July
            $nextYear = $currentYear + 1;
            return "$currentYear/$nextYear";
        } else { // If the month is July or below
            $previousYear = $currentYear - 1;
            return "$previousYear/$currentYear";
        }
    }
    public function render()
    { 
        $levels = level::all();
        $semesters = semester::all();
        $specialties = specialty::with('cycle');
        $specialties = $specialties->paginate(3);
        $academic_years = academic_year::all();
        config(['app.name' => 'Proces Verbal']);
        return view('livewire.proces-verbal', compact('academic_years', 'levels', 'semesters', 'specialties'));
    }
}
