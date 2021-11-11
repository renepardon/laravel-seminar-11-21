<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Testing extends Component
{
    public int $count = 666;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.testing');
    }
}
