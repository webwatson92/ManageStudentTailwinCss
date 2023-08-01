<?php

namespace App\Http\Livewire\Classes;

use App\Models\Classe;
use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;
use Alert;

class ListeClasse extends Component
{
    use WithPagination;

    public $search= "";

    public function supprimerClasse(Classe $classe){
        /*$titreMessage = 'Suppression de message!'; 
        $message = "Voulez-vous vraiment supprimer le classe ?";
        confirmDelete($titreMessage, $message); */
        $classe->delete();
        Alert::toast('Suppression du classe scolaire effectué avec succès.', 'success');
        return redirect()->route('classe');
    }
    
    public function render()
    {
         if(!empty($this->search)){
            $listeClasse =  Classe::where('libelle', 'LIKE', '%'. $this->search.'%')
            ->paginate(10);
            return view('livewire.classes.liste-classe', compact('listeClasse'));
        }else{
            $anneeActive = SchoolYear::where('active', '1')->first();
            $listeClasse =  classe::with('niveau')->whereRelation('niveau', 'school_year_id', $anneeActive->id)
                        ->latest()
                        ->paginate(10);
            return view('livewire.classes.liste-classe', compact('listeClasse'));
        } 

        $listeClasse =  classe::with('niveau')->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.classes.liste-classe', compact('listeClasse'));
    }

}
