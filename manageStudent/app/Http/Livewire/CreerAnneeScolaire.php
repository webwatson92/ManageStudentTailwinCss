<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\SchoolYear;
use Alert;

class CreerAnneeScolaire extends Component
{
    public $libelle;

    public function ajouterAnneeScollaire(SchoolYear $schoolYear){
        $this->validate([
            'libelle' =>"string|required"
        ]);
        
        try{
            $anneeCourante = Carbon::now()->format('Y');
            $verificationAnneeCourant = SchoolYear::where('current_year', $anneeCourante)->get();
            $AnneeCouranteExisteDeja = $verificationAnneeCourant->count() ;
            if($AnneeCouranteExisteDeja >= 1){
                return redirect()->back()->with('error', "L'année en cour est déjà dans le système.");
            }else{
                $schoolYear->school_year = $this->libelle;
                $schoolYear->current_year = $anneeCourante;
                $schoolYear->save();
                if($schoolYear){ $this->libelle=""; }
                Alert::toast('Année scolaire ajoutée avec succès.', 'success');
                return redirect()->route('school_years')->with('success', "Année scolaire ajoutée.");
            }

        }catch(Exeception $e){
            //traitement de l'exeception
        }
    }

    public function render()
    {

        return view('livewire.creer-annee-scolaire');
    }
}
