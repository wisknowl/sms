<?php

namespace App\Livewire;

use App\Models\specialty;
use App\Models\specialty_tranche;
use App\Models\tranche;
use Livewire\Component;

class SpecialtyDetail extends Component
{
    public $specialtyId;
    public $name;

    public $tranches;
    public $specialty_tranches;

    public function mount($specialtyId)
    {
        $this->specialtyId = $specialtyId;
        $name = specialty::findOrFail($specialtyId);
        $this->name = $name->name;

        $this->tranches = tranche::orderBy('id', 'desc')->get();
        $this->specialty_tranches = specialty_tranche::where('specialty_id', $specialtyId)->where('period','jour')->get();
        // die($this->tranches);
    }
    public function render()
    {
        return view('livewire.specialty-detail');
    }
}
