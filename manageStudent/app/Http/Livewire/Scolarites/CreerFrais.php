<?php

namespace App\Http\Livewire\Scolarites;

use App\Models\Niveau;
use Livewire\Component;
use App\Models\SchoolYear;
use App\Models\FraisScolarite;
use RealRashid\SweetAlert\Facades\Alert;


class CreerFrais extends Component
{

    public $niveau_id, $scolarite, $error;

    public function ajouterFrais(FraisScolarite $frais){

        $this->validate([
            'niveau_id' =>"integer|required",
            'scolarite' =>"integer|required",
        ]);

        
        // Recupérer l'année scolaire active == 1
        $anneeActive = SchoolYear::where('active', '1')->first();
        
        $verificationSiNiveauExisteDeja = FraisScolarite::where('school_year_id', $anneeActive->i)
                        ->orWhere('niveau_id', $this->niveau_id)->get();
        //dd($verificationSiNiveauExisteDeja);
        if($verificationSiNiveauExisteDeja->count() < 1){

            try{
                    $frais->niveau_id = $this->niveau_id;
                    $frais->montant = $this->scolarite;
                    $frais->school_year_id = $anneeActive->id;

                    $frais->save();
                    Alert::toast('Frais de scolaire ajoutée avec succès.', 'success');
                    return redirect()->route('frais');
                
            }catch(Exeception $e){
                //traitement de l'exeception
                dd($e);
            }

        }else{

            $this->error = "Vous avez déjà ajouté la scolarité de ce niveau d'étude, veuillez le modifer SVP !";

        }
    }


    public function render()
    {
        $niveaux = Niveau::all();
        return view('livewire.scolarites.creer-frais', compact('niveaux'));
    }
}
