<?php

namespace App\Http\Livewire\Eleves;

use App\Models\Eleve;
use Livewire\Component;
use Livewire\WithPagination;
use Alert;

class ListeEleve extends Component
{
    use WithPagination;

    public $search= "";

    public function supprimerEleve(Eleve $eleve){
        /*$titreMessage = 'Suppression de message!'; 
        $message = "Voulez-vous vraiment supprimer le eleve ?";
        confirmDelete($titreMessage, $message); */
        $eleve->delete();
        Alert::toast("Suppression du compte de l'élève effectué avec succès.", 'success');
        return redirect()->route('eleve');
    }
    
    public function render()
    {
        if(!empty($this->search)){
            $listeEleve =  Eleve::where('matricule', 'LIKE', '%'. $this->search.'%')
                            ->orWhere('nom', 'LIKE', '%'. $this->search.'%')
                            ->orWhere('prenom', 'LIKE', '%'. $this->search.'%')
                            ->orWhere('nom_parent', 'LIKE', '%'. $this->search.'%')
                            ->paginate(10);
            return view('livewire.eleves.liste-eleve', compact('listeEleve'));
        }else{
            //renvoi de la liste dans cette section 
            /* $anneeActive = SchoolYear::where('active', '1')->first();*/
            $listeEleve =  Eleve::latest()->paginate(10); 
            return view('livewire.eleves.liste-eleve', compact('listeEleve'));
        } 

        $listeEleve =  Eleve::latest()->paginate(10);
        return view('livewire.eleves.liste-eleve', compact('listeEleve'));
    }
}
