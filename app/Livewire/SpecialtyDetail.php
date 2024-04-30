<?php

namespace App\Livewire;

use App\Models\level;
use App\Models\specialty;
use App\Models\specialty_tranche;
use App\Models\tranche;
use Livewire\Component;

class SpecialtyDetail extends Component
{
    public $specialtyId;
    public $specialty_name;
    public $level_id;
    public $tranches;
    public $specialty_tranches;

    public function mount($specialtyId)
    {
        $this->specialtyId = $specialtyId;
        $name = specialty::findOrFail($specialtyId);
        $this->specialty_name = $name->name;

        $this->tranches = tranche::orderBy('id', 'asc')->get();
        $this->level_id = level::first()->id;
        $this->specialty_tranches = specialty_tranche::where('specialty_id', $specialtyId)->where('level_id', $this->level_id)->get();
        // dd($this->tranches);
    }
    public function info()
    {
        $this->specialty_tranches = specialty_tranche::where('specialty_id', $this->specialtyId)->where('level_id', $this->level_id)->get();
        // dd($this->level_id, $this->specialty_tranches);
    }
    public function render()
    {
        $specialties = specialty::all();
        $levels = level::all();
        return view('livewire.specialty-detail', compact('specialties', 'levels'));
    }
}
