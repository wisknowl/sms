<?php

namespace App\Livewire;

use App\Models\academic_year;
use Illuminate\View\View;
use App\Models\semester;
use App\Models\level;
use App\Models\specialty;
use App\Models\unite_enseignement;
use App\Models\course;
use App\Models\paper;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

use Livewire\Component;
use Livewire\WithPagination;

class BtsBlanc extends Component
{
    use WithPagination;

    public $academic_year;
    public $search;
    public $level;
    public $specialty;
    public $ue;
    public $ues;
    public $delete_id;

    public function mount()
    {
        $this->academic_year = $this->getAcademicYear();
        // $first_a_year = academic_year::first();
        // $this->academic_year = $first_a_year->name;
        $first_specialty = specialty::first();
        $this->specialty = $first_specialty->id;
        $first_level = level::first();
        $this->level = $first_level->id;
        $this->fs();

    }
    public function nf()
    {
        // dd($this->level);
    }
    public function fl()
    {
        // dd($this->levelcheck, $this->indexes);
    }
    public function fs()
    {
        if (session()->has('semester_id')) {
            $semester_session = session('semester_id');
        }
        $this->ues = unite_enseignement::where('specialty_id', $this->specialty)->where('level_id',$this->level)->where('semester_id',$semester_session)->get();
        // dd($this->ues);
    }
    public function setDeleteId($id)
    {
        $this->delete_id = $id;

    }
    public function deleteCourse()
    {
        $course = course::where('id', $this->delete_id)->first();
        $course->delete();
        notify()->success('Le Cours a été supprimée avec succès');
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
        $uees = unite_enseignement::all();
        if (session()->has('semester_id')) {
            $semester_session = session('semester_id');
        }
        $papers = paper::where('semester_id',$semester_session);
        // dd($papers);
        // $papers->when($this->level, function ($query) {
        //     return $query->where('level_id', $this->level);
        // })
        //     ->when($this->specialty, function ($query) {
        //         $ue_ids = unite_enseignement::where('specialty_id', $this->specialty)->where('level_id',$this->level)->where('semester_id',session('semester_id'))->where('semester_id',session('semester_id'))->pluck('id')->toArray();
        //         $result = array();

        //         foreach ($ue_ids as $ue_id) {
        //             $course_id = Course::where('ue_id', $ue_id)->get()->pluck('id')->toArray();
        //             // merge the course ids into the result array
        //             $result = array_merge($result, $course_id);
        //         }
        //         return $query->whereIn('id', $result);
        //     })
        //     ->when($this->ue, function ($query) {
        //         return $query->where('ue_id', $this->ue);
        //     })
        //     ->when($this->search, function ($query) {
        //         return $query->where(function ($query) {
        //             $query->where('name', 'like', '%' . $this->search . '%')
        //                 ->orwhere('code', 'like', '%' . $this->search . '%')
        //                 ->orwhere('id', 'like', '%' . $this->search . '%');
        //         });
        //     })->get();
        $sql = $papers->toSql();
        $papers = $papers->paginate(10);
        $levels = level::all();
        $academic_years = academic_year::all();
        $semesters = semester::all();
        $specialties = Specialty::with('ues')->get();
        config(['app.name' => 'Cours']);
        return view('livewire.bts-blanc', compact('levels', 'papers', 'specialties','uees', 'academic_years', 'semesters','sql'));
    }
}
