<?php

namespace App\Http\Livewire;

use Alert;
use App\Models\Niveau;
use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;
use App\Models\FraisScolarite;

class ListeNiveaux extends Component
{
    use WithPagination;

    public $search= "";
    public $niveau;

    public function supprimerNiveau(Niveau $niveau){
        $titreMessage = 'Suppression de message!';/* 
        $message = "Voulez-vous vraiment supprimer le niveau ?";
        confirmDelete($titreMessage, $message); */
        $niveau->delete();
        Alert::toast('Suppression du niveau scolaire effectué avec succès.', 'success');
        return redirect()->route('niveaux');
    }
    
    public function recupererMontantScolarite($niveauId){
        $anneeActive = SchoolYear::where('active', '1')->first();
        $requette = FraisScolarite::where('niveau_id', $niveauId)
                            ->where('school_year_id', $anneeActive->id)
                            ->first();
                        
        return $requette->montant;
    }


    public function render()
    {
        if(!empty($this->search)){
            $niveaux =  Niveau::where('libelle', 'LIKE', '%'. $this->search.'%')
            ->orWhere('code', 'LIKE', '%'. $this->search.'%')
            ->paginate(10);
        }else{
            $anneeActive = SchoolYear::where('active', '1')->first();
            $niveaux =  Niveau::with('school_year')->where('niveaux.school_year_id', $anneeActive->id)
                        ->latest()
                        ->paginate(10);
        }

        return view('livewire.liste-niveaux', compact('niveaux'));
    }
}
