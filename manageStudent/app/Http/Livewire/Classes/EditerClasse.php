<?php

namespace App\Http\Livewire\Classes;

use App\Models\Classe;
use App\Models\Niveau;
use Livewire\Component;
use Alert;

class EditerClasse extends Component
{
    public $classe;
    
    public $libelle, $niveau_id;

    public function mount(){
        
        $this->libelle = $this->classe->libelle;
        $this->niveau_id = $this->classe->niveau_id;
    }
    
    public function modifierClasse(){
        $this->validate([
            'libelle' =>"string|required",
            'niveau_id' =>"integer|required",
        ]);

        try{
                $classe = Classe::find($this->classe->id); 
                //dd($classe);
                $classe->libelle = $this->libelle;
                $classe->niveau_id = $this->niveau_id;
                $classe->save();
                if($classe){ $this->libelle=""; $this->niveau_id="";}
                Alert::toast('Modification de la classe effectué.', 'success');
                //Alert::success('Félicitation !', 'Classe scolaire ajoutée avec succès.');
                return redirect()->route('classe');
        }catch(Exeception $e){
            //traitement de l'exeception
        }

    }


    public function render()
    {
        $niveaux =  Niveau::with('classe')->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.classes.editer-classe', compact('niveaux'));
    }
}
