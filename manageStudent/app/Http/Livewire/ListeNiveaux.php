<?php

namespace App\Http\Livewire;

use App\Models\Niveau;
use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;
use Alert;

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
    
    public function render()
    {
        if(!empty($this->search)){
            $niveaux =  Niveau::where('libelle', 'LIKE', '%'. $this->search.'%')
            ->orWhere('code', 'LIKE', '%'. $this->search.'%')
            ->paginate(10);
            return view('livewire.liste-niveaux', compact('niveaux'));
        }else{
            $anneeActive = SchoolYear::where('active', '1')->first();
            $niveaux =  Niveau::with('school_year')->where('niveaux.school_year_id', $anneeActive->id)
                        ->latest()
                        ->paginate(10);
            return view('livewire.liste-niveaux', compact('niveaux'));
        }

     
        $niveaux =  Niveau::orderBy('created_at', 'desc')
                    ->paginate(10);

        return view('livewire.liste-niveaux');
    }
}
