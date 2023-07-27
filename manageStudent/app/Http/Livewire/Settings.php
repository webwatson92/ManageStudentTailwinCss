<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;

class Settings extends Component
{
    use WithPagination;
    
    public function render()
    {
        $anneeScollaire =  SchoolYear::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.settings', compact('anneeScollaire'));
    }
}
