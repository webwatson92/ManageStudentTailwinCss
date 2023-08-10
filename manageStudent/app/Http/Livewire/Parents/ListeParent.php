<?php

namespace App\Http\Livewire\Parents;

use Alert;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StudentParent;

class ListeParent extends Component
{
    use WithPagination;

    public $search= "";

    public function supprimerParent(StudentParent $parent){
        $parent->delete();
        Alert::toast("Suppression du compte parent effectué avec succès.", 'success');
        return redirect()->route('parentEleve');
    }
    
    public function render()
    {
        if(!empty($this->search)){
            $listeParent =  StudentParent::where('nom', 'LIKE', '%'. $this->search.'%')
                            ->orWhere('prenom', 'LIKE', '%'. $this->search.'%')
                            ->orWhere('email', 'LIKE', '%'. $this->search.'%')
                            ->paginate(10);
            return view('livewire.parents.liste-parent', compact('listeParent'));
        }

        $listeParent =  StudentParent::latest()->paginate(10);

        return view('livewire.parents.liste-parent', compact('listeParent'));
    }
}
