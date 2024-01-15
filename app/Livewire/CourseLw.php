<?php

namespace App\Livewire;

use App\Models\academic_year;
use Illuminate\View\View;
use App\Models\semester;
use App\Models\level;
use App\Models\specialty;
use App\Models\unite_enseignement;
use App\Models\course;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

use Livewire\Component;
use Livewire\WithPagination;

class CourseLw extends Component
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
    public function nf()
    {
        // dd($this->level);
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
            return "$currentYear/$nextYear";
        } else { // If the month is July or below
            $previousYear = $currentYear - 1;
            return "$previousYear/$currentYear";
        }
    }

    public function render()
    {
        $ues = unite_enseignement::all();
        $courses = course::with('ue')->orderBy('code', 'asc');
        // dd($courses);
        $courses->when($this->search, function ($query) {
            return $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orwhere('code', 'like', '%' . $this->search . '%')
                    ->orwhere('id', 'like', '%' . $this->search . '%');
            });
        })->get();
        $courses = $courses->paginate(10);
        $levels = level::all();
        $academic_years = academic_year::all();
        $semesters = semester::all();
        $specialties = Specialty::with('ues')->get();
        config(['app.name' => 'Course']);
        return view('livewire.course-lw', compact('levels', 'courses', 'academic_years', 'semesters', 'ues'));
    }
}
