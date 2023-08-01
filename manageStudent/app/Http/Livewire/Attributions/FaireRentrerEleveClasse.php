<?php

namespace App\Http\Livewire\Attributions;

use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Niveau;
use Livewire\Component;
use App\Models\SchoolYear;
use App\Models\Attribution;
use Alert;

class FaireRentrerEleveClasse extends Component
{
    public $matricule, $niveau_id, $classe_id, $nomComplet, $error, $eleve_id;

    public function ajouterEleveEnClasse(Attribution $attribution){
      
        $this->validate([
            'matricule' => 'required',
            'niveau_id' => 'integer| required',
            'classe_id' => 'integer|required'
        ]);

        
        $anneeActive = SchoolYear::where('active', '1')->first();

        try{
            
            //Vérification pour recupérer tous les enregistrement en double
            $rechercheSiEleveEstDejaInscritDansUneClasse = Attribution::where('eleve_id', $this->eleve_id)
                        ->where('school_year_id', $anneeActive->id)
                        ->get();
            
            if($rechercheSiEleveEstDejaInscritDansUneClasse->count() > 0){
                //on refuse l'inscription dans une classe
                $this->error = "Cet élève est déjà inscrit. Modifier les informations.";
            }else{
                $attribution->eleve_id = $this->eleve_id;
                $attribution->classe_id = $this->classe_id;
                $attribution->school_year_id = $anneeActive->id;
                $attribution->save();
                Alert::toast("L'élève a été inscrit dans une classe.", 'success');
                return redirect()->route('inscription');
            }
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

        return view('livewire.attributions.faire-rentrer-eleve-classe', compact('niveauxDeLanneActive', 'listeClasse'));
    }
}
