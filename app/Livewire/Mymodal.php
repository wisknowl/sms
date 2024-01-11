<?php

namespace App\Livewire;

// use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Mymodal extends ModalComponent
{
    public int $counter = 0;

    public function update()
    {
        $this->counter++;
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
