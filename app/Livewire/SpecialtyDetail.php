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

    public $tranches;
    public $specialty_tranches;

    public function mount($specialtyId)
    {
        $this->specialtyId = $specialtyId;
        $name = specialty::findOrFail($specialtyId);
        $this->specialty_name = $name->name;

        $this->tranches = tranche::orderBy('id', 'asc')->get();
        $this->specialty_tranches = specialty_tranche::where('specialty_id', $specialtyId)->get();
        // die($this->tranches);
    }
    public function render()
    {
        $specialties = specialty::all();
        $levels = level::all();
        return view('livewire.specialty-detail', compact('specialties','levels'));
    }
}
