<?php

namespace App\Http\Livewire\Eleves;

use App\Models\Eleve;
use Livewire\Component;
use Alert;

class EditerCompteEleve extends Component
{
    public $eleve, $matricule, $nom, $prenom, $date_naissance, 
                $contact_eleve, $nom_parent, $contact_parent;

    public function mount(){
        $this->matricule = $this->eleve->matricule;
        $this->nom = $this->eleve->nom;
        $this->prenom = $this->eleve->prenom;
        $this->date_naissance = $this->eleve->date_naissance;
        $this->contact_eleve = $this->eleve->contact_eleve;
        $this->nom_parent = $this->eleve->nom_parent;
        $this->contact_parent = $this->eleve->contact_parent;
    }

    public function modifierEleve(){
        $this->validate([
            'nom' =>"string|required",
            'prenom' =>"string|required",
            'date_naissance' =>"string|required",
            'contact_eleve' =>"string|required",
            'nom_parent' =>"string|required",
            'contact_parent' =>"string|required",
        ]);

        try{
                $eleve = Eleve::find($this->eleve->id);
                $eleve->matricule =  $this->matricule;
                $eleve->nom =  $this->nom;
                $eleve->prenom =  $this->prenom;
                $eleve->date_naissance =  $this->date_naissance;
                $eleve->contact_eleve =  $this->contact_eleve;
                $eleve->nom_parent =  $this->nom_parent;
                $eleve->contact_parent =  $this->contact_parent;
                $eleve->save();
                if($eleve){ $this->libelle=""; $this->code=""; $this->scolarite="";}
                Alert::toast("Modification du compte de l'élève effectué avec succès.", 'success');
                //Alert::success('Félicitation !', 'Niveau scolaire ajoutée avec succès.');
                return redirect()->route('niveaux');
            
        }catch(Exeception $e){
            //traitement de l'exeception
            Alert::toast($e.getMessage(), 'error');
        }

    }

    public function render()
    {
        return view('livewire.eleves.editer-compte-eleve');
    }
}
