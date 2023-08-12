<?php

namespace App\Http\Livewire\Eleves;

use Livewire\Component;

class ShowEleve extends Component
{
    public $eleve;

    public function render()
    {
        return view('livewire.eleves.show-eleve');
    }
}
