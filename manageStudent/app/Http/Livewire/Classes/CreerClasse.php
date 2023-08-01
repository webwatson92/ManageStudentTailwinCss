<?php

namespace App\Http\Livewire\Classes;

use App\Models\Classe;
use App\Models\Niveau;
use Livewire\Component;
use App\Models\SchoolYear;
use Alert;

class CreerClasse extends Component
{
    public $libelle, $niveau_id;

    public function ajouterClasse(Classe $classe){

        $this->validate([
            'libelle' =>"string|required|unique:classes",
            'niveau_id' =>"integer|required",
        ]);
        try{
                $classe->libelle = $this->libelle;
                $classe->niveau_id = $this->niveau_id;
                $classe->save();
                Alert::toast('La classe a été ajoutée avec succès.', 'success');
                //Alert::success('Félicitation !', 'Niveau scolaire ajoutée avec succès.');
                return redirect()->route('classe');
            
        }catch(Exeception $e){
            //traitement de l'exeception
        }
    }

    public function render()
    {
        $anneeActive = SchoolYear::where('active', '1')->first();
        $anneeEnCours = Niveau::where('school_year_id', $anneeActive->id)->get();
        return view('livewire.classes.creer-classe', compact('anneeEnCours'));
    }
}
