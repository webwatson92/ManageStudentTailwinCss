<?php

namespace App\Http\Livewire;

use App\Models\Niveau;
use Livewire\Component;
use App\Models\SchoolYear;
use Alert;

class CreerNiveauScolaire extends Component
{
    public $code, $libelle, $scolarite;

    public function ajouterNiveaux(Niveau $niveau){

        $this->validate([
            'code' =>"string|required|unique:niveaux",
            'libelle' =>"string|required|unique:niveaux",
            'scolarite' =>"integer|required",
        ]);

        try{
                // Recupérer l'année scolaire active == 1
                $anneeActive = SchoolYear::where('active', '1')->first();
                
                $niveau->code = $this->code;
                $niveau->libelle = $this->libelle;
                $niveau->scolarite = $this->scolarite;
                $niveau->school_year_id = $anneeActive->id;

                $niveau->save();
                if($niveau){ $this->libelle=""; $this->code=""; $this->scolarite="";}
                Alert::toast('Niveau scolaire ajoutée avec succès.', 'success');
                //Alert::success('Félicitation !', 'Niveau scolaire ajoutée avec succès.');
                return redirect()->route('niveaux.index');
            
        }catch(Exeception $e){
            //traitement de l'exeception
        }
    }

    public function render()
    {
        return view('livewire.creer-niveau-scolaire');
    }
}
