<?php

namespace App\Http\Livewire;

use App\Models\Niveau;
use Livewire\Component;
use Alert;

class EditerNiveau extends Component
{
    public $niveau, $code, $libelle, $scolarite;

    public function mount(){
        $this->code = $this->niveau->code;
        $this->libelle = $this->niveau->libelle;
    }

    public function modifierNiveaux(){
        $this->validate([
            'code' =>"string|required",
            'libelle' =>"string|required",
        ]);

        try{
                $niveau = Niveau::find($this->niveau->id);
                $niveau->code = $this->code;
                $niveau->libelle = $this->libelle;
                $niveau->save();
                Alert::toast('Modification du niveau scolaire effectué avec succès.', 'success');
                //Alert::success('Félicitation !', 'Niveau scolaire ajoutée avec succès.');
                return redirect()->route('niveaux');
            
        }catch(Exeception $e){
            //traitement de l'exeception
        }

    }

    public function render()
    {
        return view('livewire.editer-niveau');
    }
}
