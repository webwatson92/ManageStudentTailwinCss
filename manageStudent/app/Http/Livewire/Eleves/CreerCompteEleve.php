<?php

namespace App\Http\Livewire\Eleves;

use App\Models\Eleve;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class CreerCompteEleve extends Component
{
    public $matricule, $nom, $prenom, $date_naissance, $nom_parent, $contact_parent, $contact_eleve;

    public function ajouterEleve(Eleve $eleve){

        $this->validate([
            'matricule' =>"string|required|unique:eleves",
            'nom' =>"string|required",
            'prenom' =>"string|required",
            'date_naissance' =>"string|required",
            'contact_eleve' =>"string|required",
            'nom_parent' =>"string|required",
            'contact_parent' =>"string|required",
        ]);
        
        try{
                $eleve->matricule = $this->matricule;
                $eleve->nom = $this->nom;
                $eleve->prenom = $this->prenom;
                $eleve->date_naissance = $this->date_naissance;
                $eleve->contact_eleve = $this->contact_eleve;
                $eleve->nom_parent = $this->nom_parent;
                $eleve->contact_parent = $this->contact_parent;
                //envoi du message au parent ici
                $eleve->save();
                
                Alert::toast('Inscription de '. $eleve->nom ." ". $eleve->prenom .' a été effectuée avec succès.', 'success');
                return redirect()->route('eleve');
        }catch(Exeception $e){
            //traitement de l'exeception
        }
    }

    public function render()
    {
        return view('livewire.eleves.creer-compte-eleve');
    }
}
