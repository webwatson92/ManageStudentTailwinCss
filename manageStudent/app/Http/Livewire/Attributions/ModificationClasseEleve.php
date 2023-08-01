<?php

namespace App\Http\Livewire\Attributions;

use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Niveau;
use Livewire\Component;
use App\Models\SchoolYear;
use App\Models\Attribution;
use Alert;

class ModificationClasseEleve extends Component
{
    public $attribution;
    public $matricule, $niveau_id, $classe_id, $nomComplet, $error, $eleve_id;

    public function mount(){
        // dd($this->attribution);
        $niveauSelectionner = Classe::where('id', $this->attribution->classe_id)->first();
      
        //Recuperation des infos de l'élève
        $eleve = Eleve::where('id', $this->attribution->eleve_id)->first();
       
        $this->matricule = $eleve->matricule;
        $this->niveau_id = $niveauSelectionner->niveau_id;//level_id
        $this->classe_id = $this->attribution->classe_id;
        $this->nomComplet = $eleve->nom ." ".$eleve->prenom;
    }

    public function modifierEleveDeClasse(){
        $this->validate([
            'matricule' => 'required',
            'niveau_id' => 'integer| required',
            'classe_id' => 'integer| required'
        ]);

        
        $anneeActive = SchoolYear::where('active', '1')->first();

        try{    
            // dd($this->attribution->eleve_id);
            $attribution = Attribution::find($this->attribution->id);
            
            $attribution->eleve_id = $this->eleve_id;
            $attribution->classe_id = $this->classe_id;
           // dd($attribution);
            $attribution->save();
            // dd($attribution);
            Alert::toast("Vous avez modifié l'élève de classe.", 'success');
            return redirect()->route('inscription');
        }catch(Exeception $e){
            //traitement de l'exeception
        }
    }

    public function render()
    {
        //Recupération de l'année active
        $anneeActive = SchoolYear::where('active', '1')->first();
        //Recupération du niveau actif
        $niveauxDeLanneActive = Niveau::where('school_year_id', $anneeActive->id)->get();

        if($this->matricule){
           $eleveTrouver = Eleve::where('matricule', $this->matricule)->first();

           if(!empty($eleveTrouver) or !is_null($eleveTrouver)){
                $this->nomComplet = $eleveTrouver->nom ." ".$eleveTrouver->prenom;
                
                //sauvegarde de l'id de l'élève
                $this->eleve_id = $eleveTrouver->id;
           }else{
                $this->nomComplet = '';
           }
        }

        if(!empty($this->niveau_id) or !is_null($this->niveau_id) ){
            $listeClasse = Classe::where('niveau_id', $this->niveau_id)->get();
        }else{
            $listeClasse = [];
        }

        return view('livewire.attributions.modification-classe-eleve', compact('niveauxDeLanneActive', 'listeClasse'));
    }
}
