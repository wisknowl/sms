<?php

namespace App\Livewire;

// use Livewire\Component;

use App\Models\unite_enseignement;
use LivewireUI\Modal\ModalComponent;

class Mymodal extends ModalComponent
{
    public unite_enseignement $ue;
    public int $counter = 0;
    // public $modalComponent;
    // public $modalData;

    // public function mount($id)
    // {
    //     $this->ue = unite_enseignement::find($id);
    // }
    // public function openModal($id)
    // {
    //     $this->modalComponent = 'mymodal';
    //     $this->modalData = ['id' => $id];
    //     $this->emit('openModal');
    // }

    public function update()
    {
        $this->counter++;
        // $this->ue->save();

        // $this->closeModal();
    }
    public function render()
    {
        return view('livewire.mymodal');
    }
    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        // 'lg'
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        return '4xl';
    }
}
