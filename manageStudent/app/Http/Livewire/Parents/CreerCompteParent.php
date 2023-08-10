<?php

namespace App\Http\Livewire\Parents;

use Alert;
use Livewire\Component;
use App\Models\StudentParent;
use App\Notifications\EnvoyerNotificationCompteParent;

class CreerCompteParent extends Component
{
    public $nom, $prenom, $email, $contact;

    public function ajouterParent(StudentParent $parent){

        $this->validate([
            'nom' =>"string|required",
            'prenom' =>"string|required",
            'email' =>"string|required||unique:student_parents",
            'contact' =>"string|required",
        ]);
        
        try{
                $parent->nom = $this->nom;
                $parent->prenom = $this->prenom;
                $parent->email = $this->email;
                $parent->contact = $this->contact;
                //envoi du message au parent ici
                $parent->save();
                
                if($parent){
                    $parent->notify(new EnvoyerNotificationCompteParent());
                }
                
                Alert::toast('Inscription de '. $parent->nom ." ". $parent->prenom .' a été effectuée avec succès.', 'success');
                return redirect()->route('parentEleve');
        }catch(Exeception $e){
            //traitement de l'exeception
        }
    }

    public function render()
    {
        return view('livewire.parents.creer-compte-parent');
    }
}
