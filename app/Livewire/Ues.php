<?php

namespace App\Livewire;
use Session;
use App\Models\academic_year;
use App\Models\course_nature;
use App\Models\level;
use App\Models\semester;
use App\Models\specialty;
use App\Models\unite_enseignement;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Ues extends Component
{
    use WithPagination;

    public $academic_year;
    public $level;
    public $specialty;
    public $semester;
    public $all;
    public $search;
    public $delete_id;
    public $uemod;
    public $levelcheck = [];
    public $indexes;

    public function mount()
    {
        $this->academic_year = $this->getAcademicYear();
        // $first_a_year = academic_year::first();
        // $this->academic_year = $first_a_year->name;
        // $first_level = level::first();
        // $this->level=$first_level->id;
        // dd($this->level);
    }
    public function fl()
    {
        $this->indexes = array_keys($this->levelcheck);
        // dd($this->levelcheck, $this->indexes);
    }
    public function fs()
    {
        // dd($this->specialty);
    }
    public function updatingLevel()
    {
        $this->resetPage();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function setDeleteId($id)
    {
        $this->delete_id = $id;
        $ue = unite_enseignement::where('id', $this->delete_id)->first();
        $this->uemod = $ue->name;
        // dd($this->uemod);

    }
    public function deleteUe()
    {
        $ues = unite_enseignement::where('id', $this->delete_id)->first();
        $ues->delete();
        // $this->emit('hide:delete-modal');
        // $this->dispatch('hide:delete-modal');
        // $this->closeModal();
        notify()->success('L\'unité d\'enseignement a été supprimée avec succès');
    }
    public function confirmUeDeletion(unite_enseignement $ue)
    {
        $ue->delete();
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
    public function render(Request $request)
    {
        if (session()->has('semester_id')) {
            $semester_session = session('semester_id');
        }
        $academic_years = academic_year::all();
        $units = unite_enseignement::with('course_nature')->orderBy('code', 'asc')->where('semester_id',$semester_session);
        if (!empty($this->indexes)) {
            foreach ($this->indexes as $i) {
                if ($this->levelcheck[$i] == true) { 
                    // dump($i, $this->levelcheck[$i]);
                    $units->where('level_id', $i)->get();
                }
            }
        }
        // if ($this->all) {
        //     return $units->get();
        // }

        $units->when($this->level, function ($query) {
                return $query->where('level_id', $this->level);
            })
            ->when($this->specialty, function ($query) {
                // dd($this->specialty);
                return $query->where('specialty_id', $this->specialty);
            })
            ->when($this->search, function ($query) {
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orwhere('code', 'like', '%' . $this->search . '%')
                        ->orwhere('id', 'like', '%' . $this->search . '%');
                });
            })
            ->get();
        // dd($ues);
        $sql = $units->toSql();
        $ues = $units->paginate(10);
        // $ues = $units->get();

        $levels = level::all();
        $course_natures = course_nature::all();
        $specialties = specialty::all();
        $semesters = semester::all();
        config(['app.name' => 'Unite Denseignement']);

        return view('livewire.ues', compact('ues', 'levels', 'academic_years', 'semesters', 'specialties', 'course_natures', 'sql'));
    }
}
