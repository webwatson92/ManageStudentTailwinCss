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
        ]);

        try{
                // Recupérer l'année scolaire active == 1
                $anneeActive = SchoolYear::where('active', '1')->first();
                
                $niveau->code = $this->code;
                $niveau->libelle = $this->libelle;
                $niveau->school_year_id = $anneeActive->id;

                $niveau->save();
                Alert::toast('Niveau scolaire ajoutée avec succès.', 'success');
                //Alert::success('Félicitation !', 'Niveau scolaire ajoutée avec succès.');
                return redirect()->route('niveaux');
            
        }catch(Exeception $e){
            //traitement de l'exeception
        }
    }

    public function render()
    {
        return view('livewire.creer-niveau-scolaire');
    }
}
