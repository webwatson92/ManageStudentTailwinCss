<?php

namespace App\Http\Livewire\Attributions;

use Alert;
use App\Models\Classe;
use Livewire\Component;
use App\Models\Attribution;
use Livewire\WithPagination;

class ListeInscris extends Component
{
    use WithPagination;
    
    public $search = "";
    public $selection_classe_id; 

    public function supprimerRentrerClasse(Attribution $attribution){
        $attribution->delete();
        Alert::toast("Le retrait de l'élève dans la classe.", 'success');
        return redirect()->route('eleve');
    }

    public function render()
    {
        if(isset($this->selection_classe_id)){
            if(!empty($this->search)){
                $eleveEnClasse =  Attribution::where('nom', 'LIKE', '%'. $this->search.'%')
                ->orWhere('prenom', 'LIKE', '%'. $this->search.'%')
                ->paginate(10);
            }else{
                $eleveEnClasse =  Attribution::with('classe', 'eleve')
                            ->where('classe_id', $this->selection_classe_id)->latest()->paginate(10);
            }
        }else{
            if(!empty($this->search)){
                $eleveEnClasse =  Attribution::where('nom', 'LIKE', '%'. $this->search.'%')
                ->orWhere('prenom', 'LIKE', '%'. $this->search.'%')
                ->paginate(10);
            }else{
                $eleveEnClasse =  Attribution::with('classe', 'eleve')->latest()->paginate(10);
            }
        }

        
        
        $listeDesClasse = Classe::all();
        // dd($listeDesClasse);
        return view('livewire.attributions.liste-inscris', compact('eleveEnClasse', 'listeDesClasse'));
    }
}
