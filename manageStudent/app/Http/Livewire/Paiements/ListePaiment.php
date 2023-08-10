<?php

namespace App\Http\Livewire\Paiements;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class ListePaiment extends Component
{
    use WithPagination;

    public $search= "";
    
    public function supprimerPaiement(Payment $paiement){
        $paiement->delete();
        Alert::toast('Paiement supprimé !', 'success');
        return redirect()->route('paiement');
    }

    public function render()
    {
        if(!empty($this->search)){
            $paiement =  Payment::paginate(10);
        }

        $paiement =  Payment::with('classe', 'eleve')->latest()->paginate(10);
        return view('livewire.paiements.liste-paiment', compact('paiement'));
    }
}
