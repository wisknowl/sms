<?php

namespace App\Livewire;

use App\Models\academic_year;
use App\Models\cycle;
use App\Models\facturation;
use App\Models\semester;
use Livewire\Component;
use App\Models\specialty as ModelsSpecialty;
use App\Models\student;
use Livewire\WithPagination;

class Facture extends Component
{
    use WithPagination;
    public $academic_year;
    public $search;
    public $cycle;
    // public $students;

    public function facture_list(){
        dd(1);
    }
    public function render()
    {
        $semesters = semester::all();
        $academic_years = academic_year::all();
        $cycles = cycle::all();
        $factures = facturation::with('student');
        $students = student::all();
// dd($factures);
        // $factures->when($this->cycle, function ($query) {
        //     return $query->where('cycle_id', $this->cycle);
        // })
        // ->when($this->search, function ($query) {
        //     return $query->where(function ($query) {
        //         $query->where('name', 'like', '%' . $this->search . '%')
        //             ->orwhere('code', 'like', '%' . $this->search . '%')
        //             ->orwhere('id', 'like', '%' . $this->search . '%');
        //     });
        // })->get();
        // $sql = $factures->toSql();
        $factures = $factures->paginate(12);
        config(['app.name' => 'Specialite']);
        return view('livewire.facture', compact('factures', 'academic_years', 'semesters', 'cycles','students',));
    }
}
