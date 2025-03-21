<?php

namespace App\Livewire;
use App\Exports\Ues;
use Maatwebsite\Excel\Facades\Excel;

use Barryvdh\DomPDF\Facade\Pdf;


use App\Models\academic_year;
use App\Models\course;
use App\Models\course_nature;
use App\Models\course_student;
use App\Models\cycle;
use App\Models\semester;
use App\Models\specialty as ModelsSpecialty;
use App\Models\student;
use App\Models\unite_enseignement;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use Livewire\WithPagination;
use Livewire\Component;

class Specialty extends Component
{
    use WithPagination;
    public $academic_year;
    public $search;
    public $cycle;
    public $delete_id;

    public function mount()
    {
        $this->academic_year = $this->getAcademicYear();
        // $first_a_year = academic_year::first();
        // $this->academic_year = $first_a_year->name;
        // $first_level = level::first();
        // $this->level=$first_level->id;
        // dd($this->level);
    }
    public function export()
    {
        return Excel::download(new Ues, 'ues.xlsx');
    }
    public function fl(){

    }
    public function fs(){

    }
    public function generatePV($id)
    {
        $students = student::where('specialty_id', $id)->with('course')->get();
        // dd($students);
        $ues = unite_enseignement::orderBy('code','asc')->where('specialty_id', $id)->where('level_id', 11)->where('semester_id', 1)->get();

        $ue_ids = unite_enseignement::where('specialty_id', $id)
            ->pluck('id')->toArray();
        // dd($ue_ids);
        $result = array();
        foreach ($ue_ids as $ue_id) {
            $course_id = Course::where('ue_id', $ue_id)->get()->pluck('id')->toArray();
            $result = array_merge($result, $course_id);
        }
        $courses = Course::orderBy('code','asc')->whereIn('id', $result)->get();
        // dd($result);
        $res = array();
        foreach ($result as $i) {
            $stc_id = course_student::with('student')->where('course_id', $i)->pluck('id')->toArray();
            $res = array_merge($res, $stc_id);
            // dd($st_courses);
            // dump($i, $stc_id, $res);
        }
        $st_courses = course_student::with('student','course')->whereIn('id', $res)->get();
        $pdf = Pdf::loadView('pdf.pv', compact('id', 'students', 'ues', 'courses','st_courses'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
    public function setDeleteId($id)
    {
        $this->delete_id = $id;
    }
    public function deleteSpec()
    {
        $ues = ModelsSpecialty::where('id', $this->delete_id)->first();
        $ues->delete();
        // $this->emit('hide:delete-modal');
        // $this->dispatch('hide:delete-modal');
        // $this->closeModal();
        notify()->success('La Spécialité a été supprimée avec succès');
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
        
        $cycles = cycle::all();
        $specs = ModelsSpecialty::with('cycle');

        $specs->when($this->cycle, function ($query) {
            return $query->where('cycle_id', $this->cycle);
        })
        ->when($this->search, function ($query) {
            return $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orwhere('code', 'like', '%' . $this->search . '%')
                    ->orwhere('id', 'like', '%' . $this->search . '%');
            });
        })->get();
        $sql = $specs->toSql();
        $specialties = $specs->paginate(0);
        config(['app.name' => 'Specialite']);
        return view('livewire.specialty', compact('specialties', 'cycles','sql'));
    }
}
