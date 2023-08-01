<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;
use Alert;

class Settings extends Component
{
    use WithPagination;

    public $search= "";
    
    public function activerOuDesactiver(SchoolYear $schoolYear){
        //Mettre à zero les champs qui ont l'action 1
        $remiseAZero = SchoolYear::where('active', "1")->update(['active'=>"0"]);
        //Modification du champs actif à un état différent
        $schoolYear->active = '1';
        $schoolYear->save();
        //Alert::toast('Année scolaire activée !', 'success');
        return redirect()->back();

    }

    public function render()
    {
        if(!empty($this->search)){
            $anneeScolaire =  SchoolYear::where('school_year', 'LIKE', '%'. $this->search.'%')
            ->orWhere('current_year', 'LIKE', '%'. $this->search.'%')
            ->paginate(10);
            return view('livewire.settings', compact('anneeScolaire'));
        }else{
            $anneeScolaire =  SchoolYear::orderBy('created_at', 'desc')->paginate(10);
            return view('livewire.settings', compact('anneeScolaire'));
        }

        $anneeScolaire =  SchoolYear::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.settings', compact('anneeScolaire'));
    }
}
