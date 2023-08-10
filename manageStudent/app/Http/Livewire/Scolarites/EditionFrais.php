<?php

namespace App\Http\Livewire\Scolarites;

use App\Models\Niveau;
use Livewire\Component;
use App\Models\FraisScolarite;
use RealRashid\SweetAlert\Facades\Alert;

class EditionFrais extends Component
{
    public $niveau_id, $scolarite, $frais;

    public function mount(){
        $niveau = Niveau::where('id', $this->frais->niveau_id)->first();
        
        $this->niveau_id = $niveau->libelle;
        $this->scolarite = $this->frais->montant;
    }

    public function modifierFrais(){
        $this->validate([
            'niveau_id' =>"integer|required",
            'scolarite' =>"integer|required",
        ]);

        try{
                $frais = FraisScolarite::find($this->frais->id);
                $frais->niveau_id =  $this->niveau_id;
                $frais->montant =  $this->scolarite;
                $frais->save();
                
                Alert::toast("Modification du frais de scolarité effectué avec succès.", 'success');

                return redirect()->route('frais');
            
        }catch(Exeception $e){
            //traitement de l'exeception
            Alert::toast($e.getMessage(), 'error');
        }

    }
    
    public function render()
    {
        $niveaux = Niveau::all();
        return view('livewire.scolarites.edition-frais', compact('niveaux'));
    }
}
