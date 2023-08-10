<?php

namespace App\Http\Livewire\Scolarites;

use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;
use App\Models\FraisScolarite;
use RealRashid\SweetAlert\Facades\Alert;

class ListeFrais extends Component
{
    use WithPagination;

    public $search= "";
    public $frais;

    public function supprimerFrais(FraisScolarite $frais){
        $frais->delete();
        Alert::toast('Suppression du frais scolaire effectué avec succès.', 'success');
        return redirect()->route('frais');
    }

    public function render()
    {
        if(!empty($this->search)){
            $listFrais =  FraisScolarite::where('libelle', 'LIKE', '%'. $this->search.'%')
            ->orWhere('code', 'LIKE', '%'. $this->search.'%')
            ->paginate(10);
        }else{
            
            $anneeActive = SchoolYear::where('active', '1')->first();
            $listFrais =  FraisScolarite::with(['schoolyear', 'niveau'])
                        ->whereRelation('schoolyear', 'school_year_id', $anneeActive->id)
                        ->paginate(10);
        }

        return view('livewire.scolarites.liste-frais', compact('listFrais'));
    }
}
